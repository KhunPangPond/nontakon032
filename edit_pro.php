<?php
    include 'navbar.php';
    include 'connect.php';
    // รับมาแล้วเก็บไว้ตัวแปร username
    $pro_id=$_GET['pro_id'];
    $sql = "SELECT * FROM product WHERE pro_id =' $pro_id'";
    // ข้อมูลยังเป็นก้อน
    $result = $con->query($sql);

    $row = mysqli_fetch_array($result);

    // เช็คการกดปุ่ม
    if(isset($_POST['submit'])){
        // รับค่า
        $pro_name = $_POST['pro_name'];
        $pro_price = $_POST['pro_price'];
        $pro_amount = $_POST['pro_amount'];
        $pro_status = $_POST['pro_status'];

        if($pro_name == '' || $pro_price == '' || $pro_amount == '' || $pro_status == ''){
            echo "<script>alert('กรุณากรอกข้อมูลให้ครบทุกช่อง')</script>";
        }else{
        $sql ="UPDATE product SET pro_name ='$pro_name',pro_price='$pro_price',pro_amount='$pro_amount',pro_status='$pro_status' 
        WHERE pro_id ='$pro_id'" ;
        $result = $con->query($sql);

        // แจ้งเตือน ถ้าไม่ error ให้ไป หน้า user
        if(!$result){
            echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้);history.back();</script>";
        }else{
            header('location:product.php');
        }
    }//ปิดเช็คค่าว่าง
}//ปิดเช็คการกดปุ่ม
?>

<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header bg-primary text-white">
            แก้ไขข้อมูล User
        </div>

        <div class="card-body ">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">ชื่อสินค้า</label>
                    <input type="text" name="pro_name" class="form-control" value="<?php echo $row['pro_name']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">ราคาสินค้า</label>
                    <input type="text" name="pro_price" class="form-control" value="<?php echo $row['pro_price'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">จำนวน</label>
                    <input type="text" name="pro_amount" class="form-control" value="<?php echo $row['pro_amount']?>">
                </div>
                <div class="mb-3">
                <label class="form-label">สถานะ</label>
                    <select name="pro_status" class="form-select">
                    <option value="<?php echo $row['pro_status']?>">
                    <?php
                        if($row['pro_status'] == 1){
                            echo "สินค้าพร้อมจำหน่าย";
                        }else if($row['pro_status'] == 2 ){
                            echo "สินค้าหมด";
                        }else if($row['pro_status'] == 3){
                            echo "สินค้ายกเลิกจำหน่าย";
                        }
                    ?>
                    </option>
                    <option value="1">สินค้าพร้อมจำหน่าย</option>
                    <option value="2">สินค้าหมด</option>
                    <option value="3">สินค้ายกเลิกจำหน่าย</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" name="submit">บันทึกข้อมูล</button>
            </form>
        </div>
    </div>
</div>