<?php include "connect.php" ?>

<?php
$stmt = $pdo->prepare("UPDATE member SET password=?, name=?, address=?, mobile=?, email=?
WHERE username=?"); // เตรียมค าสง

$stmt->bindParam(1, $_POST["password"]);
$stmt->bindParam(2, $_POST["name"]);
$stmt->bindParam(3, $_POST["address"]);
$stmt->bindParam(4, $_POST["mobile"]);
$stmt->bindParam(5, $_POST["email"]);
$stmt->bindParam(6, $_POST["username"]);   //เพิ่มส่วนนี้เพราะแก้ไขข้อมูลที่ตรงกับ PK

if ($stmt->execute())
echo "แก้ไขUser ". $_POST["username"] . " ส าเร็จ";
?>