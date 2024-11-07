<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if(isset($page)): ?>
    <title><?php echo e($page->title); ?> - <?php echo e(config('app.settings.name')); ?></title>
    <?php else: ?>
    <title><?php echo e(config('app.settings.name')); ?></title>
    <?php endif; ?>
    <?php echo config('app.settings.global.header'); ?>

    <?php if(Illuminate\Support\Facades\Storage::disk('local')->has('public/images/custom-favicon.png')): ?>
    <link rel="icon" href="<?php echo e(url('storage/images/custom-favicon.png')); ?>" type="image/png">
    <?php else: ?>
    <link rel="icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/png">
    <?php endif; ?>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/common.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/prio.css')); ?>?v=3.0">
    <script src="<?php echo e(asset('vendor/Shortcode/Shortcode.js')); ?>"></script>
    <script src="<?php echo e(asset('js/peel1.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php echo config('app.settings.global.css'); ?>

    <?php if(!isset($page)): ?>
    <?php echo config('app.settings.app_header'); ?>

    <?php endif; ?>
</head>
<body>
    <div id="<?php echo e(Auth::check() ? '' : ''); ?>" class="nebula-theme flex flex-col">
        <header class="bg-blue-700 text-white order-1" style="background-color: <?php echo e(config('app.settings.colors.primary')); ?>">
            <div class="header_c container mx-auto pb-24">
                <div class="destop_nav flex flex-wrap items-center">
                    <a class="px-3 py-5 ml-5 lg:ml-0" href="<?php echo e(route('home')); ?>">
                        <?php if(Illuminate\Support\Facades\Storage::disk('local')->has('public/images/custom-logo.png')): ?>
                        <img class="max-w-logo" src="<?php echo e(url('storage/images/custom-logo.png')); ?>" alt="logo">
                        <?php else: ?>
                        <img class="max-w-logo" src="<?php echo e(asset('images/logo.png')); ?>" alt="logo">
                        <?php endif; ?>
                    </a>
                    <div class="flex-1">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.nav')->html();
} elseif ($_instance->childHasBeenRendered('ZumMg9C')) {
    $componentId = $_instance->getRenderedChildComponentId('ZumMg9C');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZumMg9C');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZumMg9C');
} else {
    $response = \Livewire\Livewire::mount('frontend.nav');
    $html = $response->html();
    $_instance->logRenderedChild('ZumMg9C', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                </div>

                <div class="mobile_nav">
                    <div class="flex flex-wrap items-center area_panel">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.nav')->html();
} elseif ($_instance->childHasBeenRendered('0eFXZkz')) {
    $componentId = $_instance->getRenderedChildComponentId('0eFXZkz');
    $componentTag = $_instance->getRenderedChildComponentTagName('0eFXZkz');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0eFXZkz');
} else {
    $response = \Livewire\Livewire::mount('frontend.nav');
    $html = $response->html();
    $_instance->logRenderedChild('0eFXZkz', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        <a class="logo_mobile px-3 py-5 ml-5 lg:ml-0" href="<?php echo e(route('home')); ?>">
                            <?php if(Illuminate\Support\Facades\Storage::disk('local')->has('public/images/custom-logo.png')): ?>
                            <img class="max-w-logo" src="<?php echo e(url('storage/images/custom-logo.png')); ?>" alt="logo">
                            <?php else: ?>
                            <img class="max-w-logo" src="<?php echo e(asset('images/logo.png')); ?>" alt="logo">
                            <?php endif; ?>
                        </a>
                    </div>
                </div>

                <?php if(isset($page)): ?>
                    
                <?php elseif(isset($profile)): ?>

                <?php elseif(isset($login)): ?>

                <?php elseif(isset($signup)): ?>
                    
                <?php else: ?> 

                    <?php if(config('app.settings.ads.five')): ?>
                    <div class="flex justify-center items-center max-w-full m-4 ads-five"><?php echo config('app.settings.ads.five'); ?></div>
                    <?php endif; ?>
                    <div class="actions">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.actions', ['in_app' => (isset($page) || isset($profile)) ? true : false])->html();
} elseif ($_instance->childHasBeenRendered('V3zTQMg')) {
    $componentId = $_instance->getRenderedChildComponentId('V3zTQMg');
    $componentTag = $_instance->getRenderedChildComponentTagName('V3zTQMg');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('V3zTQMg');
} else {
    $response = \Livewire\Livewire::mount('frontend.actions', ['in_app' => (isset($page) || isset($profile)) ? true : false]);
    $html = $response->html();
    $_instance->logRenderedChild('V3zTQMg', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                    <?php if(config('app.settings.ads.one')): ?>
                    <div class="flex justify-center items-center max-w-full m-4 ads-one"><?php echo config('app.settings.ads.one'); ?></div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </header>
        <div class="box_content container mx-auto min-h-tm-half order-2 bg-white md:rounded-md shadow-md flex flex-col md:flex-row md:space-x-2 justify-center z-10 <?php echo e((isset($appPage)) ? '-mt-16' : 'topmargin'); ?> -mb-16">
            <?php if(config('app.settings.ads.two')): ?>
            <div class="flex justify-center items-center max-w-full ads-two"><?php echo config('app.settings.ads.two'); ?></div>
            <?php endif; ?>
            <?php if(isset($page)): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.page', ['page' => $page])->html();
} elseif ($_instance->childHasBeenRendered('nSbaJKB')) {
    $componentId = $_instance->getRenderedChildComponentId('nSbaJKB');
    $componentTag = $_instance->getRenderedChildComponentTagName('nSbaJKB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('nSbaJKB');
} else {
    $response = \Livewire\Livewire::mount('frontend.page', ['page' => $page]);
    $html = $response->html();
    $_instance->logRenderedChild('nSbaJKB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php elseif(isset($profile)): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.profile', ['profile' => $profile])->html();
} elseif ($_instance->childHasBeenRendered('yq2kVt9')) {
    $componentId = $_instance->getRenderedChildComponentId('yq2kVt9');
    $componentTag = $_instance->getRenderedChildComponentTagName('yq2kVt9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('yq2kVt9');
} else {
    $response = \Livewire\Livewire::mount('frontend.profile', ['profile' => $profile]);
    $html = $response->html();
    $_instance->logRenderedChild('yq2kVt9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php elseif(isset($login)): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.userlogin', ['login' => $login])->html();
} elseif ($_instance->childHasBeenRendered('2QP8U6d')) {
    $componentId = $_instance->getRenderedChildComponentId('2QP8U6d');
    $componentTag = $_instance->getRenderedChildComponentTagName('2QP8U6d');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2QP8U6d');
} else {
    $response = \Livewire\Livewire::mount('frontend.userlogin', ['login' => $login]);
    $html = $response->html();
    $_instance->logRenderedChild('2QP8U6d', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php elseif(isset($signup)): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.usersignup', ['signup' => $signup])->html();
} elseif ($_instance->childHasBeenRendered('Qo9oIQR')) {
    $componentId = $_instance->getRenderedChildComponentId('Qo9oIQR');
    $componentTag = $_instance->getRenderedChildComponentTagName('Qo9oIQR');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Qo9oIQR');
} else {
    $response = \Livewire\Livewire::mount('frontend.usersignup', ['signup' => $signup]);
    $html = $response->html();
    $_instance->logRenderedChild('Qo9oIQR', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php else: ?> 
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.app')->html();
} elseif ($_instance->childHasBeenRendered('u8V9IJk')) {
    $componentId = $_instance->getRenderedChildComponentId('u8V9IJk');
    $componentTag = $_instance->getRenderedChildComponentTagName('u8V9IJk');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('u8V9IJk');
} else {
    $response = \Livewire\Livewire::mount('frontend.app');
    $html = $response->html();
    $_instance->logRenderedChild('u8V9IJk', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endif; ?>
            <?php if(config('app.settings.ads.three')): ?>
            <div class="flex justify-center items-center max-w-full ads-three"><?php echo config('app.settings.ads.three'); ?></div>
            <?php endif; ?>
        </div>
        <footer class="bg-blue-700 order-3 text-white text-center pt-20 pb-6 z-0" style="background-color: <?php echo e(config('app.settings.colors.primary')); ?>">
            <!--
            <?php if(Auth::check()): ?>
                <div class="text-center mr-3"><h2>Please wait 40 - 50 seconds</h2></div> 
            <?php endif; ?>
            -->
            <span><?php echo e(__('Copyright')); ?> &copy; <?php echo e(date("Y")); ?> - <?php echo e(config('app.settings.name')); ?></span>
            <a target="_blank" href="https://play.google.com/store/apps/details?id=com.priosoft.priyomail"><img class="playstore-logo" src="<?php echo e(asset('assets/img/playstore.png')); ?>" alt=""></a>
        </footer>
    </div>
    <?php if(config('app.settings.cookie.enable')): ?>
    <div id="cookie" class="hidden fixed w-full bottom-0 left-0 p-4 bg-gray-900 text-white justify-between z-20">
        <div class="py-2">
             <?php echo __(config('app.settings.cookie.text')); ?>

        </div>
        <div id="cookie_close" class="px-3 py-2 bg-yellow-300 text-gray-900 rounded-md cursor-pointer">
            <?php echo e(__('Close')); ?>

        </div>
    </div>
    <?php endif; ?>

    <!--- Helper Text for Language Translation -->
    <div class="hidden language-helper">
        <div class="error"><?php echo e(__('Error')); ?></div>
        <div class="success"><?php echo e(__('Success')); ?></div>
        <div class="copy_text"><?php echo e(__('Email ID Copied to Clipboard')); ?></div>
    </div>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php if(!isset($page)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const email = '<?php echo e(App\Models\TMail::getEmail(true)); ?>';
            const add_mail_in_title = "<?php echo e(config('app.settings.add_mail_in_title') ? 'yes' : 'no'); ?>"
            if(add_mail_in_title === 'yes') {
                document.title += ` - ${email}`;
            }
            Livewire.emit('syncEmail', email);
            Livewire.emit('fetchMessages');
        });
    </script>
    <?php endif; ?>
    <script>
        document.addEventListener('stopLoader', () => {
            document.querySelectorAll('.refresh').forEach(el => {
                el.classList.add('pause-spinner');
            });
        });
        let counter = parseInt(<?php echo e(config('app.settings.fetch_seconds')); ?>);
        setInterval(() => {
            if (counter === 0 && document.getElementById('imap-error') === null && !document.hidden) {
                document.querySelectorAll('.refresh').forEach(el => {
                    el.classList.remove('pause-spinner');
                });
                Livewire.emit('fetchMessages');
                counter = parseInt(<?php echo e(config('app.settings.fetch_seconds')); ?>);
            }
            counter--;
            if(document.hidden) {
                counter = 1;
            }
        }, 1000);
    </script>
    <?php echo config('app.settings.global.js'); ?>

    <?php echo config('app.settings.global.footer'); ?>

    <script defer>
    setTimeout(() => {
        const enable_ad_block_detector = <?php echo e(config('app.settings.enable_ad_block_detector', false) ? 1 : 0); ?>

        if(!document.getElementById('Q8CvrZzY9fphm6gG') && enable_ad_block_detector) {
            document.querySelector('.nebula-theme').remove()
            document.querySelector('body > div').insertAdjacentHTML('beforebegin', `
                <div class="fixed w-screen h-screen bg-red-800 flex flex-col justify-center items-center gap-5 z-50 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                    </svg>
                    <h1 class="text-4xl font-bold"><?php echo e(__('Ad Blocker Detected')); ?></h1>
                    <h2><?php echo e(__('Disable the Ad Blocker to use ') . config('app.settings.name')); ?></h2>
                </div>
            `)
        }
    }, 500);
    </script>
</body>
</html><?php /**PATH /home/rubyatin/priomail.rubyat.info/resources/views/themes/priyo/app.blade.php ENDPATH**/ ?>