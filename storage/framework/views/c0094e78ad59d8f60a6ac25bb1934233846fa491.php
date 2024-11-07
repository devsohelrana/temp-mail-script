<nav>
    <div class="px-5 hidden lg:flex sticky top-0 z-40 h-24">
        <div class="w-full my-auto">
            <div class="flex items-center justify-end h-16">
                <div class="flex items-center">
                    <div class="flex items-baseline space-x-4">
                        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($menu->hasChild()): ?> 
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex flex-row items-center w-full px-3 py-2 text-sm font-semibold text-left bg-transparent rounded-lg md:w-auto md:inline hover:bg-gray-200 hover:bg-opacity-20">
                                    <span><?php echo e(__($menu->name)); ?></span>
                                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                                    <div class="px-2 py-2 bg-white rounded-lg shadow dark-mode:bg-gray-800">
                                        <?php $__currentLoopData = $menu->getChild(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 text-gray-900 hover:bg-gray-100 focus:bg-gray-100 bg-opacity-20 focus:outline-none" href="<?php echo e($child->link); ?>" target="<?php echo e($child->target); ?>"><?php echo e(__($child->name)); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                                <?php if($menu->parent_id === null): ?>
                                <a href="<?php echo e($menu->link); ?>" class="px-3 py-2 text-sm font-semibold text-left bg-transparent <?php echo e(url()->current() === $menu->link ? 'bg-gray-200 bg-opacity-20' : ''); ?> rounded-lg md:w-auto md:inline hover:bg-gray-200 hover:bg-opacity-20" target="<?php echo e($menu->target); ?>"><?php echo e(__($menu->name)); ?></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Auth::check() && Auth::user()->role == 7): ?>
                            <a href="<?php echo e(route('admin')); ?>" class="px-3 py-2 text-sm font-semibold text-left bg-transparent border-dashed border-2 border-red-500 text-red-500 rounded-lg md:w-auto md:inline hover:bg-red-100 bg-opacity-20"><?php echo e(__('Admin')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="flex items-center">
                    <div>
                        <?php $__currentLoopData = config('app.settings.socials'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($social['link']); ?>" target="_blank" class="ml-2 text-lg" rel="noopener noreferrer"><i class="<?php echo e($social['icon']); ?>"></i></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="relative">
                            <form action="<?php echo e(route('locale', '')); ?>" id="locale-form" method="post">
                                <?php echo csrf_field(); ?>
                                <select class="block appearance-none bg-white text-black cursor-pointer py-1 rounded-md focus:outline-none" name="locale" id="locale">
                                    <?php $__currentLoopData = config('app.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e((app()->getLocale() == $locale ) ? "selected" : ""); ?>><?php echo e($locale); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </form>
                        </div>
                    </div>

                    
                        <div class="sm:flex sm:items-center sm:ml-6 prio_dropdown">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown','data' => ['align' => 'right','width' => '48']]); ?>
<?php $component->withName('jet-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['align' => 'right','width' => '48']); ?>
                                 <?php $__env->slot('trigger', null, []); ?> 
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover" src="<?php echo e(asset('images/profile_pic.png')); ?>"
                                            alt="<?php echo e((Auth::check()) ? Auth::user()->name : ''); ?>" />
                                    </button>
                                 <?php $__env->endSlot(); ?>
                        
                                 <?php $__env->slot('content', null, []); ?> 
                                    <!-- Account Management -->
                                    
                        
                                    

                                    <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        <div class="py-2 text-xs text-gray-400"><?php echo e(__('You are You are signed in as')); ?></div>
                                        <?php echo e($emailProfileName); ?> <br>
                                        <span wire:click="showPasswordToggle" x-data="{ showPasswordLive: <?php if ((object) ('showPassword') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('showPassword'->value()); ?>')<?php echo e('showPassword'->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('showPassword'); ?>')<?php endif; ?> }" 
                                        @click.prevent @click.stop="setTimeout(() => showPasswordLive = false, 10000);"
                                        
                                        >Password: <span :class="{ 'blur_pass': !showPasswordLive }"><?php echo e($password); ?></span></span>
                                    </span>

                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['href' => '/profile']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '/profile']); ?>
                                        <i class="fas fa-user"></i> <?php echo e(__('Profile')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                    

                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['href' => '/ulogin']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '/ulogin']); ?>
                                        <i class="fas fa-user"></i> <?php echo e(__('Login')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                    

                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['href' => '/usignup']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '/usignup']); ?>
                                        <i class="fas fa-user-plus"></i> <?php echo e(__('Create Account')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['wire:click' => 'logoutEmail']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:click' => 'logoutEmail']); ?>
                                        <i class="fas fa-sign-out-alt"></i> <?php echo e(__('Logout')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                   
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => []]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                                        <dd class="flex items-baseline mt-1 text-sm"><span class="text-gray-600 dark:text-indigo-400 leading-5">
                                                <?php echo e($storageUsed); ?> MB
                                            </span> <span class="ml-2 dark:text-gray-300 text-gray-500 font-medium leading-5">
                                                / 40 MB
                                            </span></dd>
                                    
                                        <dd class="mt-2">
                                            <div class="flex mb-4 h-2 text-xs bg-gray-200 dark:bg-gray-600 rounded overflow-hidden">
                                                <div class="flex flex-col justify-center text-center text-white whitespace-nowrap bg-gray-500 dark:bg-indigo-400 shadow-none"
                                                    style="width: <?php echo e($storageUsedPercentage); ?>%;"></div>
                                            </div>
                                        </dd>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>



                                 <?php $__env->endSlot(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    


                </div>
            </div>
        </div>
    </div>
    <div class="lg:hidden" x-data="{ open: false }">
        <div @click="open = true" class="toggle absolute top-6 right-6 w-8 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </div>
        
        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" @click.away="open = false" class="flex-col lg:hidden fixed top-0 left-0 min-h-screen w-full bg-black bg-opacity-75 z-nav">
            <div @click="open = false" class="absolute top-6 right-6 w-8 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="w-full mx-auto mt-20">
                <div class="flex flex-col items-center justify-between">
                    <div class="flex flex-col items-center space-y-2">
                        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($menu->hasChild()): ?> 
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex flex-row items-center w-full px-3 py-2 text-sm text-white font-semibold text-left bg-transparent rounded-lg md:w-auto md:inline focus:bg-gray-600 focus:outline-none">
                                    <span><?php echo e(__($menu->name)); ?></span>
                                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48 z-10">
                                    <div class="px-2 py-2 text-center bg-white text-black rounded-lg shadow dark-mode:bg-gray-800">
                                        <?php $__currentLoopData = $menu->getChild(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="block text-sm font-semibold bg-transparent rounded-lg md:mt-0 focus:bg-gray-500 focus:outline-none" href="<?php echo e($child->link); ?>" target="<?php echo e($child->target); ?>"><?php echo e(__($child->name)); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                                <?php if($menu->parent_id === null): ?>
                                <a href="<?php echo e($menu->link); ?>" class="px-3 py-2 text-sm font-semibold text-left bg-transparent text-white <?php echo e(url()->current() === $menu->link ? 'bg-gray-600' : ''); ?> rounded-lg md:w-auto md:inline focus:bg-gray-600 focus:outline-none" target="<?php echo e($menu->target); ?>"><?php echo e(__($menu->name)); ?></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Auth::check() && Auth::user()->role == 7): ?>
                            <a href="<?php echo e(route('admin')); ?>" class="px-3 py-2 text-sm font-semibold text-left bg-transparent border-dashed border-2 border-red-400 text-red-400 rounded-lg md:w-auto md:inline hover:bg-red-100"><?php echo e(__('Admin')); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="flex flex-col items-center space-y-2 mt-10">
                        <div class="text-white space-x-2">
                            <?php $__currentLoopData = config('app.settings.socials'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($social['link']); ?>" target="_blank" class="text-lg" rel="noopener noreferrer"><i class="<?php echo e($social['icon']); ?>"></i></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                    </div>


                </div>
            </div>
        </div>

        <div class="mobile_lan flex items-center mt-4">
            <div class="relative">
                <form action="<?php echo e(route('locale', '')); ?>" id="locale-form-mobile" method="post">
                    <?php echo csrf_field(); ?>
                    <select class="block appearance-none bg-black cursor-pointer py-1 rounded-md focus:outline-none" name="locale" id="locale-mobile">
                        <?php $__currentLoopData = config('app.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e((app()->getLocale() == $locale ) ? "selected" : ""); ?>><?php echo e($locale); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </form>
            </div>
        </div>


        <div class="sm:flex sm:items-center sm:ml-6 prio_dropdown">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown','data' => ['align' => 'right','width' => '48']]); ?>
<?php $component->withName('jet-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['align' => 'right','width' => '48']); ?>
                 <?php $__env->slot('trigger', null, []); ?> 
                    <button
                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                        <img class="h-8 w-8 rounded-full object-cover" src="<?php echo e(asset('images/profile_pic.png')); ?>"
                            alt="<?php echo e((Auth::check()) ? Auth::user()->name : ''); ?>" />
                    </button>
                 <?php $__env->endSlot(); ?>
        
                 <?php $__env->slot('content', null, []); ?> 
                    <!-- Account Management -->
                    
        
                    

                    <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                        <div class="py-2 text-xs text-gray-400"><?php echo e(__('You are You are signed in as')); ?></div>
                        <?php echo e($emailProfileName); ?> <br>
                        <span wire:click="showPasswordToggle" x-data="{ showPasswordLive: <?php if ((object) ('showPassword') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('showPassword'->value()); ?>')<?php echo e('showPassword'->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('showPassword'); ?>')<?php endif; ?> }" 
                        @click.prevent @click.stop="setTimeout(() => showPasswordLive = false, 10000);"
                        
                        >Password: <span :class="{ 'blur_pass': !showPasswordLive }"><?php echo e($password); ?></span></span>
                    </span>


                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['href' => '/profile']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '/profile']); ?>
                        <i class="fas fa-user"></i> <?php echo e(__('Profile')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['href' => '/ulogin']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '/ulogin']); ?>
                        <i class="fas fa-user"></i> <?php echo e(__('Login')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['href' => '/usignup']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '/usignup']); ?>
                        <i class="fas fa-user-plus"></i> <?php echo e(__('Create Account')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['wire:click' => 'logoutEmail']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:click' => 'logoutEmail']); ?>
                        <i class="fas fa-sign-out-alt"></i> <?php echo e(__('Logout')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                   
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => []]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                        <dd class="flex items-baseline mt-1 text-sm"><span class="text-gray-600 dark:text-indigo-400 leading-5">
                                <?php echo e($storageUsed); ?> MB
                            </span> <span class="ml-2 dark:text-gray-300 text-gray-500 font-medium leading-5">
                                / 40 MB
                            </span></dd>
                    
                        <dd class="mt-2">
                            <div class="flex mb-4 h-2 text-xs bg-gray-200 dark:bg-gray-600 rounded overflow-hidden">
                                <div class="flex flex-col justify-center text-center text-white whitespace-nowrap bg-gray-500 dark:bg-indigo-400 shadow-none"
                                    style="width: <?php echo e($storageUsedPercentage); ?>%;"></div>
                            </div>
                        </dd>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>



                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>


    </div>
</nav><?php /**PATH /var/www/vhosts/priyo.email/httpdocs/resources/views/themes/priyo/components/nav.blade.php ENDPATH**/ ?>