 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Halaman <?= $data['judul']; ?></h1>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>
   <!-- Main cont ent -->
   <section class="content">
     <div class="card card-primary">
       <div class="card-header">
         <h3 class="card-title"><?= $data['judul']; ?></h3>
       </div>
       <!-- /.card-header -->
       <!-- form start -->
       <form role="form" action="<?= BASEURL; ?>/user/simpanUser" method="POST" enctype="multipart/form-data">
         <div class="card-body">
           <div class="form-group">
             <label>Nama</label>
             <input type="text" class="form-control" placeholder="masukkan Nama..." name="nama">
           </div>
           <div class="form-group">
             <label>Username</label>
             <input type="text" class="form-control" placeholder="masukkan username..." name="username">
           </div>
           <div class="form-group">
             <label>Password</label>
             <input type="password" class="form-control" placeholder="masukkan password..." name="password">
           </div>
           <div class="form-group">
             <label>Ulangi Password</label>
             <input type="password" class="form-control" name="ulangi_password">
           </div>
           <!-- /.card-body -->
           <div class="card-footer">
             <button type="submit" class="btn btn-primary">Submit</button>
           </div>
       </form>
     </div>
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->