  @extends('employee.layout.index')
  @section('content')
 <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 769px">
            <div class="container-fluid" >
                <div class="row">
                <!-- <div class="col-md-3 col-xs-6"></div> -->
                <div class="col-md-12 col-xs-12" >
                    <div class="col-lg-12">
                        <h1 class="page-header">{{Auth::user()->firstName.",".Auth::user()->lastName}}   <small>[{{Auth::user()->email}}]</small> </h1>
                    </div>
                </div>
                </div>


                <div class="row">
                    <!-- /.col-lg-12 -->
                    <!--<div class="col-md-3 col-xs-6"></div> -->
                    <div class="col-md-12 col-xs-12" style="padding-bottom:80px">
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
            
                        <form action="employee/sendrequest" method="POST" >
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div style="padding-bottom: 18px;">Request Date <br/>
                        <input type="date" id="txtRequestDate" name="txtRequestDate" style="width : 450px;" class="form-control"/>
                        </div>
                        <div style="padding-bottom: 18px;">Reason<br/>
                        <textarea style="width : 450px; height: 100px" class="form-control" name="txtReason" >{{old('txtReason')}}</textarea>
                        </div>
                        <div style="padding-bottom: 18px;">Resource Name<br/>
                        <select id="cboResource" name="cboResource" style="width : 450px;" class="form-control">
                            @foreach ($resource as $oneResource)
                            <option value="{{$oneResource->id}}" > {{ $oneResource->resName}}   </option> 
                            @endforeach
                         </select>
                        </div>

                        <div id="divSave" style="padding-bottom: 18px;">
                        <input type="submit" value="Send" id="btnSave" style="width : 220px;" class="btn btn-success"  > 
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
