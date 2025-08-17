
<div class="main-content">
<div class="content-wrapper">
<div class="row">
  <div class="col-12">
    <div class="content-header">Form Level</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <h2 class="card-title">Edit Level</h2>
            <form method="POST">
              <div class="row justify-content-start mt-2">
                <div class="col-md-6">
                  <div class="form-body">
                    <div class="form-group px-2">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                    <input type="hidden" name="id" value="<?= isset($data['ID_LEVEL']) ?>">
                    <label>Level</label>
                    <input type="text" class="form-control " name="level" value="<?= htmlspecialchars($data['LEVEL']) ?>" required>
                    <div class="mt-3">
                      <a  href="<?= BASE_URL ?>/AdminController/level" class="btn btn-raised btn-warning mr-1">
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
