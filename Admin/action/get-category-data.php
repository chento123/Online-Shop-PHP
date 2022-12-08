
<?php
    $cn = new mysqli('localhost', 'root', '', 'php-shop');
    $sql="SELECT *FROM tbl_category";
    $rs=$cn->query($sql);
    while($row=$rs->fetch_array()){
        ?>
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[5]; ?></td>
            </tr>
        <?php
    }
?>