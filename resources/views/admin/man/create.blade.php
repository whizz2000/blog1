<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>
@if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif

<form class="form-horizontal" action="{{url('/man/store')}}" role="form" method="post"  enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">员工姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="man_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">员工年龄</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="man_" id="lastname" placeholder="请输入姓">
    </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">员工LOGO</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="man_logo" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
</body>
</html>