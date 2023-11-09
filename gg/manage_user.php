<?php 

  session_start();
  require_once 'config/db.php';
  if (!isset($_SESSION['admin_login'])) {
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
      header('location: signin.php');
  }

?>

<?php 

    require_once "config/db.php";

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM users WHERE id = $delete_id");
        $deletestmt->execute();
        
        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=manage_user.php");
        }
    }

?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Admin Panel </title>
    <link rel="stylesheet" href="stylet.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   </head>
<body>
<?php 
    error_reporting(E_ALL ^ E_NOTICE);  
      if (isset($_SESSION['admin_login'])) {
          $admin_id = $_SESSION['admin_login'];
          $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
          $stmt->execute();
          $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    ?>

<?php 
                    require_once "config/db.php";

                    if (isset($_POST['submit'])) {
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $amount = $_POST['amount'];
                        $urole = $_POST['urole'];

                        $sql = $conn->prepare("INSERT INTO users(firstname, lastname, email, password, amount, urole) VALUES(:firstname, :lastname, :email, :password, :amount, :urole)");
                        $sql->bindParam(":firstname", $firstname);
                        $sql->bindParam(":lastname", $lastname);
                        $sql->bindParam(":email", $email);
                        $sql->bindParam(":password", $password);
                        $sql->bindParam(":amount", $amount);
                        $sql->bindParam(":urole", $urole);
                        $sql->execute();

                        if ($sql) {
                            $_SESSION['success'] = "Data has been inserted succesfully";
                            echo "<script>
                                $(document).ready(function() {
                                    Swal.fire({
                                        title: 'success',
                                        text: 'Data inserted successfully!',
                                        icon: 'success',
                                        timer: 5000,
                                        showConfirmButton: false
                                    });
                                })
                            </script>";
                            header("refresh:2; url=manage_user.php");
                        } else {
                            $_SESSION['error'] = "Data has not been inserted succesfully";
                        }
                    }
                    ?>

  <div class="sidebar close">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus'></i> 
      <span class="logo_name">CSTUDIO</span>-->
    </div>
    <ul class="nav-links">
      <li>
        <a href="admin.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">จัดการข้อมูล</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">จัดการข้อมูล</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">จัดการข้อมูล</a></li>
          <li><a href="#">ข้อมูลผู้ใช้</a></li>
          <li><a href="#">ระดับ</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">จัดการสินค้า</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">จัดการสินค้า</a></li>
          <li><a href="#">VPS</a></li>
          <li><a href="#">DDC</a></li>
          <li><a href="#">DOMAIN</a></li>
          <li><a href="#">CLOUDS</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="manage.html">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="image/profile.jpg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">ชื่อผู้ใช้ : <?php echo $row1['firstname']?></h3></div>
        <div class="job">ระดับ : <?php echo $row1['urole']?></div>
        <div class="job">Point : <?php echo $row1['amount']?> Point</div>
      </div>
      <a href="logout.php"><i class='bx bx-log-out' ></i></a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Manage Users</span>
    </div>
    
    <div class="container w-75 p-5">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ไอดี</th>
            <th scope="col">ชื่อ</th>
            <th scope="col">นามสกุล</th>
            <th scope="col">อีเมล</th>
            <th scope="col">รหัสผ่าน</th>
            <th scope="col">ระดับ</th>
            <th scope="col">เงิน</th>
            <th scope="col">Action 
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fi fi-rr-add"></i></button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="">
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">ชื่อ : </label>
                        <input type="text" class="form-control" id="recipient-name" name="firstname">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">นามสกุล : </label>
                        <input type="text" class="form-control" id="recipient-name" name="lastname">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">อีเมล :</label>
                        <input type="text" class="form-control" id="recipient-name" name="email">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">รหัสผ่าน :</label>
                        <input type="text" class="form-control" id="recipient-name" name="password">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">จำนวนเงิน :</label>
                        <input type="text" class="form-control" id="recipient-name" name="amount"> 
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">ระดับ :</label>
                        <select class="form-select" aria-label="Default select example" name="urole">
                          <option selected>.. 👉 Open this select role ..</option>
                          <option value="user">User</option>
                          <option value="editor">Editor</option>
                          <option value="admin">Admin</option>
                        </select>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            </th>
          </tr>
        </thead>
        <tbody>
        <?php
            $result = $conn->query("SELECT * FROM users");
            if ($result !== false) {
              echo 'There are '.$result->rowCount()." users";
          
              while($row = $result->fetch()) {

        ?>
          <tr>
            <th scope="row"><?php echo $row['id']?></th>
            <td><?php echo $row['firstname']?></td>
            <td><?php echo $row['lastname']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['password']?></td>
            <td><?php echo $row['urole']?></td>
            <td><?php echo $row['amount']?></td>
            <td class="text-center">
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-outline-warning"><i class="fi fi-rr-pencil"></i></a>
                <a data-id="<?= $row['id']; ?>" href="?delete=<?= $row['id']; ?>" class="btn btn-outline-danger"><i class="fi fi-rs-trash"></i></a>
            </td>
            <?php } 
                    } ?>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  
  <script src="script.js"></script>

    <script>

        $(".delete-btn").click(function(e) {
            var userId = $(this).data('id');
            e.preventDefault();
            deleteConfirm(userId);
        })

        function deleteConfirm(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "It will be deleted permanently!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: 'manage_user.php',
                                type: 'GET',
                                data: 'delete=' + userId,
                            })
                            .done(function() {
                                Swal.fire({
                                    title: 'success',
                                    text: 'Data deleted successfully!',
                                    icon: 'success',
                                }).then(() => {
                                    document.location.href = 'manage_user.php';
                                })
                            })
                            .fail(function() {
                                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error')
                                window.location.reload();
                            });
                    });
                },
            });
        }
    </script>
</body>
</html>