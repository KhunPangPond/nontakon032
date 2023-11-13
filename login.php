<?php
    include_once 'connect.php';
    // ตัวตรวจสอบกดปุ่มหรือยัง
    if(isset($_POST['submit'])){
        // รับค่า
        // สตริงอ่านจากหลังไปหน้า
        $username=$_POST['username'];
        $password=$_POST['password'];

        if($username== '' || $password== ''){
            echo "<script>alert('ไม่ได้กรอก username หรือ password')</script>";
        }
        else {
            $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            // $result=mysqli_query($con,$sql);
        
            // แบบ arrow สั้นขึ้น
            $result=$con->query($sql);
            $row=mysqli_fetch_array($result);
            $num=mysqli_num_rows($result);
        if($num != 1){
            // echo "<script>alert('login ไม่สำเร็จ')</script>";
            $message = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
        }
        else{
           session_start();
           $_SESSION['username'] = $row['username'];
           $_SESSION['fullname'] = $row['fullname'];
           header('location:index.php');
            }

        }
    }
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>



    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">
                        Login
                    </div>
                    <div class="card-body">
                        <!--  action ตัวมันเอง -->
                        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" name="username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                    name="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" class="btn btn-dark btn-block mt-2" name="submit">Login</button>
                        </form>
                        <div class="text-center text-danger">
                            <?php
                    
                    if(isset($message)){
                        echo "$message";
                    }
                    ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>