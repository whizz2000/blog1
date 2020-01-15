<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery-3.2.1.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js"></script>
</head>
<body>
<h3>商品添加</h3>
<!-- @if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif -->
<form class="form-horizontal" action="{{url('/goods/store')}}" role="form" method="post"  enctype="multipart/form-data">
  @csrf
  <ul id="myTab" class="nav nav-tabs">
	<li class="active">
		<a href="#home" data-toggle="tab">
            基础信息
		</a>
	</li>
	<li><a href="#ios" data-toggle="tab">商品相册</a></li>
  <li><a href="#desc" data-toggle="tab">商品详情</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade in active" id="home">

  <div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="home">
		<p>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品缩略图</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="goods_img" id="firstname" placeholder="请输入名字">
    </div>
  </div></p>
	</div>
	<div class="tab-pane fade" id="ios">
		<p>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品相册</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" multiple="multiple" name="goods_imgs" id="firstname" placeholder="请输入名字">
    </div>
    </div>
    </p>
	</div>
	<div class="tab-pane fade" id="desc">
		<p>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品详情</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="content" id="firstname" placeholder="请输入名字"></textarea>
    </div>
  </div>
    </p>
	</div>
	</div>


  <p>
          <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_name"  id="firstname" placeholder="请输入名字">
      <b style="color:red">{{$errors->first('goods_name')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品货号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_sn"  id="lastname" placeholder="请输入货号">
      <b style="color:red">{{$errors->first('goods_sn')}}</b>
    </div>
    </div>
        <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品品牌</label>
    <div class="col-sm-10">
      <select class="form-control" name="brand_id" >
      <option value="0">请选择商品品牌</option>
      @foreach($brand as $v)
      <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
      @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品分类</label>
    <div class="col-sm-10">
      <select class="form-control" name="cate_id" id="firstname">
      <option value="0">请选择商品分类</option>
      @foreach($category as $v)
      <option value="{{$v->cate_id}}">{{str_repeat('|--',$v->level)}}{{$v->cate_name}}</option>
      @endforeach
      </select>
    </div>
  </div>
  </div>
    <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品价格</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_price" value="{{session('data')['brand_url']}}" id="lastname" placeholder="请输入价格">
      <b style="color:red">{{$errors->first('brand_url')}}</b>
    </div>
    </div>
    <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品库存</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_number" value="{{session('data')['brand_url']}}" id="lastname" placeholder="请输入数量">
      <b style="color:red">{{$errors->first('brand_url')}}</b>
    </div>
    </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品略缩图</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="goods_img" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  </p>
  </div>

<div class="tab-pane fade" id="ios">
      <p><div class="form-group">
    <label for="firstname" class="col-sm-2" control-label>商品相册</label>
    <div class="col-sm-10">
    <input type="file" class="form-control" name="goods_imgs[]" id="firstname" placeholder="请输入名字">
  </div>
  </div>  </p>
  </div>

  <div class="tab-pane fade" id="desc">
      <p><div class="form-group">
    <label for="firstname" class="col-sm-2" control-label>商品详情</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="content" id="firstname" placeholder="请输入名字">
  </div>
  </div>  </p>
  </div>







  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <button class="btn btn-default">提交</button>
    </div>
  </div>
  </form>
</body>
<script>
  $('input[name="brand_name"]').blur(function(){
     $(this).next().text('');
     var brand_name = $(this).val();
     checkUrl(brand_name);
     }
   });
   $('input[name="brand_url"]').blur(function(){
     $(this).next().text('');
     var brand_url = $(this).val();
     checkUrl(brand_url);
   });

   function checkUrl(brand_url){
     var reg =/^http:\/\/*/;
     if(!reg.test(brand_url)){
       $('input[name="brand_url"]').next().text('品牌网址以http开头');
       return fasle;
     }
       return true;
   }
   function checkname(brand_name){
    var reg = /^[\u4e00-\u9fa5\w.\-]{1,16}$/;
      if(!reg.test(brand_name)){
          $('input[name="brand_name"]').next().text('品牌名称需是中文,字母,数字,下划线,点和-组成,长度为1-16位！');
       return false;
   }

   //ajax 验证唯一性
   $.ajax({
     method:"get",
     url:"/brand/checkOnly",
     data: {brand_name:brand_name},
     async:false,
   }).done(function(res)){
     if(res!=0){
       $('input[name=>"brand_name"]').next().text('品牌名称已存在!');
       flag = false;
     }
   });
   return flag;
   }

    //提交验证
    $('[type="button"]').click(function(){
       //名称
       $('input[name="brand_name"]').next().text();
       var brand_name = $('input[name="brand_name"]').val();
       var nameflag = checkname(brand_name);

    //网址验证
    $('input[name=>$brand_url"]').next().text('');
    var brand_url = $('input[name="brand_url"]').val();
    var urlflag = checkUrl(brand_url);

    if(nameflag ==true && urlflag==true){
      $('form').submit();
     }
   });
   </script>

</html>