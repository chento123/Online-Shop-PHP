<div class="container">
    <div class="row">
        <?php
        $postdata1 = $db->GetData('tbl_category', 'status=1', 'id,name', 'od DESC', 0, 10000);
        if ($postdata1 != 0) {
            foreach ($postdata1 as $row1) {
        ?>
                <div class="col-xl-12 col-lg-12 home-ct-title">
                    <a href=""><?php echo $row1[1] ?></a>
                </div>
                <?php
                $postdata2 = $db->GetData('tbl_product', "status=1 && cate_id=$row1[0]", "id,name,photo,price", "od DESC", 0, 1000);
                if ($postdata2 != 0) {
                    foreach ($postdata2 as $row2) {
                        $MyImg = trim($row2[2]);
                        $MyImg = explode(" ", $MyImg);
                ?>
                        <div class="col-xl-3 item-box">
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
                                <h1><?php echo $row2[1]; ?></h1>
                                <p>USA <?php echo number_format($row2[3], 2); ?>$ </p>
                            </div>
                        </div>
        <?php
                    }
                }
            }
        }

        ?>
    </div>
</div>