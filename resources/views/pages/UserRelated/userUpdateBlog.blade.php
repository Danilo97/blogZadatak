@extends("layouts.userLayout")
@section("title")User Panel@endsection
@section("content")

    <div class="container" id="main">
        <div class="row formSection text-center" id="registerForm">
            <div class="col-12 text-center">
                <h1>Izmeni Blog</h1>
            </div>
            <div class="col-12 blog login d-flex justify-content-center">

                <form method="POST" action="{{route("updateBlogUser")}}" class="row d-flex justify-content-center flex-column" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="blogIdUser" value="{{$updateBlogUser->id}}"/>
                    <div class="col-12">
                        <input type="text" id="titleUpdate" name="titleUpdate" placeholder="Naslov" value="{{$updateBlogUser->title}}"/>
                    </div>
                    <div class="col-12">
                        <input type="file" id="pictureUpdate" name="pictureUpdate"/>
                        <label>Slika za Blog</label>
                    </div>
                    <div class="col-12">
                        <textarea id="descUpdate" name="descUpdate" placeholder="Text bloga">{{$updateBlogUser->text}}</textarea>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Izmeni" id="blogUpdateSubmit"/>
                    </div>
                </form>

            </div>

        </div>
    </div>


@endsection





