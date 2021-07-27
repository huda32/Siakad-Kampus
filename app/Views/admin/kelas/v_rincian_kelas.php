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

                <table class="table">
                    <tr>
                        <th width=150px>Nama Kelas</th>
                        <th width=30px>:</th>
                        <td width=200px><?= $kelas['nama_kelas']?> - <?= $kelas['tahun_angkatan']?></td>

                        <th width=150px>Angkatan</th>
                        <th width=30px>:</th>
                        <td><?= $kelas['tahun_angkatan']?></td>
                    </tr>

                    <tr>
                        <th>Program Studi</th>
                        <th>:</th>
                        <td><?= $kelas['prodi']?></td>
                        <th>Jumlah</th>
                        <th>:</th>
                        <td><?= $jml?></td>
                    </tr>

                </table>
                        
           
                <?php
                 if(session()->getFlashdata('pesan')){
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

                <table class="table table-bordered">
                    <tr class="label-success">
                        <th width="50px" class="text-center">No</th>
                        <th width="100px"class="text-center">Nim</th>
                        <th >Nama Mahasiswa</th>
                        <th width="80px" class="text-center">Action</th>
                    </tr>
                    <?php $no=1;
                     foreach($mhs as $key => $value){?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nim']?></td>
                            <td><?= $value['nama_mhs']?></td>
                            <td class="text-center">

                            
                                <a href="<?= base_url('kelas/remove_anggota_kelas/' . $value['id_mhs'] .'/'. $kelas['id_kelas'])?>" class="btn btn-flat btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                           
                                
                            
                            </td>
                        </tr>
                    <?php } ?>
                   
                
                </table>
           
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
    </div>
</div>

<!-- modal add -->
<div class="modal fade" id="add">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Mahasiswa</h4>
              </div>
              <div class="modal-body">

              <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="30px">No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th width="30px">Add</th>
                 
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                foreach($mhs_tpk as $key => $value){?>
                  <?php if ($kelas['id_prodi'] == $value['id_prodi']){?>
                   <tr>
                     <td><?= $no++ ?></td>
                     <td><?= $value['nim']?></td>
                     <td><?= $value['nama_mhs']?></td>
                     <td><?= $value['prodi']?></td>
                     <td class="text-center">
                     <a href="<?= base_url('kelas/add_anggota_kelas/' . $value['id_mhs'] .'/'. $kelas['id_kelas'])?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
   
                     </td>
                   </tr>
                   <?php } ?>
                <?php } ?>

            </tbody>
              </table>

              </div>
             
            
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


