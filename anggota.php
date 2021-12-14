<?php 
//proses delete data
if (isset($_GET['delete'])) {
  $id = $_GET['id'];
  $query_delete = mysqli_query($konek,"DELETE FROM anggota WHERE id = $id'");
  if ($query_delete) {
    ?>
    <div class="alert alert-succsess">
    Data Berhasil DIHAPUS !!!!!
    </div>
    <?php
  }
}
  //proses insert tambah data
  if (isset($_POST['save']))
  {
    $nis        = $_POST['nis'];
    $nama       = $_POST['nama'];
    $kelas      = $_POST['kelas'];
    $jurusan    = $_POST['jurusan'];
    $tgl_lahir  = $_POST['tanggal_lahir'];
    $tlp        = $_POST['no_telp'];
    $alamat     = $_POST['alamat'];
    $jk         = $_POST['jenis_kelamin'];

    $query_insert = mysqli_query($konek,"INSERT INTO anggota
    VALUES('','$nis','$nama','$kelas','$jurusan','$tgl_lahir','$tlp','$alamat','$jk')");
  
  //MEMBUAT NOTIFIKASI JIKA BERHASIL/TIDAK DSIMPAN DATANYA

  if($query_insert) {
?>
    <div class="alert alert-succses">
    Data Berhasil Disimpan !!! 

    </div>
    <?php
    header('Refresh:2; URL:http://localhost/24_mywebsite_12rpl2/admin.php?page=anggota');
  }
  else{
      ?>
      <div class="alert alert-danger">
      Data Gagal Disimpan !!!
      </div>
      <?php
   }
  }
  
//
?>


<center><h1 class="mt-4 mb-3">Data Anggota</h1></center>

<!--Button triger modal-->
<button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#examplemodal">
Tampil Tambah Data
</button>
<table class="table table-striped table-hover">
    <tr class="text-center">
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Tgl Lahir</th>
        <th>Tlp</td>
        <th>Alamat</th>
        <th>Gender</th>
        <th>--Action--</th>
    </tr>
    <?php
        $query = mysqli_query($konek,"SELECT * FROM anggota");
        $no = 1;
       foreach ($query as $row) {
    ?>
    <tr>
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td valign="middle"><?php echo $row['nis']; ?></td>
        <td valign="middle"><?php echo $row['nama']; ?></td>
        <td valign="middle"><?php echo $row['kelas']; ?></td>
        <td valign="middle"><?php echo $row['jurusan']; ?></td>
        <td valign="middle"><?php echo $row['tanggal_lahir']; ?></td>
        <td valign="middle"><?php echo $row['no_telp']; ?></td>
        <td valign="middle"><?php echo $row['alamat']; ?></td>
        
        <td align="center" valign="middle"><?php echo $row['jenis_kelamin']; ?></td>
        <td valign="middle">
        <a href="?page=anggota&delete&id=<?php echo $row['id_anggota']; ?>">
            <button class="btn btn-danger"><i class="fas fa-trash-alt">HAPUS</i></button>
          </a>

            <button class="btn btn-warning"><i class="fas fa-edit">UBAH</i></button>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data Anggota
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <!-- Form Input Anggota  -->
         <form action="" method="post">
        
         <div class="form-group mt-2">
            <input class="form-control" type="text" name="nis" placeholder="NIS" required>
        </div>

        <div class="form-group mt-2">
            <input class="form-control" type="text" name="nama" placeholder="Nama Siswa" required>
        </div>

        <div class="class form grup mt-2">
            <select class="form-control" name="kelas">
                <option value="">--Pilih kelas--</option>
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak1</option>
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak2</option>
                <option value="Rkayasa Perangkat Lunak">Rekayasa Perangkat Lunak3</option>
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak4</option>
                <option value="Teknik Kendaran Ringan">Teknik Kendaran Ringan1</option>
                <option value="Teknik Kendaran Ringan">Teknik Kendaran Ringan2</option>
                <option value="Teknik Kendaran Ringan">Teknik Kendaran Ringan3</option>
                <option value="Teknik Kendaran Ringan">Teknik Kendaran Ringan4</option>
                <option value="Teknik Kendaran Ringan">Teknik Kendaran Ringan5</option>
                <option value="Teknik Kendaran Ringan">Teknik Kendaran Ringan6</option>
                <option value="Teknik Ketenaga Listrik">Teknik Ketenaga Listrik1</option>
                <option value="Teknik Ketenaga Listrik">Teknik Ketenaga Listrik2</option>
                <option value="Teknik Ketenaga Listrik">Teknik Ketenaga Listrik3</option>
                <option value="Teknik Ketenaga Listrik">Teknik Ketenaga Listrik4</option>
                <option value="Teknik Audio Video">Teknik Audio Video1</option>
                <option value="Teknik Audio Video">Teknik Audio Video2</option>
                </select>    
        </div>

        <div class="class form grup mt-2">
            <select class="form-control" name="jurusan">
                <option value="">--Pilih jurusan--</option>
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                <option value="Teknik Kendaran Ringan">Teknik Kendaran RiTeknik Kendaran Ringan</option>
                <option value="Teknik Ketenaga Listrik">Teknik Ketenaga Listrik</option>
                <option value="Teknik Audio Video">Teknik Audio Video</option>
                </select>    
        </div>

        <div class="form-group mt-2">
            <div class="input-group">
            <span class="input-group-text">Tanggal Lahir</span>
              <input class="form-control" type="date" name="tanggal_lahir" placeholder="tgl lahir" required>
            </div>
        </div>

        <div class="form-group mt-2">
            <textarea class="form-control" type="text" name="alamat" placeholder="Alamat" required textarea>
        </div>

        <div class="form-group mt-2">
       
            <input class="form-control" type="text" name="no_telp" placeholder="no telp" required>
        </div>

  
        <div class="class form group mt-2">
            <select class="form-control" name="jenis_kelamin" id="">
            <option value="">--Jenis Kelamin--</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
            </select>
        </div>

      <!--END FORM INPUT ANGGOTA -->
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Save changes</button>

        </form>
      </div>
    </div>
  </div>

</div>