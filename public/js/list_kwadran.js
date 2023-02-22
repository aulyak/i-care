<<<<<<< HEAD
(()=>{var e=luxon.DateTime;$(document).ready((function(){setInterval((function(){var a=e.now(),t=a.toLocaleString({weekday:"long",month:"long",day:"2-digit",year:"numeric"}),n=a.toFormat("HH:mm");$(".date").text(t),$(".time").text(n)}),1e3),$("#example2").DataTable({paging:!0,lengthChange:!1,searching:!1,ordering:!0,info:!0,autoWidth:!0,scrollX:!0,pageLength:3}),$("#arpuxSpeed").DataTable({paging:!0,lengthChange:!1,searching:!1,ordering:!0,info:!0,autoWidth:!0,scrollX:!0,pageLength:10})}))})();
//# sourceMappingURL=list_kwadran.js.map
=======
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

eval("var dt = luxon.DateTime;\n$(document).ready(function () {\n  setInterval(function () {\n    var now = dt.now();\n    var currentDtReadable = now.toLocaleString({\n      weekday: 'long',\n      month: 'long',\n      day: '2-digit',\n      year: 'numeric'\n    });\n    var localTime = now.toFormat('HH:mm');\n    $('.date').text(currentDtReadable);\n    $('.time').text(localTime);\n  }, 1000);\n  $('#example2').DataTable({\n    \"paging\": true,\n    \"lengthChange\": false,\n    \"searching\": false,\n    \"ordering\": true,\n    \"info\": true,\n    \"autoWidth\": true,\n    // \"responsive\": true,\n    \"scrollX\": true,\n    \"pageLength\": 3\n    // \"lengthMenu\": [ [10, 25, 50, -1], [10, 25, 50, \"All\"] ],\n    // \"pageLength\": 50\n  });\n\n  $('#arpuxSpeed').DataTable({\n    \"paging\": true,\n    \"lengthChange\": false,\n    \"searching\": false,\n    \"ordering\": true,\n    \"info\": true,\n    \"autoWidth\": true,\n    // \"responsive\": true,\n    \"scrollX\": true,\n    \"pageLength\": 10\n    // \"lengthMenu\": [ [10, 25, 50, -1], [10, 25, 50, \"All\"] ],\n    // \"pageLength\": 50\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJkdCIsImx1eG9uIiwiRGF0ZVRpbWUiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsInNldEludGVydmFsIiwibm93IiwiY3VycmVudER0UmVhZGFibGUiLCJ0b0xvY2FsZVN0cmluZyIsIndlZWtkYXkiLCJtb250aCIsImRheSIsInllYXIiLCJsb2NhbFRpbWUiLCJ0b0Zvcm1hdCIsInRleHQiLCJEYXRhVGFibGUiXSwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL2xpc3Rfa3dhZHJhbi5qcz9lYjQ3Il0sInNvdXJjZXNDb250ZW50IjpbImNvbnN0IGR0ID0gbHV4b24uRGF0ZVRpbWU7XHJcblxyXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcclxuICBzZXRJbnRlcnZhbCgoKSA9PiB7XHJcbiAgICBjb25zdCBub3cgPSBkdC5ub3coKTtcclxuICAgIGNvbnN0IGN1cnJlbnREdFJlYWRhYmxlID0gbm93LnRvTG9jYWxlU3RyaW5nKHt3ZWVrZGF5OiAnbG9uZycsIG1vbnRoOiAnbG9uZycsIGRheTogJzItZGlnaXQnLCB5ZWFyOiAnbnVtZXJpYyd9KTtcclxuICAgIGNvbnN0IGxvY2FsVGltZSA9IG5vdy50b0Zvcm1hdCgnSEg6bW0nKTtcclxuICAgICQoJy5kYXRlJykudGV4dChjdXJyZW50RHRSZWFkYWJsZSk7XHJcbiAgICAkKCcudGltZScpLnRleHQobG9jYWxUaW1lKTtcclxuICB9LCAxMDAwKTtcclxuXHJcbiAgJCgnI2V4YW1wbGUyJykuRGF0YVRhYmxlKHtcclxuICAgIFwicGFnaW5nXCI6IHRydWUsXHJcbiAgICBcImxlbmd0aENoYW5nZVwiOiBmYWxzZSxcclxuICAgIFwic2VhcmNoaW5nXCI6IGZhbHNlLFxyXG4gICAgXCJvcmRlcmluZ1wiOiB0cnVlLFxyXG4gICAgXCJpbmZvXCI6IHRydWUsXHJcbiAgICBcImF1dG9XaWR0aFwiOiB0cnVlLFxyXG4gICAgLy8gXCJyZXNwb25zaXZlXCI6IHRydWUsXHJcbiAgICBcInNjcm9sbFhcIjogdHJ1ZSxcclxuICAgIFwicGFnZUxlbmd0aFwiOjNcclxuICAgIC8vIFwibGVuZ3RoTWVudVwiOiBbIFsxMCwgMjUsIDUwLCAtMV0sIFsxMCwgMjUsIDUwLCBcIkFsbFwiXSBdLFxyXG4gICAgLy8gXCJwYWdlTGVuZ3RoXCI6IDUwXHJcbiAgfSk7XHJcbiAgJCgnI2FycHV4U3BlZWQnKS5EYXRhVGFibGUoe1xyXG4gICAgXCJwYWdpbmdcIjogdHJ1ZSxcclxuICAgIFwibGVuZ3RoQ2hhbmdlXCI6IGZhbHNlLFxyXG4gICAgXCJzZWFyY2hpbmdcIjogZmFsc2UsXHJcbiAgICBcIm9yZGVyaW5nXCI6IHRydWUsXHJcbiAgICBcImluZm9cIjogdHJ1ZSxcclxuICAgIFwiYXV0b1dpZHRoXCI6IHRydWUsXHJcbiAgICAvLyBcInJlc3BvbnNpdmVcIjogdHJ1ZSxcclxuICAgIFwic2Nyb2xsWFwiOiB0cnVlLFxyXG4gICAgXCJwYWdlTGVuZ3RoXCI6MTBcclxuICAgIC8vIFwibGVuZ3RoTWVudVwiOiBbIFsxMCwgMjUsIDUwLCAtMV0sIFsxMCwgMjUsIDUwLCBcIkFsbFwiXSBdLFxyXG4gICAgLy8gXCJwYWdlTGVuZ3RoXCI6IDUwXHJcbiAgfSk7XHJcbn0pOyJdLCJtYXBwaW5ncyI6IkFBQUEsSUFBTUEsRUFBRSxHQUFHQyxLQUFLLENBQUNDLFFBQVE7QUFFekJDLENBQUMsQ0FBQ0MsUUFBUSxDQUFDLENBQUNDLEtBQUssQ0FBQyxZQUFXO0VBQzNCQyxXQUFXLENBQUMsWUFBTTtJQUNoQixJQUFNQyxHQUFHLEdBQUdQLEVBQUUsQ0FBQ08sR0FBRyxFQUFFO0lBQ3BCLElBQU1DLGlCQUFpQixHQUFHRCxHQUFHLENBQUNFLGNBQWMsQ0FBQztNQUFDQyxPQUFPLEVBQUUsTUFBTTtNQUFFQyxLQUFLLEVBQUUsTUFBTTtNQUFFQyxHQUFHLEVBQUUsU0FBUztNQUFFQyxJQUFJLEVBQUU7SUFBUyxDQUFDLENBQUM7SUFDL0csSUFBTUMsU0FBUyxHQUFHUCxHQUFHLENBQUNRLFFBQVEsQ0FBQyxPQUFPLENBQUM7SUFDdkNaLENBQUMsQ0FBQyxPQUFPLENBQUMsQ0FBQ2EsSUFBSSxDQUFDUixpQkFBaUIsQ0FBQztJQUNsQ0wsQ0FBQyxDQUFDLE9BQU8sQ0FBQyxDQUFDYSxJQUFJLENBQUNGLFNBQVMsQ0FBQztFQUM1QixDQUFDLEVBQUUsSUFBSSxDQUFDO0VBRVJYLENBQUMsQ0FBQyxXQUFXLENBQUMsQ0FBQ2MsU0FBUyxDQUFDO0lBQ3ZCLFFBQVEsRUFBRSxJQUFJO0lBQ2QsY0FBYyxFQUFFLEtBQUs7SUFDckIsV0FBVyxFQUFFLEtBQUs7SUFDbEIsVUFBVSxFQUFFLElBQUk7SUFDaEIsTUFBTSxFQUFFLElBQUk7SUFDWixXQUFXLEVBQUUsSUFBSTtJQUNqQjtJQUNBLFNBQVMsRUFBRSxJQUFJO0lBQ2YsWUFBWSxFQUFDO0lBQ2I7SUFDQTtFQUNGLENBQUMsQ0FBQzs7RUFDRmQsQ0FBQyxDQUFDLGFBQWEsQ0FBQyxDQUFDYyxTQUFTLENBQUM7SUFDekIsUUFBUSxFQUFFLElBQUk7SUFDZCxjQUFjLEVBQUUsS0FBSztJQUNyQixXQUFXLEVBQUUsS0FBSztJQUNsQixVQUFVLEVBQUUsSUFBSTtJQUNoQixNQUFNLEVBQUUsSUFBSTtJQUNaLFdBQVcsRUFBRSxJQUFJO0lBQ2pCO0lBQ0EsU0FBUyxFQUFFLElBQUk7SUFDZixZQUFZLEVBQUM7SUFDYjtJQUNBO0VBQ0YsQ0FBQyxDQUFDO0FBQ0osQ0FBQyxDQUFDIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2xpc3Rfa3dhZHJhbi5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/list_kwadran.js\n");

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
>>>>>>> dashboard
