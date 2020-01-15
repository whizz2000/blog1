<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
</html>
<h3>分类列表</h3>
<a href="{{url('/category/create')}}">添加</a>
<form>
<table class="table">
  <thead>
    <tr>
      <th>分类名称</th>
      <th>是否显示</th>
      <th>是否导航显示</th>
      <th>操作</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
  <tr>
      <td class="active">{{$v->cate_id}}</td>
      <td class="success">@php echo str_repeat('|--',$v->level);@endphp {{$v->cate_name}}</td>
      <td class="warning">{{$v->is_show}}</td>
      <td class="danger">{{$v->is_nav_show}}</td>
      <td><a href="{{url('/category/edit/'.$v->cate_id)}}" class="btn btn-primary">修改</a>|
          <a href="{{url('/category/del/'.$v->cate_id)}}"  class="btn btn-primary">删除</a></span>
      </td>
  </tr>
    @endforeach
  </tbody>
</table>