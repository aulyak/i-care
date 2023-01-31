const dt = luxon.DateTime;

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

  const data = Object.values(filteredData).map(item => ({
    notel: item.notel,
    witel: item.witel,
    sto: item.sto,
    tgl_ps: item.tgl_ps,
    age: item.age,
    atribut: item.atribut,
    alert: item.alert,
    score: item.score,
    bulan_alert: item.bulan_alert,
    status: item.status,
    deskripsi: item.deskripsi,
    action: ''
  }));

  console.log({data});

  $('#table-update').DataTable({
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
    paging: true,
    lengthChange: false,
    searching: false,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    data,
    columns: [
      {data: 'notel'},
      {data: 'witel'},
      {data: 'sto'},
      {data: 'tgl_ps'},
      {data: 'age'},
      {data: 'atribut'},
      {data: 'alert'},
      {data: 'score'},
      {data: 'bulan_alert'},
      {data: 'status'},
      {data: 'deskripsi'},
      {
        data: 'action', render: (data, type, row) => `<button type="button" class="form-control btn"><i class="nav-icon fas fa-edit"
      data-toggle="modal" data-target="#modal-lg"></i></button>`}
    ]
    // lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, All] ],
    // pageLength: 50
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});