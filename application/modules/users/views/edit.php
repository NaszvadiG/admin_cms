<div class="content-wrapper">
    <section class="content-header">
      <h1 class="pull-left"><?php echo $subtitle; ?></h1>
      <div class="pull-right">
        <a href="<?php echo site_url('users'); ?>" class="btn bg-purple btn-sm" data-placement="left" data-toggle="tooltip" data-original-title="Kembali"><i class="fa fa-mail-reply"></i></a>
      </div>
    </section>

    <section class="content">
    	<div class="row">
			<div class="col-md-12">
			  	<div class="box box-primary">
			    	<form class="form-horizontal" method="post" id="" action="<?php echo site_url('users/update'); ?>">
			    		<div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $edit->id; ?>">
			    			<div class="form-group">
                                <label class="control-label col-sm-2">Nama Depan &nbsp<span class="required">*</span></label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="nama_depan" id="nama_depan" value="<?php echo $edit->firstname; ?>" autofocus>
                                    <?php echo form_error('nama_depan'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama Belakang &nbsp<span class="required">*</span></label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="nama_belakang" id="nama_belakang" value="<?php echo $edit->lastname; ?>">
                                    <?php echo form_error('nama_belakang'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama Pengguna &nbsp<span class="required">*</span></label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="nama_pengguna" id="nama_pengguna" value="<?php echo $edit->username; ?>">
                                    <?php echo form_error('nama_pengguna'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Kata Sandi</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="kata_sandi" id="kata_sandi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Hak Akses &nbsp<span class="required">*</span></label>
                                <div class="col-md-6">
                                    <select class="form-control" name="hak_akses">
                                    	<option disabled selected>-- Pilih Hak Akses --</option>
                                        <?php
                                            $id = $edit->role_id;
                                            foreach($roles as $row){
                                                $selected = ($row->id == $id) ? 'selected' : NULL;
                                        ?>
                                                <option <?php echo $selected; ?> value="<?php echo $row->id; ?>"><?php echo $row->rolename; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <?php echo form_error('hak_akses'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Status &nbsp<span class="required">*</span></label>
                                <div class="col-md-6">
                                    <input type="radio" name="status" value="Aktif" <?php if ($edit->active == 'Aktif') echo 'checked'; ?>>Aktif &nbsp;
                                    <input type="radio" name="status" value="Tidak Aktif" <?php if ($edit->active == 'Tidak Aktif') echo 'checked'; ?>>Tidak Aktif
                                    <?php echo form_error('status'); ?>
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

