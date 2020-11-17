@extends('web.layouts.app')
@section('title')
Blog Information
@endsection
@section('content')
@include('web.includes.nav2')
    <main class="main">

        <section class="section-post--item section-padding">
          <div class="container">
            <div class="row offset-md-1">
                <h1 class="section-post--header">{{$post->title}}</h1>
                <p class="section-post--timeline">by <a href="#">Haullers online</a> / {{ date('D, M d , Y', strtotime($post->updated_at))}} </p>
                <img src="{{asset('public/images/posts/'.$post->image)}}" alt="blog-img"
                    class="section-post-img">
                <p class="section-post--content">{!! $post->message !!}</p>
                <hr>
            </div>
         </div>
        </section>

    </main>

@stop