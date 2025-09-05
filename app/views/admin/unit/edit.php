
<div class="main-content">
<div class="content-wrapper">
<div class="row">
  <div class="col-12">
    <div class="content-header">Form Unit</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <h2 class="card-title">Edit Unit</h2>
            <form method="POST">
              <div class="row justify-content-start mt-2">
                <div class="col-md-6">
                  <div class="form-body">
                    <div class="form-group px-2">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                    <input type="hidden" name="id" value="<?= isset($data['ID_UNIT']) ?>">
                    <label>Skema</label>
                    <select name="skemaId" class="form-control" required>
                        <option value="">-- Pilih Skema --</option>
                        <?php foreach ($provinces as $p): ?>
                            <option value="<?= $p['ID_SKEMA'] ?>"
                                <?= ($p['ID_SKEMA'] == $data['ID_SKEMA']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($p['NAMA_SKEMA']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label class="mt-2">Kode</label>
                    <input type="text" class="form-control" name="kode" value="<?= htmlspecialchars($data['KODE_UNIT']) ?>" required>
                    <label class="mt-2">Judul</label>
                    <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($data['JUDUL_UNIT']) ?>" required>
                    <label class="mt-2">Jenis</label>
                    <input type="text" class="form-control" name="jenis" value="<?= htmlspecialchars($data['JENIS_UNIT']) ?>" required>
                    <div class="mt-3">
                      <a  href="<?= BASE_URL ?>/AdminController/unit" class="btn btn-raised btn-warning mr-1">
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
