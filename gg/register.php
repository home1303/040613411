<?php 

    session_start();
    require_once 'config/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="container">
        <h3 class="mt-4">สมัครสมาชิก</h3>
        <hr>
        <form action="" method="post">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>

            <?php 
            error_reporting(E_ALL & ~E_NOTICE);
            require_once 'config/db.php';

            if (isset($_POST['signup'])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $c_password = $_POST['c_password'];
                $urole = 'user';
                $amount = '0';

                if (empty($firstname)) {
                    //$_SESSION['error'] = 'กรุณากรอกชื่อ';
                    //header("location: index.php");
                    echo"<script>
                    Swal.fire({
                        position: 'top-center',
                        icon: 'warning',
                        title: 'กรุณากรอกชื่อ!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
                } else if (empty($lastname)) {
                    echo"<script>
                    Swal.fire({
                        position: 'top-center',
                        icon: 'warning',
                        title: 'กรุณากรอกนามสกุล!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
                } else if (empty($email)) {
                    echo"<script>
                    Swal.fire({
                        position: 'top-center',
                        icon: 'warning',
                        title: 'กรุณากรอกอีเมล!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo"<script>
                    Swal.fire({
                        position: 'top-center',
                        icon: 'warning',
                        title: 'รูปแบบอีเมลไม่ถูกต้อง!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
                } else if (empty($password)) {
                    echo"<script>
                    Swal.fire({
                        position: 'top-center',
                        icon: 'warning',
                        title: 'กรุณากรอกรหัสผ่าน!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
                } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
                    echo"<script>
                    Swal.fire({
                        position: 'top-center',
                        icon: 'warning',
                        title: 'รหัสผ่านต้องมีความยาวระหว่าง 5-20 ตัวอักษร!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
                } else if (empty($c_password)) {
                    echo"<script>
                    Swal.fire({
                        position: 'top-center',
                        icon: 'warning',
                        title: 'กรุณายืนยันรหัสผ่าน!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
                } else if ($password != $c_password) {
                    echo"<script>
                    Swal.fire({
                        position: 'top-center',
                        icon: 'warning',
                        title: 'รหัสผ่านไม่ตรงกัน!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
                } else {
                    try {

                        $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                        $check_email->bindParam(":email", $email);
                        $check_email->execute();
                        $row = $check_email->fetch(PDO::FETCH_ASSOC);

                        if ($row['email'] == $email) {
                            echo"<script>
                            Swal.fire({
                                position: 'top-center',
                                icon: 'error',
                                title: 'มีอีเมลในระบบอยู่แล้ว',
                                showConfirmButton: false,
                                timer: 1500
                              })
                            </script>";
                        } else if (!isset($_SESSION['error'])) {
                            
                            $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, email, password, urole, amount) 
                                                    VALUES(:firstname, :lastname, :email, :password, :urole, :amount)");
                            $stmt->bindParam(":firstname", $firstname);
                            $stmt->bindParam(":lastname", $lastname);
                            $stmt->bindParam(":email", $email);
                            $stmt->bindParam(":password", $password);
                            $stmt->bindParam(":urole", $urole);
                            $stmt->bindParam(":amount", $amount);
                            $stmt->execute();
                            echo"<script>
                            Swal.fire({
                                position: 'top-center',
                                icon: 'success',
                                title: 'สมัครสมาชิกเรียบร้อยแล้ว',
                                showConfirmButton: false,
                                timer: 1500
                              })
                            </script>";
                        } else {
                            echo"<script>
                            Swal.fire({
                                position: 'top-center',
                                icon: 'warning',
                                title: 'มีบางอย่างผิดพลาด!',
                                showConfirmButton: false,
                                timer: 1500
                              })
                            </script>";
                        }

                    } catch(PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            }


            ?>
            <div class="mb-3">
                <label for="firstname" class="form-label">First name</label>
                <input type="text" class="form-control" name="firstname" aria-describedby="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lastname" aria-describedby="lastname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="confirm password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="c_password">
            </div>
            <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
        </form>
        <hr>
        <p>เป็นสมาชิกแล้วใช่ไหม คลิ๊กที่นี่เพื่อ <a href="signin.php">เข้าสู่ระบบ</a></p>
    </div>
    <?php
    echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    ?>
</body>
</html>