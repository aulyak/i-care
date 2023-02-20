const dt = luxon.DateTime;

const monthList = [
  'Januari',
  'Februari',
  'Maret',
  'April',
  'Mei',
  'Juni',
  'Juli',
  'Agustus',
  'September',
  'Oktober',
  'November',
  'Desember',
];

function groupByWitelOrSTO(arr, isSelectedWitel) {
  const result = [...arr.reduce((r, o) => {
    const key = isSelectedWitel ? o.STO : o.WITEL;

    const item = r.get(key) || Object.assign({}, o, {
      TOTAL_LIS: 0,
    });

    item.TOTAL_LIS += parseFloat(o.TOTAL_LIS);

    return r.set(key, item);
  }, new Map()).values()];

  return result;
}

function groupProfileLossByYearMonth(arr) {
  const result = [...arr.reduce((r, o) => {
    const key = o.BULAN;

    const item = r.get(key) || Object.assign({}, o, {
      JUMLAH: 0,
    });

    item.JUMLAH += parseFloat(o.JUMLAH);

    return r.set(key, item);
  }, new Map()).values()];

  return result;
}

function groupSummaryByYearMonth(arr) {
  const result = [...arr.reduce((r, o) => {
    const key = o.BULAN;

    const item = r.get(key) || Object.assign({}, o, {
      TOTAL_SALES: 0,
      TARGET_SALES: 0,
    });

    item.TOTAL_SALES += parseFloat(o.TOTAL_SALES) || 0;
    item.TARGET_SALES += parseFloat(o.TARGET_SALES) || 0;

    return r.set(key, item);
  }, new Map()).values()];

  return result;
}

function transformArray(array) {
  const arr = array.map(item => {
    for (const key in item) {
      if (Object.hasOwnProperty.call(item, key)) {
        if (key === 'BULAN') delete item[key]
      }
    }
    return item;
  });
  const result = [];
  const labels = new Set(); // set to keep track of unique labels

  // iterate through each object to collect all unique labels
  arr.forEach(obj => {
    Object.keys(obj).forEach(key => {
      labels.add(key);
    });
  });

  // create a new object for each label and its corresponding data
  labels.forEach(label => {
    const data = arr.map(obj => obj[label] || 0); // map values to an array
    result.push({ label, data, type: 'bar', yAxisID: 'bar'});
  });

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

  const witel = $('select[name="witel"');
  console.log({witel: witel.val()});
  const isSelectedWitel = $(witel).val() !== '';
  console.log({isSelectedWitel});

  console.log({filteredProporsi, filteredProfileLoss, filteredAlert});

  const filteredProporsiFlat = filteredProporsi ? Object.values(filteredProporsi) : '';
  const filteredProfileLossFlat = filteredProfileLoss ? Object.values(filteredProfileLoss) : '';
  const filteredAlertFlat = filteredAlert ? Object.values(filteredAlert) : '';
  console.log({filteredProporsiFlat, filteredProfileLossFlat, filteredAlertFlat});
  const groupedSummary = groupByWitelOrSTO(filteredProporsiFlat, isSelectedWitel);
  console.log({groupedSummary});
  const sumTotalLis = groupedSummary.reduce((adder, item) => adder + item.TOTAL_LIS, 0);
  const groupedPercentage = groupedSummary.map(item => ({...item, percentage: item.TOTAL_LIS / sumTotalLis * 100}));
  const groupedProfileLossByYearMonth = groupProfileLossByYearMonth(filteredProfileLoss);
  const groupedSummaryByYearMonth = groupSummaryByYearMonth(filteredProporsi);
  const mergedTrendDataBars = groupedSummaryByYearMonth.map(item => {
    // console.log({item});
    const findSameYearMonth = groupedProfileLossByYearMonth.find(profile => profile.BULAN === item.BULAN);

    let totalLoss = 0;
    if (findSameYearMonth) {
      totalLoss = findSameYearMonth.JUMLAH
    }
    item['TOTAL_LOSS'] = totalLoss;

    return {
      'BULAN': item.BULAN,
      'TOTAL_LOSS': item.TOTAL_LOSS,
      'TOTAL_SALES': item.TOTAL_SALES,
      'TARGET_SALES': item.TARGET_SALES,
    };

    return item;
  });

  const mergedTrendDataLine = mergedTrendDataBars.map(item => {
    return {
      'BULAN': item.BULAN,
      'LOSS_TO_SALES': parseFloat(item.TOTAL_LOSS) / parseFloat(item.TOTAL_LOSS) * 100,
    }
  });
  console.log({groupedProfileLossByYearMonth, groupedSummaryByYearMonth, mergedTrendDataBars, mergedTrendDataLine});

  const canvasSummary = document.getElementById('summary');
  const ctxSummary = canvasSummary.getContext('2d');
  const canvasProporsi = document.getElementById('proporsi');
  const ctxProporsi = canvasProporsi.getContext('2d');
  const canvasTrend = document.getElementById('trend');
  const ctxTrend = canvasTrend.getContext('2d');

  const labelsSummary = Object.keys(dataTotal);
  const dataSummaryRaw = Object.values(dataTotal);
  const labelsTrendMonth = mergedTrendDataBars.map(item => {
    const monthNum = parseInt(item.BULAN.substr(item.BULAN.length-2, 2));
    return monthList[monthNum - 1];
  });
  console.log({labelsTrendMonth});

  const dataSetSummary = [];
  for (let i = 0; i < labelsSummary.length; i++) {
    dataSetSummary.push({x: labelsSummary[i], y: dataSummaryRaw[i]});
  }
  
  const dataSetTrend = transformArray(mergedTrendDataBars);
  dataSetTrend.push({
    type: 'line',
    label: 'Line Dataset',
    data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
  });

  console.log({dataSetTrend});

  const dataTrend = {
    labels: labelsTrendMonth,
    datasets: dataSetTrend
  }

  console.log({dataTrend});

  const dataSummary = {
    datasets: [{
      data: dataSetSummary,
      backgroundColor: Object.keys(dataTotal).map(item => '#' + (Math.random() * 0xFFFFFF << 0).toString(16).padStart(6, '0'))
    }]
  };

  console.log({groupedPercentage});

  const dataProporsi = {
    labels: groupedSummary.map(item => isSelectedWitel ? item.STO : item.WITEL),
    datasets: [{
      label: 'Total LIS',
      data: groupedPercentage.map(item => item.percentage.toFixed(2)),
      backgroundColor: groupedSummary.map(item => '#' + (Math.random() * 0xFFFFFF << 0).toString(16).padStart(6, '0')),
    }]
  };

  console.log({dataProporsi});

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
          display: false,
          position: 'top',
        },
        title: {
          display: false,
          text: 'Proporsi LIS'
        }
      }
    },
  });

  const trendChart = new Chart(ctxTrend, {
    // type: 'bar',
    data: dataTrend,
    options: {
      responsive: true,
      scales: {
        // y: {
        //   beginAtZero: true,
        // },
        // yAxes: [{
        //   id: 'A',
        //   type: 'linear',
        //   position: 'left',
        // }, {
        //   id: 'B',
        //   type: 'linear',
        //   position: 'right',
        //   ticks: {
        //     max: 1,
        //     min: 0
        //   }
        // }]
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

});