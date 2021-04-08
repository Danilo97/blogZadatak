@extends("layouts.layout")
@section("title")Login@endsection
@section("content")
    <div class="container" id="main">
        <div class="row formSection text-center" id="loginForm">
            <div class="col-12 text-center">
                <h1>Ulogujte se</h1>
            </div>
            <div class="col-12 blog login d-flex justify-content-center">

                <form class="row d-flex justify-content-center flex-column">
                    @csrf
                    <div class="col-12 d-flex flex-column justify-content-between align-items-center">
                        <input type="text" id="emailLogin" name="emailLogin" placeholder="Vas Email"/>
                        <label class="regLabels" id="emailLogLabel">Pogresan Email! (primer: marko@gmail.com)</label>
                    </div>
                    <div class="col-12 d-flex flex-column justify-content-between align-items-center">
                        <input type="password" id="passLogin" name="passLogin" placeholder="Vas Password"/>
                        <label class="regLabels" id="passLogLabel">Pogresan Pass! (primer: od 4 do 10 bilo kojih karaktera)</label>
                    </div>
                    <div class="col-12">
                        <input type="button" value="Ulogujte se" id="loginSubmit"/>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection

