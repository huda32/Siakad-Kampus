<section class="content-header">
        <h1>
       <?= $title ?>
        </h1>  
        <br>
</section>

<div class="row">
<div class="col-sm-3">
    </div>
    <div class="col-sm-6">
    
    <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $title ?></h3>

              <div class="box-tools pull-right">
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
                echo form_open_multipart('mahasiswa/insert');
                ?>
               
               
                    <div class="form-group">
                            <label>NIM</label>
                            <input name="nim"  class="form-control" placeholder="NIM"  >
                    </div>
               
                
                    <div class="form-group">
                            <label>Nama </label>
                            <input name="nama_mhs"  class="form-control" placeholder="Nama" >
                    </div>
           

                <div class="form-group">
                        <label>Program Studi</label>
                        <select name="id_prodi" class="form-control">
                            <option value="">---Pilih Program Studi---</option>
                                <?php foreach($prodi as $key => $value){?>
                                        <option value="<?= $value['id_prodi']?>"> <?= $value['jenjang'] ?>--<?= $value['prodi'] ?></option> 
                                <?php }?>
                        </select>
                </div>
              
                <div class="form-group">
                        <label>Password</label>
                        <input name="password"  class="form-control" placeholder="Password" >
                </div>

                
                <div class="col-sm-6">
                    <div class="form-group">
                         <img src="<?= base_url('fotomhs/default.png')?>" id="gambar_load" width="200px">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                            <label>Foto Mahasiswa</label>
                            <input type="file" name="foto_mhs"  id="preview_gambar" class="form-control" >
                    </div>
                </div>

                

            </div>
            <div class="modal-footer">
                <a href="<?= base_url('mahasiswa')?>" class="btn btn-danger pull-left" >Close</a>
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
              </div>
              <?php echo form_close() ?> 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->     
    </div>
    <div class="col-sm-3">
    </div>
</div>