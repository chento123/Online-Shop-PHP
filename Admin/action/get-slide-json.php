
<?php
    include('db/db.php');
    $db=new DB;    
    $e=$_POST['e'];
    $s=$_POST['s'];
    $data=array();
    $postdata=$db->GetData('tbl_slide','id > 0','*','id DESC',$s,$e);
    if($postdata != 0){
        foreach($postdata as $row){
            $data[]=array(
            'id'=>$row[0],
            'name'=>$row[1],
            'img'=>$row[2],
            'od'=>$row[3],
            'status'=>$row[5],
        );
        }
    }
    echo json_encode($data);
?>
