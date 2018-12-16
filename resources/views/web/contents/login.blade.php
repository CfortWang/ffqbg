<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - {{$title}} </title>
    <link rel="icon" href="/img/logo/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/custom.css') !!}" />

    @yield('css')
</head>

<body class="gray-bg login-bg">

  <div class="middle-box text-center loginscreen animated fadeInDown login-form-wrapper">
    <div>
      <div class="login-logo">
        <!-- <img alt="logo" src="/img/login/bo_login_logo.png"/> -->
      </div>
      <!-- <form class="m-t" role="form"> -->
        <div class="form-group">
          <div class="login-title">发发圈后台</div>
        </div>
        <div class="form-group">
          <div class="input-group m-b login-input-gruop">
            <span class="input-group-btn">
              <div class="login-label">{{ __('login.id') }}</div>
            </span>
            <input type="text" id="login-id" class="form-control" required="">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group m-b login-input-gruop">
            <span class="input-group-btn">
              <div class="login-label">{{ __('login.password') }}</div>
            </span>
            <input type="password" id="login-password" class="form-control" required="">
          </div>
        </div>
        <button type="button" id="login-btn" class="btn btn-primary block full-width m-b">{{ __('login.login') }}</button>
      <!-- </form> -->
    </div>
  </div>

  <script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
  <!-- Custom Alert -->
  <script src="{!! asset('js/plugins/bootbox.min.js') !!}" type="text/javascript"></script>
  <script>
  var insertID = '{{ __("login.message.insertID") }}';
  var insertPW = '{{ __("login.message.insertPW") }}';
  var loginSuccess = '{{ __("login.message.loginSuccess") }}';
  var checkID = '{{ __("login.message.checkID") }}';
  var checkPW = '{{ __("login.message.checkPW") }}';
  var serverError = '{{ __("login.message.serverError") }}';

  function doLogin(loginID, loginPW) {
    if (!loginID) {
      bootbox.alert(insertID);
      return false;
    }
    if (!loginPW) {
      bootbox.alert(insertPW);
      return false;
    }

    $.ajax({
      url: '/login/access',
      data: {
        'loginID' : loginID,
        'loginPW' : loginPW
      },
      dataType: 'json',
      type: 'POST',
      success: function(data){
        console.log(data);
        if (data.status === 101) {
          bootbox.alert(checkID);
        } else if (data.status === 102) {
          bootbox.alert(checkPW);
        } else if (data.status === 200) {
          bootbox.alert(loginSuccess);
          location.href ='/';
        } else{
          bootbox.alert(serverError);
        }
      },
      error: function(data) {
        
      }
    });
  }
  $(document).ready(function(){
    $('#login-id, #login-password, #login-btn').on('keydown', function(e) {
      if (e.which === 13) {
        e.preventDefault();
        var loginID = $('#login-id').val().replace(/ /gi, '');
        var loginPW = $('#login-password').val().replace(/ /gi, '');
        $('#login-id').val(loginID);
        $('#login-password').val(loginPW);

        doLogin(loginID, loginPW);
      }
    });
    $('#login-btn').click(function(e) {
      var loginID = $('#login-id').val().replace(/ /gi, '');
      var loginPW = $('#login-password').val().replace(/ /gi, '');
      $('#login-id').val(loginID);
      $('#login-password').val(loginPW);
      doLogin(loginID, loginPW);
    });
  });
  </script>

</body>

</html>
