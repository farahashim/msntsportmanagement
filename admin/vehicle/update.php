<?php

    // Include config file
    require_once "config.php";
    
    if (isset($_GET['vehicle_id'])) {
    $id = $_GET['vehicle_id'];

}

    if (isset($_POST['UBAH'])) {
        
        $noplate = $_POST['vehicle_noplate'];
        $type = $_POST['vehicle_type'];
      
        $sql = "UPDATE vehicle SET vehicle_noplate = '$noplate', vehicle_type = '$type' WHERE vehilce_noplate = '$noplate'";
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
              <h2 class="section__title">Kemas Kini Pengangkutan</h2>
            </header>
            <?php

                $sql = "SELECT * FROM vehicle WHERE vehicle_id='$id'";
                $query = mysqli_query($link, $sql);
                while($row=mysqli_fetch_assoc($query)){

            ?>
            <ul class="project">
                <div  class="project__item_1">
                <form class="gform_wrapper" onsubmit="successBox()" method="POST" action="update.php">
                <p>Nombor Pendaftaran</p><br>
                <input class="input--style-3" type="text" placeholder="Nombor Pendaftaran" name="vehicle_noplate" value="<?= $row['vehicle_noplate']; ?>" required>
                <br>
                <br><br>
                <p>Jenis Kenderaan</p>

                <select class="input--style-3" type="text" name="vehicle_type" style="color: rgba(255, 255, 255, 0.7) !important;" value="<?= $row['vehicle_type']; ?>"" required >
                          <option value="Van">Van</option>
                          <option value="Bus">Bus</option>
                </select>

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