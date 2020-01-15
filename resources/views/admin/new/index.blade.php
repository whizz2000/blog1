<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
</html>
<h3>品牌列表</h3>
<a href="{{url('/new/create')}}">添加</a>
<form>
<table class="table">
  <thead>
    <tr>
      <th>新闻标题</th>
      <th>新闻分类</th>
      <th>新闻作者</th>
      <th>新闻时间</th>
      <th>操作</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
  <tr>
      <td class="active">{{$v->new_id}}</td>
      <td class="success">{{$v->new_name}}</td>
      <td class="active">{{$v->p_id}}</td>
      <td class="warning">{{$v->new_writer}}</td>
      <td class="danger">{{$v->new_time}}</td>
      <td><a href="{{url('/new/edit/'.$v->new_id)}}" class="btn btn-primary">修改</a>|
          <a href="{{url('/new/del/'.$v->new_id)}}"  class="btn btn-primary">删除</a></span>
      </td>
  </tr>
    @endforeach
  </tbody>
  
</table>