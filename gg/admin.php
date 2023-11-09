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
      <span class="logo_name">InwCode</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="admin.php">
          <i class='bx bxs-dashboard'></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="admin.php">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-plus-circle'></i>
            <span class="link_name">Product</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="admin_products.php">Order</a></li>
          <li><a href="admin_products.php">Manager</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-plus-circle'></i>
            <span class="link_name">OS</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="admin_os.php">Operating System</a></li>
          <li><a href="admin_os.php">Operating System</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-user-detail'></i>
            <span class="link_name">MServer</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="admin_manage_oder.php">ManageServerUser</a></li>
          <li><a href="admin_manage_oder.php">Manager</a></li>
          <li><a href="admin_manage_hosting_1.php">Manager Host</a></li>
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
          <li><a class="link_name" href="admin_manage_users.php">Setting</a></li>
          <li><a href="admin_manage_users.php">Users Manager</a></li>
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
      <span class="text" style='color:#ffffff' >Dashboard</span>
    </div>

    <!-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/image/setting.png" class="d-block w-100" alt="...">
        </div>
      </div>
    </div> -->

  <div class="p-4">
    
  </div>
  <?php
      require_once 'config/db.php';
      $sql = "SELECT COUNT(*) FROM oder_item";
      $res = $conn->query($sql);
      $count = $res->fetchColumn();
    ?>
  <?php
      require_once 'config/db.php';
      $sql = "SELECT COUNT(*) FROM users";
      $res1 = $conn->query($sql);
      $count1 = $res1->fetchColumn();
    ?>
  <?php
      require_once 'config/db.php';
      $sql = "SELECT COUNT(*) FROM package_plan_vps";
      $res2 = $conn->query($sql);
      $count2 = $res2->fetchColumn();
    ?>
  <?php
      require_once 'config/db.php';
      $sql = "SELECT COUNT(*) FROM package_plan_ddc";
      $res3 = $conn->query($sql);
      $count3 = $res3->fetchColumn();
    ?>
  <?php
      require_once 'config/db.php';
      $sql = "SELECT COUNT(*) FROM package_plan_clouds";
      $res4 = $conn->query($sql);
      $count4 = $res4->fetchColumn();
  ?>
  <?php
      require_once 'config/db.php';
      $sql = "SELECT COUNT(*) FROM package_plan_domain";
      $res5 = $conn->query($sql);
      $count5 = $res5->fetchColumn();
  ?>
  <center><div class="container">
    <div class="card">
      <div class="card-body shadow-lg">
        <!----------------------------Dedicated------------------------------------------->
        <h1 class="text-uppercase text-center mb-2">ADMIN PANEL 📋<p class="fs-5">แสดงข้อมูลต่างๆใน DATABASE </p></h1>

        <div class="row row-cols-1 row-cols-md-3 g-4 m-3">
          <div class="col">
            <div class="card h-100">
              <div class="card-body shadow-sm text-center">
                <p class="card-text h3">USER</p>
                <p class="card-text h3"><span class="badge bg-danger p-2 rounded-pill"><?php echo number_format( $count1 ) ?></p>
                <p class="card-text h5">จำนวนผู้ใช้ทั้งหมด</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-body shadow-sm text-center">
                <p class="card-text h3">ODER</p>
                <p class="card-text h3"><span class="badge bg-primary p-2 rounded-pill"><?php echo number_format( $count ) ?></p>
                <p class="card-text h5">จำนวนสินค้าทั้งหมด</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-body shadow-sm text-center">
                <p class="card-text h3">CLOUDS</p>
                <p class="card-text h3"><span class="badge bg-success p-2 rounded-pill"><?php echo number_format( $count4 ) ?></span></p>
                <p class="card-text h5">จำนวนคลาวด์ทั้งหมด</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card h-100">
              <div class="card-body shadow-sm text-center">
                <p class="card-text h3">VPS</p>
                <p class="card-text h3"><span class="badge bg-danger p-2 rounded-pill"><?php echo number_format( $count2 ) ?></p>
                <p class="card-text h5">จำนวน VPS ทั้งหมด</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-body shadow-sm text-center">
                <p class="card-text h3">DDC</p>
                <p class="card-text h3"><span class="badge bg-primary p-2 rounded-pill"><?php echo number_format( $count3 ) ?></p>
                <p class="card-text h5">จำนวน DDC ทั้งหมด</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-body shadow-sm text-center">
                <p class="card-text h3">DOMAIN</p>
                <p class="card-text h3"><span class="badge bg-success p-2 rounded-pill"><?php echo number_format( $count5 ) ?></span></p>
                <p class="card-text h5">จำนวน DOMAIN ทั้งหมด</p>
              </div>
            </div>
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
