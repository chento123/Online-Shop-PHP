<div class="container category-box">
    <div class="row">
        <div class="col-xl-3 left-menu">
            <ul>
                <?php
                $tbl = "tbl_sub_category";
                $fld = "id,name";
                $cond = "status=1 && cate_id=$cate_id";
                $od = "od DESC";
                $postdata = $db->GetData($tbl, $cond, $fld, $od, 0, 100);
                if ($postdata != 0) {
                    foreach ($postdata as $row) {
                ?>
                        <li data-id="<?php echo $row[0]; ?>"><a><?php echo $row[1]; ?></a></li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="col-xl-8 content">
            <div class="row">
                <div class="col-xl-12" id="cate-data">
                    <div class="fillter-box">
                        <select name="" id="">
                            <option value="0">------Sort by----</option>
                            <option value="2">Sort by New product</option>
                            <option value="1">Low Price</option>
                            <option value="2">Hight Price</option>
                            <option value="1">Low discount</option>
                            <option value="2">Hight discount</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>