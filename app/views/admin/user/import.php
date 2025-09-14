<div class="main-content">
<div class="content-wrapper">
<div class="row">
  <div class="col-12">
    <div class="content-header">Import User</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <h2 class="card-title">Upload CSV User</h2>
            <form method="POST" enctype="multipart/form-data">
              <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
              <div class="form-group">
                <label>Pilih File CSV</label>
                <input type="file" name="file" class="form-control col-8" accept=".csv" required>
              </div>
              <button type="submit" class="btn btn-raised btn-primary">
                <i class="fa fa-upload"></i> Import
              </button>
              <a href="<?= BASE_URL ?>/AdminController/user" class="btn btn-raised btn-warning">
                Cancel
              </a>
            </form>
            <p class="mt-2 text-muted">Format CSV: <br>
              <code>username,password,nama,email</code>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</div>
