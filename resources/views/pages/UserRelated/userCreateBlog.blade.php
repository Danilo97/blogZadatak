@extends("layouts.userLayout")
@section("title")User Panel@endsection
@section("content")
    <div class="container" id="main">
        <div class="row formSection text-center" id="registerForm">
            <div class="col-12 text-center">
                <h1>Kreirajte Blog</h1>
            </div>
            <div class="col-12 blog login d-flex justify-content-center">

                <form method="POST" action="{{route("createBlog")}}" class="row d-flex justify-content-center flex-column" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <input type="text" id="titleCreate" name="titleCreate" placeholder="Naslov" required/>
                    </div>
                    <div class="col-12">
                        <input type="file" id="picture" name="pictureCreate" required/>
                        <label>Slika za Blog</label>
                    </div>
                    <div class="col-12">
                        <textarea id="descCreate" name="descCreate" placeholder="Text bloga" required></textarea>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Kreiraj" id="createBlogSubmit"/>
                    </div>
                </form>

            </div>

        </div>
    </div>


@endsection






