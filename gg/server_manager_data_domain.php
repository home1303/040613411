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
      $stmt = $conn->query("SELECT * FROM oder_domain WHERE oder_domain_lastname = '$item'");
      $stmt->execute();
      $data = $stmt->fetch();
  }
  ?>

<?php 
    if(isset($_POST['update_name_server'])){

      require_once "config/db.php";

      $newName = $_POST['newName'];
      $oldName = $_POST['oldName'];
      $dataName = $data['oder_domain_name'];

      if(empty($oldName)){
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
      elseif(empty($newName)){
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
        if($oldName == $data['oder_domain_name']){

          $oldid = $data['oder_domain_id'];
          $sql = $conn->prepare("UPDATE oder_domain SET oder_domain_name = :newName WHERE oder_domain_id = :oldid");
          $sql->bindParam(":oldid", $oldid);
          $sql->bindParam(":newName", $newName);
          $sql->execute();
  
          if($sql){
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'สำเร็จ!',
                    text: 'เปลี่ยนชื่อสำเร็จ!',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false
                    });
                })
            </script>";
            header("refresh:2;");
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
                  text: 'ชื่อไม่เดิมไม่ถูกต้อง!',
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


  <?php
    if(isset($_POST['add_time'])){
      $result = $_POST['select_rent'];
      $result_explode = explode('|', $result);
      $oder_domain_price = $result_explode[0]; 
      $oder_domain_time_rent = $result_explode[1]; 
      $oder_domain_time_date = $result_explode[2];
      $oder_domain_type = $result_explode[3] ;

      $new_time_end = $data['oder_domain_end'];

    if($result_explode[2] == 'Yearly'){
        $add_time_rent = date('Y-m-d H:i:s', strtotime($new_time_end. ' + 1 years')); //DATE +1 y
        $oder_domain_end = $add_time_rent;
      }

      if($row['amount'] >= $result_explode[0]){

          $id = $row['id'];
          $oldBalance = $row['amount'];
          $newBalance = $result_explode[0];
          $newAmount = $oldBalance - $newBalance;
    
          $sql = $conn->prepare("UPDATE users SET amount = :newAmount WHERE id = :id");
          $sql->bindParam(":id", $id);
          $sql->bindParam(":newAmount", $newAmount);
          $sql->execute();
    
          //$oldIP = $data['oder_ip'];
          $sql = $conn->prepare("UPDATE oder_domain SET oder_domain_end = :oder_domain_end WHERE oder_domain_id");
          //$sql->bindParam(":oldIP", $oldIP);
          $sql->bindParam(":oder_domain_end", $oder_domain_end);
          $sql->execute();
    
          if($sql){
            $_SESSION['success'] = "Data has been inserted succesfully";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Success',
                        text: 'ทำรายการสำเร็จ!',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });
                })
            </script>";
            header("refresh:2;");
          }
          else{
            $_SESSION['error'] = "Data has not been inserted succesfully";
          }
        }
        else{
          echo "<script>
          $(document).ready(function() {
              Swal.fire({
                  title: 'Error',
                  text: 'พ้อยของคุณไม่เพียงพอ กรุณาเติมพ้อย!',
                  icon: 'error',
                  timer: 3000,
                  showConfirmButton: false
              });
          })
          </script>";
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
      <span class="text" style='color:#ffffff' >DOMAIN MANAGER</span>
    </div>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/oder.png" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>

  <div class="p-4"></div>

    <div class="container">
      <?php
        $result10 = $conn->query("SELECT * FROM oder_domain ");
        $item10 = $result10->fetch()
      ?>
      <div class="card text-center">
        <div class="card-body shadow-lg">
          <h1 class="text-uppercase text-center mb-3">Domain MANAGEMRENT ⚙️<p class="fs-5">จัดการเครื่องเซิร์ฟของคุณ </p></h1>

          <div class="container">
            <div class="row row-cols-2">
              <div class="col">

                <div class="col">
                  <div class="card-deck">
                    <div class="card text-center" style="height: 460px;">
                      <div class="card-body shadow-sm">
                        <center><img src="image/logo111.png" style="height: 50px;" class="icon"></center>
                        <br>
                        <br>
                        <br>
                        <div class="p-4">
                       
                          <p class="card-text h5"><span class="badge bg-primary rounded-pill" style="width: 130px; height: auto;">NAME SERVER</span><span class="badge" style="color: black; width: 130px; height: auto;"><?php echo $data['oder_domain_name'] ?></span></p>
                          <p class="card-text h5"><span class="badge bg-primary rounded-pill" style="width: 130px; height: auto;">LASTNAME</span><span class="badge" style="color: black; width: 130px; height: auto;"><?php echo $data['oder_domain_lastname'] ?></span></p>
                          <p class="card-text h5"><span class="badge bg-warning rounded-pill" style="width: 130px; height: auto;">วันที่เริ่มเช่า</span><span class="badge" style="color: black; width: 130px; height: auto;"><?php echo $data['oder_domain_start'] ?></span></p>
                          <p class="card-text h5"><span class="badge bg-danger rounded-pill" style="width: 130px; height: auto;">สิ้นสุด</span><span class="badge" style="color: black; width: 130px; height: auto;"><?php echo $data['oder_domain_end'] ?></span></p>
                        </div>
                        
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="col">

                <div class="col">
                  <div class="card-deck">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="card text-center" style="height: 460px;">
                      <div class="card-body shadow-sm">
                        <h5 class="card-title fw-bold"><span class="badge bg-primary rounded-pill" style="width: 130px; height: auto;"><?php echo $data['oder_domain_type'] ?>#<?php echo $data['oder_domain_id'] ?></span></h5>
                        <div class="form-floating m-3">
                          <select class="form-select" id="floatingSelect" name="select_rent" aria-label="Floating label select example">
                            <option selected>กรุณาเลือกจำนวน</option>
                            <?php
                              $pack_display = $data['oder_domain_id'];
                              $pack_display2 = $data['oder_domain_type'];
                              $result19 = $conn->query("SELECT * FROM package_plan_domain WHERE pack_domain_id = $pack_display");
                              $item19 = $result19->fetch();

                            ?>
    
                            <option value="<?php echo $item19['pack_domain_price_2'] ?>|1|Yearly|ต่ออายุโดเมน">ต่ออายุโดเมน <?php echo $item19['pack_domain_price_2'] ?>฿ / 1 ปี</option>
                            
                          </select>
                          <label for="floatingSelect">จำนวนที่ต้องการเพิ่ม</label>
                        </div>

                          <div class="form-floating m-3">
                          <button type="submit" id="add_time" name="add_time" class="btn btn-success">ยืนยัน</button>
                          </div>
                          </form>
                          <form action="" method="post" enctype="multipart/form-data">
                          <div class="form-floating m-3">
                            <input type="text" class="form-control" name="oldName" id="floatingInput" placeholder="text">
                            <label for="floatingInput">ชื่อเดิม</label>
                          </div>
                          <div class="form-floating m-3">
                            <input type="text" class="form-control" name="newName" id="floatingInput" placeholder="text">
                            <label for="floatingInput">ชื่อใหม่</label>
                          </div>

                        <button type="submit" id="update_ip" name="update_name_server" class="btn btn-success">เปลี่ยนชื่อ</button>
                        <a href="server_manage.php" class="btn btn-danger">ยกเลิก</a>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>

              </div>
              <div class="col p-3"><span class="badge bg-primary p-2 rounded-pill">รายละเอียดสินค้า</span></div>
              <div class="col p-3"><span class="badge bg-primary p-2 rounded-pill">รายละเอียดการติดตั้ง</span></div>
            </div>


          </div>
          
        <div class="text-muted" style="font-size:1rem">STORE BY LNWCODE STUDIO</div>
      </div>
    </div>
  </div>

<div class="p-3"></div>

</section> 
    <script src="script.js"></script>

</body>
</html>
