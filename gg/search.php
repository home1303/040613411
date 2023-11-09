<?php
    session_start();
    require_once 'config/db.php';
$search_ram = $_GET["search_ram"];
$search_core = $_GET["search_core"];
?>
<div class="row">
<?php
if(!empty($search_ram) && !empty($search_core)){
    $result = $conn->query("SELECT * FROM package_plan_vps WHERE vps_pack_memory = $search_ram AND vps_pack_core = $search_core");
                if ($result !== false) {
                    $found = false;
                while($item = $result->fetch()) {
                    if ($item['vps_pack_core'] == $search_core) {
                        $found = true;
            ?>
              <!-----------------    กรอบสี่เหลี่ยม    ------------------> 
              <div class="col-6 col-md-6 col-lg-3">
                <div class="card box-shadow mb-4">
                    <div class="card-body text-center">
                        <i class='bx bxl-windows h1'></i>
                        <i class='bx bxl-tux h1' ></i>
                        <h4 class="card-title"><?php echo $item['vps_pack_name'] ?> #<?php echo $item['pack_vps_id'] ?></h4>
                        <div class="my-3 text-left col-12 col-md-8 mx-auto">
                          <p class="card-text h5" style='color:rgba(165, 165, 165, 0.842)'><i class="bx bxs-microchip"></i> <?php echo $item['vps_pack_core'] ?> vCPU</p>
                          <p class="card-text h5" style='color:rgba(165, 165, 165, 0.842)'><i class="bx bxs-memory-card"></i> RAM <?php echo $item['vps_pack_memory'] ?> GB</p>
                          <p class="card-text h5" style='color:rgba(165, 165, 165, 0.842)'><i class="bx bxs-hdd"></i> SSD <?php echo $item['vps_pack_storage'] ?> GB</p>
                          <p class="card-text h5" style='color:rgba(165, 165, 165, 0.842)'>Windows, Linux OS</p>
                          <p class="card-text h5" style='color:rgba(165, 165, 165, 0.842)'>Unlimited Bandwidth</p>
                        </div>
                        <div class="my-2">
                          <p class="card-text h4 fw-bold"><?php echo number_format( $item['vps_pack_price'], 2 ) ?> ฿</p>
                          <p class="card-text text-muted"><?php echo number_format( $item['vps_pack_price_d'], 2 ) ?>฿/day | <?php echo number_format( $item['vps_pack_price_y'], 2 ) ?>฿/yearly</p>
                        </div>
                        <div class="mt-3">
                        <a href="oder.php?item=<?= $item['pack_vps_id']; ?>" class="btn btn-success w-100 p- fw-bold">Rent VPS</a>
                        </div>
                    </div>
                </div>
              </div> 
              <?php }
                }
                if (!$found) {echo "No results found";}
                    } 
                 }else{} ?>
                 