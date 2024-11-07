<div id="login_page" class="flex justify-center md:items-center flex-col h-full md:my-4" x-data="{ show: false, id: 0 }">
    <div class="text-sm rounded-lg">

        <?php if(session('status')): ?>
            <div class="mb-4 font-medium text-sm text-green-600">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <form action="">
            <div class="w-full md:max-w-[35rem] bg-white rounded-lg p-4 space-y-4">
                <div class="py-2 text-center">
                    <h2 class="py-2 text-lg md:text-3xl font-bold tracking-tight text-gray-900">
                        Login into your account</h2>
                    <p class="text-gray-900 hidden md:block">Here you can log in to your account</p>
                </div>

                <div>
                    <label class="block">
                        <span class="block text-sm font-medium text-slate-700">Email</span>
                        <input type="text" wire:model="loginEmail"
                            class="mt-1 block w-full px-3 py-2 bg-white text-gray-900 border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" />
                        <?php $__errorArgs = ['loginEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-400"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </label>
                </div>

                <div>
                    <label class="block">
                        <span class="block text-sm font-medium text-slate-700">Password</span>
                        <input type="password" wire:model="loginPassword"
                            class="mt-1 block w-full px-3 py-2 bg-white text-gray-900 border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" />
                        <?php $__errorArgs = ['loginPassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-400"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </label>
                </div>

                <div class="py-4 text-center">
                    <button class="btn-full-blue bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                        wire:click.prevent="login">Login</button>
                </div>
            </div>
        </form>
    </div>

</div>
<?php /**PATH D:\Laraverl Project\priyomail\resources\views/themes/priyonew/components/login.blade.php ENDPATH**/ ?>