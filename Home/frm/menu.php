    <!-- menu bar -->
    <div class="container-fluid menu-bar">
        <div class="row">
            <div class="col-lg-12 menu">
                <ul>
                    <li><a href="index.php"><i class="fa-solid fa-house-user"></i></a></li>
                    <?php
                    // GetData($tbl, $cond, $fld, $od, $s, $e)
                    $tbl = "tbl_category";
                    $cond = "status=1";
                    $fld = "id,name";
                    $od = "od DESC";
                    $postdata = $db->GetData($tbl, $cond, $fld, $od, 0, 4);
                    if ($postdata != 0) {
                        foreach ($postdata as $row) {
                    ?>
                            <li><a href="index.php?cate_id=<?php echo $row[0]; ?>"><?php echo $row[1]; ?></a></li>
                    <?php
                        }
                    }
                    ?>
                    <li><a href=""><i class="fa-solid fa-cart-shopping"></i></a></li>
                </ul>
            </div>
        </div>
    </div>