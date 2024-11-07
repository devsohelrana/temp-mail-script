<?php
    $count = 0; // Initialize a counter
?>

<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($count == 3): ?>
    <?php break; ?>

    <!-- Stop the loop after 3 items -->
<?php endif; ?>

<div
    class="p-6 col-span-3 xl:col-span-1 bg-white dark:bg-dark-primary rounded-xl shadow-lg flex items-center gap-x-4">
    <div class="shrink-0">
        <img class="size-12" src="<?php echo e(asset('images/' . $blog->image)); ?>" alt="<?php echo e($blog->title); ?>" />
    </div>
    <div class="overflow-hidden">
        <a href="<?php echo e(route('home') . '/' . $blog->slug); ?>">
            <h2 class="text-xl font-medium text-black dark:text-white line-clamp-1">
                <?php echo e($blog->title); ?>

            </h2>
        </a>
        <p class="text-slate-500 dark:text-gray-100 line-clamp-1">
            <?php echo e(substr(strip_tags($blog->content), 0, 50)); ?>

        </p>
    </div>
</div>

<?php
    $count++; // Increment the counter after each iteration
?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\Laraverl Project\priyomail\resources\views/themes/SoftFinding/components/recentBlog.blade.php ENDPATH**/ ?>