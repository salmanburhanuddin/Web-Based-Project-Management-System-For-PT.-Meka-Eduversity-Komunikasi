<?php
if (isset($_SESSION['username'])) {

  $query = "select * from tb_user natural join tb_level where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);

  while ($r = mysqli_fetch_array($sql)) {
    if ($r['id_level'] == 1) { ?>
      <li><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li class="active"> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
      <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
      <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
      <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
      <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
    <?php
    } else if ($r['id_level'] == 2) {
    ?>
      <li><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Daftar Project</span></a> </li>
      <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
      <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
      <li> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
      <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
    <?php
    } else if ($r['id_level'] == 3) {
    ?>
      <li><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Daftar Project</span></a> </li>
      <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
      <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
      <li> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
      <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
    <?php
    } else if ($r['id_level'] == 4) {
    ?>
      <li><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Daftar Project</span></a> </li>
      <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
      <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
      <li> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
      <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
    <?php
    } else if ($r['id_level'] == 5) {
    ?>
      <li><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Daftar Project</span></a> </li>
      <!-- <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
      <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
      <li> <a href="user_management.php"><i class="icon icon-user"></i> <span>User Management</span></a> </li>
      <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
    <?php
    }
    ?>

<?php }
} ?>