<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Blog') }}
    </x-slot>

    <x-slot name="description">
        {{ __('You can manage the Custom Blog of your TMail here.') }}
    </x-slot>
    
    <x-slot name="form">
        @if($addBlog || $updateBlog)
            <div class="col-span-6 flex justify-between">
                <x-jet-secondary-button class="mr-2" wire:click="clearAddUpdate">
                    <i class="fas fa-caret-left"></i> <span class="ml-2">{{ __('Back') }}</span>
                </x-jet-secondary-button>
                @if(isset($blog['lang']))
                <div class="bg-gray-200 rounded-md px-4 py-2 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                    </svg>
                    <span>{{ __('Add translations for') }} {{ $blog['lang_text'] }} ({{ $blog['lang'] }})</span>
                </div>
                @endif
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" type="text" class="mt-1 block w-full" placeholder="Blog Title" wire:model.defer="blog.title"/>
                <x-jet-input-error for="blog.title" class="mt-2" />
            </div>

            

            @if(!isset($blog['lang']))
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="slug" value="{{ __('Slug') }}" />
                <x-jet-input id="slug" type="text" class="mt-1 block w-full" placeholder="Blog Slug" wire:model.defer="blog.slug"/>
                <x-jet-input-error for="blog.slug" class="mt-2" />
            </div>
            @endif
            <div class="col-span-6">
                <x-jet-label for="content" value="{{ __('Content') }}" />
                <div class="mt-1"><div class="hidden" id="quill-content">{!! (!$addBlog) ? $blog['content'] : '' !!}</div></div>
                <textarea id="content" class="hidden" wire:model.defer="blog.content">{!! (!$addBlog) ? $blog['content'] : '' !!}</textarea>
                <x-jet-input-error for="blog.content" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="parent" value="{{ __('Category') }}" />
                <div class="relative">
                    <select class="form-input rounded-md shadow-sm mt-1 block w-full cursor-pointer" wire:model.defer="blog.category_id">
                        <option value="0">None</option>
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->title }}</option>
                        @endforeach
                    </select>
                </div>
                <x-jet-input-error for="blog.category_id" class="mt-2" />
            </div>

            <div class="col-span-6">
                <x-jet-label value="{{ __('Meta Tags') }} ({{ __('Optional') }})" />
                @foreach($blog['meta'] as $key => $meta)
                <div class="flex mt-2">
                    <div>
                        <label class="block font-medium text-gray-700 text-xs">{{ __('Name') }}</label>
                        <div class="relative">
                            <select class="form-input rounded-md shadow-sm mt-1 block w-full cursor-pointer" wire:model.defer="blog.meta.{{ $key }}.name">
                                <option value='' disabled selected>Select</option>
                                <option value='description'>{{ __('description') }}</option>
                                <option value='robots'>{{ __('robots') }}</option>
                                <option value='canonical'>{{ __('canonical') }}</option>
                                <option value='og:type'>{{ __('og:type') }}</option>
                                <option value='og:title'>{{ __('og:title') }}</option>
                                <option value='og:description'>{{ __('og:description') }}</option>
                                <option value='og:image'>{{ __('og:image') }}</option>
                                <option value='og:url'>{{ __('og:url') }}</option>
                                <option value='og:site_name'>{{ __('og:site_name') }}</option>
                                <option value='twitter:title'>{{ __('twitter:title') }}</option>
                                <option value='twitter:description'>{{ __('twitter:description') }}</option>
                                <option value='twitter:image'>{{ __('twitter:image') }}</option>
                                <option value='twitter:site'>{{ __('twitter:site') }}</option>
                                <option value='twitter:creator'>{{ __('twitter:creator') }}</option>
                            </select>
                        </div>
                        <x-jet-input-error for="blog.meta.{{ $key }}.name" class="mt-2" />
                    </div>
                    <div class="flex-1 ml-3">
                        <label class="block font-medium text-gray-700 text-xs">{{ __('Content') }}</label>
                        <div class="flex">
                            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="blog.meta.{{ $key }}.content"/>
                            <button type="button" wire:click="deleteMeta({{ $key }})" class="form-input rounded-md ml-3 mt-1 bg-red-700 text-white border-0"><i class="fas fa-trash"></i></button>  
                        </div>
                        <x-jet-input-error for="blog.meta.{{ $key }}.content" class="mt-2" />
                    </div>
                </div>
                @endforeach
                <button type="button" wire:click="addMeta" class="mt-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{ __('Add') }}</button>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="image" value="{{ __('Image') }}" />
                <input id="image" class="mt-2" type="file" wire:model="image">
                @if ($image)
                    <img class="max-w-logo rounded my-2 p-2 striped-img-preview" src="{{ $image->temporaryUrl() }}">
                @elseif ($blog['image'])
                    <img class="max-w-logo rounded my-2 p-2 striped-img-preview" src="{{ $blog['image'] }}">
                @else
                    <img class="max-w-logo rounded my-2 p-2 striped-img-preview" src="{{ asset('images/nopreview.jpg') }}">
                @endif
                <x-jet-input-error for="image" class="mt-2" />
            </div>
            
            <div class="col-span-6">
                <x-jet-label for="header" value="{{ __('Custom Header') }} ({{ __('Optional') }})" />
                <textarea id="header" class="form-input rounded-md shadow-sm mt-1 block w-full resize-y border" placeholder="Enter the Custome Header" wire:model.defer="blog.header"></textarea>
                <x-jet-input-error for="blog.header" class="mt-2" />
            </div>

            <div class="col-span-6">
                <x-jet-label for="short_description" value="{{ __('Short Description (max:200)') }}" />
                <textarea id="short_description" class="form-input rounded-md shadow-sm mt-1 block w-full resize-y border" placeholder="Enter short description" wire:model.defer="blog.short_description"></textarea>
                <x-jet-input-error for="blog.short_description" class="mt-2" />
            </div>

            <div class="col-span-6">
                <x-jet-label for="seo_keyword" value="{{ __('SEO Keyword') }}" />
                <textarea id="seo_keyword" class="form-input rounded-md shadow-sm mt-1 block w-full resize-y border" placeholder="Enter SEO Keyword" wire:model.defer="blog.seo_keyword"></textarea>
                <x-jet-input-error for="blog.seo_keyword" class="mt-2" />
            </div>

            <div class="col-span-6">
                <x-jet-label for="seo_description" value="{{ __('Meta Description') }}" />
                <textarea id="seo_description" class="form-input rounded-md shadow-sm mt-1 block w-full resize-y border" placeholder="Enter Meta Description" wire:model.defer="blog.seo_description"></textarea>
                <x-jet-input-error for="blog.seo_description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="seo_title" value="{{ __('Meta Title') }}" />
                <x-jet-input id="seo_title" type="text" class="mt-1 block w-full" placeholder="Meta Title" wire:model.defer="blog.seo_title"/>
                <x-jet-input-error for="blog.seo_title" class="mt-2" />
            </div>


            @if(isset($blog['id']) && !isset($blog['lang']))
            <div class="col-span-6">
                <x-jet-label for="lang" value="{{ __('Add Translations') }} ({{ __('Optional') }})" />
                <div class="grid gap-1 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 mt-2">
                    @foreach(config('app.locales') as $index => $locale)
                    @if($locale != config('app.settings.language'))
                    <button wire:click="translate('{{ $locale }}')" type="button" class="{{ $this->isTranslated($locale) ? 'bg-green-600' : 'bg-gray-800' }} text-white text-sm px-3 py-2 rounded-md flex items-center space-x-2">
                        @if($this->isTranslated($locale))
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        @endif
                        <span>{{ config('app.locales_text')[$index] }}</span>
                    </button>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
        @else
            <div class="col-span-6 -mt-4">
            @foreach($blogs as $blog)
                <div class="bg-gray-800 text-white rounded-md mt-3 flex flex-col md:flex-row justify-between items-center">
                    <div class="flex px-5 py-4 overflow-y-hidden">
                        <div>
                            {{ $blog->title }}
                        </div>
                        <div class="px-3">-</div>
                        <div><small classs="text-xs"><a href="{{ route('home').'/'.$blog->slug }}" target="_blank">{{ route('home').'/'.$blog->slug }}</a></small></div>
                    </div>
                    <div class="hidden md:flex">
                        <div class="cursor-pointer px-5 py-4 bg-blue-900" wire:click="showUpdate({{ $blog->id }})"><i class="fas fa-edit"></i></div>
                        <div class="cursor-pointer px-5 py-4 bg-red-900 rounded-r-md" wire:click="delete({{ $blog->id }})"><i class="fas fa-trash-alt"></i></div>
                    </div>
                    <div class="md:hidden w-full grid grid-cols-2 text-center">
                        <div class="cursor-pointer px-5 py-2 bg-blue-900 rounded-l-md" wire:click="showUpdate({{ $blog->id }})"><i class="fas fa-edit mr-2"></i>{{ __('Edit') }}</div>
                        <div class="cursor-pointer px-5 py-2 bg-red-900 rounded-r-md" wire:click="delete({{ $blog->id }})"><i class="fas fa-trash-alt mr-2"></i>{{ __('Delete') }}</div>
                    </div>
                </div>
            @endforeach
            </div>
        @endif
        <style>
        .ql-toolbar {
            border-radius: 0.375rem 0.375rem 0 0;
        }
        .ql-container {
            border-radius: 0 0 0.375rem 0.375rem;
        }
        </style>
        <script>
        function loadQuill() {
            // var toolbarOptions = [
            //     [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            //     ['bold', 'italic', 'underline', 'strike'],
            //     [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'align': [] }],
            //     ['link', 'code-block'],
            //     [{ 'color': [] }, { 'background': [] }],
            //     ['clean']
            // ];
            // if(document.querySelector('.ql-toolbar') === null) {
            //     var quill = new Quill('#quill-content', {
            //         modules: {
            //             toolbar: toolbarOptions
            //         },
            //         theme: 'snow',
            //     });
            // }
            CKEDITOR.replace('content');


        }
        function loadEventListeners() {
            setInterval(() => {
                //document.querySelector('#content').value = document.querySelector('#quill-content .ql-editor').innerHTML;
                //document.querySelector('#content').dispatchEvent(new Event('input'));
                let editor = CKEDITOR.instances.content;
                let data = editor.getData();

                document.querySelector('#content').value = data;
                document.querySelector('#content').dispatchEvent(new Event('input'));

            }, 500);
        }
        if(document.getElementById('quill-content')) {
            loadQuill()
            loadEventListeners()
            window.addEventListener('componentUpdated', event => {
                loadQuill()
                loadEventListeners()
            });
        }
        </script>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>
        @if($addBlog || $updateBlog)
            @if($addBlog)
                <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700" wire:click="add">
                    {{ __('Add') }}
                </button>
            @else
                @if(isset($blog['lang']))
                    @if($this->isTranslated($blog['lang']))
                    <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700" wire:click="update">
                        {{ __('Update') }}
                    </button>
                    @else
                    <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700" wire:click="update">
                        {{ __('Add') }}
                    </button>
                    @endif
                @else
                    <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700" wire:click="update">
                        {{ __('Update') }}
                    </button>
                @endif
            @endif
        @else
            <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-600 transition ease-in-out duration-150" wire:click="$toggle('addBlog')">
                {{ __('Add Blog') }}
            </button>
        @endif
    </x-slot>
</x-jet-form-section>