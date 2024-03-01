<?php
include "koneksi.php";
session_start();

if (isset($_POST['tambah'])) {
  $namaalbum = $_POST['namaalbum'];
  $deskripsi = $_POST['deskripsi'];
  $tanggaldibuat = date("Y-m-d");
  $userid = $_SESSION['userid'];

  $sql = mysqli_query($conn, "insert into album values('','$namaalbum','$deskripsi','$tanggaldibuat','$userid')");

  if ($sql) {
    echo "<script>
  alert('tambah album berhasil');
  location.href='album2.php';
</script>";
  } else {
    echo "gagal tambah album";
  }
  $conn->close();
}

if (isset($_GET['albumid'])) {
  $albumid = $_GET['albumid'];
  $sql = mysqli_query($conn, "delete from album where albumid='$albumid'");
  echo "<script>
  alert('hapus album berhasil');
  location.href='album2.php';
</script>";
}

?>

<?php
include "layout/header_admin2.html";
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-2">Selamat datang <?= $_SESSION['namalengkap'] ?> </h1>
    <hr>

    <div class="container">
      <div class="container mt-1 row justify-content-center">
        <div class="col-sm-3">
          <h1 class="mt-2">Album</h1>
          <form action="album2.php" method="POST">
            <div class="mb-3 mt-3">
              <label for="namaalbum">Nama Album</label>
              <input type="text" class="form-control" id="namaalbum" placeholder="Enter nama album" name="namaalbum">
            </div>
            <div class="mb-3">
              <label for="deskripsi">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" class="form-control" rows="10" placeholder="enter deskripsi album"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="tambah">Tambah Album</button>
          </form>
        </div>
        <div class="col-sm-8">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Album</th>
                <th>Deskripsi</th>
                <th>Tanggal dibuat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $urut = 1;
              $userid = $_SESSION['userid'];
              $sql = mysqli_query($conn, "select * from album where userid='$userid'");
              while ($data = mysqli_fetch_array($sql)) {
              ?>
                <tr>
                  <td><?= $urut++ ?></td>
                  <td><?= $data['namaalbum'] ?></td>
                  <td><?= $data['deskripsi'] ?></td>
                  <td><?= $data['tanggaldibuat'] ?></td>
                  <td>
                    <a href="album2.php?albumid=<?= $data['albumid'] ?>" onclick="return confirm('Yakin menghapus data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                    <a href="album_edit2.php?albumid=<?= $data['albumid'] ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>

  </div>
</main>

<?php
include "layout/footer.html"
?>