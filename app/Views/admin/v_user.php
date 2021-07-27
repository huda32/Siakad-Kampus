<section class="content-header">
        <h1>
       <?= $title ?>
        </h1>  
        <br>
</section>

<div class="row">
    <div class="col-sm-12">
    <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> Data <?= $title ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add" ><i class="fa fa-plus">Add</i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                        
            <?php

                $errors = session()->getFlashdata('errors');
                if(!empty($errors)){?>
                    <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errors as $key => $value){?>
                            <li><?= esc($value)?></li>
                        <?php }?>   
                    <ul>
            </div>
            <?php }?>
                <?php
                 if(session()->getFlashdata('pesan')){
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

            <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="30px">No</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Foto</th>
                    <th width="150px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1;
             foreach($user as $key => $value){?>
            
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $value['nama_user']?></td>
                    <td><?= $value['username']?></td>
                    <td><?= $value['password']?></td>
                    <td class="text-center"><img src="<?= base_url('foto/'. $value['foto'])?>" class="img-circle" width="70px" height="70px"></td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_user'] ?>"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
    </div>
</div>


<!-- modal add -->
<div class="modal fade" id="add">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add <?= $title?></h4>
              </div>
              <div class="modal-body">
                <?php
                echo form_open_multipart('user/add');
                ?>
                <div class="form-group">
                        <label>Nama User</label>
                        <input name="nama_user" class="form-control" placeholder="Nama User">
                </div>

                <div class="form-group">
                        <label>Username</label>
                        <input name="username" class="form-control" placeholder="Username">
                </div>

                <div class="form-group">
                        <label>Password</label>
                        <input name="password" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control" >
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

<!-- modal Editt -->

<?php foreach($user as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_user'] ?>">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit <?= $title ?></h4>
              </div>
              <div class="modal-body">
                <?php
                echo form_open_multipart('user/edit/' . $value['id_user']);
                ?>
                <div class="form-group">
                        <label>Nama User</label>
                        <input name="nama_user" value="<?= $value['nama_user']?>" class="form-control" placeholder="user" required >
                </div>

                <div class="form-group">
                        <label>Username</label>
                        <input name="username"  value="<?= $value['username']?>" class="form-control" placeholder="Username">
                </div>

                <div class="form-group">
                        <label>Password</label>
                        <input name="password"  value="<?= $value['password']?>" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                        <label>Ganti Foto</label>
                        <input type="file" name="foto" class="form-control" >
                </div>

                <div class="form-group">
                       <img src="<?= base_url('foto/' .$value['foto'])?>" class="img-circle" width="100px" height="100px">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>


<!-- Modal Delete -->
<?php foreach($user as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_user'] ?>">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete <?= $title ?></h4>
              </div>
              <div class="modal-body">
               Apakah Anda Yakin Menghapus <b><?= $value['nama_user'] ?>..?<b>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <a href="<?= base_url('user/delete/' . $value['id_user']) ?>" class="btn btn-success btn-flat">Delete</a>
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>