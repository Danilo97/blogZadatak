@extends("layouts.adminLayout")
@section("title")Admin Pending Blogs@endsection
@section("content")
    <div class="container" id="main">
        @csrf
        <div class="row formSection text-center">
            <div class="col-12 text-center">
                <h1>Blogovi Koji Cekaju Odobrenje</h1>
                <p>Ovde mozete odobriti kao i obrisati Blogove</p>
            </div>
            <div class="col-12" id="adminBlogs">
                <div class="row" id="adminPendingBlogs">

                </div>

            </div>

        </div>
    </div>


@endsection



