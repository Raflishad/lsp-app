<div class="main-content">
<div class="content-wrapper"><!--Extended Table starts-->
<div class="row">
  <div class="col-12">
    <div class="content-header">Tabel Unit</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <a href="<?= BASE_URL ?>/UnitController/create">Tambah Unit</a>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table text-center table-striped zero-configuration">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode</th>
                  <th>Juduk</th>
                  <th>Jenis</th>
                  <th>Skema</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($data['unit'] as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['KODE_UNIT'] ?></td>
                    <td><?= $row['JUDUL_UNIT'] ?></td>
                    <td><?= $row['JENIS_UNIT'] ?></td>
                    <td><?= $row['NAMA_SKEMA'] ?></td>
                    <td>
                        <a class="success p-0" href="<?= BASE_URL ?>/UnitController/edit/<?= $row['ID_UNIT'] ?>"><i class="ft-edit-2 font-medium-3 mr-1"></i></a>
                        <a class="border-0 bg-transparent danger p-0 confirm-cancel" data-href="<?= BASE_URL ?>/UnitController/delete/<?= $row['ID_UNIT'] ?>"><i class="ft-x font-medium-3 mr-1"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
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