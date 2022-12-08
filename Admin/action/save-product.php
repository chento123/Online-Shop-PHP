<?php
    include('db/db.php');
    $db=new DB;
    $editID=$_POST['txt-edit'];
    $slide=$_POST['txt-slide'];
    $sub_cate=$_POST['txt-sub-cate'];
    $name = $_POST['txt-name'];
    $cate_id=$_POST['txt-cate'];
    $price=$_POST['txt-price'];
    $dis=$_POST['txt-dis'];
    $price_dis=$_POST['txt-price-dis'];
    $des=$_POST['txt-des'];
    $od = $_POST['txt-od'];
    $status = $_POST['txt-status'];
    $click=0;
    $uid=1;
    $name_link = $name;
    $msg['dpl'] = false;
    $msg['edit']=false;
    $tbl="tbl_product";
    $photo = $_POST['txt-photo'];
    $MyImg=' ';
    $cus_id=0;
    foreach($photo as $img){
        $MyImg .= $img . ' ';
    }
    $val="";
    if ($db->dplData("name", $tbl, "name='$name' && id != '$editID'") == true) {
        $msg['dpl'] = true;
    }
    else {
        if($editID==0){
            //	id,name,price,dis,price_dis,photo,sub_id,cate_id,slide_id,od,name_link,cus_id,des,click,status	
            $val="NULL,'$name','$price','$dis','$price_dis','$MyImg','$sub_cate','$cate_id','$slide','$od','$name_link','$cus_id','$des','$click','$status'";
            $db->SaveData($tbl,$val);
            $msg['id'] = $db->lastID;
            $msg['edit']=false;
        }else{
            $fld=
            "
                cate_id='$cate',
                name ='$name',
                photo ='$photo',
                od=$od,
                name_link='$name_link',
                status='$status'
            ";
            $cond="id=$editID";
            $db->UpdateData($tbl,$fld,$cond);
            $msg['edit']=true;
        }
        $msg['dpl']=false;
    }
    echo json_encode($msg);
?>