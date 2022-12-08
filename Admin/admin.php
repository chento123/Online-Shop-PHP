<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" href="img/icon/shop.png">
    <script src="JS/jquery-3.2.1.min.js"></script>
    <title>Shop Admin Page</title>
</head>

<body>
    <div class="bar1">
        <div class="btn-menu">
            <span><i class="fas fa-bars"></i></span>
            <img src="img/icon/shop.png" alt="">
        </div>
        <div class="title">
            <h1>Dashboard</h1>
        </div>
        <div class="user-infor">
            <div class="user-email flex">
                <h3>CheaChento@gmail.com</h3>
            </div>
            <div class="btn-logout flex">
                <i class="fas fa-sign-out"></i>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="left-menu">
            <ul>
                <li class="main-menu">
                    <a>
                        <i class="fas fa-cogs"></i>
                        <span>System</span>
                        <span><i class="fas fa-forward bok"></i></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a>
                                <i class="fas fa-users"></i>
                                <span>User</span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fas fa-key"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fas fa-user-cog"></i>
                                <span>Permission</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="main-menu">
                    <a>
                        <i class="fas fa-chart-bar"></i>
                        <span>Product</span>
                        <span><i class="fas fa-forward bok"></i></span>
                    </a>
                    <ul class="sub-menu">
                        <li data-opt="0">
                            <a>
                                <i class="fas fa-sliders-h"></i>
                                <span>Slide</span>
                            </a>
                        </li>
                        <li data-opt="1">
                            <a>
                                <i class="fas fa-clipboard-list"></i>
                                <span>Category</span>
                            </a>
                        </li>
                        <li data-opt="2">
                            <a>
                                <i class="fas fa-book"></i>
                                <span>Sub Category</span>
                            </a>
                        </li>
                        <li data-opt="3">
                            <a>
                                <i class="fas fa-cubes"></i>
                                <span>Product</span>
                            </a>
                        </li>
                        <li data-opt="4">
                            <a>
                                <i class="fa-solid fa-user"></i>
                                <span>Customer</span>
                            </a>
                        </li>
                        <li data-opt="5">
                            <a>
                                <i class="fa-solid fa-user"></i>
                                <span>User</span>
                            </a>
                        </li>
                        <li data-opt="6">
                            <a>
                                <i class="fa-solid fa-file-invoice"></i>
                                <span>Invoice</span>
                            </a>
                        </li>
                        <li data-opt="7">
                            <a>
                                <i class="fa-solid fa-book"></i>
                                <span>Invoice Detail</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="con">
            <div class="bar2">
                <ul>
                    <li>
                        <a class="btn btn-add">ADD NEW</a>
                    </li>
                    <li>
                        <select id="btn-fillter">
                            <option value="2">2</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                        </select>
                    </li>
                    <li>
                        <a class="btn btn-back">
                            <i class="fas fa-backward"></i>
                        </a>
                    </li>
                    <li>
                        <span id="txt-current-page">1</span>
                        <span>/</span>
                        <span id="txt-total-page"></span>
                        <span> Of </span>
                        <span id="txt-total-data"></span>
                    </li>
                    <li>
                        <a class="btn btn-next">
                            <i class="fas fa-forward"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="data">
                <table id="tbl-data">
                </table>
            </div>
        </div>
    </div>
</body>
<script src="JS/action.js"></script>
<script>
    $(document).ready(function() {
        // fillter data
        $('#btn-fillter').change(function() {
            s = 0;
            if (frmopt == 0) {
                get_slide();
            } else if (frmopt == 1) {
                get_cate();
            } else if (frmopt == 2) {
                get_sub_cate();
            } else if (frmopt == 3) {
                get_product();
            }else if(frmopt==4){
                get_customer();
            }else if(frmopt==5){
                get_user();
            }else if(frmopt==6){
                get_invoice();
            }
            totalPage.text(Math.ceil(totalPage.text() / e.val()));
        });
        $('.btn-next').click(function() {
            if (currentpage.text() == totalPage.text()) {
                return;
            }
            currentpage.text(parseInt(currentpage.text()) + 1);
            s = s + parseInt(e.val());
            if (frmopt == 0) {
                get_slide();
            } else if (frmopt == 1) {
                get_cate();
            } else if (frmopt == 2) {
                get_sub_cate();
            } else if (frmopt == 3) {
                get_product();
            }else if(frmopt==4){
                get_customer();
            }else if(frmopt==5){
                get_user();
            }else if(frmopt==6){
                get_invoice();
            }
        });
        $('.btn-back').click(function() {
            if (currentpage.text() == 1) {
                return;
            }
            currentpage.text(parseInt(currentpage.text()) - 1);
            s = s - parseInt(e.val());
            if (frmopt == 0) {
                get_slide();
            } else if (frmopt == 1) {
                get_cate();
            } else if (frmopt == 2) {
                get_sub_cate();
            } else if (frmopt == 3) {
                get_product();
            }else if(frmopt==4){
                get_customer();
            }else if(frmopt==5){
                get_user();
            }else if(frmopt==6){
                get_invoice();
            }
        });
        $('.btn-add').click(function() {
            $('body').append(popup);
            $(".popup").load(`frm/${frm[frmopt]}`, function(responseTxt, statusTxt, xhr) {
                if (statusTxt == "success") {
                    body.find('.frm .titile h1').text(title);
                    get_auto_id(frmopt);
                }
                if (statusTxt == "error") {}
            });
        });
        $('.btn-menu').click(function() {
            if (opt == 0) {
                $(this).find('img').css({
                    'display': 'none'
                });
                $(this).css({
                    'width': '5%'
                });
                $('.title').css({
                    'width': '70%'
                });
                $('.left-menu').css({
                    'left': '-20%'
                });
                $('.con').css({
                    'width': '100%',
                    'left': '0',
                });
                opt = 1;
            } else {
                $('.title').css({
                    'width': '60%'
                });
                $(this).find('img').css({
                    'display': 'block'
                });
                $(this).css({
                    'width': '15%'
                });
                $('.left-menu').css({
                    'left': '0'
                });
                $('.con').css({
                    'width': '85%',
                    'left': '15%',
                });
                opt = 0;
            }
        });
        $('.main-menu').click(function() {
            var num = $(this).find('.fa-plus').length;
            $(this).find('.sub-menu').slideToggle();
        });
        body.on('click', '.footer .btn-post', function() {
            var eThis = $(this);
            if (frmopt == 0) {
                save_slide(eThis);
            } else if (frmopt == 1) {
                save_cate(eThis);
            } else if (frmopt == 2) {
                save_sub_cate(eThis);
            } else if (frmopt == 3) {
                save_product(eThis);
            } else if(frmopt==4){
                save_customer(eThis);
            }else if(frmopt==5){
                save_user(eThis);
            }else if(frmopt==6){
                save_invoice(eThis);
            }
        });
        body.on('change', '.frm #txt-file', function() {
            var parent = $(this).parents('.frm');
            var imgbox = parent.find('.img-box');
            var imgname = parent.find("#txt-photo");
            var frm = $(this).closest('form.upl');
            var frm_data = new FormData(frm[0]);
            $.ajax({
                url: 'action/save-file.php',
                type: 'POST',
                data: frm_data,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                beforeSend: function() {
                    imgbox.css({
                        'background-image': 'url(img/loading.gif)',
                    });
                },
                success: function(data) {
                    imgname.val(data.img);
                    imgbox.css({
                        'background-image': 'url(img/product/' + data.img + ')',
                    });
                    parent.find('#txt-photo').val(data.img);
                }
            });
        });
        body.on('click', 'table tr td #btn-edit', function() {
            var eThis = $(this);
            $('body').append(popup);
            $(".popup").load(`frm/${frm[frmopt]}`, function(responseTxt, statusTxt, xhr) {
                if (statusTxt == "success") {
                    body.find('.frm .titile h1').text(title);
                    if (frmopt == 0) {
                        edit_slide(eThis);
                    } else if (frmopt == 1) {
                        edit_cate(eThis);
                    } else if (frmopt == 2) {
                        edit_sub_cate(eThis);
                    } else if (frmopt == 3) {
                        edit_product(eThis);
                    }else if(frmopt==4){
                        edit_customer(eThis);
                    }else if(frmopt==5){
                        edit_user(eThis);
                    }else  if(frmopt==6){
                        edit_invoice(eThis);
                    }
                }
                if (statusTxt == "error") {}
            });
        });
        body.on('click', '.frm .btn-close', function() {
            $('.popup').remove();
        });
        body.on('click', '.sub-menu li', function() {
            frmopt = $(this).data('opt');
            title = $(this).text().trim();
            body.find('.bar1 .title h1').text(title);
            $(this).parent().slideDown();
            $(this).parents().find('.left-menu a').css({
                'background-color': 'white',
            });
            $(this).find('a').css({
                'background-color': 'purple',
            });
            $('.bar2').css({
                'display': 'block'
            });
            if (frmopt == 0) {
                get_slide();
            } else if (frmopt == 1) {
                get_cate();
            } else if (frmopt == 2) {
                get_sub_cate();
            } else if (frmopt == 3) {
                get_product();
            }else if(frmopt==4){
                get_customer();
            }else if(frmopt==5){
                get_user();
            }else if(frmopt==6){
                get_invoice();
            }
            get_count_data();
        });
        // get sub category by category
        body.on('change', '.frm-product #txt-cate', function() {
            var id = $(this).val();
            get_sub_by_cate(id,0);
        });
        // upload mutiple image 
        body.on('change', '.frm .txt-file2', function() {
            var eThis = $(this);
            var imgbox = eThis.parent();
            var file_data = eThis.prop('files')[0];
            var frm = eThis.closest('form.upl');
            var frm_data = new FormData(frm[0]);
            var photo = imgbox.find('#txt-photo');
            frm_data.append('txt-file', file_data);
            var loading = `<div class='loading-img'><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>`;
            $.ajax({
                url: 'action/save-file.php',
                type: 'POST',
                data: frm_data,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                beforeSend: function() {
                    imgbox.append(loading);
                },
                success: function(data) {
                    imgbox.css({
                        'background-image': 'url(img/product/' + data.img + ')',
                    });
                    imgbox.find('.loading-img').remove();
                    eThis.parent().find('#txt-photo').val(data.img);
                }
            });
        });
    })
</script>

</html>