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
    if (isset($_GET['item'])) {
      $item = $_GET['item'];
      $stmt = $conn->query("SELECT * FROM package_plan_vps WHERE pack_vps_id = $item");
      $stmt->execute();
      $data = $stmt->fetch();
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
          <li><a class="link_name" href="Hosting.html">Hosting</a></li>
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
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' style="color: #ffff;"></i>
      <span class="text" style="color: #ffff;">Dedicated Server</span>
    </div>
<!-----------------------------Dedicated Server------------------------------------> 
<div class="container px-4 py-5" id="icon-grid">
  <h1 class="text-uppercase text-center mb-3">DEDICATED<small class="font50per">เช่าเซิฟเวอร์ส่วนตัว (ระบบอัตโนมัติ)</small></h1>
  
  <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm">
        
        <div class="card-body">
          <h1 class="card-title pricing-card-title"><small class="text-muted fw-light"></small></h1>
          <ul class="list-unstyled mt-3 mb-4">
          <div class="pb-4">
            <h1><i class="bi bi-speedometer2"></i></h1>
          </div>
            <h2>INSTANT FAST DEPLOY</h2>
            <h5>ระบบติดตั้งด้วยระบบอัตโนมัติ, ได้รับเครื่องภายใน 5 นาทีทันที</h5>
            <h6>เมื่อสั่งซื้อสำเร็จระบบจะใช้เวลาติดตั้งและจัดส่งข้อมูลการใช้งานให้กับคุณทันที</h6>
          </ul>
          
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm">
        
        <div class="card-body">
          <h1 class="card-title pricing-card-title"><small class="text-muted fw-light"></small></h1>
          <ul class="list-unstyled mt-3 mb-4">
          <div class="pb-4">
            <h1><i class="bi bi-cursor-fill"></i></h1>
          </div>
            <h2>CONTROL YOUR SELF</h2>
            <h5>ควบคุมได้เองทุกอย่าง สั่งเปิด-ปิด สั่งติดตั้ง OS ใหม่ได้ด้วยตัวเองตลอดเวลา</h5>
            <h6>ควบคุมเซิฟเวอร์ส่วนตัวของคุณได้เองผ่านทางหน้าเว็บไซต์ รวมถึงติดตั้ง OS ใหม่ได้เอง</h6>
          </ul>
          
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm">
        
        <div class="card-body">
          <h1 class="card-title pricing-card-title"><small class="text-muted fw-light"></small></h1>
          <ul class="list-unstyled mt-3 mb-4">
          <div class="pb-4">
            <h1><i class="bi bi-shield-lock"></i></h1>
          </div>
            <h2>FIREWALL PROTECTION</h2>
            <h5>ระบบป้องกันด้วย CSNE Firewall ที่ทรงพลังมากกว่าเดิม</h5>
            <h6>สามารถเลือกป้องกันพิเศษสำหรับ Game Firewall ได้เช่น FiveM, TS3, SAMP, Minecraft</h6>
          </ul>
          
        </div>
      </div>
    </div>
  </div>
<!----------------------------Dedicated------------------------------------------->
<h1 class="text-uppercase text-center mb-3">Dedicated <b class="text-warning">Game</b> Server <p class="fs-5">เซิร์ฟเวอร์หรับเกม(Enterprise server)</p></h1>
<table class="table table-bordered">
  <thead class="table table-dark">
      <tr>
        <th class="text-center align-middle">CPU Model<div class="text-muted" style="font-size:0.8rem">รุ่นของซีพียู</div></th>
        <th class="text-center align-middle">Memory<div class="text-muted" style="font-size:0.8rem">หน่วยความจำ</div></th>
        <th class="text-center align-middle">Storage<div class="text-muted" style="font-size:0.8rem">พื้นที่เก็บข้อมูล</div></th>
        <th class="text-center align-middle">OS<div class="text-muted" style="font-size:0.8rem">ระบบปฏิบัติการ</div></th>
        <th class="text-center align-middle">Price/M<div class="text-muted" style="font-size:0.8rem">ราคารายเดือน</div></th>
        <th class="text-center align-middle">Price/Y<div class="text-muted" style="font-size:0.8rem">ราคารายปี</div></th>
        <th class="text-center align-middle">Order<div class="text-muted" style="font-size:0.8rem">คำสั่ง</div></th></th>
      </tr>
  </thead>
  <tbody>
  <?php
                $result = $conn->query("SELECT * FROM package_plan_ddc");
                if ($result !== false) {
                while($item = $result->fetch()) {
                  if($item['ddc_cpu_type'] == 'INTEL'){
                    $Text_color = 'text-primary';
                  }
                  else if($item['ddc_cpu_type'] == 'AMD')
                  {
                    $Text_color = 'text-danger';
                  }
            ?>    
      <tr>
          <td class="text-center align-middle"><span class="<?php echo $Text_color ?>"><?php echo $item['ddc_cpu_type'] ?></span> <?php echo $item['ddc_dis_name'] ?><div class="font10 text-muted">[Turbo <?php echo $item['ddc_cpu_turbo'] ?> GHz] <?php echo $item['ddc_pack_core'] ?> Core / <?php echo $item['ddc_pack_thread'] ?> Thread</div><div class="pt-1 text-muted" style="font-size:0.6rem">CPU Score: <?php echo $item['ddc_cpu_score'] ?></div></td>
          <td class="text-center align-middle">DDR<?php echo $item['ddc_pack_ddr'] ?> <?php echo $item['ddc_pack_memory'] ?> GB<div class="text-muted" style="font-size:0.7rem">(Speed 2666 MHz)</div></td>
          <td class="text-center align-middle">M.2 NVMe <?php echo $item['ddc_pack_storage'] ?> GB<div class="text-muted" style="font-size:0.7rem">(Read 2,400 MB/s | Write 1,000 MB/s)</div></td>
          <td class="text-center align-middle"><i class='bx bxl-windows'></i>    <i class="fa fa-linux"></i></td>
          <td class="text-center align-middle"><?php echo number_format( $item['ddc_pack_price'] , 2 ) ?> THB</td>
          <td class="text-center align-middle"><?php echo number_format( $item['ddc_pack_price_y'] , 2 ) ?> THB</td>
          <td class="text-center align-middle"><a href="oder_ddc.php?item=<?= $item['pack_ddc_id']; ?>" class="btn btn-block btn-success">เช่า</a></td>          
      </tr>
      <?php } 
                    } ?>
  </tbody>
</table>

</section> 
    <script src="script.js"></script>

</body>
</html>
