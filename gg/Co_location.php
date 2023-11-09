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
      <i class='bx bx-menu'  style="color: white;" ></i>
      <span class="text " style="color: white;">Co-Location</span>
    </div>
  
    <div class="container">
      <div class="card text-center" style="width: auto;">
        <div class="card-body shadow-lg">
          <br>
          <!----------------------------Dedicated------------------------------------------->
          <h1 class="text-uppercase text-center mb-3">CO-LOCATION <p class="fs-5">วางเซิฟเวอร์ส่วนตัว </p></h1>
          <br>
          <table class="table table-bordered">
            <thead class="table table-dark">
                <tr>
                  <th class="table-dark text-center align-middle">Size Rack</th>
                    <th class="text-center align-middle">Data Center</th>
                    <th class="text-center align-middle">Network</th>
                    <th class="text-center align-middle">Data transfer</th>
                    <th class="text-center align-middle">IP Address</th>
                    <th class="text-center align-middle"><i class='bx bxs-hot' undefined ></i> Firewall</th>
                    <th class="text-center align-middle">Price</th>
                    <th class="text-center align-middle">Co-location</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <th class="table-secondary text-center align-middle">1U Rack</th>
                  <td class="text-center align-middle">CSLoxinfo @ The Cloud<div class="text-muted" style="font-size:0.7rem">หากไฟเกิน 0.5 A +500 THB</div></td>
                  <td class="text-center align-middle">Port 1 Gbps<div class="text-muted" style="font-size:0.7rem">(Guarantee 200 Mbps)</div></td>
                  <td class="text-center align-middle">Unlimited transfer<div class="text-muted" style="font-size:0.7rem">Inter 10/10 Mbps per IP</div></td>
                  <td class="text-center align-middle">1 IP (Public)</td>
                  <td class="text-center align-middle"><i class='bx bxs-hot' undefined ></i> FREE : Firewall<div class="text-muted" style="font-size:0.7rem">ป้องกันยิงทุกรูปแบบ โดนยิงแล้วดับคืนเงิน</div></td>
                  <td class="text-center align-middle"><span class="text-primary">2,000.00 THB</span>/monthly</td>
                  <td class="text-center align-middle"><a class="btn btn-block btn-outline-primary" target="_blank" href="https://discord.gg/X9Q9aY99"><i class="fa fa-phone-square"></i> Contact</a></td>      
                </tr>
                <tr>
                  <th class="table-secondary text-center align-middle">2U Rack</th>
                    <td class="text-center align-middle">CSLoxinfo @ The Cloud<div class="text-muted" style="font-size:0.7rem">หากไฟเกิน 0.5 A +500 THB</div></td>
                    <td class="text-center align-middle">Port 1 Gbps<div class="text-muted" style="font-size:0.7rem">(Guarantee 200 Mbps)</div></td>
                    <td class="text-center align-middle">Unlimited transfer<div class="text-muted" style="font-size:0.7rem">Inter 10/10 Mbps per IP</div></td>
                    <td class="text-center align-middle">1 IP (Public)</td>
                    <td class="text-center align-middle"><i class='bx bxs-hot' undefined ></i> FREE : Firewall<div class="text-muted" style="font-size:0.7rem">ป้องกันยิงทุกรูปแบบ โดนยิงแล้วดับคืนเงิน</div></td>
                    <td class="text-center align-middle"><span class="text-primary">3,500.00 THB</span>/monthly</td>
                    <td class="text-center align-middle"><a class="btn btn-block btn-outline-primary" target="_blank"  href="https://discord.gg/X9Q9aY99"><i class="fa fa-phone-square"></i> Contact</a></td>
                </tr>
                <tr>
                  <th class="table-secondary text-center align-middle">4U Rack</th>
                  <td class="text-center align-middle">CSLoxinfo @ The Cloud<div class="text-muted" style="font-size:0.7rem">หากไฟเกิน 0.5 A +500 THB</div></td>
                  <td class="text-center align-middle">Port 1 Gbps<div class="text-muted" style="font-size:0.7rem">(Guarantee 200 Mbps)</div></td>
                  <td class="text-center align-middle">Unlimited transfer<div class="text-muted" style="font-size:0.7rem">Inter 10/10 Mbps per IP</div></td>
                  <td class="text-center align-middle">1 IP (Public)</td>
                  <td class="text-center align-middle"><i class='bx bxs-hot' undefined ></i> FREE : Firewall<div class="text-muted" style="font-size:0.7rem">ป้องกันยิงทุกรูปแบบ โดนยิงแล้วดับคืนเงิน</div></td>
                  <td class="text-center align-middle"><span class="text-primary">6,500.00 THB</span>/monthly</td>
                  <td class="text-center align-middle"><a class="btn btn-block btn-outline-primary" target="_blank"  href="https://discord.gg/X9Q9aY99"><i class="fa fa-phone-square"></i> Contact</a></td>           
              </tr>
              <tr>
                <th class="table-secondary text-center align-middle">1/4 Rack (10U)</th>
                <td class="text-center align-middle">CSLoxinfo @ The Cloud<div class="text-muted" style="font-size:0.7rem">4 A ทำสัญญาเช่า 12 เดือน / ราคาตู้พร้อมใช้งาน</div></td>
                <td class="text-center align-middle">Port 1 Gbps<div class="text-muted" style="font-size:0.7rem">(Share)</div></td>
                <td class="text-center align-middle">Unlimited transfer<div class="text-muted" style="font-size:0.7rem">Inter 10/10 Mbps per IP</div></td>
                <td class="text-center align-middle">1 IP (Public)</td>
                <td class="text-center align-middle"><i class='bx bxs-hot' undefined ></i> FREE : Firewall<div class="text-muted" style="font-size:0.7rem">ป้องกันยิงทุกรูปแบบ โดนยิงแล้วดับคืนเงิน</div></td>
                <td class="text-center align-middle"><span class="text-primary">10,000.00 THB</span>/monthly</td>
                <td class="text-center align-middle"><a class="btn btn-block btn-outline-primary" target="_blank"  href="https://discord.gg/X9Q9aY99"><i class="fa fa-phone-square"></i> Contact</a></td>           
            </tr>
            <tr>
              <th class="table-secondary text-center align-middle">1/2 Rack (20U)</th>
              <td class="text-center align-middle">CSLoxinfo @ The Cloud<div class="text-muted" style="font-size:0.7rem">8 A ทำสัญญาเช่า 12 เดือน / ราคาตู้พร้อมใช้งาน</div></td>
              <td class="text-center align-middle">Port 1 Gbps<div class="text-muted" style="font-size:0.7rem">(Dedicated)</div></td>
              <td class="text-center align-middle">Unlimited transfer<div class="text-muted" style="font-size:0.7rem">Inter 10/10 Mbps per IP</div></td>
              <td class="text-center align-middle">1 IP (Public)</td>
              <td class="text-center align-middle"><i class='bx bxs-hot' undefined ></i> FREE : Firewall<div class="text-muted" style="font-size:0.7rem">ป้องกันยิงทุกรูปแบบ โดนยิงแล้วดับคืนเงิน</div></td>
              <td class="text-center align-middle"><span class="text-primary">15,000.00 THB</span>/monthly</td>
              <td class="text-center align-middle"><a class="btn btn-block btn-outline-primary" target="_blank"  href="https://discord.gg/X9Q9aY99"><i class="fa fa-phone-square"></i> Contact</a></td>           
          </tr>
          <tr>
            <th class="table-secondary text-center align-middle">FULL Rack</th>
            <td class="text-center align-middle">CSLoxinfo @ The Cloud<div class="text-muted" style="font-size:0.7rem">16 A ทำสัญญาเช่า 12 เดือน / ราคาตู้พร้อมใช้งาน</div></td>
            <td class="text-center align-middle">Port 2 Gbps<div class="text-muted" style="font-size:0.7rem">(Dedicated)</div></td>
            <td class="text-center align-middle">Unlimited transfer<div class="text-muted" style="font-size:0.7rem">Inter 10/10 Mbps per IP</div></td>
            <td class="text-center align-middle">1 IP (Public)</td> 
            <td class="text-center align-middle"><i class='bx bxs-hot' undefined ></i> FREE : Firewall<div class="text-muted" style="font-size:0.7rem">ป้องกันยิงทุกรูปแบบ โดนยิงแล้วดับคืนเงิน</div></td>
            <td class="text-center align-middle"><span class="text-primary">30,000.00 THB</span>/monthly</td>
            <td class="text-center align-middle"><a class="btn btn-block btn-outline-primary" target="_blank"  href="https://discord.gg/X9Q9aY99"><i class="fa fa-phone-square"></i> Contact</a></td>           
        </tr>
              </tbody>
          </table>
          <br>
          <!----------------------   Footer   ------------------------->
          <div class="table-responsive-sm mt-3 ">
            <h3 class="text-uppercase mt-5 mb-1">Add-on <small class="font50per">ส่วนเสริม</small></h3>
            <div class="row">
                <blockquote class="col-12 col-md-4 col-xl-3 my-3 blockquote text-left">
                    <p class="mb-0">Firewall</p>
                    <div class="text-muted" style="font-size:0.9rem">- Free! ตลอดอายุการใช้งาน</div>
                </blockquote>
                <blockquote class="col-12 col-md-4 col-xl-3 my-3 blockquote text-left">
                    <p class="mb-0">Extra IP Address</p>
                    <div class="text-muted" style="font-size:0.9rem">- 80 THB/IP (มากกว่า 20 IP ไอพีละ 50-70 THB)</div>
                </blockquote>
                <blockquote class="col-12 col-md-4 col-xl-3 my-3 blockquote text-left">
                    <p class="mb-0">LAN UTP 1 Gbps (Share) <i class="font80per">: Domestic</i></p>
                    <div class="text-muted" style="font-size:0.9rem">- Out of service/monthly (Guarantee 400~800 Mbps)</div>
                </blockquote>
                <blockquote class="col-12 col-md-4 col-xl-3 my-3 blockquote text-left">
                    <p class="mb-0">LAN UTP 1 Gbps (Dedicated) <i class="font80per">: Domestic</i></p>
                    <div class="text-muted" style="font-size:0.9rem">- 3,500 THB/monthly (Guarantee 1,000 Mbps)</div>
                </blockquote>
                <blockquote class="col-12 col-md-4 col-xl-3 my-3 blockquote text-left">
                    <p class="mb-0">Fiber 10 Gbps (Share) <i class="font80per">: Domestic</i></p>
                    <div class="text-muted" style="font-size:0.9rem">- 15,000 THB/monthly (Guarantee 1~5 Gbps)</div>
                </blockquote>
                <blockquote class="col-12 col-md-4 col-xl-3 my-3 blockquote text-left">
                    <p class="mb-0">Fiber 10 Gbps (Dedicated) <i class="font80per">: Domestic</i></p>
                    <div class="text-muted" style="font-size:0.9rem">- 2x,xxx THB/monthly (Guarantee 10 Gbps)</div>
                </blockquote>
                <blockquote class="col-12 col-md-4 col-xl-3 my-3 blockquote text-left">
                    <p class="mb-0">DirectAdmin License</p>
                    <div class="text-muted" style="font-size:0.9rem">- Free 1 license เมื่อชำระเงินล่วงหน้าอย่างน้อย 3 เดือน</div>
                </blockquote>
                <blockquote class="col-12 col-md-4 col-xl-3 my-3 blockquote text-left">
                    <p class="mb-0">Instant Business Support</p>
                    <div class="text-muted" style="font-size:0.9rem">- 1,500 THB/monthly</div>
                </blockquote>
            </div>
        </div>
        <!----------------------   Footer   ------------------------->
        </div>
      </div>
    </div>
  
    <div class="p-3">
  
    </div>
</section>
  <script src="script.js"></script>

</body>
</html>
