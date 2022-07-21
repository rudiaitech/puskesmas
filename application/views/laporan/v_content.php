<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
            <div class="row">

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><?= $judul ?></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form action="<?php echo base_url().'laporan/cetak'?>" method="post" target="_blank" class="form-horizontal form-label-left">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tahun
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-8">
                                    <select type="text" id="tahun" name="tahun" required="required" class="form-control ">
                                        <option value=""> - Pilih Tahun - </option>
                                        <option value="2021"> 2021 </option>
                                        <option value="2020"> 2020 </option>
                                        <option value="2019"> 2019 </option>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Bulan
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                    <select type="text" id="bulan" name="bulan" required="required" class="form-control ">
                                        <option value=""> -Pilih Bulan - </option>
                                        <option value="01"> Januari </option>
                                        <option value="02"> Februari </option>
                                        <option value="03"> Maret </option>
                                        <option value="04"> April </option>
                                        <option value="05"> Mei </option>
                                        <option value="06"> Juni </option>
                                        <option value="07"> Juli </option>
                                        <option value="08"> Agustus </option>
                                        <option value="09"> September </option>
                                        <option value="10"> Oktober </option>
                                        <option value="11"> November </option>
                                        <option value="12"> Desember </option>
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-6 offset-md-0">

                                    <button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-fw fa-lg fa-print"></i> Cetak</button>
                                </div>
                            </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->

