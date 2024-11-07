<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <?php if(isset($page)): ?>
        <?php echo $page->header; ?>

        <title><?php echo e($page->seo_title); ?></title>
        <meta content="<?php echo e($page->seo_description); ?>" name="description">
        <meta content="<?php echo e($page->seo_keyword); ?>" name="keywords">
    <?php elseif(isset($blogDetails)): ?>
        <?php echo $blogDetails->header; ?>

        <title><?php echo e($blogDetails->seo_title); ?></title>
        <meta content="<?php echo e($blogDetails->seo_description); ?>" name="description">
        <meta content="<?php echo e($blogDetails->seo_keyword); ?>" name="keywords">
    <?php elseif(isset($appPage)): ?>
        <?php echo config('app.settings.global.header'); ?>

    <?php else: ?>
        <title><?php echo e(config('app.settings.name')); ?></title>
    <?php endif; ?>


    


    <?php if(Illuminate\Support\Facades\Storage::disk('local')->has('public/images/custom-favicon.png')): ?>
    <link rel="icon" href="<?php echo e(url('storage/images/custom-favicon.png')); ?>" type="image/png">
    <?php else: ?>
    <link rel="icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/png">
    <?php endif; ?>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/common.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/prio.css')); ?>?v=3.13">
    <script src="<?php echo e(asset('vendor/Shortcode/Shortcode.js')); ?>"></script>
    <script src="<?php echo e(asset('js/peel1.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <link href="<?php echo e(url()->full()); ?>" rel="canonical" />
	<meta name="robots" content="index, follow" />
	<meta name="googlebot" content="index, follow" />

    <?php echo \Livewire\Livewire::styles(); ?>

    <?php echo config('app.settings.global.css'); ?>

    
    <?php if(isset($appPage) && $appPage): ?>
    <?php echo config('app.settings.app_header'); ?>

    <?php endif; ?>

    <?php echo $__env->make('frontend.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Analitics Code for https://analytics.rubyat.info/ -->
    
    <!-- END Analitics Code -->
</head>
<body>

    <?php if(isset($page)): ?>
    <h1 style="display: none;"><?php echo e($page->title); ?> - <?php echo e(config('app.settings.name')); ?></h1>
    <?php else: ?>
    <h1 style="display: none;"><?php echo e(config('app.settings.name')); ?></h1>
    <?php endif; ?>

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
} elseif ($_instance->childHasBeenRendered('LlWjGus')) {
    $componentId = $_instance->getRenderedChildComponentId('LlWjGus');
    $componentTag = $_instance->getRenderedChildComponentTagName('LlWjGus');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LlWjGus');
} else {
    $response = \Livewire\Livewire::mount('frontend.nav');
    $html = $response->html();
    $_instance->logRenderedChild('LlWjGus', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('afQxxOW')) {
    $componentId = $_instance->getRenderedChildComponentId('afQxxOW');
    $componentTag = $_instance->getRenderedChildComponentTagName('afQxxOW');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('afQxxOW');
} else {
    $response = \Livewire\Livewire::mount('frontend.nav');
    $html = $response->html();
    $_instance->logRenderedChild('afQxxOW', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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

                <?php if(isset($page) && $page->mailbox == 0): ?>
                    
                <?php elseif(isset($profile)): ?>

                <?php elseif(isset($login)): ?>

                <?php elseif(isset($signup)): ?>

                <?php elseif(isset($blog)): ?>

                <?php elseif(isset($blogDetails)): ?>
                    
                <?php else: ?> 

                    <?php if(config('app.settings.ads.five')): ?>
                    <div class="flex justify-center items-center max-w-full m-4 ads-five"><?php echo config('app.settings.ads.five'); ?></div>
                    <?php endif; ?>
                    <div class="actions">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.actions', ['in_app' => ((isset($page) && $page->mailbox == 0) || isset($profile)) ? true : false])->html();
} elseif ($_instance->childHasBeenRendered('Aodv39A')) {
    $componentId = $_instance->getRenderedChildComponentId('Aodv39A');
    $componentTag = $_instance->getRenderedChildComponentTagName('Aodv39A');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Aodv39A');
} else {
    $response = \Livewire\Livewire::mount('frontend.actions', ['in_app' => ((isset($page) && $page->mailbox == 0) || isset($profile)) ? true : false]);
    $html = $response->html();
    $_instance->logRenderedChild('Aodv39A', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
        <div class="box_content container mx-auto min-h-tm-half order-2 bg-white md:rounded-md shadow-md flex flex-col md:space-x-2 justify-center z-10 <?php echo e((isset($appPage) || (isset($page) && $page->mailbox == 1)) ? '-mt-16' : 'topmargin'); ?> -mb-16">
            <?php if(config('app.settings.ads.two')): ?>
            <div class="flex justify-center items-center max-w-full ads-two"><?php echo config('app.settings.ads.two'); ?></div>
            <?php endif; ?>
            <?php if(isset($page)): ?>

                <?php if($page->mailbox == 1): ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.app')->html();
} elseif ($_instance->childHasBeenRendered('tJxlAPl')) {
    $componentId = $_instance->getRenderedChildComponentId('tJxlAPl');
    $componentTag = $_instance->getRenderedChildComponentTagName('tJxlAPl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('tJxlAPl');
} else {
    $response = \Livewire\Livewire::mount('frontend.app');
    $html = $response->html();
    $_instance->logRenderedChild('tJxlAPl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endif; ?>

                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.page', ['page' => $page])->html();
} elseif ($_instance->childHasBeenRendered('xaijS4u')) {
    $componentId = $_instance->getRenderedChildComponentId('xaijS4u');
    $componentTag = $_instance->getRenderedChildComponentTagName('xaijS4u');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('xaijS4u');
} else {
    $response = \Livewire\Livewire::mount('frontend.page', ['page' => $page]);
    $html = $response->html();
    $_instance->logRenderedChild('xaijS4u', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

            <?php elseif(isset($profile)): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.profile', ['profile' => $profile])->html();
} elseif ($_instance->childHasBeenRendered('CgGsJeU')) {
    $componentId = $_instance->getRenderedChildComponentId('CgGsJeU');
    $componentTag = $_instance->getRenderedChildComponentTagName('CgGsJeU');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('CgGsJeU');
} else {
    $response = \Livewire\Livewire::mount('frontend.profile', ['profile' => $profile]);
    $html = $response->html();
    $_instance->logRenderedChild('CgGsJeU', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php elseif(isset($login)): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.userlogin', ['login' => $login])->html();
} elseif ($_instance->childHasBeenRendered('NWEiAHd')) {
    $componentId = $_instance->getRenderedChildComponentId('NWEiAHd');
    $componentTag = $_instance->getRenderedChildComponentTagName('NWEiAHd');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('NWEiAHd');
} else {
    $response = \Livewire\Livewire::mount('frontend.userlogin', ['login' => $login]);
    $html = $response->html();
    $_instance->logRenderedChild('NWEiAHd', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php elseif(isset($signup)): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.usersignup', ['signup' => $signup])->html();
} elseif ($_instance->childHasBeenRendered('Z53GD8P')) {
    $componentId = $_instance->getRenderedChildComponentId('Z53GD8P');
    $componentTag = $_instance->getRenderedChildComponentTagName('Z53GD8P');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Z53GD8P');
} else {
    $response = \Livewire\Livewire::mount('frontend.usersignup', ['signup' => $signup]);
    $html = $response->html();
    $_instance->logRenderedChild('Z53GD8P', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php elseif(isset($blog)): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.blog', ['blog' => $blog])->html();
} elseif ($_instance->childHasBeenRendered('KLVYP4s')) {
    $componentId = $_instance->getRenderedChildComponentId('KLVYP4s');
    $componentTag = $_instance->getRenderedChildComponentTagName('KLVYP4s');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('KLVYP4s');
} else {
    $response = \Livewire\Livewire::mount('frontend.blog', ['blog' => $blog]);
    $html = $response->html();
    $_instance->logRenderedChild('KLVYP4s', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php elseif(isset($blogDetails)): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.blogdetails', ['blogDetails' => $blogDetails])->html();
} elseif ($_instance->childHasBeenRendered('OwdMf7A')) {
    $componentId = $_instance->getRenderedChildComponentId('OwdMf7A');
    $componentTag = $_instance->getRenderedChildComponentTagName('OwdMf7A');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OwdMf7A');
} else {
    $response = \Livewire\Livewire::mount('frontend.blogdetails', ['blogDetails' => $blogDetails]);
    $html = $response->html();
    $_instance->logRenderedChild('OwdMf7A', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php else: ?> 
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.app')->html();
} elseif ($_instance->childHasBeenRendered('9mAB8Tw')) {
    $componentId = $_instance->getRenderedChildComponentId('9mAB8Tw');
    $componentTag = $_instance->getRenderedChildComponentTagName('9mAB8Tw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9mAB8Tw');
} else {
    $response = \Livewire\Livewire::mount('frontend.app');
    $html = $response->html();
    $_instance->logRenderedChild('9mAB8Tw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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

            <?php if(!isset($blogDetails)): ?>
                <?php if (isset($component)) { $__componentOriginald5ad17a0e21f4a8dbb8e65131cb34e2ec409f04d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\RecentBlog::class, []); ?>
<?php $component->withName('recent-blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald5ad17a0e21f4a8dbb8e65131cb34e2ec409f04d)): ?>
<?php $component = $__componentOriginald5ad17a0e21f4a8dbb8e65131cb34e2ec409f04d; ?>
<?php unset($__componentOriginald5ad17a0e21f4a8dbb8e65131cb34e2ec409f04d); ?>
<?php endif; ?>
            <?php endif; ?>
            

            <div class="copyright">
                <span><?php echo e(__('Copyright')); ?> &copy; <?php echo e(date("Y")); ?> - <?php echo e(config('app.settings.name')); ?></span>
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.priosoft.priyomail"><img class="playstore-logo" src="<?php echo e(asset('assets/img/playstore.png')); ?>" alt=""></a>
            </div>
            
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

    <?php if((isset($appPage) && $appPage) || (isset($page) && $page->mailbox == 1)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const email = '<?php echo e(App\Models\TMail::getEmail(true)); ?>';
            const add_mail_in_title = "<?php echo e(config('app.settings.add_mail_in_title') ? 'yes' : 'no'); ?>"
            if(add_mail_in_title === 'yes') {
                //document.title += ` - ${email}`;
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
</html><?php /**PATH /home/allcycling/public_html/resources/views/themes/priyo/app.blade.php ENDPATH**/ ?>