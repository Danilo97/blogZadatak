@extends("layouts.layout")
@section("title")Home@endsection
@section("content")
    <div class="container" id="main">
        <div class="row d-flex justify-content-between blogSection" id="allBlogs">


            @foreach($blogs as $blog)

                <div class="col-12 col-lg-4 col-md-6 col-sm-12 blog">
                    @foreach($blog->images as $image)
                        <figure>
                            <a href="{{route("details",["id"=>$blog->id])}}"><img class="img-fluid" src="{{asset("assets/images/$image->src")}}" alt="{{$blog->title}}"/></a>
                        </figure>
                    @endforeach

                    <h3><a href="{{route("details",["id"=>$blog->id])}}">{{$blog->title}}</a></h3>
                    <p>{{Illuminate\Support\Str::substr($blog->text,0,200)}}...</p>
                    <a href="{{route("details",["id"=>$blog->id])}}"><button>Procitajte Vise</button></a>

                        <h5>Author: <label>{{$blog->user->firstName}} {{$blog->user->lastName}}</label></h5>

                </div>

            @endforeach
        </div>
    </div>


@endsection
