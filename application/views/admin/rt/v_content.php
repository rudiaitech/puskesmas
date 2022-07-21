<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Data RT</h1>
      <p>Master Data RT</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item active"><a href="rt">Data RT</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-10">
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
                  <th>Nama RT</th>
                  <th>Nomor urutan</th>
                  <th>Desa</th>
                  <th style="width: 20%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach($data as $row){?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row->nama_rt ?></td>
                  <td><?= $row->nomor_urutan ?></td>
                  <td><?= $row->nama_desa ?></td>
                  <td>
                      <button type="submit" class="btn btn-sm btn-warning btnedit" id="<?= $row->id_rt ?>"><i class="fa fa-lg fa-edit"></i></button>

                      <button type="submit" class="btn btn-sm btn-danger btnhapus" id="<?= $row->id_rt ?>"><i class="fa fa-lg fa-trash"></i></button>
                    
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-10">
      <div class="tile">
        <div class="tile-title-w-btn">
          <input type="file" name="insert_image" id="insert_image" accept="image/*"class="btn btn-primary icon-btn">
          <button class="btn btn-success crop_image">Crop & Insert Image</button>
        </div>
        <div class="tile-body">
          <div class="panel panel-default">
              <div class="panel-body" align="center">
                  <div id="store_image"></div>

                  <div class="row">
                    <div class="col-md-4 text-center">
                      <div ><img id="camera" src="<?php echo base_url()?>public/vali/images/banner.jpg" style="width: 100px; height:100px;"></div>
                      
                    </div>
                    <div class="col-md-4">
                      <div id="upload-demo-i" style="width: 100px; height:100px;"></div>
                    </div>
                  </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-10">
      <div class="tile">
        <div class="tile-title-w-btn">
          <input type="file" name="insert_image" id="insert_image" accept="image/*"class="btn btn-primary icon-btn">
          <button class="btn btn-success crop_image">Crop & Insert Image</button>
        </div>
        <div class="tile-body">
        <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
        <p>Ambil Gambar</p>
    
    <div id="webcam">
        
    </div>
    <input type=button value="Capture" onClick="preview()">
    <div id="simpan" style="display:none">
        <input type=button value="Remove" onClick="batal()">
        <input type=button value="Save" onClick="simpan()" style="font-weight:bold;">
    </div>
 
    <div id="hasil"></div>
        </div>
      </div>
    </div>
</main>

<div id="modaladd" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah rt</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/rt/insert" method="post"> 
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Desa</label>
            <select class="form-control" type="text" id="id_desa" name="id_desa" required>
                <option value="">- Pilih desa  -</option>
                <?php $no=1; foreach($list_desa as $row){?>
                  <option value="<?= $row->id_desa ?>"><?= $row->nama_desa ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label">Nama RT</label>
            <input class="form-control" type="text" id="nama_rt" name="nama_rt" placeholder="" required>
          </div>
          <div class="form-group">
            <label class="control-label">Nomor Urutan</label>
            <input class="form-control" type="text" id="nomor_urutan" name="nomor_urutan" placeholder="" required>
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
        <h5 class="modal-title">Edit rt</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/rt/update" method="post"> 
        <div class="modal-body">
          <div id="d_rt">

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

<div id="insertimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Crop & Insert Image</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 text-center">
            <div id="image_demo" style="width:350px; margin-top:30px"></div>
          </div>
          <div class="col-md-4" style="padding-top:30px;">
        <br />
        <br />
        <br/>
            <button class="btn btn-success crop_image">Crop & Insert Image</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
