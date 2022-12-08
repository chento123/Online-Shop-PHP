
<?php
    include('db/db.php');
    $db = new DB;
    $e = $_POST['e'];
    $s = $_POST['s'];
    $data = array();
    $tbl="tbl_user";
    $cond="id > 0";
    $fld="id,fullname,photo,phone,position,address,data_createed,date_login,od,status";
    $od="id DESC";
    $postdata = $db->GetData($tbl,$cond,$fld,$od,$s, $e);
        /*
        0    id ,
        1    fullname,
        2    photo,
        3    phone,
        4    position,
        5    address,
        6    data_createed,
        7    date_login,
        8    od,
        9    status	
        */
    if ($postdata != 0) {
    foreach ($postdata as $row) {
    $data[] =
        array(
            'id'            => $row[0],
            'name'          => $row[1],
            'photo'         => $row[2],
            'phone'         => $row[3],
            'position'      => $row[4],
            'address'       => $row[5],
            'data_createed' => $row[6],
            'date_login'    => $row[7],
            'od'            => $row[8],
            'status'        => $row[9],
        );
    }
    }
    echo json_encode($data);
    ?>
