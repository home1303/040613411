<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8">
<script>
function confirmDelete(username) { // ฟังก์ชนจะถูกเรียกถ้าผู้ใช ั คลิกที่ ้ link ลบ
var ans = confirm("ต ้องการลบสนค ้ารหัส ิ " + username); // แสดงกล่องถามผู้ใช ้
if (ans==true) // ถ้าผู้ใชกด ้ OK จะเข ้าเงื่อนไขนี้
document.location = "del.php?username=" + username; // สงรหัสส ่ นค ้าไปให ้ไฟล์ ิ delete.php
}
</script>
</head>
<body>
<?php
$stmt = $pdo->prepare("SELECT * FROM member");
$stmt->execute();
while ($row = $stmt->fetch()) {
echo "รหัสสนค ้า ิ : " . $row ["username"] . "<br>";
echo "ชอส
ื่ นค ้า ิ : " . $row ["name"] . "<br>";
echo "รายละเอียดสนค ้า ิ : " . $row ["address"] . "<br>";
echo "ราคา: " . $row ["mobile"] . " บาท <br>";
echo "<a href='editform.php?username=" . $row ["username"] . "'>แก ้ไข</a> | ";
echo "<a href='#' onclick='confirmDelete(\"" . $row ["username"] . "\")'>ลบ</a>";
echo "<hr>\n";
}
?>
</body>
</html>