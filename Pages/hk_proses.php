      <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Proses Klasifikasi</h6>
            </div>
          <div class="card-body" style="overflow: auto;">
           <table class="table align-items-center table-hover table-bordered" style="font-size: 12px;">
            <thead class="thead-light" style="text-align: center;">
              <th>Nama</th>
              <th>Kelas</th>
              <th>Tanggal</th>
              <th>P/T</th>
              <th>Jumlah Kelas</th>
              <th>Probilitas Pekerjaan Ayah</th>
              <th>Probilitas Pekerjaan Ibu</th>
              <th>Probilitas Penghasilan Ayah</th>
              <th>Probilitas Penghasilan Ibu</th>
              <th>Probilitas Tanggungan</th>
              <th>Probilitas Transportasi</th>
              <th>Jumlah Probilitas</th>
              <th>Status</th>
            </thead>
            <tbody>
          <?php
          if (isset($_POST['id_testing'])) {
                include"koneksi.php";
                $periode=$_POST['periode'];
                $tahun=$_POST['tahun'];
                if (isset($_POST['simpan'])){
                foreach ($_POST['id_testing'] as $value) {
              $cek_a = mysqli_query($connect, "SELECT * FROM tbl_testing WHERE id_testing = '$value'");
                $result_a = mysqli_num_rows($cek_a);
                $data_a = mysqli_fetch_array($cek_a);
                
                  $query="SELECT * FROM tbl_testing WHERE id_testing='$value'";
                  $sql=mysqli_query($connect, $query);
                  while ($data=mysqli_fetch_array($sql)) {
                    echo"<tr>";
                    echo"<td>".$data['nama']."</td>";
                    echo"<td>".$data['kelas']."</td>";
                    echo"<td>".date('Y-m-d')."</td>";
                    echo"<td>".$periode."/".$tahun."</td>";

                    echo "<td>";
                    echo "<table class='table align-items-center table-hover table-bordered' style='font-size: 12px;''>
                    <tr>
                    <thead>
                       <th>Layak</th>
                       <th>Tidak Layak</th>
                    </thead>
                    </tr>";

                    $order="SELECT * FROM tbl_training WHERE status='Layak'";
                    $query_order=mysqli_query($connect, $order);
                    $data_order=array();
                    while(($row_order=mysqli_fetch_array($query_order)) !=null){
                    $data_order[]=$row_order;
                    }
                    $count=count($data_order);

                    $order_a="SELECT * FROM tbl_training WHERE status='Tidak Layak'";
                    $query_order_a=mysqli_query($connect, $order_a);
                    $data_order_a=array();
                    while(($row_order_a=mysqli_fetch_array($query_order_a)) !=null){
                    $data_order_a[]=$row_order_a;
                    }
                    $count_a=count($data_order_a);

                    $order_b="SELECT * FROM tbl_training";
                    $query_order_b=mysqli_query($connect, $order_b);
                    $data_order_b=array();
                    while(($row_order_b=mysqli_fetch_array($query_order_b)) !=null){
                    $data_order_b[]=$row_order_b;
                    }
                    $count_b=count($data_order_b);

                    $kelaslayak= $count / $count_b;
                    $kelastdklayak= $count_a / $count_b;
                    echo "<tr>";
                     echo"<td>".round($kelaslayak,3)."</td>";
                     echo"<td>".round($kelastdklayak,3)."</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "</td>";

                    echo "<td>";
                    echo "<table class='table align-items-center table-hover table-bordered' style='font-size: 12px;''>
                    <tr>
                    <thead>
                       <th>Layak</th>
                       <th>Tidak Layak</th>
                    </thead>
                    </tr>";

                    $order_c="SELECT * FROM tbl_training WHERE status='Layak' AND pekerjaan_ayah='".$data['pekerjaan_ayah']."'";
                    $query_order_c=mysqli_query($connect, $order_c);
                    $data_order_c=array();
                    while(($row_order_c=mysqli_fetch_array($query_order_c)) !=null){
                    $data_order_c[]=$row_order_c;
                    }
                    $count_c=count($data_order_c);

                    $pum = $count_c / $count;
                    

                    $order_d="SELECT * FROM tbl_training WHERE status='Tidak Layak' AND pekerjaan_ayah='".$data['pekerjaan_ayah']."'";
                    $query_order_d=mysqli_query($connect, $order_d);
                    $data_order_d=array();
                    while(($row_order_d=mysqli_fetch_array($query_order_d)) !=null){
                    $data_order_d[]=$row_order_d;
                    }
                    $count_d=count($data_order_d);

                    $putm = $count_d / $count_a;
                    

                    echo "<tr>";
                     if ($pum == 0) {
                      $pum +=1;
                      echo"<td>".round($pum,3)."</td>";
                    }else{
                      echo"<td>".round($pum,3)."</td>";
                    }

                     if ($putm == 0) {
                      $putm +=1;
                      echo"<td>".round($putm,3)."</td>";
                    }else{
                      echo"<td>".round($putm,3)."</td>";
                    }
                    echo "</tr>";
                    echo "</table>";
                    echo "</td>";

                    echo "<td>";
                    echo "<table class='table align-items-center table-hover table-bordered' style='font-size: 12px;''>
                    <tr>
                    <thead>
                       <th>Layak</th>
                       <th>Tidak Layak</th>
                    </thead>
                    </tr>";

                     $order_e="SELECT * FROM tbl_training WHERE status='Layak' AND pekerjaan_ibu='".$data['pekerjaan_ibu']."'";
                    $query_order_e=mysqli_query($connect, $order_e);
                    $data_order_e=array();
                    while(($row_order_e=mysqli_fetch_array($query_order_e)) !=null){
                    $data_order_e[]=$row_order_e;
                    }
                    $count_e=count($data_order_e);

                    $ptm = $count_e / $count;
                    

                    $order_f="SELECT * FROM tbl_training WHERE status='Tidak Layak' AND pekerjaan_ibu='".$data['pekerjaan_ibu']."'";
                    $query_order_f=mysqli_query($connect, $order_f);
                    $data_order_f=array();
                    while(($row_order_f=mysqli_fetch_array($query_order_f)) !=null){
                    $data_order_f[]=$row_order_f;
                    }
                    $count_f=count($data_order_f);

                    $pttm = $count_f / $count_a;
                    
                    echo "<tr>";
                     if ($ptm == 0) {
                      $ptm +=1;
                      echo"<td>".round($ptm,3)."</td>";
                    }else{
                      echo"<td>".round($ptm,3)."</td>";
                    }

                     if ($pttm == 0) {
                      $pttm +=1;
                      echo"<td>".round($pttm,3)."</td>";
                    }else{
                      echo"<td>".round($pttm,3)."</td>";
                    }
                    echo "</tr>";
                    echo "</table>";
                    echo "</td>";

                    echo "<td>";
                    echo "<table class='table align-items-center table-hover table-bordered' style='font-size: 12px;''>
                    <tr>
                    <thead>
                       <th>Layak</th>
                       <th>Tidak Layak</th>
                    </thead>
                    </tr>";

                    $order_g="SELECT * FROM tbl_training WHERE status='Layak' AND penghasilan_ayah='".$data['penghasilan_ayah']."'";
                    $query_order_g=mysqli_query($connect, $order_g);
                    $data_order_g=array();
                    while(($row_order_g=mysqli_fetch_array($query_order_g)) !=null){
                    $data_order_g[]=$row_order_g;
                    }
                    $count_g=count($data_order_g);

                    $ppm = $count_g / $count;
                    
                    
                    $order_h="SELECT * FROM tbl_training WHERE status='Tidak Layak' AND penghasilan_ayah='".$data['penghasilan_ayah']."'";
                    $query_order_h=mysqli_query($connect, $order_h);
                    $data_order_h=array();
                    while(($row_order_h=mysqli_fetch_array($query_order_h)) !=null){
                    $data_order_h[]=$row_order_h;
                    }
                    $count_h=count($data_order_h);

                    $pptm = $count_h / $count_a;
                    

                    echo "<tr>";
                     if ($ppm == 0) {
                      $ppm +=1;
                      echo"<td>".round($ppm,3)."</td>";
                    }else{
                      echo"<td>".round($ppm,3)."</td>";
                    }

                     if ($pptm == 0) {
                      $pptm +=1;
                      echo"<td>".round($pptm,3)."</td>";
                    }else{
                      echo"<td>".round($pptm,3)."</td>";
                    }
                    echo "</tr>";
                    echo "</table>";
                    echo "</td>";

                    echo "<td>";
                    echo "<table class='table align-items-center table-hover table-bordered' style='font-size: 12px;''>
                    <tr>
                    <thead>
                       <th>Layak</th>
                       <th>Tidak Layak</th>
                    </thead>
                    </tr>";

                    $order_i="SELECT * FROM tbl_training WHERE status='Layak' AND penghasilan_ibu='".$data['penghasilan_ibu']."'";
                    $query_order_i=mysqli_query($connect, $order_i);
                    $data_order_i=array();
                    while(($row_order_i=mysqli_fetch_array($query_order_i)) !=null){
                    $data_order_i[]=$row_order_i;
                    }
                    $count_i=count($data_order_i);

                    $ppnm = $count_i / $count;
                    

                    $order_j="SELECT * FROM tbl_training WHERE status='Tidak Layak' AND penghasilan_ibu='".$data['penghasilan_ibu']."'";
                    $query_order_j=mysqli_query($connect, $order_j);
                    $data_order_j=array();
                    while(($row_order_j=mysqli_fetch_array($query_order_j)) !=null){
                    $data_order_j[]=$row_order_j;
                    }
                    $count_j=count($data_order_j);

                    $ppntm = $count_j / $count_a;
                    

                    echo "<tr>";
                     if ($ppnm == 0) {
                      $ppnm +=1;
                      echo"<td>".round($ppnm,3)."</td>";
                    }else{
                      echo"<td>".round($ppnm,3)."</td>";
                    }

                    if ($ppntm == 0) {
                      $ppntm +=1;
                      echo"<td>".round($ppntm,3)."</td>";
                    }else{
                      echo"<td>".round($ppntm,3)."</td>";
                    }
                    echo "</tr>";
                    echo "</table>";
                    echo "</td>";

                    echo "<td>";
                    echo "<table class='table align-items-center table-hover table-bordered' style='font-size: 12px;''>
                    <tr>
                    <thead>
                       <th>Layak</th>
                       <th>Tidak Layak</th>
                    </thead>
                    </tr>";

                    $order_k="SELECT * FROM tbl_training WHERE status='Layak' AND tanggungan='".$data['tanggungan']."'";
                    $query_order_k=mysqli_query($connect, $order_k);
                    $data_order_k=array();
                    while(($row_order_k=mysqli_fetch_array($query_order_k)) !=null){
                    $data_order_k[]=$row_order_k;
                    }
                    $count_k=count($data_order_k);

                    $ppdm = $count_k / $count;
                    

                    $order_l="SELECT * FROM tbl_training WHERE status='Tidak Layak' AND tanggungan='".$data['tanggungan']."'";
                    $query_order_l=mysqli_query($connect, $order_l);
                    $data_order_l=array();
                    while(($row_order_l=mysqli_fetch_array($query_order_l)) !=null){
                    $data_order_l[]=$row_order_l;
                    }
                    $count_l=count($data_order_l);

                    $ppdtm = $count_l / $count_a;
                    

                    echo "<tr>";
                     if ($ppdm == 0) {
                      $ppdm +=1;
                      echo"<td>".round($ppdm,3)."</td>";
                    }else{
                      echo"<td>".round($ppdm,3)."</td>";
                    }

                    if ($ppdtm == 0) {
                      $ppdtm +=1;
                      echo"<td>".round($ppdtm,3)."</td>";
                    }else{
                      echo"<td>".round($ppdtm,3)."</td>";
                    }
                    echo "</tr>";
                    echo "</table>";
                    echo "</td>";

                    echo "<td>";
                    echo "<table class='table align-items-center table-hover table-bordered' style='font-size: 12px;''>
                    <tr>
                    <thead>
                       <th>Layak</th>
                       <th>Tidak Layak</th>
                    </thead>
                    </tr>";

                    $order_m="SELECT * FROM tbl_training WHERE status='Layak' AND transportasi='".$data['transportasi']."'";
                    $query_order_m=mysqli_query($connect, $order_m);
                    $data_order_m=array();
                    while(($row_order_m=mysqli_fetch_array($query_order_m)) !=null){
                    $data_order_m[]=$row_order_m;
                    }
                    $count_m=count($data_order_m);

                    $psrm = $count_m / $count;
                    

                    $order_n="SELECT * FROM tbl_training WHERE status='Tidak Layak' AND transportasi='".$data['transportasi']."'";
                    $query_order_n=mysqli_query($connect, $order_n);
                    $data_order_n=array();
                    while(($row_order_n=mysqli_fetch_array($query_order_n)) !=null){
                    $data_order_n[]=$row_order_n;
                    }
                    $count_n=count($data_order_n);

                    $psrtm = $count_n / $count_a;
                    

                    echo "<tr>";
                     if ($psrm == 0) {
                      $psrm +=1;
                      echo"<td>".round($psrm,3)."</td>";
                    }else{
                      echo"<td>".round($psrm,3)."</td>";
                    }

                    if ($psrtm == 0) {
                      $psrtm +=1;
                      echo"<td>".round($psrtm,3)."</td>";
                    }else{
                      echo"<td>".round($psrtm,3)."</td>";
                    }
                    echo "</tr>";
                    echo "</table>";
                    echo "</td>";

                    echo "<td>";
                    echo "<table class='table align-items-center table-hover table-bordered' style='font-size: 12px;''>
                    <tr>
                    <thead>
                       <th>Layak</th>
                       <th>Tidak Layak</th>
                    </thead>
                    </tr>";

                    $layak = $pum * $ptm * $ppm * $ppnm * $ppdm * $psrm * $kelaslayak;
                    $tidaklayak = $putm * $pttm * $pptm * $ppntm * $ppdtm * $psrtm * $kelastdklayak;

                    echo "<tr>";
                    echo"<td>".round($layak,4)."</td>";
                    echo"<td>".round($tidaklayak,4)."</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "</td>";


                    if ($tidaklayak > $layak) {
                      $status='Tidak Layak';
                       echo"<td>".$status."</td>";
                    }else {
                      $status='Layak';
                      echo"<td>".$status."</td>";
                    }
                    
                    echo"<tr>";
                    $query_x="UPDATE tbl_testing SET status_testing='$status' WHERE id_testing='$value'";
                    $sql_x=mysqli_query($connect, $query_x);
                    
                  }
                
              }
            }else{
              echo "<script>alert('Opss!, Data Testing Belum Dipilih');
              document.location.href='dashboard.php?p=input_hk'</script>\n";
            }
          }
      ?>
    </tbody>
  </table>
            <form method='post' action='proses_simpan_hk.php'>
              <div class="box-body" style="height:10px; overflow: auto;">
          <?php
          if (isset($_POST['id_testing'])) {
                include"koneksi.php";
                $periode=$_POST['periode'];
                $tahun=$_POST['tahun'];
                if (isset($_POST['simpan'])){
                foreach ($_POST['id_testing'] as $value) {
                  $query="SELECT * FROM tbl_testing WHERE id_testing='$value'";
                  $sql=mysqli_query($connect, $query);
                  while ($data=mysqli_fetch_array($sql)) {
                    echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>ID Klasifikasi</label>";
                            echo"<input type='text' name='id[]' readonly='readonly' class='form-control' value='".$data['id_testing']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Nama</label>";
                            echo"<input type='text' name='nama[]' readonly='readonly' class='form-control' value='".$data['nama']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Kelas</label>";
                            echo"<input type='text' name='kelas[]' readonly='readonly' class='form-control' value='".$data['kelas']."'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";

                      echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Tgl</label>";
                            echo"<input type='text' name='tgl[]' readonly='readonly' value='".date('Y-m-d')."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Periode</label>";
                          echo"<input type='text' name='periode[]' readonly='readonly' value='".$periode."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Tahun</label>";
                            echo"<input type='text' name='tahun[]' readonly='readonly' value='".$tahun."' type='text' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";

                    echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Pekerjaan Ayah</label>";
                            echo"<input type='text' name='pa[]' readonly='readonly' class='form-control' value='".$data['pekerjaan_ayah']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Pekerjaan Ibu</label>";
                            echo"<input type='text' name='pi[]' readonly='readonly' class='form-control' value='".$data['pekerjaan_ibu']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Penghasilan Ayah</label>";
                            echo"<input type='text' name='ph[]' readonly='readonly' class='form-control' value='".$data['penghasilan_ayah']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Penghasilan Ibu</label>";
                            echo"<input type='text' name='phi[]' readonly='readonly' class='form-control' value='".$data['penghasilan_ibu']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Tanggungan</label>";
                            echo"<input type='text' name='tanggungan[]' readonly='readonly' class='form-control' value='".$data['tanggungan']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Transportasi</label>";
                            echo"<input type='text' name='transportasi[]' readonly='readonly' class='form-control' value='".$data['transportasi']."'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";

                      $order="SELECT * FROM tbl_training WHERE status='Layak'";
                    $query_order=mysqli_query($connect, $order);
                    $data_order=array();
                    while(($row_order=mysqli_fetch_array($query_order)) !=null){
                    $data_order[]=$row_order;
                    }
                    $count=count($data_order);

                    $order_a="SELECT * FROM tbl_training WHERE status='Tidak Layak'";
                    $query_order_a=mysqli_query($connect, $order_a);
                    $data_order_a=array();
                    while(($row_order_a=mysqli_fetch_array($query_order_a)) !=null){
                    $data_order_a[]=$row_order_a;
                    }
                    $count_a=count($data_order_a);

                    $order_b="SELECT * FROM tbl_training";
                    $query_order_b=mysqli_query($connect, $order_b);
                    $data_order_b=array();
                    while(($row_order_b=mysqli_fetch_array($query_order_b)) !=null){
                    $data_order_b[]=$row_order_b;
                    }
                    $count_b=count($data_order_b);

                    $kelaslayak= $count / $count_b;
                    $kelastdklayak= $count_a / $count_b;
                   
                      echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Jml. Kelas Layak</label>";
                            echo"<input type='text' name='kl[]' readonly='readonly' class='form-control' value='".$kelaslayak."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Jml. Kelas Tidak Layak</label>";
                            echo"<input type='text' name='ktl[]' readonly='readonly' class='form-control' value='".$kelastdklayak."'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";

                      $order_c="SELECT * FROM tbl_training WHERE status='Layak' AND pekerjaan_ayah='".$data['pekerjaan_ayah']."'";
                      $query_order_c=mysqli_query($connect, $order_c);
                      $data_order_c=array();
                      while(($row_order_c=mysqli_fetch_array($query_order_c)) !=null){
                      $data_order_c[]=$row_order_c;
                      }
                      $count_c=count($data_order_c);

                      $pum = $count_c / $count;

                    
                    echo"<div class='row'>";
                    if ($pum == 0) {
                      $pum +=1;
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Pekerjaan Ayah Layak</label>";
                            echo"<input type='text' name='pum[]' readonly='readonly' class='form-control' value='".round($pum,3)."'>";
                          echo"</div>";
                        echo"</div>";
                      }else{
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Pekerjaan Ayah Layak</label>";
                            echo"<input type='text' name='pum[]' readonly='readonly' class='form-control' value='".round($pum,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }
                      echo"</div>";
                    

                    $order_d="SELECT * FROM tbl_training WHERE status='Tidak Layak' AND pekerjaan_ayah='".$data['pekerjaan_ayah']."'";
                    $query_order_d=mysqli_query($connect, $order_d);
                    $data_order_d=array();
                    while(($row_order_d=mysqli_fetch_array($query_order_d)) !=null){
                    $data_order_d[]=$row_order_d;
                    }
                    $count_d=count($data_order_d);

                    $putm = $count_d / $count_a;
                    
                    
                    echo"<div class='row'>";
                    if ($putm == 0) {
                      $putm +=1;
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Pekerjaan Ayah Tidak Layak</label>";
                            echo"<input type='text' name='putm[]' readonly='readonly' class='form-control' value='".round($putm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }else{
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Pekerjaan Ayah Tidak Layak</label>";
                            echo"<input type='text' name='putm[]' readonly='readonly' class='form-control' value='".round($putm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }
                      echo"</div>";
                    

                     $order_e="SELECT * FROM tbl_training WHERE status='Layak' AND pekerjaan_ibu='".$data['pekerjaan_ibu']."'";
                    $query_order_e=mysqli_query($connect, $order_e);
                    $data_order_e=array();
                    while(($row_order_e=mysqli_fetch_array($query_order_e)) !=null){
                    $data_order_e[]=$row_order_e;
                    }
                    $count_e=count($data_order_e);

                    $ptm = $count_e / $count;

                    
                    echo"<div class='row'>";
                    if ($ptm == 0) {
                      $ptm +=1;
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Pekerjaan Ibu Layak</label>";
                            echo"<input type='text' name='pum[]' readonly='readonly' class='form-control' value='".round($ptm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                      }else{
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Pekerjaan Ibu Layak</label>";
                            echo"<input type='text' name='pum[]' readonly='readonly' class='form-control' value='".round($ptm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }
                      echo"</div>";
                    

                    $order_f="SELECT * FROM tbl_training WHERE status='Tidak Layak' AND pekerjaan_ibu='".$data['pekerjaan_ibu']."'";
                    $query_order_f=mysqli_query($connect, $order_f);
                    $data_order_f=array();
                    while(($row_order_f=mysqli_fetch_array($query_order_f)) !=null){
                    $data_order_f[]=$row_order_f;
                    }
                    $count_f=count($data_order_f);

                    $pttm = $count_f / $count_a;
                    
                    
                    echo"<div class='row'>";
                    if ($pttm == 0) {
                      $pttm +=1;
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Pekerjaan Ibu Tidak Layak</label>";
                            echo"<input type='text' name='pttm[]' readonly='readonly' class='form-control' value='".round($pttm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }else{
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Pekerjaan Ibu Tidak Layak</label>";
                            echo"<input type='text' name='pttm[]' readonly='readonly' class='form-control' value='".round($pttm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                         }
                      echo"</div>";
                   

                    $order_g="SELECT * FROM tbl_training WHERE status='Layak' AND penghasilan_ayah='".$data['penghasilan_ayah']."'";
                    $query_order_g=mysqli_query($connect, $order_g);
                    $data_order_g=array();
                    while(($row_order_g=mysqli_fetch_array($query_order_g)) !=null){
                    $data_order_g[]=$row_order_g;
                    }
                    $count_g=count($data_order_g);

                    $ppm = $count_g / $count;

                   
                    echo"<div class='row'>";
                     if ($ppm == 0) {
                      $ppm +=1;
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Penghasilan Ayah Layak</label>";
                            echo"<input type='text' name='ppm[]' readonly='readonly' class='form-control' value='".round($ppm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                      }else{
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Penghasilan Ayah Layak</label>";
                            echo"<input type='text' name='ppm[]' readonly='readonly' class='form-control' value='".round($ppm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }
                      echo"</div>";
                    
                    
                    
                    $order_h="SELECT * FROM tbl_training WHERE status='Tidak Layak' AND penghasilan_ayah='".$data['penghasilan_ayah']."'";
                    $query_order_h=mysqli_query($connect, $order_h);
                    $data_order_h=array();
                    while(($row_order_h=mysqli_fetch_array($query_order_h)) !=null){
                    $data_order_h[]=$row_order_h;
                    }
                    $count_h=count($data_order_h);

                    $pptm = $count_h / $count_a;

                   
                    echo"<div class='row'>";
                     if ($pptm == 0) {
                      $pptm +=1;
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Penghasilan Ayah Tidak Layak</label>";
                            echo"<input type='text' name='pptm[]' readonly='readonly' class='form-control' value='".round($pptm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }else{
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Penghasilan Ayah Tidak Layak</label>";
                            echo"<input type='text' name='pptm[]' readonly='readonly' class='form-control' value='".round($pptm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }
                      echo"</div>";
                    

                    $order_i="SELECT * FROM tbl_training WHERE status='Layak' AND penghasilan_ibu='".$data['penghasilan_ibu']."'";
                    $query_order_i=mysqli_query($connect, $order_i);
                    $data_order_i=array();
                    while(($row_order_i=mysqli_fetch_array($query_order_i)) !=null){
                    $data_order_i[]=$row_order_i;
                    }
                    $count_i=count($data_order_i);

                    $ppnm = $count_i / $count;

                    
                    echo"<div class='row'>";
                    if ($ppnm == 0) {
                      $ppnm +=1;
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Penghasilan Ibu Layak</label>";
                            echo"<input type='text' name='ppnm[]' readonly='readonly' class='form-control' value='".round($ppnm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                      }else{
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Penghasilan Ibu Layak</label>";
                            echo"<input type='text' name='ppnm[]' readonly='readonly' class='form-control' value='".round($ppnm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }
                      echo"</div>";
                    
                    

                    $order_j="SELECT * FROM tbl_training WHERE status='Tidak Layak' AND penghasilan_ibu='".$data['penghasilan_ibu']."'";
                    $query_order_j=mysqli_query($connect, $order_j);
                    $data_order_j=array();
                    while(($row_order_j=mysqli_fetch_array($query_order_j)) !=null){
                    $data_order_j[]=$row_order_j;
                    }
                    $count_j=count($data_order_j);

                    $ppntm = $count_j / $count_a;
                    
                    
                    echo"<div class='row'>";
                    if ($ppntm == 0) {
                      $ppntm +=1;
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Penghasilan Ibu Tidak Layak</label>";
                            echo"<input type='text' name='ppntm[]' readonly='readonly' class='form-control' value='".round($ppntm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }else{
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Penghasilan Ibu Tidak Layak</label>";
                            echo"<input type='text' name='ppntm[]' readonly='readonly' class='form-control' value='".round($ppntm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }
                      echo"</div>";
                    

                    $order_k="SELECT * FROM tbl_training WHERE status='Layak' AND tanggungan='".$data['tanggungan']."'";
                    $query_order_k=mysqli_query($connect, $order_k);
                    $data_order_k=array();
                    while(($row_order_k=mysqli_fetch_array($query_order_k)) !=null){
                    $data_order_k[]=$row_order_k;
                    }
                    $count_k=count($data_order_k);

                    $ppdm = $count_k / $count;

                    
                    echo"<div class='row'>";
                    if ($ppdm == 0) {
                      $ppdm +=1;
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Tanggungan Layak</label>";
                            echo"<input type='text' name='ppdm[]' readonly='readonly' class='form-control' value='".round($ppdm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                      }else{
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Tanggungan Layak</label>";
                            echo"<input type='text' name='ppdm[]' readonly='readonly' class='form-control' value='".round($ppdm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }
                      echo"</div>";
                    
                    

                    $order_l="SELECT * FROM tbl_training WHERE status='Tidak Layak' AND tanggungan='".$data['tanggungan']."'";
                    $query_order_l=mysqli_query($connect, $order_l);
                    $data_order_l=array();
                    while(($row_order_l=mysqli_fetch_array($query_order_l)) !=null){
                    $data_order_l[]=$row_order_l;
                    }
                    $count_l=count($data_order_l);

                    $ppdtm = $count_l / $count_a;
                    
                   
                    echo"<div class='row'>";
                     if ($ppdtm == 0) {
                      $ppdtm +=1;
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Tanggungan Tidak Layak</label>";
                            echo"<input type='text' name='ppdtm[]' readonly='readonly' class='form-control' value='".round($ppdtm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }else{
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Tanggungan Tidak Layak</label>";
                            echo"<input type='text' name='ppdtm[]' readonly='readonly' class='form-control' value='".round($ppdtm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }
                      echo"</div>";
                    

                    $order_m="SELECT * FROM tbl_training WHERE status='Layak' AND transportasi='".$data['transportasi']."'";
                    $query_order_m=mysqli_query($connect, $order_m);
                    $data_order_m=array();
                    while(($row_order_m=mysqli_fetch_array($query_order_m)) !=null){
                    $data_order_m[]=$row_order_m;
                    }
                    $count_m=count($data_order_m);

                    $psrm = $count_m / $count;

                    
                    echo"<div class='row'>";
                    if ($psrm == 0) {
                      $psrm +=1;
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Transportasi Layak</label>";
                            echo"<input type='text' name='psrm[]' readonly='readonly' class='form-control' value='".round($psrm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                      }else{
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Transportasi Layak</label>";
                            echo"<input type='text' name='psrm[]' readonly='readonly' class='form-control' value='".round($psrm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }
                      echo"</div>";
                    
                    

                    $order_n="SELECT * FROM tbl_training WHERE status='Tidak Layak' AND transportasi='".$data['transportasi']."'";
                    $query_order_n=mysqli_query($connect, $order_n);
                    $data_order_n=array();
                    while(($row_order_n=mysqli_fetch_array($query_order_n)) !=null){
                    $data_order_n[]=$row_order_n;
                    }
                    $count_n=count($data_order_n);

                    $psrtm = $count_n / $count_a;
                    
                   
                    echo"<div class='row'>";
                     if ($psrtm == 0) {
                      $psrtm +=1;
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Transportasi Tidak Layak</label>";
                            echo"<input type='text' name='psrtm[]' readonly='readonly' class='form-control' value='".round($psrtm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                        }else{
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Probilitas Transportasi Tidak Layak</label>";
                            echo"<input type='text' name='psrtm[]' readonly='readonly' class='form-control' value='".round($psrtm,3)."'>";
                          echo"</div>";
                        echo"</div>";
                      }
                      echo"</div>";

                    $layak = $pum * $ptm * $ppm * $ppnm * $ppdm * $psrm * $kelaslayak;
                    $tidaklayak = $putm * $pttm * $pptm * $ppntm * $ppdtm * $psrtm * $kelastdklayak;

                    echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Jml. Probilitas Layak</label>";
                            echo"<input type='text' name='jpm[]' readonly='readonly' value='".round($layak,4)."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Jml. Probilitas Tidak Layak</label>";
                          echo"<input type='text' name='jptm[]' readonly='readonly' value='".round($tidaklayak,4)."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";

                      
                      echo"<div class='row'>";
                      if ($tidaklayak > $layak) {
                      $status='Tidak Layak';
                          echo"<div class='col-sm-4'>";
                            echo"<div class='form-group'>";
                            echo"<label>Status</label>";
                              echo"<input type='text' name='status[]' readonly='readonly' class='form-control' value='".$status."'>";
                            echo"</div>";
                          echo"</div>";
                          }else{
                            $status='Layak';
                          echo"<div class='col-sm-4'>";
                            echo"<div class='form-group'>";
                            echo"<label>Status</label>";
                              echo"<input type='text' name='status[]' readonly='readonly' class='form-control' value='".$status."'>";
                            echo"</div>";
                          echo"</div>";
                           }
                        echo"</div>";
                    }
                 }
              }
            }else{
              echo "<script>alert('Opss!, Data Testing Belum Dipilih');
              document.location.href='dashboard.php?p=input_hk'</script>\n";
          }
        
      ?>
       </div>
      <a href="dashboard.php?p=data_hasil_klasifikasi" class="btn btn-danger" style="margin-top: 15px;"><i class="fa fa-close"></i> Tutup</a>
      <button type='submit' class='btn btn-success' style="margin-top: 15px;"><i class='fa fa-save'></i> Simpan Proses Akhir</i></button>
      </form>
          </div>
         
        </div>
      </div>
     