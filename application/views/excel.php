 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Arsip Data
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li><a href="#">Tables</a></li>
             <li class="active">Data tables</li>
         </ol>
     </section>

     <section class="content">
         <div class="row">
             <div class="col-xs-12">
                 <div class="box">
                     <div class="box-header">
                         <button type="button" class="btn btn-primary pt-5" data-toggle="modal" data-target="#Modal_upload">
                             Upload file
                         </button>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                         <table id="example2" class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>File Name</th>
                                     <th>Date</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $x = 1; ?>
                                 <?php foreach ($file->result_array() as $i) :
                                        $name_file = $i['name'];
                                        $date_file = $i['time'];
                                        ?>
                                     <tr>
                                         <td><?php echo $x; ?></td>
                                         <td><?php echo $name_file; ?></td>
                                         <td><?php echo $date_file; ?></td>
                                         <td>
                                             <a href="" class="btn btn-success">Download</a>
                                             <a href="" class="btn btn-danger">Delete</a>
                                         </td>
                                     </tr>
                                     <?php $x++; ?>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                     <!-- /.box-body -->
                 </div>
             </div>
             <!-- /.box-body -->
         </div>
     </section>
     <!-- /.box -->
 </div>

 <!-- Button trigger modal -->

 <!-- Modal -->
 <div class="modal fade" id="Modal_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header p-0 m-0">
                 <h3 class="modal-title" id="exampleModalLabel">Upload File</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
             </div>
             <form class="form-horizontal" method="post" action="<?php echo base_url('admin/uploadfile'); ?>" enctype="multipart/form-data">
                 <div class="modal-body">
                     <div class="custom-file">
                         <input type="file" class="custom-file-input" id="filename" name="filename">
                         <label class="custom-file-label" for="filename">Choose file</label>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button class="btn btn-primary mt-5">Upload</button>
                 </div>
             </form>
         </div>
     </div>
 </div>