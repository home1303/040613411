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
          <li><a href="Co_location.php">Co-location</a></li>
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
      <span class="text" style='color:#ffffff' >Sever Manage</span>
    </div>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/promo_1.png" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>

  <div class="p-4">
    
  </div>
  <div class="container">
    <div class="card text-center" style="width: auto;">
      <div class="card-body shadow-lg">
        <!----------------------------Dedicated------------------------------------------->
        <h1 class="text-uppercase text-center mb-3">vps server Manage <p class="fs-5">จัดการเซิร์ฟของคุณ </p></h1>
        <table class="table table-bordered">
          <thead class="table table-dark">
              <tr>
                <th class="text-center align-middle">Package<div class="text-muted" style="font-size:0.8rem">แพ็คที่</div></th>
                <th class="text-center align-middle">Name<div class="text-muted" style="font-size:0.8rem">ชื่อเครื่อง</div></th>
                <th class="text-center align-middle">Method<div class="text-muted" style="font-size:0.8rem">กระบวนการ</div></th>
                <th class="text-center align-middle">Payment details<div class="text-muted" style="font-size:0.8rem">รายละเอียดการจ่ายเงิน</div></th>
                <th class="text-center align-middle">เริ่มเช่า<div class="text-muted" style="font-size:0.8rem">วันที่เริ่มเช่า</div></th>
                <th class="text-center align-middle">ครบกำหนด<div class="text-muted" style="font-size:0.8rem">วันที่สิ้นสุด</div></th>
                <th class="text-center align-middle">Action<div class="text-muted" style="font-size:0.8rem">ปุ่มทำงานต่างๆ</div></th>
              </tr>
          </thead>
          <tbody>
          <?php
            $user_email = $row['email'];
            $result1 = $conn->query("SELECT * FROM oder_item JOIN package_plan_vps ON oder_item.oder_package_id = package_plan_vps.pack_vps_id WHERE oder_email = '$user_email'");
            if ($result1 !== false) {
            while($item1 = $result1->fetch()) {
              if($item1['oder_status'] == 'กำลังติดตั้ง'){
                $bk_color = 'bg-warning';
                $role_button = 'disabled';
              }
              elseif($item1['oder_status'] == 'ไม่พร้อมใช้งาน'){
                $bk_color = 'bg-danger';
                $role_button = 'disabled';
              }
              elseif($item1['oder_status'] == 'พร้อมใช้งาน'){
                $bk_color = 'bg-success';
                $role_button = '';
              }
          ?>
              <tr> 
                <td class="text-center align-middle" name="pack_id" value="<?php echo $item1['oder_package_id'] ?>"><?php echo $item1['oder_package_id'] ?></td>
                <td class="text-center align-middle"><?php echo $item1['oder_package_type'] ?><div class="text-muted" style="font-size:0.7rem"><?php echo $item1['oder_package_type'] ?></div></td>
                <td class="text-center align-middle"><span class="badge <?php echo $bk_color ?> p-2 rounded-pill"><?php echo $item1['oder_status'] ?></span></td>
                <td class="text-center align-middle">ติดตั้งเครื่องเซิฟเวอร์ Package <?php echo $item1['oder_package_id'] ?><div class="text-muted" style="font-size:0.7rem"><?php echo $item1['vps_pack_core'] ?>C | <?php echo $item1['vps_pack_memory'] ?> GB | <?php echo $item1['vps_pack_storage'] ?> GB</div></td>
                <td class="text-center align-middle"><i class='bx bxs-calendar'></i> : <i class='bx bxs-time'></i><div class="text-muted" style="font-size:0.7rem"> <?php echo $item1['oder_time_start'] ?></div></td>
                <td class="text-center align-middle"><i class='bx bxs-calendar'></i> : <i class='bx bxs-time'></i><div class="text-muted" style="font-size:0.7rem"> <?php echo $item1['oder_time_end'] ?></div></td>
                <td class="text-center align-middle"><a href="server_manager_data.php?item=<?= $item1['oder_ip']; ?>&id1=<?= $item1['oder_package_id']; ?>" class="btn btn-outline-primary <?php echo $role_button ?>">จัดการ</button></a></td>
            </tr>
            <?php } 
             } ?>
          </tbody>
        </table>
        <div class="text-muted" style="font-size:1rem"><?php echo 'คุณมีเซิร์ฟเวอร์ VPS '.$result1->rowCount()." ตัว"; ?></div>
      </div>
    </div>
  </div>

  <div class="p-3"></div>

  <div class="container">
    <div class="card text-center" style="width: auto;">
      <div class="card-body shadow-lg">
        <!----------------------------Dedicated------------------------------------------->
        <h1 class="text-uppercase text-center mb-3">ddc server Manage <p class="fs-5">จัดการ DDC </p></h1>
        <table class="table table-bordered">
          <thead class="table table-dark">
              <tr>
                <th class="text-center align-middle">Package<div class="text-muted" style="font-size:0.8rem">แพ็คที่</div></th>
                <th class="text-center align-middle">Name<div class="text-muted" style="font-size:0.8rem">ชื่อเครื่อง</div></th>
                <th class="text-center align-middle">Method<div class="text-muted" style="font-size:0.8rem">กระบวนการ</div></th>
                <th class="text-center align-middle">Payment details<div class="text-muted" style="font-size:0.8rem">รายละเอียดการจ่ายเงิน</div></th>
                <th class="text-center align-middle">เริ่มเช่า<div class="text-muted" style="font-size:0.8rem">วันที่เริ่มเช่า</div></th>
                <th class="text-center align-middle">ครบกำหนด<div class="text-muted" style="font-size:0.8rem">วันที่สิ้นสุด</div></th>
                <th class="text-center align-middle">Action<div class="text-muted" style="font-size:0.8rem">ปุ่มทำงานต่างๆ</div></th>
              </tr>
          </thead>
          <tbody>
          <?php
            $user_email = $row['email'];
            $result1 = $conn->query("SELECT * FROM oder_item JOIN package_plan_ddc ON oder_item.oder_package_id = package_plan_ddc.pack_ddc_id WHERE oder_email = '$user_email'");
            if ($result1 !== false) {
            while($item1 = $result1->fetch()) {
              if($item1['oder_status'] == 'กำลังติดตั้ง'){
                $bk_color = 'bg-warning';
                $role_button = 'disabled';
              }
              elseif($item1['oder_status'] == 'ไม่พร้อมใช้งาน'){
                $bk_color = 'bg-danger';
                $role_button = 'disabled';
              }
              elseif($item1['oder_status'] == 'พร้อมใช้งาน'){
                $bk_color = 'bg-success';
                $role_button = '';
              }
          ?>
              <tr>
                <td class="text-center align-middle" name="pack_id" value="<?php echo $item1['oder_package_id'] ?>"><?php echo $item1['oder_package_id'] ?></td>
                <td class="text-center align-middle"><?php echo $item1['oder_package_type'] ?><div class="text-muted" style="font-size:0.7rem"><?php echo $item1['oder_package_type'] ?></div></td>
                <td class="text-center align-middle"><span class="badge <?php echo $bk_color ?> p-2 rounded-pill"><?php echo $item1['oder_status'] ?></span></td>
                <td class="text-center align-middle">ติดตั้งเครื่องเซิฟเวอร์ Package <?php echo $item1['oder_package_id'] ?><div class="text-muted" style="font-size:0.7rem"><?php echo $item1['ddc_pack_core'] ?>C | <?php echo $item1['ddc_pack_memory'] ?> GB | <?php echo $item1['ddc_pack_storage'] ?> GB</div></td>
                <td class="text-center align-middle"><i class='bx bxs-calendar'></i> : <i class='bx bxs-time'></i><div class="text-muted" style="font-size:0.7rem"> <?php echo $item1['oder_time_start'] ?></div></td>
                <td class="text-center align-middle"><i class='bx bxs-calendar'></i> : <i class='bx bxs-time'></i><div class="text-muted" style="font-size:0.7rem"> <?php echo $item1['oder_time_end'] ?></div></td>
                <td class="text-center align-middle"><a href="server_manager_data_ddc.php?item=<?= $item1['oder_ip']; ?>" class="btn btn-outline-primary <?php echo $role_button ?> ?id1=<?= $item1['oder_package_id']; ?>">จัดการ</button></a></td>
            </tr>
            <?php } 
             } ?>
          </tbody>
        </table>
        <div class="text-muted" style="font-size:1rem"><?php echo 'คุณมีเซิร์ฟเวอร์ DDC '.$result1->rowCount()." ตัว"; ?></div>
      </div>
    </div>
  </div>

  <div class="p-3">

  </div>
  <div class="container">
    <div class="card text-center" style="width: auto;">
      <div class="card-body shadow-lg">
        <!----------------------------Dedicated------------------------------------------->
        <h1 class="text-uppercase text-center mb-3">DOMAIN Manage<p class="fs-5">จัดการ Domain </p></h1>
        <table class="table table-bordered">
          <thead class="table table-dark">
              <tr>
                <th class="text-center align-middle">Package<div class="text-muted" style="font-size:0.8rem">แพ็คที่</div></th>
                <th class="text-center align-middle">Name<div class="text-muted" style="font-size:0.8rem">ชื่อเครื่อง</div></th>
                <th class="text-center align-middle">Method<div class="text-muted" style="font-size:0.8rem">กระบวนการ</div></th>
                <th class="text-center align-middle">Payment details<div class="text-muted" style="font-size:0.8rem">รายละเอียดการจ่ายเงิน</div></th>
                <th class="text-center align-middle">เริ่มเช่า<div class="text-muted" style="font-size:0.8rem">วันที่เริ่มเช่า</div></th>
                <th class="text-center align-middle">ครบกำหนด<div class="text-muted" style="font-size:0.8rem">วันที่สิ้นสุด</div></th>
                <th class="text-center align-middle">Action<div class="text-muted" style="font-size:0.8rem">ปุ่มทำงานต่างๆ</div></th>
              </tr>
          </thead>
          <tbody>
<?php
            $user_email = $row['email'];
            $result1 = $conn->query("SELECT * FROM oder_domain JOIN package_plan_domain ON oder_domain.oder_domain_id = package_plan_domain.pack_domain_id WHERE oder_domain_email = '$user_email'");
            if ($result1 !== false) {
            while($item1 = $result1->fetch()) {
              if($item1['oder_domain_status'] == 'กำลังติดตั้ง'){
                $bk_color = 'bg-warning';
                $role_button = 'disabled';
              }
              elseif($item1['oder_domain_status'] == 'ไม่พร้อมใช้งาน'){
                $bk_color = 'bg-danger';
                $role_button = 'disabled';
              }
              elseif($item1['oder_domain_status'] == 'พร้อมใช้งาน'){
                $bk_color = 'bg-success';
                $role_button = '';
              }
          ?>
          <tr>
                <td class="text-center align-middle" name="pack_id" value="<?php echo $item1['oder_domain_id'] ?>"><?php echo $item1['oder_domain_id'] ?></td>
                <td class="text-center align-middle"><?php echo $item1['oder_domain_type'] ?><div class="text-muted" style="font-size:0.7rem"><?php echo $item1['oder_domain_type'] ?></div></td>
                <td class="text-center align-middle"><span class="badge <?php echo $bk_color ?> p-2 rounded-pill"><?php echo $item1['oder_domain_status'] ?></span></td>
                <td class="text-center align-middle">ติดตั้งเครื่องเซิฟเวอร์ Package <?php echo $item1['oder_domain_id'] ?></td>
                <td class="text-center align-middle"><i class='bx bxs-calendar'></i> : <i class='bx bxs-time'></i><div class="text-muted" style="font-size:0.7rem"> <?php echo $item1['oder_domain_start'] ?></div></td>
                <td class="text-center align-middle"><i class='bx bxs-calendar'></i> : <i class='bx bxs-time'></i><div class="text-muted" style="font-size:0.7rem"> <?php echo $item1['oder_domain_end'] ?></div></td>
                <td class="text-center align-middle">
                  <a href="server_manager_data_domain.php?item=<?= $item1['oder_domain_lastname']; ?>" class="btn btn-outline-primary <?php echo $role_button ?>">จัดการ</button></a>
                </td>
            </tr>
            <?php } 
             } ?>
          </tbody>
        </table>
        <div class="text-muted" style="font-size:1rem"><?php echo 'คุณมี Domain '.$result1->rowCount()." ตัว"; ?></div>
      </div>
    </div>
  </div>

  <div class="p-3"></div>
</section> 
    <script src="script.js"></script>

</body>
</html>
