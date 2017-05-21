<?php $__env->startSection('title', '| Contact'); ?>
<?php $__env->startSection('content'); ?>
      <div class="row">
        <div class="col-md-12">
          <h1>Contact Me</h1>
          <hr>
          <form>
            <div class="form-group">
              <label name="email">Email:</label>
              <input id="email" name="email" class="form-control">
            </div>

            <div class="form-group">
              <label name="subject">Subject:</label>
              <input id="subject" name="subject" class="form-control">
            </div>

            <div class="form-group">
              <label name="message">Message:</label>
              <textarea id="message" name="message" class="form-control" placeholder="Type your message here..."></textarea>
            </div>

            <input type="submit" value="Send Message" class="btn btn-success">
          </form>
        </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>