<!DOCTYPE html>

<?php
include "connection/koneksi.php";
session_start();
ob_start();

$id = $_SESSION['id_user'];

if (isset($_SESSION['edit_menu'])) {
  echo $_SESSION['edit_menu'];
  unset($_SESSION['edit_menu']);
}

if (isset($_SESSION['username'])) {

  $query = "select * from tb_user natural join tb_level where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);

  while ($r = mysqli_fetch_array($sql)) {

    $nama_user = $r['nama_user'];

?>

    <html lang="en">

    <head>
      <title>Daftar Project</title>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="template/dashboard/css/bootstrap.min.css" />
      <link rel="stylesheet" href="template/dashboard/css/bootstrap-responsive.min.css" />
      <link rel="stylesheet" href="template/dashboard/css/fullcalendar.css" />
      <link rel="stylesheet" href="template/dashboard/css/matrix-style.css" />
      <link rel="stylesheet" href="template/dashboard/css/matrix-media.css" />
      <link href="template/dashboard/font-awesome/css/font-awesome.css" rel="stylesheet" />
      <link rel="stylesheet" href="template/dashboard/css/jquery.gritter.css" />
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>

    <body>

      <!--Header-part-->
      <div id="header">
        <h1><a href="entri_referensi.php">Daftar Project</a></h1>
      </div>
      <!--close-Header-part-->


      <!--top-Header-menu-->
      <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
          <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span class="text">Welcome <?php echo $r['nama_user']; ?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="icon-user"></i><?php echo "&nbsp;&nbsp;" . $r['nama_level']; ?></a></li>
              <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
            </ul>
          </li>
          <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
        </ul>
      </div>
      <!--close-top-Header-menu-->
      <!--start-top-serch-->

      <!--close-top-serch-->
      <!--sidebar-menu-->
      <div id="sidebar"><a href="entri_referensi.php" class="visible-phone"><i class="icon icon-tasks"></i> <span>Daftar Project</span></a>
        <ul>
          <?php
          if ($r['id_level'] == 1) {
          ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
            <li class="active"> <a href="entri_referensi.php"><i class="icon icon-tasks"></i> <span>Daftar Project</span></a> </li>
            <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
            <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
            <li> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
          <?php
          } else if ($r['id_level'] == 2) {
          ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="entri_referensi.php"><i class="icon icon-tasks"></i> <span>Daftar Project</span></a> </li>
            <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
            <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
            <li> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
          <?php
          } else if ($r['id_level'] == 3) {
          ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="entri_referensi.php"><i class="icon icon-tasks"></i> <span>Daftar Project</span></a> </li>
            <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
            <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
            <li> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
          <?php
          } else if ($r['id_level'] == 4) {
          ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="entri_referensi.php"><i class="icon icon-tasks"></i> <span>Daftar Project</span></a> </li>
            <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
            <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
            <li> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
          <?php
          } else if ($r['id_level'] == 5) {
          ?>
            <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
            <li> <a href="entri_referensi.php"><i class="icon icon-tasks"></i> <span>Daftar Project</span></a> </li>
            <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
            <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
            <li> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
            <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
          <?php
          }
          ?>
        </ul>
      </div>
      <!--sidebar-menu-->

      <!--main-container-part-->
      <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
          <div id="breadcrumb"> <a href="entri_referensi.php" title="Go to here" class="tip-bottom"><i class="icon icon-tasks"></i> Daftar Project</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
          <div class="row-fluid">
            <?php
            if ($r['id_level'] == 1) {
            ?>
              <div class="widget-box">
                <div class="widget-title bg_lg"><span class="icon"><i class="icon-th-large"></i></span>
                  <h5>Daftar Project</h5>
                  <a href="tambah_menu.php" class="btn btn-info btn-mini label"><i class="icon-plus"></i>&nbsp;Tambah Data</a>
                </div>
                <!--DATA Creative-->
                <div class="widget-box">
                  <?php
                  $query_data_wtr = "select * from tb_data_project where project_pic = 'robithulhaq'";
                  $sql_data_wtr = mysqli_query($conn, $query_data_wtr);
                  $no = 1;
                  ?>

                  <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Project Creative</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered" style="width: 100%">
                      <thead>
                        <tr>
                          <th style="width:5%">Id Project.</th>
                          <th style="width:25%">Nama Project</th>
                          <th style="width:30%">Project PIC</th>
                          <th style="width:20%">Status</th>
                          <th style="width:10%">Progress</th>
                          <th style="width:20%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($r_dt_wtr = mysqli_fetch_array($sql_data_wtr)) {
                          if (strtolower($r_dt_wtr['status']) == 'selesai') {
                            $progress = '100%';
                          } else if (strtolower($r_dt_wtr['status']) == 'berlangsung') {
                            $progress = '1% - 99%';
                          } else if (strtolower($r_dt_wtr['status']) == 'ditunda') {
                            $progress = '1% - 99%';
                          } else if (strtolower($r_dt_wtr['status']) == 'dibatalkan') {
                            $progress = '0%';
                          } else{
                            $progress = '';
                          }
                        ?>
                          <tr class="odd gradeX">
                            <td>
                              <center><?php echo $no++; ?>.</center>
                            </td>
                            <td><?php echo $r_dt_wtr['nama_project']; ?></td>
                            <td><?php echo $r_dt_wtr['project_pic']; ?></td>
                            <td><?php echo $r_dt_wtr['status']; ?></td>
                            <td><?= $progress ?></td>
                            <td>
                              <form action="" method="post">
                                <button type="submit" value="<?php echo $r_dt_wtr['id_project']; ?>" name="edit_menu" class="btn btn-success btn-mini"><i class='icon-pencil'></i>&nbsp;&nbsp;Edit &nbsp;&nbsp;</button>
                                <button type="submit" value="<?php echo $r_dt_wtr['id_project']; ?>" name="hapus_menu" class="btn btn-mini btn-danger"><i class='icon icon-trash'></i>&nbsp; Hapus</button>
                              </form>
                            </td>
                          </tr>
                        <?php
                        }
                        if (isset($_REQUEST['hapus_menu'])) {
                          //echo $_REQUEST['hapus_menu'];
                          $id_project = $_REQUEST['hapus_menu'];

                          $query_lihat = "select * from tb_data_project where id_project = $id_project";
                          $sql_lihat = mysqli_query($conn, $query_lihat);
                          $result_lihat = mysqli_fetch_array($sql_lihat);
                          if (file_exists('gambar/' . $result_lihat['gambar_masakan'])) {
                            //echo $result_lihat['gambar_masakan'];
                            unlink('gambar/' . $result_lihat['gambar_masakan']);
                          }
                          $query_hapus_masakan = "delete from tb_data_project where id_project = $id_project";
                          $sql_hapus_masakan = mysqli_query($conn, $query_hapus_masakan);

                          $query_hapus_anggota = "delete from tb_anggota_project where id_project = $id_project";
                          $sql_hapus_anggota = mysqli_query($conn, $query_hapus_anggota);
                          if ($sql_hapus_masakan && $sql_hapus_anggota) {
                            header('location: entri_referensi.php');
                          }
                        }

                        if (isset($_REQUEST['edit_menu'])) {
                          //echo $_REQUEST['hapus_menu'];
                          $id_masakan = $_REQUEST['edit_menu'];
                          $_SESSION['edit_menu'] = $id_masakan;

                          header('location: tambah_menu.php');
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <!--DATA Tax & Accounting-->
                <div class="widget-box">
                  <?php
                  $query_data_wtr = "select * from tb_data_project where project_pic = 'Yuli'";
                  $sql_data_wtr = mysqli_query($conn, $query_data_wtr);
                  $no = 1;
                  ?>

                  <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Project Tax & Accounting</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered" style="width: 100%">
                      <thead>
                        <tr>
                          <th style="width:5%">Id Project.</th>
                          <th style="width:30%">Nama Project</th>
                          <th style="width:25%">Project PIC</th>
                          <th style="width:20%">Status</th>
                          <th style="width:10%">Progress</th>
                          <th style="width:20%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($r_dt_wtr = mysqli_fetch_array($sql_data_wtr)) {
                          if (strtolower($r_dt_wtr['status']) == 'selesai') {
                            $progress = '100%';
                          } else if (strtolower($r_dt_wtr['status']) == 'berlangsung') {
                            $progress = '1% - 99%';
                          } else if (strtolower($r_dt_wtr['status']) == 'ditunda') {
                            $progress = '1% - 99%';
                          } else if (strtolower($r_dt_wtr['status']) == 'dibatalkan') {
                            $progress = '0%';
                          } else{
                            $progress = '';
                          }
                        ?>
                          <tr class="odd gradeX">
                            <td>
                              <center><?php echo $no++; ?>.</center>
                            </td>
                            <td><?php echo $r_dt_wtr['nama_project']; ?></td>
                            <td><?php echo $r_dt_wtr['project_pic']; ?></td>
                            <td><?php echo $r_dt_wtr['status']; ?></td>
                            <td><?= $progress ?></td>
                            <td>
                              <form action="" method="post">
                                <button type="submit" value="<?php echo $r_dt_wtr['id_project']; ?>" name="edit_menu" class="btn btn-success btn-mini"><i class='icon-pencil'></i>&nbsp;&nbsp;Edit &nbsp;&nbsp;</button>
                                <button type="submit" value="<?php echo $r_dt_wtr['id_project']; ?>" name="hapus_menu" class="btn btn-mini btn-danger"><i class='icon icon-trash'></i>&nbsp; Hapus</button>
                              </form>
                            </td>
                          </tr>
                        <?php
                        }
                        if (isset($_REQUEST['hapus_menu'])) {
                          //echo $_REQUEST['hapus_menu'];
                          $id_masakan = $_REQUEST['hapus_menu'];

                          $query_lihat = "select * from tb_data_project where id_project = $id_masakan";
                          $sql_lihat = mysqli_query($conn, $query_lihat);
                          $result_lihat = mysqli_fetch_array($sql_lihat);
                          if (file_exists('gambar/' . $result_lihat['gambar_masakan'])) {
                            //echo $result_lihat['gambar_masakan'];
                            unlink('gambar/' . $result_lihat['gambar_masakan']);
                          }
                          $query_hapus_masakan = "delete from tb_data_project where id_project = $id_masakan";
                          $sql_hapus_masakan = mysqli_query($conn, $query_hapus_masakan);
                          if ($sql_hapus_masakan) {
                            header('location: entri_referensi.php');
                          }
                        }

                        if (isset($_REQUEST['edit_menu'])) {
                          //echo $_REQUEST['hapus_menu'];
                          $id_masakan = $_REQUEST['edit_menu'];
                          $_SESSION['edit_menu'] = $id_masakan;

                          header('location: tambah_menu.php');
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!--daftar project-->
                <div class="widget-content">
                  <ul class="thumbnails">
                    <div class="btn-icon-pg">
                      <ul>
                        <!--Looping-->
                        <?php
                        $query_data_makanan = "select * from tb_data_project order by id_project";
                        $sql_data_makanan = mysqli_query($conn, $query_data_makanan);
                        $no_makanan = 1;

                        while ($r_dt_makanan = mysqli_fetch_array($sql_data_makanan)) {
                        ?>
                          <li class="span2">

                            <div class="actions">
                            </div>
                            <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <td><?php echo $r_dt_makanan['status']; ?></td>
                                </tr>
                                <tr>
                                  <td>Harga / Porsi</td>
                                  <td>Rp. <?php echo $r_dt_makanan['nama_project']; ?>,-</td>
                                </tr>
                                <tr>
                                  <td>Stok</td>
                                  <td><?php echo $r_dt_makanan['project_pic']; ?> Porsi</td>
                                </tr>
                              </tbody>
                            </table>
                            <form action="" method="post">
                              <button type="submit" value="<?php echo $r_dt_makanan['id_masakan']; ?>" name="edit_menu" class="btn btn-success btn-mini"><i class='icon-pencil'></i>&nbsp;&nbsp;Edit &nbsp;&nbsp;</button>
                              <button type="submit" value="<?php echo $r_dt_makanan['id_masakan']; ?>" name="hapus_menu" class="btn btn-mini btn-danger"><i class='icon icon-trash'></i>&nbsp; Hapus</button>
                            </form>
                          </li>
                        <?php
                        }
                        if (isset($_REQUEST['hapus_menu'])) {
                          //echo $_REQUEST['hapus_menu'];
                          $id_masakan = $_REQUEST['hapus_menu'];

                          $query_lihat = "select * from tb_masakan where id_masakan = $id_masakan";
                          $sql_lihat = mysqli_query($conn, $query_lihat);
                          $result_lihat = mysqli_fetch_array($sql_lihat);
                          if (file_exists('gambar/' . $result_lihat['gambar_masakan'])) {
                            //echo $result_lihat['gambar_masakan'];
                            unlink('gambar/' . $result_lihat['gambar_masakan']);
                          }
                          $query_hapus_masakan = "delete from tb_masakan where id_masakan = $id_masakan";
                          $sql_hapus_masakan = mysqli_query($conn, $query_hapus_masakan);
                          if ($sql_hapus_masakan) {
                            header('location: entri_referensi.php');
                          }
                        }

                        if (isset($_REQUEST['edit_menu'])) {
                          //echo $_REQUEST['hapus_menu'];
                          $id_masakan = $_REQUEST['edit_menu'];
                          $_SESSION['edit_menu'] = $id_masakan;

                          header('location: tambah_menu.php');
                        }
                        ?>
                        <!--End Looping-->
                      </ul>
                    </div>
                  </ul>
                </div>
              </div>
            <?php
            } elseif ($r['id_level'] == 2) {
            ?>
              <!--DATA Tax & Accounting-->
              <div class="widget-box">
                <?php
                $query_data_wtr = "select * from tb_data_project where project_pic = 'Yuli'";
                $sql_data_wtr = mysqli_query($conn, $query_data_wtr);
                $no = 1;
                ?>

                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                  <h5>Project Tax & Accounting</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered" style="width: 100%">
                    <thead>
                      <tr>
                        <th style="width:5%">Id Project.</th>
                        <th style="width:25%">Status</th>
                        <th style="width:30%">Nama Project</th>
                        <th style="width:20%">Project PIC</th>
                        <th style="width:10%">Progress</th>
                        <th style="width:20%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($r_dt_wtr = mysqli_fetch_array($sql_data_wtr)) {
                      ?>
                        <tr class="odd gradeX">
                          <td><?php echo $r_dt_wtr['id_project']; ?></td>
                          <td><?php echo $r_dt_wtr['status']; ?></td>
                          <td><?php echo $r_dt_wtr['nama_project']; ?></td>
                          <td><?php echo $r_dt_wtr['project_pic']; ?></td>
                          <td>Masih Kosong</td>
                          <td>
                            <form action="" method="post">
                              <button type="submit" value="<?php echo $r_dt_wtr['id_project']; ?>" name="edit_menu" class="btn btn-success btn-mini"><i class='icon-pencil'></i>&nbsp;&nbsp;Edit &nbsp;&nbsp;</button>
                              <button type="submit" value="<?php echo $r_dt_wtr['id_project']; ?>" name="hapus_menu" class="btn btn-mini btn-danger"><i class='icon icon-trash'></i>&nbsp; Hapus</button>
                            </form>
                          </td>
                        </tr>
                      <?php
                      }
                      if (isset($_REQUEST['hapus_menu'])) {
                        //echo $_REQUEST['hapus_menu'];
                        $id_masakan = $_REQUEST['hapus_menu'];

                        $query_lihat = "select * from tb_data_project where id_project = $id_masakan";
                        $sql_lihat = mysqli_query($conn, $query_lihat);
                        $result_lihat = mysqli_fetch_array($sql_lihat);
                        if (file_exists('gambar/' . $result_lihat['gambar_masakan'])) {
                          //echo $result_lihat['gambar_masakan'];
                          unlink('gambar/' . $result_lihat['gambar_masakan']);
                        }
                        $query_hapus_masakan = "delete from tb_data_project where id_project = $id_masakan";
                        $sql_hapus_masakan = mysqli_query($conn, $query_hapus_masakan);
                        if ($sql_hapus_masakan) {
                          header('location: entri_referensi.php');
                        }
                      }

                      if (isset($_REQUEST['edit_menu'])) {
                        //echo $_REQUEST['hapus_menu'];
                        $id_masakan = $_REQUEST['edit_menu'];
                        $_SESSION['edit_menu'] = $id_masakan;

                        header('location: tambah_menu.php');
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
          <!--End-Action boxes-->
        </div>
      </div>

      <!--end-main-container-part-->

      <!--Footer-part-->

      <div class="row-fluid">
        <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; Restaurant <a href="#">by Group 3</a> </div>
      </div>

      <!--end-Footer-part-->

      <script src="template/dashboard/js/excanvas.min.js"></script>
      <script src="template/dashboard/js/jquery.min.js"></script>
      <script src="template/dashboard/js/jquery.ui.custom.js"></script>
      <script src="template/dashboard/js/bootstrap.min.js"></script>
      <script src="template/dashboard/js/jquery.flot.min.js"></script>
      <script src="template/dashboard/js/jquery.flot.resize.min.js"></script>
      <script src="template/dashboard/js/jquery.peity.min.js"></script>
      <script src="template/dashboard/js/fullcalendar.min.js"></script>
      <script src="template/dashboard/js/matrix.js"></script>
      <script src="template/dashboard/js/matrix.dashboard.js"></script>
      <script src="template/dashboard/js/jquery.gritter.min.js"></script>
      <script src="template/dashboard/js/matrix.interface.js"></script>
      <script src="template/dashboard/js/matrix.chat.js"></script>
      <script src="template/dashboard/js/jquery.validate.js"></script>
      <script src="template/dashboard/js/matrix.form_validation.js"></script>
      <script src="template/dashboard/js/jquery.wizard.js"></script>
      <script src="template/dashboard/js/jquery.uniform.js"></script>
      <script src="template/dashboard/js/select2.min.js"></script>
      <script src="template/dashboard/js/matrix.popover.js"></script>
      <script src="template/dashboard/js/jquery.dataTables.min.js"></script>
      <script src="template/dashboard/js/matrix.tables.js"></script>

      <script type="text/javascript">
        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage(newURL) {

          // if url is empty, skip the menu dividers and reset the menu selection to default
          if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-") {
              resetMenu();
            }
            // else, send page to designated URL            
            else {
              document.location.href = newURL;
            }
          }
        }

        // resets the menu selection upon entry to this page:
        function resetMenu() {
          document.gomenu.selector.selectedIndex = 2;
        }
      </script>
    </body>

    </html>
<?php
  }
} else {
  header('location: logout.php');
}
ob_flush();
?>