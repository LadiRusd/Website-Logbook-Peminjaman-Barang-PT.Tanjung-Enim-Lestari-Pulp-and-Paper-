</div>
<!---Container Fluid-->
</div>
<!-- Footer -->

<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script src="asset/admin/vendor/jquery/jquery.min.js"></script>
<script src="asset/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="asset/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="asset/admin/js/ruang-admin.min.js"></script>
<script src="asset/admin/vendor/chart.js/Chart.min.js"></script>
<script src="asset/admin/js/demo/chart-area-demo.js"></script>
<script src="asset/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script>
  $(document).ready(function() {
    $('#tabel').DataTable();
  });
  $('.laporanbarangmasuk').DataTable({
    dom: 'Bfrtip',
    buttons: [{
        extend: 'pdfHtml5',
        title: 'Laporan Barang Masuk',
        orientation: 'landscape',
        text: '<i class="fa fa-download"></i> DOWNLOAD LAPORAN BARANG MASUK',
        className: 'btn btn-default btn-sm',
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 7]
        },
        customize: function(doc) {
          doc.content[1].table.widths =
            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
          doc.defaultStyle.alignment = 'center';
          doc.styles.tableHeader.alignment = 'center';
        }

      },
      'colvis'
    ]
  });
  $('.laporanbarangkeluar').DataTable({
    dom: 'Bfrtip',
    buttons: [{
        extend: 'pdfHtml5',
        title: 'Laporan Barang Keluar',
        orientation: 'landscape',
        text: '<i class="fa fa-download"></i> DOWNLOAD LAPORAN BARANG KELUAR',
        className: 'btn btn-default btn-sm',
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5]
        },
        customize: function(doc) {
          doc.content[1].table.widths =
            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
          doc.defaultStyle.alignment = 'center';
          doc.styles.tableHeader.alignment = 'center';
        }

      },
      'colvis'
    ]
  });
  $(document).ready(function() {
    // $(".noqr").select2();
    $(document).ready(function() {
      $('.noqr').select2({
        matcher: function(params, data) {
          // If there are no search terms, return all of the data
          if ($.trim(params.term) === '') {
            return data;
          }
          // Do not display the item if there is no 'text' property
          if (typeof data.text === 'undefined') {
            return null;
          }

          // check for both value and text
          var searchTarget = params.term.toLowerCase();
          if (data.text.toLowerCase().indexOf(searchTarget) > -1 || data.id.toLowerCase().indexOf(searchTarget) > -1) {
            return $.extend({}, data, true);
          }
          //
          return null;
        }
      });

      function matchCustom(params, data) {

      }
    });
  });
</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>