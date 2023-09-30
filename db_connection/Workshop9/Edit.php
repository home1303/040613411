<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bindParam(1, $_GET["username"]); 
$stmt->execute(); 
$row = $stmt->fetch();
?>

<html>
<head><meta charset="UTF-8"></head>
<body>

<form action="edit-member.php" method="post">
Username : <input type="hidden" name="username" value="<?=$row["username"]?>">><br>
Password : <input type="text" name="password" value="<?=$row["password"]?>">><br>
Name : <input type="text" name="name" value="<?=$row["name"]?>">><br>
mobile : <input type="text" name="mobile" value="<?=$row["mobile"]?>">><br>
email : <input type="text" name="email" value="<?=$row["email"]?>">><br>
address : <br>
<textarea name="address" rows="3" cols="40" value="<?=$row["address"]?>">></textarea><br>
<input type="submit" value="แก้ไขuser ">
</form>
</body>
</html>