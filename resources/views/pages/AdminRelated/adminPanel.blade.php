@extends("layouts.adminLayout")
@section("title")Admin Panel@endsection
@section("content")
    <div class="container" id="main">
        <div class="row formSection text-center" id="loginForm">
            <div class="col-12 text-center">
                <h1>Dobrodosli na Admin Panel</h1>
                <p>Ovde mozete odobriti blog ili ga izbrisati, kao i videti sve korisnike</p>
            </div>
            <div class="col-12 d-flex" id="adminNav">
                <div class="col-12 adminButtons">
                    <a href="{{route("adminBlogPanel")}}">Blogovi</a>
                    <a href="{{route("adminUsers")}}">Korisnici</a>
                </div>
            </div>

        </div>
    </div>


@endsection


