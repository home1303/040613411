<?php
    require('config/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PDO & Bootstrap 5</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .container {
            max-width: 550px;
        }
    </style>
    <link rel="stylesheet" href="css/style_editt.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="container mt-5">
    <?php 

        session_start();
        require_once "config/db.php";

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $urole = $_POST['urole'];
            $amount = $_POST['amount'];


            $sql = $conn->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, password = :password, urole = :urole, amount = :amount WHERE id = :id");
            $sql->bindParam(":id", $id);
            $sql->bindParam(":firstname", $firstname);
            $sql->bindParam(":lastname", $lastname);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":password", $password);
            $sql->bindParam(":urole", $urole);
            $sql->bindParam(":amount", $amount);
            $sql->execute();

            if ($sql) {
                $_SESSION['success'] = "Data has been updated succesfully";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'บันทึกข้อมูลสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                </script>";
                header("refresh:2; url=admin_manage_users.php");
            } else {
                $_SESSION['error'] = "Data has not been updated succesfully";
                header("location: admin_manage_users.php");
            }
        }

        ?>
        <center><h1>✍️ แก้ไข ข้อมูล</h1></center>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <?php 
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $stmt = $conn->query("SELECT * FROM users WHERE id = $id");
                    $stmt->execute();
                    $data = $stmt->fetch();
                }
            ?>
            <?php 
                    $stmt12 = $conn->query("SELECT * FROM role");
                    $stmt12->execute();
                    $data12 = $stmt12->fetch();
            ?>
            <div class="mb-3">
                <label for="id" class="col-form-label">ID : </label>
                <input type="text" readonly value="<?= $data['id']; ?>" required class="form-control" name="id">
            </div>
            <div class="mb-3">
                <label for="firstname" class="col-form-label">ชื่อ : </label>
                <input type="text" value="<?= $data['firstname']; ?>" required class="form-control" name="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="col-form-label">นามสกุล : </label>
                <input type="text"  value="<?= $data['lastname']; ?>" required class="form-control" name="lastname">
            </div>
            <div class="mb-3">
                <label for="email" class="col-form-label">อีเมล :</label>
                <input type="text"  value="<?= $data['email']; ?>" required class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="col-form-label">รหัสผ่าน :</label>
                <input type="text"  value="<?= $data['password']; ?>" required class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">ระดับ :</label>
                <select class="form-select" name="urole" aria-label="Default select example">
                    <option selected><?= $data['urole']; ?></option>
                    <?php
                        $result = $conn->query("SELECT * FROM role");
                        if ($result !== false) {
                        while($item = $result->fetch()) {
                    ?>
                    <option value="<?= $item['rolename']; ?>"><?= $item['rolename']; ?></option>
                    <?php } 
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="amount" class="col-form-label">จำนวนเงิน :</label>
                <input type="text"  value="<?= $data['amount']; ?>" required class="form-control" name="amount">
            </div>

            <div class="modal-footer">
                <a class="btn btn-secondary" href="admin_manage_users.php">Go Back</a>
                <button type="submit" name="update" class="btn btn-success">Update</button>
            </div>
            </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file);
            }
        }
    </script>

</body>
</html>