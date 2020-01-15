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
 @endforeachq'w
 </ul>
 </div>
@endif
<form class="form-horizontal" action="{{url('/article/store')}}" role="form" method="post"  enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="article_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">文章分类</label>
    <div class="col-sm-10">
      <select class="form-control" name="article_cate" id="lastname" >
      <option value="0">文艺类</option>
      <option value="1">科学类</option>
      <option value="2">什么类</option>
      </select>
    </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章重要性</label>
    <div class="col-sm-10">
      <input type="radio" class="form-control" value="重要" name="is_important" id="firstname">重要
      <input type="radio" class="form-control" value="不重要" name="is_important" id="firstname">不重要
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio" class="form-control" value="是" name="is_show" id="firstname" >是
      <input type="radio" class="form-control" value="否" name="is_show" id="firstname" >否
    </div>
  </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章作者</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="article_writer" id="firstname" placeholder="请输入名字"></textarea>
    </div>
  </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章网址</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="article_email" id="firstname" placeholder="请输入名字"></textarea>
    </div>
  </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章关键字</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="article_keys" id="firstname" placeholder="请输入名字"></textarea>
    </div>
  </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章描述</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="article_desc" id="firstname" placeholder="请输入名字"></textarea>
    </div>
  </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章图片</label>
    <div class="col-sm-10">
      <input  type="file" class="form-control" name="article_logo" id="firstname" ></textarea>
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