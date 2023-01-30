const dt = luxon.DateTime;

function groupScores(arr) {
  const result = [...arr.reduce((r, o) => {
    const key = `${o.alert}-${o.bulan_alert}-${o.atribut}`;

    const item = r.get(key) || Object.assign({}, o, {
      totalScore: 0,
    });

    item.totalScore += o.score;

    return r.set(key, item);
  }, new Map()).values()];

  return result;
}

function pivot(arr, bulanAlertList) {
  const result = [...arr.reduce((r, o) => {
    const key = `${o.alert}-${o.atribut}`;

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
  const bulanAlertArrHeader = bulanAlertList.map(item => ({data: item}));

  const data = groupedData.map((item) => {
    const excludingBulanAlert = bulanAlertList.filter(row => row !== item.bulan_alert);
    const tes = excludingBulanAlert.reduce((acc, curr) => (acc[curr] = 0, acc), {});
    return {
      alert: item.alert,
      atribut: item.atribut,
      [item.bulan_alert]: item.totalScore,
      ...tes
    };
  });

  const pivotData = pivot(data, bulanAlertList);

  const columns = [
    {data: 'alert'},
    {data: 'atribut'},
    ...bulanAlertArrHeader,
  ];

  $("#table-view-by-age").DataTable({
    dom: "Bfrtip",
    data: pivotData,
    columns,
    scrollX: true,
    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
  });
});