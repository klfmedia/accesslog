  @extends('admin.layout.index')
  @section('content')
 <!-- Page Content -->
        <div id="page-wrapper" >
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">USER
                            <small>[List]</small>
                              <a style="float:right;" href="admin/user/add"><i class="fa fa-user fa-fw"></i>+</a>
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
                            <tr align="center">
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>DOB</th>
                                <th>Phone</th>
                                <th>Permission</th>
                                <th>Department</th>
                                <th>Action</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $u)
                            <tr class="odd gradeX" >
                                <td><img width="80" height="60" src="public/upload/images/users/{{$u->picture}}" alt="No Picture"></td>
                                <td>{{$u->firstName.','.$u->lastName}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->title}}</td>
                                <td>{{$u->dateOfBirth}}</td>
                                <td>{{$u->phoneNumber}}</td>
                              
                               @if($u->level==2)
                                <td>Admin</td>
                               @else
                                <td>User</td>
                               @endif 
                              <td>{{$u->department->deptName}}</td>
                                <td align="center">
                                
                                <a href="admin/user/status/{{$u->id}}"> 
                                @if($u->status=='active')
                                     <i class="fa fa-user" style="color:green"></i>  
                                 @else
                                     <i class="fa fa-user" style="color:black"></i> 
                                @endif
                                </a>
                                </td>
                                <td align="center"> <a href="admin/user/edit/{{$u->id}}"><i class="fa fa-pencil fa-fw"></i></a></td>
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

@section('script')
<script>
    // $('.status:contains("active")').css('background-color', 'rgb(0, 255, 0)');
     //$('.gradeX:contains("active")').css('background-color', 'rgb(128,128,128)');
      //$('.gradeX:contains("deactive")').children().css('background-color', '#d4e3e5');
</script>
@endsection