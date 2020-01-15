<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery-3.2.1.min.js"></script>
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
<form class="form-horizontal" action="{{url('/new/store')}}" role="form" method="post"  enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">新闻标题</label>
    <div class="col-sm-10">
      <input type="text" name="new_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">父级分类</label>
    <div class="col-sm-10">
      <select name="p_id" id="firstname">
      <option value="0">请选择父级分类</option>
      @foreach($data as $k=>$v)
      <option value="{{$v->new_id}}">{{str_repeat('|--',$v->level)}}{{$v->new_name}}</option>
      @endforeach
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">新闻作者</label>
    <div class="col-sm-10">
      <input type="text" name="new_writer" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">发布时间</label>
    <div class="col-sm-10">
      <textarea type="date"  name="new_time" id="firstname" placeholder="请输入名字"></textarea>
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