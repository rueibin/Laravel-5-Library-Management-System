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
    <!-- Animate.css -->
    <link href="{{asset('/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            <form action="{{route('auth.check')}}" method="post">
              {{ csrf_field() }}
              <h1>Login Form</h1>
              
              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="輸入帳號" autofocus>
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="輸入密碼">
                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
              </div>

              <div>
                <span class="text-danger"> <strong>{{ $errors->first('loginError')}}</strong></span>
              </div>
              
              <div class="clearfix"></div>

              <div>
                <button type="submit" class="btn btn-primary">登入</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <h1></i>圖書館管理系統</h1>
                  <p>Copyright © 2018 RueiBin All Rights Reserved.</p>
                </div>
              </div>
            </form>

          </section>
        </div>
      </div>
    </div>
  </body>
</html>
