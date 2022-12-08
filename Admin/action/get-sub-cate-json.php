
    <?php
    include('db/db.php');
    $db = new DB;
    $e = $_POST['e'];
    $s = $_POST['s'];
    $data = array();
    $tbl="tbl_sub_category INNER JOIN tbl_category
    ON tbl_sub_category.cate_id=tbl_category.id";
    $cond="tbl_sub_category.id > 0";
    $fld="tbl_sub_category.id,
    tbl_sub_category.cate_id,
    tbl_sub_category.name,
    tbl_sub_category.photo,
    tbl_sub_category.od,
    tbl_sub_category.status,
    tbl_category.name";
    $od="tbl_sub_category.id DESC";
    $postdata = $db->GetData($tbl,$cond,$fld,$od,$s, $e);
    if ($postdata != 0) {
    foreach ($postdata as $row) {
    $data[] =
        array(
            'id' => $row[0],
            'sub-cate' => $row[1],
            'name' => $row[2],
            'img' => $row[3],
            'od' => $row[4],
            'status' => $row[5],
            'cate-name'=>$row[6]
        );
    }
    }
    echo json_encode($data);
    ?>
