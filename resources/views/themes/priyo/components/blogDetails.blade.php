<main class="blog_details_flex flex-1 page ql-editor p-5">
    <div class="blog_details_part">
        <h1>{{ $blogDetails->title }}</h1>
        <p><i>{{ $blogDetails->updated_at->format('d M Y') }}</i></p>
        <img src="{{ asset('images/'.$blogDetails->image) }}" alt="">
        {!! $blogDetails->content !!}
    </div>
    <div class="blog_sidebar">
     <div class="blog_prio_content_sc">
        @foreach($blogs as $blog)
        <div class="blog_prio_item_sc">
            <a href="{{ route('home').'/'.$blog->slug }}">
               <div class="single_blog_item">
                    <div class="gorsel">
                        <img src="{{ asset('images/'.$blog->image) }}" alt="{{ $blog->title }}">
                    </div>
                    <div class="detay">
                        <h3>{{ $blog->title }}</h3>
                        <p>{{ substr(strip_tags($blog->content),0,50) }}</p>
                    </div>
                </div> 
            </a>
        </div>
        @endforeach

        
    @if(config('app.settings.ads.three'))
        <div class="flex justify-center items-center max-w-full ads-three">{!! config('app.settings.ads.three') !!}</div>
    @endif
    </div>
    
</div>
</main>