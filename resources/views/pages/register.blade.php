@extends("layouts.layout")
@section("title")Register@endsection
@section("content")
    <div class="container" id="main">
        <div class="row formSection text-center" id="registerForm">
            <div class="col-12 text-center">
                <h1>Registrujte se</h1>
            </div>
            <div class="col-12 blog login d-flex justify-content-center">

                <form class="row d-flex justify-content-center flex-column">
                    @csrf
                    <div class="col-12 d-flex flex-column justify-content-between align-items-center">
                        <input type="text" id="firstName" name="firstName" placeholder="Vase Ime"/>
                        <label class="regLabels" id="nameRegLabel">Pogresan unos (primer: Marko)</label>

                    </div>
                    <div class="col-12 d-flex flex-column justify-content-between align-items-center">
                        <input type="text" id="lastName" name="lastName" placeholder="Vase Prezime"/>
                        <label class="regLabels" id="lastNameRegLabel">Pogresan unos (primer: Markovic)</label>

                    </div>
                    <div class="col-12 d-flex flex-column justify-content-between align-items-center">
                        <input type="text" id="emailReg" name="emailReg" placeholder="Vas Email"/>
                        <label class="regLabels" id="emailRegLabel">Pogresan Email! (primer: marko@gmail.com)</label>

                    </div>
                    <div class="col-12 d-flex flex-column justify-content-between align-items-center">
                        <input type="password" id="passwordReg" name="passwordReg" placeholder="Vasa Sifra"/>
                        <label class="regLabels" id="passRegLabel">Pogresan Pass! (primer: od 4 do 10 bilo kojih karaktera)</label>

                    </div>
                    <div class="col-12 d-flex flex-column justify-content-between align-items-center">
                        <input type="password" id="passwordRepeat" placeholder="Ponovite Sifru"/>
                        <label class="regLabels" id="passRepeatRegLabel">Sifre se ne Podudaraju...</label>

                    </div>
                    <div class="col-12">
                        <input type="button" value="Registrujte se" id="registerSubmit"/>
                    </div>
                </form>

            </div>

        </div>
    </div>


@endsection


