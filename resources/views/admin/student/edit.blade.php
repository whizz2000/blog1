<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title>修改页面</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>
<form class="form-horizontal" action="{{url('/student/update/'.$data->s_id)}}" role="form" method="post">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">学生姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$data->s_name}}" name="s_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">学生性别</label>
    <div class="col-sm-10">
      <input type="radio" class="form-control" name="s_sex" value="男" value="{{$data->s_sex}}" id="lastname" placeholder="请输入姓">男
      <input type="radio" class="form-control" name="s_sex" value="女" value="{{$data->s_sex}}" id="lastname" placeholder="请输入姓">女
      
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">学生班级</label>
    <div class="col-sm-10">
    <input type="text" class="form-control"  value="{{$data->s_class}}" name="s_class" id="lastname" placeholder="请输入姓">
    </div>
  </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox">请记住我
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
</body>
</html>