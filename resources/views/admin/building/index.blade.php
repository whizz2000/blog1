
<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery-3.2.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<h3>售楼信息列表</h3>
    <a href="{{url('/building/create')}}">添加</a>
    <form>

        <table class="table">
            <caption>上下文表格布局</caption>
            <thead>
            <tr>
                <th>ID</th>
                <th>小区名</th>
                <th>地理位置</th>
                <th>导购员</th>
                <th>联系电话</th>
                <th>LOGO</th>
                <th>操作</th></tr>
            </thead>
            <tbody>
            @foreach ($data as $v)
                <tr>
                    <td class="active">{{$v->building_id}}</td>
                    <td class="success">{{$v->building_name}}</td>
                    <td class="active">{{$v->building_where}}></td>
                    <td class="warning">{{$v->building_man}}</td>
                    <td class="danger">{{$v->building_number}}</td>
                    <td class="active"><img src="{{env('UPLOAD_URL')}}{{$v->building_logo}}" width="100" height="80"}}></td>
                    <td><a href="{{url('/building/edit/'.$v->building_id)}}" class="btn btn-primary">修改</a>|
                        <a onclick="ajaxdel({{$v->building_id}})" href="javascript:void(0)" class="btn btn-primary">删除</a></span>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4">{{$data->appends($query)->links()}}</td>
            </tr>
            </tbody>
        </table>
    </form>
        <!-- ajax删除 -->
        <script>
            function ajaxdel(id) {

                if (!id) {
                    return;
                }
                $.get('/building/del/' + id, function (res) {
                    if (res.code == '00000') {
                        alert(res.msg);
                        location.reload();
                    }
                }, 'json');
            }
        </script>
        </body>
</html>