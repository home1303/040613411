<?php include "connect.php" ?>
<?php
$username = $_GET["username"];
$stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");
$stmt->bindparam(1,$username);
$stmt->execute();
?>
<table border="1">
<?php while($row = $stmt->fetch()): ?>
<tr>
<td><?php echo $row['username']?></td>
<td><img src="../no.2/member/<?php echo $row['username'] ?>.jpg" alt=""></td>

</tr>
<?php endwhile;?>
</table>