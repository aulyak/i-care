const dt = luxon.DateTime;

$(document).ready(function() {
  setInterval(() => {
    const now = dt.now();
    const currentDtReadable = now.toLocaleString({weekday: 'long', month: 'long', day: '2-digit', year: 'numeric'});
    const localTime = now.toFormat('HH:mm');
    $('.date').text(currentDtReadable);
    $('.time').text(localTime);
  }, 1000);

  $('#TBL_PROUCT_TYPE_BY_WITEL').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    // "responsive": true,
    "scrollX": true,
    "pageLength":3
    // "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
    // "pageLength": 50
  });
  $('#TBL_ARPU_X_SPEED').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    // "responsive": true,
    "scrollX": true,
    "pageLength":10
    // "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
    // "pageLength": 50
  });

  var areaChartData = {
    labels  : ['January','February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label               : '1P-INTERNET (INTERNET)',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius          : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label               : '2P (POTS-INTERNET)',
        backgroundColor     : 'rgba(210, 214, 222, 1)',
        borderColor         : 'rgba(210, 214, 222, 1)',
        pointRadius         : false,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : [65, 59, 80, 81, 56, 55, 40]
      },
    ]
  }

  var areaChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // new Chart(areaChartCanvas, {
  //   type: 'line',
  //   data: areaChartData,
  //   options: areaChartOptions
  // })

  //-------------
  //- LINE CHART -
  //--------------
  // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
  // var lineChartOptions = $.extend(true, {}, areaChartOptions)
  // var lineChartData = $.extend(true, {}, areaChartData)
  // lineChartData.datasets[0].fill = false;
  // lineChartData.datasets[1].fill = false;
  // lineChartOptions.datasetFill = false

  // var lineChart = new Chart(lineChartCanvas, {
  //   type: 'line',
  //   data: lineChartData,
  //   options: lineChartOptions
  // })

  //-------------
  //- DONUT CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  // var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
  var donutData        = {
    labels: [
        '1P INET',
        '2P (POTS-INET)',
        '3P',
        'HOMEWIFI',
    ],
    datasets: [
      {
        data: [700,500,400,600],
        backgroundColor : ['#d2691e', '#28a745', '#007bff', '#dc3545'],
      }
    ]
  }
  // var donutOptions     = {
  //   maintainAspectRatio : false,
  //   responsive : true,
  // }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // new Chart(donutChartCanvas, {
  //   type: 'doughnut',
  //   data: donutData,
  //   options: donutOptions
  // })

  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  var pieData        = donutData;
  var pieOptions     = {
    maintainAspectRatio : false,
    responsive : true,
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  new Chart(pieChartCanvas, {
    type: 'pie',
    data: pieData,
    options: pieOptions
  })

  //-------------
  //- BAR CHART -
  //-------------
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChartData = $.extend(true, {}, areaChartData)
  var temp0 = areaChartData.datasets[0]
  var temp1 = areaChartData.datasets[1]
  barChartData.datasets[0] = temp1
  barChartData.datasets[1] = temp0

  var barChartOptions = {
    responsive              : true,
    maintainAspectRatio     : false,
    datasetFill             : false
  }

  new Chart(barChartCanvas, {
    type: 'bar',
    data: barChartData,
    options: {
      barChartOptions,
      indexAxis: 'y',
    }
  })

  //---------------------
  //- STACKED BAR CHART -
  //---------------------
  // var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
  // var stackedBarChartData = $.extend(true, {}, barChartData)

  // var stackedBarChartOptions = {
  //   responsive              : true,
  //   maintainAspectRatio     : false,
  //   scales: {
  //     xAxes: [{
  //       stacked: true,
  //     }],
  //     yAxes: [{
  //       stacked: true
  //     }]
  //   }
  // }

  // new Chart(stackedBarChartCanvas, {
  //   type: 'bar',
  //   data: stackedBarChartData,
  //   options: stackedBarChartOptions
  // })

  // Horizontal Bar
  var horizontalBarChart = new Chart(horizontalBarChartCanvas, {
    type: 'horizontalBar',
    data: {
        labels: ["< 200GB", "200GB - 350GB", "350GB - 700GB", ">= 750GB"],
        datasets: [{
          data: [93038, 88644, 110452, 40000],
          backgroundColor: ["#73BFB8", "#73BFB8", "#73BFB8", "#73BFB8"], 
        }]
    },
    options: {
        tooltips: {
          enabled: false
        },
        responsive: true,
        legend: {
          display: false,
          position: 'bottom',
          fullWidth: true,
          labels: {
            boxWidth: 10,
            padding: 50
          }
        },
        scales: {
          yAxes: [{
            barPercentage: 0.75,
            ticks: {
              fontColor: '#555759',
              fontFamily: 'Lato',
              fontSize: 11
            }
              
          }],
          xAxes: [{
              gridLines: {
                display: true,
                drawTicks: false,
                tickMarkLength: 5,
                drawBorder: false
              },
            ticks: {
              padding: 5,
              beginAtZero: true,
              fontColor: '#555759',
              fontFamily: 'Lato',
              fontSize: 11,
              callback: function(label, index, labels) {
                return label/1000;
              }  
            },
          }]
        }
    }
  });
  var fuphorizontalBarChart = new Chart(fuphorizontalBarChartCanvas, {
    type: 'horizontalBar',
    data: {
        labels: ["< FUP", "> FUP", "NO FUP < 10MBPS"],
        datasets: [{
          data: [270637, 88644, 110452],
          backgroundColor: ["#84b5b1", "#84b5b1", "#84b5b1"], 
        }]
    },
    options: {
        tooltips: {
          enabled: false
        },
        responsive: true,
        legend: {
          display: false,
          position: 'bottom',
          fullWidth: true,
          labels: {
            boxWidth: 10,
            padding: 50
          }
        },
        scales: {
          yAxes: [{
            barPercentage: 0.75,
            ticks: {
              fontColor: '#555759',
              fontFamily: 'Lato',
              fontSize: 11
            }
              
          }],
          xAxes: [{
              gridLines: {
                display: true,
                drawTicks: false,
                tickMarkLength: 5,
                drawBorder: false
              },
            ticks: {
              padding: 5,
              beginAtZero: true,
              fontColor: '#555759',
              fontFamily: 'Lato',
              fontSize: 11,
              callback: function(label, index, labels) {
                return label/1000;
              }  
            },
          }]
        }
    }
  });
  
  var kategoriArpuHorizontalBarChart = new Chart(kategoriArpuHorizontalBarChartCanvas, {
    type: 'horizontalBar',
    data: {
        labels: [">= 700K", "500K-700K", "300K-500K", "< 300K"],
        datasets: [{
          data: [24099, 54834, 298338, 192444],
          backgroundColor: ["#d0605d", "#d0605d", "#d0605d", "#d0605d"], 
        }]
    },
    options: {
        tooltips: {
          enabled: false
        },
        responsive: true,
        legend: {
          display: false,
          position: 'bottom',
          fullWidth: true,
          labels: {
            boxWidth: 10,
            padding: 50
          }
        },
        scales: {
          yAxes: [{
            barPercentage: 0.75,
            ticks: {
              fontColor: '#555759',
              fontFamily: 'Lato',
              fontSize: 11
            }
              
          }],
          xAxes: [{
              gridLines: {
                display: true,
                drawTicks: false,
                tickMarkLength: 5,
                drawBorder: false
              },
            ticks: {
              padding: 5,
              beginAtZero: true,
              fontColor: '#555759',
              fontFamily: 'Lato',
              fontSize: 11,
              callback: function(label, index, labels) {
                return label/1000;
              }  
            },
          }]
        }
    }
  }); 
  
  var jumlahGangguanhorizontalBarChart = new Chart(jumlahGangguanhorizontalBarChartCanvas, {
    type: 'horizontalBar',
    data: {
        labels: ["2X - 5X", "5X - 10X", "< 2X", ">= 10X", "NO TICKET"],
        datasets: [{
          data: [9454, 502, 24235, 8, 535516],
          backgroundColor: ["#82b76e", "#82b76e", "#82b76e", "#82b76e", "#82b76e"], 
        }]
    },
    options: {
        tooltips: {
          enabled: false
        },
        responsive: true,
        legend: {
          display: false,
          position: 'bottom',
          fullWidth: true,
          labels: {
            boxWidth: 10,
            padding: 50
          }
        },
        scales: {
          yAxes: [{
            barPercentage: 0.75,
            ticks: {
              fontColor: '#555759',
              fontFamily: 'Lato',
              fontSize: 11
            }
              
          }],
          xAxes: [{
              gridLines: {
                display: true,
                drawTicks: false,
                tickMarkLength: 5,
                drawBorder: false
              },
            ticks: {
              padding: 5,
              beginAtZero: true,
              fontColor: '#555759',
              fontFamily: 'Lato',
              fontSize: 11,
              callback: function(label, index, labels) {
                return label/1000;
              }  
            },
          }]
        }
    }
  }); 
});