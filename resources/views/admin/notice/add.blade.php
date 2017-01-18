  @extends('admin.layout.index')
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
            
                        <form action="admin/html/notice" method="POST" >
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div style="padding-bottom: 18px;">Notify Date <br/>
                        <input type="date" id="txtNotifyDate" name="txtNotifyDate" style="width : 450px;" class="form-control" value="{{ old('txtNotifyDate') }}"/>
                        </div>
                        <div style="padding-bottom: 18px;">Expire Date <br/>
                        <input type="date" id="txtExpireDate" name="txtExpireDate" style="width : 450px;" class="form-control" value="{{ old('txtExpireDate') }}"/>
                        </div>
                        <div style="padding-bottom: 18px;">Description<br/>
                        <textarea style="width : 450px; height: 100px"  class="form-control" id="demo" name="txtDescription" placeholder="Please Enter Description" >{{ old('txtDescription') }} </textarea>
                       

                        </div>
                        <div style="padding-bottom: 18px;">Emergency<br/>
                        <span><input type="radio"  name="ckbLevel" value="1" checked="" />Normal</span><br/>
                        <span><input type="radio"  name="ckbLevel" value="2" />Emergency</span><br/>
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

