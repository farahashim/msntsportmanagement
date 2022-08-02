<?php
require 'initC.php';
include ("config.php");
  include('../../user/topnav.php');
  if(isset($_SESSION['user_id']) && isset($_SESSION['user_icC'])){
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if($user_data ===  false){
        header('Location: logoutC.php');
        exit;
    }
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
   
}
else{
    header('Location: logoutC.php');
    exit;
}
  $status = "Pending";
  $eror_msg="";
  
  if(isset($_POST['tambah'])){
    $id = $_POST['equip_id'];
    $coach= $_POST['coach_id'];
    $qty = $_POST['booking_quantity'];
    $mula= $_POST['booking_start'];
    $tamat = $_POST['booking_end'];

    $bil_sql2 = "SELECT equip_quantity FROM sport_equipment WHERE equip_id = '$id'";
    $result = mysqli_query($link,$bil_sql2);
    $row=$result->fetch_assoc();
    $qty2 = intval($row['equip_quantity']);

    $app_sql = "SELECT booking_id FROM booking_equipment WHERE coach_id = '$coach' AND booking_status = '$status'";
    $result2 = mysqli_query($link,$app_sql);
    $app = mysqli_num_rows($result2);
    

  if($app == 0){
    if($qty >0){ 
        if($qty <= $qty2){

            $bil_sql = "UPDATE sport_equipment SET equip_quantity = equip_quantity - '$qty' WHERE equip_id = '$id'";
            $bil = mysqli_query($link,$bil_sql);
    
            $sql = "INSERT INTO booking_equipment (equip_id, coach_id, booking_start, booking_end, booking_quantity, booking_status)
            VALUES('$id','$coach','$mula','$tamat','$qty','$status')";
            mysqli_query($link, $sql);
        }else{
            $eror_msg = "Kuantiti melebihi stok sedia ada!";
        }
     }else{
        $eror_msg = "Kuantiti mestilah sekurangnya 1!";
     }
  }else{
  $eror_msg = "Anda perlu menunggu tempahan yang belum disahkan dahulu!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styleAdm/index.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
    <script> 
    $(document).ready(function(){
        $("#show").click(function(){
        $(".project__item_1").slideToggle("slow",function()
        {
        });
      });
    });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  </head>
  <body>
    <div class="wrapper">
    <nav class="nav">
          <!--menu bar start-->
          <ul class="nav__list" role="menubar">
            <li class="nav__item nav__item--isActive ">
                <a href="#"
                     class="nav__link focus--box-shadow"
                     role="menuitem"
                     aria-label="Staff">
                <img src="styleAdm/ico/add-user.svg" width="30" >
            </a>
            </li>
              <li class="nav__item ">
                  <a
                  href="/sukan/user/vehicle/crud.php"
                  >
                  <img src="styleAdm/ico/add-car.svg" width="30">
            </a>
            </li>
              <li class="nav__item"><a href="/sukan/user/facility/crud.php"><img src="styleAdm/ico/add-fc.svg" width="40"></a></li>
          </ul>
          <!--menu bar end-->
      </nav>
    <main class="main">
          <header class="header">
            <div class="header__wrapper">
              <p>Coach Dashboard</p>
            </div>
          </header>
          <section class="section">
           <?php if( $eror_msg != '' ){ ?>
           <div class="alert alert-danger" role="alert">
           <?php echo $eror_msg; ?>
          </div>
          <?php } ?>
            <header class="section__header">
              <h2 class="section__title">Senarai Tempahan Peralatan Sukan</h2>
              <div class="section__control">
                <button
                id="show"
                  class="section__button section__button--painted focus--box-shadow toggle-btn"
                  type="button"
                  aria-label="Add New project"
                >
                  <img src="styleAdm/ico/add-user.svg" width="32">
                </button>
              </div>
            </header>
            <ul class="project">
                <div  class="project__item_1" style="display: none;">
                <h4>Tempah Peralatan</h4>
                <form class="gform_wrapper" onsubmit="successBox()" method="POST" action="">
                    <span>
                    <select class="input--style-3" type="text" name="equip_id" style="color: rgba(255, 255, 255, 0.7) !important;"required>
                        <option value="" style="color: rgba(255, 255, 255, 0.7) !important;">Pilih Peralatan</option>
                          <?php 
                                $peralatan_q = "SELECT * FROM sport_equipment";
                                $result_p = mysqli_query($link, $peralatan_q);
                                while($row=mysqli_fetch_assoc($result_p)){
                          ?>
                          <option value="<?= $row['equip_id']; ?>"><?= $row['equip_name']; ?></option>
                          <?php } ?>
                        </select>
                    </span>
                    <span>
                        <input class="input--style-3" type="number" placeholder="Kuantiti" name="booking_quantity" required>
                    </span>
                    <span>
                        <input type="text" placeholder="Tarikh Pinjaman" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" name="booking_start">
                    </span>
                    <span>
                        <input type="text" placeholder="Tarikh Pulangan" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" name="booking_end">
                    </span>
                    <input class="input--style-3" type="hidden" placeholder="Coach" name="coach_id" value="<?= $_SESSION["user_id"]; ?>">
                    <span>
                        <input class="submit" id="submit" value="tambah" name="tambah" type="submit" /> 
                    </span>
                </form>
                <script>
                    function successBox(){
                        swal({
                            icon: "success",
                            title: "Tempahan Berjaya Dibuat!",              
                        });
                        setTimeout(function(){
                        window.location.reload(1);
                        }, 3000);
                    }
                </script>
            </div>
            <?php

                if (isset($_GET['pageno'])) {
                  $pageno = $_GET['pageno'];
                } else {
                  $pageno = 1;
                }
                $no_of_records_per_page = 5;
                $offset = ($pageno-1) * $no_of_records_per_page;

            ?>


              <table class="data">
                <tr>
                  <th>
                    ID Tempahan
                  </th>
                  <th>
                    Peralatan
                  </th>
                  <th>
                    Kauntiti
                  </th>
                  <th>
                    Pinjaman Bermula
                  </th>
                  <th>
                    Pinjaman Berakhir
                  </th>
                  <th>
                    Status
                  </th>
                <?php

                
                $total_pages_sql = "SELECT COUNT(equip_id) FROM booking_equipment";
                $result = mysqli_query($link, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                
                $total_pages  =ceil($total_rows / $no_of_records_per_page);

                $sql = "SELECT * FROM booking_equipment b JOIN sport_equipment s ON s.equip_id = b.equip_id LIMIT $offset, $no_of_records_per_page";
                $query = mysqli_query($link, $sql);
                //$num = mysqli_num_rows($query);
                
                while($row=mysqli_fetch_assoc($query)){

                ?>
                <tr>
                  <td>
                    <?= $row['booking_id']; ?>
                  </td>
                  <td>
                    <?= $row['equip_name']; ?>
                  </td>
                  <td>
                    <?= $row['booking_quantity']; ?>
                  </td>
                  <td>
                    <?= $row['booking_start']; ?>
                  </td>
                  <td>
                    <?= $row['booking_end']; ?>
                  </td>
                  <td>
                  <?php if($row['booking_status'] == "Pending"){?>
                  <a href="update.php?equip_id=<?= $row['equip_id']; ?>"><button class="btn btn-warning btn-xs edit_data" disabled><?= $row['booking_status']; ?></button></a>
                  <?php } else if( $row['booking_status'] == "Accepted"){?>  
                   <a href="update.php?equip_id=<?= $row['equip_id']; ?>"><button class="btn btn-success btn-xs edit_data" disabled><?= $row['booking_status']; ?></button></a>
                   <?php } else if($row['booking_status'] == "Rejected"){?>
                    <a href="update.php?equip_id=<?= $row['equip_id']; ?>"><button class="btn btn-danger btn-xs edit_data" disabled><?= $row['booking_status']; ?></button></a>
                    <?php } ?>
                </td>
                </tr>
                <?php } ?>
                </table>
                <ul class="pagination">
                    <li><a href="?pageno=1">First</a></li>
                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                    </li>
                    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                </ul>
                <br>
              </li>
            </ul>
          </section>
        </main>
        <aside class="aside">
        <section class="section">
          <div class="aside__control">
          </div>
          <div class="profile-main">
            <button
              class="profile-main__setting focus--box-shadow"
              type="button"
            >
              <img
                class="profile-main__photo"
                src="styleAdm/ico/index.png"
                alt="Profile photo"
              />
            </button>
            <br>
            <br>
            <?php
            if($_SESSION["user_icC"]) {
            ?>
            <center><p class="profile-main__name">Welcome</p></center>
            <h1 class="profile-main__name"><?= $user_data->coach_FN; ?></h1>
            <br>
            <span>
                      <div class="input--style-3">
                        <p>Coach IC</p>
                        <h6><?= $_SESSION["user_icC"]; ?></h6>
                    </div>
              </span>
            <span>
              <?php
}else{
  session_unset(); 
  session_destroy();
  exit;
  alert("Please login first");
} 
?>
          </div>
          </div>
        </section>
      </aside>
    </div>
  </body>
</html>