<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>
<form class="form-horizontal" action="{{url('/category/store')}}" role="form" method="post">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">分类名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="cate_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">父级分类</label>
    <div class="col-sm-10">
      <select class="form-control" name="p_id" id="firstname">
      <option value="0">请选择父级分类</option>
      @foreach($data as $k=>$v)
      <option value="{{$v->cate_id}}">{{str_repeat('|--',$v->level)}}{{$v->cate_name}}</option>
      @endforeach
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio"  value="1" name="is_show" id="lastname" checked="checked">是
      <input type="radio"  value="2" name="is_show" id="lastname" >否
    </div>
    </div>
    <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否导航栏显示</label>
    <div class="col-sm-10">
      <input type="radio"  value="1" name="is_nav_show" id="lastname" >是
      <input type="radio"  value="2" name="is_nav_show" id="lastname" checked="checked">否
    </div>
    </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
</body>
</html>