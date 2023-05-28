<!-----------------footer section ------------------->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019-2020 <a href="">MD Sofikul islam sobhan</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('pos/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('pos/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('pos/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('pos/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('pos/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('pos/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('pos/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('pos/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('pos/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('pos/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('pos/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('pos/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('pos/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('pos/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('pos/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('pos/dist/js/pages/dashboard.js')}}"></script>
<!--------------data table ------------------->
<script src="{{ asset('pos/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('pos/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('pos/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<!----------sweat alert link ------------->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-------------toaster link --------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('pos/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    // $(function () {
    // //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
     $('.select2bs4').select2({
      theme: 'bootstrap4'
     });
</script>
<script>
  @if(Session::has('massage'))
      var type = "{{Session::get('alert-type','info')}}"
         switch(type){
             case 'info':
               toastr.info("{{Session::get('massage')}}");
               break;
               
               case 'success':
               toastr.success("{{Session::get('massage')}}");
               break;

                case 'warning':
               toastr.warning("{{Session::get('massage')}}");
               break;

               case 'error':
               toastr.error("{{Session::get('massage')}}");
               break;     
            }
            @endif
</script>
<script>
  $(document).on("click","#delete",function(e){
       e.preventDefault();
       var link = $(this).attr("href");
       swal({
          title:"Are you want to delete?",
          text:"Once delete, this will be parmanently Delete!",
          icon:"warning",
          buttons:true,
          dangerMode:true,

        })
        .then((willDelete)=>{
         if(willDelete){
            window.location.href=link;    
           }else{
              swal("safe Data!!");
             }
         });
  
   });

</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<script>
  $(document).on("click","#approve",function(e){
       e.preventDefault();
       var link = $(this).attr("href");
       swal({
          title:"Are you want to approve?",
          text:"Once approve, this will be approval!",
          icon:"success",
          buttons:true,
          dangerMode:true,

        })
        .then((willDelete)=>{
         if(willDelete){
            window.location.href=link;    
           }else{
              swal("cencel approve!!");
             }
         });
  
   });

</script>
</body>
</html>