<?php
function createTree($data,$p_id=0,$level=1){
    static $new_array = [];
    if(!$data){
        return;
    }
    
    foreach( $data as $k=>$v){
        if($v->p_id == $p_id){

            $v->level= $level;
            $new_array[] = $v;
            createTree($data,$v->cate_id,$level+1);
        }
    }
    return $new_array;
}

    function upload($filename){
        if(request()->file($filename)->isValid()){
        //接收文件
        $photo = request()->file($filename);
        //上传文件
        $store_result = $photo->store('uploads');
        return $store_result;
        }
        exit('没有文件或者文件上传出错');
    }

    function moreuploads($filename){
        if(!$filename){
            return ;
        }
        $imgs = request()->file($filename);
        
        $result = [];
        foreach ($imgs as $v){
            $result[] = $v->store('uploads');
        }
        return $result;
    }
