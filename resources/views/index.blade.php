@extends('home')

@section('backgroundimage')
    <header class="masthead" style="background-image: url({{ URL::to('frontend/img/home-bg.jpg') }})"> <!--here we can use (asset / URL::to)-->
        <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
  </header>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
        @foreach ($post as $item)

        <div class="post-preview">
            <a href="{{ URL::to('view/post/'.$item->id )}}">
            <img src="{{ URL::to($item->image)}}" style="height: 300px; width: 500px" alt="aaaa">
            <h2 class="post-title">
                {{ $item->title}}
            </h2>
            </a>
            <p class="post-meta">Categories 
            <a href="#">{{$item->name}}</a>
            on slug {{$item->slug}}</p>
        </div>

        @endforeach
        {{ $post->links()}}
        <hr>
        
        <!-- Pager -->
        </div>
  </div>
@endsection