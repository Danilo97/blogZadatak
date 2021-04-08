@extends("layouts.adminLayout")
@section("title")Admin Users@endsection
@section("content")
    <div class="container" id="main">
        <div class="row formSection text-center">
            <div class="col-12 text-center">
                <h1>Korisnici</h1>
                <p>Ovde mozete videti sve Korisnike</p>
            </div>

            <div class="col-12" id="adminUsers">
                <div class="row">

                    @foreach($users as $user)
                        <div class="col-12 userBlogs">
                            <div class="row d-flex justify-content-lg-between align-items-center">
                                <div class="col-lg-4 col-12 blogsAdminRes">
                                    <figure><img class="img-fluid imgBlogAdmin" src="{{asset("assets/images/user.png")}}" alt="userIcon"/></figure>
                                </div>
                                <div class="col-lg-4 col-12 blogsAdminRes">
                                    <h4>{{$user->firstName}} {{$user->lastName}}</h4>
                                </div>
                                <div class="col-lg-4 col-12 blogsAdminRes">
                                    <p>{{$user->email}}</p>
                                </div>

                            </div>

                        </div>
                    @endforeach


                </div>

            </div>

        </div>
    </div>


@endsection



