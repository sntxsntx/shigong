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
              <i class="icon-group"></i>
              <h5>文章列表</h5>
            </div>  
            <div class="widget-body">
              <div id="users_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row-fluid"><div class="span6"><div id="users_length" class="dataTables_length"></div></div><div class="span6"><div class="dataTables_filter" id="users_filter"></div></div></div><table id="users" class="table table-striped table-bordered dataTable" aria-describedby="users_info">
                <thead>
                  <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 293px;" aria-sort="ascending" aria-label="User: activate to sort column descending">id</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 242px;" aria-label="Group: activate to sort column ascending">文章标题</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 387px;" aria-label="Registered: activate to sort column ascending">文章内容</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 336px;" aria-label=": activate to sort column ascending">操作</th></tr>
                </thead>
                
              <tbody role="alert" aria-live="polite" aria-relevant="all">
                  @foreach ($articles as $article)

                      <tr class="odd">
                        <td class=" ">{{ $article->id }}</td>
                        <td class=" ">{{ $article->title }}</td>
                        <td class=" ">{{ $article->content }}</td>
                        <td class=" ">
                          <button onclick="delArticle({{ $article->id }})">删除</button>
                          <button onclick="getArticle({{ $article->id }})">修改</button>
                        </td>
                      </tr>


                  @endforeach


                  
                  </tbody></table>
                  <div class="row-fluid">
                    <div class="span5"></div>
                    <div class="span6">
                      <div class="dataTables_paginate paging_bootstrap pagination">
                        <ul>
                          {{ $articles->links() }}
                        </ul>
                      </div>
                    </div>
                    
                  </div></div>
            </div> <!-- /widget-body -->
          
      <!-- 展示文章内容 -->
        <div id='show_content' style='width:100%;height:100%;display:none;'>
            <h3 class="widget-header">修改文章</h3>
            <table style='position:relative;width:600px;height:60px;top:10px;left:200px;' border='1px solid'>
              <form>
                  <input type="hidden" id="article_id">
                  <tr>
                      <td>文章标题</td>
                      <td><input type="text" id="title"></td>
                  </tr>
                  <tr>
                      <td>文章内容</td>
                      <td><textarea id="content" cols="30" rows="10"></textarea></td>
                  </tr>
                  <tr>
                    <td><input value="确定" onclick="submitEdit()" class="btn btn-sm"></td>
                    <td><input value="取消" onclick="cancelEdit()" class="btn btn-sm"></td>
                  </tr>
              </form>
            </table>
        </div>
      <!-- 展示文章内容 -->            
      </div>
      <!-- /Main window -->
      
    </div><!--/.fluid-container-->
    </div><!-- wrap ends-->

  
    
  </body>
  <script>
    //删除文章
    function delArticle(id){
      var res = confirm("确定删除吗");
      if(res == false) return;
      $.ajax({
            url:"{{ url('/Home/Article/delete') }}",
            type:'Get',
            async:false,
            data:{'id':id},
            success:function(result){
                var result = JSON.parse(result);
                switch (result.code){
                    case 200:
                        alert('文章删除成功');
                        window.location.href = "{{ url('/Home/Article/list') }}";
                        break;

                    case 400:
                        alert('文章删除失败');
                        break;
                }
            }
        });
    }

    //获取文章内容
    function getArticle(id){
      
      $.ajax({
            url:"{{ url('/Home/Article/getSpecific') }}",
            type:'Get',
            async:false,
            data:{'id':id},
            success:function(result){
                var result = JSON.parse(result);
                $('#article_id').val(result[0].id);
                $('#title').val(result[0].title);
                $('#content').val(result[0].content);
                $('#show_content').fadeIn('slow');
            }
        });
    }

    //提交文章修改的内容
    function submitEdit(){
      //校验数据
        var title = $('#title').val();
        if(!title){
            alert('文章标题不能为空');return;
        }
        var content = $('#content').val();
        if(!content){
            alert('文章内容不能为空');return;
        }
        var id = $('#article_id').val();
        $.ajax({
            url:"{{ url('/Home/Article/edit') }}",
            type:'Post',
            async:false,
            data:{'_token':'{{csrf_token()}}','id':id,'title':title,'content':content},
            success:function(result){
                var result = JSON.parse(result);
                switch (result.code){
                    case 100:
                        alert('提交信息有误');
                        break;
                    case 200:
                        alert('文章修改成功');
                        window.location.href = "{{ url('/Home/Article/list') }}";
                        break;
                    case 400:
                        alert('文章修改失败');
                        break;
                }
            }
        });
    }

    //取消修改文章内容
    function cancelEdit(){
      $('#show_content').fadeOut('slow');
    }
  </script>
</html>
