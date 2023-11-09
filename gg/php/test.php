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

<?php 
    require_once "config/db.php";

    if(isset($_POST['submit'])){
        $oder_package_id = $data['pack_vps_id'];
        $oder_package_type = $_POST[''];
        $oder_os = $_POST[''];

        $result = $_POST['select_rent'];
        $result_explode = explode('|', $result);
        $oder_price = $result_explode[0];
        $oder_time_rent = $result_explode[1];
        $oder_time_rent_date_type = $result_explode[2];

        $oder_name_server = $_POST['oder_name_server'];
        $oder_password_server = $_POST['oder_password_server'];
        $oder_email = $row['email'];


        $oder_time_start = $_POST[''];
        $oder_time_end = $_POST[''];


    }
?>