<nav>
    <ul class="d-flex justify-content-center">
        @if(!\Illuminate\Support\Facades\Session::has("user"))

            @foreach($menus as $menu)

                <li><a href="{{route("$menu->route")}}">{{$menu->name}}</a></li>

            @endforeach

                <li><a href="{{route("login")}}">Login</a></li>

                <li><a href="{{route("register")}}">Register</a></li>
        @endif


            @if(\Illuminate\Support\Facades\Session::has("user"))

                <li><a href="{{route("index")}}">Home</a></li>

                @if(\Illuminate\Support\Facades\Session::get("user")[0]->role_id ==1)

                    <li><a href="{{route("adminPanel")}}" id="admin"><span>Admin Panel</span></a> </li>

                @else

                    <li><a href="{{route("userPanel")}}" id="admin"><span>User Panel</span></a> </li>

                @endif

                <li><a href="{{route("logout")}}" id="logout"><span>Logout</span></a> </li>

            @endif

    </ul>
</nav>
