<?php
    include('db/db.php');
    $db = new DB;
    $e = $_POST['e'];
    $s = $_POST['s'];
    $data = array();
    $cond = "tbl_product.id >= 0";
    $tbl = "tbl_product INNER JOIN tbl_slide ON tbl_slide.id=tbl_product.slide_id INNER JOIN tbl_category ON tbl_category.id=tbl_product.cate_id INNER JOIN tbl_sub_category ON tbl_product.sub_id=tbl_sub_category.id";
    $fld= "
        tbl_product.id,
        tbl_slide.name,
        tbl_category.name,
        tbl_sub_category.name,
        tbl_product.name,
        tbl_product.price,
        tbl_product.dis,
        tbl_product.price_dis,
        tbl_product.od,
        tbl_product.photo,
        tbl_product.status";
    $od = "tbl_product.id DESC";
    $postdata = $db->GetData($tbl, $cond, $fld, $od,$s, $e);
    if ($postdata != 0) {
        foreach ($postdata as $row) {
            $data[] = array(
                'id' => $row[0],
                'slide' => $row[1],
                'cate' => $row[2],
                'sub-cate' => $row[3],
                'name' => $row[4],
                'price' => $row[5],
                'dis' => $row[6],
                'price-dis' => $row[7],
                'od' => $row[8],
                'photo' => $row[9],
                'status' => $row[10],
            );
        }
    }
    echo json_encode($data);
?>