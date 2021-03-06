<?php $sponsors = app('App\Services\SponsorsInside'); ?>
<?php if(count($sponsors->get()->toArray()) == 0): ?>
<?php else: ?>
    <div class="sponsors-navbar-inside">
        <ul class="sponsors-ul-inside" id="c">
            <?php $__currentLoopData = $sponsors->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="sponsors-li-inside">
                    <img data-toggle="modal" data-target="#info<?php echo e($sponsor->sponsorId); ?>" src="<?php echo e(URL::to('/')); ?>/sponsors/<?php echo e($sponsor->image); ?>" class="sponsors-img-inside"/>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php $__currentLoopData = $sponsors->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal show" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="info<?php echo e($sponsor->sponsorId); ?>">
        <div class="modal-dialog padding-modal" role="document">
            <form target="_blank" action="https://<?php echo e($sponsor->link); ?>">
                <div class="modal-content"style="background-color: #ffffff;color: white;">
                    <div class="modal-header ">
                        <h5 class="modal-title"  id="exampleModalLongTitle"><img src="<?php echo e(URL::to('/')); ?>/sponsors/<?php echo e($sponsor->image); ?>" width="75"/></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 20% !important;">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div style="background-color: white;color: black;">
                        <div class="modal-body">
                            <?php echo e($sponsor->description); ?>

                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: white;color: black;">
                        <input type="submit" class="btn btn-primary" value="Ir a su sitio web">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    if ($(window).width() > 799) {
        var timer = 4000;

        var i = 0;
        var max = $('#c > li').length;

        $("#c > li").eq(i).addClass('sponsors-active').css('left','0');
        $("#c > li").eq(i + 1).addClass('sponsors-active').css('left','20%');
        $("#c > li").eq(i + 2).addClass('sponsors-active').css('left','40%');
        $("#c > li").eq(i + 3).addClass('sponsors-active').css('left','60%');
        $("#c > li").eq(i + 4).addClass('sponsors-active').css('left','80%');



        setInterval(function(){

            $("#c > li").removeClass('sponsors-active');

            $("#c > li").eq(i).css('transition-delay','0.25s');
            $("#c > li").eq(i + 1).css('transition-delay','0.5s');
            $("#c > li").eq(i + 2).css('transition-delay','0.75s');
            $("#c > li").eq(i + 3).css('transition-delay','1s');
            $("#c > li").eq(i + 4).css('transition-delay','1.25s');

            if (i < max-5) {
                i = i+5;
            }

            else {
                i = 0;
            }

            $("#c > li").eq(i).css('left','0').addClass('sponsors-active').css('transition-delay','1.25s');
            $("#c > li").eq(i + 1).css('left','20%').addClass('sponsors-active').css('transition-delay','1.5s');
            $("#c > li").eq(i + 2).css('left','40%').addClass('sponsors-active').css('transition-delay','1.75s');
            $("#c > li").eq(i + 3).css('left','60%').addClass('sponsors-active').css('transition-delay','2s');
            $("#c > li").eq(i + 4).css('left','80%').addClass('sponsors-active').css('transition-delay','2.25s');

        }, timer);
    }

    else {
        var timer = 4000;

        var i = 0;
        var max = $('#c > li').length;

        $("#c > li").eq(i).addClass('sponsors-active').css('left','0');
        $("#c > li").eq(i + 1).addClass('sponsors-active').css('left','33%');
        $("#c > li").eq(i + 2).addClass('sponsors-active').css('left','66%');



        setInterval(function(){

            $("#c > li").removeClass('sponsors-active');

            $("#c > li").eq(i).css('transition-delay','0.25s');
            $("#c > li").eq(i + 1).css('transition-delay','0.5s');
            $("#c > li").eq(i + 2).css('transition-delay','0.75s');

            if (i < max-3) {
                i = i+3;
            }

            else {
                i = 0;
            }

            $("#c > li").eq(i).css('left','0').addClass('sponsors-active').css('transition-delay','1.25s');
            $("#c > li").eq(i + 1).css('left','33%').addClass('sponsors-active').css('transition-delay','1.5s');
            $("#c > li").eq(i + 2).css('left','66%').addClass('sponsors-active').css('transition-delay','1.75s');

        }, timer);
    }
</script>
<?php /**PATH /var/www/ICA/resources/views/layouts/sponsors.blade.php ENDPATH**/ ?>