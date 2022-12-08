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
                        <li><a href=""><?php echo $row[1]; ?></a></li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="col-xl-8 content">
            <div class="row">
                <div class="col-xl-12 ">
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
                <?php
                $tbl = "tbl_product";
                $cond = "status=1 && cate_id=$cate_id";
                $fld = "id,name,price,photo";
                $od = "od DESC";
                $postdata = $db->GetData($tbl, $cond, $fld, $od, 0, 1000);
                if ($postdata != 0) {
                    foreach ($postdata as $row) {
                        $MyImg = trim($row[3]);
                        $MyImg = explode(" ", $MyImg);
                ?>
                        <div class="col-xl-4 item-box">
                            <div class="img-box bg" style="background-image: url('Admin/img/product/<?php echo $MyImg[0]; ?>');">
                                <div class="status">in-stock</div>
                                <div class="view-box">
                                    <ul>
                                        <li><i class="fab fa-facebook"></i></li>
                                        <li><i class="fas fa-search"></i></li>
                                        <li><i class="fas fa-shopping-cart"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="txt-box">
                                <h1><?php echo $row[1]; ?></h1>
                                <p>US <?php echo $row[2]; ?>$</p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>