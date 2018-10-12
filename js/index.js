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
eval("\n\n__webpack_require__(/*! ../scss/style.scss */ \"./src/scss/style.scss\");\n\nfunction _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nvar Menu = function Menu(options) {\n  var _this = this;\n\n  _classCallCheck(this, Menu);\n\n  this.init = function () {\n    _this.Nav.addEventListener('click', _this.handleClick);\n  };\n\n  this.close = function () {\n    _this.menu.classList.remove('active');\n  };\n\n  this.open = function () {\n    _this.menu.classList.add('active');\n  };\n\n  this.createModal = function () {\n    _this.contact = document.getElementById(_this.contactId).cloneNode(true);\n    var modal = document.createElement('div');\n    modal.classList.add('modal-contact');\n    _this.closeContactBtn = _this.closeBtn.cloneNode(true);\n    _this.closeContactBtn.classList.add('close-contact');\n    _this.contact.appendChild(_this.closeContactBtn);\n    _this.menuModal = _this.menu.cloneNode(true);\n    _this.closeMenuBtn = _this.closeBtn.cloneNode(true);\n    _this.closeMenuBtn.classList.add('close-btn');\n    _this.menuModal.prepend(_this.closeMenuBtn);\n    modal.appendChild(_this.menuModal);\n    modal.appendChild(_this.contact);\n    modal.addEventListener('click', _this.handleClick);\n\n    return modal;\n  };\n\n  this.closeContact = function () {\n    _this.body.classList.remove('overflow-hidden');\n    _this.modal.classList.remove('active');\n    _this.modal.classList.toggle('nav');\n  };\n\n  this.openContact = function (isNav) {\n\n    if (!_this.modal) _this.modal = _this.createModal();\n\n    _this.body.classList.add('overflow-hidden');\n    _this.modal.classList.add('active');\n    _this.modal.classList.add('active');\n    if (isNav) _this.modal.classList.add('nav');\n    _this.body.appendChild(_this.modal);\n  };\n\n  this.handleClick = function (e) {\n    // e.preventDefault();\n    console.log(e, e.target);\n    var target = e.target,\n        isLink = e.target.parentElement.nodeName === 'LI';\n    // check if is a link and not a button\n    if (!isLink) e.preventDefault();\n\n    // mobile menu\n    if (window.innerWidth < 864) {\n\n      if (_this.openBtn.contains(target)) _this.open();\n      if (_this.closeBtn.contains(target)) _this.close();\n    }\n    //Desktop\n    if (window.innerWidth >= 864) {\n\n      if (_this.openBtn.contains(target)) _this.openContact(true);\n      if (_this.cta.contains(target)) _this.openContact(false);\n      if (_this.closeBtn.contains(target)) _this.closeContact();\n      if (_this.closeContactBtn.contains(target)) _this.closeContact();\n      if (_this.closeMenuBtn.contains(target)) _this.closeContact();\n      if (_this.modal === target) _this.closeContact();\n    }\n  };\n\n  this.Nav = document.getElementById(options.nav);\n  this.openBtn = document.getElementById(options.open);\n  this.closeBtn = document.getElementById(options.close);\n  this.menu = document.getElementById(options.menu);\n  this.cta = document.getElementById(options.cta);\n  this.contactId = options.contact;\n  this.body = document.body;\n  this.state = false;\n};\n\nvar nav = new Menu({\n  nav: 'mainNavigation',\n  menu: 'mainMenu',\n  open: 'menuOpen',\n  close: 'menuClose',\n  cta: 'ctaBtn',\n  contact: 'contact'\n});\n\nnav.init();\n\nvar ScrollToTop = function ScrollToTop(btnId) {\n  var _this2 = this;\n\n  _classCallCheck(this, ScrollToTop);\n\n  this.toTop = function () {\n    window.scroll({\n      top: 0,\n      behavior: \"smooth\"\n    });\n  };\n\n  this.toggleBtn = function () {\n    var position = window.pageYOffset,\n        height = window.innerHeight;\n\n    if (position <= height && _this2.btn.classList.contains('active')) _this2.btn.classList.remove('active');\n    if (position >= height && !_this2.btn.classList.contains('active')) _this2.btn.classList.add('active');\n  };\n\n  this.init = function () {\n    if (_this2.btn) {\n      _this2.btn.addEventListener('click', _this2.toTop);\n    }\n\n    window.addEventListener('scroll', _this2.toggleBtn);\n  };\n\n  this.btn = document.getElementById(btnId);\n};\n\nvar toTopBtn = new ScrollToTop('btnUp');\ntoTopBtn.init();\n\nvar Lightbox = function Lightbox(lightboxId, btnId) {\n  var _this3 = this;\n\n  _classCallCheck(this, Lightbox);\n\n  this.getImages = function () {\n    var images = [].concat(_toConsumableArray(_this3.lightbox.getElementsByClassName('gallery__img')));\n\n    var imagesSrc = _this3.lightbox.dataset.images.split(',');\n    console.log(_this3.lightbox.dataset.images);\n    var imagesLazy = imagesSrc.map(function (src) {\n      var img = document.createElement('img');\n      img.classList.add('lightbox__img');\n      img.src = src;\n      return img;\n    }),\n        imagesLightbox = images.map(function (imgOld) {\n      var img = imgOld.cloneNode(true);\n      img.classList.add('lightbox__img');\n      img.classList.remove('gallery__img');\n      return img;\n    });\n\n    var imagesR = _this3.lightbox.dataset.images && _this3.lightbox.dataset.images !== '' && _this3.lightbox.dataset.images !== ' ' ? imagesLightbox.concat(imagesLazy) : imagesLightbox;\n    imagesR.forEach(function (e) {\n      _this3.modal.append(e);\n    });\n    return imagesR;\n  };\n\n  this.open = function (target) {\n    if (!_this3.modal) _this3.create();\n    _this3.images = _this3.getImages();\n    _this3.body.classList.add('overflow-hidden');\n    _this3.modal.classList.add('active');\n\n    if (target === null) {\n      _this3.images[0].classList.add('active');\n      _this3.curretImage = _this3.images[0];\n      _this3.modal.append(_this3.curretImage);\n    }\n  };\n\n  this.change = function (newImage, oldImage) {\n    _this3.curretImage = newImage;\n    oldImage.classList.remove('active');\n    newImage.classList.add('active');\n  };\n\n  this.next = function () {\n    var index = _this3.imgIndex(),\n        newImage = index < _this3.images.length - 1 ? _this3.images[index + 1] : _this3.images[0];\n    _this3.change(newImage, _this3.curretImage);\n  };\n\n  this.imgIndex = function () {\n    return _this3.images.indexOf(_this3.curretImage);\n  };\n\n  this.prev = function () {\n    var index = _this3.imgIndex(),\n        newImage = index > 0 ? _this3.images[index - 1] : _this3.images[_this3.images.length - 1];\n    _this3.change(newImage, _this3.curretImage);\n  };\n\n  this.close = function () {\n    _this3.body.classList.remove('overflow-hidden');\n    _this3.modal.classList.remove('active');\n  };\n\n  this.create = function () {\n    _this3.modal = document.createElement('div');\n    _this3.modal.classList.add('lightbox');\n    _this3.btnNext = document.createElement('button');\n    _this3.btnNext.classList.add('lightbox__next');\n    _this3.btnNext.innerHTML = '<i class=\"icon-arrow-right\"></i>';\n    _this3.btnPrev = document.createElement('button');\n    _this3.btnPrev.classList.add('lightbox__prev');\n    _this3.btnPrev.innerHTML = '<i class=\"icon-arrow-left\"></i>';\n    _this3.btnClose = document.createElement('button');\n    _this3.btnClose.innerHTML = '&times;';\n    _this3.btnClose.classList.add('lightbox__close');\n    _this3.modal.append(_this3.btnNext);\n    _this3.modal.append(_this3.btnPrev);\n    _this3.modal.append(_this3.btnClose);\n    _this3.lightbox.append(_this3.modal);\n  };\n\n  this.handleClick = function (e) {\n    var target = e.target;\n    console.log(target);\n    if (_this3.btn === target) _this3.open(null);\n    if (_this3.btnNext.contains(target)) _this3.next();\n    if (_this3.btnPrev.contains(target)) _this3.prev();\n    if (_this3.btnClose.contains(target)) _this3.close();\n    if (_this3.modal === target) _this3.close();\n  };\n\n  this.init = function () {\n    if (_this3.lightbox) _this3.lightbox.addEventListener('click', _this3.handleClick);\n  };\n\n  this.lightbox = document.getElementById(lightboxId);\n  this.btn = document.getElementById(btnId);\n  this.body = document.body;\n  this.images = function () {\n    var images = [].concat(_toConsumableArray(_this3.lightbox.getElementsByClassName('gallery__img'))),\n        imagesSrc = _this3.lightbox.dataset.images.split(','),\n        imagesLazy = imagesSrc.map(function (src) {\n      var img = document.createElement('img');\n      img.classList.add('lightbox__img');\n      img.src = src;\n      return img;\n    });\n    console.log(images, images.contact(imagesLazy));\n    return images.contact(imagesLazy);\n  };\n};\n\nvar lightbox = new Lightbox('galleryTulum', 'galleryBtn');\nlightbox.init();\n\n//# sourceURL=webpack:///./src/js/index.js?");

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