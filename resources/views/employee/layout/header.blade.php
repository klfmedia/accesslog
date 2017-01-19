<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
              <a href="admin/logout">  <img width="30%" src="public/upload/images/company/klf-Logo.png" alt="Logo KLF" /> </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            
            <!-- /.navbar-header -->
           
            <ul class="nav navbar-top-links navbar-right">
                     @if(Auth::check()) 
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="position: relative;padding-left: 50px;">                
                       <img style=" width:32px; height: 32px; position: absolute; top: 10px; left:10px; border-radius: 50% ;" src="public/upload/images/users/{{Auth::user()->picture}}" > {{ Auth::user()->lastName }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="employee/edit/{{ Auth::user()->id }}"><i class="fa fa-user fa-fw" style="color:green;"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>

                @endif
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            @include('employee.layout.menu')
            <!-- /.navbar-static-side -->
        </nav>
