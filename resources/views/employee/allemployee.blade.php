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
            <a class="btn btn-info" href="{{ URL::to('employee/create') }}">Add Employee</a>
        <hr>
        <table class="table table-responsive">
            <tr>
                <th>SL NO.</th>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            @foreach ($employee as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>
                    <a href="{{ URL::to('employee/'.$item->id.'/edit') }}" class="btn btn-info">Edit</a>

                    <form action="{{ URL::to('employee/'.$item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    {{-- <a href="{{ URL::to('employee/'.$item->id) }}" class="btn btn-danger" id="delete">Delete</a> --}}
                    <a href="{{ URL::to('employee/'.$item->id) }}" class="btn btn-success">View</a>
                </td>
            </tr>
            @endforeach
        
        </table>
      </div>
    </div>
  </div>
@endsection
