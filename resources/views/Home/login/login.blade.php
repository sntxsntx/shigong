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
						<h5>登录页面</h5>
					</div>  
					<div class="widget-body clearfix" style="padding:25px;">
		      			<form action="{{ url('/Home/Login/checkInfo') }}" method='post' id="loginForm">
                  {{ csrf_field() }}
    							<div class="control-group">
    								<div class="controls">
    									<input class="btn-block" type="text" name="uname" id="inputUsername" placeholder="用户名">
    								</div>
    							</div>
    							<div class="control-group">
    								<div class="controls">
    									<input class="btn-block" type="password" name="upass" id="inputPassword" placeholder="密码">
    								</div>
    							</div>
    							 <div class="control-group">
    								<div class="controls clearfix">
    									<label style="width:auto" class="checkbox pull-left">
    										<input type="checkbox" name="remember" value="1"> 记住我
    									</label>
    								</div>
    							</div>					
    							<button type="submit" class="btn pull-right">登录</button>
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
    $('#loginForm').submit(function(){
        //校验数据
        var uname = $('#inputUsername').val();
        if(!uname){
            alert('用户名不能为空');return false;
        }
        var upass = $('#inputPassword').val();
        if(!upass){
            alert('密码不能为空');return false;
        }
        var isRember = $('input[type=checkbox]:checked').val();
        //提交后台
        $.ajax({
            url:"{{ url('/Home/Login/checkInfo') }}",
            type:'Post',
            async:false,
            data:{'_token':'{{csrf_token()}}','uname':uname,'upass':upass,'isRember':isRember},
            success:function(result){
                var result = JSON.parse(result);
                switch (result.code){
                    case 100:
                        alert('提交信息有误');
                        break;
                    case 200:
                        alert('登录成功');
                        window.location.href = "{{ url('/Home/Article/index') }}";
                        break;
                    case 300:
                        alert('用户名或密码错误');
                        break;
                }
            }
        });
        return false;
    });
  </script>
</html>
