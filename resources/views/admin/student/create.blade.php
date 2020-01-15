<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>
<form class="form-horizontal" action="{{url('/student/store')}}" role="form" method="post">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">学生姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="s_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">学生性别</label>
    <div class="col-sm-10">
      <input type="radio" class="form-control" name="s_sex" value="男" id="lastname" placeholder="请输入姓">男
      <input type="radio" class="form-control" name="s_sex" value="女" id="lastname" placeholder="请输入姓">女
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">学生班级</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="s_class" id="lastname" placeholder="请输入姓">
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
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
</body>
</html>