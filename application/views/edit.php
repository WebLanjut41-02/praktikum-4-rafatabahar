<form action="<?= base_url('Home/postEdit') ?>" method="post">
  NIM : <input type="text" name="nim" value="<?= $mahasiswa->nim ?>"><br>
  Nama : <input type="text" name="nama" value="<?= $mahasiswa->nama ?>"><br>
  JK : <input type="text" name="jenis_kelamin" value="<?= $mahasiswa->jenis_kelamin ?>"><br>
  Prodi : <input type="text" name="prodi" value="<?= $mahasiswa->prodi ?>"><br>
  Fakultas : <input type="text" name="fakultas" value="<?= $mahasiswa->fakultas ?>"><br>
  <input type="hidden" name="id" value="<?= $mahasiswa->id ?>">
  <input type="submit" name="submit" value="submit">
</form>
