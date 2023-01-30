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

/***/ "./resources/js/list_kwadran.js":
/*!**************************************!*\
  !*** ./resources/js/list_kwadran.js ***!
  \**************************************/
/***/ (() => {

eval("var dt = luxon.DateTime;\n$(document).ready(function () {\n  setInterval(function () {\n    var now = dt.now();\n    var currentDtReadable = now.toLocaleString({\n      weekday: 'long',\n      month: 'long',\n      day: '2-digit',\n      year: 'numeric'\n    });\n    var localTime = now.toFormat('HH:mm');\n    $('.date').text(currentDtReadable);\n    $('.time').text(localTime);\n  }, 1000);\n  $('#example2').DataTable({\n    \"paging\": true,\n    \"lengthChange\": false,\n    \"searching\": false,\n    \"ordering\": true,\n    \"info\": true,\n    \"autoWidth\": true,\n    // \"responsive\": true,\n    \"scrollX\": true,\n    \"pageLength\": 3\n    // \"lengthMenu\": [ [10, 25, 50, -1], [10, 25, 50, \"All\"] ],\n    // \"pageLength\": 50\n  });\n\n  $('#arpuxSpeed').DataTable({\n    \"paging\": true,\n    \"lengthChange\": false,\n    \"searching\": false,\n    \"ordering\": true,\n    \"info\": true,\n    \"autoWidth\": true,\n    // \"responsive\": true,\n    \"scrollX\": true,\n    \"pageLength\": 10\n    // \"lengthMenu\": [ [10, 25, 50, -1], [10, 25, 50, \"All\"] ],\n    // \"pageLength\": 50\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvbGlzdF9rd2FkcmFuLmpzLmpzIiwibmFtZXMiOlsiZHQiLCJsdXhvbiIsIkRhdGVUaW1lIiwiJCIsImRvY3VtZW50IiwicmVhZHkiLCJzZXRJbnRlcnZhbCIsIm5vdyIsImN1cnJlbnREdFJlYWRhYmxlIiwidG9Mb2NhbGVTdHJpbmciLCJ3ZWVrZGF5IiwibW9udGgiLCJkYXkiLCJ5ZWFyIiwibG9jYWxUaW1lIiwidG9Gb3JtYXQiLCJ0ZXh0IiwiRGF0YVRhYmxlIl0sInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbGlzdF9rd2FkcmFuLmpzP2ViNDciXSwic291cmNlc0NvbnRlbnQiOlsiY29uc3QgZHQgPSBsdXhvbi5EYXRlVGltZTtcclxuXHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xyXG4gIHNldEludGVydmFsKCgpID0+IHtcclxuICAgIGNvbnN0IG5vdyA9IGR0Lm5vdygpO1xyXG4gICAgY29uc3QgY3VycmVudER0UmVhZGFibGUgPSBub3cudG9Mb2NhbGVTdHJpbmcoe3dlZWtkYXk6ICdsb25nJywgbW9udGg6ICdsb25nJywgZGF5OiAnMi1kaWdpdCcsIHllYXI6ICdudW1lcmljJ30pO1xyXG4gICAgY29uc3QgbG9jYWxUaW1lID0gbm93LnRvRm9ybWF0KCdISDptbScpO1xyXG4gICAgJCgnLmRhdGUnKS50ZXh0KGN1cnJlbnREdFJlYWRhYmxlKTtcclxuICAgICQoJy50aW1lJykudGV4dChsb2NhbFRpbWUpO1xyXG4gIH0sIDEwMDApO1xyXG5cclxuICAkKCcjZXhhbXBsZTInKS5EYXRhVGFibGUoe1xyXG4gICAgXCJwYWdpbmdcIjogdHJ1ZSxcclxuICAgIFwibGVuZ3RoQ2hhbmdlXCI6IGZhbHNlLFxyXG4gICAgXCJzZWFyY2hpbmdcIjogZmFsc2UsXHJcbiAgICBcIm9yZGVyaW5nXCI6IHRydWUsXHJcbiAgICBcImluZm9cIjogdHJ1ZSxcclxuICAgIFwiYXV0b1dpZHRoXCI6IHRydWUsXHJcbiAgICAvLyBcInJlc3BvbnNpdmVcIjogdHJ1ZSxcclxuICAgIFwic2Nyb2xsWFwiOiB0cnVlLFxyXG4gICAgXCJwYWdlTGVuZ3RoXCI6M1xyXG4gICAgLy8gXCJsZW5ndGhNZW51XCI6IFsgWzEwLCAyNSwgNTAsIC0xXSwgWzEwLCAyNSwgNTAsIFwiQWxsXCJdIF0sXHJcbiAgICAvLyBcInBhZ2VMZW5ndGhcIjogNTBcclxuICB9KTtcclxuICAkKCcjYXJwdXhTcGVlZCcpLkRhdGFUYWJsZSh7XHJcbiAgICBcInBhZ2luZ1wiOiB0cnVlLFxyXG4gICAgXCJsZW5ndGhDaGFuZ2VcIjogZmFsc2UsXHJcbiAgICBcInNlYXJjaGluZ1wiOiBmYWxzZSxcclxuICAgIFwib3JkZXJpbmdcIjogdHJ1ZSxcclxuICAgIFwiaW5mb1wiOiB0cnVlLFxyXG4gICAgXCJhdXRvV2lkdGhcIjogdHJ1ZSxcclxuICAgIC8vIFwicmVzcG9uc2l2ZVwiOiB0cnVlLFxyXG4gICAgXCJzY3JvbGxYXCI6IHRydWUsXHJcbiAgICBcInBhZ2VMZW5ndGhcIjoxMFxyXG4gICAgLy8gXCJsZW5ndGhNZW51XCI6IFsgWzEwLCAyNSwgNTAsIC0xXSwgWzEwLCAyNSwgNTAsIFwiQWxsXCJdIF0sXHJcbiAgICAvLyBcInBhZ2VMZW5ndGhcIjogNTBcclxuICB9KTtcclxufSk7Il0sIm1hcHBpbmdzIjoiQUFBQSxJQUFNQSxFQUFFLEdBQUdDLEtBQUssQ0FBQ0MsUUFBUTtBQUV6QkMsQ0FBQyxDQUFDQyxRQUFRLENBQUMsQ0FBQ0MsS0FBSyxDQUFDLFlBQVc7RUFDM0JDLFdBQVcsQ0FBQyxZQUFNO0lBQ2hCLElBQU1DLEdBQUcsR0FBR1AsRUFBRSxDQUFDTyxHQUFHLEVBQUU7SUFDcEIsSUFBTUMsaUJBQWlCLEdBQUdELEdBQUcsQ0FBQ0UsY0FBYyxDQUFDO01BQUNDLE9BQU8sRUFBRSxNQUFNO01BQUVDLEtBQUssRUFBRSxNQUFNO01BQUVDLEdBQUcsRUFBRSxTQUFTO01BQUVDLElBQUksRUFBRTtJQUFTLENBQUMsQ0FBQztJQUMvRyxJQUFNQyxTQUFTLEdBQUdQLEdBQUcsQ0FBQ1EsUUFBUSxDQUFDLE9BQU8sQ0FBQztJQUN2Q1osQ0FBQyxDQUFDLE9BQU8sQ0FBQyxDQUFDYSxJQUFJLENBQUNSLGlCQUFpQixDQUFDO0lBQ2xDTCxDQUFDLENBQUMsT0FBTyxDQUFDLENBQUNhLElBQUksQ0FBQ0YsU0FBUyxDQUFDO0VBQzVCLENBQUMsRUFBRSxJQUFJLENBQUM7RUFFUlgsQ0FBQyxDQUFDLFdBQVcsQ0FBQyxDQUFDYyxTQUFTLENBQUM7SUFDdkIsUUFBUSxFQUFFLElBQUk7SUFDZCxjQUFjLEVBQUUsS0FBSztJQUNyQixXQUFXLEVBQUUsS0FBSztJQUNsQixVQUFVLEVBQUUsSUFBSTtJQUNoQixNQUFNLEVBQUUsSUFBSTtJQUNaLFdBQVcsRUFBRSxJQUFJO0lBQ2pCO0lBQ0EsU0FBUyxFQUFFLElBQUk7SUFDZixZQUFZLEVBQUM7SUFDYjtJQUNBO0VBQ0YsQ0FBQyxDQUFDOztFQUNGZCxDQUFDLENBQUMsYUFBYSxDQUFDLENBQUNjLFNBQVMsQ0FBQztJQUN6QixRQUFRLEVBQUUsSUFBSTtJQUNkLGNBQWMsRUFBRSxLQUFLO0lBQ3JCLFdBQVcsRUFBRSxLQUFLO0lBQ2xCLFVBQVUsRUFBRSxJQUFJO0lBQ2hCLE1BQU0sRUFBRSxJQUFJO0lBQ1osV0FBVyxFQUFFLElBQUk7SUFDakI7SUFDQSxTQUFTLEVBQUUsSUFBSTtJQUNmLFlBQVksRUFBQztJQUNiO0lBQ0E7RUFDRixDQUFDLENBQUM7QUFDSixDQUFDLENBQUMifQ==\n//# sourceURL=webpack-internal:///./resources/js/list_kwadran.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/list_kwadran.js"]();
/******/ 	
/******/ })()
;