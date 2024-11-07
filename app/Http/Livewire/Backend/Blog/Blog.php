<?php

namespace App\Http\Livewire\Backend\Blog;

use App\Models\Menu;
use App\Models\Blog as ModelsBlog;
use App\Models\Category as ModelsCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Blog extends Component {

    use WithFileUploads;

    public $blogs,$categories, $blog, $addBlog, $updateBlog, $image;

    public function mount() {
        $this->updateBlog();
        $this->clearBlogObject();
        $this->addBlog = false;
        $this->updateBlog = false;
        $this->categories = ModelsCategory::where('lang', null)->get();
    }

    public function updateBlog() {
        $this->blogs = ModelsBlog::where('lang', null)->orderBy('id', 'DESC')->get();
    }


    public function clearAddUpdate() {
        if (isset($this->blog['lang'])) {
            unset($this->blog['lang']);
            $this->showUpdate(ModelsBlog::where('slug', $this->blog['slug'])->where('lang', null)->first()->id);
        } else {
            $this->addBlog = false;
            $this->updateBlog = false;
            $this->clearBlogObject();
        }
    }

    public function clearBlogObject() {
        $this->blog = [
            'title' => '',
            'content' => '',
            'image' => '',
            'slug' => '',
            'short_description' => '',
            'seo_description' => '',
            'seo_keyword' => '',
            'seo_title' => '',
            'meta' => [],
            'header' => null
        ];
        $this->image = false;
    }

    public function add() {
        $this->dispatchBrowserEvent('componentUpdated');
        $this->validate(
            [
                'blog.title' => 'required',
                'blog.content' => 'required',
                'blog.slug' => 'required',
                //'image' => 'image|max:1024',
                'blog.meta.*.name' => 'required',
                'blog.meta.*.content' => 'required'
            ],
            [
                //'image.image' => 'Invalid Logo file',
                //'image.max' => 'Max Size is 1MB',
                'blog.title.required' => 'Blog Title is Required',
                'blog.content.required' => 'Please enter some Content for the Blog',
                'blog.slug.required' => 'Blog Slug is Required',
                'blog.meta.*.name.required' => 'Meta Tag Name is Required',
                'blog.meta.*.content.required' => 'Meta Tag Content is Required'
            ]
        );
        $this->blog['meta'] = serialize($this->blog['meta']);
        $this->blog['slug'] = Str::slug($this->blog['slug']);

        if ($this->image) {
            $this->blog['image'] = $this->image->store('public/images/blog');
        }
        

        //$this->createMenu();
        ModelsBlog::create($this->blog);
        $this->emit('saved');
        $this->updateBlog();
        $this->clearAddUpdate();
    }

    public function showUpdate($blog_id) {
        $this->updateBlog = true;
        $this->blog = ModelsBlog::find($blog_id)->toArray();
        $this->image = false;

        if (Storage::exists($this->blog['image'])) {
            $this->blog['image'] = Storage::url($this->blog['image']);
        }
        
        $this->blog['meta'] = $this->blog['meta'] ? unserialize($this->blog['meta']) : [];
    }

    public function update() {
        $this->dispatchBrowserEvent('componentUpdated');
        $this->validate(
            [
                //'image' => 'image|max:1024',
                'blog.title' => 'required',
                'blog.content' => 'required',
                'blog.slug' => 'required',
                'blog.meta.*.name' => 'required',
                'blog.meta.*.content' => 'required'
            ],
            [
                //'image.image' => 'Invalid Logo file',
                //'image.max' => 'Max Size is 1MB',
                'blog.title.required' => 'Blog Title is Required',
                'blog.content.required' => 'Please enter some Content for the Blog',
                'blog.slug.required' => 'Blog Slug is Required',
                'blog.meta.*.name.required' => 'Meta Tag Name is Required',
                'blog.meta.*.content.required' => 'Meta Tag Content is Required'
            ]
        );
        $blog = ModelsBlog::findOrFail($this->blog['id']);
        if (isset($this->blog['lang'])) {
            $blog = ModelsBlog::where('slug', $blog->slug)->where('lang', $this->blog['lang'])->first();
            if (!$blog) {
                $blog = new ModelsBlog;
            }
        }
        $temp = $this->blog['meta'];
        $this->blog['meta'] = serialize($this->blog['meta']);
        $this->blog['slug'] = Str::slug($this->blog['slug']);

        if ($this->image) {
            $this->blog['image'] = $this->image->store('public/images/blog');
        }else{
            $this->blog['image'] = $blog->image;
        }

        


        $blog->fill($this->blog);
        $blog->save();
        $this->blog['meta'] = $temp;
        $this->clearAddUpdate();
        $this->emit('saved');
        
    }

    public function translate($locale) {
        $blog = ModelsBlog::where('slug', $this->blog['slug'])->where('lang', $locale)->first();
        if ($blog) {
            $this->showUpdate($blog->id);
        }
        $this->blog['lang'] = $locale;
        $this->blog['lang_text'] = config('app.locales_text')[array_search($locale, config('app.locales'))];
        $this->dispatchBrowserEvent('componentUpdated');
    }

    public function isTranslated($locale) {
        if (ModelsBlog::where('slug', $this->blog['slug'])->where('lang', $locale)->count() > 0) {
            return true;
        }
        return false;
    }

    public function delete($blog_id) {
        $blog = ModelsBlog::findOrFail($blog_id);
        ModelsBlog::where('slug', $blog->slug)->delete();
        $blog->delete();
        $this->updateBlog();
    }

    public function addMeta() {
        array_push($this->blog['meta'], [
            'name' => '',
            'content' => ''
        ]);
        $this->dispatchBrowserEvent('componentUpdated');
    }

    public function deleteMeta($key) {
        unset($this->blog['meta'][$key]);
        $this->dispatchBrowserEvent('componentUpdated');
    }

    public function render() {
        return view('backend.blog.blog');
    }

}
