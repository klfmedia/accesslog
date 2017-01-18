 @extends('employee.layout.index')


  @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">ACCESS lOGS 
                            <small>[List]</small>
                        </h1>
                    </div>
                       @if(session('message'))
                        <div class="alert alert-success">
                        {{session('message')}}
                        </div>
                        @endif
                    <!-- /.col-lg-12 -->
                     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr >
                                <th>Id</th>
                                <th>Name</th>
                                <th>Resource</th>
                                <th>Request</th>
                                <th>Send Date</th>
                                <th>Reason</th>
                                <th>Status</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($accesslog as $acc)
                            <tr class="odd gradeX" align="center">
                                <td>{{$acc->id}}</td>
                                <td>{{$acc->user->firstName}}</td>
                                <td>{{$acc->resource->resName}}</td>
                                <td>{{$acc->requestDate}}</td>
                                <td>{{$acc->sendDate}}</td>
                                <td>{{$acc->reason}}</td>
                                @if($acc->accStatus==0)
                                <td style="color:blue">  Pending</td>
                                @elseif($acc->accStatus==1)
                                <td><i class="fa fa-check" style="color:green"></i></td>
                                @else
                                <td><i class="fa fa-close  fa-fw" style="color:red"></i></td>
                                @endif
                            </tr>
                        @endforeach
                
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection


