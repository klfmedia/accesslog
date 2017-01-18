  @extends('admin.layout.index')
  @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">RESOURCE
                            <small>[{{$resource->resName}}]</small>
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

                        <form action="admin/resource/edit/{{$resource->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                           
                            <div class="form-group">
                                <label>Resource Name</label>
                                <input class="form-control" name="txtResName" value="{{$resource->resName}}" placeholder="Please Enter Resource Name" />
                            </div>
                            <div class="form-group">
                                <label>Resource Description</label>
                                <textarea name="txtResDesc"  class="form-control" rows="3">{{$resource->resDescription}}</textarea>
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


