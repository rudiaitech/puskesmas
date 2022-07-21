<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> <?= $nama_jenis ?> </h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">List Kategori</a></li>
    </ul>
  </div>
  <div class="row">
  <?php foreach($data as $row){?>
      <div class="col-md-6 col-lg-3">
        <a href="<?= base_url()?>admin/perusahaan/data/<?= $row->id_kategori ?>" style="a:hover color: #004a43; text-decoration: none; background-color:red;">
          <div class="tile">
            <div class="tile-title-w-btn" style="color: #0a3967;">
            <i class="icon fa fa-th-list fa-3x"></i><h3 class="title"><?= $row->nama_kategori ?></h3>
              <p></p>
            </div>
            <div class="tile-body">
            </div>
          </div>
        </a>
      </div>
    <?php } ?>

</main>