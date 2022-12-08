<?php 
    include('../../Admin/action/db/db.php');
    $db=new DB;
    $data = array();
    $data2 = array();

    $post_cate=$db->GetData('tbl_category','status=1','id,name','od DESC',0,1000);
    if($post_cate != 0){
        foreach($post_cate as $row1){
            $postdata = $db->GetData("tbl_product","status=1 && cate_id=$row1[0]", 'id,name,price,photo', 'id DESC', 0, 100);
                if ($postdata != 0) {
                    foreach ($postdata as $row) {
                        $MyImg = trim($row[3]);
                        $MyImg = explode(" ", $MyImg);
                        $data2[] = array(
                            'id' => $row[0],
                            'name' => $row[1],
                            'price' => $row[2],
                            'photo' => $MyImg[0],
                        );
                    }
                }
        $data[]=array(
                'id'=> $row1[0],
                'name'=>$row1[1],
                'product'=> $data2,
            );
        }
    }
    
    echo json_encode($data);
?>