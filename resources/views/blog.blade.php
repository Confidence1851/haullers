@extends('web.layouts.app')
@section('title')
Blog
@endsection
@section('content')
@include('web.includes.nav2')
    <main class="main container-fluid">

        <section class="section__car-gallery section-padding">
            
             <div class="section__cars--heading section__cars--heading--2">
                <h1>Blog</h1>
                <div class="line__container"><span></span> <i class="fal fa-car"></i></div>
                <p>Get latest updates from us</p>
            </div>

            <div class="section-blog">
                <div class="row section-blog__banner">
                    @foreach($latests as $post)
                    <div class="col-md-4 dn">
                        <img src="{{asset('public/images/posts/'.$post->image)}}" alt="blog-img"
                            class="section-blog__img">
                        <a href="{{ route('blog_info',['id' => $post->id , 'slug' => $post->slug]) }}">
                            <div class="section-blog__banner--content">
                                <p class="label">#{{$post->category}}</p>
                                <h3 class="caption">{{$post->title}}</h3>
                                <p class="time">{{ date('D, M d, Y', strtotime($post->updated_at))}}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="container">
                    <div class="section-blog__items">
                        <div class="row">
                            <div class="col-lg-9">
                            @if( $posts->count() > 0)
                                @foreach($posts as $post)
                                <div class="section-blog__post">
                                    <figure>
                                        <img src="{{asset('public/images/posts/'.$post->image)}}" alt="" class="section-blog__post-img">
                                    </figure>
                                    <div class="section-blog__post-content">
                                        <p class="label">{{$post->category}}</p>
                                        <h1 class="section-blog__post-header"><a href="{{ route('blog_info',['id' => $post->id , 'slug' => $post->slug]) }}">{{$post->title}}</a></h1>
                                        <p class="section-blog__post-text post_body">{!! $post->message !!}</p>
                                        <p class="section-blog__post-name"><span>{{ date('D, M d, Y', strtotime($post->updated_at))}}</span> </p>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class=" offset-4 mb-5 mt-5 h2">No post found</div>
                            @endif

                            </div>
                            <div class="col-lg-3">
                                <h3 class="recent-header recent-header--2">Search</h3>
                                <form action="{{ route('blog_search')}}" method="GET">@csrf
                                    <div class="form-box">
                                        <input type="text" name="keyword" value="{{$keyword ?? ''}}" placeholder="Search on the site" class="form-box__search"
                                            required />
                                        <input type="submit" value="Search" class="form-box__submit" />
                                    </div>
                                </form>

                                <div class="recent">
                                    <h3 class="recent-header">Categories</h3>
                                    @foreach($cats as $cat)
                                    @php($count = App\Post::where('category',$cat->category)->count())
                                    <div class="recent-links">
                                        <h3><a href="{{ route('blog_category',$cat->category) }}">{{$cat->category}} ({{$count}})</a></h3>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       
    </main>
 @stop