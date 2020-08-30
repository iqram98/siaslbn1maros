  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/js/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/js/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/js/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/js/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>

<script type="text/javascript">
      $(document).ready( function () {
        $('#table_id').DataTable({
          "responsive": true,
          "autoWidth": false,
          "paging": true,
          "ordering": true,
          "info": true,
          });
      } );
    </script>
  <script>
    new Chart(document.getElementById("chartjs-1"),
        {
          "type":"bar",

          "data":{
            "labels":["Tunanetra(A)","Tunarungu(B)","Tunagrahita(C)","Tunadaksa(D)","Autis(Q)"],
            "datasets":[{"label":"Siswa","data":[
            <?= $statistik ?>
            ],
            "fill":false,
            "backgroundColor":["rgba(255, 99, 132, 0.2)","rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)"],
            "borderColor":["rgb(255, 99, 132)","rgb(255, 159, 64)","rgb(255, 205, 86)","rgb(75, 192, 192)","rgb(54, 162, 235)"],
            "borderWidth":1}]
          },

          "options":
          {
            "scales":
            {
              "yAxes":[
              {
                "ticks":
                {
                  "beginAtZero":true
                }
              }]
            }
          }
        });
      
      $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
  </script>
</body>
</html>
