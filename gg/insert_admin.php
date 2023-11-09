<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 

    session_start();
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
                        timer: 1500,
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