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

                                            use App\Controllers\Mahasiswa;

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
                    <th>Nama Kelas</th>
                    <th>Program Studi</th>
                    <th>Dosen PA</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th width="50px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $db = \Config\Database::connect();
            $no = 1;

            

             foreach($kelas as $key => $value){
              $jml = $db->table('tbl_mhs')
              ->where('id_kelas',  $value['id_kelas'])
              ->countAllResults();
               
               ?>
            
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $value['nama_kelas']?> - <?= $value['tahun_angkatan']?></td>
                    <td><?= $value['prodi']?></td>
                    <td><?= $value['nama_dosen']?></td>
                    <td class="text-center"><?= $value['tahun_angkatan']?></td>
                    <td class="text-center"><p class="label bg-green"><?= $jml ?></p>
                    <br> <a href="<?= base_url('kelas/rincian_kelas/'. $value['id_kelas']) ?>">Mahasiswa</a>
                    </td>
                     <td class="text-center">
                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_kelas'] ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Add <?=$title?> </h4>
              </div>
              <div class="modal-body">
                <?php
                echo form_open('kelas/add');
                ?>
                <div class="form-group">
                        <label>Nama Kelas</label>
                        <input name="nama_kelas" class="form-control" placeholder="Nama Kelas" required >
                </div>
                <div class="form-group">
                        <label>Program Studi</label>
                        <select name="id_prodi" class="form-control">
                            <option value="">--Pilih Program Studi--</option>  
                            <?php foreach($prodi as $key => $value){?>
                                    <option value="<?= $value['id_prodi']?>"><?= $value['prodi']?></option>
                            <?php } ?>
                        </select>
                </div>
                <div class="form-group">
                        <label>Dosen PA</label>
                        <select name="id_dosen" class="form-control">
                            <option value="">--Pilih Dosen PA--</option>  
                            <?php foreach($dosen as $key => $value){?>
                                    <option value="<?= $value['id_dosen']?>"><?= $value['nama_dosen']?></option>
                            <?php } ?>
                        </select>
                </div>

                <div class="form-group">
                        <label>Tahun Angkatan</label>
                        <select name="tahun_angkatan" class="form-control">
                            <option value="">--Pilih Tahun--</option> 
                            <?php for ($i = date('Y'); $i >= date('Y')-5; $i--){ ?>
                             <option value="<?= $i ?>"> <?= $i?></option>   
                           <?php } ?> 
                        </select>
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


<!-- Modal Delete -->
<?php foreach($kelas as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_kelas'] ?>">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete <?= $title ?></h4>
              </div>
              <div class="modal-body">
               Apakah Anda Yakin Menghapus <b><?= $value['nama_kelas'] ?>..?<b>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <a href="<?= base_url('kelas/delete/' . $value['id_kelas']) ?>" class="btn btn-success btn-flat">Delete</a>
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>