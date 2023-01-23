const dt = luxon.DateTime;

function groupByWitel(arr) {
  const result = [...arr.reduce((r, o) => {
    const key = o.witel;

    const item = r.get(key) || Object.assign({}, o, {
      totalLis: 0,
    });

    item.totalLis += parseFloat(o.total_lis);

    return r.set(key, item);
  }, new Map()).values()];

  return result;
}

$(document).ready(async function() {
  setInterval(() => {
    const now = dt.now();
    const currentDtReadable = now.toLocaleString({weekday: 'long', month: 'long', day: '2-digit', year: 'numeric'});
    const localTime = now.toFormat('HH:mm');
    $('.date').text(currentDtReadable);
    $('.time').text(localTime);
  }, 1000);

  const $topNav = $('#topnav-logo');
  const $li = $topNav.find('a');
  const imgSrc = $li.data('src');

  const $img = $(`<img src="${imgSrc}" style="height: 2.5rem; width: fit-content;">`);
  $topNav.append($img);
  $li.remove();

  const filteredProporsi = $('#summary').data('filtered-summary');
  const filteredProfileLoss = $('#summary').data('filtered-profile-loss');
  const filteredAlert = $('#summary').data('filtered-profile-loss');
  const dataTotal = $('#summary').data('total');

  const filteredProporsiFlat = filteredProporsi ? Object.values(filteredProporsi) : '';
  const filteredProfileLossFlat = filteredProfileLoss ? Object.values(filteredProfileLoss) : '';
  const filteredAlertFlat = filteredAlert ? Object.values(filteredAlert) : '';
  const groupedSummary = groupByWitel(filteredProporsiFlat);
  const groupedLoss = groupByWitel(filteredProfileLossFlat);
  const groupedAlert = groupByWitel(filteredAlertFlat);
  const sumTotalLis = groupedSummary.reduce((adder, item) => adder + item.total_lis, 0);
  const groupedPercentage = groupedSummary.map(item => ({...item, percentage: item.total_lis / sumTotalLis * 100}));

  const canvasSummary = document.getElementById('summary');
  const ctxSummary = canvasSummary.getContext('2d');
  const canvasProporsi = document.getElementById('proporsi');
  const ctxProporsi = canvasProporsi.getContext('2d');

  const labelsSummary = Object.keys(dataTotal);
  const dataSummaryRaw = Object.values(dataTotal);

  const dataSetSummary = [];
  for (let i = 0; i < labelsSummary.length; i++) {
    dataSetSummary.push({x: labelsSummary[i], y: dataSummaryRaw[i]});
  }

  const dataSummary = {
    // labels: Object.keys(dataTotal),
    datasets: [{
      // data: Object.values(dataTotal),
      data: dataSetSummary,
      backgroundColor: Object.keys(dataTotal).map(item => '#' + (Math.random() * 0xFFFFFF << 0).toString(16).padStart(6, '0'))
    }]
  };

  const dataProporsi = {
    labels: groupedSummary.map(item => item.witel),
    datasets: [{
      label: 'Total LIS',
      data: groupedPercentage.map(item => item.percentage.toFixed(2)),
      backgroundColor: groupedSummary.map(item => '#' + (Math.random() * 0xFFFFFF << 0).toString(16).padStart(6, '0'))
    }]
  };

  const areaChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label: 'Loss',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label: 'Sales',
        backgroundColor: 'rgba(210, 214, 222, 1)',
        borderColor: 'rgba(210, 214, 222, 1)',
        pointRadius: false,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [65, 59, 80, 81, 56, 55, 40]
      },
    ]
  };

  const areaChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: true
    },
  };

  const lineChartCanvas = $('#tren').get(0).getContext('2d');
  const lineChartOptions = $.extend(true, {}, areaChartOptions);
  const lineChartData = $.extend(true, {}, areaChartData);
  lineChartData.datasets[0].fill = false;
  lineChartData.datasets[1].fill = false;
  lineChartOptions.datasetFill = false;

  const lineChart = new Chart(lineChartCanvas, {
    type: 'line',
    data: lineChartData,
    options: lineChartOptions
  });

  const summaryChart = new Chart(ctxSummary, {
    type: 'bar',
    data: dataSummary,
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
        }
      },
      plugins: {
        legend: {
          position: 'top',
          display: false,
        },
        title: {
          display: true,
          text: 'Summary LIS, Sales & Churn'
        }
      }
    },
  });

  const proporsiChart = new Chart(ctxProporsi, {
    type: 'pie',
    data: dataProporsi,
    options: {
      responsive: true,
      plugins: {
        tooltip: {
          callbacks: {
            label: function(context) {
              return context.raw + ' %';
            }
          }
        },
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Proporsi LIS'
        }
      }
    },
  });

});