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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "../src/assets/js/pages/custom/inbox/inbox.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "../src/assets/js/pages/custom/inbox/inbox.js":
/*!****************************************************!*\
  !*** ../src/assets/js/pages/custom/inbox/inbox.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\n\n// Class definition\nvar KTAppInbox = function() {\n    var asideEl;\n    var listEl;\n    var viewEl;\n    var composeEl;\n\n    var asideOffcanvas;\n\n    var initEditor = function(editor) {\n        // init editor\n        var options = {\n            modules: {\n                toolbar: {}\n            },\n            placeholder: 'Type message...',\n            theme: 'snow'\n        };\n\n        var editor = new Quill('#' + editor, options);\n    }\n\n    var initForm = function(formEl) {\n        var formEl = KTUtil.getByID(formEl);\n\n        // Init autocompletes\n        var toEl = KTUtil.find(formEl, '[name=compose_to]');\n        var tagifyTo = new Tagify(toEl, {\n            delimiters: \", \", // add new tags when a comma or a space character is entered\n            maxTags: 10,\n            blacklist: [\"fuck\", \"shit\", \"pussy\"],\n            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)\n            whitelist: [{\n                value: 'Chris Muller',\n                email: 'chris.muller@wix.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_11.jpg',\n                class: 'tagify__tag--brand'\n            }, {\n                value: 'Nick Bold',\n                email: 'nick.seo@gmail.com',\n                initials: 'SS',\n                initialsState: 'warning',\n                pic: ''\n            }, {\n                value: 'Alon Silko',\n                email: 'alon@keenthemes.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_6.jpg'\n            }, {\n                value: 'Sam Seanic',\n                email: 'sam.senic@loop.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_8.jpg'\n            }, {\n                value: 'Sara Loran',\n                email: 'sara.loran@tilda.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_9.jpg'\n            }, {\n                value: 'Eric Davok',\n                email: 'davok@mix.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_13.jpg'\n            }, {\n                value: 'Sam Seanic',\n                email: 'sam.senic@loop.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_13.jpg'\n            }, {\n                value: 'Lina Nilson',\n                email: 'lina.nilson@loop.com',\n                initials: 'LN',\n                initialsState: 'danger',\n                pic: './assets/media/users/100_15.jpg'\n            }],\n            templates: {\n                dropdownItem: function(tagData) {\n                    try {\n                        var html = '';\n\n                        html += '<div class=\"tagify__dropdown__item\">';\n                        html += '   <div class=\"kt-media-card\">';\n                        html += '       <span class=\"kt-media kt-media--' + (tagData.initialsState ? tagData.initialsState : '') + '\" style=\"background-image: url(\\''+ (tagData.pic ? tagData.pic : '') + '\\')\">';\n                        html += '           <span>' + (tagData.initials ? tagData.initials : '') + '</span>';\n                        html += '       </span>';\n                        html += '       <div class=\"kt-media-card__info\">';\n                        html += '           <a href=\"#\" class=\"kt-media-card__title\">'+ (tagData.value ? tagData.value : '') + '</a>';\n                        html += '           <span class=\"kt-media-card__desc\">' + (tagData.email ? tagData.email : '') + '</span>';\n                        html += '       </div>';\n                        html += '   </div>';\n                        html += '</div>';\n\n                        return html;\n                    } catch (err) {}\n                }\n            },\n            transformTag: function(tagData) {\n                tagData.class = 'tagify__tag tagify__tag--brand';\n            },\n            dropdown: {\n                classname: \"color-blue\",\n                enabled: 1,\n                maxItems: 5\n            }\n        });\n\n        var ccEl = KTUtil.find(formEl, '[name=compose_cc]');\n        var tagifyC = new Tagify(ccEl, {\n            delimiters: \", \", // add new tags when a comma or a space character is entered\n            maxTags: 10,\n            blacklist: [\"fuck\", \"shit\", \"pussy\"],\n            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)\n            whitelist: [{\n                value: 'Chris Muller',\n                email: 'chris.muller@wix.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_11.jpg',\n                class: 'tagify__tag--brand'\n            }, {\n                value: 'Nick Bold',\n                email: 'nick.seo@gmail.com',\n                initials: 'SS',\n                initialsState: 'warning',\n                pic: ''\n            }, {\n                value: 'Alon Silko',\n                email: 'alon@keenthemes.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_6.jpg'\n            }, {\n                value: 'Sam Seanic',\n                email: 'sam.senic@loop.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_8.jpg'\n            }, {\n                value: 'Sara Loran',\n                email: 'sara.loran@tilda.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_9.jpg'\n            }, {\n                value: 'Eric Davok',\n                email: 'davok@mix.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_13.jpg'\n            }, {\n                value: 'Sam Seanic',\n                email: 'sam.senic@loop.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_13.jpg'\n            }, {\n                value: 'Lina Nilson',\n                email: 'lina.nilson@loop.com',\n                initials: 'LN',\n                initialsState: 'danger',\n                pic: './assets/media/users/100_15.jpg'\n            }],\n            templates: {\n                dropdownItem: function(tagData) {\n                    try {\n                        var html = '';\n\n                        html += '<div class=\"tagify__dropdown__item\">';\n                        html += '   <div class=\"kt-media-card\">';\n                        html += '       <span class=\"kt-media kt-media--' + (tagData.initialsState ? tagData.initialsState : '') + '\" style=\"background-image: url(\\''+ (tagData.pic ? tagData.pic : '') + '\\')\">';\n                        html += '           <span>' + (tagData.initials ? tagData.initials : '') + '</span>';\n                        html += '       </span>';\n                        html += '       <div class=\"kt-media-card__info\">';\n                        html += '           <a href=\"#\" class=\"kt-media-card__title\">'+ (tagData.value ? tagData.value : '') + '</a>';\n                        html += '           <span class=\"kt-media-card__desc\">' + (tagData.email ? tagData.email : '') + '</span>';\n                        html += '       </div>';\n                        html += '   </div>';\n                        html += '</div>';\n\n                        return html;\n                    } catch (err) {}\n                }\n            },\n            transformTag: function(tagData) {\n                tagData.class = 'tagify__tag tagify__tag--brand';\n            },\n            dropdown: {\n                classname: \"color-blue\",\n                enabled: 1,\n                maxItems: 5\n            }\n        });\n\n        var bccEl = KTUtil.find(formEl, '[name=compose_bcc]');\n        var tagifyBcc = new Tagify(bccEl, {\n            delimiters: \", \", // add new tags when a comma or a space character is entered\n            maxTags: 10,\n            blacklist: [\"fuck\", \"shit\", \"pussy\"],\n            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)\n            whitelist: [{\n                value: 'Chris Muller',\n                email: 'chris.muller@wix.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_11.jpg',\n                class: 'tagify__tag--brand'\n            }, {\n                value: 'Nick Bold',\n                email: 'nick.seo@gmail.com',\n                initials: 'SS',\n                initialsState: 'warning',\n                pic: ''\n            }, {\n                value: 'Alon Silko',\n                email: 'alon@keenthemes.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_6.jpg'\n            }, {\n                value: 'Sam Seanic',\n                email: 'sam.senic@loop.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_8.jpg'\n            }, {\n                value: 'Sara Loran',\n                email: 'sara.loran@tilda.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_9.jpg'\n            }, {\n                value: 'Eric Davok',\n                email: 'davok@mix.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_13.jpg'\n            }, {\n                value: 'Sam Seanic',\n                email: 'sam.senic@loop.com',\n                initials: '',\n                initialsState: '',\n                pic: './assets/media/users/100_13.jpg'\n            }, {\n                value: 'Lina Nilson',\n                email: 'lina.nilson@loop.com',\n                initials: 'LN',\n                initialsState: 'danger',\n                pic: './assets/media/users/100_15.jpg'\n            }],\n            templates: {\n                dropdownItem: function(tagData) {\n                    try {\n                        var html = '';\n\n                        html += '<div class=\"tagify__dropdown__item\">';\n                        html += '   <div class=\"kt-media-card\">';\n                        html += '       <span class=\"kt-media kt-media--' + (tagData.initialsState ? tagData.initialsState : '') + '\" style=\"background-image: url(\\''+ (tagData.pic ? tagData.pic : '') + '\\')\">';\n                        html += '           <span>' + (tagData.initials ? tagData.initials : '') + '</span>';\n                        html += '       </span>';\n                        html += '       <div class=\"kt-media-card__info\">';\n                        html += '           <a href=\"#\" class=\"kt-media-card__title\">'+ (tagData.value ? tagData.value : '') + '</a>';\n                        html += '           <span class=\"kt-media-card__desc\">' + (tagData.email ? tagData.email : '') + '</span>';\n                        html += '       </div>';\n                        html += '   </div>';\n                        html += '</div>';\n\n                        return html;\n                    } catch (err) {}\n                }\n            },\n            transformTag: function(tagData) {\n                tagData.class = 'tagify__tag tagify__tag--brand';\n            },\n            dropdown: {\n                classname: \"color-blue\",\n                enabled: 1,\n                maxItems: 5\n            }\n        });\n\n        // CC input display\n        KTUtil.on(formEl, '.kt-inbox__to .kt-inbox__tool.kt-inbox__tool--cc', 'click', function(e) {\n            var inputEl = KTUtil.find(formEl, '.kt-inbox__to');\n            KTUtil.addClass(inputEl, 'kt-inbox__to--cc');\n            KTUtil.find(formEl, \"[name=compose_cc]\").focus();\n        });\n\n        // CC input hide\n        KTUtil.on(formEl, '.kt-inbox__to .kt-inbox__field.kt-inbox__field--cc .kt-inbox__icon--delete', 'click', function(e) {\n            var inputEl = KTUtil.find(formEl, '.kt-inbox__to');\n            KTUtil.removeClass(inputEl, 'kt-inbox__to--cc');\n        });\n\n        // BCC input display\n        KTUtil.on(formEl, '.kt-inbox__to .kt-inbox__tool.kt-inbox__tool--bcc', 'click', function(e) {\n            var inputEl = KTUtil.find(formEl, '.kt-inbox__to');\n            KTUtil.addClass(inputEl, 'kt-inbox__to--bcc');\n            KTUtil.find(formEl, \"[name=compose_bcc]\").focus();\n        });\n\n        // BCC input hide\n        KTUtil.on(formEl, '.kt-inbox__to .kt-inbox__field.kt-inbox__field--bcc .kt-inbox__icon--delete', 'click', function(e) {\n            var inputEl = KTUtil.find(formEl, '.kt-inbox__to');\n            KTUtil.removeClass(inputEl, 'kt-inbox__to--bcc');\n        });\n    }\n\n    var initAttachments = function(elemId) {\n        var id = \"#\" + elemId;\n        var previewNode = $(id + \" .dropzone-item\");\n        previewNode.id = \"\";\n        var previewTemplate = previewNode.parent('.dropzone-items').html();\n        previewNode.remove();\n\n        var myDropzone = new Dropzone(id, { // Make the whole body a dropzone\n            url: \"https://keenthemes.com/scripts/void.php\", // Set the url for your upload script location\n            parallelUploads: 20,\n            maxFilesize: 1, // Max filesize in MB\n            previewTemplate: previewTemplate,\n            previewsContainer: id + \" .dropzone-items\", // Define the container to display the previews\n            clickable: id + \"_select\" // Define the element that should be used as click trigger to select files.\n        });\n\n        myDropzone.on(\"addedfile\", function(file) {\n            // Hookup the start button\n            $(document).find(id + ' .dropzone-item').css('display', '');\n        });\n\n        // Update the total progress bar\n        myDropzone.on(\"totaluploadprogress\", function(progress) {\n            document.querySelector(id + \" .progress-bar\").style.width = progress + \"%\";\n        });\n\n        myDropzone.on(\"sending\", function(file) {\n            // Show the total progress bar when upload starts\n            document.querySelector(id + \" .progress-bar\").style.opacity = \"1\";\n        });\n\n        // Hide the total progress bar when nothing's uploading anymore\n        myDropzone.on(\"complete\", function(progress) {\n            var thisProgressBar = id + \" .dz-complete\";\n            setTimeout(function() {\n                $(thisProgressBar + \" .progress-bar, \" + thisProgressBar + \" .progress\").css('opacity', '0');\n            }, 300)\n        });\n    }\n\n    return {\n        // public functions\n        init: function() {\n            asideEl = KTUtil.getByID('kt_inbox_aside');\n            listEl = KTUtil.getByID('kt_inbox_list');\n            viewEl = KTUtil.getByID('kt_inbox_view');\n            composeEl = KTUtil.getByID('kt_inbox_compose');\n\n            // init\n            KTAppInbox.initAside();\n            KTAppInbox.initList();\n            KTAppInbox.initView();\n            KTAppInbox.initReply();\n            KTAppInbox.initCompose();\n        },\n\n        initAside: function() {\n            // Mobile offcanvas for mobile mode\n            asideOffcanvas = new KTOffcanvas(asideEl, {\n                overlay: true,\n                baseClass: 'kt-inbox__aside',\n                closeBy: 'kt_inbox_aside_close',\n                toggleBy: 'kt_subheader_mobile_toggle'\n            });\n\n            // View list\n            KTUtil.on(asideEl, '.kt-nav__item .kt-nav__link[data-action=\"list\"]', 'click', function(e) {\n                var type = KTUtil.attr(this, 'data-type');\n                var listItemsEl = KTUtil.find(listEl, '.kt-inbox__items');\n                var navItemEl = this.closest('.kt-nav__item');\n                var navItemActiveEl = KTUtil.find(asideEl, '.kt-nav__item.kt-nav__item--active');\n\n                // demo loading\n                var loading = new KTDialog({\n                    'type': 'loader',\n                    'placement': 'top center',\n                    'message': 'Loading ...'\n                });\n                loading.show();\n\n                setTimeout(function() {\n                    loading.hide();\n\n                    KTUtil.css(listEl, 'display', 'flex'); // show list\n                    KTUtil.css(viewEl, 'display', 'none'); // hide view\n\n                    KTUtil.addClass(navItemEl, 'kt-nav__item--active');\n                    KTUtil.removeClass(navItemActiveEl, 'kt-nav__item--active');\n\n                    KTUtil.attr(listItemsEl, 'data-type', type);\n                }, 600);\n            });\n        },\n\n        initList: function() {\n            // View message\n            KTUtil.on(listEl, '.kt-inbox__item', 'click', function(e) {\n                var actionsEl = KTUtil.find(this, '.kt-inbox__actions');\n\n                // skip actions click\n                if (e.target === actionsEl || (actionsEl && actionsEl.contains(e.target) === true)) {\n                    return false;\n                }\n\n                // demo loading\n                var loading = new KTDialog({\n                    'type': 'loader',\n                    'placement': 'top center',\n                    'message': 'Loading ...'\n                });\n                loading.show();\n\n                setTimeout(function() {\n                    loading.hide();\n\n                    KTUtil.css(listEl, 'display', 'none');\n                    KTUtil.css(viewEl, 'display', 'flex');\n                }, 700);\n            });\n\n            // Group selection\n            KTUtil.on(listEl, '.kt-inbox__toolbar .kt-inbox__check .kt-checkbox input', 'click', function() {\n                var items = KTUtil.findAll(listEl, '.kt-inbox__items .kt-inbox__item');\n\n                for (var i = 0, j = items.length; i < j; i++) {\n                    var item = items[i];\n                    var checkbox = KTUtil.find(item, '.kt-inbox__actions .kt-checkbox input');\n                    checkbox.checked = this.checked;\n\n                    if (this.checked) {\n                        KTUtil.addClass(item, 'kt-inbox__item--selected');\n                    } else {\n                        KTUtil.removeClass(item, 'kt-inbox__item--selected');\n                    }\n                }\n            });\n\n            // Individual selection\n            KTUtil.on(listEl, '.kt-inbox__item .kt-checkbox input', 'click', function() {\n                var item = this.closest('.kt-inbox__item');\n\n                if (item && this.checked) {\n                    KTUtil.addClass(item, 'kt-inbox__item--selected');\n                } else {\n                    KTUtil.removeClass(item, 'kt-inbox__item--selected');\n                }\n            });\n        },\n\n        initView: function() {\n            // Back to listing\n            KTUtil.on(viewEl, '.kt-inbox__toolbar .kt-inbox__icon.kt-inbox__icon--back', 'click', function() {\n                // demo loading\n                var loading = new KTDialog({\n                    'type': 'loader',\n                    'placement': 'top center',\n                    'message': 'Loading ...'\n                });\n                loading.show();\n\n                setTimeout(function() {\n                    loading.hide();\n\n                    KTUtil.css(listEl, 'display', 'flex');\n                    KTUtil.css(viewEl, 'display', 'none');\n                }, 700);\n            });\n\n            // Expand/Collapse reply\n            KTUtil.on(viewEl, '.kt-inbox__messages .kt-inbox__message .kt-inbox__head', 'click', function(e) {\n                var dropdownToggleEl = KTUtil.find(this, '.kt-inbox__details .kt-inbox__tome .kt-inbox__label');\n                var groupActionsEl = KTUtil.find(this, '.kt-inbox__actions .kt-inbox__group');\n\n                // skip dropdown toggle click\n                if (e.target === dropdownToggleEl || (dropdownToggleEl && dropdownToggleEl.contains(e.target) === true)) {\n                    return false;\n                }\n\n                // skip group actions click\n                if (e.target === groupActionsEl || (groupActionsEl && groupActionsEl.contains(e.target) === true)) {\n                    return false;\n                }\n\n                var message = this.closest('.kt-inbox__message');\n\n                if (KTUtil.hasClass(message, 'kt-inbox__message--expanded')) {\n                    KTUtil.removeClass(message, 'kt-inbox__message--expanded');\n                } else {\n                    KTUtil.addClass(message, 'kt-inbox__message--expanded');\n                }\n            });\n        },\n\n        initReply: function() {\n            initEditor('kt_inbox_reply_editor');\n            initAttachments('kt_inbox_reply_attachments');\n            initForm('kt_inbox_reply_form');\n\n            // Show/Hide reply form\n            KTUtil.on(viewEl, '.kt-inbox__reply .kt-inbox__actions .btn', 'click', function(e) {\n                var reply = this.closest('.kt-inbox__reply');\n\n                if (KTUtil.hasClass(reply, 'kt-inbox__reply--on')) {\n                    KTUtil.removeClass(reply, 'kt-inbox__reply--on');\n                } else {\n                    KTUtil.addClass(reply, 'kt-inbox__reply--on');\n                }\n            });\n\n            // Show reply form for messages\n            KTUtil.on(viewEl, '.kt-inbox__message .kt-inbox__actions .kt-inbox__group .kt-inbox__icon.kt-inbox__icon--reply', 'click', function(e) {\n                var reply = KTUtil.find(viewEl, '.kt-inbox__reply');\n                KTUtil.addClass(reply, 'kt-inbox__reply--on');\n            });\n\n            // Remove reply form\n            KTUtil.on(viewEl, '.kt-inbox__reply .kt-inbox__foot .kt-inbox__icon--remove', 'click', function(e) {\n                var reply = this.closest('.kt-inbox__reply');\n\n                swal.fire({\n                    text: \"Are you sure to discard this reply ?\",\n                    //type: \"error\",\n                    buttonsStyling: false,\n\n                    confirmButtonText: \"Discard reply\",\n                    confirmButtonClass: \"btn btn-danger\",\n\n                    showCancelButton: true,\n                    cancelButtonText: \"Cancel\",\n                    cancelButtonClass: \"btn btn-label-brand\"\n                }).then(function(result) {\n                    if (KTUtil.hasClass(reply, 'kt-inbox__reply--on')) {\n                        KTUtil.removeClass(reply, 'kt-inbox__reply--on');\n                    }\n                });\n            });\n        },\n\n        initCompose: function() {\n            initEditor('kt_inbox_compose_editor');\n            initAttachments('kt_inbox_compose_attachments');\n            initForm('kt_inbox_compose_form');\n\n            // Remove reply form\n            KTUtil.on(composeEl, '.kt-inbox__form .kt-inbox__foot .kt-inbox__secondary .kt-inbox__icon.kt-inbox__icon--remove', 'click', function(e) {\n                swal.fire({\n                    text: \"Are you sure to discard this message ?\",\n                    type: \"danger\",\n                    buttonsStyling: false,\n\n                    confirmButtonText: \"Discard draft\",\n                    confirmButtonClass: \"btn btn-danger\",\n\n                    showCancelButton: true,\n                    cancelButtonText: \"Cancel\",\n                    cancelButtonClass: \"btn btn-label-brand\"\n                }).then(function(result) {\n                    $(composeEl).modal('hide');\n                });\n            });\n        }\n    };\n}();\n\nKTUtil.ready(function() {\n    KTAppInbox.init();\n});\n\n\n//# sourceURL=webpack:///../src/assets/js/pages/custom/inbox/inbox.js?");

/***/ })

/******/ });