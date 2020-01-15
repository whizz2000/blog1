<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title>{$goods->goods_name}</title>
    <script src="/static/admin/js/jquery-3.2.1.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <h3>{{$goods->goods_name}}</h3>
    <span>当前访问量为{{$current}}</span>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <hr/>
    <p>价格:{{$goods->goods_price}}</p>
    <p>{{$goods->content}}</p>
    <button>购买</button>
</body>
    <script>
    $('button').click(function(){
        var goods_id = {{$goods->goods_id}};
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.post('/goods/addcart',{goods_id:goods_id},function(res){
            if(res.code=='00001'){
                alert(res.msg);
                location.href='/login';
            }
            if(res.code=='00002'){
                alert(res.msg);
            }
            if(res.code=='00000'){
                alert(res.msg);
                location.href='/cart';
            }
        },'json');
    });
    </script>
</html>