const dt = luxon.DateTime;

function groupScores(arr) {
  const result = [...arr.reduce((r, o) => {
    const key = `${o.ALERT}-${o.BULAN_ALERT}-${o.ATRIBUT}`;

    const item = r.get(key) || Object.assign({}, o, {
      totalScore: 0,
    });

    item.totalScore += o.SCORE;

    return r.set(key, item);
  }, new Map()).values()];

  return result;
}

function pivot(arr, bulanAlertList) {
  const result = [...arr.reduce((r, o) => {
    const key = `${o.ALERT}-${o.ATRIBUT}`;

    const item = r.get(key) || Object.assign({}, o, bulanAlertList.reduce((acc, curr) => (acc[curr] = 0, acc), {}));

    bulanAlertList.forEach(bulan => {
      item[bulan] += o[bulan];
    });

    return r.set(key, item);
  }, new Map()).values()];

  return result;
}

$(document).ready(function() {
  setInterval(() => {
    const now = dt.now();
    const currentDtReadable = now.toLocaleString({weekday: 'long', month: 'long', day: '2-digit', year: 'numeric'});
    const localTime = now.toFormat('HH:mm');
    $('.date').text(currentDtReadable);
    $('.time').text(localTime);
  }, 1000);

  const bulanAlertList = $('#filter-form').data('bulan-alert-list');
  const filteredData = $('#filter-form').data('filtered-data');

  const filteredValues = Object.values(filteredData);
  const groupedData = groupScores(filteredValues);
  const bulanAlertArrHeader = bulanAlertList.map(item => ({
    data: item,
    render: function(data, type, row) {
      if (!data) return '';

      return data;
    },
  }));

  const data = groupedData.map((item) => {
    const excludingBulanAlert = bulanAlertList.filter(row => row !== item.BULAN_ALERT);
    const tes = excludingBulanAlert.reduce((acc, curr) => (acc[curr] = 0, acc), {});
    return {
      ALERT: item.ALERT,
      ATRIBUT: item.ATRIBUT,
      [item.BULAN_ALERT]: item.totalScore,
      ...tes
    };
  });

  const pivotData = pivot(data, bulanAlertList);

  const columns = [
    {data: 'ALERT'},
    {data: 'ATRIBUT'},
    ...bulanAlertArrHeader,
  ];

  $("#table-view-by-age").DataTable({
    paging: false,
    dom: "Bfrtip",
    data: pivotData,
    columns,
    scrollX: true,
    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    createdRow: function(row, data, dataIndex, cells) {
      console.log({row, data, dataIndex});
      if (data.ALERT === 'BASIC ALERT' || data.ALERT === 'LEVERAGING') $(row).css({'background-color': '#69AC65'});
      if (data.ALERT === 'HIGH ALERT') $(row).css({'background-color': '#F4D165'});
      if (data.ALERT === 'VERY HIGH ALERT') $(row).css({'background-color': '#BE2A3E', 'color': 'white'});
      if (data.ALERT === 'CHURN RETENTION') $(row).css({'background-color': '#DB5346', 'color': 'white'});

      $(cells).each(function(idx, cell) {
        if ([0, 1].includes(idx)) $(cell).css({'background-color': 'white', 'color': 'black'});
      });
    },
    columnDefs: [{
      targets: '_all',
      createdCell: function(td, cellData, rowData, row, col) {
        console.log({cellData});
        if (cellData === 0) {
          $(td).css('background-color', 'white');
        }
      }
    }],
  });
});