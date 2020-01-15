

<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>
<form class="form-horizontal" action="{{url('/thing/store')}}" role="form" method="post"  enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="thing_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">用户管理</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="user" id="lastname" placeholder="请输入姓">
    </div>
    </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">货物管理</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">入库记录管理</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="recode" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
</body>
</html>