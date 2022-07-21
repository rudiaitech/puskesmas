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
                        <form action="<?php echo base_url().'pasien/update'?>" method="post" class="form-horizontal form-label-left">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No Register<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-12 ">
                                    <input type="text" id="noreg_pasien" name="noreg_pasien" required="required" class="form-control " value="<?= $data['noreg_pasien'] ?>">
                                    <input type="hidden" id="id_pasien" name="id_pasien" required="required" class="form-control " value="<?= $data['id_pasien'] ?>">
                                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK KTP<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-12 ">
                                    <input type="text" id="nikktp_pasien" name="nikktp_pasien" required="required" class="form-control " value="<?= $data['nikktp_pasien'] ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-12 ">
                                    <input type="text" id="nama_pasien" name="nama_pasien" required="required" class="form-control" value="<?= $data['nama_pasien'] ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-12 ">
                                    <input type="text" id="alamat_pasien" name="alamat_pasien" required="required" class="form-control " value="<?= $data['alamat_pasien'] ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Desa<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-12 ">
                                    <select id="desa_pasien" name="desa_pasien" required="required" class="form-control ">
                                        <option value="<?= $data['desa_pasien'] ?>"><?= $data['desa_pasien'] ?></option>
                                        <option value="">- Pilih Desa -</option>
                                        <option value="Gayam">Gayam</option>
                                        <option value="Gendang Barat">Gendang Barat</option>
                                        <option value="Gendang Timur">Gendang Timur</option>
                                        <option value="Jambuir">Jambuir</option>
                                        <option value="Kalowang">Kalowang</option>
                                        <option value="Karang Tengah">Karang Tengah</option>
                                        <option value="Nyamplong">Nyamplong</option>
                                        <option value="Pancor">Pancor</option>
                                        <option value="Prambanan">Prambanan</option>
                                        <option value="Tarebung">Tarebung</option>
                                        <option value="Lainya">Lainya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jenis Kelamin<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-12 ">
                                    <select id="jeniskelamin_pasien" name="jeniskelamin_pasien" required="required" class="form-control ">
                                        <option value="<?= $data['jeniskelamin_pasien'] ?>"><?= $data['jeniskelamin_pasien'] ?></option>
                                        <option value="">- Pilih Jenis Kelamin -</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tgl. Lahir<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-12 ">
                                    <input type="date" id="tanggallahir_pasien" name="tanggallahir_pasien" required="required" class="form-control " value="<?= $data['tanggallahir_pasien'] ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tempat Lahir<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-12 ">
                                    <input type="text" id="tempatlahir_pasien" name="tempatlahir_pasien" required="required" class="form-control " value="<?= $data['tempatlahir_pasien'] ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No. Telp<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-12 ">
                                    <input type="text" id="notlp_pasien" name="notlp_pasien" required="required" class="form-control " value="<?= $data['notlp_pasien'] ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jenis Jaminan Kesehatan<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-12 ">
                                    <select id="jenisjamkes_pasien" name="jenisjamkes_pasien" required="required" class="form-control ">
                                        <option value="<?= $data['jenisjamkes_pasien'] ?>"><?= $data['jenisjamkes_pasien'] ?></option>
                                        <option value="">- Pilih Jenis Jaminan Kesehatan -</option>
                                        <option value="Umum">Umum</option>
                                        <option value="BPJS">BPJS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No. Jaminan Kesehatan<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-12 ">
                                    <input type="text" id="nojamkes_pasien" name="nojamkes_pasien"  class="form-control " value="<?= $data['nojamkes_pasien'] ?>">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-6 offset-md-0">
                                  <a type="button" href="<?= base_url();?>pasien" class="btn btn-sm btn-secondary"  style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>

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