@extends("layouts.adminLayout")
@section("title")Admin Approved Blogs@endsection
@section("content")
    <div class="container" id="main">
        @csrf
        <div class="row formSection text-center">
            <div class="col-12 text-center">
                <h1>Odobreni Blogovi</h1>
                <p>Ovde mozete obrisati Blogove</p>
            </div>
            <div class="col-12" id="adminBlogs">
                <div class="row" id="adminApprovedBlogs">

                </div>

            </div>

        </div>
    </div>


@endsection



