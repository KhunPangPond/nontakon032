<?php

    $con = mysqli_connect("localhost","root","","nontakon032");

    // ไม่เท่ากับ $con จะเชื่อมต่อไม่ได้
    if(!$con){
      die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());

    }
?>