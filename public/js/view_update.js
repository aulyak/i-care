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

/***/ "./resources/js/view_update.js":
/*!*************************************!*\
  !*** ./resources/js/view_update.js ***!
  \*************************************/
/***/ (() => {

eval("var dt = luxon.DateTime;\n$(document).ready(function () {\n  setInterval(function () {\n    var now = dt.now();\n    var currentDtReadable = now.toLocaleString({\n      weekday: 'long',\n      month: 'long',\n      day: '2-digit',\n      year: 'numeric'\n    });\n    var localTime = now.toFormat('HH:mm');\n    $('.date').text(currentDtReadable);\n    $('.time').text(localTime);\n  }, 1000);\n  $(\"#example1\").DataTable({\n    \"responsive\": true,\n    \"lengthChange\": false,\n    \"autoWidth\": false,\n    \"buttons\": [\"copy\", \"csv\", \"excel\", \"pdf\", \"print\", \"colvis\"]\n  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');\n  $('#example2').DataTable({\n    \"paging\": true,\n    \"lengthChange\": false,\n    \"searching\": false,\n    \"ordering\": true,\n    \"info\": true,\n    \"autoWidth\": false,\n    \"responsive\": true\n    // \"lengthMenu\": [ [10, 25, 50, -1], [10, 25, 50, \"All\"] ],\n    // \"pageLength\": 50\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJkdCIsImx1eG9uIiwiRGF0ZVRpbWUiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsInNldEludGVydmFsIiwibm93IiwiY3VycmVudER0UmVhZGFibGUiLCJ0b0xvY2FsZVN0cmluZyIsIndlZWtkYXkiLCJtb250aCIsImRheSIsInllYXIiLCJsb2NhbFRpbWUiLCJ0b0Zvcm1hdCIsInRleHQiLCJEYXRhVGFibGUiLCJidXR0b25zIiwiY29udGFpbmVyIiwiYXBwZW5kVG8iXSwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL3ZpZXdfdXBkYXRlLmpzPzJlODAiXSwic291cmNlc0NvbnRlbnQiOlsiY29uc3QgZHQgPSBsdXhvbi5EYXRlVGltZTtcclxuXHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xyXG4gIHNldEludGVydmFsKCgpID0+IHtcclxuICAgIGNvbnN0IG5vdyA9IGR0Lm5vdygpO1xyXG4gICAgY29uc3QgY3VycmVudER0UmVhZGFibGUgPSBub3cudG9Mb2NhbGVTdHJpbmcoe3dlZWtkYXk6ICdsb25nJywgbW9udGg6ICdsb25nJywgZGF5OiAnMi1kaWdpdCcsIHllYXI6ICdudW1lcmljJ30pO1xyXG4gICAgY29uc3QgbG9jYWxUaW1lID0gbm93LnRvRm9ybWF0KCdISDptbScpO1xyXG4gICAgJCgnLmRhdGUnKS50ZXh0KGN1cnJlbnREdFJlYWRhYmxlKTtcclxuICAgICQoJy50aW1lJykudGV4dChsb2NhbFRpbWUpO1xyXG4gIH0sIDEwMDApO1xyXG5cclxuICAkKFwiI2V4YW1wbGUxXCIpLkRhdGFUYWJsZSh7XHJcbiAgICBcInJlc3BvbnNpdmVcIjogdHJ1ZSwgXCJsZW5ndGhDaGFuZ2VcIjogZmFsc2UsIFwiYXV0b1dpZHRoXCI6IGZhbHNlLFxyXG4gICAgXCJidXR0b25zXCI6IFtcImNvcHlcIiwgXCJjc3ZcIiwgXCJleGNlbFwiLCBcInBkZlwiLCBcInByaW50XCIsIFwiY29sdmlzXCJdXHJcbiAgfSkuYnV0dG9ucygpLmNvbnRhaW5lcigpLmFwcGVuZFRvKCcjZXhhbXBsZTFfd3JhcHBlciAuY29sLW1kLTY6ZXEoMCknKTtcclxuICAkKCcjZXhhbXBsZTInKS5EYXRhVGFibGUoe1xyXG4gICAgXCJwYWdpbmdcIjogdHJ1ZSxcclxuICAgIFwibGVuZ3RoQ2hhbmdlXCI6IGZhbHNlLFxyXG4gICAgXCJzZWFyY2hpbmdcIjogZmFsc2UsXHJcbiAgICBcIm9yZGVyaW5nXCI6IHRydWUsXHJcbiAgICBcImluZm9cIjogdHJ1ZSxcclxuICAgIFwiYXV0b1dpZHRoXCI6IGZhbHNlLFxyXG4gICAgXCJyZXNwb25zaXZlXCI6IHRydWUsXHJcbiAgICAvLyBcImxlbmd0aE1lbnVcIjogWyBbMTAsIDI1LCA1MCwgLTFdLCBbMTAsIDI1LCA1MCwgXCJBbGxcIl0gXSxcclxuICAgIC8vIFwicGFnZUxlbmd0aFwiOiA1MFxyXG4gIH0pO1xyXG59KTsiXSwibWFwcGluZ3MiOiJBQUFBLElBQU1BLEVBQUUsR0FBR0MsS0FBSyxDQUFDQyxRQUFRO0FBRXpCQyxDQUFDLENBQUNDLFFBQVEsQ0FBQyxDQUFDQyxLQUFLLENBQUMsWUFBVztFQUMzQkMsV0FBVyxDQUFDLFlBQU07SUFDaEIsSUFBTUMsR0FBRyxHQUFHUCxFQUFFLENBQUNPLEdBQUcsRUFBRTtJQUNwQixJQUFNQyxpQkFBaUIsR0FBR0QsR0FBRyxDQUFDRSxjQUFjLENBQUM7TUFBQ0MsT0FBTyxFQUFFLE1BQU07TUFBRUMsS0FBSyxFQUFFLE1BQU07TUFBRUMsR0FBRyxFQUFFLFNBQVM7TUFBRUMsSUFBSSxFQUFFO0lBQVMsQ0FBQyxDQUFDO0lBQy9HLElBQU1DLFNBQVMsR0FBR1AsR0FBRyxDQUFDUSxRQUFRLENBQUMsT0FBTyxDQUFDO0lBQ3ZDWixDQUFDLENBQUMsT0FBTyxDQUFDLENBQUNhLElBQUksQ0FBQ1IsaUJBQWlCLENBQUM7SUFDbENMLENBQUMsQ0FBQyxPQUFPLENBQUMsQ0FBQ2EsSUFBSSxDQUFDRixTQUFTLENBQUM7RUFDNUIsQ0FBQyxFQUFFLElBQUksQ0FBQztFQUVSWCxDQUFDLENBQUMsV0FBVyxDQUFDLENBQUNjLFNBQVMsQ0FBQztJQUN2QixZQUFZLEVBQUUsSUFBSTtJQUFFLGNBQWMsRUFBRSxLQUFLO0lBQUUsV0FBVyxFQUFFLEtBQUs7SUFDN0QsU0FBUyxFQUFFLENBQUMsTUFBTSxFQUFFLEtBQUssRUFBRSxPQUFPLEVBQUUsS0FBSyxFQUFFLE9BQU8sRUFBRSxRQUFRO0VBQzlELENBQUMsQ0FBQyxDQUFDQyxPQUFPLEVBQUUsQ0FBQ0MsU0FBUyxFQUFFLENBQUNDLFFBQVEsQ0FBQyxtQ0FBbUMsQ0FBQztFQUN0RWpCLENBQUMsQ0FBQyxXQUFXLENBQUMsQ0FBQ2MsU0FBUyxDQUFDO0lBQ3ZCLFFBQVEsRUFBRSxJQUFJO0lBQ2QsY0FBYyxFQUFFLEtBQUs7SUFDckIsV0FBVyxFQUFFLEtBQUs7SUFDbEIsVUFBVSxFQUFFLElBQUk7SUFDaEIsTUFBTSxFQUFFLElBQUk7SUFDWixXQUFXLEVBQUUsS0FBSztJQUNsQixZQUFZLEVBQUU7SUFDZDtJQUNBO0VBQ0YsQ0FBQyxDQUFDO0FBQ0osQ0FBQyxDQUFDIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3ZpZXdfdXBkYXRlLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/view_update.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/view_update.js"]();
/******/ 	
/******/ })()
;