<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->bindParam(3, $_POST["name"]);
$stmt->bindParam(4, $_POST["address"]);
$stmt->bindParam(5, $_POST["mobile"]);
$stmt->bindParam(6, $_POST["email"]);
$stmt->execute(); // เริ่มเพิ่มข้อมูล
$un = $_POST["username"];

// header คือฟังก์ชนที่จัดการส ั งข้อมูลไปยังไฟล์ที่ก าหนด ่ (send redirect)
// ในที่นีคือ ให้เปิดเว็บหน้า ้ product-detail.php พร้อมกับสงรหัสส ่ นค้า ิ (pid) แนบไปกับ URL
header("location: member-detail.php?username=" . $un);
?>