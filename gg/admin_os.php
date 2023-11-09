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

require_once "config/db.php";

if (isset($_GET['delete_id'])) {
  $delete_id = $_GET['delete_id'];
  $deletestmt = $conn->query("DELETE FROM operating_system WHERE osv_type = '$delete_id'");
  $deletestmt->execute();
  
  if ($deletestmt) {
    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'สำเร็จ!',
            text: 'ลบข้อมูลเรียบร้อยแล้ว!',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
            });
        })
    </script>";
    header("refresh:2; url=admin_os.php");
  }
}

?>
<?php 
  require_once "config/db.php";

      if (isset($_POST['submit_add'])) {
                        $osv_id = $_POST['osv_id'];
                        $osv_type = $_POST['osv_type'];

                        $sql = $conn->prepare("INSERT INTO operating_system(osv_id, osv_type)
                        VALUES(:osv_id, :osv_type)");
                        $sql->bindParam(":osv_id", $osv_id);
                        $sql->bindParam(":osv_type", $osv_type);
                        $sql->execute();

                        if ($sql) {
                            $_SESSION['success'] = "Data has been inserted succesfully";
                            echo "<script>
                                $(document).ready(function() {
                                    Swal.fire({
                                        title: 'สำเร็จ',
                                        text: 'เพิ่มข้อมูลสำเร็จ!',
                                        icon: 'success',
                                        timer: 3000,
                                        showConfirmButton: false
                                    });
                                })
                            </script>";
                            header("refresh:2; url=admin_os.php");
                        } else {
                            $_SESSION['error'] = "Data has not been inserted succesfully";
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


  <div class="p-4">
    
  </div>
  
  <center><div class="container">
    <div class="card" style="width: 900px;">
      <div class="card-body shadow-lg">
        <!----------------------------Dedicated------------------------------------------->
        <h1 class="text-uppercase text-center mb-3">เพิ่ม OS<p class="fs-5">เพิ่มระบบปฏิบัติการ </p></h1>

        <form class="d-flex justify-content-end m-3" action="" method="post" enctype="multipart/form-data">
           
           <!-- Button trigger modal -->
          <button type="button" name="submit_additem" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class='bx bx-plus-circle'></i>
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล VPS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div class="mb-3">
                      <label for="firstname" class="d-flex justify-content-start col-form-label">osv_id : </label>
                      <input type="text" required class="form-control" name="osv_id">
                  </div>
                  <div class="mb-3">
                      <label for="firstname" class="d-flex justify-content-start col-form-label">osv_type : </label>
                      <input type="text" required class="form-control" name="osv_type">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submit" name="submit_add" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
          </div>
          <!-- Button trigger modal -->
          </form>

          <table class="table m-3">
            <thead class="table-dark">
              <tr>
                <th scope="col">osv ib2</th>
                <th scope="col">osv id</th>
                <th scope="col">osv type</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
                $result = $conn->query("SELECT * FROM operating_system");
                if ($result !== false) {
                while($item = $result->fetch()) {
            ?>
              <tr>
                <td><?php echo $item['osv_ib2'] ?></td>
                <td><?php echo $item['osv_id'] ?></td>
                <td><?php echo $item['osv_type'] ?></td>
                <td>
                  <a href="admin_edit_os.php?update_id=<?= $item['osv_ib2']; ?>" class="btn btn-outline-warning"><i class='bx bx-pencil'></i></a>
                  <a href="?delete_id=<?= $item['osv_type']; ?>" class="btn btn-outline-danger"><i class='bx bx-x-circle'></i></a>
                </td>
                <?php } 
                    } ?>
              </tr>
            </tbody>
          </table>

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
