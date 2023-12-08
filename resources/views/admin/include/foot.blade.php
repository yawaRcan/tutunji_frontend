<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@yield('script')
<!-- jQuery -->
<script src="{{asset('')}}admin-panel/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('')}}admin-panel/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{asset('')}}admin-panel/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="{{asset('')}}admin-panel/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('')}}admin-panel/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('')}}admin-panel/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('')}}admin-panel/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('')}}admin-panel/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('')}}admin-panel/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('')}}admin-panel/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('')}}admin-panel/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('')}}admin-panel/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('')}}admin-panel/assets/plugins/moment/moment.min.js"></script>
<script src="{{asset('')}}admin-panel/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('')}}admin-panel/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- editor --js -->
@yield('editor-js')
<!-- overlayScrollbars -->
<script src="{{asset('')}}admin-panel/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('')}}admin-panel/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('')}}admin-panel/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('')}}admin-panel/assets/dist/js/demo.js"></script>
<!-- sweet-alert -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>--}}
<!-- swal-popup -->
{{--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<!-- add/edit modal popup -->
<script src="{{asset('')}}admin-panel/assets/custom-js-model/Js/Jquery.js"></script>
<script>
    let base_url = "https://tutunjirealty.com/demo/public"; /*https://tutunjirealty.com/demo/public*/
</script>
{{--<!-- sweet alert2-->--}}
{{--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
{{--@if($message = session('success'))--}}
{{--    <script>--}}
{{--        swal("Good job!", "{{$message}}", "success");--}}
{{--    </script>--}}
{{--@endif--}}
<!-- data-table scripts -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            /*"order":[[0, 'desc']]*/
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order":[[0, 'desc']]
        });
    });
</script>
<!-- line-chart js -->
@yield('line-chart-js')

</body>
</html>
