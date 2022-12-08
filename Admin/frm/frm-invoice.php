
<?php
include('../action/db/db.php');
$db = new DB;
?>
<div class="frm">
    <div class="header">
        <h1>Invoice</h1>
        <div class="btn-close dis">
            <i class="fas fa-window-close"></i>
        </div>
    </div>
    <form class="upl" method="POST">
        <div class="box">
            <input type="text" name="txt-edit" id="txt-edit" value="0">
            <label for="">ID : </label><br>
            <input type="text" name="txt-id" id="txt-id" readonly><br>
            <label for="">User Name : </label><br>
            <select name="txt-user" id="txt-user">
                    <option value="0">--------SELECT User name--------</option>
                    <?php
                    $postdata = $db->GetData('tbl_user', 'status=1', 'id,fullname', 'id DESC', 0, 100000);
                    if ($postdata != 0) {
                        foreach ($postdata as $row) {
                    ?>
                            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                    <?php
                        }
                    }
                    ?>
            </select>
            <label for="">Customer Name : </label><br>
            <select name="txt-cus" id="txt-cus">
                <option value="0">--------SELECT Customer--------</option>
                <?php
                $postdata = $db->GetData('tbl_customer', 'status=1', 'id,name', 'id DESC', 0, 100000);
                if ($postdata != 0) {
                    foreach ($postdata as $row) {
                ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <label for="">Total : </label><br>
            <input type="text" name="txt-total" id="txt-total"><br>
            <label for="">Address : </label><br>
            <input type="text" name="txt-address" id="txt-address"><br>
            <label for="">Status : </label><br>
            <select name="txt-status" id="txt-status"><br>
                <option value="1">1</option>
                <option value="0">0</option>
            </select><br>
        </div>
        <div class="footer">
            <div class="btn-post">Save <i class="fas fa-save"></i></div>
        </div>
    </form>
</div>