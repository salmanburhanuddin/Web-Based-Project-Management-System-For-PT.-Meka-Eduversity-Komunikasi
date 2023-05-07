<!DOCTYPE html>

<?php
include "connection/koneksi.php";
session_start();
ob_start();
//echo $_SESSION['edit_menu'];
$id = $_SESSION['id_user'];

if (isset($_SESSION['username'])) {

  $query = "select * from tb_user natural join tb_level where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);

  $id_project = "";
  $nama_project = "";
  $status = "";
  $pic = "";
  $anggota = "";
  $progress = "";

  $q_anggota = "select * from tb_user where status = 'aktif'";
  $anggota_project = mysqli_query($conn, $q_anggota);

  $q_pic = "select * from tb_user where status = 'aktif'";
  $pic_project = mysqli_query($conn, $q_pic);

  if (isset($_SESSION['edit_menu'])) {
    $id = $_SESSION['edit_menu'];
    $query_data_edit = "select * from tb_data_project where id_project = $id";
    $sql_data_edit = mysqli_query($conn, $query_data_edit);
    $result_data_edit = mysqli_fetch_object($sql_data_edit);

    $query_data_edit2 = "select id_user from tb_anggota_project where id_project = $id";
    $sql_data_edit2 = mysqli_query($conn, $query_data_edit2);

    $id_project = $result_data_edit->id_project;
    $nama_project = $result_data_edit->nama_project;
    $fase = $result_data_edit->fase;
    $status = $result_data_edit->status;
    $pic = $result_data_edit->project_pic;
    $progress = $result_data_edit->progress;
    $keterangan = $result_data_edit->keterangan;
    $file = $result_data_edit->file;
  

    while ($dt = mysqli_fetch_object($sql_data_edit2)) {
      $dt_anggota[] = $dt->id_user;
    }
    $anggota = isset($dt_anggota) ? $dt_anggota : [];
  } else {
    $anggota = [];
  }

  while ($r = mysqli_fetch_array($sql)) {

    $nama_user = $r['nama_user'];

?>

    <html lang="en">

    <head>
      <title>Edit Data Project</title>
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
        <h1><a href="manage_project.php">Manage Project</a></h1>
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
      <div id="sidebar">
        <a href="manage_project.php" class="visible-phone">
          <i class="icon icon-tasks"></i> <span>Manage Project</span>
        </a>
        <ul>
          <li> <a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="manage_project.php"><i class="icon icon-tasks"></i> <span>Manage Project</span></a> </li>
          <!-- <li class="active"> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Anggota Project</span></a> </li> -->
          <li> <a href="generate_report.php"><i class="icon icon-print"></i> <span>Generate Report</span></a> </li>
          <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
        </ul>
      </div>
      <!--sidebar-menu-->

      <!--main-container-part-->
      <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
          <div id="breadcrumb">
            <a href="manage_project.php" title="Entri Referensi" class="tip-bottom">
              <i class="icon icon-tasks"></i>
              Manage Project
            </a>
            <?php
            if (isset($_SESSION['edit_menu'])) {
            ?>
              <a href="add_project.php" title="Tambah Menu" class="tip-bottom">
                <i class="icon icon-tasks"></i>
                Edit Project Detail
              </a>
            <?php
            } else {
            ?>
              <a href="add_project.php" title="Tambah Menu" class="tip-bottom">
                <i class="icon icon-tasks"></i>
                Add Project
              </a>
            <?php
            }
            ?>
          </div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
          <div class="row-fluid">
            <div class="widget-box span6">
              <div class="widget-title bg_lg"><span class="icon"><i class="icon-th-large"></i></span>
                <h5>Add Project</h5>
              </div>
              <div class="widget-content">
                <form action="" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="control-group">
                    <label class="control-label">Nama Project:</label>
                    <div class="controls">
                      <input name="nama_project" type="text" value="<?php echo $nama_project; ?>" class="span11" placeholder="Nama Project" />
                    </div>
                  </div>
                  <!--<div class="control-group">
                    <label class="control-label">Status Project:</label>
                    <div class="controls">
                      <input id="status" name="status" type="text" value=" class="span11" placeholder="Status Project" />
                    </div>*/
                  </div>--> 
                  <div class="control-group">
                    <label class="control-label">Status Project</label>
                    <div class="controls">
                      <select class="span11" name="Status">
                        <!--<option value="1">Administrator</option>-->
                        <option value="Rencana">Rencana</option>
                        <option value="Berlangsung">Berlangsung</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Ditunda">Ditunda</option>
                        <option value="Batal">Batal</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Fase Project</label>
                    <div class="controls">
                      <select class="span11" name="fase">
                        <!--<option value="1">Administrator</option>-->
                        <option value="Analisa">Analisa</option>
                        <option value="Design">Design</option>
                        <option value="Development">Development</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group form-progress">
                    <label class="control-label">Progress</label>
                    <div class="controls">
                      <input name="progress" type="number" value="<?= $progress ? $progress : '' ?>" class="span11" placeholder="Progress" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Project PIC:</label>
                    <div class="controls">
                      <!--<input name="pic" type="text" value="<?php //echo $pic; ?>" class="span11" placeholder="Project PIC" />-->
                      <select class="span11" name="pic">
                        <?php
                        //Query Select
                          $query_get_pic = 
                          'SELECT u.id_user "id_user",
                                  u.username "username",
                              COUNT(id_project) "count_project"
                          FROM tb_user u
                          LEFT JOIN tb_data_project p ON u.username = p.project_pic
                          GROUP BY u.id_user,
                                u.username,
                                u.nama_user
                          HAVING count_project <= 10
                          ORDER BY u.id_user ASC,
                                u.username ASC';
                          
                          //Get Resultset
                          $pic_resultset = mysqli_query($conn, $query_get_pic)->fetch_all(MYSQLI_ASSOC);

                          for($i = 0; $i < sizeof($pic_resultset); $i++){
                            echo "<option value='".$pic_resultset[$i]['username']."'>".$pic_resultset[$i]['username']." (".$pic_resultset[$i]['count_project']." Projects)</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Anggota Project:</label>
                    <div class="control-group">
                      <div class="controls">
                        <select class="selectpicker" name="anggota[]" id="multiple-anggota" multiple data-live-search="true">
                          <?php while ($data = mysqli_fetch_object($anggota_project)) {
                          ?>
                            <option value="<?= $data->id_user; ?>" <?php if (in_array($data->id_user, $anggota)) echo 'selected="selected"'; ?>>
                              <?= $data->username; ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Keterangan:</label>
                    <div class="controls">
                      <textarea id="keterangan" name="keterangan" type="text" value="<?php echo $keterangan; ?>" class="span11" placeholder="Keterangan" rows="2"><?= isset($keterangan) ? $keterangan : '' ?></textarea>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Upload:</label>
                    <div class="controls">
                      <input type="file" name="file_upload"> 
                      <?php 
                      if (isset($file)) { ?>
                        <a href="aset/<?=$file?>" target="_blank"><?=$file?></a>
                      <?php }
                      ?>
                    </div>
                  </div>

                  <div class="form-actions">
                    <?php
                    if (isset($_SESSION['edit_menu'])) {
                    ?>
                      <button type="submit" name="ubah_menu" class="btn btn-info"><i class='icon icon-save'></i>&nbsp; Simpan Perubahan</button>
                    <?php
                    } else {
                    ?>
                      <button type="submit" name="add_project" class="btn btn-success"><i class='icon icon-plus'></i>&nbsp; Tambahkan</button>
                    <?php
                    }
                    ?>
                    <button type="submit" name="batal_menu" class="btn btn-danger"><i class='icon icon-remove'></i>&nbsp; Batalkan</a>
                  </div>
                </form>
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $created_by = isset($_SESSION['username']) ? $nama_user : '';
                $created_at = date("Y-m-d H:i:s");

                if (isset($_POST['add_project'])) {
                  $nama_project = $_POST['nama_project'];
                  $status = $_POST['Status'];
                  $fase = $_POST['fase'];
                  $pic = $_POST['pic'];
                  $progress = $_POST['progress'] ? $_POST['progress'] : 0;
                  $anggota_arr = isset($_POST['anggota']) ? $_POST['anggota'] : [];
                  $pic_arr = isset($_POST['pic']) ? $_POST['pic'] : [];
                  $keterangan = $_POST['keterangan'];

                  $ekstensi_diperbolehkan    = array('pdf', 'docx', 'png', 'jpg', 'jpeg');
                  $nama    = str_replace(' ','', $_FILES['file_upload']['name']);
                  $x        = explode('.', $nama);
                  $ekstensi    = strtolower(end($x));
                  $ukuran        = $_FILES['file_upload']['size'];
                  $file_tmp    = $_FILES['file_upload']['tmp_name'];

                  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                    if ($ukuran < 1044070) {
                      move_uploaded_file($file_tmp, 'aset/' . $nama);
                    }
                  } else {
                    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
                  }

                  if($nama_project == null && $status == null && $pic == null /*&& $progress == null*/ && $anggota_arr == null && $keterangan == null){
                    echo "
                    <script>
                        alert('Silahkan isi semua form!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }else if($nama_project  == null && $status == null){
                    echo "
                    <script>
                        alert('Silahkan isi Nama Project dan Status anda!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }/*else if($pic == null && $progress == null){
                    echo "
                    <script>
                        alert('Silahkan isi PIC dan Progress Project!');
                        window.location = 'add_project.php';
                    </script>
                    ";*/
                  else if($anggota_arr == null){
                    echo "
                    <script>
                        alert('Silahkan isi Anggota Project!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }else if($nama_project == null){
                    echo "
                    <script>
                        alert('Silahkan isi Nama anda!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }else if($status == null){
                    echo "
                    <script>
                        alert('Silahkan isi Password anda!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }else if($progress > 100){
                    echo "
                    <script>
                        alert('Silahkan isi Password anda!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }else if($pic == null){
                    echo "
                    <script>
                        alert('Silahkan isi Username anda!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }else {
                    echo "
                    <script>
                        alert('Proses Registrasi Berhasil');
                        window.location = 'manage_project.php';
                    </script>
                    ";

                  

                  $query_tambah_masakan = "insert into tb_data_project (nama_project, status, keterangan, progress, project_pic, file,created_by, created_at, fase) values 
                  ('$nama_project','$status','$keterangan','$progress','$pic', '$nama', '$created_by', '$created_at', '$fase')";
                  $sql_tambah_masakan = mysqli_query($conn, $query_tambah_masakan);

                  if ($sql_tambah_masakan === TRUE) {
                    $last_id = $conn->insert_id;
                  } else {
                    $last_id = '';
                  }

                  if ($last_id) {
                    $q_insert_history = "insert into tb_history_status (id_project, status, created_by, created_at) values ('$last_id','$status','$created_by', '$created_at')";
                    $sql_insert_history = mysqli_query($conn, $q_insert_history);

                    if (isset($_POST['anggota'])) {
                      foreach ($anggota_arr as $key => $id_user) {
                        $q_insert_anggota = "insert into tb_anggota_project (id_project, id_user) values ('$last_id','$id_user')";
                        $sql_insert_anggota = mysqli_query($conn, $q_insert_anggota);
                      }
                    }
                  }
                  header('location: manage_project.php');
                  }

                  
                }
                if (isset($_REQUEST['batal_menu'])) {
                  //echo $_REQUEST['hapus_menu'];
                  if (isset($_SESSION['edit_menu'])) {
                    unset($_SESSION['edit_menu']);
                  }
                  header('location: manage_project.php');
                }

                if (isset($_POST['ubah_menu'])) {
                  $nama_project = $_POST['nama_project'];
                  $status = $_POST['Status'];
                  $fase = $_POST['fase'];
                  $progress = $_POST['progress'];
                  $pic = $_POST['pic'];
                  $keterangan = $_POST['keterangan'];
                  $anggota_arr = isset($_POST['anggota']) ? $_POST['anggota'] : [];

                  $ekstensi_diperbolehkan    = array('pdf', 'docx', 'png', 'jpg', 'jpeg');
                  $nama    = str_replace(' ','_', $_FILES['file_upload']['name']);
                  $x        = explode('.', $nama);
                  $ekstensi    = strtolower(end($x));
                  $ukuran        = $_FILES['file_upload']['size'];
                  $file_tmp    = $_FILES['file_upload']['tmp_name'];

                  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                    if ($ukuran < 1044070) {
                      move_uploaded_file($file_tmp, 'aset/' . $nama);
                    }
                  } else {
                    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
                  }
              
                  if($nama_project == null /*&& $status == null*/ && $progress == null && $pic == null && $anggota_arr == null){
                    echo "
                    <script>
                        alert('Silahkan isi semua form!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }else if($nama_project == null /*&& $status == null*/){
                    echo "
                    <script>
                        alert('Silahkan isi Nama Project dan Status Project anda!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }else if($progress > 100){
                    echo "
                    <script>
                        alert('Maximal progress 100%!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }else if($pic == null){
                    echo "
                    <script>
                        alert('Silahkan isi Project PIC!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }else if($anggota_arr == null){
                    echo "
                    <script>
                        alert('Silahkan isi Anggota Project anda!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }/*else if($status == null){
                    echo "
                    <script>
                        alert('Silahkan isi Status Project!');
                        window.location = 'add_project.php';
                    </script>
                    ";
                  }*/else {
                    echo "
                    <script>
                        alert('Proses Registrasi Berhasil');
                        window.location = 'index.php';
                    </script>
                    ";
                    /*QUERY UNTUK EDIT DATA PROJECT */
                      
                    if ($_FILES['file_upload']['name']) {
                      $query_ubah_masakan = "update tb_data_project set nama_project = '$nama_project', fase = '$fase', Status = '$status', progress = '$progress', project_pic = '$pic', keterangan = '$keterangan', file = '$nama' where id_project = '$id_project'";
                    } else{
                      $query_ubah_masakan = "update tb_data_project set nama_project = '$nama_project', fase = '$fase', Status = '$status', progress = '$progress', project_pic = '$pic', keterangan = '$keterangan' where id_project = '$id_project'";
                    }
                    
                    $sql_ubah_masakan = mysqli_query($conn, $query_ubah_masakan);

                    $q_insert_history = "insert into tb_history_status (id_project, status, created_by, created_at) values ('$id_project','$status','$created_by', '$created_at')";
                    $sql_insert_history = mysqli_query($conn, $q_insert_history);

                    if (isset($_POST['anggota'])) {
                      $query_delete_anggota = "delete from tb_anggota_project where id_project = '$id_project'";;
                      $sql_delete_anggota = mysqli_query($conn, $query_delete_anggota);

                      foreach ($anggota_arr as $key => $id_user) {
                        $q_insert_anggota = "insert into tb_anggota_project (id_project, id_user) values ('$id_project','$id_user')";
                        $sql_insert_anggota = mysqli_query($conn, $q_insert_anggota);
                      }
                    }

                    if ($sql_ubah_masakan) {
                      unset($_SESSION['edit_menu']);
                      header('location: manage_project.php');
                    }
                  }

                  
                }
                ?>
              </div>
            </div>
          </div>

          <!--End-Action boxes-->
        </div>
      </div>

      <!-- <script type="text/javascript">
        function preview(gambar, idpreview) {
          var gb = gambar.files;
          for (var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
              preview.file = gbPreview;
              reader.onload = (function(element) {
                return function(e) {
                  element.src = e.target.result;
                };
              })(preview);
              reader.readAsDataURL(gbPreview);
            } else {
              alert("Type file tidak sesuai. Khusus image.");
            }

          }
        }
      </script> -->

      <!--end-main-container-part-->

      <!--Footer-part-->

      <div class="row-fluid">
        <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; Project Management System <a href="#">by M Salman Burhanuddin</a> </div>
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

      <link rel="stylesheet" href="template/dashboard/css/bootstrap-select.min.css">
      <script src="template/dashboard/js/bootstrap-select.min.js"></script>

      <script type="text/javascript">
        const progress = document.getElementsByClassName('form-progress')[0];
        // progress.style.display = 'none';
        /*if ($('#status') == "Berlangsung") {
          progress.style.display = 'block';
        } else {
          progress.style.display = 'none';
        }*/

        $("#status").change(function() {
          if ($(this).val() == "Berlangsung") {
            progress.style.display = 'block';
          } else {
            progress.style.display = 'none';
          }
        });

        $("#Status").change(function() {
          if ($(this).val() == "Berlangsung") {
            progress.style.display = 'block';
          } else {
            progress.style.display = 'none';
          }
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
  }
} else {
  header('location: logout.php');
}
ob_flush();
?>