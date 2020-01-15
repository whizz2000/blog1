<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
</head>
<body>
    <form action="{{url('/dologin')}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    姓名:<input type="text" name="name">
    密码:<input type="password" name="password">
        <button>提交</button>
    </form>
</body>
</html>