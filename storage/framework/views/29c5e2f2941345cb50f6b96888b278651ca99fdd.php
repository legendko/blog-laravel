    
<?php $__env->startSection('title', '| Homepage'); ?>
<?php $__env->startSection('content'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>Welcome to my Blog!</h1>
            <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please check it out!</p>
            
          </div>
        </div>
      </div>
      <!-- end of header .row -->

      <div class="row">
        <div class="col-md-8">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="post">
                  <h3><?php echo e($post->title); ?></h3>
                  <p><?php echo e(str_limit(strip_tags($post->body), 300)); ?></p>
                  <a href="<?php echo e(url("blog/$post->slug")); ?>" class="btn btn-primary">Read More</a>
                </div>

                <hr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

        
      </div>
<?php $__env->stopSection(); ?>
    

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>