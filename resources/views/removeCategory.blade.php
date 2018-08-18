@extends('layouts.adminpanel')

@section('title', "Manage Category")

@section('content_title', "Manage Category")

@section('content')

      <table class="table table-striped ">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Category Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
            <tr>
              <td>{{ $category->id  }}</td>
              <td>{{ $category->catagory_name  }}</td>       
              <td id="remove_file">
                <a href="{{asset('/remove-category/remove/'.$category->id )}}" class="btn btn-danger" id="remove_file_button">Remove</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">{{ $categories->links() }}</div>


@endsection
