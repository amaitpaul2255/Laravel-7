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
      <div class="col-lg-12 mx-auto">
        <h1 class="display-4 text-center">ALL Category</h1>
        <br>
            <a class="btn btn-info" href="{{ route('blog') }}">Blog</a>
        <hr>
        <table class="table table-responsive">
            <tr>
                <th>SL NO.</th>
                <th>Category</th>
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach ($post as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->title }}</td>
                <td><img src="{{ URL::to($item->image) }}" style="height: 40px; width: 70px;"></td>
                <td>
                    <a href="{{ URL::to('edit/post/'.$item->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ URL::to('delete/post/'.$item->id) }}" class="btn btn-danger" id="delete">Delete</a>
                    <a href="{{ URL::to('view/post/'.$item->id )}}" class="btn btn-success">View</a>
                </td>
            </tr>
            @endforeach
        
        </table>
      </div>
    </div>
  </div>
@endsection
