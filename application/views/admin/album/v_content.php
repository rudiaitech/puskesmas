<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data <?= $judul ?></h1>
      <p> <?= $judul ?></p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item active">Data <?= $judul ?></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-title-w-btn">
          <p><a href="<?= base_url(); ?>admin/album/add" class="btn btn-primary icon-btn"><i class="fa fa-plus"></i>Tambah Data</a></p>
        </div>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th style="width: 20%;">Cover Album</th>
                  <th style="width: 55%;">Judul Album</th>
                  <th style="width: 20%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach($data as $row){?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><img src="<?= base_url()?>/public/image/upload/galeri_foto/<?= $row->album_cover ?>" style="width: 100px; height: 100px;"></td>
                  <td><?= $row->album_title ?></td>
                  <td>
                      <a href="<?= base_url(); ?>admin/album/edit/<?= $row->id_album ?>" type="submit" class="btn btn-sm btn-warning" id="<?= $row->id_album ?>"><i class="fa fa-lg fa-edit"></i></a>

                      <a type="submit" class="btn btn-sm btn-danger btnhapus" id="<?= $row->id_album ?>"><i class="fa fa-lg fa-trash"></i></a>

                      <?php
                      if($row->status_post == 'Draft'){
                      ?>
                          <a type="submit" class="btn btn-sm btn-success btnstatus" id="<?= $row->id_album ?>" data-statusnext="Post"><i class="fa fa-lg fa-newspaper-o"></i></a>

                      <?php
                      }else{
                      ?>
                          <a type="submit" class="btn btn-sm btn-secondary btnstatus" id="<?= $row->id_album ?>" data-statusnext="Block"><i class="fa fa-lg fa-warning"></i></a>
                      <?php
                      }
                      ?>
                    
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
        <h5 class="modal-title">Tambah foto</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/foto/insert" method="post"> 
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Jenis</label>
            <select class="form-control" type="text" id="id_jenis" name="id_jenis" required>
                <option value="">- Pilih Jenis  -</option>
                <?php $no=1; foreach($list_jenis as $row){?>
                  <option value="<?= $row->id_jenis ?>"><?= $row->nama_jenis ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label">foto Usaha</label>
            <input class="form-control" type="text" id="nama_foto" name="nama_foto" placeholder="" required>
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
        <h5 class="modal-title">Edit foto</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/foto/update" method="post"> 
        <div class="modal-body">
          <div id="d_foto">

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