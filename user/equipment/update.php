<?php

    // Include config file
    require_once "config.php";
    
    if (isset($_GET['equip_id'])) {
    $id = $_GET['equip_id'];

}

    if (isset($_POST['UBAH'])) {
        
        $name = $_POST['equip_name'];
        $category = $_POST['equip_category'];
        $quantity = $_POST['equip_quantity'];

        if($quantity <= 0){
            $status = "Not Available";
        }

        $sql = "UPDATE sport_equipment SET equip_name = '$name', equip_category = '$category', equip_quantity = '$quantity' WHERE equip_name = '$name'";
        $query = mysqli_query($link, $sql);
        header("Location: crud.php");
        exit();

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
  </head>
  <body>
    <div class="wrapper">
    <main class="main">
          <header class="header">
            <div class="header__wrapper">
              <p>Admin Dashboard</p>
            </div>
          </header>
          <section class="section">
            <header class="section__header">
              <h2 class="section__title">Kemas Kini Peralatan</h2>
            </header>
            <?php

                $sql = "SELECT * FROM sport_equipment WHERE equip_id='$id'";
                $query = mysqli_query($link, $sql);
                while($row=mysqli_fetch_assoc($query)){

            ?>
            <ul class="project">
                <div  class="project__item_1">
                <form class="gform_wrapper" onsubmit="successBox()" method="POST" action="update.php">
                <p>Nama</p><br>
                <input class="input--style-3" type="text" placeholder="Nama Peralatan" name="equip_name" value="<?= $row['equip_name']; ?>" required>
                <br>
                <br><br>
                <p>Kategori</p><br>
                
                <select class="input--style-3" type="text" name="equip_category" style="color: rgba(255, 255, 255, 0.7) !important;" value="<?= $row['equip_category']; ?>"" required >
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
                <br>
                <br> <br>
                <p>Kuantiti</p>

                        <input class="input--style-3" type="number" placeholder="Kuantiti" name="equip_quantity"  value="<?= $row['equip_quantity']; ?>" required>

                    <br>
                    <br>
                    <br>

                        <input class="submit" id="submit" value="UBAH" name="UBAH" type="submit" />

                </form>
                <?php } ?>
                </table>
                <br>
              </li>
            </ul>
          </section>
        </main>
    </div>
  </body>
</html>