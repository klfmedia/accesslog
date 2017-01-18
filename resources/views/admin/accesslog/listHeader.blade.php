  @extends('admin.layout.index')
  @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">                       
                             @yield('status')
                    </div>
                       @if(session('message'))
                        <div class="alert alert-success">
                        {{session('message')}}
                        </div>
                        @endif
 <!-- /. ROW  -->
                <hr />
                <div class="row">                    
                    <div class="col-md-8">
                        <h5>Click for view:</h5>                        
                       
                        <a href="admin/accesslog/listaccept" class="btn btn-success">Accept List</a>
                        <a href="admin/accesslog/listdeny" class="btn btn-danger">Deny List</a>
                        <br />
                        <br />
                        <h5>Progressbar</h5>
                        <div class="progress progress-striped">
                            <div class="progress-bar progress-bar-primary active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width:{{$percentRequest['percentPending']}}%">
                            {{$percentRequest['percentPending']}}% Not Decided
                            </div>
                            
                        </div>
                        <div class="progress progress-striped ">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="20" style="width:{{$percentRequest['percentAccept']}}%">
                             {{$percentRequest['percentAccept']}}% Accept
                            </div>
                        </div>
                        <div class="progress progress-striped ">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="20" style="width:{{$percentRequest['percentDeny']}}%">
                               {{$percentRequest['percentDeny']}}% Deny
                            </div>
                        </div>

                    </div>
                </div>
        <hr />
                    <!-- /.col-lg-12 -->
                @yield('table')
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection


 