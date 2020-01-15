<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery-3.2.1.min.js"></script>
</head>
<body>
<!-- @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
 @endforeach
        </ul>
        </div>
       @endif -->
<form class="form-horizontal" action="{{url('/building/store')}}" role="form" method="post"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">小区名称</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="building_name" value="{{session('data')['building_name']}}" id="firstname" placeholder="请输入名字">
            <b style="color:red">{{$errors->first('building_name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">地理位置</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="building_where" value="{{session('data')['building_where']}}" id="lastname" >
            <b style="color:red">{{$errors->first('building_where')}}</b>
        </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">导航员</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="building_man" id="firstname" placeholder="请输入名字">
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">联系电话</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="building_number" value="{{session('data')['building_number']}}" id="firstname" placeholder="请输入名字">
                <b style="color:red">{{$errors->first('building_number')}}</b>
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">LOGO</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="building_logo" id="firstname" placeholder="请输入名字">
            </div>
        </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button class="btn btn-default">提交</button>
        </div>
    </div>
</form>
</body>

</html>