<?php
require_once "../config.php";
$keyword=$_POST['keyword'];
$category=$_POST['category'];

if($_POST['cari']){
  if($category=="prodi"){
    if($keyword=="INF"){
      $prodi=1;
    }
    $sql="select * from mhs where $category like '%$prodi%'";
  }else{
    $sql="select * from mhs where $category like '%$keyword%'";  
  }
}else{
  $sql="select * from mhs";
}
$data=$db->query($sql);

//var_dump($data);
?>
<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-sm-6"><h3 class="mb-0">Data mahasiswa</h3></div>
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
                    <table><tr><td>
                      <a href="?p=tambahmahasiswa" class="btn btn-primary" style="width: 150px">+Mahasiswa</a>
                      </td><td width="50"></td><td>
                      <form method="post" action="#">
                      <input type='text' name='keyword' placeholder='Masukkan kata kunci' value='<?=$keyword?>'>
                      <select name='category'>
                      <option value='nim' <?php if($category=="nim") echo"selected"; ?>>NIM</option>
                      <option value='nama' <?php if($category=="nama") echo"selected"; ?>>Nama</option>
                      <option value='gender' <?php if($category=="gender") echo"selected"; ?>>Jenis Kelamin</option>
                      <option value='alamat' <?php if($category=="alamat") echo"selected"; ?>>Alamat</option>
                      <option value='prodi' <?php if($category=="prodi") echo"selected"; ?>>Prodi</option>
                      </select>
                      <input type='submit' name='cari' value='search' class='btn btn-default'>
                      </form>
                      </td></tr></table>

                    <?php
                      if(isset($_POST['cari'])){
                          if($data->num_rows > 0){
                              echo "<p><i>Ditemukan <b>{$data->num_rows}</b> data dengan kata kunci <b>$keyword</b> pada kategori <b>$category</b>.</i></p>";
                        } else {
                              echo "<p><i>Tidak ditemukan data dengan kata kunci <b>$keyword</b> pada kategori <b>$category</b>.</i></p>";
                          }
                      }
                    ?>
                    <!--begin::Card Title-->
                      <table class="table table-striped table-hover">
                    <thead>
                    <tr><th>NO</th><th>NIM</th><th>Nama</th><th>Gender</th><th>Alamat</th><th>Prodi</th><th>Opsi</th></tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=0;
                    foreach ($data as $d) {
                      $no++;
                      if($d['prodi']==1) {
                        $prodi='INFORMATIKA';
                      }elseif($d['prodi']==2) {
                        $prodi='ARSITEKTUR';
                      }elseif($d['prodi']==3) {
                        $prodi='ILMU LINGKUNGAN';
                      }else{
                        $prodi='TIDAK DIKENAL';
                      }
                      echo"<tr><td>$no</td>
                      <td>$d[nim]</td>
                      <td>$d[nama]</td>
                      <td>$d[gender]</td>
                      <td>$d[alamat]</td>
                      <td>$prodi</td>
                      <td>
                      <a href='./?p=detail-mhs&id=$d[id]' class='btn btn-xs btn-primary'>Detail</a>
                      <a href='./?p=edit-mhs&id=$d[id]' class='btn btn-xs btn-warning'>Edit</a>
                      <a href='./?p=hapus-mhs&id=$d[id]' class='btn btn-xs btn-danger'>Hapus</a>
                      </td>
                      </tr>";
                    }
                  
                    ?>
                    </tbody>
                    </table>
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