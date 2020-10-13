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
      <div class="col-lg-12 col-md-10 mx-auto">
        <h1 class="display-4 text-center">ALL Category</h1>
        <br>
      <a class="btn btn-danger" href="{{route('add.category')}}">Add Category</a>
        <a class="btn btn-info" href="{{ route('all.category')}}">All Category</a>
        <hr>
        <table class="table table-responsive">
            <tr>
                <th>SL NO.</th>
                <th>Category Name</th>
                <th>Slug name</th>
                <th>Create Time</th>
                <th>Action</th>
            </tr>
            @foreach ($allcategory as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ URL::to('edit/category/'.$item->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ URL::to('delete/category/'.$item->id) }}" class="btn btn-danger" id="delete">Delete</a>
                    <a href="{{ URL::to('view/category/'.$item->id )}}" class="btn btn-success">View</a>
                </td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>
  </div>
@endsection
