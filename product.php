<?php
include_once 'navbar.php';
include_once 'connect.php';
$sql = "SELECT * FROM product";
$result = $con->query($sql);

?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">ข้อมูลสินค้า</div>
        <div class="card-body">
            <a href="addproduct.php" class="btn btn-primary mb-3">
                <i class="bi bi-person-fill-add"></i> เพิ่มข้อมูล
            </a>
            <table class="table table-striped">
                <tr>
                    <th class="bg-dark text-white">รหัสสินค้า</th>
                    <th class="bg-dark text-white">ชื่อสินค้า</th>
                    <th class="bg-dark text-white">ราคาสินค้า</th>
                    <th class="bg-dark text-white">จำนวน</th>
                    <th class="bg-dark text-white">สถานะ</th>
                    <th class="bg-dark text-white">Action</th>
                </tr>
                <?php 
                while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['pro_id'] ?></td>
                    <td><?php echo $row['pro_name'] ?></td>
                    <td><?php echo $row['pro_price'] ?></td>
                    <td><?php echo $row['pro_amount'] ?></td>
                    <td><?php 
                        if($row['pro_status'] == 1){
                            echo "สินค้าพร้อมจำหน่าย";
                        }else if($row['pro_status'] == 2 ){
                            echo "สินค้าหมด";
                        }else if($row['pro_status'] == 3){
                            echo "สินค้ายกเลิกจำหน่าย";
                        }
                    ?></td>
                    <!-- แก้ไขและลบ -->
                    <td>
                        <a href="edit_pro.php?pro_id=<?php echo $row['pro_id']?> " class="btn btn-primary">แก้ไข</a>
                        <a href="del_pro.php?pro_id=<?php echo $row['pro_id']?>" class="btn btn-danger"
                        onclick="return confirm('ยืนยันการลบ?')">ลบ</a>
                    </td>

                </tr>
                <?php } ?>

            </table>
        </div>
    </div>
</div>