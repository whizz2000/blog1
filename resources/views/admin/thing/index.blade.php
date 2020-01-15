<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
</html>
<h3>分类列表</h3>
<a href="{{url('/thing/create')}}">添加</a>
<form>
<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>名称</th>
      <th>用户管理</th>
      <th>货物管理</th>
      <th>入库记录管理</th>
      <th>操作</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
  <tr>
      <td class="active">{{$v->thing_id}}</td>
      <td class="success">{{$v->thing_name}}</td>
      <td class="warning">{{$v->user}}</td>
      <td class="danger">{{$v->goods}}</td>
      <td class="danger">{{$v->recode}}</td>
      <td>
            <a href="{{url('/thing/del/'.$v->thing_id)}}"  class="btn btn-primary">删除</a></span>
      </td>
  </tr>
    @endforeach
  </tbody>
</table>