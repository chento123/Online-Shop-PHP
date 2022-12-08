<?php
include('_config_inc.php');
include(BASE_PATH . 'Admin/action/db/db.php');
$db = new DB;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Home/style/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Home/style/bootstrap.min.css">
    <script src="<?php echo BASE_URL; ?>Home/JS/jquery-3.2.1.min.js"></script>
</head>

<body>

    <?php
    include(BASE_PATH . 'Home/frm/logo-bar.php');
    //menu bar
    include(BASE_PATH . 'Home/frm/menu.php');
    if (isset($_GET['cate_id'])) {
        $cate_id = $_GET['cate_id'];
        include(BASE_PATH . 'Home/frm/category-content-2.php');
        $page = $cate_id;
    } else {
        include(BASE_PATH . 'Home/frm/slide.php');
        include(BASE_PATH . 'Home/frm/home-content.php');
        $page = 0;
    }
    ?>
    <input type="text" id="txt-page" class="txt-page" value="<?php echo $page ?>" hidden>

</body>
<script>
    $(document).ready(function() {
        var popup = `<div class="popup">
                        <div class="loading">Loading<i class="fa fa-spinner fa-spin"></i></div>
                    </div>`;
        var body = $('body');
        var databox = $('.data');
        var sub_id;
        var MyCond;
        // get_data();
        var currentPage = $('#txt-page');
        if (currentPage.val() == 0) {
            get_data_2();
        } else {
            MyCond = `cate_id=${currentPage.val()}`;
            get_product_by_cate();
        }

        function get_product_by_cate() {
            var MyData = $('#cate-data');
            $.ajax({
                url: 'Home/action/get-product-by-cate.php',
                type: "POST",
                data: {
                    opt: 0,
                    cond: MyCond,
                },
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                    body.append(popup);
                },
                success: function(data) {
                    body.find('.popup').remove();
                    var txt = ``;
                    for (i = 0; i < data.length; i++) {
                        var ImgList = data[i]['photo'];
                        ImgList = ImgList.trim();
                        ImgList = ImgList.split(" ");
                        txt += ` 
                        <div class="col-xl-3 item-box">
                            <div class="img-box bg" style="background-image: url('Admin/img/product/${ImgList[0]}');">
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
                                <h1>${data[i]['name']}</h1>
                                <p>USA $${data[i]['price']}</p>
                            </div>
                        </div>`;
                    }
                    MyData.parent().find('.item-box').remove();
                    MyData.after(txt);
                }
            });
        }

        $('.left-menu').on('click', 'ul li', function() {
            sub_id = $(this).data('id');
            MyCond = `sub_id=${sub_id}`;
            get_product_by_cate();
        });

        function get_data() {
            $.ajax({
                url: 'Home/action/get-product-json.php',
                type: "POST",
                data: {
                    opt: 0
                },
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                    body.append(popup);
                },
                success: function(data) {
                    body.find('.popup').remove();
                    var txt = ``;
                    for (i = 0; i < data.length; i++) {
                        var ImgList = data[i]['photo'];
                        ImgList = ImgList.trim();
                        ImgList = ImgList.split(" ");
                        txt += ` 
                        <div class="col-xl-3 item-box">
                            <div class="img-box bg" style="background-image: url('Admin/img/product/${ImgList[0]}');">
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
                                <h1>${data[i]['name']}</h1>
                                <p>USA $${data[i]['price']}</p>
                            </div>
                        </div>`;
                    }
                    databox.html(txt);
                }
            });
        }

        function get_data_2() {
            $.ajax({
                url: 'Home/action/get-product-json-2.php',
                type: "POST",
                data: {
                    opt: 0
                },
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                    body.append(popup);
                },
                success: function(data) {
                    body.find('.popup').remove();
                    var txt1 = ``;
                    var txt2 = ``;
                    for (i = 0; i < data.length; i++) {
                        txt1 += `<div class="col-xl-12 col-lg-12 home-ct-title">
                                    <a href="">${data[i]['name']}</a>
                                </div>`;
                        for (j = i; j < data[i]['product'].length; j++) {
                            txt2 += `
                                    <div class="col-xl-3 item-box">
                                        <div class="img-box bg" style="background-image: url('Admin/img/product/${data[i]['product'][j]['photo']}');">
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
                                            <h1>${data[i]['product'][j]['name']}</h1>
                                            <p>USA $${data[i]['product'][j]['price']}</p>
                                        </div>
                                    </div>`;
                        }
                        txt1 += txt2;
                        txt2 = ``;
                    }
                    databox.html(txt1);
                }
            });
        }
    })
</script>

</html>