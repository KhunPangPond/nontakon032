<?php
include_once 'navbar.php';
include_once 'connect.php';
$sql = "SELECT * FROM user";
$result = $con->query($sql);

?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">ข้อมูล user</div>
        <div class="card-body">
            <a href="adduser.php" class="btn btn-primary mb-3">
                <i class="bi bi-person-fill-add"></i> เพิ่มข้อมูล
            </a>
            <table class="table table-striped">
                <tr>
                    <th class="bg-dark text-white">ลำดับที่</th>
                    <th class="bg-dark text-white">username</th>
                    <th class="bg-dark text-white">fullname</th>
                    <th class="bg-dark text-white">email</th>
                    <th class="bg-dark text-white">action</th>
                </tr>
                <?php 
                $i=1;
                while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $i;$i++ ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['fullname'] ?></td>
                    <td><?php echo $row['email'] ?></td>

                    <!-- แก้ไขและลบ -->
                    <td>
                        <a href="edit_user.php?username=<?php echo $row['username']?> " class="btn btn-primary">แก้ไข</a>
                        <a href="del_user.php?username=<?php echo $row['username']?>" class="btn btn-danger"
                        onclick="return confirm('ยืนยันการลบ?')">ลบ</a>
                    </td>

                </tr>
                <?php } ?>

            </table>
        </div>
    </div>
</div>