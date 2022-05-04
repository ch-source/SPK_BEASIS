
      <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Import Data Training</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Import Data Training</li>
            </ol>
          </div>
           <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-body">
          <!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
          
          <!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
          <form method="post" action="" enctype="multipart/form-data">

            <!--
            -- Buat sebuah input type file
            -- class pull-left berfungsi agar file input berada di sebelah kiri
            -->
            <input type="file" name="file" class="pull-left">

            <button type="submit" name="preview" class="btn btn-success">
              <i class="fa fa-eye"></i> Preview
            </button>
            <a href="dashboard.php?p=data_training" class="btn btn-danger">
            <i class="glyphicon glyphicon-remove"></i> Batal
          </a>
          </form>

          <hr>

          <!-- Buat Preview Data -->
          <?php
          // Jika user telah mengklik tombol Preview
          if(isset($_POST['preview'])){
            //$ip = ; // Ambil IP Address dari User
            $nama_file_baru = 'data.xlsx';

            // Cek apakah terdapat file data.xlsx pada folder tmp
            if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
              unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
            $tmp_file = $_FILES['file']['tmp_name'];

            // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
            if($ext == "xlsx"){
              // Upload file yang dipilih ke folder tmp
              // dan rename file tersebut menjadi data{ip_address}.xlsx
              // {ip_address} diganti jadi ip address user yang ada di variabel $ip
              // Contoh nama file setelah di rename : data127.0.0.1.xlsx
              move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

              // Load librari PHPExcel nya
              require_once 'PHPExcel/PHPExcel.php';

              $excelreader = new PHPExcel_Reader_Excel2007();
              $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
              $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

              // Buat sebuah tag form untuk proses import data ke database
              echo "<form method='post' action='import.php'>";

              // Buat sebuah div untuk alert validasi kosong
              echo "<div class='table-responsive p-3'>
              <table class='table align-items-center table-hover table-bordered' id='dataTableHover'>
              <tr>
                <th colspan='5' class='text-center'>DATA TRAINING</th>
              </tr>
              <tr>
                <th>NAMA</th>
                <th>KELAS</th>
                <th>PEKERJAAN AYAH</th>
                <th>PEKERJAAN IBU</th>
                <th>PENGHASILAN AYAH</th>
                <th>PENGHASILAN IBU</th>
                <th>TA</th>
                <th>TRANSPORTASI</th>
                <th>STATUS</th>
              </tr>";
              $numrow = 1;
              $kosong = 0;
              foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
                // Ambil data pada excel sesuai Kolom
                // Ambil data pada excel sesuai Kolom
                $nama = $row['A']; // Ambil data NIS
                $kelas = $row['B']; // Ambil data nama
                $pekerjaan_ayah = $row['C']; // Ambil data jenis kelamin
                $pekerjaan_ibu = $row['D']; // Ambil data telepon
                $penghasilan_ayah = $row['E']; // Ambil data alamat
                $penghasilan_ibu = $row['F']; // Ambil data alamat
                $tanggungan = $row['G']; // Ambil data alamat
                $transportasi = $row['H']; // Ambil data alamat
                $status = $row['I']; // Ambil data alamat

                // Cek jika semua data tidak diisi
                if($nama == "" && $kelas == "" && $pekerjaan_ayah == "" && $pekerjaan_ibu == "" && $penghasilan_ayah == "" && $penghasilan_ibu == "" && $tanggungan == "" && $transportasi == "" && $status == "")
                  continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if($numrow > 1){
                  // Validasi apakah semua data telah diisi
                  $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                  $kelas_td = ( ! empty($kelas))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                  $pekerjaan_ayah_td = ( ! empty($pekerjaan_ayah))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                  $pekerjaan_ibu_td = ( ! empty($pekerjaan_ibu))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                  $penghasilan_ayah_td = ( ! empty($penghasilan_ayah))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                  $penghasilan_ibu_td = ( ! empty($penghasilan_ibu))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                  $tanggungan_td = ( ! empty($tanggungan))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                  $transportasi_td = ( ! empty($transportasi))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                  $status_td = ( ! empty($status))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

                  // Jika salah satu data ada yang kosong

                  if($nama == "" or $kelas == "" or $pekerjaan_ayah == "" or $pekerjaan_ibu == "" or $penghasilan_ayah == "" or $penghasilan_ibu == "" or $tanggungan == "" or $transportasi == "" or $status == ""){
                    $kosong++; // Tambah 1 variabel $kosong
                  }

                  echo "<tr>";
                  echo "<td".$nama_td.">".$nama."</td>";
                  echo "<td".$kelas_td.">".$kelas."</td>";
                  echo "<td".$pekerjaan_ayah_td.">".$pekerjaan_ayah."</td>";
                  echo "<td".$pekerjaan_ibu_td.">".$pekerjaan_ibu."</td>";
                  echo "<td".$penghasilan_ayah_td.">".$penghasilan_ayah."</td>";
                  echo "<td".$penghasilan_ibu_td.">".$penghasilan_ibu."</td>";
                  echo "<td".$tanggungan_td.">".$tanggungan."</td>";
                  echo "<td".$transportasi_td.">".$transportasi."</td>";
                  echo "<td".$status_td.">".$status."</td>";
                  echo "</tr>";
                }

                $numrow++; // Tambah 1 setiap kali looping
              }

              echo "</table>";
              echo "</div>";

              // Cek apakah variabel kosong lebih dari 1
              // Jika lebih dari 1, berarti ada data yang masih kosong
              if($kosong > 1){
              ?>
                <script>
                $(document).ready(function(){
                  // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                  $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                  $("#kosong").show(); // Munculkan alert validasi kosong
                });
                </script>
              <?php
              }else{ // Jika semua data sudah diisi
                echo "<hr>";

                // Buat sebuah tombol untuk mengimport data ke database
                echo "<button type='submit' name='import' class='btn btn-primary'><i class='fa fa-upload'></i> Import</button>";
              }

              echo "</form>";
            }else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
              // Munculkan pesan validasi
              echo "<div class='alert alert-danger'>
              Hanya File Excel 2007 (.xlsx) yang diperbolehkan
              </div>";
            }
          }
          ?>
        </div>
      </div>
      </div>
    </div>
      </div>
     