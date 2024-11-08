<div x-data="{ in_app: <?php echo e($in_app ? 'true' : 'false'); ?> }" >
    <div class="lg:hidden">
        <div x-show.transition.in="in_app" class="app-action mt-4 px-8" style="display: none;">
            <?php if(count($emails) > 0 && $in_app): ?>
            <div class="lg:max-w-72 lg:mx-auto">
                <a href="<?php echo e(route('mailbox')); ?>" class="block appearance-none w-full rounded-md my-5 py-3 px-5 bg-white bg-opacity-25 text-white text-sm cursor-pointer focus:outline-none"><i class="fas fa-angle-double-left"></i><span class="ml-2"><?php echo e(__('Get back to MailBox')); ?></span></a>
            </div>
            <?php endif; ?>
            <form wire:submit.prevent="create" class="lg:max-w-72 lg:mx-auto" method="post">
                <?php if(config('app.settings.captcha') == 'hcaptcha' || config('app.settings.captcha') == 'recaptcha2'): ?>
                <?php if (isset($component)) { $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Captcha::class, ['field' => 'captcha']); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243)): ?>
<?php $component = $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243; ?>
<?php unset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243); ?>
<?php endif; ?>
                <?php endif; ?>
                <input class="block appearance-none w-full border-0 rounded-md py-4 px-5 bg-white text-white bg-opacity-10 focus:outline-none placeholder-white placeholder-opacity-30" type="text" id="user" name="user" wire:model.defer="user" placeholder="<?php echo e(__('Recovery Mail')); ?>">
                <div class="divider mt-5"></div>
                <div class="relative">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown','data' => ['width' => 'w-full']]); ?>
<?php $component->withName('jet-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['width' => 'w-full']); ?>
                         <?php $__env->slot('trigger', null, []); ?> 
                            <input x-ref="domain" type="text" class="block appearance-none w-full border-0 bg-white text-white py-4 px-5 pr-8 bg-opacity-10 rounded-md cursor-pointer focus:outline-none select-none placeholder-white placeholder-opacity-30" placeholder="<?php echo e(__('Select Domain')); ?>" name="domain" wire:model="domain" readonly>
                         <?php $__env->endSlot(); ?>
                         <?php $__env->slot('content', null, []); ?> 
                            <?php $__currentLoopData = $domains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a x-on:click="$refs.domain.value = '<?php echo e($domain); ?>'; $wire.setDomain('<?php echo e($domain); ?>')" class='block px-4 py-2 text-sm leading-5 text-gray-700 cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'><?php echo e($domain); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 text-white">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                <div class="divider mt-5"></div>
                <input class="block appearance-none w-full rounded-md py-4 px-5 bg-teal-500 text-white cursor-pointer focus:outline-none" style="background-color: <?php echo e(config('app.settings.colors.secondary')); ?>" type="submit" value="<?php echo e(__('Create')); ?>">
                <div class="divider my-8 flex justify-center">
                    <div class="border-t-2 w-2/3 border-white border-opacity-25"></div>
                </div>
            </form>
            <form wire:submit.prevent="random" class="lg:max-w-72 lg:mx-auto" method="post">
                <input class="block appearance-none w-full rounded-md py-4 px-5 bg-yellow-500 text-white cursor-pointer focus:outline-none" style="background-color: <?php echo e(config('app.settings.colors.tertiary')); ?>" type="submit" value="<?php echo e(__('Random')); ?>">
            </form>
            <?php if(!$in_app): ?>
            <div class="lg:max-w-72 lg:mx-auto">
                <button x-on:click="in_app = false" class="block appearance-none w-full rounded-md mt-5 py-2 px-5 bg-white bg-opacity-10 text-white text-sm cursor-pointer focus:outline-none"><?php echo e(__('Cancel')); ?></button>
            </div>
            <?php endif; ?>
        </div>
        <div x-show.transition.in="!in_app" class="head_mobile in-app-actions mt-4 px-8" style="display: none;">
            <form class="lg:max-w-72 lg:mx-auto my-select-box" action="#" method="post">
                <div class="relative">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown','data' => ['align' => 'top','width' => 'w-full']]); ?>
<?php $component->withName('jet-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['align' => 'top','width' => 'w-full']); ?>
                         <?php $__env->slot('trigger', null, []); ?> 
                            <div class="head_email block appearance-none w-full bg-white text-white py-4 px-5 pr-8 bg-opacity-10 rounded-md cursor-pointer focus:outline-none select-none" id="email_id"><?php echo e($email); ?></div>
                         <?php $__env->endSlot(); ?>
                         <?php $__env->slot('content', null, []); ?> 
                            <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['href' => ''.e(route('switch', $item)).'']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('switch', $item)).'']); ?>
                                <?php echo e($item); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-white">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </form>
            <div class="divider mt-5"></div>
            <div class="text_box_area grid grid-cols-4 lg:grid-cols-4 gap-2 lg:gap-6 lg:max-w-72 lg:mx-auto">
                <div class="btn_copy bg-white bg-opacity-10 text-white rounded-md py-5 lg:py-10 text-center hover:bg-opacity-25 cursor-pointer">
                    <div class="text-xl lg:text-3xl mx-auto">
                        <i class="far fa-copy"></i>
                    </div>
                    <div class="text-xs lg:text-base pt-5 text-info"><?php echo e(__('Copy')); ?></div>
                </div>
                <div onclick="this.querySelector('.refresh').classList.remove('pause-spinner')" wire:click="$emit('fetchMessages')" class="bg-white bg-opacity-10 text-white rounded-md py-5 lg:py-10 text-center hover:bg-opacity-25 cursor-pointer">
                    <div class="text-xl lg:text-3xl mx-auto">
                        <i class="refresh fas fa-sync-alt fa-spin"></i>
                    </div>
                    <div class="text-xs lg:text-base pt-5 text-info"><?php echo e(__('Refresh')); ?></div>
                </div>
                
                <form wire:submit.prevent="random" class="flex" method="post">
                    <button class="bg-white bg-opacity-10 text-white rounded-md py-5 lg:py-10 text-center hover:bg-opacity-25 cursor-pointer w-full" type="submit" value="<?php echo e(__('Create a Random Email')); ?>">
                        <div class="text-xl lg:text-3xl mx-auto">
                            <i class="far fa-plus-square"></i>
                        </div>
                        <div class="text-xs lg:text-base pt-5 text-info"><?php echo e(__('New Mail')); ?></div>
                    </button>
                </form>
                <div wire:click="deleteEmail" class="bg-white bg-opacity-10 text-white rounded-md py-5 lg:py-10 text-center hover:bg-opacity-25 cursor-pointer">
                    <div class="text-xl lg:text-3xl  mx-auto">
                        <i class="far fa-trash-alt"></i>
                    </div>
                    <div class="text-xs lg:text-base pt-5 text-info"><?php echo e(__('Delete Mail')); ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden lg:block">
        <div x-show.transition.in="in_app" class="app-action mt-4 px-8" style="display: none;">
            <?php if(config('app.settings.captcha') == 'hcaptcha' || config('app.settings.captcha') == 'recaptcha2'): ?>
            <div class="flex items-center justify-center">
                <?php if (isset($component)) { $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Captcha::class, ['field' => 'captcha']); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243)): ?>
<?php $component = $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243; ?>
<?php unset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243); ?>
<?php endif; ?>
            </div>
            <?php endif; ?>
            <form wire:submit.prevent="create" method="post">
                <div class="max-w-screen-lg mx-auto flex space-x-2 items-center">
                    <?php if(count($emails) > 0 && $in_app): ?>
                    <a href="<?php echo e(route('mailbox')); ?>" class="appearance-none rounded-md py-3 px-5 bg-white bg-opacity-25 text-white text-sm cursor-pointer focus:outline-none"><i class="fas fa-angle-double-left"></i></a>
                    <?php endif; ?>
                    <div class="flex-1 bg-white text-white bg-opacity-20 rounded-md flex items-center">
                        <input class="appearance-none bg-transparent flex-1 border-0 rounded-md py-4 px-5 focus:outline-none placeholder-white placeholder-opacity-30" type="text" name="user" wire:model.defer="user" placeholder="<?php echo e(__('Enter Username')); ?>">
                        <div class="border-l-2 h-4 border-gray-200"></div>
                        <input class="appearance-none bg-transparent flex-1 border-0 rounded-md py-4 px-5 focus:outline-none placeholder-white placeholder-opacity-30" type="text" name="password" wire:model.defer="password" placeholder="<?php echo e(__('Password')); ?>">
                        <div class="border-l-2 h-4 border-gray-200"></div>
                        <input class="appearance-none bg-transparent flex-1 border-0 rounded-md py-4 px-5 focus:outline-none placeholder-white placeholder-opacity-30" type="text" name="recoveryMail" wire:model.defer="recoveryMail" placeholder="<?php echo e(__('Please insert valid mail')); ?>">
                        <div class="relative hidden">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown','data' => ['width' => 'w-full']]); ?>
<?php $component->withName('jet-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['width' => 'w-full']); ?>
                                 <?php $__env->slot('trigger', null, []); ?> 
                                    <input x-ref="domain" type="text" class="block appearance-none bg-transparent border-0 w-full py-4 px-5 pr-8 cursor-pointer focus:outline-none select-none rounded-md placeholder-white placeholder-opacity-30" placeholder="<?php echo e(__('Select Domain')); ?>" name="domain" wire:model="domain" readonly>
                                 <?php $__env->endSlot(); ?>
                                 <?php $__env->slot('content', null, []); ?> 
                                    <?php $__currentLoopData = $domains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a x-on:click="$refs.domain.value = '<?php echo e($domain); ?>'; $wire.setDomain('<?php echo e($domain); ?>')" class='block px-4 py-2 text-sm leading-5 text-gray-700 cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'><?php echo e($domain); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php $__env->endSlot(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 text-gray-200">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                        <input class="block appearance-none rounded-r-md py-4 px-5 bg-teal-500 text-white cursor-pointer focus:outline-none" style="background-color: <?php echo e(config('app.settings.colors.secondary')); ?>" type="submit" value="<?php echo e(__('Create')); ?>">
                    </div>
                </div>
            </form>
            <div class="py-2 text-gray-200 text-center"><?php echo e(__('or')); ?></div>
            <form wire:submit.prevent="random" class="flex justify-center mb-1" method="post">
                <input class="appearance-none rounded-md py-2 px-5 bg-yellow-500 text-white cursor-pointer focus:outline-none" style="background-color: <?php echo e(config('app.settings.colors.tertiary')); ?>" type="submit" value="<?php echo e(__('Create a Random Email')); ?>">
                <?php if(!$in_app): ?>
                <button type="button" x-on:click="in_app = false" class="ml-2 appearance-none rounded-md py-2 px-5 bg-white bg-opacity-10 text-white text-sm cursor-pointer focus:outline-none"><i class="fas fa-times"></i></button>
                <?php endif; ?>
            </form>
        </div>
        <div x-show.transition.in="!in_app" class="in-app-actions mt-4 px-8" style="display: none;">
            <form class="my-box max-w-screen-lg mx-auto" action="#" method="post">
                <div class="relative">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown','data' => ['align' => 'top','width' => 'w-full']]); ?>
<?php $component->withName('jet-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['align' => 'top','width' => 'w-full']); ?>
                         <?php $__env->slot('trigger', null, []); ?> 
                            <div class="block appearance-none w-full bg-white text-white py-4 px-5 pr-8 bg-opacity-10 rounded-md cursor-pointer focus:outline-none select-none"><?php echo e($email); ?></div>
                         <?php $__env->endSlot(); ?>
                         <?php $__env->slot('content', null, []); ?> 
                            <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['href' => ''.e(route('switch', $item)).'']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('switch', $item)).'']); ?>
                                <?php echo e($item); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-white">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </form>
            <div class="divider mt-5"></div>
            <div class="grid grid-cols-4 gap-2 max-w-screen-lg mx-auto">
                <div class="btn_copy bg-white bg-opacity-10 text-white rounded-md py-2 text-center hover:bg-opacity-25 cursor-pointer flex justify-center items-center space-x-2">
                    <i class="far fa-copy"></i>
                    <div><?php echo e(__('Copy')); ?></div>
                </div>
                <div onclick="this.querySelector('.refresh').classList.remove('pause-spinner')" wire:click="$emit('fetchMessages')" class="bg-white bg-opacity-10 text-white rounded-md py-5 text-center hover:bg-opacity-25 cursor-pointer  flex justify-center items-center space-x-2">
                    <i class="refresh fas fa-sync-alt fa-spin"></i>
                    <div><?php echo e(__('Refresh')); ?></div>
                </div>
                

                <form wire:submit.prevent="random" class="flex justify-center items-center space-x-2" method="post">
                    <button class="cursor-pointer focus:outline-none bg-white bg-opacity-10 text-white rounded-md py-5 text-center hover:bg-opacity-25 cursor-pointer flex justify-center items-center space-x-2 w-full" type="submit" value="<?php echo e(__('Create a Random Email')); ?>"><i class="far fa-plus-square"></i> <div><?php echo e(__('New Mail')); ?></div></button>
                </form>

                <div wire:click="deleteEmail" class="bg-white bg-opacity-10 text-white rounded-md py-5 text-center hover:bg-opacity-25 cursor-pointer flex justify-center items-center space-x-2">
                    <i class="far fa-trash-alt"></i>
                    <div><?php echo e(__('Delete Mail')); ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php if(config('app.settings.captcha') == 'recaptcha3'): ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(config('app.settings.recaptcha3.site_key')); ?>"></script>
    <script>
        const handle = (e) => {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('<?php echo e(config('app.settings.recaptcha3.site_key')); ?>', { action: 'submit' }).then(function(token) {
                    Livewire.emit('checkReCaptcha3', token, e.target.id);
                });
            });
        }
        document.getElementById('create').addEventListener('click', handle);
        document.getElementById('random').addEventListener('click', handle);
    </script>
    <?php endif; ?>
</div><?php /**PATH /home/allcycling/public_html/resources/views/themes/priyo/components/actions.blade.php ENDPATH**/ ?>