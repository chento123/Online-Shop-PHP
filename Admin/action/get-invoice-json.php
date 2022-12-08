
<?php

    include('db/db.php');
    $db=new DB;
    $e=$_POST['e'];
    $s=$_POST['s'];
    $tbl="
    tbl_invoice INNER JOIN tbl_user 
    ON tbl_invoice.user_id=tbl_user.id
    INNER JOIN tbl_customer
    ON tbl_invoice.cus_id=tbl_customer.id
        ";
    $cond="tbl_invoice.id>0";
    $fld="
    tbl_invoice.*,
    tbl_user.id,
    tbl_user.fullname as user_name,
    tbl_customer.id,
    tbl_customer.name as customer_name";
    $od="tbl_invoice.id DESC";
    $postdata=$db->GetData($tbl,$cond,$fld,$od,$s,$e);
    $data=array();
    if($postdata !=0){
        foreach($postdata as $row){
            $data[]=array(
            'id'=>$row[0],
            'user_id'=>$row[1],
            'date'=>$row[2],
            'cus_id'=>$row[3],
            'total'=>$row[4],
            'address'=>$row[5],
            'status'=>$row[6],
            'user_name'=>$row[8],
            'customer_name'=>$row[10],
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