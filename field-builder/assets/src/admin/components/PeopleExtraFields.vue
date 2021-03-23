<template>
    <div class="wperp-row wperp-gutter-20 cfb-fields" v-if="fields.length">
        <!-- loop start -->
        <div class="wperp-form-group wperp-col-sm-6 wperp-col-xs-12"
            :key="`cfb-${peopleType}-${section}-${index}`"
            v-for="(field, index) in fields">

            <!-- field label -->
            <label>{{ field.label }}
                <span v-if="'true' === field.required" class="wperp-required-sign">*</span>
            </label>

            <!-- field textarea -->
            <textarea v-if="'textarea' === field.type"
                v-model="field.value" class="wperp-form-field"
                :placeholder="field.placeholder" :required="field.required"></textarea>

            <!-- field dropdown -->
            <div class="with-multiselect" v-else-if="'select' === field.type">
                <multi-select v-model="field.value"
                    :options="renameTextKey(field.options)"
                    :placeholder="field.placeholder" />
            </div>

            <!-- field radio -->
            <div v-else-if="'radio' === field.type">
                <label
                    :key="`cfb-radio-${peopleType}-${section}-${index}`"
                    v-for="(option, index) in field.options">

                    <input type="radio" :value="option.value"
                        v-model="field.value" :required="field.required">
                    <span class="field-label">{{ option.text }}</span>
                </label>
            </div>

            <!-- field checkbox -->
            <div v-else-if="'checkbox' === field.type">
                <label class="form-check-label"
                    :key="`cfb-chkbx-${peopleType}-${section}-${index}`"
                    v-for="(option, index) in field.options">

                    <input class="form-check-input" type="checkbox"
                        :value="option.value" v-model="field.value">
                    <span class="field-label">{{ option.text }}</span>
                </label>
            </div>

            <!-- field date -->
            <datepicker style="width: 100%" v-else-if="'date' === field.type"
                v-model="field.value" />

            <!-- field text/password/number/url/email -->
            <input v-else v-model="field.value" class="wperp-form-field"
                :type="field.type"
                :placeholder="field.placeholder"
                :required="field.required">

        </div>
    </div>
</template>

<script>
let HTTP        = acct_get_lib('HTTP');
let Datepicker  = acct_get_lib('Datepicker');
let MultiSelect = acct_get_lib('MultiSelect');

export default {
    name: 'PeopleExtraFields',

    data() {
        return {
            peopleId: null,
            fields  : []
        }
    },

    props: {
        peopleType: {
            type: String
        },
        section: {
            type: String
        }
    },

    components: {
        Datepicker,
        MultiSelect
    },

    created() {
        this.getCustomerFields();

        acct.hooks.addFilter('acctPeopleFieldsData', 'peoplesData', data => {
            this.fields.forEach( field => {
                if ( 'select' === field.type ) {
                    acct.hooks.addFilter('acctPeopleFieldsError', 'peopleField', errors => {
                        if ( 'true' === field.required && null === field.value.id ) {
                            errors.push(field.label + ' is required.');
                        }

                        return errors;
                    });
                }

                data[field.name] = field.value;
            } );

            return data;
        });

        acct.hooks.addAction('acctPeopleID', 'peopleData', id => {
            this.peopleId = id;
        });
    },

    methods: {
        getCustomerFields() {
            HTTP.get('/field-builder', { params: {
                type   : this.peopleType,
                section: this.section
            } }).then(response => {
                response.data.forEach( data => {
                    data['value'] = null;

                    if ( 'checkbox' === data['type'] ) {
                        data['value'] = [];
                    }

                    if ( 'select' === data['type'] ) {
                        data['value'] = { id: null, name: null };
                    }

                    this.fields.push(data);
                } );

                this.setFieldValue();
            });
        },

        setFieldValue() {
            // editing people
            if (this.peopleId) {
                HTTP.get(`/field-builder/${this.peopleType}/${this.peopleId}`).then(response => {
                    this.fields.forEach( field => {
                        for ( let key in response.data ) {
                            if ( key === field['name'] ) {
                                field['value'] = response.data[key];
                            }
                        }
                    } );
                });
            }
        },

        renameTextKey(obj) {
            for ( let key in obj ) {
                obj[key]['id']   = obj[key]['value'];
                obj[key]['name'] = obj[key]['text'];
            }

            return obj;
        }
    }
}
</script>

<style lang="less">
.cfb-fields {
    input[type=number] {
        height: auto !important;
    }
}
</style>
