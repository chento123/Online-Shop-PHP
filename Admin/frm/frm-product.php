<?php
include('../action/db/db.php');
$db = new DB;
?>
<div class="frm frm-product" style="width: 70%;">
    <div class="header">
        <h1>Product</h1>
        <div class="btn-close dis">
            <i class="fas fa-window-close"></i>
        </div>
    </div>
    <form class="upl" method="POST">
        <div class="box">
            <div class="footer">
                <div class="btn-post">Save <i class="fas fa-save"></i></div>
            </div>
            <div class="box-2">
                <div class="name">
                    <label for="">Name : </label><br>
                    <input type="text" name="txt-name" id="txt-name"><br>
                </div>
                <div class="pri">
                    <div>
                        <label for="">Price : </label><br>
                        <input type="text" name="txt-price" id="txt-price"><br>
                    </div>
                    <div>
                        <label for="">Discount : </label><br>
                        <input type="text" name="txt-dis" id="txt-dis"><br>
                    </div>
                    <div>
                        <label for="">Price After Discount : </label><br>
                        <input type="text" name="txt-price-dis" id="txt-price-dis"><br>
                    </div>
                </div>
                <label for="">Description : </label><br>
                <textarea name="txt-des" id="txt-des"></textarea><br>
            </div>
            <div class="box-1">
                <input type="text" name="txt-edit" id="txt-edit" value="0" hidden>
                <label for="">ID : </label><br>
                <input type="text" name="txt-id" id="txt-id" readonly><br>
                <label for="">Slide: </label>
                <select name="txt-slide" id="txt-slide">
                    <option value="0">--------SELECT ONE ITEM--------</option>
                    <?php
                    $postdata = $db->GetData('tbl_slide', 'status=1', 'id,name', 'id DESC', 0, 100000);
                    if ($postdata != 0) {
                        foreach ($postdata as $row) {
                    ?>
                            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <label for="">Category: </label>
                <select name="txt-cate" id="txt-cate">
                    <option value="0">-----Select Category-----</option>
                    <?php
                    $postdata = $db->GetData('tbl_category', 'status=1', 'id,name', 'od DESC', '0', '1000000000');
                    if ($postdata != 0) {
                        foreach ($postdata as $row) {
                    ?>
                            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <label for="">Sub Category: </label>
                <select name="txt-sub-cate" id="txt-sub-cate">
                    <option value="0">-----Select Sub Category-----</option>
                    <?php
                    $postdata = $db->GetData('tbl_sub_category', 'status=1', 'id,name', 'od DESC', '0', '1000000000');
                    if ($postdata != 0) {
                        foreach ($postdata as $row) {
                    ?>
                            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select> <label for="">OD : </label><br>
                <input type="text" name="txt-od" id="txt-od"><br>
                <label for="">Status : </label><br>
                <select name="txt-status" id="txt-status"><br>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select><br>
                <label for="">Photo : </label><br>
                <div class="pt">
                    <div class="img-box bg">
                        <input type="file" name="txt-file2" class="txt-file2">
                        <input type="text" class="txt-photo" id="txt-photo" name="txt-photo[]" hidden>
                    </div>
                    <div class="img-box bg">
                        <input type="file" name="txt-file2" class="txt-file2">
                        <input type="text" class="txt-photo" id="txt-photo" name="txt-photo[]" hidden>
                    </div>
                    <div class="img-box bg">
                        <input type="file" name="txt-file2" class="txt-file2">
                        <input type="text" class="txt-photo" id="txt-photo" name="txt-photo[]" hidden>
                    </div>
                    <div class="img-box bg">
                        <input type="file" name="txt-file2" class="txt-file2">
                        <input type="text" class="txt-photo" id="txt-photo" name="txt-photo[]" hidden>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>