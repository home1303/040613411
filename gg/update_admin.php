<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 

    session_start();
    require_once "config/db.php";

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $amount = $_POST['amount'];


        $sql = $conn->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, password = :password, amount = :amount WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":firstname", $firstname);
        $sql->bindParam(":lastname", $lastname);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":password", $password);
        $sql->bindParam(":amount", $amount);
        $sql->execute();

        if ($sql) {
            $_SESSION['success'] = "Data has been updated succesfully";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                      });
                })
            </script>";
            header("refresh:2; url=manage_user.php");
        } else {
            $_SESSION['error'] = "Data has not been updated succesfully";
            header("location: manage_user.php");
        }
    }

?>