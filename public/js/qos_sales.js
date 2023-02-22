<<<<<<< HEAD
(()=>{var e=luxon.DateTime;$(document).ready((function(){setInterval((function(){var t=e.now(),a=t.toLocaleString({weekday:"long",month:"long",day:"2-digit",year:"numeric"}),n=t.toFormat("HH:mm");$(".date").text(a),$(".time").text(n)}),1e3),$("#example1").DataTable({responsive:!0,lengthChange:!1,autoWidth:!1,buttons:["copy","csv","excel","pdf","print","colvis"]}).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)"),$("#example2").DataTable({paging:!0,lengthChange:!1,searching:!1,ordering:!0,info:!0,autoWidth:!1,responsive:!0})}))})();
//# sourceMappingURL=qos_sales.js.map
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

/***/ "./resources/js/qos_sales.js":
/*!***********************************!*\
  !*** ./resources/js/qos_sales.js ***!
  \***********************************/
/***/ (() => {

eval("var dt = luxon.DateTime;\n$(document).ready(function () {\n  setInterval(function () {\n    var now = dt.now();\n    var currentDtReadable = now.toLocaleString({\n      weekday: 'long',\n      month: 'long',\n      day: '2-digit',\n      year: 'numeric'\n    });\n    var localTime = now.toFormat('HH:mm');\n    $('.date').text(currentDtReadable);\n    $('.time').text(localTime);\n  }, 1000);\n  $(\"#example1\").DataTable({\n    \"responsive\": true,\n    \"lengthChange\": false,\n    \"autoWidth\": false,\n    \"buttons\": [\"copy\", \"csv\", \"excel\", \"pdf\", \"print\", \"colvis\"]\n  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');\n  $('#example2').DataTable({\n    \"paging\": true,\n    \"lengthChange\": false,\n    \"searching\": false,\n    \"ordering\": true,\n    \"info\": true,\n    \"autoWidth\": false,\n    \"responsive\": true\n    // \"lengthMenu\": [ [10, 25, 50, -1], [10, 25, 50, \"All\"] ],\n    // \"pageLength\": 50\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJkdCIsImx1eG9uIiwiRGF0ZVRpbWUiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsInNldEludGVydmFsIiwibm93IiwiY3VycmVudER0UmVhZGFibGUiLCJ0b0xvY2FsZVN0cmluZyIsIndlZWtkYXkiLCJtb250aCIsImRheSIsInllYXIiLCJsb2NhbFRpbWUiLCJ0b0Zvcm1hdCIsInRleHQiLCJEYXRhVGFibGUiLCJidXR0b25zIiwiY29udGFpbmVyIiwiYXBwZW5kVG8iXSwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL3Fvc19zYWxlcy5qcz8yN2UzIl0sInNvdXJjZXNDb250ZW50IjpbImNvbnN0IGR0ID0gbHV4b24uRGF0ZVRpbWU7XHJcblxyXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcclxuICBzZXRJbnRlcnZhbCgoKSA9PiB7XHJcbiAgICBjb25zdCBub3cgPSBkdC5ub3coKTtcclxuICAgIGNvbnN0IGN1cnJlbnREdFJlYWRhYmxlID0gbm93LnRvTG9jYWxlU3RyaW5nKHt3ZWVrZGF5OiAnbG9uZycsIG1vbnRoOiAnbG9uZycsIGRheTogJzItZGlnaXQnLCB5ZWFyOiAnbnVtZXJpYyd9KTtcclxuICAgIGNvbnN0IGxvY2FsVGltZSA9IG5vdy50b0Zvcm1hdCgnSEg6bW0nKTtcclxuICAgICQoJy5kYXRlJykudGV4dChjdXJyZW50RHRSZWFkYWJsZSk7XHJcbiAgICAkKCcudGltZScpLnRleHQobG9jYWxUaW1lKTtcclxuICB9LCAxMDAwKTtcclxuXHJcbiAgJChcIiNleGFtcGxlMVwiKS5EYXRhVGFibGUoe1xyXG4gICAgXCJyZXNwb25zaXZlXCI6IHRydWUsIFwibGVuZ3RoQ2hhbmdlXCI6IGZhbHNlLCBcImF1dG9XaWR0aFwiOiBmYWxzZSxcclxuICAgIFwiYnV0dG9uc1wiOiBbXCJjb3B5XCIsIFwiY3N2XCIsIFwiZXhjZWxcIiwgXCJwZGZcIiwgXCJwcmludFwiLCBcImNvbHZpc1wiXVxyXG4gIH0pLmJ1dHRvbnMoKS5jb250YWluZXIoKS5hcHBlbmRUbygnI2V4YW1wbGUxX3dyYXBwZXIgLmNvbC1tZC02OmVxKDApJyk7XHJcbiAgJCgnI2V4YW1wbGUyJykuRGF0YVRhYmxlKHtcclxuICAgIFwicGFnaW5nXCI6IHRydWUsXHJcbiAgICBcImxlbmd0aENoYW5nZVwiOiBmYWxzZSxcclxuICAgIFwic2VhcmNoaW5nXCI6IGZhbHNlLFxyXG4gICAgXCJvcmRlcmluZ1wiOiB0cnVlLFxyXG4gICAgXCJpbmZvXCI6IHRydWUsXHJcbiAgICBcImF1dG9XaWR0aFwiOiBmYWxzZSxcclxuICAgIFwicmVzcG9uc2l2ZVwiOiB0cnVlLFxyXG4gICAgLy8gXCJsZW5ndGhNZW51XCI6IFsgWzEwLCAyNSwgNTAsIC0xXSwgWzEwLCAyNSwgNTAsIFwiQWxsXCJdIF0sXHJcbiAgICAvLyBcInBhZ2VMZW5ndGhcIjogNTBcclxuICB9KTtcclxufSk7Il0sIm1hcHBpbmdzIjoiQUFBQSxJQUFNQSxFQUFFLEdBQUdDLEtBQUssQ0FBQ0MsUUFBUTtBQUV6QkMsQ0FBQyxDQUFDQyxRQUFRLENBQUMsQ0FBQ0MsS0FBSyxDQUFDLFlBQVc7RUFDM0JDLFdBQVcsQ0FBQyxZQUFNO0lBQ2hCLElBQU1DLEdBQUcsR0FBR1AsRUFBRSxDQUFDTyxHQUFHLEVBQUU7SUFDcEIsSUFBTUMsaUJBQWlCLEdBQUdELEdBQUcsQ0FBQ0UsY0FBYyxDQUFDO01BQUNDLE9BQU8sRUFBRSxNQUFNO01BQUVDLEtBQUssRUFBRSxNQUFNO01BQUVDLEdBQUcsRUFBRSxTQUFTO01BQUVDLElBQUksRUFBRTtJQUFTLENBQUMsQ0FBQztJQUMvRyxJQUFNQyxTQUFTLEdBQUdQLEdBQUcsQ0FBQ1EsUUFBUSxDQUFDLE9BQU8sQ0FBQztJQUN2Q1osQ0FBQyxDQUFDLE9BQU8sQ0FBQyxDQUFDYSxJQUFJLENBQUNSLGlCQUFpQixDQUFDO0lBQ2xDTCxDQUFDLENBQUMsT0FBTyxDQUFDLENBQUNhLElBQUksQ0FBQ0YsU0FBUyxDQUFDO0VBQzVCLENBQUMsRUFBRSxJQUFJLENBQUM7RUFFUlgsQ0FBQyxDQUFDLFdBQVcsQ0FBQyxDQUFDYyxTQUFTLENBQUM7SUFDdkIsWUFBWSxFQUFFLElBQUk7SUFBRSxjQUFjLEVBQUUsS0FBSztJQUFFLFdBQVcsRUFBRSxLQUFLO0lBQzdELFNBQVMsRUFBRSxDQUFDLE1BQU0sRUFBRSxLQUFLLEVBQUUsT0FBTyxFQUFFLEtBQUssRUFBRSxPQUFPLEVBQUUsUUFBUTtFQUM5RCxDQUFDLENBQUMsQ0FBQ0MsT0FBTyxFQUFFLENBQUNDLFNBQVMsRUFBRSxDQUFDQyxRQUFRLENBQUMsbUNBQW1DLENBQUM7RUFDdEVqQixDQUFDLENBQUMsV0FBVyxDQUFDLENBQUNjLFNBQVMsQ0FBQztJQUN2QixRQUFRLEVBQUUsSUFBSTtJQUNkLGNBQWMsRUFBRSxLQUFLO0lBQ3JCLFdBQVcsRUFBRSxLQUFLO0lBQ2xCLFVBQVUsRUFBRSxJQUFJO0lBQ2hCLE1BQU0sRUFBRSxJQUFJO0lBQ1osV0FBVyxFQUFFLEtBQUs7SUFDbEIsWUFBWSxFQUFFO0lBQ2Q7SUFDQTtFQUNGLENBQUMsQ0FBQztBQUNKLENBQUMsQ0FBQyIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9xb3Nfc2FsZXMuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/qos_sales.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/qos_sales.js"]();
/******/ 	
/******/ })()
;
>>>>>>> dashboard
