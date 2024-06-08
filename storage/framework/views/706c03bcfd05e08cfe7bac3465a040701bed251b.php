<?php $__env->startSection('content'); ?>
<style>
    body{
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(146,32,240,1) 100%);
    }
    .card{
        background: rgb(255,255,255,0.7);
    }
</style>
<div class="text-center mt-2" >
    <a href="<?php echo e(url('product')); ?>"><img src="<?php echo e(asset('img/banner.jpg')); ?>" style="max-height: 700px" alt=""></a>
 </div>
<div class="container">
    <section class="mt-4">
       <h3><p class="text-light">Pilih Brand</p></h3>
       <div class="row mt-4">
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col">
             <a href="/categories/<?php echo e($kategori->id); ?>">
                <div class="card shadow ">
                   <div class="card-body text-center opacity-10">
                      <img src="<?php echo e(asset('img/'.$kategori->images)); ?>" style="max-height: 100px" class="img-fluid">
                   </div>
                </div>
             </a>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
    </section>

    <section class="mt-5 mb-5">
       <h3>
          <p class="text-light">Best Products</p>
          <a href="/product" class="btn btn-outline-light"><span class="text-end"> Lihat Semua </span></a>
       </h3>
       <div class="row mt-4 ">
          <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-3">
             <div class="card outline">
                <div class="card-body text-center">
                   <img src="<?php echo e(asset('img/'.$barang->images)); ?>" style="max-height: 150px" class="img-fluid">
                   <div class="row mt-2">
                      <div class="col-md-12">
                         <h5><strong><?php echo e($barang->namabarang); ?></strong> </h5>
                         <h5>Rp. <?php echo e(number_format($barang->harga)); ?></h5>
                      </div>
                   </div>
                   <div class="row mt-2">
                      <div class="col-md-12">
                         <a href="<?php echo e(url('barang')); ?>/<?php echo e($barang->id); ?>" class="btn btn-outline-dark"><i class="bi bi-eye"></i> Detail</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
    </section>
 </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Computer Science\BINUS\Sem 5\Web Programming\BH01\FinalProject2\resources\views/home.blade.php ENDPATH**/ ?>