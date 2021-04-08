<nav>
    <ul class="d-flex justify-content-center">

        @if(\Illuminate\Support\Facades\Session::has("user"))

            <li><a href="{{route("index")}}">Home</a></li>

            @if(\Illuminate\Support\Facades\Session::get("user")[0]->role_id ==2)

                <li><a href="{{route("userPanel")}}" id="admin"><span>User Panel</span></a> </li>

            @endif
            <li><a href="{{route("userCreateBlog")}}">Kreiraj Blog</a></li>
            <li><a href="{{route("logout")}}" id="logout"><span>Logout</span></a> </li>

        @endif
    </ul>
</nav>
