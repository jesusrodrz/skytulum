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
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/js/admin.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/admin.js":
/*!*************************!*\
  !*** ./src/js/admin.js ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\n\n__webpack_require__(/*! ../scss/admin.scss */ \"./src/scss/admin.scss\");\n\nfunction _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nvar Gallery = function Gallery(gallery, addBtn, figClass) {\n  var _this = this;\n\n  _classCallCheck(this, Gallery);\n\n  this.init = function () {\n    _this.gallery.addEventListener(\"click\", _this.handleClick);\n  };\n\n  this.helper = function (url) {\n    console.log(_this.target);\n    // this.target\n    _this.target.getElementsByTagName('input')[0].value = url;\n    _this.target.getElementsByTagName('img')[0].src = url;\n  };\n\n  this.openMediaSingle = function (element) {\n    _this.target = element;\n    if (_this.wp_media_s) {\n      _this.wp_media_s.open();\n      return;\n    }\n    _this.wp_media_s = wp.media.frames.wp_media_s = wp.media({\n      title: _this.gallery.dataset.titleS,\n      button: {\n        text: _this.gallery.dataset.button\n      }\n    });\n    _this.wp_media_s.on('select', function () {\n\n      var attachment = _this.wp_media_s.state().get('selection').first().toJSON();\n      _this.helper(attachment.url);\n    });\n    _this.wp_media_s.open();\n  };\n\n  this.openMedia = function () {\n    if (_this.wp_media) {\n      _this.wp_media.open();\n      return;\n    }\n    // Sets up the media library frame\n    _this.wp_media = wp.media.frames.wp_media = wp.media({\n      title: _this.gallery.dataset.title,\n      button: {\n        text: _this.gallery.dataset.button\n      },\n      multiple: true\n    });\n\n    _this.wp_media.on('select', function () {\n      var attachments = _this.wp_media.state().get('selection').map(function (e) {\n\n        e.toJSON();\n        var item = {\n          url: e.attributes.url,\n          id: e.id\n        };\n        return item;\n      });\n\n      attachments.forEach(function (item) {\n        _this.addImg(item.url);\n      });\n    });\n\n    _this.wp_media.open();\n  };\n\n  this.handleClick = function (e) {\n    e.preventDefault();\n    var target = e.target;\n    // console.log(target)\n    if (target === _this.addBtn) _this.openMedia();\n\n    if (target.closest('.gallery__close')) {\n\n      _this.remove(target.closest('.gallery__fig'), _this.images);\n    } else if (target.closest('.gallery__fig')) {\n\n      _this.openMediaSingle(target.closest('.gallery__fig'));\n    }\n  };\n\n  this.remove = function (element, items) {\n    _this.gallery.removeChild(element);\n    items.splice(items.indexOf(element), 1);\n    items.forEach(function (e, index) {\n      e.getElementsByTagName('input')[0].name = _this.gallery.dataset.name + '[' + index + ']';\n    });\n  };\n\n  this.addImg = function () {\n    var imgSrc = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'img/src';\n\n    var fig = document.createElement('figure'),\n        img = document.createElement('img'),\n        input = document.createElement('input'),\n        close = document.createElement('button');\n\n    input.type = 'text';\n    input.name = _this.gallery.dataset.name + '[' + _this.images.length + ']';\n    img.src = imgSrc;\n    input.value = imgSrc;\n    fig.classList.add('gallery__fig');\n    img.classList.add('gallery__img');\n    input.classList.add('gallery__input');\n    close.classList.add('gallery__close');\n    close.classList.add('gallery__btn');\n    fig.appendChild(img);\n    fig.appendChild(input);\n    fig.appendChild(close);\n\n    _this.gallery.insertBefore(fig, _this.addBtn);\n    _this.images.push(fig);\n  };\n\n  this.gallery = document.getElementById(gallery);\n  this.addBtn = document.getElementById(addBtn);\n  this.images = [].concat(_toConsumableArray(this.gallery.getElementsByClassName(figClass)));\n};\n\nvar gallery = new Gallery('galleryContainer', 'addBtn', 'gallery__fig');\ngallery.init();\n// alert('aquita')\n\n//# sourceURL=webpack:///./src/js/admin.js?");

/***/ }),

/***/ "./src/scss/admin.scss":
/*!*****************************!*\
  !*** ./src/scss/admin.scss ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./src/scss/admin.scss?");

/***/ })

/******/ });