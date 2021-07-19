/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/canvas_script.js":
/*!*********************************!*\
  !*** ./src/js/canvas_script.js ***!
  \*********************************/
/***/ (() => {

eval("window.requestAnimFrame = (function () {\r\n    return window.requestAnimationFrame ||\r\n        window.webkitRequestAnimationFrame ||\r\n        window.mozRequestAnimationFrame ||\r\n        window.oRequestAnimationFrame ||\r\n        window.msRequestAnimationFrame ||\r\n        function (callback) {\r\n            window.setTimeout(callback, 1000 / 60);\r\n        };\r\n})();\r\n\r\n/*\r\nParticle.prototype.draw = function () {\r\n    ctx.beginPath();\r\n    ctx.arc(this.position.x, this.position.y, this.scale, 0, 2 * Math.PI, false);\r\n    ctx.fillStyle = this.color;\r\n    ctx.fill();\r\n};\r\n*/\r\n\r\nvar Particle = function (scale, color, vx, vy, gv) {\r\n    this.scale = scale; //大きさ\r\n    this.color = color; //色\r\n    this.vx = vx; //X速度\r\n    this.vy = vy; //Y速度\r\n    this.gv = gv; //重力\r\n    this.position = {   // 位置\r\n        x: 0,\r\n        y: 0\r\n    };\r\n};\r\n\r\nParticle.prototype.update = function (i) {\r\n    this.vy += this.gv;\r\n    this.position.x += this.vx;\r\n    this.position.y += this.vy;\r\n\r\n    var vx_val = 0.85;\r\n    var vy_val = 0.6;\r\n    \r\n\r\n    // 地面の衝突判定\r\n    if (this.position.y > canvas.height - this.scale) {\r\n        this.vy *= -vy_val;\r\n        this.vx *= vx_val;\r\n        this.position.y = canvas.height - this.scale;\r\n    }\r\n    // 側面（右）の衝突判定\r\n    if (this.position.x > canvas.width - this.scale) {\r\n        this.vy *= vy_val;\r\n        this.vx *= -vx_val;\r\n        this.position.x = canvas.width - this.scale;\r\n    }\r\n    // 側面（左）の衝突判定\r\n    if (this.position.x < 0) {\r\n        this.vy *= vy_val;\r\n        this.vx *= -vx_val;\r\n        this.position.x = -(this.position.x);\r\n    }\r\n\r\n    for (var ii = 0; ii < particles.length; ii++) {\r\n\r\n        if (i != ii) {\r\n\r\n            var other = particles[ii];\r\n            var mine = particles[i];\r\n            var this_scale = this.scale;\r\n            var distance = Math.sqrt(Math.pow(mine.position.x - other.position.x, 2) + Math.pow(mine.position.y - other.position.y, 2));// ２点間の距離\r\n\r\n            if (distance < this_scale) {\r\n\r\n                if (mine.position.x < other.position.x) {\r\n                    this.vy *= vy_val;\r\n                    this.vx *= -vx_val;\r\n                    this.position.x = mine.position.x - (this_scale - (other.position.x - mine.position.x));\r\n                } else {\r\n                    this.vy *= vy_val;\r\n                    this.vx *= -vx_val;\r\n                    this.position.x = mine.position.x + (this_scale - (mine.position.x - other.position.x));\r\n                }\r\n            }\r\n        }\r\n    }\r\n\r\n    //this.draw();\r\n    objmove(i, this.position.x, this.position.y);\r\n};\r\n\r\n$(function () {\r\n\r\n    particles = []; //パーティクルをまとめる配列\r\n    var density = 4;  //パーティクルの密度\r\n    var color = '#fff';\r\n    var scale = $('.menubox').eq(0).width();\r\n    var canvas_width = $('#canvas_container').width();\r\n    var start_position = (canvas_width / 2) - (scale * density);\r\n    var x = 0;\r\n    var y = 0;\r\n    var g = 0;\r\n\r\n    for (var i = 0; i < density; i++) {\r\n        x = (Math.random() * 10) - 5;\r\n        y = (Math.random() * 9) + 4;\r\n        g = (Math.random() * 0.2) + 0.3;\r\n        \r\n        particles[i] = new Particle(scale, color, x, -y, g);\r\n        particles[i].position.x = start_position;\r\n        particles[i].position.y = (scale * 2);\r\n        start_position += (scale * 2);\r\n    }\r\n\r\n    setTimeout(function () {\r\n        loop();\r\n    }, 500);\r\n    \r\n\r\n});\r\n\r\n$(window).on('load', function () {\r\n\r\n    canvas = document.querySelector('#canvas_container');\r\n    ctx = canvas.getContext('2d');\r\n\r\n});\r\n\r\n// ループ処理\r\nfunction loop() {\r\n    requestAnimFrame(loop);\r\n    // 描画をクリアー\r\n    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);\r\n    for (var i in particles) {\r\n        particles[i].update(i);\r\n    }\r\n}\r\n\r\nfunction objmove(i, x, y) {\r\n    $('#objbox' + i).css({ 'top': y });\r\n    $('#objbox' + i).css({ 'left': x });\r\n};\r\n\r\n$(window).on('load resize', function () {\r\n\r\n    \r\n\r\n    //　canvasサイズ指定　リサイズ\r\n    //canvas.width = $('#canvas_container').width();\r\n    //canvas.height = $('#canvas_container').height();\r\n\r\n    CanvasResizeToSame(document.getElementById('canvas_container'));\r\n\r\n    /*\r\n    var w = $('#obj_container').width();\r\n    var h = $('#obj_container').height();\r\n    $('#canvas_container').attr('width', w);\r\n    $('#canvas_container').attr('height', h);\r\n    */\r\n});\r\n\r\n// ------------------------------------------------------------\r\n// キャンバスのサイズを等倍に補正する関数\r\n// ------------------------------------------------------------\r\nfunction CanvasResizeToSame(mycanvas) {\r\n    var style = mycanvas.ownerDocument.defaultView.getComputedStyle(mycanvas, \"\");\r\n    mycanvas.width = Math.round(parseFloat(style.width));\r\n    mycanvas.height = Math.round(parseFloat(style.height));\r\n}\n\n//# sourceURL=webpack://mytheme/./src/js/canvas_script.js?");

/***/ }),

/***/ "./src/js/index.js":
/*!*************************!*\
  !*** ./src/js/index.js ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _canvas_script__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./canvas_script */ \"./src/js/canvas_script.js\");\n/* harmony import */ var _canvas_script__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_canvas_script__WEBPACK_IMPORTED_MODULE_0__);\n\r\n\r\n$(function () {\r\n\r\n    // タイトル表示\r\n    setTimeout(function () {\r\n        $('.site_title_space').fadeIn();\r\n    }, 1000);\r\n\r\n});\n\n//# sourceURL=webpack://mytheme/./src/js/index.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/js/index.js");
/******/ 	
/******/ })()
;