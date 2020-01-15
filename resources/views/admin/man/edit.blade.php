<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>
<h3>员工修改</h3>
<form class="form-horizontal" action="{{url('/man/update/'.$data->man_id)}}" role="form" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">员工名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$data->man_name}}" name="man_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">员工年龄</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$data->man_age}}"name="man_age" id="lastname" placeholder="请输入姓">
    </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌LOGO</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" value="{{$data->man_logo}}"name="man_logo" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
</body>
</html>