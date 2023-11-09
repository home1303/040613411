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
      <i class='bx bx-menu' style='color:#ffffff'></i>
      <span class="text" style='color:#ffffff'>Clouds Server</span>
    </div>

<!-- Tab Content Start -->
<div class="p-4">
<div class="container">
  <div class="card text-center" style="width: auto;">
    <div class="card-body shadow-lg">
      <br>
            <h1 class="text-center">Cloud Server</h1>
             <h3 class="text-left"> เลือกแพคเกจ <small class="text-muted">(Package plan)</small></h3>
      <br>
        <hr>
        <br>
         <!-----------------    กรอบสี่เหลี่ยม    ------------------>
        <div class="row mt-3 mb-2">             
 
        <?php

          $result = $conn->query("SELECT * FROM package_plan_clouds");
          if ($result !== false) {
          while($item = $result->fetch()) {


        ?>  
      <div class="col-6 col-md-6 col-lg-3">
        <div class="card box-shadow mb-4">
            <h1 class="text-center"></h1>
            <div class="card-body text-ceenter shadow">
                <h4 class="card-title text-center">SSD-WINDOWS-<?php echo $item['pack_clouds_id'] ?>
                    <div class="font10 text-muted">SSD Storage</div>
                </h4>
                <hr>
                <div class="my-3 text-center col-12 col-md-12 mx-auto">
                    <div class="pb-2"> <b><?php echo $item['clouds_pack_core'] ?></b> vCore </div>
                    <div class="pb-2"> <b><?php echo $item['clouds_pack_memory'] ?> GB</b> Memory </div>
                    <div class="pb-2"> <b><?php echo $item['clouds_pack_storage'] ?> GB </b> SSD Disk </div>
                </div>
                <hr>
                <div class="my-3 text-center col-12 col-md-12 mx-auto">
                    <h4 class="text-danger font-weight-bold  text-center"><?php echo $item['clouds_pack_price'] ?> THB<small class="text-muted font12">/ต่อเดือน</small></h4>
                    <h5 class="text-danger font-weight-bold  text-center"><?php echo $item['clouds_pack_price_d'] ?> THB<small class="text-muted font12">/ต่อวัน</small></h5>
                    <h6 class="text-danger font-weight-bold  text-center"><?php echo $item['clouds_pack_price_y'] ?> THB<small class="text-muted font12">/ต่อปี</small></h6> 
                </div>
                <div class="mt-3">
                    <a href="order_clouds.php?item=<?= $item['pack_clouds_id']; ?>" class="btn btn-success w-100 p- fw-bold">Rent</a>
                </div>
            </div>
        </div>
    </div>
    <!-----------------    กรอบสี่เหลี่ยม    ------------------>
    <?php } 
             } ?>
                         
            
    

        </div>
    </div> 
  </div> 
</div>                 
<!-- Tab Content End -->




</section>
  
<script src="script.js"></script>

</body>
</html>