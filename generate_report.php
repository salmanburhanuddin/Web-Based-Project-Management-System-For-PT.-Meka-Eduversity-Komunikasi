<!DOCTYPE html>
<style>
  .navbar {
    min-height: 40px !important;
  }
</style>
<?php
include "connection/koneksi.php";
session_start();
ob_start();

$id = $_SESSION['id_user'];


if (isset($_SESSION['edit_order'])) {
  //echo $_SESSION['edit_order'];
  unset($_SESSION['edit_order']);
}

if (isset($_SESSION['username'])) {

  $query = "select * from tb_user natural join tb_level where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);

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
    <title>Generate Report</title>
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
    <link rel="stylesheet" type="text/css" href="template/css/datatables.min.css" />
  </head>

  <body>

    <!--Header-part-->
    <div id="header">
      <h1><a href="generate_report.php">Generate Report</a></h1>
    </div>
    <!--close-Header-part-->


    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
      <ul class="nav">
        <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span class="text">Welcome <?= $nama_user ?></span><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-user"></i><?php echo "&nbsp;&nbsp;" . $nama_level; ?></a></li>
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
    <div id="sidebar"><a href="generate_report.php" class="visible-phone"><i class="icon icon-print"></i> <span>Generate</span></a>
      <ul>
        <?php
        if ($level_side == 1) {
        ?>
          <li><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
          <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
          <li class="active"> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        } else if ($level_side == 2) {
        ?>
          <li> <a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li class="active"> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        } else if ($level_side == 3) {
        ?>
          <li> <a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li class="active"> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        } else if ($level_side == 4) {
        ?>
          <li> <a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li class="active"> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        } else if ($level_side == 5) {
        ?>
          <li> <a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li class="active"> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
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
        <div id="breadcrumb"> <a href="generate_report.php" title="Go to here"><i class="icon icon-print"></i> Generate Report</a></div>
      </div>
      <!--End-breadcrumbs-->

      <div class="container-fluid">
        <?php
        $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        if ($level_side == 1 || $level_side == 2 || $level_side == 3 || $level_side == 4 || $level_side == 5) {
        ?>

          <div class="row-fluid">
            <div class="col-12">
              <div class="widget-box">
                <div class="widget-title bg_lg"><span class="icon"><i class="icon-th-large"></i></span>
                  <h5>Overall Report</h5>
                </div>
                <div class="widget-content nopadding">
                  <div class="row-fluid ml-4">
                    <h6 class="ml-2">Filter:</h6>
                    <form action="" method="post">
                      <select class="selectpicker" name="hari">
                        <option value="">Pilih Hari</option>
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
                      <select class="selectpicker" name="status">
                        <option value="">Pilih Status</option>

                        <?php
                        $status_arr = array('1' => 'Selesai', '2' => 'Berlangsung', '3' => 'Ditunda', '4' => 'Batal' , '5' => 'Rencana');
                        foreach ($status_arr as $key => $status) { ?>
                          <option value="<?= $status ?>" <?= isset($_POST['status']) ? ($_POST['status'] == $status ? 'selected' : '') : '' ?>>
                            <?= $status; ?>
                          </option>

                        <?php } ?>
                      </select>
                      <button type="submit" class="btn btn-info" name="search">Search</button>
                      <a type="submit" class="btn btn-success" href="print_report.php" target="_blank" name="cetak"><i class="icon icon-print"></i> Print Report</a>
                    </form>
                  </div>
                  <table class="table table-bordered table-invoice-full" id="table-laporan">
                    <thead>
                      <tr>
                        <th class="head0">No.</th>
                        <th class="head0">Nama Project</th>
                        <th class="head1">PIC Project</th>
                        <th class="head0">Anggota Project</th>
                        <th class="head0">Status</th>
                        <th class="head0">Progress</th>
                        <th class="head0">Keterangan</th>
                        <th class="head0">File</th>
                        <th class="head0">Dibuat Oleh</th>
                        <th class="head0">Tanggal Dibuat</th>
                      </tr>
                    </thead>
                    <?php
                    $no = 1;
                    $where = $level ? "where project_pic = '$username'" : "";
                    if (isset($_POST['search'])) {
                      $hari = $_POST['hari'];
                      $bulan = $_POST['bulan'];
                      $status = $_POST['status'];

                      $_SESSION['hari'] = $hari;
                      $_SESSION['bulan'] = $bulan;
                      $_SESSION['status'] = $status;

                      $filter_hari = $hari ? " AND DAY(dp.created_at) = '$hari'" : "";
                      $filter_bulan = $bulan ? " AND MONTH(dp.created_at) = '$bulan'" : "";
                      $filter_status = $status ? " AND dp.status = '$status'" : "";
                    } else {
                      $filter_hari = "";
                      $filter_bulan = "";
                      $filter_status = "";
                    }

                    $query_data_wtr = "select dp.* from tb_data_project dp 
                                        join tb_user user on dp.project_pic = user.username 
                                        join tb_level level on level.id_level = user.id_level 
                                        join tb_history_status history on history.id_project = dp.id_project " . $where . $filter_hari . $filter_bulan . $filter_status . " GROUP BY
                                        history.id_project";

                    $sql_data_wtr = mysqli_query($conn, $query_data_wtr);
                    ?>
                    <tbody>
                      <?php

                      while ($r_dt_wtr = mysqli_fetch_object($sql_data_wtr)) {
                        $anggota = '';

                        if (strtolower($r_dt_wtr->status) == 'selesai') {
                          $progress = '100%';
                        } else if (strtolower($r_dt_wtr->status) == 'berlangsung') {
                          $progress = $r_dt_wtr->progress ? $r_dt_wtr->progress . '%' : '0%';
                        } else if (strtolower($r_dt_wtr->status) == 'ditunda') {

                          $idProject = $r_dt_wtr->id_project;
                          $q_get_status_now = "SELECT history.*, dp.progress FROM tb_history_status history JOIN tb_data_project dp ON dp.id_project = history.id_project where history.id_project = '$idProject' order by history.created_at desc";

                          $sql_status_now = mysqli_query($conn, $q_get_status_now);
                          $i = 0;
                          while ($status = mysqli_fetch_object($sql_status_now)) {
                            if ($i == 1) {
                              if (strtolower($status->status) == 'selesai') {
                                $progress = '100%';
                              } else if (strtolower($status->status) == 'berlangsung') {
                                $progress = $status->progress ? $status->progress . '%' : '0%';
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

                        $where_anggota = "where ap.id_project = '$r_dt_wtr->id_project'";
                        $query_data_anggota = "select * from tb_data_project dp  
                                       join tb_anggota_project ap on dp.id_project = ap.id_project
                                       join tb_user user on ap.id_user = user.id_user  " . $where_anggota;
                        $sql_data_anggota = mysqli_query($conn, $query_data_anggota);

                        while ($dt_anggota = mysqli_fetch_object($sql_data_anggota)) {
                          $anggota .= $dt_anggota->username . ', ';
                        }
                      ?>
                        <tr class="odd gradeX">
                          <td>
                            <center><?php echo $no++; ?>.</center>
                          </td>
                          <td><?php echo $r_dt_wtr->nama_project; ?></td>
                          <td><?php echo $r_dt_wtr->project_pic; ?></td>
                          <td><?= rtrim($anggota, ', ') ?></td>
                          <td><?php echo $r_dt_wtr->status; ?></td>
                          <td><?= $progress ?></td>
                          <td><?= $r_dt_wtr->keterangan ?></td>
                          <td><?php if ($r_dt_wtr->file) { ?>
                              <img class="img-thumbnail" src="aset/<?= $r_dt_wtr->file ?>">
                            <?php } else{
                              // echo 'File not found';
                            } ?>
                          </td>
                          <td><?= $r_dt_wtr->created_by ?></td>
                          <td><?= date("d-m-Y", strtotime($r_dt_wtr->created_at)) ?></td>
                        </tr>
                      <?php
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>

    <!--end-main-container-part-->

    <!--Footer-part-->

    <div class="row-fluid">
      <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; Project Management System <a href="#">by M Salman Burhanuddin</a> </div>
    </div>

    <!--end-Footer-part-->
    <script src="template/dashboard/js/jquery.min.js"></script>
    <script type="text/javascript" src="template/js/datatables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#table-laporan').DataTable();
      });
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
<style>
  .dataTables_filter {
    margin-top: -30px !important;
  }
</style>