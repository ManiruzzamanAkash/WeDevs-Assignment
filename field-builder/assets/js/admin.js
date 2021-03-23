/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 10);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),
/* 1 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_PeopleExtraFields_vue__ = __webpack_require__(3);
/* unused harmony namespace reexport */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_4f9b5a3a_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_PeopleExtraFields_vue__ = __webpack_require__(13);
var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(12)
}
var normalizeComponent = __webpack_require__(0)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_PeopleExtraFields_vue__["a" /* default */],
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_4f9b5a3a_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_PeopleExtraFields_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "assets/src/admin/components/PeopleExtraFields.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-4f9b5a3a", Component.options)
  } else {
    hotAPI.reload("data-v-4f9b5a3a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["a"] = (Component.exports);


/***/ }),
/* 2 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__PeopleExtraFields_vue__ = __webpack_require__(1);
//
//
//
//



/* harmony default export */ __webpack_exports__["a"] = ({
    name: 'CustomerExtraFieldsTop',

    components: {
        PeopleExtraFields: __WEBPACK_IMPORTED_MODULE_0__PeopleExtraFields_vue__["a" /* default */]
    },

    computed: {
        shouldRender() {
            return 'Customers' === this.$route.name || 'CustomerDetails' === this.$route.name;
        }
    }
});

/***/ }),
/* 3 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

let HTTP = acct_get_lib('HTTP');
let Datepicker = acct_get_lib('Datepicker');
let MultiSelect = acct_get_lib('MultiSelect');

/* harmony default export */ __webpack_exports__["a"] = ({
    name: 'PeopleExtraFields',

    data() {
        return {
            peopleId: null,
            fields: []
        };
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
            this.fields.forEach(field => {
                if ('select' === field.type) {
                    acct.hooks.addFilter('acctPeopleFieldsError', 'peopleField', errors => {
                        if ('true' === field.required && null === field.value.id) {
                            errors.push(field.label + ' is required.');
                        }

                        return errors;
                    });
                }

                data[field.name] = field.value;
            });

            return data;
        });

        acct.hooks.addAction('acctPeopleID', 'peopleData', id => {
            this.peopleId = id;
        });
    },

    methods: {
        getCustomerFields() {
            HTTP.get('/field-builder', { params: {
                    type: this.peopleType,
                    section: this.section
                } }).then(response => {
                response.data.forEach(data => {
                    data['value'] = null;

                    if ('checkbox' === data['type']) {
                        data['value'] = [];
                    }

                    if ('select' === data['type']) {
                        data['value'] = { id: null, name: null };
                    }

                    this.fields.push(data);
                });

                this.setFieldValue();
            });
        },

        setFieldValue() {
            // editing people
            if (this.peopleId) {
                HTTP.get(`/field-builder/${this.peopleType}/${this.peopleId}`).then(response => {
                    this.fields.forEach(field => {
                        for (let key in response.data) {
                            if (key === field['name']) {
                                field['value'] = response.data[key];
                            }
                        }
                    });
                });
            }
        },

        renameTextKey(obj) {
            for (let key in obj) {
                obj[key]['id'] = obj[key]['value'];
                obj[key]['name'] = obj[key]['text'];
            }

            return obj;
        }
    }
});

/***/ }),
/* 4 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__PeopleExtraFields_vue__ = __webpack_require__(1);
//
//
//
//



/* harmony default export */ __webpack_exports__["a"] = ({
    name: 'CustomerExtraFieldsMiddle',

    components: {
        PeopleExtraFields: __WEBPACK_IMPORTED_MODULE_0__PeopleExtraFields_vue__["a" /* default */]
    },

    computed: {
        shouldRender() {
            return 'Customers' === this.$route.name || 'CustomerDetails' === this.$route.name;
        }
    }
});

/***/ }),
/* 5 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__PeopleExtraFields_vue__ = __webpack_require__(1);
//
//
//
//



/* harmony default export */ __webpack_exports__["a"] = ({
    name: 'CustomerExtraFieldsBottom',

    components: {
        PeopleExtraFields: __WEBPACK_IMPORTED_MODULE_0__PeopleExtraFields_vue__["a" /* default */]
    },

    computed: {
        shouldRender() {
            return 'Customers' === this.$route.name || 'CustomerDetails' === this.$route.name;
        }
    }
});

/***/ }),
/* 6 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__PeopleExtraFields_vue__ = __webpack_require__(1);
//
//
//
//



/* harmony default export */ __webpack_exports__["a"] = ({
    name: 'VendorExtraFieldsTop',

    components: {
        PeopleExtraFields: __WEBPACK_IMPORTED_MODULE_0__PeopleExtraFields_vue__["a" /* default */]
    },

    computed: {
        shouldRender() {
            return 'Vendors' === this.$route.name || 'VendorDetails' === this.$route.name;
        }
    }
});

/***/ }),
/* 7 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__PeopleExtraFields_vue__ = __webpack_require__(1);
//
//
//
//



/* harmony default export */ __webpack_exports__["a"] = ({
    name: 'VendorExtraFieldsMiddle',

    components: {
        PeopleExtraFields: __WEBPACK_IMPORTED_MODULE_0__PeopleExtraFields_vue__["a" /* default */]
    },

    computed: {
        shouldRender() {
            return 'Vendors' === this.$route.name || 'VendorDetails' === this.$route.name;
        }
    }
});

/***/ }),
/* 8 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__PeopleExtraFields_vue__ = __webpack_require__(1);
//
//
//
//



/* harmony default export */ __webpack_exports__["a"] = ({
    name: 'VendorExtraFieldsBottom',

    components: {
        PeopleExtraFields: __WEBPACK_IMPORTED_MODULE_0__PeopleExtraFields_vue__["a" /* default */]
    },

    computed: {
        shouldRender() {
            return 'Vendors' === this.$route.name || 'VendorDetails' === this.$route.name;
        }
    }
});

/***/ }),
/* 9 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
//
//
//
//
//
//
//
//
//

let HTTP = acct_get_lib('HTTP');

/* harmony default export */ __webpack_exports__["a"] = ({
    name: 'PeopleMetaData',

    props: {
        peopleId: {
            type: Number
        },
        peopleType: {
            type: String
        }
    },

    data() {
        return {
            customData: []
        };
    },

    created() {
        HTTP.get(`/field-builder/${this.peopleType}/${this.peopleId}`).then(response => {
            this.customData = response.data;
        });
    },

    methods: {
        makeTitle(slug) {
            let words = slug.split('-');

            for (let i = 0; i < words.length; i++) {
                let word = words[i].replace('_', ' ');
                words[i] = word.charAt(0).toUpperCase() + word.slice(1);
            }

            return words.join(' ');
        },

        formatData(data) {
            if ('string' === typeof data) {
                return data;
            }

            if (Array.isArray(data)) {
                return data.join(', ');
            }

            return data.name + ': ' + data.value;
        }
    }
});

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _CustomerExtraFieldsTop = __webpack_require__(11);

var _CustomerExtraFieldsTop2 = _interopRequireDefault(_CustomerExtraFieldsTop);

var _CustomerExtraFieldsMiddle = __webpack_require__(15);

var _CustomerExtraFieldsMiddle2 = _interopRequireDefault(_CustomerExtraFieldsMiddle);

var _CustomerExtraFieldsBottom = __webpack_require__(17);

var _CustomerExtraFieldsBottom2 = _interopRequireDefault(_CustomerExtraFieldsBottom);

var _VendorExtraFieldsTop = __webpack_require__(19);

var _VendorExtraFieldsTop2 = _interopRequireDefault(_VendorExtraFieldsTop);

var _VendorExtraFieldsMiddle = __webpack_require__(21);

var _VendorExtraFieldsMiddle2 = _interopRequireDefault(_VendorExtraFieldsMiddle);

var _VendorExtraFieldsBottom = __webpack_require__(23);

var _VendorExtraFieldsBottom2 = _interopRequireDefault(_VendorExtraFieldsBottom);

var _PeopleMetaData = __webpack_require__(25);

var _PeopleMetaData2 = _interopRequireDefault(_PeopleMetaData);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// customer
// imports
acct.addFilter('acctPeopleExtraFieldsTop', 'CustomerFieldsTop', _CustomerExtraFieldsTop2.default);
acct.addFilter('acctPeopleExtraFieldsMiddle', 'CustomerFieldsMiddle', _CustomerExtraFieldsMiddle2.default);
acct.addFilter('acctPeopleExtraFieldsBottom', 'CustomerFieldsBottom', _CustomerExtraFieldsBottom2.default);

// vendor
acct.addFilter('acctPeopleExtraFieldsTop', 'VendorFieldsTop', _VendorExtraFieldsTop2.default);
acct.addFilter('acctPeopleExtraFieldsMiddle', 'VendorFieldsMiddle', _VendorExtraFieldsMiddle2.default);
acct.addFilter('acctPeopleExtraFieldsBottom', 'VendorFieldsBottom', _VendorExtraFieldsBottom2.default);

// show meta


acct.addFilter('acctPeopleMeta', 'PeopleMeta', _PeopleMetaData2.default);

/***/ }),
/* 11 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_CustomerExtraFieldsTop_vue__ = __webpack_require__(2);
/* empty harmony namespace reexport */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_821d800c_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_CustomerExtraFieldsTop_vue__ = __webpack_require__(14);
var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_CustomerExtraFieldsTop_vue__["a" /* default */],
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_821d800c_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_CustomerExtraFieldsTop_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "assets/src/admin/components/CustomerExtraFieldsTop.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-821d800c", Component.options)
  } else {
    hotAPI.reload("data-v-821d800c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),
/* 12 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 13 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.fields.length
    ? _c(
        "div",
        { staticClass: "wperp-row wperp-gutter-20 cfb-fields" },
        _vm._l(_vm.fields, function(field, index) {
          return _c(
            "div",
            {
              key: "cfb-" + _vm.peopleType + "-" + _vm.section + "-" + index,
              staticClass: "wperp-form-group wperp-col-sm-6 wperp-col-xs-12"
            },
            [
              _c("label", [
                _vm._v(_vm._s(field.label) + "\n            "),
                "true" === field.required
                  ? _c("span", { staticClass: "wperp-required-sign" }, [
                      _vm._v("*")
                    ])
                  : _vm._e()
              ]),
              _vm._v(" "),
              "textarea" === field.type
                ? _c("textarea", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: field.value,
                        expression: "field.value"
                      }
                    ],
                    staticClass: "wperp-form-field",
                    attrs: {
                      placeholder: field.placeholder,
                      required: field.required
                    },
                    domProps: { value: field.value },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(field, "value", $event.target.value)
                      }
                    }
                  })
                : "select" === field.type
                ? _c(
                    "div",
                    { staticClass: "with-multiselect" },
                    [
                      _c("multi-select", {
                        attrs: {
                          options: _vm.renameTextKey(field.options),
                          placeholder: field.placeholder
                        },
                        model: {
                          value: field.value,
                          callback: function($$v) {
                            _vm.$set(field, "value", $$v)
                          },
                          expression: "field.value"
                        }
                      })
                    ],
                    1
                  )
                : "radio" === field.type
                ? _c(
                    "div",
                    _vm._l(field.options, function(option, index) {
                      return _c(
                        "label",
                        {
                          key:
                            "cfb-radio-" +
                            _vm.peopleType +
                            "-" +
                            _vm.section +
                            "-" +
                            index
                        },
                        [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: field.value,
                                expression: "field.value"
                              }
                            ],
                            attrs: { type: "radio", required: field.required },
                            domProps: {
                              value: option.value,
                              checked: _vm._q(field.value, option.value)
                            },
                            on: {
                              change: function($event) {
                                return _vm.$set(field, "value", option.value)
                              }
                            }
                          }),
                          _vm._v(" "),
                          _c("span", { staticClass: "field-label" }, [
                            _vm._v(_vm._s(option.text))
                          ])
                        ]
                      )
                    }),
                    0
                  )
                : "checkbox" === field.type
                ? _c(
                    "div",
                    _vm._l(field.options, function(option, index) {
                      return _c(
                        "label",
                        {
                          key:
                            "cfb-chkbx-" +
                            _vm.peopleType +
                            "-" +
                            _vm.section +
                            "-" +
                            index,
                          staticClass: "form-check-label"
                        },
                        [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: field.value,
                                expression: "field.value"
                              }
                            ],
                            staticClass: "form-check-input",
                            attrs: { type: "checkbox" },
                            domProps: {
                              value: option.value,
                              checked: Array.isArray(field.value)
                                ? _vm._i(field.value, option.value) > -1
                                : field.value
                            },
                            on: {
                              change: function($event) {
                                var $$a = field.value,
                                  $$el = $event.target,
                                  $$c = $$el.checked ? true : false
                                if (Array.isArray($$a)) {
                                  var $$v = option.value,
                                    $$i = _vm._i($$a, $$v)
                                  if ($$el.checked) {
                                    $$i < 0 &&
                                      _vm.$set(
                                        field,
                                        "value",
                                        $$a.concat([$$v])
                                      )
                                  } else {
                                    $$i > -1 &&
                                      _vm.$set(
                                        field,
                                        "value",
                                        $$a
                                          .slice(0, $$i)
                                          .concat($$a.slice($$i + 1))
                                      )
                                  }
                                } else {
                                  _vm.$set(field, "value", $$c)
                                }
                              }
                            }
                          }),
                          _vm._v(" "),
                          _c("span", { staticClass: "field-label" }, [
                            _vm._v(_vm._s(option.text))
                          ])
                        ]
                      )
                    }),
                    0
                  )
                : "date" === field.type
                ? _c("datepicker", {
                    staticStyle: { width: "100%" },
                    model: {
                      value: field.value,
                      callback: function($$v) {
                        _vm.$set(field, "value", $$v)
                      },
                      expression: "field.value"
                    }
                  })
                : field.type === "checkbox"
                ? _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: field.value,
                        expression: "field.value"
                      }
                    ],
                    staticClass: "wperp-form-field",
                    attrs: {
                      placeholder: field.placeholder,
                      required: field.required,
                      type: "checkbox"
                    },
                    domProps: {
                      checked: Array.isArray(field.value)
                        ? _vm._i(field.value, null) > -1
                        : field.value
                    },
                    on: {
                      change: function($event) {
                        var $$a = field.value,
                          $$el = $event.target,
                          $$c = $$el.checked ? true : false
                        if (Array.isArray($$a)) {
                          var $$v = null,
                            $$i = _vm._i($$a, $$v)
                          if ($$el.checked) {
                            $$i < 0 &&
                              _vm.$set(field, "value", $$a.concat([$$v]))
                          } else {
                            $$i > -1 &&
                              _vm.$set(
                                field,
                                "value",
                                $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                              )
                          }
                        } else {
                          _vm.$set(field, "value", $$c)
                        }
                      }
                    }
                  })
                : field.type === "radio"
                ? _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: field.value,
                        expression: "field.value"
                      }
                    ],
                    staticClass: "wperp-form-field",
                    attrs: {
                      placeholder: field.placeholder,
                      required: field.required,
                      type: "radio"
                    },
                    domProps: { checked: _vm._q(field.value, null) },
                    on: {
                      change: function($event) {
                        return _vm.$set(field, "value", null)
                      }
                    }
                  })
                : _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: field.value,
                        expression: "field.value"
                      }
                    ],
                    staticClass: "wperp-form-field",
                    attrs: {
                      placeholder: field.placeholder,
                      required: field.required,
                      type: field.type
                    },
                    domProps: { value: field.value },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(field, "value", $event.target.value)
                      }
                    }
                  })
            ],
            1
          )
        }),
        0
      )
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-4f9b5a3a", esExports)
  }
}

/***/ }),
/* 14 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.shouldRender
    ? _c("people-extra-fields", {
        attrs: { "people-type": "customer", section: "top" }
      })
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-821d800c", esExports)
  }
}

/***/ }),
/* 15 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_CustomerExtraFieldsMiddle_vue__ = __webpack_require__(4);
/* empty harmony namespace reexport */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_3ce09400_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_CustomerExtraFieldsMiddle_vue__ = __webpack_require__(16);
var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_CustomerExtraFieldsMiddle_vue__["a" /* default */],
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_3ce09400_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_CustomerExtraFieldsMiddle_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "assets/src/admin/components/CustomerExtraFieldsMiddle.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3ce09400", Component.options)
  } else {
    hotAPI.reload("data-v-3ce09400", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),
/* 16 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.shouldRender
    ? _c("people-extra-fields", {
        attrs: { "people-type": "customer", section: "middle" }
      })
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-3ce09400", esExports)
  }
}

/***/ }),
/* 17 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_CustomerExtraFieldsBottom_vue__ = __webpack_require__(5);
/* empty harmony namespace reexport */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_09591996_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_CustomerExtraFieldsBottom_vue__ = __webpack_require__(18);
var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_CustomerExtraFieldsBottom_vue__["a" /* default */],
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_09591996_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_CustomerExtraFieldsBottom_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "assets/src/admin/components/CustomerExtraFieldsBottom.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-09591996", Component.options)
  } else {
    hotAPI.reload("data-v-09591996", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),
/* 18 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.shouldRender
    ? _c("people-extra-fields", {
        attrs: { "people-type": "customer", section: "bottom" }
      })
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-09591996", esExports)
  }
}

/***/ }),
/* 19 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_VendorExtraFieldsTop_vue__ = __webpack_require__(6);
/* empty harmony namespace reexport */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_9f6ae638_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_VendorExtraFieldsTop_vue__ = __webpack_require__(20);
var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_VendorExtraFieldsTop_vue__["a" /* default */],
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_9f6ae638_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_VendorExtraFieldsTop_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "assets/src/admin/components/VendorExtraFieldsTop.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-9f6ae638", Component.options)
  } else {
    hotAPI.reload("data-v-9f6ae638", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),
/* 20 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.shouldRender
    ? _c("people-extra-fields", {
        attrs: { "people-type": "vendor", section: "top" }
      })
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-9f6ae638", esExports)
  }
}

/***/ }),
/* 21 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_VendorExtraFieldsMiddle_vue__ = __webpack_require__(7);
/* empty harmony namespace reexport */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_43de26d6_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_VendorExtraFieldsMiddle_vue__ = __webpack_require__(22);
var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_VendorExtraFieldsMiddle_vue__["a" /* default */],
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_43de26d6_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_VendorExtraFieldsMiddle_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "assets/src/admin/components/VendorExtraFieldsMiddle.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-43de26d6", Component.options)
  } else {
    hotAPI.reload("data-v-43de26d6", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),
/* 22 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.shouldRender
    ? _c("people-extra-fields", {
        attrs: { "people-type": "vendor", section: "middle" }
      })
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-43de26d6", esExports)
  }
}

/***/ }),
/* 23 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_VendorExtraFieldsBottom_vue__ = __webpack_require__(8);
/* empty harmony namespace reexport */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_1056ac6c_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_VendorExtraFieldsBottom_vue__ = __webpack_require__(24);
var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_VendorExtraFieldsBottom_vue__["a" /* default */],
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_1056ac6c_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_VendorExtraFieldsBottom_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "assets/src/admin/components/VendorExtraFieldsBottom.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1056ac6c", Component.options)
  } else {
    hotAPI.reload("data-v-1056ac6c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),
/* 24 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.shouldRender
    ? _c("people-extra-fields", {
        attrs: { "people-type": "vendor", section: "bottom" }
      })
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-1056ac6c", esExports)
  }
}

/***/ }),
/* 25 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_PeopleMetaData_vue__ = __webpack_require__(9);
/* empty harmony namespace reexport */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_b189f864_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_PeopleMetaData_vue__ = __webpack_require__(26);
var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_PeopleMetaData_vue__["a" /* default */],
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_b189f864_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_PeopleMetaData_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "assets/src/admin/components/PeopleMetaData.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-b189f864", Component.options)
  } else {
    hotAPI.reload("data-v-b189f864", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),
/* 26 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "li",
    { staticStyle: { display: "block" } },
    _vm._l(_vm.customData, function(cData, index) {
      return _c("div", { key: index }, [
        _c("strong", [_vm._v(_vm._s(_vm.makeTitle(index)) + ":")]),
        _vm._v(" "),
        _c("span", [_vm._v(_vm._s(_vm.formatData(cData)))])
      ])
    }),
    0
  )
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-b189f864", esExports)
  }
}

/***/ })
/******/ ]);