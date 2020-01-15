<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>
<h3>新闻修改</h3>
<form class="form-horizontal" action="{{url('/new/update/'.$data->new_id)}}" role="form" method="post">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">新闻标题</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$data->new_name}}" name="new_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">父级分类</label>
    <div class="col-sm-10">
      <select class="form-control" name="p_id" id="firstname">
      <option value="0">请选择父级分类</option>
      @foreach($data as $v)
      <option value="{{$v->new_id}}">@php echo str_repeat('|--',$v->level); @endphp {{$v->new_name}}</option>
      @endforeach
    </div>
  </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">新闻作者</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" value="{{$data->new_writer}}"name="new_writer" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">新闻时间</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control"  value="{{$data->new_time}}" name="new_time" id="firstname" placeholder="请输入名字"></textarea>
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