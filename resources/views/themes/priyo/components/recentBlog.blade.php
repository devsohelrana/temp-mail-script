<section class="blog_mail_sc">
    <div class="container max-w-screen-lg mx-auto">
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
          
        </div>
    </div>
</section>