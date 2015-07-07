<form method="post" action="<?php echo site_url('users/delete'); ?>">
    <div class="content-wrapper">
        <section class="content-header">
          <h1 class="pull-left"><?php echo $subtitle; ?></h1>
          <div class="pull-right">
            <a href="<?php echo site_url('users/add'); ?>" class="btn btn-success btn-sm" data-placement="left" data-toggle="tooltip" data-original-title="Tambah"><i class="fa fa-plus"></i></a>
            <button class="btn btn-danger btn-sm" type="submit" data-placement="top" data-toggle="tooltip" data-original-title="Hapus"><i class="fa fa-trash-o"></i></button>
          </div>
        </section>

        <?php if ($this->session->flashdata('success')) : ?>
            <div class="content-flash">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="content-flash">
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            </div>
        <?php endif ?>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center"><input type="checkbox" id="idAll"></th>
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Nama Pengguna</th>
                                        <th>Status</th>
                                        <th>Hak Akses</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($users as $row): ?>
                                    <tr>
                                        <input type="hidden" name="array_id[]" value="<?php echo $row->id; ?>" class="check">
                                        <td class="text-center"><input type="checkbox" name="id[<?php echo $row->id; ?>]" class="check"></td>
                                        <td><?php echo $row->firstname; ?></td>
                                        <td><?php echo $row->lastname; ?></td>
                                        <td><?php echo $row->username; ?></td>
                                        <td><?php echo $row->active; ?></td>
                                        <td><?php echo $row->rolename; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url('users/edit/'.$row->id) ?>" class="btn btn-info btn-sm" data-placement="top" data-toggle="tooltip" data-original-title="Ubah"><i class="glyphicon glyphicon-edit"></i></a>
                                        </td>
                                    </tr>
                                    <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>

<script type="text/javascript">
    $(function () {
        $('#idAll').click(function() {
            if(this.checked) {
                $('.check').each(function() {
                    this.checked = true;
                });
            }else{
                $('.check').each(function() {
                    this.checked = false;
                });
            }
        });
    });
</script>
