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
                  href="/sukan/admin/vehicle/crud.php"
                  >
                  <img src="styleAdm/ico/add-car.svg" width="30">
            </a>
            </li>
              <li class="nav__item"><a href="/sukan/admin/facility/crud.php"><img src="styleAdm/ico/add-fc.svg" width="40"></a></li>
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
              <h2 class="section__title">Senarai Peralatan Sukan</h2>
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
                <h4>Tambah Peralatan</h4>
                <form class="gform_wrapper" onsubmit="successBox()" method="POST" action="create.php">
                    <span>
                        <input class="input--style-3" type="text" placeholder="Nama Peralatan" name="equip_name" required>
                    </span>
                    <span>
                        <select class="input--style-3" type="text" name="equip_category" style="color: rgba(255, 255, 255, 0.7) !important;"required>
                          <option value="" style="color: rgba(255, 255, 255, 0.7) !important;">Pilih Kategori</option>
                          <option value="Bola Sepak">Bola Sepak</option>
                          <option value="Bola Tampar">Bola Tampar</option>
                          <option value="Rugby">Rugby</option>
                          <option value="Gimrama">Gimrama</option>
                          <option value="Silat">Silat</option>
                          <option value="Taekwando">Taekwandp</option>
                          <option value="Tennis">Tennis</option>
                          <option value="Sepak Takraw">Sepak Takraw</option>
                          <option value="Balapan dan Padang">Balapan dan Padang</option>
                        </select>
                    </span>
                    <span>
                        <input class="input--style-3" type="number" placeholder="Kuantiti" name="equip_quantity" required>
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
                    Nama Peralatan
                  </th>
                  <th>
                    Kategori
                  </th>
                  <th>
                    Kuantiti
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Tindakan
                  </th>
                <?php

                include ("config.php");
                $total_pages_sql = "SELECT COUNT(equip_id) FROM sport_equipment";
                $result = mysqli_query($link, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                
                $total_pages  =ceil($total_rows / $no_of_records_per_page);

                $sql = "SELECT * FROM sport_equipment LIMIT $offset, $no_of_records_per_page";
                $query = mysqli_query($link, $sql);
                //$num = mysqli_num_rows($query);
                
                while($row=mysqli_fetch_assoc($query)){

                if($row['equip_quantity'] <= 0){
                  $status = "Not Available";
                } else {
                  $status = "Available";
                }

                ?>
                <tr>
                  <td>
                    <?= $row['equip_name']; ?>
                  </td>
                  <td>
                    <?= $row['equip_category']; ?>
                  </td>
                  <td>
                    <?= $row['equip_quantity']; ?>
                  </td>
                  <td>
                    <?= $status; ?>
                  </td>
                  <td>
                  <a href="update.php?equip_id=<?= $row['equip_id']; ?>"><button class="btn btn-warning btn-xs edit_data">Kemas Kini</button></a>
                  <a href="delete.php?equip_id=<?= $row['equip_id']; ?>"><button class="btn btn-danger btn-xs delete_data">Hapus</button></a>
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
  header("location: logout.php");
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