<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
</html>
<h3>品牌列表</h3>
<h3>欢迎【{{session('user')['username']}}】登陆,<a href="{{url('/logout')}}">退出</h3>
<a href="{{url('/article/create')}}">添加</a>
<form>
<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入关键字">
<button>搜索</button>
<table class="table">
  <thead>
    <tr>
      <th>id</th>
      <th>文章名称</th>
      <th>文章分类</th>
      <th>显示重要性</th>
      <th>是否显示</th>
      <th>文章作者</th>
      <th>文章网址</th>
      <th>文章描述</th>
      <th>文章关键字</th>
      <th>文章LOO</th>
      <th>操作</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
  <tr>
      <td class="active">{{$v->article_id}}</td>
      <td class="success">{{$v->article_name}}</td>
      <td class="success">{{$v->article_cate}}</td>
      <td class="active">{{$v->is_important}}</td>
      <td class="warning">{{$v->is_show}}</td>
      <td class="danger">{{$v->article_writer}}</td>
      <td class="active">{{$v->article_email}}</td>
      <td class="success">{{$v->article_desc}}</td>
      <td class="warning">{{$v->article_keys}}</td>
      <td class="active"><img src="{{env('UPLOAD_URL')}}{{$v->article_logo}}" width="100" height="80"}}></td>
      <td><a href="{{url('/article/edit/'.$v->article_id)}}" class="btn btn-primary">修改</a>|
          <a href="{{url('/article/del/'.$v->article_id)}}"  class="btn btn-primary">删除</a></span>
      </td>
  </tr>
  @endforeach
    <tr>
    <td colspan="4">{{$data->appends($query)->links()}}</td>
    </tr>
  </tbody>
</table>