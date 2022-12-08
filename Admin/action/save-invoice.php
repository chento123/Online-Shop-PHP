<?php
    include('db/db.php');
    $db=new DB;
    $editID=$_POST['txt-edit'];
    $user_id = $_POST['txt-user'];
    $cus_id = $_POST['txt-cus'];
    $status = $_POST['txt-status'];
    $total = $_POST['txt-total'];
    $address = $_POST['txt-address'];
    $msg['edit']=false;
    $tbl="tbl_invoice";
    $val="";
    $date=date("Y-m-d")." ".date("h:i:s");
    if($editID==0){
        $val="NULL,'$user_id','$date','$cus_id','$total','$address','$status'";
        $db->SaveData($tbl,$val);
        $msg['id'] = $db->lastID;
        $msg['edit']=false;
    }else{
        $fld="
        user_id ='$user_id',
        cus_id='$cus_id',
        total='$total',
        address='$address',
        status='$status'";
        $cond="id=$editID";
        $db->UpdateData($tbl,$fld,$cond);
        $msg['edit']=true;
    }
    echo json_encode($msg);
