
    
    <main id="login_page" class="flex-1 page ql-editor p-" x-data="{ show: false, id: 0 }">
        <div class="text-sm lg:rounded-lg">
    
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
    
    
    
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
                                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>User Name :</label>
                                        <input placeholder="" type="text" wire:model="registerEmail" class="wgt-50 form-control" />
                                        <select wire:model="domain" class="wgt-50 form-control">
                                            @foreach($domains as $dom)
                                            <option selected value="{{ $dom }}">{{ $dom }}</option>
                                            @endforeach
                                        </select>
                                        @error('registerEmail') <span class="text-danger error">{{ $message }}</span>@enderror
                                        @error('domain') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Recovery Email :</label>
                                        <input placeholder="" type="text" wire:model="recoveryMail" class="form-control">
                                        @error('recoveryMail') <span class="text-danger error">Please insert valid mail</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password :</label>
                                        <input placeholder="" type="password" wire:model="password" class="form-control">
                                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (session()->has('errorMessage'))
                                        <div class="alert alert-danger">
                                            <span class="text-danger error">{{ session('errorMessage') }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="sheen btn-full-blue bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" wire:click.prevent="registerStore">Create Account</button>
                                </div>
                                {{-- <div class="col-md-12">
                        <a class="text-primary" wire:click.prevent="register"><strong>Login</strong></a>
                    </div> --}}
                            </div>
    
    
    
                        </div>
                    </form>
    
                    
                    
                </div>
            </section>
    
        </div>
    
    </main>

   