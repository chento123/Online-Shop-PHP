
<?php
    include('db/db.php');
    $db=new DB;    
    $cate=$_POST['id'];
    $data=array();
    $postdata=$db->GetData("tbl_sub_category","status=1 && cate_id=$cate","id,name","id DESC",0,100000);
    if($postdata != 0){
        foreach($postdata as $row){
            $data[]=array(
                'id'=>$row[0],
                'name'=>$row[1],
            );
        }
    }
    echo json_encode($data);
?>
