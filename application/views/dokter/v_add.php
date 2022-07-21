<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-8 col-sm-12 ">
                <?php
                echo validation_errors('<div class="alert alert-danger alert-dismissible">','</div>');
                if ($this->session->flashdata('success'))
                {
                    echo '<div class="alert alert-success alert-dismissible " role="alert">';
                    echo $this->session->flashdata('success');
                    echo '</div>';
                }
                if ($this->session->flashdata('error'))
                {
                    echo '<div class="alert alert-danger alert-dismissible " role="alert">';
                    echo $this->session->flashdata('error');
                    echo '</div>';
                }

                ?>
             

                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= $judul ?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="<?php echo base_url().'dokter/insert'?>" method="post" class="form-horizontal form-label-left">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NK Dokter<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-12 ">
                                    <input type="text" id="nik_dokter" name="nik_dokter" required="required" class="form-control ">
                                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Dokter<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-12 ">
                                    <input type="text" id="nama_dokter" name="nama_dokter" required="required" class="form-control ">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Inisial Dokter<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-12 ">
                                    <input type="text" id="inisial_dokter" name="inisial_dokter" required="required" class="form-control " maxlength="3">
                                    <span style="color: red;">Inisial wajib 3 karakter</span>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-12 ">
                                    <input type="text" id="alamat_dokter" name="alamat_dokter" required="required" class="form-control ">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No. Telp<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-12 ">
                                    <input type="text" id="notlp_dokter" name="notlp_dokter" required="required" class="form-control ">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Poli<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-12 ">
                                    <select id="id_poli" name="id_poli" required="required" class="form-control ">
                                        <option value="">- Pilih Poli -</option>
                                        <?php $no=1; foreach($poli as $row_poli){?>
                                        <option value="<?= $row_poli->id_poli ?>"><?= $row_poli->nama_poli ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Username<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-12 ">
                                    <input type="text" id="username_dokter" name="username_dokter" required="required" class="form-control ">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-12 ">
                                    <input type="text" id="password_dokter" name="password_dokter" required="required" class="form-control ">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-6 offset-md-0">
                                  <a type="button" href="<?= base_url();?>dokter" class="btn btn-sm btn-secondary"  style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>

                                    <button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-fw fa-lg fa-save"></i> Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->