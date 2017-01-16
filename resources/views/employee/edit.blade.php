  @extends('employee.layout.index')
  @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">USER
                            <small>[{{$user->email}}]</small>
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

                        <form action="admin/user/edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                     
<div style="display: flex; padding-bottom: 18px;width : 450px;">
<div style=" margin-left : 0; margin-right : 1%; width : 49%;">First name<br/>

<input type="text" id="txtFirstName" name="txtFirstName"  style="width: 100%;" class="form-control" required/>
</div>
<div style=" margin-left : 1%; margin-right : 0; width : 49%;">Last name<br/>
<input type="text" id="txtLastName" name="txtLastName" style="width: 100%;" class="form-control" required/>
</div>
</div>
<div style="padding-bottom: 18px;">Gender<br/>
<span><input type="radio" id="gender_0" name="gender" value="male" {{$user->gender=='male'?'checked':''}} /> Male</span><br/>
<span><input type="radio" id="gender_1" name="gender" value="female" {{$user->gender=='female'?'checked':''}}/>Female</span><br/>
</div>
<div style="padding-bottom: 18px;">Email<br/>
<input type="email" id="txtEmail" name="txtEmail"  style="width : 450px;" class="form-control" required/>
</div>

<div id="divPassword" style="padding-bottom: 18px;">Password<br/>
<input type="password" id="txtPassword" name="txtPassword" value="" style="width : 450px;" class="form-control " />
</div>

<br/>
<div style="padding-bottom: 18px;">Phone<br/>
<input type="text" id="txtPhone" name="txtPhone"  style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Date Of Birth <br/>
<input type="date" id="txtDOB" name="txtDOB" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Title <br/>
<input type="text" id="txtTitle" name="txtTitle" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Designation<br/>
<input id="txtDesignation" name="txtDesignation" style="width : 450px;" type="text" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Join Date<br/>
<input type="date" id="txtJoinDate" name="txtJoinDate" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Contact Name<br/>
<input type="text" id="txtContactName" name="txtContactName" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Contact Phone<br/>
<input type="text" id="txtContactPhone" name="txtContactPhone" style="width : 450px;" class="form-control"/>
</div>

<div style="padding-bottom: 18px;">Department Name<br/>
<select id="cboDeparment" name="cboDeparment" style="width : 450px;" class="form-control">

    @foreach ($department as $oneDeparment)
    <option 
        @if($oneDeparment->id == $user->deptID)
            {{"selected "}}  
        @endif
        value="{{$oneDeparment->id}}" >{{ $oneDeparment->deptName}} 
     </option>;
    
    @endforeach

 </select>
</div>
<div style="padding-bottom: 18px;">Level<br/>


<select id="cboLevel" name="cboLevel" style="width : 450px;" class="form-control" disabled="">
    <option value="1" {{$user->level==1?"selected":""}}>User</option>;
    <option value="2" {{$user->level==2?"selected":""}}>Admin</option>;
 </select>


</div>
<div style="padding-bottom: 18px;">Image<br/>
<input type="file" id="photo" name="photo" style="width : 450px;" class="form-control"/>
</div>
<div id="divSave" style="padding-bottom: 18px;">
<input type="submit" value="save" id="btnSave" style="width : 220px;" class="btn btn-success"  > 
<input type="button" value="Cancel" id="btnCancel" style="width : 220px;" class="btn btn-default"> 
</div>
</form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
 @endsection

@section('script')
 <script type="text/javascript">
        function DATA2TXT() {
        
            document.getElementById('txtLastName').value='{{$user->lastName}}';
            document.getElementById('txtFirstName').value='{{$user->firstName}}';
            document.getElementById('txtEmail').value='{{$user->email}}';
            document.getElementById('txtPassword').value='{{$user->password}}'; 
            document.getElementById('txtPhone').value='{{$user->phoneNumber}}';
            document.getElementById('txtDOB').value='{{$user->dateOfBirth}}';
            document.getElementById('txtTitle').value='{{$user->title}}';
            document.getElementById('txtDesignation').value='{{$user->designation}}';
            document.getElementById('txtJoinDate').value='{{$user->joinDate}}';  
            document.getElementById('txtContactName').value='{{$user->contactName}}';
            document.getElementById('txtContactPhone').value='{{$user->contactPhone}}'; 
                    
        }
        window.onload = DATA2TXT;      


        </script>

 @endsection