<!DOCTYPE html>
<style>
  table {
    border: solid #000 !important;
    border-width: 1px 0 0 1px !important;
  }

  th,
  td {
    border: solid #000 !important;
    border-width: 0 1px 1px 0 !important;
  }
</style>
<html>

<head>
  <title>CETAK LAPORAN</title>
</head>

<body>

  <center>

    <h2>DATA LAPORAN PROJECT</h2>

  </center>

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

    <table>
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Project</th>
          <th>PIC Project</th>
          <th>Anggota Project</th>
          <th>Status</th>
          <th>Progress</th>
          <th>Keterangan</th>
          <th>File</th>
          <th>Dibuat Oleh</th>
          <th>Tanggal Dibuat</th>
        </tr>
      </thead>
      <?php
      $no = 1;
      $where = $level ? "where project_pic = '$username'" : "";
      if (isset($_SESSION['hari']) || isset($_SESSION['bulan'])) {
        $hari = $_SESSION['hari'];
        $bulan = $_SESSION['bulan'];
        $status = $_SESSION['status'];

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
                <img class="img-thumbnail" src="aset/<?= $r_dt_wtr->file ?>" style="width: 100px;">
              <?php } else {
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

    <script>
      window.print();
    </script>

</body>

</html>
<?php
  } else {
    header('location: logout.php');
  }
  ob_flush();
?>