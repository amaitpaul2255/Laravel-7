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
        <h1 class="display-4 text-center">Add Category</h1>
        <br>
      <a class="btn btn-danger" href="{{route('add.category')}}">Add Category</a>
        <a class="btn btn-info" href="{{ route('all.category')}}">All Category</a>
        <hr>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <br>
      <form action="{{ url('update/category/'.$cat->id)}}" method="POST">
            @csrf <!--csrf creat new token every submit time. if anyome want to hack our web site and use unwanted sql this csrf stop them.-->
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
                <input type="text" class="form-control" value="{{ $cat->name}}" name="name" >
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" value="{{ $cat->slug}}" name="slug" >
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
@endsection
