<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Laporan Hasil Klasifikasi</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Laporan Hasil Klasifikasi</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin-bottom: 5px;">
              <div class="card">
                <div class="card-header">
                  <b class="card-title">Laporan Hasil Klasifikasi</b>
                </div>
                <div class="card-body">
                   <form method="post" action="laporan/laporan_hasil_klasifikasi.php" target="_blank">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Awal</label>
                      <div class="col-sm-3">
                        <input type="date" name="tglaw" class="form-control" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Tgl. Akhir</label>
                      <div class="col-sm-3">
                      <input type="date" name="tglak" class="form-control" required="required">
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-info"><i class="fa fa-print"></i> Cetak </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Laporan Hasil Klasifikasi</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr style="text-align: center;">
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Tanggal</th>
                        <th>P/T</th>
                        <th>Pekerjaan</th>
                        <th>Penghasilan</th>
                        <th>Tanggungan</th>
                        <th>Transportasi</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                        <tbody>
                              <?php
                              include"koneksi.php";
                              $no_a=1;
                              $query_a="SELECT * FROM tbl_hasil_klasifikasi";
                              $sql_a=mysqli_query($connect, $query_a);
                              while($data_a=mysqli_fetch_array($sql_a)) {?>
                              <tr>
                                <td><?php echo $no_a;?></td>
                                <td><?php echo $data_a['nama'];?></td>
                                <td><?php echo $data_a['kelas'];?></td>
                                <td><?php echo $data_a['tanggal'];?></td>
                                <td><?php echo $data_a['periode'];?>/<?php echo $data_a['tahun'];?></td>
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
                                <td><?php echo $data_a['status'];?></td>
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