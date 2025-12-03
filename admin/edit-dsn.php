<?php
$idx=$_GET['id'];
require_once "../config.php";

$sql="select * from dsn where id='$idx'";
$data=$db->query($sql);
?>

<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-sm-6"><h3 class="mb-0">Dashboard Dosen</h3></div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Theme Customize</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-12">
                <!--begin::Card-->
                <div class="card">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <!--begin::Card Title-->
                    <h3 class="card-title">WELCOME</h3>
                    <!--end::Card Title-->
                    <!--begin::Card Toolbar-->
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        title="Remove"
                      >
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                    <!--end::Card Toolbar-->
                  </div>
                  <!--end::Card Header-->
                  <!--begin::Card Body-->
                  <div class="card-body">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-md-6">
                        <form method="post" action="#" >            
    <?php
    if(isset($_POST['simpanEdit'])){  
        $nidn    = $_POST['nidn'];
        $nama   = $_POST['nama'];
        $gender = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $prodi  = $_POST['prodi'];
        
        $sql="update dsn set nidn='$nidn', nama='$nama', gender='$gender', alamat='$alamat', prodi='$prodi' where id='$idx'";
        $hasil= $db->query($sql);
        if($hasil){
            echo "<div class='alert alert-success'>Data berhasil diupdate!</div>";
        }else{
            echo "<div class='alert alert-danger'>Data gagal diupdate!</div>";
        }
    } 
    ?>
    <table class="table table-bordered">   
    <?php
      foreach($data as $d){
          $jkl="";
          $jkp="";
          if($d['gender']=="l"){
              $jkl="checked";
          }else{
              $jkp="checked";
          }
          switch ($d['prodi']){
              case "1": $prodi="informatika"; break;
              case "2": $prodi="arsitektur"; break;
              case "3": $prodi="ilmu lingkungan"; break;
              default:
                  $prodi="tidak diketahui";
                  break;
            }
            echo"<tr><td>nidn</td><td><input type='number' name='nidn' value='$d[nidn]' class='form-control' ></td></tr>";
            echo"<tr><td>nama</td><td><input type='text' name='nama' value='$d[nama]' class='form-control' ></td></tr>";
            echo"<tr><td>Jenis Kelamin</td><td><input type='radio' name='jk' value='l' $jkl> Laki-laki
            <input type='radio' name='jk' value='p' $jkp> Perempuan</td></tr>";
            echo"<tr><td>Alamat</td><td><textarea  class='form-control' name='alamat'>$d[alamat]</textarea></td></tr>";
            echo"<tr><td>Program Studi</td><td>
                    <select name='prodi' class='form-control'>
                    <option></option>
                        <option value='1' "; if($prodi=="informatika") echo "selected"; echo">Informatika</option>
                        <option value='2' "; if($prodi=="arsitektur") echo "selected"; echo">Arsitektur</option>
                        <option value='3' "; if($prodi=="ilmu lingkungan") echo "selected"; echo">Ilmu Lingkungan</option>
                    </select></td></tr>";
            echo"<tr><td></td><td><input type='submit' name='simpanEdit' value='Simpan perubahan' class='btn btn-primary'></td></tr>";
        }
        ?>
        </table>
        <a href="./?p=dosen" class="btn btn-primary mt-3">Kembali</a>

        </div>
        </form>
        
                      <!--begin::Col-->
                  </div>
                  <!--end::Card Header-->
                  <!--begin::Card Body-->
                  <div class="card-body">
                    <!--begin::Row-->
                          
                  </div>
                  <!--end::Card Footer-->
                </div>
                <!--end::Card-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->