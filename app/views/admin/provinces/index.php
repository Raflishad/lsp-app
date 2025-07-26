<div class="main-content">
<div class="content-wrapper"><!--Extended Table starts-->
<div class="row">
  <div class="col-12">
    <div class="content-header">Tabel Provinsi</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <a href="<?= BASE_URL ?>/ProvincesController/create">Tambah Provinsi</a>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table text-center table-striped zero-configuration">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Provinsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                while ($row = $data['provinsi']->fetch_assoc()) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['NAME_PROVINCES'] ?></td>
                    <td>
                        <a class="success p-0" href="<?= BASE_URL ?>/ProvincesController/edit/<?= $row['ID_PROVINCES'] ?>"><i class="ft-edit-2 font-medium-3 mr-1"></i></a>
                        <a class="danger p-0" href="<?= BASE_URL ?>/ProvincesController/delete/<?= $row['ID_PROVINCES'] ?>" onclick="return confirm('Yakin?')"><i class="ft-x font-medium-3 mr-1"></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Extended Table Ends-->
</div>
</div>