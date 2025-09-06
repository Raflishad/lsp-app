
<div class="main-content">
<div class="content-wrapper">
<div class="row">
  <div class="col-12">
    <div class="content-header">Form Skema</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <h2 class="card-title">Edit Skema</h2>
            <form method="POST">
              <div class="row justify-content-start mt-2">
                <div class="col-md-6">
                  <div class="form-body">
                    <div class="form-group px-2">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                    <input type="hidden" name="id" value="<?= isset($data['ID_SKEMA']) ?>">
                    <label>Program Keahlian</label>
                    <select name="pgId" class="form-control" required>
                        <option value="">-- Pilih Program Keahlian --</option>
                        <?php foreach ($programKeahlian as $p): ?>
                            <option value="<?= $p['ID_PROGRAM_KEAHLIAN'] ?>"
                                <?= ($p['ID_PROGRAM_KEAHLIAN'] == $data['ID_PROGRAM_KEAHLIAN']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($p['NAMA_PROGRAM_KEAHLIAN']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label class="mt-2">Level</label>
                    <select name="levelId" class="form-control" required>
                        <option value="">-- Pilih Level --</option>
                        <?php foreach ($level as $l): ?>
                            <option value="<?= $l['ID_LEVEL'] ?>"
                                <?= ($l['ID_LEVEL'] == $data['ID_LEVEL']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($l['LEVEL']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label class="mt-2">Kode</label>
                    <input type="text" class="form-control" name="kode" value="<?= htmlspecialchars($data['KODE_SKEMA']) ?>" required>
                    <label class="mt-2">Kategori</label>
                    <input type="text" class="form-control" name="kategori" value="<?= htmlspecialchars($data['KATEGORI_SKEMA']) ?>" required>
                    <label class="mt-2">Nama</label>
                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($data['NAMA_SKEMA']) ?>" required>
                    <div class="mt-3">
                      <a  href="<?= BASE_URL ?>/AdminController/skema" class="btn btn-raised btn-warning mr-1">
                        <i class="ft-x"></i> Cancel
                      </a>
                      <button type="submit mt-4" class="btn btn-raised btn-primary">
                        <i class="fa fa-check-square-o"></i> Save
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</div>
