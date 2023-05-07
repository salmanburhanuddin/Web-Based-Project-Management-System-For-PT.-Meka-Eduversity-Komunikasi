<!DOCTYPE html>

<?php
include "connection/koneksi.php";
session_start();
ob_start();

$id = $_SESSION['id_user'];

if (isset($_SESSION['username'])) {
  $query = "select * from tb_user natural join tb_level where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);
  $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

  while ($r = mysqli_fetch_array($sql)) {
    $username = $r['username'];
    $nama_level = $r['nama_level'];
    $nama_user = $r['nama_user'];
    $level = $r['id_level'] == 1 ? '' : $r['id_level'];
    $level_side = $r['id_level'];
  }
?>

  <html lang="en">

  <head>
    <title>Dashboard</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="template/rekomendasi menu/style.css" />
    <!--CSS For Menu Recommendation-->
    <link rel="stylesheet" href="template/dashboard/css/bootstrap.min.css" />
    <link rel="stylesheet" href="template/dashboard/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="template/dashboard/css/fullcalendar.css" />
    <link rel="stylesheet" href="template/dashboard/css/matrix-style.css" />
    <link rel="stylesheet" href="template/dashboard/css/matrix-media.css" />
    <link href="template/dashboard/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="template/dashboard/css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  </head>

  <body>

    <!--Header-part-->
    <div id="header">
      <h1><a href="dashboard.php">Dashboard</a></h1>
    </div>
    <!--close-Header-part-->


    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
      <ul class="nav">
        <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span class="text">Welcome <?php echo $nama_user ?></span><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-user"></i><?php echo "&nbsp;&nbsp;" . $nama_level ?></a></li>
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
    <div id="sidebar"><a href="dashboard.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
      <ul>
        <?php
        if ($level_side == 1) {
        ?>
          <li class="active"><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
          <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li> <a href="manage_pic.php"><i class="icon icon-tasks"></i> <span>Manage PIC</span></a> </li>
          <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
          <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        } else if ($level_side == 2) {
        ?>
          <li class="active"><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        } else if ($level_side == 3) {
        ?>
          <li class="active"><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        } else if ($level_side == 4) {
        ?>
          <li class="active"><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        } else if ($level_side == 5) {
        ?>
          <li class="active"><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
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
        <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a></div>
      </div>
      <!--End-breadcrumbs-->

      <!--Action boxes-->
      <div class="container-fluid">
        <div class="row-fluid">
          <?php
          if ($level_side == 1 || $level_side == 2 || $level_side == 3 || $level_side == 4 || $level_side == 5) {
          ?>
            <div class="widget-box">
              <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                <h5>Dashboard</h5>
              </div>
              <div class="widget-content">
                <div class="row-fluid ml-4">
                  <h6 class="ml-2">Filter:</h6>
                  <form action="" method="post">
                    <select class="selectpicker" name="hari">
                      <option value="">Pilih Hari</option>
                      <!--Dipelajari-->
                      <?php for ($i = 1; $i <= 31; $i++) { ?>
                        <option value="<?= $i; ?>" <?= isset($_POST['hari']) ? ($_POST['hari'] == $i ? 'selected' : '') : '' ?>>
                          <?= $i; ?>
                        </option>

                      <?php } ?>
                    </select>

                    <select class="selectpicker" name="bulan">
                      <option value="">Pilih Bulan</option>

                      <?php foreach ($bulan as $key => $bln) { ?>
                        <option value="<?= ($key + 1); ?>" <?= isset($_POST['bulan']) ? ($_POST['bulan'] == ($key + 1) ? 'selected' : '') : '' ?>>
                          <?= $bln; ?>
                        </option>

                      <?php } ?>
                    </select>
                    <button type="submit" class="btn btn-info" name="search">Search</button>
                  </form>
                </div>
                <?php
                //Jumlah Administrator
                $query_jml_adm = "select count(*) AS jumlah_adm from tb_user natural join tb_level where id_level = 1 and status = 'aktif'";
                $sql_jml_adm = mysqli_query($conn, $query_jml_adm);
                $result_adm = mysqli_fetch_array($sql_jml_adm);

                //Jumlah Waiter
                $query_jml_wtr = "select count(*) AS jumlah_wtr from tb_user natural join tb_level where id_level = 2 and status = 'aktif'";
                $sql_jml_wtr = mysqli_query($conn, $query_jml_wtr);
                $result_wtr = mysqli_fetch_array($sql_jml_wtr);

                //Jumlah Kasir
                $query_jml_ksr = "select count(*) AS jumlah_ksr from tb_user natural join tb_level where id_level = 3 and status = 'aktif'";
                $sql_jml_ksr = mysqli_query($conn, $query_jml_ksr);
                $result_ksr = mysqli_fetch_array($sql_jml_ksr);

                //Jumlah Owner
                $query_jml_own = "select count(*) AS jumlah_own from tb_user natural join tb_level where id_level = 4 and status = 'aktif'";
                $sql_jml_own = mysqli_query($conn, $query_jml_own);
                $result_own = mysqli_fetch_array($sql_jml_own);

                //Jumlah Pelanggan
                $query_jml_plg = "select count(*) AS jumlah_plg from tb_user natural join tb_level where id_level = 5 and status = 'aktif'";
                $sql_jml_plg = mysqli_query($conn, $query_jml_plg);
                $result_plg = mysqli_fetch_array($sql_jml_plg);
                
                //ngambil level
                $where_level = $level ? "WHERE level.id_level = '$level'" : "";
                $q_get_level = "SELECT user.username, level.id_level, nama_level FROM tb_level level join tb_user user on user.id_level = level.id_level " . $where_level . " group by level.id_level";
                
                //harus dipelajari dan dipahami
                $sql_get_level = mysqli_query($conn, $q_get_level);

                if (isset($_POST['search'])) {
                  $hari = $_POST['hari'];
                  $bulan = $_POST['bulan'];

                  $_SESSION['hari'] = $hari;
                  $_SESSION['bulan'] = $bulan;
                  //dp nya kudu dipahami
                  $filter_hari = $hari ? " AND DAY(dp.created_at) = '$hari'" : "";
                  $filter_bulan = $bulan ? " AND MONTH(dp.created_at) = '$bulan'" : "";
                } else {
                  $filter_hari = "";
                  $filter_bulan = "";
                }
                
                //id 
                while ($dt = mysqli_fetch_object($sql_get_level)) {
                  $pic = $level ? $username : $dt->username;
                  $lvl = $dt->id_level;
                  

                  //harus dipelajari dan dipahami
                  $where = "where project_pic = '$pic' and user.id_level = '$lvl'";
                  $query_data_wtr = "select dp.*, user.username from tb_data_project dp 
                      join tb_user user on dp.project_pic = user.username 
                      join tb_level level on level.id_level = user.id_level 
                      join tb_history_status history on history.id_project = dp.id_project " . $where . $filter_hari . $filter_bulan . " GROUP BY
                      history.id_project";

                  $sql_data_wtr = mysqli_query($conn, $query_data_wtr);
                  $anggota = '';
                  while ($r_dt_wtr = mysqli_fetch_object($sql_data_wtr)) {
                    if (strtolower($r_dt_wtr->status) == 'selesai') {
                      $progress = '100%';
                    } else if (strtolower($r_dt_wtr->status) == 'berlangsung') {
                      $progress = $r_dt_wtr->progress ? $r_dt_wtr->progress . '%' : '0%';
                    } else if (strtolower($r_dt_wtr->status) == 'ditunda') {
                      $idProject = $r_dt_wtr->id_project;
                      $q_get_status_now = "SELECT * FROM tb_history_status where id_project = '$idProject' order by created_at desc";

                      $sql_status_now = mysqli_query($conn, $q_get_status_now);
                      $i = 0;
                      while ($status = mysqli_fetch_object($sql_status_now)) {
                        if ($i == 1) {
                          if (strtolower($status->status) == 'selesai') {
                            $progress = '100%';
                          } else if (strtolower($status->status) == 'berlangsung') {
                            $progress = $r_dt_wtr->progress ? $r_dt_wtr->progress . '%' : '0%';
                          } else if (strtolower($status->status) == 'dibatalkan') {
                            $progress = '0%';
                          } else {
                            $progress = '';
                          }
                        }
                        $i++;
                      }
                    } else if (strtolower($r_dt_wtr->status) == 'dibatalkan') {
                      $progress = '0%';
                    } else {
                      $progress = '';
                    }
                    //nampilin anggota 
                    $anggota .= $r_dt_wtr->username . ', ';
                    $data[$r_dt_wtr->status][] = $r_dt_wtr;
                  }
                } ?>
                <div class="row-fluid">
                  <div class="span3">
                    <div class="widget-box">
                      <div class="widget-content nopadding">
                        <ul class="site-stats quick-actions">
                          <li class="bg_lb"><i class="icon-user"></i> <strong><?= isset($data['Rencana']) ? count($data['Rencana']) : 0 ?></strong> <small>Total Rencana</small></li>
                          <li class="bg_ly"><i class="icon-user"></i> <strong><?= isset($data['Berlangsung']) ? count($data['Berlangsung']) : 0 ?></strong> <small>Total Berlangsung</small></li>
                          <li class="bg_lg"><i class="icon-user"></i> <strong><?= isset($data['Selesai']) ? count($data['Selesai']) : 0 ?></strong> <small>Total Selesai</small></li>
                          <li class="bg_ls"><i class="icon-user"></i> <strong><?= isset($data['Ditunda']) ? count($data['Ditunda']) : 0 ?></strong> <small>Total Ditunda</small></li>
                          <li class="bg_lo"><i class="icon-user"></i> <strong><?= isset($data['Batal']) ? count($data['Batal']) : 0 ?></strong> <small>Total Batal</small></li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div style="position:absolute; top:160px; left:300px; width:500px; height:500px;">
                    <canvas id="inicanvas"></canvas>
                    <script>
                      var ctx = document.getElementById("inicanvas").getContext("2d");
                      ctx.canvas.width = 50;
                      ctx.canvas.height = 50;
                      // tampilan chart
                      var piechart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                          // label nama setiap Value
                          labels: [
                            'Total Rencana',
                            'Total Berlangsung',
                            'Total Selesai',
                            'Total Ditunda',
                            'Total Batal'
                          ],
                          datasets: [{
                            // Jumlah Value yang ditampilkan
                            data: [<?= isset($data['Rencana']) ? count($data['Rencana']) : 0 ?>,
                              <?= isset($data['Berlangsung']) ? count($data['Berlangsung']) : 0 ?>,
                              <?= isset($data['Selesai']) ? count($data['Selesai']) : 0 ?>,
                              <?= isset($data['Ditunda']) ? count($data['Ditunda']) : 0 ?>,
                              <?= isset($data['Batal']) ? count($data['Batal']) : 0 ?>
                            ],

                            backgroundColor: [
                              "#27a9e3",
                              "#ffb848",
                              "#28b779",
                              "#2255a4",
                              "#da542e"
                            ]
                          }],
                        }
                      });
                    </script>
                  </div>
                  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                  <br><br><br><br>
                </div>
              </div>
            </div>
          <?php
          } else {
          ?>
            <div class="alert alert-orange alert-block">
              <center>
                <h4 class="alert-heading">SELAMAT DATANG</h4>
                Di Sistem Pelayanan Restaurant Cepat Saji.
                <br> Semoga Hari Anda Menyenangkan.
              </center>

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
      <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; Project Management System <a href="#">By M Salman Burhanuddin</a> </div>
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
} else {
  header('location: logout.php');
}
ob_flush();
?>