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
          <li class="active"> <a href="manage_pic.php"><i class="icon icon-tasks"></i> <span>Manage PIC</span></a> </li>
          <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
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
                
                  <table class="table table-bordered table-invoice-full" id="table-laporan">
                    <thead>
                      <tr>
                        <th class="head0">No.</th>
                        <th class="head1">PIC Project</th>
                        <th class="head0">Anggota Project</th>
                      </tr>

                      <?php
                      $no=1;
                      ?>
                    </thead>
                    
                    <tbody>
                      <?php

                      
                      ?>
                        <tr class="odd gradeX">
                          <td>
                            <center><?phpecho $no++;?>.</center>
                          </td>
                          <td></td>
                          <td></td> 
                        </tr>
                      <?php
                      ?>
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
      <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; Restaurant <a href="#">by Group 3</a> </div>
    </div>

    <!--end-Footer-part-->
    <script src="template/dashboard/js/jquery.min.js"></script>
    <script type="text/javascript" src="template/js/datatables.min.js"></script>
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
<style>
  .dataTables_filter {
    margin-top: -30px !important;
  }
</style>