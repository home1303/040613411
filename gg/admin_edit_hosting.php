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
<?php 
  session_start();
  require_once "config/db.php";

  if (isset($_POST['update'])) {
      $pack_hosting_id = $_POST['pack_hosting_id'];
      $hosting_pack_domains = $_POST['hosting_pack_domains'];
      $hosting_pack_space = $_POST['hosting_pack_space'];
      $hosting_pack_transfer = $_POST['hosting_pack_transfer'];
      $hosting_pack_database = $_POST['hosting_pack_database'];
      $hosting_pack_type = 'Yearly';
      $hosting_pack_price_y = $_POST['hosting_pack_price_y'];
      $hosting_pack_name = $_POST['hosting_pack_name'];


      $sql = $conn->prepare("UPDATE package_plan_hosting SET pack_hosting_id = :pack_hosting_id,
      hosting_pack_domains = :hosting_pack_domains, hosting_pack_space = :hosting_pack_space, hosting_pack_transfer = :hosting_pack_transfer,
      hosting_pack_database = :hosting_pack_database, hosting_pack_type = :hosting_pack_type, hosting_pack_price_y = :hosting_pack_price_y, hosting_pack_name = :hosting_pack_name WHERE pack_hosting_id = :pack_hosting_id");
      $sql->bindParam(":pack_hosting_id", $pack_hosting_id);
      $sql->bindParam(":hosting_pack_domains", $hosting_pack_domains);
      $sql->bindParam(":hosting_pack_space", $hosting_pack_space);
      $sql->bindParam(":hosting_pack_transfer", $hosting_pack_transfer);
      $sql->bindParam(":hosting_pack_database", $hosting_pack_database);
      $sql->bindParam(":hosting_pack_type", $hosting_pack_type);
      $sql->bindParam(":hosting_pack_price_y", $hosting_pack_price_y);
      $sql->bindParam(":hosting_pack_name", $hosting_pack_name);
      $sql->execute();

      if ($sql) {
          $_SESSION['success'] = "Data has been updated succesfully";
          echo "<script>
              $(document).ready(function() {
                  Swal.fire({
                      position: 'top-center',
                      icon: 'success',
                      title: 'บันทึกข้อมูลสำเร็จ',
                      showConfirmButton: false,
                      timer: 1500
                  });
              })
          </script>";
          header("refresh:2; url=admin_manage_hosting.php");
      } else {
          $_SESSION['error'] = "Data has not been updated succesfully";
          header("location: admin_manage_hosting.php");
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
      <span class="text" style='color:#ffffff' >ADMIN : OS</span>
    </div>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/image/setting.png" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>

  <div class="p-4">
    
  </div>
  
  <center><div class="container">
    <div class="card">
      <div class="card-body shadow-lg">
        <!----------------------------Dedicated------------------------------------------->
        <h1 class="text-uppercase text-center mb-3">แก้ไขข้อมูล ✍️</h1>
          <form action="" method="post" enctype="multipart/form-data">
          <?php 
                if (isset($_GET['update_id'])) {
                    $update_id = $_GET['update_id'];
                    $stmt = $conn->query("SELECT * FROM package_plan_hosting WHERE pack_hosting_id = $update_id");
                    $stmt->execute();
                    $data = $stmt->fetch();
                }
            ?>
            <div class="w-50">
            <hr>
              <div class="mb-3">
                    <label for="firstname" class="d-flex justify-content-start col-form-label">hosting id : </label>
                    <input type="text" value="<?= $data['pack_hosting_id']; ?>" required class="form-control" name="pack_hosting_id">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="d-flex justify-content-start col-form-label">hosting domains : </label>
                    <input type="text" value="<?= $data['hosting_pack_domains']; ?>" required class="form-control" name="hosting_pack_domains">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="d-flex justify-content-start col-form-label">hosting space : </label>
                    <input type="text"  value="<?= $data['hosting_pack_space']; ?>" required class="form-control" name="hosting_pack_space">
                </div>
                <div class="mb-3">
                    <label for="email" class="d-flex justify-content-start col-form-label">hosting transfer :</label>
                    <input type="text"  value="<?= $data['hosting_pack_transfer']; ?>" required class="form-control" name="hosting_pack_transfer">
                </div>
                <div class="mb-3">
                    <label for="password" class="d-flex justify-content-start col-form-label">hosting database :</label>
                    <input type="text"  value="<?= $data['hosting_pack_database']; ?>" required class="form-control" name="hosting_pack_database">
                </div>
                <div class="mb-3">
                    <label for="password" class="d-flex justify-content-start col-form-label">hosting type :</label>
                    <input type="text"  value="<?= $data['hosting_pack_type']; ?>" required class="form-control" name="hosting_pack_type">
                </div>
                <div class="mb-3">
                    <label for="password" class="d-flex justify-content-start col-form-label">hosting price y :</label>
                    <input type="text"  value="<?= $data['hosting_pack_price_y']; ?>" required class="form-control" name="hosting_pack_price_y">
                </div>
                <div class="mb-3">
                    <label for="password" class="d-flex justify-content-start col-form-label">hosting name :</label>
                    <input type="text"  value="<?= $data['hosting_pack_name']; ?>" required class="form-control" name="hosting_pack_name">
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="admin_manage_hosting.php">Go Back</a>
                    <button type="submit" name="update" class="btn btn-success">Update</button>
              </div>
            </div>
          </form>


      </div>
    </div>
  </div></center>

  <div class="p-3">

  </div>

</section> 
    <script src="script.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
