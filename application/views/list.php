<br>
<br><a href="<?= base_url('Home/tambah/')?>">Tambah data baru</a>
<form action="<?= base_url('Home/cari/')?>" method="post">
  <input type="text" name="cari" placeholder="Search" value="">
  <input type="submit" name="search" value="Cari">
</form>
<table border="1">
  <thead>
    <th>NIM</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Prodi</th>
    <th>Fakultas</th>
    <th>Aksi</th>
  </thead>
  <tbody>
    <?php if ($mahasiswa == 'Tidak ada data'): ?>
      <?= $mahasiswa ?>
    <?php else: ?>
      <?php foreach ($mahasiswa as $key => $value): ?>
        <tr>
          <td><?= $value->nim ?></td>
          <td><?= $value->nama ?></td>
          <td><?= $value->jenis_kelamin ?></td>
          <td><?= $value->prodi ?></td>
          <td><?= $value->fakultas ?></td>
          <td>
            <a href="<?= base_url('Home/edit/').$value->id ?>">Edit</a>
            <a href="<?= base_url('Home/hapus/').$value->id ?>">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>

  </tbody>
</table>
