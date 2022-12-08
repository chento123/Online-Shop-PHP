<?php 
    include('../action/db/db.php');
    $db=new DB;
    $tbl='tbl_product';
    $id=$_POST['id'];
    $cond="id=$id";
    $postdata=$db->GetCuurentData($tbl,$cond,'*');
    echo json_encode($postdata);
?>