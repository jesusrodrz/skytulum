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
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/js/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/index.js":
/*!*************************!*\
  !*** ./src/js/index.js ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\n\n__webpack_require__(/*! ../scss/style.scss */ \"./src/scss/style.scss\");\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nvar Menu = function Menu(options) {\n  var _this = this;\n\n  _classCallCheck(this, Menu);\n\n  this.init = function () {\n    _this.Nav.addEventListener('click', _this.handleClick);\n  };\n\n  this.close = function () {\n    _this.menu.classList.remove('active');\n  };\n\n  this.open = function () {\n    _this.menu.classList.add('active');\n  };\n\n  this.createModal = function () {\n    _this.contact = document.getElementById(_this.contactId).cloneNode(true);\n    var modal = document.createElement('div');\n    modal.classList.add('modal-contact');\n    _this.closeContactBtn = _this.closeBtn.cloneNode(true);\n    _this.closeContactBtn.classList.add('close-contact');\n    _this.contact.appendChild(_this.closeContactBtn);\n    _this.menuModal = _this.menu.cloneNode(true);\n    // console.log(this.closeBtn,this.menuModal,this.closeContactBtn)\n    _this.closeMenuBtn = _this.closeBtn.cloneNode(true);\n    _this.closeMenuBtn.classList.add('close-btn');\n    _this.menuModal.prepend(_this.closeMenuBtn);\n    modal.appendChild(_this.menuModal);\n    modal.appendChild(_this.contact);\n    modal.addEventListener('click', _this.handleClick);\n\n    return modal;\n  };\n\n  this.closeContact = function () {\n    _this.body.classList.remove('overflow-hidden');\n    _this.modal.classList.remove('active');\n    _this.modal.classList.toggle('nav');\n  };\n\n  this.openContact = function (isNav) {\n\n    if (!_this.modal) _this.modal = _this.createModal();\n\n    _this.body.classList.add('overflow-hidden');\n    _this.modal.classList.add('active');\n    _this.modal.classList.add('active');\n    if (isNav) _this.modal.classList.add('nav');\n    _this.body.appendChild(_this.modal);\n  };\n\n  this.handleClick = function (e) {\n    // e.preventDefault();\n    console.log(e, e.target);\n    var target = e.target,\n        isLink = e.target.parentElement.nodeName === 'LI';\n    // check if is a link and not a button\n    if (!isLink) e.preventDefault();\n\n    // mobile menu\n    if (window.innerWidth < 864) {\n\n      if (_this.openBtn.contains(target)) _this.open();\n      if (_this.closeBtn.contains(target)) _this.close();\n    }\n    //Desktop\n    if (window.innerWidth >= 864) {\n\n      if (_this.openBtn.contains(target)) _this.openContact(true);\n      if (_this.cta.contains(target)) _this.openContact(false);\n      if (_this.closeBtn.contains(target)) _this.closeContact();\n      if (_this.closeContactBtn.contains(target)) _this.closeContact();\n      if (_this.closeMenuBtn.contains(target)) _this.closeContact();\n      if (_this.modal === target) _this.closeContact();\n    }\n  };\n\n  this.Nav = document.getElementById(options.nav);\n  this.openBtn = document.getElementById(options.open);\n  this.closeBtn = document.getElementById(options.close);\n  // this.closeBtnContact = document.getElementById(options.close)\n  this.menu = document.getElementById(options.menu);\n  this.cta = document.getElementById(options.cta);\n  this.contactId = options.contact;\n  this.body = document.body;\n  this.state = false;\n};\n\nvar nav = new Menu({\n  nav: 'mainNavigation',\n  menu: 'mainMenu',\n  open: 'menuOpen',\n  close: 'menuClose',\n  cta: 'ctaBtn',\n  contact: 'contact'\n});\n\nnav.init();\n\n//# sourceURL=webpack:///./src/js/index.js?");

/***/ }),

/***/ "./src/scss/style.scss":
/*!*****************************!*\
  !*** ./src/scss/style.scss ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./src/scss/style.scss?");

/***/ })

/******/ });