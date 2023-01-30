/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/view_witel.js":
/*!************************************!*\
  !*** ./resources/js/view_witel.js ***!
  \************************************/
/***/ (() => {

eval("var dt = luxon.DateTime;\n$(document).ready(function () {\n  setInterval(function () {\n    var now = dt.now();\n    var currentDtReadable = now.toLocaleString({\n      weekday: 'long',\n      month: 'long',\n      day: '2-digit',\n      year: 'numeric'\n    });\n    var localTime = now.toFormat('HH:mm');\n    $('.date').text(currentDtReadable);\n    $('.time').text(localTime);\n  }, 1000);\n  $(\"#example1\").DataTable({\n    \"responsive\": true,\n    \"lengthChange\": false,\n    \"autoWidth\": false,\n    \"buttons\": [\"copy\", \"csv\", \"excel\", \"pdf\", \"print\", \"colvis\"]\n  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');\n  $('#example2').DataTable({\n    \"paging\": true,\n    \"lengthChange\": false,\n    \"searching\": false,\n    \"ordering\": true,\n    \"info\": true,\n    \"autoWidth\": false,\n    \"responsive\": true\n    // \"lengthMenu\": [ [10, 25, 50, -1], [10, 25, 50, \"All\"] ],\n    // \"pageLength\": 50\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJkdCIsImx1eG9uIiwiRGF0ZVRpbWUiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsInNldEludGVydmFsIiwibm93IiwiY3VycmVudER0UmVhZGFibGUiLCJ0b0xvY2FsZVN0cmluZyIsIndlZWtkYXkiLCJtb250aCIsImRheSIsInllYXIiLCJsb2NhbFRpbWUiLCJ0b0Zvcm1hdCIsInRleHQiLCJEYXRhVGFibGUiLCJidXR0b25zIiwiY29udGFpbmVyIiwiYXBwZW5kVG8iXSwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL3ZpZXdfd2l0ZWwuanM/OTIxNCJdLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCBkdCA9IGx1eG9uLkRhdGVUaW1lO1xyXG5cclxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XHJcbiAgc2V0SW50ZXJ2YWwoKCkgPT4ge1xyXG4gICAgY29uc3Qgbm93ID0gZHQubm93KCk7XHJcbiAgICBjb25zdCBjdXJyZW50RHRSZWFkYWJsZSA9IG5vdy50b0xvY2FsZVN0cmluZyh7d2Vla2RheTogJ2xvbmcnLCBtb250aDogJ2xvbmcnLCBkYXk6ICcyLWRpZ2l0JywgeWVhcjogJ251bWVyaWMnfSk7XHJcbiAgICBjb25zdCBsb2NhbFRpbWUgPSBub3cudG9Gb3JtYXQoJ0hIOm1tJyk7XHJcbiAgICAkKCcuZGF0ZScpLnRleHQoY3VycmVudER0UmVhZGFibGUpO1xyXG4gICAgJCgnLnRpbWUnKS50ZXh0KGxvY2FsVGltZSk7XHJcbiAgfSwgMTAwMCk7XHJcblxyXG4gICQoXCIjZXhhbXBsZTFcIikuRGF0YVRhYmxlKHtcclxuICAgIFwicmVzcG9uc2l2ZVwiOiB0cnVlLCBcImxlbmd0aENoYW5nZVwiOiBmYWxzZSwgXCJhdXRvV2lkdGhcIjogZmFsc2UsXHJcbiAgICBcImJ1dHRvbnNcIjogW1wiY29weVwiLCBcImNzdlwiLCBcImV4Y2VsXCIsIFwicGRmXCIsIFwicHJpbnRcIiwgXCJjb2x2aXNcIl1cclxuICB9KS5idXR0b25zKCkuY29udGFpbmVyKCkuYXBwZW5kVG8oJyNleGFtcGxlMV93cmFwcGVyIC5jb2wtbWQtNjplcSgwKScpO1xyXG4gICQoJyNleGFtcGxlMicpLkRhdGFUYWJsZSh7XHJcbiAgICBcInBhZ2luZ1wiOiB0cnVlLFxyXG4gICAgXCJsZW5ndGhDaGFuZ2VcIjogZmFsc2UsXHJcbiAgICBcInNlYXJjaGluZ1wiOiBmYWxzZSxcclxuICAgIFwib3JkZXJpbmdcIjogdHJ1ZSxcclxuICAgIFwiaW5mb1wiOiB0cnVlLFxyXG4gICAgXCJhdXRvV2lkdGhcIjogZmFsc2UsXHJcbiAgICBcInJlc3BvbnNpdmVcIjogdHJ1ZSxcclxuICAgIC8vIFwibGVuZ3RoTWVudVwiOiBbIFsxMCwgMjUsIDUwLCAtMV0sIFsxMCwgMjUsIDUwLCBcIkFsbFwiXSBdLFxyXG4gICAgLy8gXCJwYWdlTGVuZ3RoXCI6IDUwXHJcbiAgfSk7XHJcbn0pOyJdLCJtYXBwaW5ncyI6IkFBQUEsSUFBTUEsRUFBRSxHQUFHQyxLQUFLLENBQUNDLFFBQVE7QUFFekJDLENBQUMsQ0FBQ0MsUUFBUSxDQUFDLENBQUNDLEtBQUssQ0FBQyxZQUFXO0VBQzNCQyxXQUFXLENBQUMsWUFBTTtJQUNoQixJQUFNQyxHQUFHLEdBQUdQLEVBQUUsQ0FBQ08sR0FBRyxFQUFFO0lBQ3BCLElBQU1DLGlCQUFpQixHQUFHRCxHQUFHLENBQUNFLGNBQWMsQ0FBQztNQUFDQyxPQUFPLEVBQUUsTUFBTTtNQUFFQyxLQUFLLEVBQUUsTUFBTTtNQUFFQyxHQUFHLEVBQUUsU0FBUztNQUFFQyxJQUFJLEVBQUU7SUFBUyxDQUFDLENBQUM7SUFDL0csSUFBTUMsU0FBUyxHQUFHUCxHQUFHLENBQUNRLFFBQVEsQ0FBQyxPQUFPLENBQUM7SUFDdkNaLENBQUMsQ0FBQyxPQUFPLENBQUMsQ0FBQ2EsSUFBSSxDQUFDUixpQkFBaUIsQ0FBQztJQUNsQ0wsQ0FBQyxDQUFDLE9BQU8sQ0FBQyxDQUFDYSxJQUFJLENBQUNGLFNBQVMsQ0FBQztFQUM1QixDQUFDLEVBQUUsSUFBSSxDQUFDO0VBRVJYLENBQUMsQ0FBQyxXQUFXLENBQUMsQ0FBQ2MsU0FBUyxDQUFDO0lBQ3ZCLFlBQVksRUFBRSxJQUFJO0lBQUUsY0FBYyxFQUFFLEtBQUs7SUFBRSxXQUFXLEVBQUUsS0FBSztJQUM3RCxTQUFTLEVBQUUsQ0FBQyxNQUFNLEVBQUUsS0FBSyxFQUFFLE9BQU8sRUFBRSxLQUFLLEVBQUUsT0FBTyxFQUFFLFFBQVE7RUFDOUQsQ0FBQyxDQUFDLENBQUNDLE9BQU8sRUFBRSxDQUFDQyxTQUFTLEVBQUUsQ0FBQ0MsUUFBUSxDQUFDLG1DQUFtQyxDQUFDO0VBQ3RFakIsQ0FBQyxDQUFDLFdBQVcsQ0FBQyxDQUFDYyxTQUFTLENBQUM7SUFDdkIsUUFBUSxFQUFFLElBQUk7SUFDZCxjQUFjLEVBQUUsS0FBSztJQUNyQixXQUFXLEVBQUUsS0FBSztJQUNsQixVQUFVLEVBQUUsSUFBSTtJQUNoQixNQUFNLEVBQUUsSUFBSTtJQUNaLFdBQVcsRUFBRSxLQUFLO0lBQ2xCLFlBQVksRUFBRTtJQUNkO0lBQ0E7RUFDRixDQUFDLENBQUM7QUFDSixDQUFDLENBQUMiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvdmlld193aXRlbC5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/view_witel.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/view_witel.js"]();
/******/ 	
/******/ })()
;