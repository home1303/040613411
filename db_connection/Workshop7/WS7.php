<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->bindParam(3, $_POST["name"]);
$stmt->bindParam(4, $_POST["address"]);
$stmt->bindParam(5, $_POST["mobile"]);
$stmt->bindParam(6, $_POST["email"]);
$stmt->bindParam(7, $_POST["img"]);
$stmt->execute(); // เริ่มเพิ่มข้อมูล
?>
<html>
<head><meta charset="UTF-8"></head>
<body>
ต้อนรับสมาชิกใหม่ <?=$_POST["username"]?><br>
<input type="button" class="button_active" onclick="location.href='index.php';" value="Back" />

</html>