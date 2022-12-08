<div class="container slide-bar">
    <div class="row">
        <div class="col-xl-8 slide-box">
            <div class="box1">
                <?php
                $tbl = "tbl_slide";
                $cond = "status=1";
                $fld = "id,photo";
                $od = "od DESC";
                $postdata = $db->GetData($tbl, $cond, $fld, $od, 0, 1);
                if ($postdata != 0) {
                    foreach ($postdata as $row) {
                ?>
                        <img src="Admin/img/product/<?php echo $row[1]; ?>" alt="">
                        <a class="shop-btn">shop now</a>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-xl-4 slide-box">
            <?php
            $tbl = "tbl_slide";
            $cond = "status=1";
            $fld = "id,photo";
            $od = "od DESC";
            $postdata = $db->GetData($tbl, $cond, $fld, $od, 1,2);
            if ($postdata != 0) {
                foreach ($postdata as $row) {
            ?>
                    <div class="box2">
                        <img src="Admin/img/product/<?php echo $row[1]; ?>" alt="">
                        <a class="shop-btn">shop now</a>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>