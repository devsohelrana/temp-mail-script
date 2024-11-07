<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\ImageHelper;
use App\Models\Blog as ModelsBlog;

class Blogdetails extends Component
{

    public $blogDetails, $blogs;

    public function mount($blogDetails)
    {


        $blogs = ModelsBlog::where('lang', null)->where('id', '!=', $blogDetails->id)->limit(5)->orderBy('id', 'DESC')->get();
        $image = new ImageHelper();
        foreach ($blogs as &$pro) {
            $pro['image'] = $image->resize($pro['image'], 200, 0);
        }

        $blogDetails->image = $image->resize($blogDetails->image, 1200, 0);

        $this->blogs = $blogs;
        $this->blogDetails = $blogDetails;
    }

    public function render()
    {
        return view('themes.' . config('app.settings.theme') . '.components.blogDetails');
    }
}
