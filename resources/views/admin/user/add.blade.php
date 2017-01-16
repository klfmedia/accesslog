  @extends('admin.layout.index')
  @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">USER
                            <small>[Add]</small>
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

                        <form action="admin/user/add" method="POST" onsubmit="return checkPass()" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                     
<div style="display: flex; padding-bottom: 18px;width : 450px;">
<div style=" margin-left : 0; margin-right : 1%; width : 49%;">First name<br/>

<input type="text" id="txtFirstName" name="txtFirstName"  style="width: 100%;" class="form-control" />
</div>
<div style=" margin-left : 1%; margin-right : 0; width : 49%;">Last name<br/>
<input type="text" id="txtLastName" name="txtLastName" style="width: 100%;" class="form-control"/>
</div>
</div>
<div style="padding-bottom: 18px;">Gender<br/>
<span><input type="radio" id="gender_0" name="gender" value="male" checked="" /> Male</span><br/>
<span><input type="radio" id="gender_1" name="gender" value="female" />Female</span><br/>
</div>
<div style="padding-bottom: 18px;">Email <span style="color:red">*</span><br/>
<input type="email" id="txtEmail" name="txtEmail"  style="width : 450px;" class="form-control" required/>
</div>

<div id="divPassword" style="padding-bottom: 18px;">Password <span style="color:red">*</span><br/>
<input type="password" id="txtPassword" name="txtPassword" value="" style="width : 450px;" class="form-control " />
</div>

<div id="divPassword" style="padding-bottom: 18px;">Re-Type Password <span style="color:red">*</span>  <span id='message'></span><br/>
<input type="password" id="txtPasswordAgain" name="txtPasswordAgain" value="" style="width : 450px;" class="form-control " />
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
        value="{{$oneDeparment->id}}" >{{ $oneDeparment->deptName}} 
     </option>;
    @endforeach
 </select>
</div>

<div style="padding-bottom: 18px;">Level<br/>
<select id="cboLevel" name="cboLevel" style="width : 450px;" class="form-control">
    <option value="1">User</option>;
    <option value="2">Admin</option>;
 </select>
</div>
<div style="padding-bottom: 18px;">Image<br/>
<input type="file" id="photo" name="photo" style="width : 450px;" class="form-control"/>
</div>
<div id="divSave" style="padding-bottom: 18px;">
<input type="submit" value="Save" id="btnSave" style="width : 200px;" class="btn btn-success"  > 
<input type="button" value="Cancel" id="btnCancel" style="width : 200px;" class="btn btn-default"> 
</div>
<form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
 @endsection

  @section('script')
<script type="text/javascript" src="http://github.com/kvz/phpjs/raw/master/functions/xml/utf8_encode.js"></script>
        <script type="text/javascript" src="http://github.com/kvz/phpjs/raw/master/functions/strings/md5.js"></script>
        <script type="text/javascript">       
                                
        function checkPass()
        {
            if($('#txtPassword').val() == $('#txtPasswordAgain').val())
                {                   
                return true;
                }
            else
            {
                alert("Password doesn't match!" );
                return false;
            }
        };

        $('#txtPassword, #txtPasswordAgain').on('keyup', function () {
            if ($('#txtPassword').val() == $('#txtPasswordAgain').val()) {
                $('#message').html('(Matching)').css('color', 'green');
            } else 
                $('#message').html('(Not Matching)').css('color', 'red');
        });
            
         function DATA2TXT() {
        
            document.getElementById('txtLastName').value="{{old('txtLastName')}}";
            document.getElementById('txtFirstName').value="{{old('txtFirstName')}}";
            document.getElementById('txtEmail').value="{{old('txtEmail')}}";
                                              
            document.getElementById('txtPhone').value="{{old('txtPhone')}}";
            document.getElementById('txtDOB').value="{{old('txtDOB')}}";
            document.getElementById('txtTitle').value="{{old('txtTitle')}}";
            document.getElementById('txtDesignation').value="{{old('txtDesignation')}}";
            document.getElementById('txtJoinDate').value="{{old('txtJoinDate')}}";
            document.getElementById('txtContactName').value="{{old('txtContactName')}}";
            document.getElementById('txtContactPhone').value="{{old('txtContactPhone')}}";
                    
        }
        window.onload = DATA2TXT;   
          
      </script>
@endsection