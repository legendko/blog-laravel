<?php $titleTag = htmlspecialchars($post->title); ?>
<?php $__env->startSection('title', "| $titleTag"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php if(isset($post->image)): ?>
            <img src="<?php echo e(asset('images/'.$post->image)); ?>" height="400" width="800"/>
            <?php endif; ?>
            <h1><?php echo e($post->title); ?></h1>
            <p><?php echo $post->body; ?></p>
            <p>Posted in: <?php echo e($post->category->name); ?></p>
        </div>
    </div><hr>
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span> <?php echo e($post->comments()->count()); ?> Comments</h3>            
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="comment">
                <div class="author-info">
                    <img src="<?php echo e("https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) ."?d=wavatar"); ?>" class="author-image">
                    <div class="author-name"> 
                        <h4><?php echo e($comment->name); ?></h4>
                        <p><?php echo e($comment->created_at->format('d M, Y')); ?> </p>
                    </div>
                </div>
                <div class="comment-content"> 
                    <?php echo e($comment->comment); ?> 
                </div>
                
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

<div class="row">
    <div id="comment-form" class="col-md-8 col-md-offset-2">
        <?php echo e(Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST'])); ?>

        <div class="row">
            <div class="col-md-6">
                <?php echo e(Form::label('name', 'Name:')); ?>

                <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('email', 'Email:')); ?>

                <?php echo e(Form::text('email', null, ['class' => 'form-control'])); ?>

            </div>
        </div><br>
            <div class="row">
                <div class="col-md-12">
                    <?php echo e(Form::label('comment', 'Comment:')); ?>

                    <?php echo e(Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5'])); ?><br>
                    <?php echo e(Form::submit('Add comment', ['class' => 'btn btn-success btn-block'])); ?>

                </div>
            </div>
        
        <?php echo e(Form::close()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>