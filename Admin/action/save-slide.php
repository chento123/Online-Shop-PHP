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
    $tbl="tbl_slide";
    $val="";
    if ($db->dplData("name", "tbl_slide", "name='$name' && id != '$editID'") == true) {
        $msg['dpl'] = true;
    }
    else {
        if($editID==0){
            $val="NULL,'$name','$photo','$od','$name_link','$status'";
            $tbl="tbl_slide";
            $db->SaveData($tbl,$val);
            $msg['id'] = $db->lastID;
            $msg['edit']=false;
        }else{
            $tbl='tbl_slide';
            $fld="name ='$name',
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
?>