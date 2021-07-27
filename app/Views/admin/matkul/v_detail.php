

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            
            <!-- /.box-header -->
            <!-- id="example1" -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr> 
                        <th width="150px">Program Studi</th>
                        <td width="30px">:</td>
                        <td><?= $prodi['prodi']?></td>
                    </tr>
                    <tr> 
                        <th>Jenjang</th>
                        <td>:</td>
                        <td><?= $prodi['jenjang']?></td>
                    </tr>
                    <tr> 
                        <th>Fakultas</th>
                        <td>:</td>
                        <td><?= $prodi['fakultas']?></td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
        
    </div>

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
                    <th width="20px">No</th>
                    <th class="text-center">Kode</th>
                    <th>Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Semester</th>
                    <th width="50px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
           <?php $no= 1; 
           foreach ($matkul as $key => $value) {?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $value['kode_matkul'] ?></td>
                    <td ><?= $value['matkul'] ?></td>
                    <td  class="text-center"><?= $value['sks'] ?></td>
                    <td  class="text-center"><?= $value['kategori'] ?></td>
                    <td  class="text-center"><?= $value['smt'] ?>(<?= $value['semester'] ?>)</td>
                    <td  class="text-center" >   <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_matkul'] ?>"><i class="fa fa-trash"></i></button></td>

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
                <h4 class="modal-title">Add <?= $title ?></h4>
              </div>
              <div class="modal-body">
                <?php
                echo form_open('matkul/add/' . $prodi['id_prodi']);
                ?>
                <div class="form-group">
                        <label>Kode Matkul</label>
                        <input name="kode_matkul" class="form-control" placeholder="Kode Mata Kuliah" >
                </div> 
                <div class="form-group">
                        <label>Mata Kuliah</label>
                        <input name="matkul" class="form-control" placeholder="Mata Kuliah" >
                </div>
                <div class="form-group">
                        <label>SKS</label>
                            <select name="sks" class="form-control">
                            <option value="">--Pilih SKS--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        
                </div>

                <div class="form-group">
                        <label>Semester</label>
                            <select name="smt" class="form-control">
                            <option value="">--Pilih Semester--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        
                </div>

                <div class="form-group">
                        <label>Kategori</label>
                            <select name="kategori" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                                <option value="Wajib">Wajib</option>
                                <option value="Pilihan">Pilihan</option>    
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
<?php foreach($matkul as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_matkul'] ?>">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete <?= $title ?></h4>
              </div>
              <div class="modal-body">
               Apakah Anda Yakin Menghapus <b><?= $value['matkul'] ?>..?<b>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <a href="<?= base_url('matkul/delete/' . $prodi['id_prodi'].'/'. $value['id_matkul']) ?>" class="btn btn-success btn-flat">Delete</a>
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>


