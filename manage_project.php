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
  //harus dipelajari dan dipahami
  $query = "select * from tb_user user join tb_level level on user.id_level = level.id_level where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);

  while ($r = mysqli_fetch_array($sql)) {
    $nama_user = $r['nama_user'];
    $username = $r['username'];
    $nama_level = $r['nama_level'];
    $level = $r['id_level'] == 1 ? '' : $r['id_level'];
    $level_side = $r['id_level'];
  }
?>

  <html lang="en">

  <head>
    <title>Manage Project</title>
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
    <link rel="stylesheet" type="text/css" href="template/css/datatables.min.css"/>

  </head>

  <body>
    <!--Header-part-->
    <div id="header">
      <h1><a href="manage_project.php">Manage Project</a></h1>
    </div>
    <!--close-Header-part-->


    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
      <ul class="nav">
        <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span class="text">Welcome <?= $nama_user . ', ' . $nama_level ?></span><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-user"></i><?php echo "&nbsp;&nbsp;" . $nama_level; ?></a></li>
            <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
          </ul>
        </li>
        <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
      </ul>
    </div>

    <div id="sidebar"><a href="manage_project.php" class="visible-phone"><i class="icon icon-tasks"></i> <span>Manage Project</span></a>
      <ul>
        <?php
        if ($level_side == 1) {
        ?>
          <li><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
          <li class="active"> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
          <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        } else if ($level_side == 2) {
        ?>
          <li> <a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li class="active"> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        } else if ($level_side == 3) {
        ?>
          <li> <a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li  class="active"> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        } else if ($level_side == 4) {
        ?>
          <li> <a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li class="active"> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        } else if ($level_side == 5) {
        ?>
          <li><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li class="active"> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        <?php
        }
        ?>
      </ul>
    </div>

    <!--main-container-part-->
    <div id="content">
      <!--breadcrumbs-->
      <div id="content-header">
        <div id="breadcrumb"> <a href="manage_project.php" title="Go to here" class="tip-bottom"><i class="icon icon-tasks"></i> Manage Project</a></div>
      </div>
      <!--End-breadcrumbs-->

      <!--Action boxes-->
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="widget-box">
            <div class="widget-title bg_lg"><span class="icon"><i class="icon-th-large"></i></span>
              <h5>Manage Project</h5>
              <a href="add_project.php" class="btn btn-info btn-mini label"><i class="icon-plus"></i>&nbsp;Add Project</a>
            </div>
          </div>
          <?php
          //harus dipelajari (manggil level)
          $where_level = $level ? "WHERE level.id_level = '$level'" : "";
          $q_get_level = "SELECT user.username, level.id_level, nama_level FROM tb_level level join tb_user user on user.id_level = level.id_level " . $where_level .  " group by level.id_level";

          $sql_get_level = mysqli_query($conn, $q_get_level);
          while ($dt = mysqli_fetch_object($sql_get_level)) {
            $pic = $level ? $username : $dt->username;
            $lvl = $dt->id_level;
          ?>
            <!--Project-->
            <div class="widget-box">
              <?php
              //harus dipelajari
              $where_lvl = $level ? "" : "where u1.id_level = '$lvl'";
              $where_pic = $level ? "WHERE u1.username = '$pic' or u2.username = '$pic'" : "";
              //code untuk liat project berdasarkan anggota dan pic
              $query_data_wtr = "select dp.*, u1.username as pic, u2.id_user, u2.username as anggota from tb_data_project dp 
                                JOIN tb_anggota_project ap ON ap.id_project = dp.id_project
                                JOIN tb_user u1 ON dp.project_pic = u1.username 
                                JOIN tb_user u2 ON ap.id_user = u2.id_user 
                                join tb_level level on level.id_level = u1.id_level 
                                join tb_history_status history on history.id_project = dp.id_project " . $where_lvl . $where_pic . " GROUP BY
                                history.id_project";
              //149 manggil project bedasarkan pic
              $sql_data_wtr = mysqli_query($conn, $query_data_wtr);
              // print_r($query_data_wtr);
              // while ($r_dt_wtr = mysqli_fetch_object($sql_data_wtr)) {

              // }
              $no = 1;
              ?>

              <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Project <?= $dt->nama_level ?></h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-manage-project" style="width: 100%">
                  <thead>
                    <tr>
                      <th style="width:5%">Id Project.</th>
                      <th style="width:15%">Nama Project</th>
                      <th>Project PIC</th>
                      <th>Anggota Project</th>
                      <th>Fase</th>
                      <th>Status</th>
                      <th>Progress</th>
                      <th>Keterangan</th>
                      <th>File</th>
                      <th>Created By</th>
                      <th style="width:15%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while ($r_dt_wtr = mysqli_fetch_object($sql_data_wtr)) {
                      $anggota = '';
                      // echo '<pre>',print_r($r_dt_wtr,1),'</pre>';

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
                      //harus dipelajari
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
                        <td><?php echo $r_dt_wtr->fase; ?></td>
                        <td><?php echo $r_dt_wtr->status; ?></td>
                        <td><?= $progress ?></td>
                        <td><?= $r_dt_wtr->keterangan ?></td>
                        <td><a href="aset/<?=$r_dt_wtr->file?>" target="_blank"><?=$r_dt_wtr->file ? 'Lihat File' : ''?></a></td>
                        <td><?= $r_dt_wtr->created_by ?></td>
                        <td>
                          <form action="" method="post">
                            <button type="submit" value="<?php echo $r_dt_wtr->id_project; ?>" name="edit_menu" class="btn btn-success btn-mini"><i class='icon-pencil'></i>&nbsp;&nbsp;Edit &nbsp;&nbsp;</button>
                            <button type="submit" value="<?php echo $r_dt_wtr->id_project; ?>" name="hapus_menu" class="btn btn-mini btn-danger"><i class='icon icon-trash'></i>&nbsp; Hapus</button>
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

                      $query_delete_history = "delete from tb_history_status where id_project = '$id_project'";;
                      $sql_delete_history = mysqli_query($conn, $query_delete_history);
                      //dibawah ini query ketika hapus project headernya bakal diatas page ini
                      if ($sql_hapus_masakan && $sql_hapus_anggota) {
                        header('location: manage_project.php');
                      }
                    }
                    //ketika tombol edit menu dipencet dia bakal detect tombol edit project mana yang user pencet   
                    if (isset($_REQUEST['edit_menu'])) {
                      //echo $_REQUEST['hapus_menu'];
                      $id_masakan = $_REQUEST['edit_menu'];
                      $_SESSION['edit_menu'] = $id_masakan;
                      //ketika edit menu dipencet dia bakal pindah ke tambah project
                      header('location: add_project.php');
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          <? }

          if ($r['id_level'] == 1) {
          ?>

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
      <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; Project Management System <a href="#">by Muhammad Salman Burhanddin</a> </div>
    </div>

    <!--end-Footer-part-->
    <script src="template/dashboard/js/jquery.min.js"></script> 
    <script type="text/javascript" src="template/js/datatables.min.js"></script> 

    <script type="text/javascript">
      $(document).ready(function() {
        $('.table-manage-project').DataTable();
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
  .dataTables_filter{
    margin-top: -30px !important;
  }
</style>