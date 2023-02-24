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
    NOTEL: item.NOTEL,
    WITEL: item.WITEL,
    STO: item.STO,
    TGL_PS: item.TGL_PS,
    AGE: item.AGE,
    ATRIBUT: item.ATRIBUT,
    ALERT: item.ALERT,
    SCORE: item.SCORE,
    BULAN_ALERT: item.BULAN_ALERT,
    STATUS: item.STATUS,
    DESKRIPSI: item.DESKRIPSI,
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
      {data: 'NOTEL'},
      {data: 'WITEL'},
      {data: 'STO'},
      {data: 'TGL_PS'},
      {data: 'AGE'},
      {data: 'ATRIBUT'},
      {data: 'ALERT'},
      {data: 'SCORE'},
      {data: 'BULAN_ALERT'},
      {data: 'STATUS'},
      {data: 'DESKRIPSI'},
      {
        data: 'action', render: (data, type, row) => `<button type="button" class="form-control btn"><i class="nav-icon fas fa-edit"
      data-toggle="modal" data-target="#modal-lg"></i></button>`}
    ]
    // lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, All] ],
    // pageLength: 50
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});