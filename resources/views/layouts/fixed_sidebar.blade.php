<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>圖書館管理系統</title>

    <!-- Bootstrap -->
    <link href="{{asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{asset('/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="{{asset('/css/custom.min.css')}}" rel="stylesheet">

    @yield('style')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('home.index')}}" class="site_title"><span>RUEIBIN</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('/images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::guard('backend')->user()->username}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                  @permission('borrow')
                  <li><a><i class="fa fa-home"></i>圖書借還管理<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       @permission('borrow-list')
                        <li><a href="{{route('borrow.index')}}">圖書借閱</a></li>
                      @endpermission
                      @permission('borrow-bookReturn')
                        <li><a href="{{route('borrow.back')}}">圖書歸還</a></li>
                      @endpermission
                    </ul>
                  </li>
                  @endpermission

                  @permission('book')
                  <li><a><i class="fa fa-home"></i>圖書檔案管理<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @permission('book-list')
                        <li><a href="{{route('book.index')}}">圖書檔案管理</a></li>
                      @endpermission
                    </ul>
                  </li>
                  @endpermission

                  @permission('reader')
                  <li><a><i class="fa fa-home"></i>讀者管理<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @permission('reader-list')
                        <li><a href="{{route('reader.index')}}">讀者管理</a></li>
                      @endpermission
                    </ul>
                  </li>
                  @endpermission
                 
{{--  
                  <li><a><i class="fa fa-home"></i>系統查詢<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="###">圖書借閱查詢</a></li>
                      <li><a href="###">借閱到期提醒</a></li>
                    </ul>
                  </li>  --}}

                  @permission('basic')
                  <li><a><i class="fa fa-home"></i>基本設定<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @permission('bookcase-list')
                        <li><a href="{{route('bookcase.index')}}">書架設定</a></li>
                      @endpermission
                      
                      @permission('booktype-list')
                        <li><a href="{{route('booktype.index')}}">圖書類型設定</a></li>
                      @endpermission
                      
                      @permission('publishing-list')
                        <li><a href="{{route('publishing.index')}}">出版社設定</a></li>
                      @endpermission
                    </ul>
                  </li>  
                  @endpermission

                  @permission('permission')
                  <li><a><i class="fa fa-edit"></i>權限管理<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      @permission('manager-list')
                        <li><a href="{{route('manager.index')}}">帳號管理</a></li>
                      @endpermission
                      
                      @permission('role-list')
                        <li><a href="{{route('role.index')}}">角色管理</a></li>
                      @endpermission
                      
                      @permission('permission-list')
                        <li><a href="{{route('permission.index')}}">權限管理</a></li>
                      @endpermission

                    </ul>
                  </li>
                   @endpermission
                </ul>
              </div>            
            </div> 


            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
               <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('auth.logout')}}" onclick="event.preventDefault();  logout();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('/images/img.jpg')}}" alt="">{{Auth::guard('backend')->user()->username}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                       <a href="{{ route('auth.logout') }}" onclick="event.preventDefault(); logout();">
                        <i class="fa fa-sign-out pull-right"></i> 
                        Log Out
                      </a>
                      <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
               
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        {{-- <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>
              </div>
            </div>
          </div>
        </div> --}}

        @yield('content')

        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            圖書館管理系統 by <a href="javascript:;">RueiBin</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('/vendors/nprogress/nprogress.js')}}"></script>
    <!-- jQuery custom content scroller -->
    <script src="{{asset('/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('/js/custom.min.js')}}"></script>
    
    @yield('script')

     <script>
      function logout()
      {
        var r = confirm("確認登出嗎!");
        if (r == true) { document.getElementById('logout-form').submit(); }
      }
    </script>
  </body>
</html>