const dt = luxon.DateTime;

$(document).ready(function() {
  setInterval(() => {
    const now = dt.now();
    const currentDtReadable = now.toLocaleString({weekday: 'long', month: 'long', day: '2-digit', year: 'numeric'});
    const localTime = now.toFormat('HH:mm');
    $('.date').text(currentDtReadable);
    $('.time').text(localTime);
  }, 1000);

  $('#example2').DataTable({
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
  $('#arpuxSpeed').DataTable({
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
});