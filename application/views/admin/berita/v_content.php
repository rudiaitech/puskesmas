<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> <?= $judul ?> </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item active"><?= $judul ?></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-title-w-btn">
        <?php
        if($status == 'Draft'){
          $url = base_url().'admin/berita/add';
          
          echo "<p><a href='$url' class='btn btn-primary icon-btn'><i class='fa fa-plus'></i>Tambah Data</a></p>";
        }
        ?>
        </div>
        <div class="tile-body">
          <div class="table-responsive">
          <input class="form-control" type="hidden" id="blog_status" name="blog_status" value="<?= $status ?>" required>
            <table class="table table-hover table-bordered" id="tabelberita">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Thumbnail</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Tanggal</th>
                  <th>Dilihat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
