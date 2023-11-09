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

    <script>
    var httpRequest;
    function send(){
      httpRequest = new XMLHttpRequest();
      httpRequest.onreadystatechange = showResult;

      var search_ram = document.getElementById("search_ram").value;
      var search_core = document.getElementById("search_core").value;

      var url = "search.php?search_ram=" + search_ram +"&search_core="+ search_core;

      httpRequest.open("GET", url);
      httpRequest.send();
    }

    function showResult(){
      if(httpRequest.readyState == 4 && httpRequest.status == 200){
        document.getElementById("result").innerHTML = httpRequest.responseText;
      }
    }
    </script>
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
      <i class='bx bx-menu' style='color:#ffffff'  ></i>
      <span class="text" style='color:#ffffff' >VPS AUTO</span>
    </div>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/test.png" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>

  <div class="p-4"></div>


<!--Cloud Server คลาวด์เซิฟเวอร์-->
  <div class="container">
    <div class="card" style="width: auto;">
      <div class="card-body shadow-lg">
<!--Cloud Server คลาวด์เซิฟเวอร์-->
    <!-- Tab Header Start -->  
    <div class="container">
    <p class="card-text h5">Search</p>
    <div class="d-flex align-items-center">
        <div class="form-floating m-3">
            <input type="text" class="form-control" id="search_ram" placeholder="text" style="width: 200px; height: 50px;">
            <label for="search_ram" style="font-size: 12px;">ระบุ Ram ที่ต้องการ</label>
        </div>
        <div class="form-floating m-3">
            <input type="text" class="form-control" id="search_core" placeholder="text" onkeyup="send()" style="width: 200px; height: 50px;">
            <label for="search_core" style="font-size: 12px;">ระบุ Core ที่ต้องการ</label>
        </div>
    </div>

    <span id="result"></span>
      <div class="row align-items-center justify-content-center">
        <center><h2 class="pb-2">VPS Auto <small> วีพีเอสส่วนตัวติดตั้งอัตโนมัติ</small></h2></center>
          <div class="col-md-6">
              <ul class="nav nav-pills nav-justified border rounded-pill" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                      <button class="nav-link active rounded-pill" id="Windows-tap" data-bs-toggle="pill" data-bs-target="#SSD1" type="button" role="tab" aria-controls="SSD1" aria-selected="true">SSD</button>
                  </li>
              </ul>
          </div>
        </div>
    </div>
  <!-- Tab Header End -->

<!-- Tab Content Start -->
  <div class="container">
      <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade active show" id="Windows" role="tabpanel" aria-labelledby="SSD1-tab">
            <br />
            <div class="row row-cols-1 row-cols-md-4 mb-3 text-center">
            <?php
                $result = $conn->query("SELECT * FROM package_plan_vps");
                if ($result !== false) {
                while($item = $result->fetch()) {
            ?>
              <!-----------------    กรอบสี่เหลี่ยม    ------------------> 
              <div class="col-6 col-md-6 col-lg-3">
                <div class="card box-shadow mb-4">
                    <div class="card-body text-center">
                        <i class='bx bxl-windows h1'></i>
                        <i class='bx bxl-tux h1' ></i>
                        <h4 class="card-title"><?php echo $item['vps_pack_name'] ?> #<?php echo $item['pack_vps_id'] ?></h4>
                        <div class="my-3 text-left col-12 col-md-8 mx-auto">
                          <p class="card-text h5" style='color:rgba(165, 165, 165, 0.842)'><i class="bx bxs-microchip"></i> <?php echo $item['vps_pack_core'] ?> vCPU</p>
                          <p class="card-text h5" style='color:rgba(165, 165, 165, 0.842)'><i class="bx bxs-memory-card"></i> RAM <?php echo $item['vps_pack_memory'] ?> GB</p>
                          <p class="card-text h5" style='color:rgba(165, 165, 165, 0.842)'><i class="bx bxs-hdd"></i> SSD <?php echo $item['vps_pack_storage'] ?> GB</p>
                          <p class="card-text h5" style='color:rgba(165, 165, 165, 0.842)'>Windows, Linux OS</p>
                          <p class="card-text h5" style='color:rgba(165, 165, 165, 0.842)'>Unlimited Bandwidth</p>
                        </div>
                        <div class="my-2">
                          <p class="card-text h4 fw-bold"><?php echo number_format( $item['vps_pack_price'], 2 ) ?> ฿</p>
                          <p class="card-text text-muted"><?php echo number_format( $item['vps_pack_price_d'], 2 ) ?>฿/day | <?php echo number_format( $item['vps_pack_price_y'], 2 ) ?>฿/yearly</p>
                        </div>
                        <div class="mt-3">
                        <a href="oder.php?item=<?= $item['pack_vps_id']; ?>" class="btn btn-success w-100 p- fw-bold">Rent VPS</a>
                        </div>
                    </div>
                </div>
              </div> 
              <?php } 
                    } ?>
              <!-----------------    กรอบสี่เหลี่ยม    ------------------>

            </div>                
          </div>
      </div>
  </div>
<!-- Tab Content End -->



<div class="p-4"></div>

<!-- Tab Content End -->

<div class="p-3"></div>
</section> 
    <script src="script.js"></script>

</body>
</html>
