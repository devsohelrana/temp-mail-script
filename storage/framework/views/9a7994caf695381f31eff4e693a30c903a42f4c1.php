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
} elseif ($_instance->childHasBeenRendered('q6uqa3p')) {
    $componentId = $_instance->getRenderedChildComponentId('q6uqa3p');
    $componentTag = $_instance->getRenderedChildComponentTagName('q6uqa3p');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('q6uqa3p');
} else {
    $response = \Livewire\Livewire::mount('backend.update.auto');
    $html = $response->html();
    $_instance->logRenderedChild('q6uqa3p', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.update.manual')->html();
} elseif ($_instance->childHasBeenRendered('1RE2QJj')) {
    $componentId = $_instance->getRenderedChildComponentId('1RE2QJj');
    $componentTag = $_instance->getRenderedChildComponentTagName('1RE2QJj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1RE2QJj');
} else {
    $response = \Livewire\Livewire::mount('backend.update.manual');
    $html = $response->html();
    $_instance->logRenderedChild('1RE2QJj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php endif; ?><?php /**PATH /var/www/vhosts/priyo.email/httpdocs/resources/views/backend/update/index.blade.php ENDPATH**/ ?>