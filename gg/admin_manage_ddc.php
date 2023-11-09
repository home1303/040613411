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
    $deletestmt = $conn->query("DELETE FROM package_plan_ddc WHERE pack_ddc_id = $delete_id");
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
      header("refresh:2; url=admin_manage_ddc.php");
    }
  }
?>
<?php 
  require_once "config/db.php";

                    if (isset($_POST['submit_add'])) {
                      $pack_ddc_id = $_POST['pack_ddc_id'];
                      $ddc_cpu_type = $_POST['ddc_cpu_type'];
                      $ddc_dis_name = $_POST['ddc_dis_name'];
                      $ddc_cpu_turbo = $_POST['ddc_cpu_turbo'];
                      $ddc_cpu_score = $_POST['ddc_cpu_score'];
                      $ddc_pack_core = $_POST['ddc_pack_core'];
                      $ddc_pack_thread = $_POST['ddc_pack_thread'];
                      $ddc_pack_ddr = $_POST['ddc_pack_ddr'];
                      $ddc_pack_memory = $_POST['ddc_pack_memory'];
                      $ddc_pack_storage = $_POST['ddc_pack_storage'];
                      $ddc_pack_type = 'Monthly';
                      $ddc_pack_price = $_POST['ddc_pack_price'];
                      $ddc_pack_price_y = $_POST['ddc_pack_price_y'];
                      $ddc_pack_name = $_POST['ddc_pack_name'];

                        $sql = $conn->prepare("INSERT INTO package_plan_ddc(pack_ddc_id, ddc_cpu_type, ddc_dis_name, ddc_cpu_turbo, ddc_cpu_score, ddc_pack_core, ddc_pack_thread, ddc_pack_ddr, ddc_pack_memory, ddc_pack_storage, ddc_pack_type, ddc_pack_price, ddc_pack_price_y, ddc_pack_name)
                        VALUES(:pack_ddc_id, :ddc_cpu_type, :ddc_dis_name, :ddc_cpu_turbo, :ddc_cpu_score, :ddc_pack_core, :ddc_pack_thread, :ddc_pack_ddr, :ddc_pack_memory, :ddc_pack_storage, :ddc_pack_type, :ddc_pack_price, :ddc_pack_price_y, :ddc_pack_name)");
                        $sql->bindParam(":pack_ddc_id", $pack_ddc_id);
                        $sql->bindParam(":ddc_cpu_type", $ddc_cpu_type);
                        $sql->bindParam(":ddc_dis_name", $ddc_dis_name);
                        $sql->bindParam(":ddc_cpu_turbo", $ddc_cpu_turbo);
                        $sql->bindParam(":ddc_cpu_score", $ddc_cpu_score);
                        $sql->bindParam(":ddc_pack_core", $ddc_pack_core);
                        $sql->bindParam(":ddc_pack_thread", $ddc_pack_thread);
                        $sql->bindParam(":ddc_pack_ddr", $ddc_pack_ddr);
                        $sql->bindParam(":ddc_pack_memory", $ddc_pack_memory);
                        $sql->bindParam(":ddc_pack_storage", $ddc_pack_storage);
                        $sql->bindParam(":ddc_pack_type", $ddc_pack_type);
                        $sql->bindParam(":ddc_pack_price", $ddc_pack_price);
                        $sql->bindParam(":ddc_pack_price_y", $ddc_pack_price_y);
                        $sql->bindParam(":ddc_pack_name", $ddc_pack_name);
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
                            header("refresh:2; url=admin_manage_ddc.php");
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
      <span class="text" style='color:#ffffff' >ADMIN : MANAGER DDC</span>
    </div>

  <div class="p-4">
    
  </div>
  
  <center>
    <div class="card m-3">
      <div class="card-body shadow-lg">
        <!----------------------------Dedicated------------------------------------------->
        <h1 class="text-uppercase text-center mb-3">จัดการ DDC<p class="fs-5">จัดการ DDC ต่างๆ </p></h1>

        <div class="m-5" >
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
                          <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล DDC</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                      <div class="mb-3">
                          <label for="firstname" class="d-flex justify-content-start col-form-label">ID PACK: </label>
                          <input type="text" value="<?= $data['pack_ddc_id']; ?>" required class="form-control" name="pack_ddc_id">
                      </div>
                      <div class="mb-3">
                          <label for="firstname" class="d-flex justify-content-start col-form-label">ยี่ห้อ CPU / AMD: </label>
                          <input type="text" value="<?= $data['ddc_cpu_type']; ?>" required class="form-control" name="ddc_cpu_type">
                      </div>
                      <div class="mb-3">
                          <label for="lastname" class="d-flex justify-content-start col-form-label">ชื่อที่แสดง / Ryzen 0 0000X @ 0.00 GHz: </label>
                          <input type="text"  value="<?= $data['ddc_dis_name']; ?>" required class="form-control" name="ddc_dis_name">
                      </div>
                      <div class="mb-3">
                          <label for="email" class="d-flex justify-content-start col-form-label">CPU TURBO / 0.0 :</label>
                          <input type="text"  value="<?= $data['ddc_cpu_turbo']; ?>" required class="form-control" name="ddc_cpu_turbo">
                      </div>
                      <div class="mb-3">
                          <label for="password" class="d-flex justify-content-start col-form-label">CPU SCORE / 00000:</label>
                          <input type="text"  value="<?= $data['ddc_cpu_score']; ?>" required class="form-control" name="ddc_cpu_score">
                      </div>
                      <div class="mb-3">
                          <label for="amount" class="d-flex justify-content-start col-form-label">จำนวนคอ CORE / 4:</label>
                          <input type="text"  value="<?= $data['ddc_pack_core']; ?>" required class="form-control" name="ddc_pack_core">
                      </div>
                      <div class="mb-3">
                          <label for="amount" class="d-flex justify-content-start col-form-label">จำนวนเทรด THREAD / 4:</label>
                          <input type="text"  value="<?= $data['ddc_pack_thread']; ?>" required class="form-control" name="ddc_pack_thread">
                      </div>
                      <div class="mb-3">
                          <label for="amount" class="d-flex justify-content-start col-form-label">DDR / 3:</label>
                          <input type="text"  value="<?= $data['ddc_pack_ddr']; ?>" required class="form-control" name="ddc_pack_ddr">
                      </div>
                      <div class="mb-3">
                          <label for="amount" class="d-flex justify-content-start col-form-label">จำนวน RAM ? GB/ 8:</label>
                          <input type="text"  value="<?= $data['ddc_pack_memory']; ?>" required class="form-control" name="ddc_pack_memory">
                      </div>
                      <div class="mb-3">
                          <label for="amount" class="d-flex justify-content-start col-form-label">จำนวนพื้นที่ ? GB:</label>
                          <input type="text"  value="<?= $data['ddc_pack_storage']; ?>" required class="form-control" name="ddc_pack_storage">
                      </div>
                      <div class="mb-3">
                          <label for="amount" class="d-flex justify-content-start col-form-label">ราคาต่อเดือน :</label>
                          <input type="text"  value="<?= $data['ddc_pack_price']; ?>" required class="form-control" name="ddc_pack_price">
                      </div>
                      <div class="mb-3">
                          <label for="amount" class="d-flex justify-content-start col-form-label">ราคาต่อปี :</label>
                          <input type="text"  value="<?= $data['ddc_pack_price_y']; ?>" required class="form-control" name="ddc_pack_price_y">
                      </div>
                      <div class="mb-3">
                          <label for="amount" class="d-flex justify-content-start col-form-label">ชื่อ / DDC :</label>
                          <input type="text"  value="<?= $data['ddc_pack_name']; ?>" required class="form-control" name="ddc_pack_name">
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

          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">CPU TYPE</th>
                <th scope="col">DIS NAME</th>
                <th scope="col">CPU TURBO</th>
                <th scope="col">CPU SCORE</th>
                <th scope="col">CORE</th>
                <th scope="col">THREAD</th>
                <th scope="col">DDR</th>
                <th scope="col">MEMORY</th>
                <th scope="col">STORAGE</th>
                <th scope="col">PRICE MONTH</th>
                <th scope="col">PRICE YAERS</th>
                <th scope="col">NAME</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
                $result = $conn->query("SELECT * FROM package_plan_ddc");
                if ($result !== false) {
                while($item = $result->fetch()) {
            ?>
              <tr>
                <td><?php echo $item['pack_ddc_id']; ?></td>
                <td><?php echo $item['ddc_cpu_type']; ?></td>
                <td><?php echo $item['ddc_dis_name']; ?></td>
                <td><?php echo $item['ddc_cpu_turbo']; ?></td>
                <td><?php echo $item['ddc_cpu_score']; ?></td>
                <td><?php echo $item['ddc_pack_core']; ?></td>
                <td><?php echo $item['ddc_pack_thread']; ?></td>
                <td><?php echo $item['ddc_pack_ddr']; ?></td>
                <td><?php echo $item['ddc_pack_memory']; ?></td>
                <td><?php echo $item['ddc_pack_storage']; ?></td>
                <td><?php echo $item['ddc_pack_price']; ?></td>
                <td><?php echo $item['ddc_pack_price_y']; ?></td>
                <td><?php echo $item['ddc_pack_name']; ?></td>
                <td>
                  <!-- Button trigger modal -->
                  <a href="admin_edit_ddc.php?update_id=<?= $item['pack_ddc_id']; ?>" class="btn btn-outline-warning"><i class='bx bx-pencil'></i></a>
                  <a href="?delete_id=<?= $item['pack_ddc_id']; ?>" class="btn btn-outline-danger"><i class='bx bx-x-circle'></i></a>
                </td>
                <?php } 
                    } ?>
              </tr>
            </tbody>
          </table>

        </div>

      </div>
    </div>
</center>

  <div class="p-3"></div>

</section> 
    <script src="script.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
