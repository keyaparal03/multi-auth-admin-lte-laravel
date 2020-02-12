<!DOCTYPE html>
<html lang="en">
<head>
 @include('admin.includes.head');

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('admin.includes.header');
  @include('admin.includes.sidebar');

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @section('content-header')
        This is the master sidebar.
    @show
    @include('admin.includes.messages')
    <!-- /.content-header -->
    @section('content')
        This is the master sidebar.
    @show

  </div>
   @include('admin.includes.footer');
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>  </script>
<script>
CKEDITOR.replace( 'description' );
CKEDITOR.replace( 'description2' );
CKEDITOR.replace( 'description1' );
</script>
</body>
</html>
