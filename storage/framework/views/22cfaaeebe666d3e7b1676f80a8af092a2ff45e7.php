<?php $__env->startSection('content'); ?>
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"><?php echo e(__('Clients')); ?></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <?php if($currantWorkspace): ?>
        <?php if($currantWorkspace->creater->id == Auth::user()->id): ?>
        <div class="row mb-2">
            <div class="col-sm-4">
                <button type="button" class="btn btn-danger btn-rounded mb-3" data-ajax-popup="true" data-size="lg" data-title="<?php echo e(__('Add Client')); ?>" data-url="<?php echo e(route('clients.create',$currantWorkspace->slug)); ?>">
                    <i class="mdi mdi-plus"></i> <?php echo e(__('Add Client')); ?>

                </button>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-4 animated">
                <div class="card">
                    <div class="card-body">
                        <span class="float-left mr-4">
                            <img avatar="<?php echo e($client->name); ?>" alt="" class="rounded-circle img-thumbnail">
                        </span>
                        <div class="media-body">
                            <h4 class="mt-1"><?php echo e($client->name); ?></h4>
                            <p class="font-13 mb-0"><?php echo e($client->email); ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="row justify-content-center animated">
            <div class="col-lg-4">
                <div class="text-center">
                    <img src="<?php echo e(asset('images/file-searching.svg')); ?>" height="90" alt="File not found Image">

                    <h1 class="text-error mt-4">404</h1>
                    <h4 class="text-uppercase text-danger mt-3"><?php echo e(__('Page Not Found')); ?></h4>
                    <p class="text-muted mt-3"><?php echo e(__('It\'s looking like you may have taken a wrong turn. Don\'t worry... it happens to the best of us. Here\'s a little tip that might help you get back on track.')); ?></p>

                    <a class="btn btn-info mt-3" href="<?php echo e(route('home')); ?>"><i class="mdi mdi-reply"></i> <?php echo e(__('Return Home')); ?></a>
                </div> <!-- end /.text-center-->
            </div> <!-- end col-->
        </div>
    <?php endif; ?>
</div>
<!-- container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\taskly\resources\views/clients/index.blade.php ENDPATH**/ ?>