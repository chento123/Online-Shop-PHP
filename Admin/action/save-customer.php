<?php
    include('db/db.php');
    $db=new DB;
    $editID=$_POST['txt-edit'];
    $name = $_POST['txt-name'];
    $od = $_POST['txt-od'];
    $photo = $_POST['txt-photo'];
    $status = $_POST['txt-status'];
    $phone=$_POST["txt-phone"];
    $address=$_POST["txt-address"];
    $name_link = '5';
    $msg['dpl'] = false;
    $msg['edit']=false;
    $tbl="tbl_customer";
    $val="";
    
    if($db->dplData('*',$tbl,"name='$name' && id !=".$editID."")==true){
        $msg['dpl'] = true;
    }else {
        if($editID==0){
            $val="NULL,'$name','$phone','$address','$photo','$od','$status'";
            $db->SaveData($tbl,$val);
            $msg['id'] = $db->lastID;
            $msg['edit']=false;
        }else{
            $fld="
            name ='$name',
            phone='$phone',
            address='$address',
            photo ='$photo',
            od=$od,
            status='$status'";
            $cond="id=$editID";
            $db->UpdateData($tbl,$fld,$cond);
            $msg['edit']=true;
        }
        $msg['dpl']=false;
    }
    echo json_encode($msg);
