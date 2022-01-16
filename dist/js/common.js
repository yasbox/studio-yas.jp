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

eval("// メニューボタン\n$(function () {\n    //　ボタンクリックで開閉\n    $('#mobile_menu_btn').click(function () {\n        $('#main-nav').stop(true, true).slideToggle();\n    });\n    //　画面をクリックで閉じる\n    $(document).on(\"touchstart click\", function (e) {\n        if (!$(e.target).is('#mobile_menu_btn, #main-nav')) {\n            var windowSize = $(window).width();\n            if ($('#main-nav').is(':visible') && windowSize < 768) {\n                $('#main-nav').slideUp();\n            }\n        }\n    });\n    //　親要素への伝搬を無効にする（画面クリック判定用）\n    $(document).on('touchstart click', '#mobile_menu_btn', function (e) {\n        e.stopPropagation();\n    })\n\n    //　ウィンドウサイズがモバイル幅を超えた場合、メニューを戻す\n    $(window).on('resize', function () {\n        var windowSize = $(window).width();\n        if (windowSize > 768) {\n            $('#main-nav').show();\n        } else {\n            $('#main-nav').hide();\n        }\n    });\n});\n\n\n// ローディングcircle\n$(window).on('load', function () {\n\n    // 最大サークルサイズ算出\n    let circle_size = 0;\n    if ($(window).width() > $(window).height()) {\n        circle_size = $(window).width() * 1.5;\n    } else {\n        circle_size = $(window).height() * 1.5;\n    }\n    // サークルサイズ設定\n    $('.open_circle').css({\n        'min-width': circle_size,\n        'min-height': circle_size\n    });\n\n    $('.loading_wrap').css({\n        'background-color': 'transparent',\n    });\n\n    // サークルサイズを大きくしていく\n    let count = 0;\n    const countUp = () => {\n        count++;\n\n        $('.open_circle').css({\n            'background': `radial-gradient(rgba(234,239,247,0) ${count}%, rgba(234,239,247,1) ${count + 5}%)`\n        });\n    }\n    const intervalId = setInterval(() => {\n        countUp();\n        if (count > 100) {\n            clearInterval(intervalId);\n            $('.loading_wrap').hide();\n        }\n    }, 10);\n});\n\n\n//# sourceURL=webpack://mytheme/./src/js/common.js?");

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