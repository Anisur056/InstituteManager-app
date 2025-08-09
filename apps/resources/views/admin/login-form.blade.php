

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institute Manager App (ima) | Login</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body{
            width: 100vw;
            height: 100vh;
            color: #000;
            font-family: sans-serif;
            background: #aa00ff;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right,rgb(199, 87, 255), #aa00ff);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right,rgb(199, 87, 255), #aa00ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
    </style>

</head>
<body>

    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <h3 class="text-white pb-3">Institute Manager App (ima)</h3>

        <div class="card col-sm-4 p-5">
            <form name="loginForm" action="{{ route('loginAction') }}" method="post">
                @csrf
                <input  class="form-control text-center mb-3 @error('user_name') is-invalid @enderror" 
                        type="text" 
                        name="user_name" 
                        placeholder="User"
                        value="{{ old('user_name') }}">
                <span class="text-danger text-center"> @error('user_name') {{$message}} @enderror </span>
                
                <input  class="form-control text-center mb-3 border-0 @error('password') is-invalid @enderror" 
                        type="password" 
                        name="password" 
                        placeholder="Password"
                        value="{{ old('password') }}">
                <span class="text-danger text-center"> @error('password') {{$message}} @enderror </span>

                <div class="col-10 mx-auto">
                    <div class="row">
                        <div class="col-4 border p-3 text-center jsEvent"><span>1</span></div>
                        <div class="col-4 border p-3 text-center jsEvent"><span>2</span></div>
                        <div class="col-4 border p-3 text-center jsEvent"><span>3</span></div>
                    </div>
        
                    <div class="row">
                        <div class="col-4 border p-3 text-center jsEvent"><span>4</span></div>
                        <div class="col-4 border p-3 text-center jsEvent"><span>5</span></div>
                        <div class="col-4 border p-3 text-center jsEvent"><span>6</span></div>
                    </div>
        
                    <div class="row">
                        <div class="col-4 border p-3 text-center jsEvent"><span>7</span></div>
                        <div class="col-4 border p-3 text-center jsEvent"><span>8</span></div>
                        <div class="col-4 border p-3 text-center jsEvent"><span>9</span></div>
                    </div>

                    <div class="row">
                        <div class="col-4 border p-3 text-center jsClear text-danger"><span>Clear</span></div>
                        <div class="col-4 border p-3 text-center jsEvent"><span>0</span></div>
                        <div class="col-4 border p-0 text-centerjsSubmit">
                            <span>
                                <button class="btn p-3 w-100 text-success" type="submit" name="submit">Login</button>
                            </span></div>
                    </div>
                </div>
            </form> 
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var allNumbersBtn = document.querySelectorAll(".row > .jsEvent");
        var pinInputField = document.querySelector('input[name="password"]');
        var userInputField = document.querySelector('input[name="user_name"]');
        var clearBtn = document.querySelector(".jsClear");

        allNumbersBtn.forEach(val => {
            val.addEventListener("click", ()=> {
                pinInputField.value += val.innerText;
            });
        });
        
        clearBtn.addEventListener("click",()=> {
            pinInputField.value = "";
        });

    </script>
</body>
</html>