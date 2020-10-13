@extends("home")

@section('backgroundimage')
    <header class="masthead" style="background-image: url({{ URL::to('frontend/img/post-bg.jpg') }})"> <!--here we can use (asset / URL::to)-->
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
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <h1 class="display-4 text-center">ALL Category</h1>
        <br>
      <a class="btn btn-danger" href="{{route('add.category')}}">Add Category</a>
        <a class="btn btn-info" href="{{ route('all.category')}}">All Category</a>
        <hr>
        <div>
            <ol>
                <li>Category Name: {{ $cat->name}} </li>
                <li>Category Slug: {{ $cat->slug}}</li>
                <li>Category Create Time: {{ $cat->created_at}}</li>
            </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
