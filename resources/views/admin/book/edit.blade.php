<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>
<h3>图书修改</h3>
<form class="form-horizontal" action="{{url('/book/update/'.$data->book_id)}}" role="form" method="post">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">图书名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$data->book_name}}" name="book_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">图书网址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$data->book_price}}"name="book_price" id="lastname" placeholder="请输入姓">
    </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">图书LOGO</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" value="{{$data->book_logo}}"name="book_logo" id="firstname" placeholder="请输入名字">
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