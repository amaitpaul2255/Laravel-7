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
        <h1 class="display-4 text-center">Blog Page</h1>
        <br>
          <a class="btn btn-danger" href="{{route('add.category')}}">Add Category</a>
          <a class="btn btn-info" href="{{ route('all.category')}}">All Category</a>
          <a class="btn btn-primary text-light" href="{{ route("all.post")}}" >All Post</a>

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
        <form action="{{ route('store.post')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" name="title" placeholder="Title" required >
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <select class="form-control" name="category_id">
                @foreach ($category as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>    
                @endforeach
              </select>
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Blog image</label>
              <input type="file" class="form-control" name="image" >
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Blog Daitels</label>
              <textarea rows="5" class="form-control" name="blogdaital" placeholder="Blog Daitels"  required ></textarea>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
        </form>
      </div>
    </div>
  </div>
@endsection
