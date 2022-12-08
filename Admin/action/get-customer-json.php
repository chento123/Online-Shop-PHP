
<?php
    include('db/db.php');
    $db = new DB;
    $e = $_POST['e'];
    $s = $_POST['s'];
    $data = array();
    $tbl="tbl_customer";
    $cond="id > 0";
    $fld="*";
    $od="id DESC";
    $postdata = $db->GetData($tbl,$cond,$fld,$od,$s, $e);
    if ($postdata != 0) {
    foreach ($postdata as $row) {
    $data[] =
        array(
            'id' => $row[0],
            'name' => $row[1],
            'phone' => $row[2],
            'address' => $row[3],
            'photo' => $row[4],
            'od'=>$row[5],
            'status' => $row[6],
        );
    }
    }
    echo json_encode($data);
    ?>
