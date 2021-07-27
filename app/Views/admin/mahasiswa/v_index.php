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
                <a href="<?= base_url('mahasiswa/add')?>" class="btn btn-box-tool"  ><i class="fa fa-plus">Add</i></a>
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
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jenjang</th>
                    <th>Prodi</th>
                    <th>Password</th>
                    <th>Foto</th>
                    <th width="150px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1;
             foreach($mhs as $key => $value){?>
            
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $value['nim']?></td>
                    <td><?= $value['nama_mhs']?></td>
                    <td><?= $value['jenjang']?></td>
                    <td><?= $value['prodi']?></td>
                    <td><?= $value['password']?></td>
                    <td class="text-center"><img src="<?= base_url('fotomhs/'. $value['foto_mhs'])?>" class="img-circle" width="70px" height="70px"></td>
                    <td class="text-center">
                        <a href="<?= base_url('Mahasiswa/edit/' . $value['id_mhs'])?>" class="btn btn-warning btn-sm btn-flat" ><i class="fa fa-pencil"></i></a>
                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_mhs'] ?>"><i class="fa fa-trash"></i></button>
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




<!-- Modal Delete -->
<?php foreach($mhs as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_mhs'] ?>">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Gedung</h4>
              </div>
              <div class="modal-body">
               Apakah Anda Yakin Menghapus <b><?= $value['nama_mhs'] ?>..?<b>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <a href="<?= base_url('mahasiswa/delete/' . $value['id_mhs']) ?>" class="btn btn-success btn-flat">Delete</a>
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>