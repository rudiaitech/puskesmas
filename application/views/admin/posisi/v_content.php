<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Posisi</h1>
      <p>Master Data Posisi</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item active"><a href="posisi">Data Posisi</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="tile">
        <div class="tile-title-w-btn">
          <p><button type="submit" class="btn btn-primary icon-btn btnadd"><i class="fa fa-plus"></i>Tambah Data</button></p>
        </div>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th style="width: 20%;">No</th>
                  <th>Nama Posisi</th>
                  <th style="width: 20%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach($data as $row){?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row->nama_posisi ?></td>
                  <td>
                      <button type="submit" class="btn btn-sm btn-warning btnedit" id="<?= $row->id_posisi ?>"><i class="fa fa-lg fa-edit"></i></button>

                      <button type="submit" class="btn btn-sm btn-danger btnhapus" id="<?= $row->id_posisi ?>"><i class="fa fa-lg fa-trash"></i></button>
                    
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<div id="modaladd" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah posisi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/posisi/insert" method="post"> 
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Nama posisi</label>
            <input class="form-control" type="text" id="nama_posisi" name="nama_posisi" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="modaledit" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit posisi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/posisi/update" method="post"> 
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Nama posisi</label>
            <input class="form-control" type="text" id="e_nama_posisi" name="e_nama_posisi" required>
            <input class="form-control" type="hidden" id="e_id_posisi" name="e_id_posisi" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>