<section class="content-header">
        <h1>
       <?= $title ?>
        </h1>  
        <br>
</section>


<div class="row">
    <div class="col-sm-12">
    <div class="box box-success box-solid">
            
            <!-- /.box-header -->
            <!-- id="example1" -->
            <div class="box-body">
            <table  class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="30px">No</th>
                    <th>Fakultas</th>
                    <th class="text-center">Kode Prodi</th>
                    <th class="text-center">Program Studi</th>
                    <th class="text-center">Jenjang</th>
                    <th class="text-center">Mata Kuliah</th>
                    <th width="150px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php  
            $db = \Config\Database::connect();
          
            $no = 1;
             foreach($prodi as $key => $value){
                $jml = $db->table('tbl_matkul')
                ->where('id_prodi',  $value['id_prodi'])
                ->countAllResults();
                 ?>
            
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $value['fakultas']?></td>
                    <td class="text-center"><?= $value['kode_prodi']?></td>
                    <td><?= $value['prodi']?></td>
                    <td class="text-center"><?= $value['jenjang']?></td>
                    <td class="text-center"><p class="label  bg-green"> <?= $jml ?> </p></td>
                    <td class="text-center">
                        <a href="<?= base_url('matkul/detail/' . $value['id_prodi'])?>" class="btn btn-warning btn-sm btn-flat" ><i class="fa fa-th-list"></i></a>
                       
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