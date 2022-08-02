<?php
  include('../../admin/topnav.php');
  session_start();

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
            <li class="nav__item  ">
                <a href="../../admin/equipment/crud.php"
                     >
                <img src="styleAdm/ico/add-user.svg" width="30" >
            </a>
            </li>
              <li class="nav__item ">
                  <a
                  href="../../admin/vehicle/crud.php"
                  >
                  <img src="styleAdm/ico/add-car.svg" width="30">
            </a>
            </li>
              <li class="nav__item nav__item--isActive"><a href="#"
                     class="nav__link focus--box-shadow"
                     role="menuitem"
                     aria-label="Staff"><img src="styleAdm/ico/add-fc.svg" width="40"></a></li>
          </ul>
          <!--menu bar end-->
      </nav>
    <main class="main">
          <header class="header">
            <div class="header__wrapper">
              <p>Admin Dashboard</p>
            </div>
          </header>
          <section class="section">
            <header class="section__header">
              <h2 class="section__title">Senarai Fasiliti</h2>
              <div class="section__control">
                <button
                id="show"
                  class="section__button section__button--painted focus--box-shadow toggle-btn"
                  type="button"
                  aria-label="Add New project"
                >
                  <img src="styleAdm/ico/add-fc.svg" width="32">
                </button>
              </div>
            </header>
            <ul class="project">
                <div  class="project__item_1" style="display: none;">
                <h4>Tambah Fasiliti</h4>
                <form class="gform_wrapper" onsubmit="successBox()" method="POST" action="create.php">
                    <span>
                        <input class="input--style-3" type="text" placeholder="Nama Fasiliti" name="facility_name" required>
                    </span>
                    <span>
                        <input class="input--style-3" type="text" placeholder="Alamat Fasiliti" name="facility_address" required>
                    </span>
                    </span>
                    <span>
                        <input class="input--style-3" type="tel" placeholder="No Tel Fasiliti" name="facility_phonenum" required>
                    </span>
                    <span>
                        <input class="submit" id="submit" value="tambah" name="tambah" type="submit" />
                    </span>
                </form>
                <script>
                    function successBox(){
                        swal({
                            icon: "success",
                            title: "New Staff added!",              
                        });
                        setTimeout(function(){
                        window.location.reload(1);
                        }, 3000);
                    }
                </script>
            </div>
              <table class="data">
                <tr>
                  <th>
                    Nama 
                  </th>
                  <th>
                    Alamat 
                  </th>
                  <th>
                    No Tel
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Tindakan
                  </th>
                <?php

                include ("config.php");
                $sql = "SELECT * FROM facility";
                $query = mysqli_query($link, $sql);
                //$num = mysqli_num_rows($query);
                
                while($row=mysqli_fetch_assoc($query)){
                  if($row['facility_status'] == 0){
                    $status = "Available";
                } else{
                  $status = "Not Available";
                }
                ?>
                <tr>
                  <td>
                    <?= $row['facility_name']; ?>
                  </td>
                  <td>
                    <?= $row['facility_address']; ?>
                  </td>
                  <td>
                    <?= $row['facility_phonenum']; ?>
                  </td>
                  <td>
                    <?= $status ?>
                  </td>
                  <td>
                  <a href="update.php?equip_id=<?= $row['facility_id']; ?>"><button class="btn btn-warning btn-xs edit_data">Kemas Kini</button></a>
                  <a href="delete.php?equip_id=<?= $row['facility_id']; ?>"><button class="btn btn-danger btn-xs delete_data">Hapus</button></a>
                  </td>
                </tr>
                <?php } ?>
                </table>
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