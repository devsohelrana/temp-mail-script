
    
    <main id="login_page" class="flex-1 page ql-editor p-" x-data="{ show: false, id: 0 }">
        <div class="text-sm lg:rounded-lg">
    
            <?php if(session('status')): ?>
            <div class="mb-4 font-medium text-sm text-green-600">
                <?php echo e(session('status')); ?>

            </div>
            <?php endif; ?>
    
    
    
            <!-- <div class="mt-5"></div> -->
            <section class="bg_img_flex_content"> 
                <div class="content_full_area">
                    <form>
                        <div class="row">
    
                            <div class="col-md-12">
                                
                                <div class="top_icon_area">
                                   <div class="icon"><img src="assets/img/add-user.png" alt="add-user.png"></div>
                                   <h2 class="title_bg pt-6 pb-6 text-center text-3xl font-bold tracking-tight text-gray-900">Create an Account</h2>
                                   <p>Here you can create a new account for this you <br> need to select a username, then domain and <br> password!</p>
                                </div>
                            </div>
    
    
                            <div class="input_box">
                                
                                <div class="col-md-12 hide">
                                    <div class="form-grouphide">
                                        <label>Name :</label>
                                        <input type="text" wire:model="name" class="form-control">
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>User Name :</label>
                                        <input placeholder="" type="text" wire:model="registerEmail" class="wgt-50 form-control" />
                                        <select wire:model="domain" class="wgt-50 form-control">
                                            <?php $__currentLoopData = $domains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option selected value="<?php echo e($dom); ?>"><?php echo e($dom); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['registerEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <?php $__errorArgs = ['domain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Recovery Email :</label>
                                        <input placeholder="" type="text" wire:model="recoveryMail" class="form-control">
                                        <?php $__errorArgs = ['recoveryMail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error">Please insert valid mail</span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password :</label>
                                        <input placeholder="" type="password" wire:model="password" class="form-control">
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if(session()->has('errorMessage')): ?>
                                        <div class="alert alert-danger">
                                            <span class="text-danger error"><?php echo e(session('errorMessage')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="sheen btn-full-blue bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" wire:click.prevent="registerStore">Create Account</button>
                                </div>
                                
                            </div>
    
    
    
                        </div>
                    </form>
    
                    
                    
                </div>
            </section>
    
        </div>
    
    </main>

   <?php /**PATH /home/rubyatin/priomail.rubyat.info/resources/views/themes/priyo/components/signup.blade.php ENDPATH**/ ?>