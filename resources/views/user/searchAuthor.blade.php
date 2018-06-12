@extends('layouts.adminpanel')

@section('title', "Author")

@section('content_title', $title)

@section('content')
   <div class="col-md-9">
    	<form class="panel-body" method="POST" action="{{ route('searchauthor') }}">
            {{ csrf_field() }}

             @if (count($errors) > 0)
                <p class="bg-danger text-white text-center">
                      @foreach($errors->all() as $error)
                        {{$error}}
                        <br>
                      @endforeach
                </p>
              @endif

            <div class="form-inline d-flex justify-content-center">
                <input type="text" class="form-control mr-sm-1" placeholder="Enter Author Name" id="author_name" name="author_name" required autofocus style="width: 300px;" />
                <input type="submit" value="Search" class="btn btn-primary">
            </div>
        </form>
	  @foreach($authors as $author)
	  		<?php
	  			$auhtorLink="/author/".$author->id;
	  		?>
	  		<div class="" style="padding: 5px; margin-bottom: 5px; background: #efefef">
		        <h4><a href={{$auhtorLink}}>{{ $author->first_name }} {{ $author->last_name }}</a></h4>
		        {{ $author->email }}
	    	</div>
	  @endforeach

	  <div class="text-center">{{ $authors->links() }}</div>
	</div>
	

@endsection
