<?php
include ("config.php");
include('../../admin/topnav.php');

  $eror_msg="";
  $success_msg="";

  
  if (isset($_GET['booking_id'])) {
    $id = $_GET['booking_id'];
    if($_GET['button'] == 'accept'){

      $bil_sql2 = "SELECT equip_quantity FROM booking_equipment WHERE equip_id = '$id'";
      $result = mysqli_query($link,$bil_sql2);
      $row=$result->fetch_assoc();
      $qty = intval($row['equip_quantity']);
      $bil_sql = "UPDATE sport_equipment SET equip_quantity = equip_quantity - '$qty' WHERE equip_id = '$id'";
      $bil = mysqli_query($link,$bil_sql);

      $sql = "UPDATE booking_equipment SET booking_status = 'Accepted' WHERE booking_id = '$id'";
      $query = mysqli_query($link, $sql);
      $success_msg= "Tempahan bagi id tempahan ".$id." telah diluluskan!";
    }
    else{
      $sql = "UPDATE booking_equipment SET booking_status = 'Rejected' WHERE booking_id = '$id'";
      $query = mysqli_query($link, $sql);
      $error_msg= "Tempahan bagi id tempahan ".$id." telah ditolak!";
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
                  href="../../admin/vehicle/crud2.php"
                  >
                  <img src="styleAdm/ico/add-car.svg" width="30">
            </a>
            </li>
              <li class="nav__item"><a href="../../admin/facility/crud2.php"><img src="styleAdm/ico/add-fc.svg" width="40"></a></li>
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
          <?php if( $success_msg != '' ){ ?>
           <div class="alert alert-success" role="alert">
           <?php echo $success_msg; ?>
          </div>
          <?php } ?>
            <header class="section__header">
              <h2 class="section__title">Senarai Tempahan Peralatan Sukan</h2>
              <div class="section__control">
              </div>
            </header>
            <ul class="project">
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
                      <a href="crud2.php?booking_id=<?= $row['booking_id']; ?>&button=accept"><button class="btn btn-success btn-xs edit_data" >Accept</button></a>
                   <a href="crud2.php?booking_id=<?= $row['booking_id']; ?>&button=reject"><button class="btn btn-danger btn-xs edit_data" >Reject</button></a>
                  <?php } else if( $row['booking_status'] == "Accepted"){?>  
                    <a href="crud2.php?booking_id=<?= $row['booking_id']; ?>"><button class="btn btn-primary btn-xs edit_data" disabled><?= $row['booking_status']; ?></button></a>
                   <?php } else if($row['booking_status'] == "Rejected"){?>
                    <a href="crud2.php?booking_id=<?= $row['booking_id']; ?>"><button class="btn btn-primary btn-xs edit_data" disabled><?= $row['booking_status']; ?></button></a>
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
            if($_SESSION["admin_id"]) {
            ?>
            <center><p class="profile-main__name">Welcome</p></center>
            <h1 class="profile-main__name"><?= $_SESSION["admin_username"]; ?></h1>
            <br>
            <span>
                      <div class="input--style-3">
                        <p>Admin ID</p>
                        <h6><?= $_SESSION["admin_id"]; ?></h6>
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