<div class="content-wrapper">
    <section class="content-header">
        <h1 class="pull-left"><?php echo $subtitle; ?></h1>
        <div class="pull-right">
            <a href="<?php echo site_url('news'); ?>" class="btn bg-purple btn-sm" data-placement="left" data-toggle="tooltip" data-original-title="Kembali"><i class="fa fa-mail-reply"></i></a>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form class="form-horizontal" method="post" id="" action="<?php echo site_url('news/update'); ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $edit->id; ?>">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Judul &nbsp<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" name="judul" id="judul" value="<?php echo $edit->news_title; ?>">
                                    <?php echo form_error('judul'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Isi Berita &nbsp<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <textarea class="ckeditor" name="isi_berita"><?php echo $edit->news_content; ?></textarea>
                                    <?php echo form_error('isi_berita'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Unggah Foto</label>
                                <div class="col-md-8">
                                    <?php
                                        if (!empty($edit->news_file)){
                                    ?>
                                            <img class="img img-responsive" src="<?php echo base_url(); ?>assets/images/news/<?php echo $edit->news_file; ?>" width="150"><br>
                                    <?php
                                        }
                                    ?>

                                    <input type="file" name="foto" accept="image/*">
                                    <div class="text-danger"><?php echo $error; ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Terbitkan &nbsp<span class="required">*</span></label>
                                <div class="col-md-3">
                                    <select class="form-control" name="terbitkan">
                                        <option disabled selected>-- Pilih Terbitkan --</option>
                                        <option value="Ya" <?php echo $edit->publish == 'Ya' ? 'selected' : ''; ?>>Ya</option>
                                        <option value="Tidak" <?php echo $edit->publish == 'Tidak' ? 'selected' : ''; ?>>Tidak</option>
                                    </select>
                                    <?php echo form_error('terbitkan'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-6">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

