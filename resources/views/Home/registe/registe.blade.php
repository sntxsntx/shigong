<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Realm - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Bluth Company">
    <link rel="shortcut icon" href="{{ URL::asset('home/assets/ico/favicon.html') }}">
    <link href="{{ URL::asset('home/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('home/assets/css/theme.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('home/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('home/assets/css/alertify.css') }}" rel="stylesheet">
    <link rel="Favicon Icon" href="favicon.ico">
    <link href="http://fonts.useso.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('home/js/jquery-1.8.3.min.js') }}"></script>
  </head>
  <body>
    <div id="wrap">
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          	<div class="row-fluid">
				<div class="widget container-narrow">
					<div class="widget-header">
						<i class="icon-user"></i>
						<h5>注册页面</h5>
					</div>  
					<div class="widget-body clearfix" style="padding:25px;">
		      			<form action="{{ url('/Home/Registe/checkInfo') }}" id="registeForm" method="post">
                                {{ csrf_field() }}
    							<div class="control-group">
    								<div class="controls">
    									<input class="btn-block" name="userName" type="text" id="inputUsername" placeholder="用户名">
    								</div>
    							</div>
    							<div class="control-group">
    								<div class="controls">
    									<input class="btn-block" name="passWord" type="password" id="inputPassword" placeholder="密码">
    								</div>
    							</div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input class="btn-block" name="rePassWord" type="password" id="inputRePassword" placeholder="重复密码">
                                    </div>
                                </div>				
    							<button type="submit" class="btn pull-right">注册</button>
		      			</form>
					</div>  
				</div>
        	</div><!--/row-fluid-->
        </div><!--/span10-->
      </div><!--/row-fluid-->
    </div><!--/.fluid-container-->
    </div><!-- wrap ends-->
  </body>
  <script type="text/javascript">
    jQuery(document).ready(function () {
          if (window.history && window.history.pushState) {
              $(window).on('popstate', function () {
    　　　　　　　// 当点击浏览器的 后退和前进按钮 时才会被触发， 
                  window.history.pushState('forward', null, ''); 
                  window.history.forward(1);
              });
          }
          window.history.pushState('forward', null, '');  //在IE中必须得有这两行
          window.history.forward(1);
    });
　</script>
  <script>
    $('#registeForm').submit(function(){
        //校验数据
        var userName = $('#inputUsername').val();
        if(!userName){
            alert('用户名不能为空');return false;
        }
        var passWord = $('#inputPassword').val();
        if(!passWord){
            alert('密码不能为空');return false;
        }
        var rePassWord = $('#inputRePassword').val();
        if(passWord !== rePassWord){
            alert('密码不一致');return false;
        }
        //提交后台
        $.ajax({
            url:"{{ url('/Home/Registe/checkInfo') }}",
            type:'Post',
            async:false,
            data:{'_token':'{{csrf_token()}}','userName':userName,'passWord':passWord,'rePassWord':rePassWord},
            success:function(result){
                var result = JSON.parse(result);
                switch (result.code){
                    case 100:
                        alert('提交信息有误');
                        break;
                    case 200:
                        alert('注册成功');
                        window.location.href = "{{ url('/Home/Login/index') }}";
                        break;
                    case 300:
                        alert('用户名已被注册');
                        break;
                    case 400:
                        alert('注册失败');
                        break;
                }
            }
        });
        return false;
    });
  </script>
</html>
