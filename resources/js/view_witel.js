const dt = luxon.DateTime;

function groupScores(arr) {
  const result = [...arr.reduce((r, o) => {
    const key = `${o.alert}-${o.witel}-${o.atribut}`;

    const item = r.get(key) || Object.assign({}, o, {
      totalScore: 0,
    });

    item.totalScore += o.score;

    return r.set(key, item);
  }, new Map()).values()];

  return result;
}

function pivot(arr, witelList) {
  const result = [...arr.reduce((r, o) => {
    const key = `${o.alert}-${o.atribut}`;

    const item = r.get(key) || Object.assign({}, o, witelList.reduce((acc, curr) => (acc[curr] = 0, acc), {}));

    witelList.forEach(witel => {
      item[witel] += o[witel];
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

  const filteredData = $('#filter-form').data('filtered-data');
  console.log({filteredData});
  const witelList = $('.witel').data('witel');
  console.log({witelList});

  const filteredValues = Object.values(filteredData);
  const groupedData = groupScores(filteredValues);
  const witelArrHeader = witelList.map(item => ({
    data: item,
    render: function(data, type, row) {
      if (!data) return '';

      return data;
    },
  }));

  const data = groupedData.map((item) => {
    const excludingWitels = witelList.filter(row => row !== item.witel);
    const tes = excludingWitels.reduce((acc, curr) => (acc[curr] = 0, acc), {});
    return {
      alert: item.alert,
      atribut: item.atribut,
      [item.witel]: item.totalScore,
      ...tes
    };
  });

  const pivotData = pivot(data, witelList);
  console.log({data, pivotData});

  const columns = [
    {data: 'alert'},
    {data: 'atribut'},
    ...witelArrHeader
  ];

  console.log({columns});

  $("#table-view-by-witel").DataTable({
    paging: false,
    dom: "Bfrtip",
    data: pivotData,
    columns,
    // columns: [],
    // scrollX: true,
    responsive: true,
    autoWidth: false,
    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    createdRow: function(row, data, dataIndex, cells) {
      console.log({row, data, dataIndex, cells});
      if (data.alert === 'BASIC ALERT' || data.alert === 'LEVERAGING') $(row).css({'background-color': '#69AC65'});
      if (data.alert === 'HIGH ALERT') $(row).css({'background-color': '#F4D165'});
      if (data.alert === 'VERY HIGH ALERT') $(row).css({'background-color': '#BE2A3E', 'color': 'white'});
      if (data.alert === 'CHURN RETENTION') $(row).css({'background-color': '#DB5346', 'color': 'white'});

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