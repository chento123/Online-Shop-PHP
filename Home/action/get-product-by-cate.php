<?php 
    include('../../Admin/action/db/db.php');
    $db=new DB;
    $data = array();
    $cond=$_POST['cond'];
    //GetData($tbl, $cond, $fld, $od, $s, $e)
    $postdata = $db->GetData('tbl_product', "status=1 && $cond", 'id,name,price,photo', 'id DESC',0, 100);
    if ($postdata != 0) {
        foreach ($postdata as $row) {
            $data[] = array(
                'id' => $row[0],
                'name' => $row[1],
                'price' => $row[2],
                'photo' => $row[3],
            );
        }
    }
    echo json_encode($data);
?>
