<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
</html>
<h3>品牌列表</h3>
<a href="{{url('/student/create')}}">添加</a>
<table class="table">
  <thead>
    <tr>
      <th>学生ID</th>
      <th>学生姓名</th>
      <th>学生性别</th>
      <th>学生班级</th>
      <th>操作</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
  <tr>
      <td class="active">{{$v->s_id}}</td>
      <td class="success">{{$v->s_name}}</td>
      <td class="warning">{{$v->s_sex}}</td>
      <td class="danger">{{$v->s_class}}</td>
      <td><a href="{{url('/student/edit/'.$v->s_id)}}" class="btn btn-primary">修改</a>|
          <a href="{{url('/student/del/'.$v->s_id)}}"  class="btn btn-primary">删除</a></span>
      </td>
  </tr>
    @endforeach
    <tr>
    <td colspan="4">{{$data->links()}}</td>
    </tr>
  </tbody>
</table>