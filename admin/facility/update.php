<?php

    // Include config file
    require_once "config.php";
    
    if (isset($_GET['facility_id'])) {
    $id = $_GET['facility_id'];

}

    if (isset($_POST['UBAH'])) {
        
        $name = $_POST['facility_name'];
        $address = $_POST['facility_address'];
        $phone = $_POST['facility_phonenum'];
        $status = "Not Available";

        $sql = "UPDATE facility SET facility_name = '$name', facility_address = '$address', facility_phonenum = '$phone' WHERE facility_name = '$name'";
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
              <h2 class="section__title">Kemas Kini Fasiliti</h2>
            </header>
            <?php

                $sql = "SELECT * FROM facility WHERE facility_id='$id'";
                $query = mysqli_query($link, $sql);
                while($row=mysqli_fetch_assoc($query)){

            ?>
            <ul class="project">
                <div  class="project__item_1">
                <form class="gform_wrapper" onsubmit="successBox()" method="POST" action="update.php">
                <p>Nama</p><br>
                <input class="input--style-3" type="text" placeholder="Nama Fasiliti" name="facility_name" value="<?= $row['facility_name']; ?>" required>
                <br>
                <br><br>
                <p>Alamat</p><br>
                
                <input class="input--style-3" type="text" placeholder="Alamat Fasiliti" name="facility_address"  value="<?= $row['facility_address']; ?>" required>
                <br>
                <br> <br>
                <p>No Tel</p>

                        <input class="input--style-3" type="tel" placeholder="No Tel Fasiliti" name="facility_phonenum"  value="<?= $row['facility_phonenum']; ?>" required>

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