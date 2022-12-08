<?php
include('../action/db/db.php');
$db = new DB;
?>
<div class="frm frm-product" style="width: 70%;">
    <div class="header">
        <h1>User</h1>
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
                <label for="">Address : </label><br>
                <input type="text" name="txt-address" id="txt-address"><br>
                <label for="">Date Created : </label><br>
                <input type="text" name="txt-date-create" id="txt-date-create" readonly><br>
                <label for="">Date Login : </label><br>
                <input type="text" name="txt-date-login" id="txt-date-login" readonly><br>
            </div>
            <div class="box-1">
                <input type="text" name="txt-edit" id="txt-edit" value="0" hidden>
                <label for="">ID : </label><br>
                <input type="text" name="txt-id" id="txt-id" readonly><br>
                <label for="">Fullname : </label><br>
                <input type="text" name="txt-name" id="txt-name"><br>
                <label for="">Phone Number : </label><br>
                <input type="text" name="txt-phone" id="txt-phone"><br>
                <label for="">Position : </label><br>
                <input type="text" name="txt-position" id="txt-position"><br>
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
        </div>
    </form>
</div>