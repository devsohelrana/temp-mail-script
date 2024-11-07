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
} elseif ($_instance->childHasBeenRendered('exH4V8J')) {
    $componentId = $_instance->getRenderedChildComponentId('exH4V8J');
    $componentTag = $_instance->getRenderedChildComponentTagName('exH4V8J');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('exH4V8J');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.general');
    $html = $response->html();
    $_instance->logRenderedChild('exH4V8J', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.mail')->html();
} elseif ($_instance->childHasBeenRendered('8rI9qVP')) {
    $componentId = $_instance->getRenderedChildComponentId('8rI9qVP');
    $componentTag = $_instance->getRenderedChildComponentTagName('8rI9qVP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('8rI9qVP');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.mail');
    $html = $response->html();
    $_instance->logRenderedChild('8rI9qVP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.engine')->html();
} elseif ($_instance->childHasBeenRendered('qjfX1hb')) {
    $componentId = $_instance->getRenderedChildComponentId('qjfX1hb');
    $componentTag = $_instance->getRenderedChildComponentTagName('qjfX1hb');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qjfX1hb');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.engine');
    $html = $response->html();
    $_instance->logRenderedChild('qjfX1hb', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div id="imap-settings" class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" style="<?php echo e(config('app.settings.engine') == 'imap' ? '' : 'display: none'); ?>">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.imap')->html();
} elseif ($_instance->childHasBeenRendered('evVdPT1')) {
    $componentId = $_instance->getRenderedChildComponentId('evVdPT1');
    $componentTag = $_instance->getRenderedChildComponentTagName('evVdPT1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('evVdPT1');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.imap');
    $html = $response->html();
    $_instance->logRenderedChild('evVdPT1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.configuration')->html();
} elseif ($_instance->childHasBeenRendered('vfEdWkl')) {
    $componentId = $_instance->getRenderedChildComponentId('vfEdWkl');
    $componentTag = $_instance->getRenderedChildComponentTagName('vfEdWkl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('vfEdWkl');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.configuration');
    $html = $response->html();
    $_instance->logRenderedChild('vfEdWkl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 hidden">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.smtp')->html();
} elseif ($_instance->childHasBeenRendered('Ku9HwRW')) {
    $componentId = $_instance->getRenderedChildComponentId('Ku9HwRW');
    $componentTag = $_instance->getRenderedChildComponentTagName('Ku9HwRW');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Ku9HwRW');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.smtp');
    $html = $response->html();
    $_instance->logRenderedChild('Ku9HwRW', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.ads')->html();
} elseif ($_instance->childHasBeenRendered('rJKBCr9')) {
    $componentId = $_instance->getRenderedChildComponentId('rJKBCr9');
    $componentTag = $_instance->getRenderedChildComponentTagName('rJKBCr9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('rJKBCr9');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.ads');
    $html = $response->html();
    $_instance->logRenderedChild('rJKBCr9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.socials')->html();
} elseif ($_instance->childHasBeenRendered('PBo2yNT')) {
    $componentId = $_instance->getRenderedChildComponentId('PBo2yNT');
    $componentTag = $_instance->getRenderedChildComponentTagName('PBo2yNT');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PBo2yNT');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.socials');
    $html = $response->html();
    $_instance->logRenderedChild('PBo2yNT', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.advance')->html();
} elseif ($_instance->childHasBeenRendered('swsnZWk')) {
    $componentId = $_instance->getRenderedChildComponentId('swsnZWk');
    $componentTag = $_instance->getRenderedChildComponentTagName('swsnZWk');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('swsnZWk');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.advance');
    $html = $response->html();
    $_instance->logRenderedChild('swsnZWk', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <?php if(config('app.settings.theme') == 'groot' || config('app.settings.theme') == 'drax'): ?>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('backend.settings.theme')->html();
} elseif ($_instance->childHasBeenRendered('C0P6oHr')) {
    $componentId = $_instance->getRenderedChildComponentId('C0P6oHr');
    $componentTag = $_instance->getRenderedChildComponentTagName('C0P6oHr');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('C0P6oHr');
} else {
    $response = \Livewire\Livewire::mount('backend.settings.theme');
    $html = $response->html();
    $_instance->logRenderedChild('C0P6oHr', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php /**PATH /var/www/vhosts/priyo.email/httpdocs/resources/views/backend/settings/index.blade.php ENDPATH**/ ?>