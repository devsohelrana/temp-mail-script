<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Settings')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.general')->html();
} elseif ($_instance->childHasBeenRendered('B9YGCAV')) {
    $componentId = $_instance->getRenderedChildComponentId('B9YGCAV');
    $componentTag = $_instance->getRenderedChildComponentTagName('B9YGCAV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('B9YGCAV');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.general');
    $html = $response->html();
    $_instance->logRenderedChild('B9YGCAV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.engine')->html();
} elseif ($_instance->childHasBeenRendered('VDmPFMy')) {
    $componentId = $_instance->getRenderedChildComponentId('VDmPFMy');
    $componentTag = $_instance->getRenderedChildComponentTagName('VDmPFMy');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('VDmPFMy');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.engine');
    $html = $response->html();
    $_instance->logRenderedChild('VDmPFMy', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div id="imap-settings" class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" style="<?php echo e(config('app.settings.engine') == 'imap' ? '' : 'display: none'); ?>">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.imap')->html();
} elseif ($_instance->childHasBeenRendered('QFtNBN9')) {
    $componentId = $_instance->getRenderedChildComponentId('QFtNBN9');
    $componentTag = $_instance->getRenderedChildComponentTagName('QFtNBN9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('QFtNBN9');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.imap');
    $html = $response->html();
    $_instance->logRenderedChild('QFtNBN9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.configuration')->html();
} elseif ($_instance->childHasBeenRendered('odJdu81')) {
    $componentId = $_instance->getRenderedChildComponentId('odJdu81');
    $componentTag = $_instance->getRenderedChildComponentTagName('odJdu81');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('odJdu81');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.configuration');
    $html = $response->html();
    $_instance->logRenderedChild('odJdu81', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 hidden">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.smtp')->html();
} elseif ($_instance->childHasBeenRendered('evIFwQw')) {
    $componentId = $_instance->getRenderedChildComponentId('evIFwQw');
    $componentTag = $_instance->getRenderedChildComponentTagName('evIFwQw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('evIFwQw');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.smtp');
    $html = $response->html();
    $_instance->logRenderedChild('evIFwQw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.ads')->html();
} elseif ($_instance->childHasBeenRendered('eXgiFMZ')) {
    $componentId = $_instance->getRenderedChildComponentId('eXgiFMZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('eXgiFMZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('eXgiFMZ');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.ads');
    $html = $response->html();
    $_instance->logRenderedChild('eXgiFMZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.socials')->html();
} elseif ($_instance->childHasBeenRendered('TehAAR7')) {
    $componentId = $_instance->getRenderedChildComponentId('TehAAR7');
    $componentTag = $_instance->getRenderedChildComponentTagName('TehAAR7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('TehAAR7');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.socials');
    $html = $response->html();
    $_instance->logRenderedChild('TehAAR7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.advance')->html();
} elseif ($_instance->childHasBeenRendered('Uz1FRXw')) {
    $componentId = $_instance->getRenderedChildComponentId('Uz1FRXw');
    $componentTag = $_instance->getRenderedChildComponentTagName('Uz1FRXw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Uz1FRXw');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.advance');
    $html = $response->html();
    $_instance->logRenderedChild('Uz1FRXw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <?php if(config('app.settings.theme') == 'groot' || config('app.settings.theme') == 'drax'): ?>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.theme')->html();
} elseif ($_instance->childHasBeenRendered('wwzMFuu')) {
    $componentId = $_instance->getRenderedChildComponentId('wwzMFuu');
    $componentTag = $_instance->getRenderedChildComponentTagName('wwzMFuu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('wwzMFuu');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.theme');
    $html = $response->html();
    $_instance->logRenderedChild('wwzMFuu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/priyo/public_html/resources/views/backend/settings/index.blade.php ENDPATH**/ ?>