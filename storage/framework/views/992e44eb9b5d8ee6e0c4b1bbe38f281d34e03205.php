<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Update')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.update.auto')->html();
} elseif ($_instance->childHasBeenRendered('qnHOFpG')) {
    $componentId = $_instance->getRenderedChildComponentId('qnHOFpG');
    $componentTag = $_instance->getRenderedChildComponentTagName('qnHOFpG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qnHOFpG');
} else {
    $response = \Livewire\Livewire::mount('backend.update.auto');
    $html = $response->html();
    $_instance->logRenderedChild('qnHOFpG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.update.manual')->html();
} elseif ($_instance->childHasBeenRendered('6S3WpSv')) {
    $componentId = $_instance->getRenderedChildComponentId('6S3WpSv');
    $componentTag = $_instance->getRenderedChildComponentTagName('6S3WpSv');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('6S3WpSv');
} else {
    $response = \Livewire\Livewire::mount('backend.update.manual');
    $html = $response->html();
    $_instance->logRenderedChild('6S3WpSv', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH /home/rubyatin/priomail.rubyat.info/resources/views/backend/update/index.blade.php ENDPATH**/ ?>