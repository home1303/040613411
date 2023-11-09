<?php 
    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Project Database </title>
    <link rel="stylesheet" href="stylet.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/962244b29f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>
<body>
  <?php 
    if (isset($_SESSION['user_login'])) {
        $user_id = $_SESSION['user_login'];
        $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
  ?>
  <?php 
    if(isset($_POST['submit'])){

      require_once "config/db.php";

      $newPassword = $_POST['newPassword'];
      $oldPassword = $_POST['oldPassword'];
      $dataPassword = $row['password'];

      if(empty($oldPassword)){
        echo "<script>
        $(document).ready(function() {
            Swal.fire({
                title: 'มีบางอย่างผิดพลาด!',
                text: 'กรุณาป้อนรหัสผ่านเดิม!',
                icon: 'error',
                timer: 3000,
                showConfirmButton: false
                });
            })
        </script>";
      }
      elseif(empty($newPassword)){
        echo "<script>
        $(document).ready(function() {
            Swal.fire({
                title: 'มีบางอย่างผิดพลาด!',
                text: 'กรุณาป้อนรหัสผ่านใหม่!',
                icon: 'error',
                timer: 3000,
                showConfirmButton: false
                });
            })
        </script>";
      }
      else{
        if($oldPassword == $row['password']){

          $id = $row['id'];

          $sql = $conn->prepare("UPDATE users SET password = :newPassword WHERE id = :id");
          $sql->bindParam(":id", $id);
          $sql->bindParam(":newPassword", $newPassword);
          $sql->execute();
  
          if($sql){
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'สำเร็จ!',
                    text: 'เปลี่ยนรหัสผ่านสำเร็จ!',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false
                    });
                })
            </script>";
          }
          else{
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'มีบางอย่างผิดพลาด!',
                    text: '',
                    icon: 'error',
                    timer: 3000,
                    showConfirmButton: false
                    });
                })
            </script>";
          }
        }
        else{
          echo "<script>
          $(document).ready(function() {
              Swal.fire({
                  title: 'มีบางอย่างผิดพลาด!',
                  text: 'รหัสผ่านไม่เดิมไม่ถูกต้อง!',
                  icon: 'error',
                  timer: 3000,
                  showConfirmButton: false
                  });
              })
          </script>";
        }
      }

    }

  ?>

<div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">InwCode</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="user.php">
          <i class='bx bxs-dashboard'></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="user.php">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-cart bx-flip-horizontal' ></i>
            <span class="link_name">Order</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Order</a></li>
          <li><a href="oder_dedicated.php">Dedicated Server</a></li>
          <li><a href="oder_vps.php">VPS Auto</a></li>
        </ul>
      </li>

      <li>
        <a href="Clouds_server.php">
          <i class='bx bxs-cloud'></i>
          <span class="link_name">Clouds</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="Clouds_server.php">Clouds Server</a></li>
        </ul>
      </li>

      <li>
        <a href="Hosting.php">
          <i class='bx bxs-data' ></i>
          <span class="link_name">Hosting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="Hosting.php">Hosting</a></li>
        </ul>
      </li>

      <li>
        <a href="Domain.php">
          <i class='bx bx-world' ></i>
          <span class="link_name">Domain</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="Domain.php">Domain</a></li>
        </ul>
      </li>

      <li>
        <a href="topup.php">
          <i class='bx bx-wallet'></i>
          <span class="link_name">TopUp</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="topup.php">TopUp</a></li>
        </ul>
      </li>

      <li>
        <a href="receipt.php">
          <i class='bx bxs-receipt'></i>
          <span class="link_name">Receipt</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="receipt.php">Receipt</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="link_name">Setting</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Setting</a></li>
          <li><a href="user_manager.php">Users Manager</a></li>
          <li><a href="server_manage.php">Server Manager</a></li>
          <li><a href="hosting_manage.php">Hosting Manager</a></li>
        </ul>
      </li>

      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="image/profile.jpg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name"><?php echo $row['firstname'] ?></div>
        <div class="job">Point : <?php echo $row['amount'] ?></div>
      </div>
      <a href="logout.php"><i class='bx bx-log-out' ></i></a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' style='color:#ffffff'  ></i>
      <span class="text" style='color:#ffffff' >User Mannager</span>
    </div>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/setting.png" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>

  <div class="p-4">
    
  </div>
  
  <center><div class="container">
    <div class="card" style="width: 900px;">
      <div class="card-body shadow-lg">
        <!----------------------------Dedicated------------------------------------------->
        <h1 class="text-uppercase text-center mb-3">SERVER MANAGER / จัดการเครื่อง ⚙️<p class="fs-5">ตั้งค่าข้อมูลเครื่องเซิร์ฟเวอร์ของคุณ </p></h1>

        <div class="m-5" style="width: 600px;">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-floating m-3">
              <input type="text" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?php echo $row['firstname']?>" disabled>
              <label for="floatingInputValue">ชื่อ</label>
            </div>
            <div class="form-floating m-3">
              <input type="text" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?php echo $row['lastname']?>" disabled>
              <label for="floatingInputValue">นามสกุล</label>
            </div>
            <div class="form-floating m-3">
              <input type="text" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?php echo $row['email']?>" disabled>
              <label for="floatingInputValue">อีเมล</label>
            </div>
            <div class="form-floating m-3">
              <input type="text" class="form-control" id="floatingInput" name="oldPassword" placeholder="text">
              <label for="floatingInput">รหัสผ่านเดิม</label>
            </div>
            <div class="form-floating m-3">
              <input type="text" class="form-control" id="floatingInput" name="newPassword" placeholder="text">
              <label for="floatingInput">รหัสผ่านใหม่</label>
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
          </form>
        </div>

      </div>
    </div>
  </div></center>

  <div class="p-3">

  </div>

</section> 
    <script src="script.js"></script>

</body>
</html>
