<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Perusahaan</h1>
      <p><?= $nama_jenis ?> - <?= $nama_kategori ?></p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item active"><a href="">Data Perusahaan</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-title-w-btn">
          <p><a  href="<?= base_url() ?>admin/perusahaan/add/<?= $id_kategori ?>" class="btn btn-primary icon-btn"><i class="fa fa-plus"></i>Tambah Data</a></p>
        </div>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th>Nama Perusahaan</th>
                  <th>Alamat</th>
                  <th>Koordinat</th>
                  <th>Terminal</th>
                  <th>Kategori Usaha</th>
                  <th style="width: 20%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach($data as $row){?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row->nama_perusahaan ?></td>
                  <td><?= $row->alamat ?></td>
                  <td><?= $row->koordinat ?></td>
                  <td><?= $row->nama_jenis ?></td>
                  <td><?= $row->nama_kategori ?></td>
                  <td>
                      <a type="button" href="<?= base_url() ?>admin/perusahaan/edit/<?= $row->id_perusahaan ?>" class="btn btn-sm btn-warning" id="<?= $row->id_perusahaan ?>"><i class="fa fa-lg fa-edit"></i></a>

                      <button type="submit" class="btn btn-sm btn-danger btnhapus" id="<?= $row->id_perusahaan ?>"><i class="fa fa-lg fa-trash"></i></button>
                    
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
        <h5 class="modal-title">Tambah desa</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/desa/insert" method="post"> 
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Kategori</label>
            <select class="form-control" type="text" id="id_jenis" name="id_jenis" required>
                <option value="">- Pilih Kategori  -</option>
                <?php $no=1; foreach($list_kategori as $row){?>
                  <option value="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></option>
                <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label class="control-label">Nama Perusahaan</label>
            <input class="form-control" type="text" id="nama_desa" name="nama_desa" placeholder="" required>
          </div>
          <div class="form-group">
            <label class="control-label">Nomor Urutan</label>
            <input class="form-control" type="text" id="alamat" name="alamat" placeholder="" required>
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
        <h5 class="modal-title">Edit desa</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/desa/update" method="post"> 
        <div class="modal-body">
          <div id="d_desa">

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