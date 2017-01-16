<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Access Log Management">
    <meta name="author" content="">
    <title>KLF </title>
    <base href="{{asset('')}}" >
    <!-- Bootstrap Core CSS -->
    <link href="public/admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="public/admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="public/admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="public/admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="public/admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="public/main_asset/images/favicon.ico">
</head>

<body>

    <div id="wrapper">
       

        @include('employee.layout.header')

        <marquee>
                @foreach($notice as $note)
                    @if($note->level==1)
                        {!! $note->description." "!!}&nbsp&nbsp&nbsp
                    @else
                        <span style="font-weight:bold"> {!! $note->description." " !!}&nbsp&nbsp&nbsp </span>
                    @endif
                @endforeach
        </marquee>
        <!-- Page Content -->
       @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
     @include('employee.layout.footer')
    <!-- jQuery -->
    <script src="public/admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="public/admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="public/admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="public/admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="public/admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
     <script src="public/admin_asset/js/myscript.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
   
      @yield('script')

      <script>
         $('#btnCancel').click(function() {
              location.reload();
        });          
           $("div.alert").delay(3000).slideUp();
        </script>
</body>

</html>
