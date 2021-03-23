
<div class="wrap">

    <h2><?php _e( 'Custom Field Builder', 'erp-field-builder' ); ?></h2>

    <div class="notice notice-success" id="notice-save-success">
        <p>
            <?php esc_attr_e( 'Saved Changes.', 'erp-field-builder' ); ?>
        </p>
    </div>

    <h2 class="nav-tab-wrapper">

    <?php
    foreach ($peoples as $people => $data) {

        if ( array_key_exists($people, $active_modules ) ) {

            foreach ($data as $single => $properties ) {
                $tab = $single;
                $current = ( ! '' == $current ) ? $current : $tab;
                $class = ( $tab == $current ) ? ' nav-tab-active' : '';

                printf( '<a class="nav-tab%s" href="?page=custom-field-builder&tab=%s">%s</a>', $class, $tab, $properties['label'] );

                }
            }
        }
    ?>

    </h2>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                        <div id="people-field-parent">

                            <single-field
                            v-for="singlemodel in collection"
                            track-by="$index" v-bind:model="singlemodel"
                            :sections="sections"
                            :icons="icons"
                            data-index="{{ $index }}"
                            v-drag-and-drop
                            drop="handleDrop">
                            </single-field>

                            <div id="add-new-field">
                                <button class="button-primary" @click="addNewField"><?php _e( 'Add New Field', 'erp-field-builder' ); ?></button>
                            </div>
                        </div>

            </div>
            <!-- post-body-content -->

            <!-- sidebar -->
            <div id="postbox-container-1" class="postbox-container">

                <div class="meta-box-sortables">

                    <div class="postbox save-fields-postbox">

                        <h2>
                            <span>
                                <?php esc_attr_e( 'Save Fields', 'erp-field-builder' ); ?>
                            </span>
                        </h2>

                        <div class="inside">
                        <div id="save-major">
                            <div class="save-button-spinner">
                                <button id="save-fields" class="button-primary"><?php _e( 'Save Changes', 'erp-field-builder' ); ?></button>
                                    <div class="spinner"></div>
                            </div>
                        </div>

                        </div>
                        <!-- .inside -->

                    </div>
                    <!-- .postbox -->

                </div>
                <!-- .meta-box-sortables -->

            </div>
            <!-- #postbox-container-1 .postbox-container -->

        </div>
        <!-- #post-body .metabox-holder .columns-2 -->

        <br class="clear">
    </div>
    <!-- #poststuff -->

</div>

<script type="text/template" id="single-field-template">

    <div class="single-field">

        <div draggable="true" class="main-people-single" v-show="!model.edit" @click="model.edit=true" @mouseover="hover = true" @mouseout="hover = false" transition="main-single">

            <div class="extended-button-holder" v-show="hover">
                <button class="btn button-delete extended-button" @click.stop="deleteModel(model)"><span class="dashicons dashicons-trash"></span></button>
                <button class="btn button-edit extended-button"><span class="dashicons dashicons-edit"></span></span></button>
            </div>

            <div class="main-inside">
                <div class="main-label"> &nbsp;
                    <span>{{ model.label }}</span>
                    <span class="main-required required-asterisk" v-show="model.required"> *</span>
                </div>
                <div class="main-field">
                    <span v-if="'text' == model.type"><input type="text" v-on:click.stop placeholder="{{model.placeholder}}"></span>
                    <span v-if="'password' == model.type"><input type="password" v-on:click.stop placeholder="{{model.placeholder}}"></span>
                    <span v-if="'textarea' == model.type"><textarea v-on:click.stop></textarea></span>
                    <span v-if="'select' == model.type"><select v-on:click.stop><option v-for="option in model.options">{{option.text}}</option></select></span>
                    <span v-if="'multiselect' == model.type"><select multiple v-on:click.stop><option v-for="option in model.options">{{option.text}}</option></select></span>
                    <span v-if="'radio' == model.type"><span class="main-child-options" v-for="option in model.options"><input type="radio" v-on:click.stop>{{option.text}}</span></span>
                    <span v-if="'checkbox' == model.type"><span class="main-child-options" v-for="option in model.options"><input type="checkbox" v-on:click.stop>{{option.text}}</span></span>
                    <span v-if="'number' == model.type"><input type="number" v-on:click.stop placeholder="{{model.placeholder}}"></span>
                    <span v-if="'url' == model.type"><input type="url" v-on:click.stop placeholder="{{model.placeholder}}"></span>
                    <span v-if="'email' == model.type"><input type="email" v-on:click.stop placeholder="{{model.placeholder}}"></span>
                    <span v-if="'fileupload' == model.type"><input type="file" v-on:click.stop></span>
                    <span v-if="'date' == model.type"><input type="date" v-on:click.stop></span>
                    <span class="main-helptext">{{ model.helptext }}</span>
                </div>
            </div>

        </div>

        <div class="extended-people-single" v-show="model.edit" transition="extended-single">

            <div class="extended-button-holder">
                <button class="btn button-delete extended-button" @click="deleteModel(model)"><span class="dashicons dashicons-trash"></span></button>
            </div>

            <div class="extended-inside">
                <div class="extended-inside-single">
                    <div class="extended-label">
                        <span><?php _e( 'Label', 'erp-field-builder' ); ?></span>
                    </div>
                    <input type="text" placeholder="<?php esc_attr_e( 'Label', 'erp-field-builder' ); ?>" v-model="model.label"><br>
                </div>

                <div class="extended-inside-single">
                    <div class="extended-label">
                        <span><?php _e( 'Meta Key', 'erp-field-builder' ); ?></span>
                    </div>
                    <input type="text" v-model="model.name" v-el:meta-key @focusout="metaKeyDisable(true)" disabled><span @click="metaKeyDisable(false)" style="cursor: pointer" class="dashicons dashicons-edit"></span><span>&nbsp;Please leave this field as it is.</span><br>
                </div>

                <div class="extended-inside-single">
                    <div class="extended-label">
                        <span><?php _e( 'Required', 'erp-field-builder' ); ?></span>
                    </div>

                    <label>
                        <input type="checkbox" v-model="model.required"><span><?php _e( 'Check if required', 'erp-field-builder' ); ?></span>
                    </label>
                </div>

                <div class="extended-inside-single">

                    <div class="extended-label">
                        <span><?php _e( 'Section', 'erp-field-builder' ); ?></span>
                    </div>

                    <select v-model="model.section">
                        <option value="0"><?php _e( 'Choose Section', 'erp-field-builder' ); ?></option>
                        <option v-for="(val, text) in sections" value="{{val}}">{{text}}</option>
                    </select>

                </div>

                <div v-if="'social' == model.section"class="extended-inside-single">

                    <div class="extended-label">
                        <span><?php _e( 'Icon', 'erp-field-builder' ); ?></span>
                    </div>

                    <select v-model="model.icon">
                        <option v-for="(val, text) in icons" value="{{val}}">{{text}}</option>
                    </select>

                </div>

                <div class="extended-inside-single">

                    <div class="extended-label">
                        <span><?php _e( 'Field Type', 'erp-field-builder' ); ?></span>
                    </div>

                    <select v-model="model.type">
                        <option v-for="field in fields" v-bind:value="field.value">{{ field.text }}</option>
                    </select>

                </div>

                <div class="extended-inside-single" v-show="hasChildOptions">
                    <div class="extended-child-options" >
                        <div class="single-input-option" v-for="option in model.options" track-by="$index">
                            <input type="text" placeholder="text" v-bind:value="option.text" v-model="option.text">
                            <input type="text" placeholder="value" v-bind:value="option.vaule" v-model="option.value">
                            <span class="remove-option" style="cursor: pointer" v-on:click="removeOption(option)"> x</span>
                        </div>
                    </div>
                </div>

                <div class="extended-inside-single" v-show="hasChildOptions">
                    <div class="extended-child-options add-option" v-show="hasChildOptions">
                        <button class="button" @click="addNewOption(model)">Add Option</button>
                    </div>
                </div>

                <div class="extended-inside-single">
                    <div class="extended-label">
                        <span><?php _e( 'Placeholder', 'erp-field-builder' ); ?></span>
                    </div>
                    <input type="text" placeholder="placeholder" v-model="model.placeholder"><br>
                </div>

                <div class="extended-inside-single">
                    <div class="extended-label">
                        <span><?php _e( 'Help Text', 'erp-field-builder' ); ?></span>
                    </div>
                    <input type="text" placeholder="helptext" v-model="model.helptext"><br>
                </div>

            </div>

            <div class="button-done-container">
                <button class="button-secondary button-done" @click="saveData"><?php _e( 'Done', 'erp-field-builder' ); ?></button>
            </div>
        </div>
    </div>

</script>
