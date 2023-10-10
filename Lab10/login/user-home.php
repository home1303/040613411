<?php session_start(); 
    include "connect.php";
    // ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
    if (empty($_SESSION["username"]) ) { 
        header("location: login-form.php");
    }
    ?>

<html>
<body>
    <h1>สวัสดี <?=$_SESSION["fullname"]?></h1>

    หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a><br><br>


    <hr>
    <br>

    <?php 
           $user = $_SESSION['username'];
           $stmt = $pdo->prepare("SELECT *, SUM(price) AS totalprice, COUNT(quantity) AS totalquantity FROM orders 
           INNER JOIN member ON member.username = orders.username INNER JOIN item ON item.ord_id = orders.ord_id 
           INNER JOIN product ON product.pid = item.pid WHERE member.username = ? GROUP BY product.pname;");
           $stmt->bindParam(1, $user);
           $stmt->execute();
        
           while ($row = $stmt->fetch()) {
               echo "ชื่อสินค้า: " . $row ["pname"] . "<br>";
               echo "ราคา: " . $row ["totalprice"] . " บาท <br>";
               echo "จำนวน: " . $row ["totalquantity"] . " ชิ้น <br>";
               echo "สั่งซื้อเมื่อ:" . $row["ord_date"] . "<br>";
               echo "<hr>\n";
           }
    
    ?>
</body>
</html>
