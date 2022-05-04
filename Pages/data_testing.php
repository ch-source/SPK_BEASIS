<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Testing</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Testing</li>
            </ol>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Testing</h6>
                </div>
                <div class="card-body">
                  <?php
                  if(isset($_GET['notif'])){
                       if($_GET['notif']=="import-sukses"){
                        echo "<div class='alert alert-success alert-dismissible'>
                              <a style='text-decoration:none;' href='dashboard.php?p=data_testing' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                                <i class='icon fa fa-check'></i> Data Testing <b> Berhasil Diimport</b>
                              </div>";
                      }
                    }
                    ?>
                  <a href="dashboard.php?p=form1" class="btn btn-success"><i class="fa fa-upload"></i> IMPORT DATA</a>
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr style="text-align: center;">
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Pekerjaan</th>
                        <th>Penghasilan</th>
                        <th>Tanggungan</th>
                        <th>Transportasi</th>
                        <th>Opsi</th>
                      </tr>
                      </thead>
                        <tbody>
                              <?php
                              include"koneksi.php";
                              $no_a=1;
                              $query_a="SELECT * FROM tbl_testing";
                              $sql_a=mysqli_query($connect, $query_a);
                              while($data_a=mysqli_fetch_array($sql_a)) {?>
                              <tr>
                                <td><?php echo $no_a;?></td>
                                <td><?php echo $data_a['nama'];?></td>
                                <td><?php echo $data_a['kelas'];?></td>
                                <td>
                                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                                  <thead class="thead-light">
                                    <tr>
                                        <th>Ayah</th>
                                        <th>Ibu</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td><?php echo $data_a['pekerjaan_ayah'];?></td>
                                      <td><?php echo $data_a['pekerjaan_ibu'];?></td>
                                    </tr>
                                  </tbody>
                                  </table>
                                </td>
                                <td>
                                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                                  <thead class="thead-light">
                                    <tr>
                                        <th>Ayah</th>
                                        <th>Ibu</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td><?php echo $data_a['penghasilan_ayah'];?></td>
                                      <td><?php echo $data_a['penghasilan_ibu'];?></td>
                                    </tr>
                                  </tbody>
                                  </table>
                                </td>
                                <td><?php echo $data_a['tanggungan'];?></td>
                                <td><?php echo $data_a['transportasi'];?></td>
                                <td>
                                <a href="proses_hapus_ki.php?id=<?php echo $data_a['id_testing'];?>" class="btn btn-danger btn-sm" style="margin-top: 10px;"><i class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                              <?php $no_a++;}?>
                            </tbody>
                          </table>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>

        </div>
        <!---Container Fluid-->