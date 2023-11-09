<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }

?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Drop Down Sidebar Menu | CodingLab </title>
    <link rel="stylesheet" href="stylet.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>
<body>
    <?php 
                          echo"<script>
                          Swal.fire({
                              position: 'top-center',
                              icon: 'success',
                              title: 'เข้าสู่ระบบสำเร็จ :: ADMIN',
                              showConfirmButton: false,
                              timer: 1500
                            })
                          </script>";
    ?>
    <?php 
    error_reporting(E_ALL ^ E_NOTICE);  
      if (isset($_SESSION['admin_login'])) {
          $admin_id = $_SESSION['admin_login'];
          $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    ?>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">CSTUDIO</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="index.html">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">จัดการข้อมูล</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">จัดการข้อมูล</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">จัดการข้อมูล</a></li>
          <li><a href="manage_user.php">ข้อมูลผู้ใช้</a></li>
          <li><a href="#">ระดับ</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">จัดการสินค้า</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">จัดการสินค้า</a></li>
          <li><a href="#">VPS</a></li>
          <li><a href="#">DDC</a></li>
          <li><a href="#">DOMAIN</a></li>
          <li><a href="#">CLOUDS</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="manage.html">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="image/profile.jpg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">ชื่อผู้ใช้ : <?php echo $row['firstname']?></h3></div>
        <div class="job">ระดับ : <?php echo $row['urole']?></div>
        <div class="job">Point : <?php echo $row['amount']?> Point</div>
      </div>
      <a href="logout.php"><i class='bx bx-log-out' ></i></a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <?php 
    $result1 = $conn->query("SELECT * FROM users");
    if ($result1 !== false) {
  
      while($row2 = $result1->fetch()) {
      }
  }
    ?>
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="container text-center p-3">
      <h2 class="m-1">บัญชีทั้งหมดในฐานข้อมูล</h2>
      <div class="card-group m-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center m-3">ผู้ใช้ : <?php echo $result1->rowCount()?> คน</h5>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">อัพเดทล่าสุดเมื่อ 3 นาทีที่แล้ว</small>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center m-3">ผู้แก้ไข : NULL คน</h5>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">อัพเดทล่าสุดเมื่อ 3 นาทีที่แล้ว</small>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center m-3">แอดมิน : NULL คน</h5>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">อัพเดทล่าสุดเมื่อ 3 นาทีที่แล้ว</small>
          </div>
        </div>
      </div>
    </div>

    <div class="container text-center p-3">
      <h2 class="m-1">ออเดอร์ในฐานข้อมูล</h2>
      <div class="card-group m-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center m-3">Clouds : 80 Item</h5>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">อัพเดทล่าสุดเมื่อ 3 นาทีที่แล้ว</small>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center m-3">DDC : 90 Item</h5>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">อัพเดทล่าสุดเมื่อ 3 นาทีที่แล้ว</small>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center m-3">Domain : 90 Item</h5>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">อัพเดทล่าสุดเมื่อ 3 นาทีที่แล้ว</small>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center m-3">แอดมิน : 5 คน</h5>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">อัพเดทล่าสุดเมื่อ 3 นาทีที่แล้ว</small>
          </div>
        </div>
      </div>
    </div>

    <div class="container text-center p-3">
      <h2 class="m-1">บัญชีทั้งหมดในฐานข้อมูล</h2>
      <div class="card-group m-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center m-3">ผู้ใช้ : 80 คน</h5>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">อัพเดทล่าสุดเมื่อ 3 นาทีที่แล้ว</small>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center m-3">ผู้แก้ไข : 90 คน</h5>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">อัพเดทล่าสุดเมื่อ 3 นาทีที่แล้ว</small>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center m-3">แอดมิน : 5 คน</h5>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">อัพเดทล่าสุดเมื่อ 3 นาทีที่แล้ว</small>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="script.js"></script>

</body>
</html>
