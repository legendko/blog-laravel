<?php $__env->startSection('title', '| Blog'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2><?php echo e($post->title); ?></h2>
            <h5>Published: <?php echo e($post->created_at->format('j M Y H:i:s')); ?></h5>
            
            <p><?php echo e(str_limit(strip_tags($post->body), 250)); ?></p>
            <a href="<?php echo e(route('blog.single', $post->slug)); ?>" class="btn btn-primary">Read more</a>
            <hr>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <?php echo $posts->links(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>