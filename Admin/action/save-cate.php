<?php
    include('db/db.php');
    $db=new DB;
    $editID=$_POST['txt-edit'];
    $name = $_POST['txt-name'];
    $od = $_POST['txt-od'];
    $photo = $_POST['txt-photo'];
    $status = $_POST['txt-status'];
    $name_link = '5';
    $msg['dpl'] = false;
    $msg['edit']=false;
    $tbl="tbl_category";
    $val="";
    // check duplicate
    // $sql = "SELECT *FROM tbl_category WHERE name='$name' && id !=".$editID."";
    // $rs = $cn->query($sql);
    // if ($rs->num_rows > 0) {
    //     $msg['dpl'] = true;
    // } 
    if($db->dplData('*',$tbl,"name='$name' && id !=".$editID."")==true){
        $msg['dpl'] = true;
    }else {
        if($editID==0){
            // $sql = "INSERT INTO tbl_category VALUES(NULL,'$name','$photo','$od','$name_link','$status')";
            // $cn->query($sql);
            // $msg['id'] = $cn->insert_id;
            $val="NULL,'$name','$photo','$od','$name_link','$status'";
            $db->SaveData($tbl,$val);
            $msg['id'] = $db->lastID;
            $msg['edit']=false;
        }else{
            // $sql="UPDATE tbl_category SET 
            // name ='$name',
            // photo ='$photo',
            // od=$od,
            // name_link='$name_link',
            // status='$status'
            // WHERE id=$editID";
            // $cn->query($sql);
            $tbl='tbl_category';
            $fld="
            name ='$name',
            photo ='$photo',
            od=$od,
            name_link='$name_link',
            status='$status'";
            $cond="id=$editID";
            $db->UpdateData($tbl,$fld,$cond);
            $msg['edit']=true;
        }
        $msg['dpl']=false;
    }
    echo json_encode($msg);
