<div class="content-wrapper">
    <section class="content-header">
        <h1 class="pull-left"><?php echo $subtitle; ?></h1>
        <div class="pull-right">
            <a href="<?php echo site_url('photos'); ?>" class="btn bg-purple btn-sm" data-placement="left" data-toggle="tooltip" data-original-title="Kembali"><i class="fa fa-mail-reply"></i></a>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form class="form-horizontal" method="post" id="" action="<?php echo site_url('photos/save'); ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Judul &nbsp<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" name="judul" id="judul" value="<?php echo set_value('judul'); ?>">
                                    <?php echo form_error('judul'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Unggah Foto &nbsp<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input type="file" name="foto" accept="image/*">
                                    <div class="text-danger"><?php echo $error; ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Deskripsi</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Terbitkan &nbsp<span class="required">*</span></label>
                                <div class="col-md-3">
                                    <select class="form-control" name="terbitkan">
                                        <option disabled selected>-- Pilih Terbitkan --</option>
                                        <option value="Ya" <?php echo set_select('terbitkan', 'Ya'); ?>>Ya</option>
                                        <option value="Tidak" <?php echo set_select('terbitkan', 'Tidak'); ?>>Tidak</option>
                                    </select>
                                    <?php echo form_error('terbitkan'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-6">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

