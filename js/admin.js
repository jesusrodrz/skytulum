!function(n){var i={};function a(e){if(i[e])return i[e].exports;var t=i[e]={i:e,l:!1,exports:{}};return n[e].call(t.exports,t,t.exports,a),t.l=!0,t.exports}a.m=n,a.c=i,a.d=function(e,t,n){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(t,e){if(1&e&&(t=a(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(a.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)a.d(n,i,function(e){return t[e]}.bind(null,i));return n},a.n=function(t){var e=t&&t.__esModule?function e(){return t.default}:function e(){return t};return a.d(e,"a",e),e},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="",a(a.s=4)}({4:function(e,t,n){"use strict";var a=function(){function i(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(e,t,n){return t&&i(e.prototype,t),n&&i(e,n),e}}();function r(e){if(Array.isArray(e)){for(var t=0,n=Array(e.length);t<e.length;t++)n[t]=e[t];return n}return Array.from(e)}function s(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}n(5);var i=function e(t,n,i){var l=this;s(this,e),this.init=function(){l.gallery&&l.gallery.addEventListener("click",l.handleClick)},this.helper=function(e){console.log(l.target),l.target.getElementsByTagName("input")[0].value=e,l.target.getElementsByTagName("img")[0].src=e},this.openMediaSingle=function(e){l.target=e,l.wp_media_s||(l.wp_media_s=wp.media.frames.wp_media_s=wp.media({title:l.gallery.dataset.titleS,button:{text:l.gallery.dataset.button}}),l.wp_media_s.on("select",function(){var e=l.wp_media_s.state().get("selection").first().toJSON();l.helper(e.url)})),l.wp_media_s.open()},this.openMedia=function(){l.wp_media||(l.wp_media=wp.media.frames.wp_media=wp.media({title:l.gallery.dataset.title,button:{text:l.gallery.dataset.button},multiple:!0}),l.wp_media.on("select",function(){var e;l.wp_media.state().get("selection").map(function(e){var t;return e.toJSON(),{url:e.attributes.url,id:e.id}}).forEach(function(e){l.addImg(e.url)})})),l.wp_media.open()},this.handleClick=function(e){e.preventDefault();var t=e.target;t===l.addBtn&&l.openMedia(),t.closest(".gallery__close")?l.remove(t.closest(".gallery__fig"),l.images):t.closest(".gallery__fig")&&l.openMediaSingle(t.closest(".gallery__fig"))},this.remove=function(e,t){l.gallery.removeChild(e),t.splice(t.indexOf(e),1),t.forEach(function(e,t){e.getElementsByTagName("input")[0].name=l.gallery.dataset.name+"["+t+"]"})},this.addImg=function(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:"img/src",t=document.createElement("figure"),n=document.createElement("img"),i=document.createElement("input"),a=document.createElement("button");i.type="text",i.name=l.gallery.dataset.name+"["+l.images.length+"]",n.src=e,i.value=e,t.classList.add("gallery__fig"),n.classList.add("gallery__img"),i.classList.add("gallery__input"),a.classList.add("gallery__close"),a.classList.add("gallery__btn"),t.appendChild(n),t.appendChild(i),t.appendChild(a),l.gallery.insertBefore(t,l.addBtn),l.images.push(t)},this.gallery=t,this.addBtn=document.getElementById(n),this.images=[].concat(r(this.gallery.getElementsByClassName(i)))},l=document.getElementById("galleryContainer"),o;l&&new i(l,"addBtn","gallery__fig").init();var d=document.getElementById("sliderContainer"),c;d&&new i(d,"sliderAddBtn","gallery__fig").init();var u=function e(t){var n=this;s(this,e),this.close=function(){n.inputText.value="",n.image.src=""},this.openMediaSingle=function(e){if(e.target.classList.contains("gallery__close"))return e.preventDefault(),void n.close();n.wp_media_s||(n.wp_media_s=wp.media.frames.wp_media_s=wp.media({title:n.fig.dataset.title,button:{text:n.fig.dataset.button}}),n.wp_media_s.on("select",function(){var e=n.wp_media_s.state().get("selection").first().toJSON();n.setImage(e.url)})),n.wp_media_s.open()},this.setImage=function(e){if(n.fig.getElementsByTagName("input")[0].value=e,n.fig.getElementsByTagName("img")[0])n.fig.getElementsByTagName("img")[0].src=e;else{var t=document.createElement("img");t.src=e,t.classList.add("gallery__img"),n.fig.appendChild(t)}},this.init=function(){n.fig.addEventListener("click",n.openMediaSingle)},this.fig=t,this.inputText=this.fig.getElementsByTagName("input")[0],this.image=this.fig.getElementsByTagName("img")[0]},g=document.getElementById("imageField"),m;g&&new u(g).init();var f=[].concat(r(document.getElementsByClassName("images-field")));f&&f.forEach(function(e){var t;new u(e).init()});var p=document.getElementById("heroField"),y;p&&new u(p).init();var _=function(){function i(e,t){var n=this;s(this,i),this.handleClick=function(e){e.target===n.btn&&n.add(),e.target.classList.contains("list__remove")&&n.remove(e.target.closest("."))},this.list=e,this.btn=document.getElementById(t)}return a(i,[{key:"init",value:function e(){this.list.addEventListener("click",this.handleClick)}}]),i}(),h=document.getElementById("imageField"),v;h&&new _(h,"listBtn").init()},5:function(e,t,n){}});