<?php
    include('../action/db/db.php');
    $db=new DB;
?>
<div class="frm">
    <div class="header">
        <h1>sub category</h1>
        <div class="btn-close dis">
            <i class="fas fa-window-close"></i>
        </div>
    </div>
    <form class="upl" method="POST">
        <div class="box">
            <input type="text" name="txt-edit" id="txt-edit" value="0">
            <label for="">ID : </label><br>
            <input type="text" name="txt-id" id="txt-id" readonly><br>
            <label for="">Category: </label>
            <select name="txt-cate" id="txt-cate">
                <option value="0">-----Select Category-----</option>
                <?php 
                    $postdata=$db->GetData('tbl_category','status=1','id,name','od DESC','0','1000000000');
                    if($postdata != 0){
                        foreach($postdata as $row){
                            ?>
                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
            <label for="">Name : </label><br>
            <input type="text" name="txt-name" id="txt-name"><br>
            <label for="">OD : </label><br>
            <input type="text" name="txt-od" id="txt-od"><br>
            <label for="">Status : </label><br>
            <select name="txt-status" id="txt-status"><br>
                <option value="1">1</option>
                <option value="0">0</option>
            </select><br>
            <label for="">Photo : </label><br>
            <div class="img-box bg">
                <input type="file" name="txt-file" id="txt-file">
                <input type="text" name="txt-photo" id="txt-photo" hidden>
            </div><br>
        </div>
        <div class="footer">
            <div class="btn-post">Save <i class="fas fa-save"></i></div>
        </div>
    </form>
</div>