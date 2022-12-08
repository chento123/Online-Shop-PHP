
<?php

    include('db/db.php');
    $db=new DB;
    $e=$_POST['e'];
    $s=$_POST['s'];
    $tbl="
    tbl_invoice_detail INNER JOIN tbl_product
    ON tbl_invoice_detail.invoice_id=tbl_product.id
    INNER JOIN tbl_invoice
    ON tbl_invoice.id=tbl_invoice_detail.invoice_id
    RIGHT JOIN tbl_user
    ON tbl_user.id=tbl_invoice.user_id
    RIGHT JOIN tbl_customer
    ON tbl_customer.id=tbl_invoice.id
        ";
    $cond="tbl_invoice_detail.invoice_id>0";
    $fld="
    tbl_invoice_detail.*,
    tbl_invoice.user_id,
    tbl_invoice.cus_id,
    tbl_user.fullname AS userName,
    tbl_customer.name AS cusName,
    tbl_product.name AS productName
    ";
    $od="tbl_invoice_detail.invoice_id DESC";
    $postdata=$db->GetData($tbl,$cond,$fld,$od,$s,$e);
    $data=array();
    if($postdata !=0){
        foreach($postdata as $row){
            $data[]=array(
            'invoice_id'=>$row[0],
            'product_id'=>$row[1],
            'qty'=>$row[2],
            'sellingprice'=>$row[3],
            'amount'=>$row[4],
            'user_id'=>$row[5],
            'cus_id'=>$row[6],
            'userName'=>$row[7],
            'cusName'=>$row[8],
            'productName'=>$row[9],
        );
        }
    }
/* 
    id	
    user_id	
    date	
    cus_id	
    total	
    adress	
    status	
    id	
    user_name	
    id	
    customer_name	
*/
    echo json_encode($data);
?>