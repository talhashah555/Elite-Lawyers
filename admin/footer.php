<footer class="main-footer">
  <strong>Copyright &copy; 2014-2021 <a href="#">SMS</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Theme By </b> Sir Shazaib khan
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
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->

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
  $(document).ready(function () {
    var path = window.location.href;
    console.log(path);

    $(".nav-link").each(function () {
      var href = $(this).attr('href');
      console.log(href);

      if (path === decodeURIComponent(href)) {
        var parent = $(this).closest('.has-treeview');
        parent.addClass('menu-open');
        parent.find('.nav-link').first().addClass('active');
        console.log(parent);
      }
    });

    // Add class when clicking on nav-link
    $(".nav-link").on("mousedown", function () {
      $(this).addClass("active");
    });

    // Remove class when releasing the mouse
    $(".nav-link").on("mouseup", function () {
      var $this = $(this);
      setTimeout(function () {
        $this.removeClass("active");
      }, 100); // Adjust the delay as needed
    });
  });





</script>

</body>

</html>