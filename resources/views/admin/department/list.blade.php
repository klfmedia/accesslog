  @extends('admin.layout.index')
  @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">DEPARTMENT
                            <small>[List]</small>
                            <a style="float:right;" href="admin/department/add"><i class="fa fa-bank fa-fw"></i>+</a>
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
                                <th>Location</th>
                                <th>Description</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($department as $dept)
                            <tr class="odd gradeX" align="center">
                                <td>{{$dept->id}}</td>
                                <td>{{$dept->deptName}}</td>
                                <td>{{$dept->deptLocation}}</td>
                                <td>{{$dept->deptDescription}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/department/delete/{{$dept->id}}" onclick ="return confirmDelete('Are You sure to delete(When you delete every users in this department will be delete also)')"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/department/edit/{{$dept->id}}">Edit</a></td>
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