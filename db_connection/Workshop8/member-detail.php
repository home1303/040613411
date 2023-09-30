<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<?php
// 1. ก าหนดค าสง

$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bindParam(1, $_GET["username"]); 
$stmt->execute(); 
$row = $stmt->fetch(); 
?>
<div style="display:flex">
<div>
<img src='member/<?=$row["username"]?>.jpg' width='200'>
</div>
<div style="padding: 15px">
<h2><?=$row["name"]?></h2>
Address : <?=$row["address"]?><br>
Mobile: <?=$row["mobile"]?> <br><br>
Email: <?=$row["email"]?>
</div>
</div>
</body>
</html>