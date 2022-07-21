  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> <?= $judul ?></h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="<?= $judul ?>"> <?= $judul ?></a></li>
      </ul>
    </div>
    <div class="row user">
      <div class="col-md-12">
        <div class="tile">

          <form action="<?php echo base_url().'admin/artikel/insert'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
            <div class="form-group row">
              <div class="col-md-8">

                <div class="form-group row">
                  <label class="control-label col-md-12">Judul Artikel</label>
                  <div class="col-md-12">
                    <input class="form-control" type="text" id="blog_judul" name="blog_judul" value="" placeholder="Judul Berita atau Artikel" required>
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                  </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-12">Isi Artikel</label>
                    <div class="col-md-12">
                      <textarea class="form-control" rows="10" id="blog_isi" name="blog_isi"></textarea>
                    </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="tile-body">
                <label class="control-label col-md-12">Thumbnail</label>
                  <img src="<?= base_url() ?>public/image/preview.jpg" id="imgView" class="card-img-top img-fluid">
                  <input type="file" id="inputFile" name="inputfile" class="form-control" aria-describedby="inputGroupFileAddon01">
                </div>
              </div>

                
            </div>

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="<?= base_url();?>admin/artikel/draft" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan Draft</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </main>


