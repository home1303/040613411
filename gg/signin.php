<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ CS STUDIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
        <?php 

            session_start();
            require_once 'config/db.php';

            if (isset($_POST['signin'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (empty($email)) {
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
                        title: 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
                } else {
                    try {

                        $check_data = $conn->prepare("SELECT * FROM users WHERE email = :email");
                        $check_data->bindParam(":email", $email);
                        $check_data->execute();
                        $row = $check_data->fetch(PDO::FETCH_ASSOC);

                        if ($check_data->rowCount() > 0) {

                            if ($email == $row['email']) {
                                if ($password == $row['password']) {
                                    if ($row['urole'] == 'admin') {
                                        $_SESSION['admin_login'] = $row['id'];
                                        header("location: admin.php");
                                    } else {
                                        $_SESSION['user_login'] = $row['id'];
                                        header("location: user.php");
                                    }
                                } else {
                                    echo"<script>
                                    Swal.fire({
                                        position: 'top-center',
                                        icon: 'warning',
                                        title: 'รหัสผ่านผิด!',
                                        showConfirmButton: false,
                                        timer: 1500
                                      })
                                    </script>";
                                }
                            } else {
                                echo"<script>
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'warning',
                                    title: 'อีเมลผิด!',
                                    showConfirmButton: false,
                                    timer: 1500
                                  })
                                </script>";
                            }
                        } else {
                            echo"<script>
                            Swal.fire({
                                position: 'top-center',
                                icon: 'warning',
                                title: 'ไม่มีข้อมูลในระบบ!',
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
    <div class="container">
        <h3 class="mt-4">เข้าสู่ระบบ</h3>
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
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" name="signin" class="btn btn-primary">Sign In</button>
        </form>
        <hr>
        <p>ยังไม่เป็นสมาชิกใช่ไหม คลิ๊กที่นี่เพื่อ <a href="register.php">สมัครสมาชิก</a></p>
    </div>
    
</body>
</html>