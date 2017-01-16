  @extends('admin.layout.index')
  @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">NOTICE
                            <small>[List]</small>
                            <a style="float:right;" href="admin/html/notice/create"><i class="fa fa-bullhorn fa-fw"></i>+</a>
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
                                <th>ID</th>
                                <th>Description</th>
                                <th>Level</th>
                                <th>Notify Date</th>
                                <th>Expire Date</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($notice as $ntc)
                            <tr class="odd gradeX" align="center">
                                <td>{{$ntc->id}}</td>
                                <td>{{$ntc->description}}</td>
                                <td>{{$ntc->level}}</td>
                                <td>{{$ntc->notifyDate}}</td>
                                <td>{{$ntc->expireDate}}</td>                              
                                <td >
                                     <form  action="admin/html/notice/{{$ntc->id}}" method="POST" onsubmit="return confirmDelete('Are You sure to delete')">
                                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                                         <input type="hidden" name="_method" value="DELETE" >
                                         <i class="fa fa-trash-o  fa-fw"></i>
                                         <input type="submit" value="Delete" id="btnSave" class="btn btn-link"  > 
                                      </form>
                                </td>
                             
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/html/notice/{{$ntc->id}}/edit">Edit</a></td>
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