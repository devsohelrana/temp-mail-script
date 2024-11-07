<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Blog;


class BlogController extends Controller
{

    public function index()
    {
        $blog = 'Blog';
        $pageTitle = 'Blog Page';

        return view('themes.' . config('app.settings.theme') . '.app')->with(compact('blog', 'pageTitle'));
    }

    public function details(Blog $blog)
    {
        $blogDetails = 'BlogDetails';
        $lang = null;
        $blogDetails = $blog;

        $pageTitle = $blogDetails->title;

        if ($blogDetails) {
            $blogDetails = $this->setHeaders($blogDetails);
            return view('themes.' . config('app.settings.theme') . '.app')->with(compact('blogDetails', 'pageTitle'));
        }
        return abort(404);
    }

    private function setHeaders($page)
    {
        $header = $page->header;


        foreach ($page->meta ? unserialize($page->meta) : [] as $meta) {
            if ($meta['name'] == 'canonical') {
                $header .= '<link rel="canonical" href="' . $meta['content'] . '" />';
            } else if (str_contains($meta['name'], 'og:')) {
                $header .= '<meta property="' . $meta['name'] . '" content="' . $meta['content'] . '" />';
            } else {
                $header .= '<meta name="' . $meta['name'] . '" content="' . $meta['content'] . '" />';
            }
        }
        $page->header = $header;
        return $page;
    }
}
