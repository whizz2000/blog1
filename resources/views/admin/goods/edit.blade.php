<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>
<h3>品牌修改</h3>
<form class="form-horizontal" action="{{url('/goods/update/'.$data->goods_id)}}" role="form" method="post">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$data->goods_name}}" name="goods_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
    <label for="firstname" class="col-sm-2 control-label">商品价格</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$data->goods_price}}" name="goods_price" id="firstname" placeholder="请输入价格">
    </div>
  </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品LOGO</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" value="{{$data->goods_logo}}"name="goods_logo" id="firstname">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
</body>
</html>