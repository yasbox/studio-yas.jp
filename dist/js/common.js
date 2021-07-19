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

/***/ "./src/js/common.js":
/*!**************************!*\
  !*** ./src/js/common.js ***!
  \**************************/
/***/ (() => {

eval("// メニューボタン\n$(function () {\n    //　ボタンクリックで開閉\n    $('#menu_button').click(function () {\n        $(this).next('#menu_list').stop(true, true).slideToggle();\n    });\n    //　画面をクリックで閉じる\n    $(document).on(\"touchstart click\", function (e) {\n        if (!$(e.target).is('#menu_button, #menu_list')) {\n            var windowSize = $(window).width();\n            if ($('#menu_list').is(':visible') && windowSize < 768) {\n                $('#menu_list').slideUp();\n            }\n        }\n    });\n    //　親要素への伝搬を無効にする（画面クリック判定用）\n    $(document).on('touchstart click', '#menu_button', function (e) {\n        e.stopPropagation();\n    })\n\n    //　ウィンドウサイズがモバイル幅を超えた場合、メニューを戻す\n    $(window).on('resize', function () {\n        var windowSize = $(window).width();\n        if (windowSize > 768) {\n            $('#menu_list').show();\n        } else {\n            $('#menu_list').hide();\n        }\n    });\n});\n\n\n//# sourceURL=webpack://mytheme/./src/js/common.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/js/common.js"]();
/******/ 	
/******/ })()
;