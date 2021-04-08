@extends("layouts.layout")
@section("title")Details@endsection
@section("content")

    <div class="container" id="main">

        <div class="row d-flex justify-content-between blogSection" id="singleBlog">
            <div class="col-12 blog details">
                @foreach($details->images as $image)
                    <figure>
                        <img class="img-fluid" src="{{asset("assets/images/$image->src")}}" alt="{{$details->title}}"/>
                    </figure>
                @endforeach

                <h3>{{$details->title}}</h3>
                <p> {{$details->text}}</p>
                <h5>Author: <label>{{$details->user->firstName}} {{$details->user->lastName}}</label></h5>
            </div>

        </div>
    </div>


@endsection

