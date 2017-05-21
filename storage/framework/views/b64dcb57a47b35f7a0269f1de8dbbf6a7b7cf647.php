<?php $__env->startSection('title', '| Edit Post'); ?>

<?php $__env->startSection('stylesheets'); ?>

    <?php echo Html::style('css/select2.min.css'); ?>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]); ?>

    <div class="row">
        <div class="col-md-8">
            <?php echo e(Form::label('title', 'Title:')); ?>

            <?php echo e(Form::text('title', null, ["class" => "form-control input-lg"])); ?>

            <br>
            <?php echo e(Form::label('category_id', 'Category:')); ?>

            <select class="form-control" name="category_id">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select><br>
            <?php echo e(Form::label('tags', 'Tags:')); ?>

            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <br>
            
            <?php echo e(Form::label('featured_image', 'Update featured image:')); ?>

            <?php echo e(Form::file('featured_image')); ?>

            
            <br>
            <?php echo e(Form::label('body', 'Post body:')); ?>

            <?php echo e(Form::textarea('body', null, ["class" => "form-control"])); ?>            
        </div>
    </div>
    <br>
    <div class='row'>
        <div class="col-md-4">
            <div class="well">
                <div class="row">
                    <div class="col-sm-6">
                        <?php echo Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')); ?>                        
                    </div>
                    <div class="col-sm-6">
                        <?php echo e(Form::submit('Save Changes', array('class' => 'btn btn-success btn-block'))); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php echo Html::script('js/select2.min.js'); ?>    
    
    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val(<?php echo json_encode($post->tags()->allRelatedIds()); ?>).trigger('change');
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>