;
/**********************************
***********************************
 * WPERP People Fields Main JS
***********************************
***********************************/


/**
 * Receives the saved from data from Server
 * If no data it will be a blank array
 */
var serverData =  wpErpForm.collection || [];

// unquotes unserialized boolean data from wordpress that was quoted
for ( var i in serverData ) {
    serverData[i].required = serverData[i].required ? JSON.parse( serverData[i].required ) : false;
    serverData[i].edit = serverData[i].edit ? JSON.parse( serverData[i].edit ) : false;
}

// Set Vue Debuggin ON/OFF
//Vue.config.debug = true;

Vue.directive('drag-and-drop', {

    params: [
        'v-drag-start',
        'v-drag-over',
        'v-drag-enter',
        'v-drag-leave',
        'v-drag-end',
        'drop'
    ],

    bind: function () {

        this.vm.dragged = null;

        this.dragStartHandler = function (e) {

            this.vm.dragged              = e.target.closest('.single-field');
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text', '');

            if (typeof(this.vm[this.params.vDragStart]) === 'function') {

                this.vm[this.params.vDragStart].call(this, e.target);
            }

        }.bind(this);

        this.dragEnterHandler = function(e) {

            if (typeof(this.vm[this.params.vDragEnter]) === 'function') {

                this.vm[this.params.vDragEnter].call(this, e.target);
            }

            e.target.classList.add('drag-enter');

        }.bind(this);

        this.dragLeaveHandler = function(e) {

            if (typeof(this.vm[this.params.vDragLeave]) === 'function') {

                this.vm[this.params.vDragLeave].call(this, e.target);
            }

            e.target.classList.remove('drag-enter');

        }.bind(this);

        this.dragEndHandler = function(e) {

            if (typeof(this.vm[this.params.vDragEnd]) === 'function') {

                this.vm[this.params.vDragEnd].call(this, e.target);
            }

        }.bind(this);

        this.dragOverHandler = function(e) {

            e.preventDefault();
            e.dataTransfer.dropEffect = 'move';

            if (typeof(this.vm[this.params.vDragOver]) === 'function') {

                this.vm[this.params.vDragOver].call(this, e.target);
            }

        }.bind(this);

        this.dropHandler = function(e) {

            e.stopPropagation();

            var el = e.target.closest('.single-field');

            if (this.vm.dragged != el) {

                if (typeof(this.vm[this.params.drop]) === 'function') {

                    this.vm[this.params.drop].call(this, this.vm.dragged, el);
                }
            }

        }.bind(this);

        this.el.addEventListener('dragstart', this.dragStartHandler, false);
        this.el.addEventListener('dragenter', this.dragEnterHandler, false);
        this.el.addEventListener('dragover', this.dragOverHandler, false);
        this.el.addEventListener('dragleave', this.dragLeaveHandler, false);
        this.el.addEventListener('drop', this.dropHandler, false);
        this.el.addEventListener('dragend', this.dragEndHandler, false);
    },

    update: function (newValue, oldValue) {

    },

    unbind: function () {

        this.el.removeEventListener('dragstart', this.dragStartHandler);
        this.el.removeEventListener('dragenter', this.dragEnterHandler);
        this.el.removeEventListener('dragover', this.dragOverHandler);
        this.el.removeEventListener('dragleave', this.dragLeaveHandler);
    }

});

// Vue Component for Single Field
Vue.component('single-field', {

    // Component will get only these data from outside
    props : ['model', 'sections', 'icons'],

    // The component template
    template: '#single-field-template',

    // Temporary data to be used within this component
    data: function() {

        return {

            //edit: false,

            editButton: false,

            hover: false,

            fields: {
                text        : { value: 'text',          text: 'Text',           childOptions: false },
                password    : { value: 'password',      text: 'Password',       childOptions: false },
                textarea    : { value: 'textarea',      text: 'Textarea',       childOptions: false },
                select      : { value: 'select',        text: 'Dropdown',       childOptions: true },
                //multiselect : { value: 'multiselect',   text: 'Multiselect',    childOptions: true },
                radio       : { value: 'radio',         text: 'Radio',          childOptions: true },
                checkbox    : { value: 'checkbox',      text: 'Checkbox',       childOptions: true },
                number      : { value: 'number',        text: 'number',         childOptions: false },
                url         : { value: 'url',           text: 'Url',            childOptions: false },
                email       : { value: 'email',         text: 'Email',          childOptions: false },
                //fileupload  : { value: 'fileupload',    text: 'File Upload',    childOptions: false },
                date        : { value: 'date',          text: 'Date',           childOptions: false },
            },

        }
    },

    ready: function() {
        this.validateMetaKey('label');
    },

    // Automatically computed data
    computed: {

        // On field change checks if this field has child options
        hasChildOptions: function() {

            if ( this.model.type ) {

                return this.fields[this.model.type].childOptions;
            }
        }
    },

    watch: {

        // Watches the label change and generates name key
        'model.label' : function() {

            this.validateMetaKey('label');
        },

        // Validates after Mekta key edit
        'model.name' : function() {

            this.validateMetaKey('name');

            if( '' == this.model.name ) {

                this.validateMetaKey('label');
            }
        },

        // While changing field deletes options if not required
        'model.type' : function() {

            if ( false == this.fields[this.model.type].childOptions ) {

                this.model['options'] = [{text: '', value: ''}];
            }
        }

    },

    // Component Methods
    methods: {

        // Enables or disabled meta key edit on condition
        metaKeyDisable: function(condition) {

            this.$els.metaKey.disabled = condition;

            if ( !condition ) {

                this.$els.metaKey.focus();
            }
        },

        // Validates Meta Key
        validateMetaKey : function(field) {

            var metaKey     = this.model[field].trim().replace(/[^A-Za-z0-9\[\]]/gi, '_').toLowerCase();
            this.model.name = metaKey;
        },

        // adds a new child option
        addNewOption: function(model) {

            this.model.options.push({text: '', value: ''});
        },

        // removes a child option
        removeOption: function(option) {

            this.model.options.$remove(option);
        },

        // will trigger when click save button
        saveData: function() {

            this.model.edit = false;
            // this.sendToServer();
        },

        // will trigger when click delete button
        deleteModel: function(model) {

            var confirmed = confirm('Do you want to delete ' + this.model.label + ' ?');

            if ( confirmed ) {

                wperpPeople.collection.$remove(model);
                this.sendToServer();
                this.model.edit = false;
            }
        },

        // sends data to server
        sendToServer: function() {

            var data = {
                action: 'erp_form_builder',
                collection: wperpPeople.collection,
                people: wpErpForm.people,
                nonce: wpErpForm.nonce
            };

            // Ajax call to ajaxurl
            jQuery.post( ajaxurl, data, function( response ){

            });
        }
    }
});

var wperpPeople = new Vue({

    // Vue object's view will append here
    el: '#people-field-parent',

    // Vue object data
    data: {

        // assings server data to base collection
        collection: serverData,
        sections : wpErpForm.sections,
        icons : wpErpForm.icons,

    },

    // Vue object methods
    methods: {

        /**
         * Will add a default model to collection
         * while Add new Field
         */
        addNewField : function() {
            var increment = this.collection.length + 1;

            this.collection.push({
                label: 'Untitled Field ' + increment,
                name: '',
                section: 0,
                icon: '',
                required: false,
                type: 'text',
                options: [{text: '', value: ''}],
                placeholder: '',
                helptext: '',
                edit: true
            });
        },

        // Handles element after drop
        handleDrop: function(draggedElement, droppedOnElement) {

                var draggedElementIndex     = draggedElement.getAttribute('data-index'),
                    droppedOnElementIndex   = droppedOnElement.getAttribute('data-index'),
                    copiedElement           = this.collection[draggedElementIndex];

          if ( draggedElementIndex === droppedOnElementIndex ) return false;

          this.collection.$remove(copiedElement);
          this.collection.splice(droppedOnElementIndex, 0, copiedElement);

          var data = {
                action: 'erp_form_builder',
                collection: wperpPeople.collection,
                people: wpErpForm.people,
                nonce: wpErpForm.nonce
            };

            // Ajax call to ajaxurl
            jQuery.post( ajaxurl, data, function( response ){

            });
        }
    }
});

(function($){
    $(document).ready(function() {
        var data = {
                action: 'erp_form_builder',
                collection: wperpPeople.collection,
                people: wpErpForm.people,
                nonce: wpErpForm.nonce
            };

        $('#save-fields').on( 'click', function() {
            arr = wperpPeople.collection;

            var index = {}, i, str, duplicate = false;

            for(i = 0; i < arr.length; i++) {
                str = JSON.stringify(arr[i]);
                if (index.hasOwnProperty(str)) {
                    duplicate = true;
                } else {
                    index[str] = true;
                }
            }

            if (duplicate) {
                alert(wpErpForm.duplicateAlert);
            } else {
                $('.spinner').addClass('is-active');

                $.post(ajaxurl, data)
                .done(function(data){
                    $('.spinner').removeClass('is-active');
                    $('#notice-save-success').show().delay(1000).fadeOut();
                });
            }
        });
    });
})(jQuery);

