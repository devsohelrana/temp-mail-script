<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Blog as ModelsBlog;
use App\Models\ImageHelper;

class RecentBlog extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {


        $blogs = ModelsBlog::where('lang', null)->orderBy('id', 'DESC')->limit(4)->get();
        $image = new ImageHelper();
        foreach($blogs as &$pro){
            $pro['image'] = $image->resize($pro['image'], 200, 0);
        }

        $data['blogs'] = $blogs;

        return view('themes.' . config('app.settings.theme') . '.components.recentBlog', $data);
    }
}
