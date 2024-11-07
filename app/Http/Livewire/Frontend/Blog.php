<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog as ModelsBlog;
use App\Models\ImageHelper;
use Illuminate\Support\Str;

class Blog extends Component
{
    use WithPagination;

    public $blog;

    public function mount($blog = '')
    {
        $this->blog = $blog;
    }

    public function render()
    {
        $blogs = ModelsBlog::where('lang', null)->orderBy('id', 'DESC')->paginate(10);
        $image = new ImageHelper();
        foreach ($blogs as &$pro) {
            $pro['image'] = $image->resize($pro['image'], 200, 0);
        }

        return view('themes.' . config('app.settings.theme') . '.components.blog', [
            'blogs' => $blogs,
        ]);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
