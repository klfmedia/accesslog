  @extends('admin.layout.index')
  @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">RESOURCE
                            <small>[List]</small>
                              <a style="float:right;" href="admin/resource/add"><i class="fa fa-cube fa-fw"></i>+</a>
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($resource as $res)
                            <tr class="odd gradeX" align="center">
                                <td>{{$res->id}}</td>
                                <td>{{$res->resName}}</td>                               
                                <td>{{$res->resDescription}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/resource/delete/{{$res->id}}" onclick ="return confirmDelete('Are You sure to delete')"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/resource/edit/{{$res->id}}">Edit</a></td>
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