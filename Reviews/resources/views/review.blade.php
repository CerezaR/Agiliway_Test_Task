@extends('layouts.app')
<link href="{{ asset('css/linkstyle.css') }}" rel="stylesheet" type="text/css" >
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin: auto;">
                <div class="card" >
                    <div class="card-header">Review Dashboard</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card-body">Average point is equal to: {{$avgStar}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin: auto;">
                <div class="card" >
                    <div class="card-header">Add new review form</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card-body">
                            @if(count($errors))
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <form method="POST" action="/" style="margin: 0 50px 0 20px;" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Your name</label>
                                    <div class="col-sm-9">
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Name" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Your email</label>
                                    <div class="col-sm-9">
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="rating" class="col-sm-3 col-form-label">Your point</label>
                                    <div class="col-sm-9">
                                        <select name="rating" id="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="review_text" class="col-sm-3 col-form-label">Your review</label>
                                    <div class="col-sm-9">
                                        <textarea name="review_text" id="review_text" class="form-control" placeholder="Review"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="filename" class="col-sm-3 col-form-label">Your image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="filename">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit" class="link">Submit Review</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin: auto;">
                <div class="card" >
                    <div class="card-header">Reviews list</div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($reviews as $review)
                                <li class="list-group-item">
                                    <span>{{$review->name}} sent:</span>
                                    <span>"{{$review->review_text}}"</span>
                                    <span  class="clearfix">and gave rating: {{$review->rating}}.</span>
                                    <img src="{{asset('storage/upload/') . '/' . $review->filename }}"
                                         style="width:500px;height:300px;" alt="{{$review->filename }}">
                                </li>
                            @endforeach
                            {{$reviews ->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
