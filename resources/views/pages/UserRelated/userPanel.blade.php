@extends("layouts.userLayout")
@section("title")User Panel@endsection
@section("content")
    <div class="container" id="main">
        @csrf
        <div class="row formSection text-center">
            <div class="col-12 text-center">
                <h1>Vasi Blogovi</h1>
                <p>Ovde mozete Kreirati blogove, menjati ih i brisati</p>
            </div>
            <div class="col-12" id="adminBlogs">
                <div class="row" id="userBlogsUnique">

                </div>

            </div>
        </div>
    </div>


@endsection




