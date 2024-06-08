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
<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb mt-2">
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item text-light"><a href="<?php echo e(url('home')); ?>" class="text-light text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Laptop</li>
                </ol>
            </nav>
        </div>
    </div>
        <div class="col-md-3">
            <form action="<?php echo e(url('/product/search')); ?>" class="d-flex">
                <input type="search" class="form-control me-2" placeholder="Search" aria-label="search" name="search">
                <button class="btn btn-outline-light bi bi-search" type="submit"></button>
            </form>
        </div>
    </div>

    <section class="products mb-5">
        <div class="row mt-4">
            <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="<?php echo e(asset('img/'.$barang->images)); ?>" style="max-height:150px"  class="img-fluid ">
                        <div class="row mt-2">
                            <div class="col-md-12 ">
                                <h5><strong class="d-inline-block text-truncate" style="max-width: 200px;">
                                    <?php echo e($barang->namabarang); ?>

                                  </strong> </h5>
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
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Computer Science\BINUS\Sem 5\Web Programming\BH01\FinalProject2\resources\views/pages/categories.blade.php ENDPATH**/ ?>