<?php 
    $file=$_FILES['txt-file'];
    $img_file=$file['name'];
    $ext=pathinfo($img_file,PATHINFO_EXTENSION);
    $newname=time();
    $tmp=$file['tmp_name'];
    move_uploaded_file($tmp,'../img/product/'.$newname.'.'.$ext);
    $msg['img']=$newname.'.'.$ext;
    echo json_encode($msg);
?>
