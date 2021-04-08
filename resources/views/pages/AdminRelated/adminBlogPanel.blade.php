@extends("layouts.adminLayout")
@section("title")Admin Blog Panel@endsection
@section("content")
    <div class="container" id="main">
        <div class="row formSection text-center" id="loginForm">
            <div class="col-12 text-center">
                <h1>Dobrodosli na Admin Panel - Blogs</h1>
                <p>Ovde mozete odobriti blog ili ga izbrisati</p>
            </div>
            <div class="col-12 d-flex" id="adminNav">
                <div class="col-12 adminButtons">
                    <a href="{{route("adminApprovedBlogs")}}">Odobreni Blogovi</a>
                    <a href="{{route("adminPendingBlogs")}}">Blogovi za Odobrenje</a>
                </div>
            </div>

        </div>
    </div>


@endsection


