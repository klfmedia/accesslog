  @extends('admin.layout.index')
  @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">DEPARTMENT
                            <small>[{{$department->deptName}}]</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(count($errors)>0)
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                        </div>
                         @endif
                        @if(session('message'))
                        <div class="alert alert-success">
                        {{session('message')}}
                        </div>
                        @endif

                        <form action="admin/department/edit/{{$department->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                           
                            <div class="form-group">
                                <label>Department Name</label>
                                <input class="form-control" name="txtDeptName" value="{{$department->deptName}}" placeholder="Please Enter Department Name" />
                            </div>
                            <div class="form-group">
                                <label>Department Location</label>
                                <input class="form-control" name="txtDeptLocation" value="{{$department->deptLocation}}" placeholder="Please Enter Location" />
                            </div>
                          
                            <div class="form-group">
                                <label>Department Description</label>
                                <textarea name="txtDeptDesc"  class="form-control" rows="3">{{$department->deptDescription}}</textarea>
                            </div>
                          
                           
                            <input type="submit" value="save" id="btnSave" style="width : 200px;" class="btn btn-success"  > 
                            <input type="button" value="Cancel" id="btnCancel" style="width : 200px;" class="btn btn-default"> 
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
 @endsection
