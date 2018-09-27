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
    <link href="http://fonts.useso.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('home/js/jquery-1.8.3.min.js') }}"></script>
    <link rel="Favicon Icon" href="favicon.ico">
  </head>
  <body>
    <div id="wrap">
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <div class="logo"> 
            <img src="{{ URL::asset('home/assets/img/logo.png') }}" alt="Realm Admin Template">
          </div>
           <a class="btn btn-navbar visible-phone" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
           <a class="btn btn-navbar slide_menu_left visible-tablet">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <div class="top-menu visible-desktop">
            <ul class="pull-left">
              
            </ul>
            <ul class="pull-right">  
              <li><a href="{{ url('/Home/Login/logOut') }}"><i class="icon-off"></i> 退出</a></li>
            </ul>
          </div>

          <div class="top-menu visible-phone visible-tablet">
            <ul class="pull-right">  
              <li><a title="link to View all Messages page, no popover in phone view or tablet" href="#"><i class="icon-envelope"></i></a></li>
              <li><a title="link to View all Notifications page, no popover in phone view or tablet" href="#"><i class="icon-globe"></i></a></li>
              <li><a href="login.html"><i class="icon-off"></i></a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container-fluid">
     
      <!-- Side menu -->
      <div class="sidebar-nav nav-collapse collapse">
        
        <div class="accordion" id="accordion2">
          
          
          
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle b_F6F1A2" href="{{ url('/Home/Article/list') }}"><i class="icon-tasks"></i> <span>文章列表</span></a>
            </div>
          </div>
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle b_C1F8A9" href="{{ url('/Home/Article/add') }}"><i class="icon-bar-chart"></i> <span>添加文章</span></a>
            </div>
          </div>    
        </div>
      </div>
      <!-- /Side menu -->

      <!-- Main window -->
      <div class="main_container" id="dashboard_page">
        
            <div class="widget-header">
              <i class="icon-list-alt"></i><h5>添加文章</h5>
              <div class="widget-buttons">
                  <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse" data-original-title=""><i class="icon-chevron-up"></i></a>
              </div>
            </div>
            <div class="widget-body">
              <div class="widget-forms clearfix">
                <form class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label">文章标题</label>
                    <div class="controls">
                      <input class="span7" placeholder="文章标题…" type="text" name="title" id="title">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">文章内容</label>
                      <div class="controls">
                        <textarea class="span7" rows="5" style="height:100px;" name="content" id="content"></textarea>
                      </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="widget-footer">
               <button class="btn btn-primary" type="submit" id="articleSubmit">提交</button>
            </div>
      </div>
      <!-- /Main window -->
      
    </div><!--/.fluid-container-->
    </div><!-- wrap ends-->


    
  </body>
  <script>
    $('#articleSubmit').click(function(){
      var title = $('#title').val();
      if(!title){
        alert('文章标题不能为空');return;
      }
      var content = $('#content').val();
      if(!content){
        alert('文章内容不能为空');return;
      }
      //提交后台
        $.ajax({
            url:"{{ url('/Home/Article/insert') }}",
            type:'Post',
            async:false,
            data:{'_token':'{{csrf_token()}}','title':title,'content':content},
            success:function(result){
                var result = JSON.parse(result);
                switch (result.code){
                    case 100:
                        alert('提交信息有误');
                        break;
                    case 200:
                        alert('文章添加成功');
                        break;
                    case 300:
                        alert('文章添加失败');
                        break;
                }
            }
        });
    });
  </script>
</html>
