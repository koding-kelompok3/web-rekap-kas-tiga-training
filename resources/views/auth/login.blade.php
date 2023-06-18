<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | UANG KAS</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Poppins';
            background-color: #ffffff;
            position: absolute;
        }

        .bg-white {
            margin-top: 40px;
        }

        .bg-ffa942 {
            background-color: #ffa942;
        }

        .card {
            margin: 40px;
            margin-top: 100px;
        }

        .form-input {
            margin: 40px;
        }

        .container-fluid {
            position: relative;
            min-height: 100vh;
        }

        @media(max-width: 670px) {
            body {
                background-color: #ffa942;
            }

            .slider {
                display: none;
            }

            .card {
                margin: 70px 0 auto;
                float: none;
                margin-bottom: 20px;
                border-radius: 10px;
            }

            .footer {
                color: white;
                bottom: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 bg-white slider">
                <h2 class="text-center">MASUK APLIKASI</h2>
                <h5 class="text-center">Masuk ke aplikasi untuk memulai sesi!</h5>
                <center>
                    <img src="{{ asset('img/asset/loginwelcome.png') }}" width="80%">
                </center>
            </div>

            <div class="col-sm-6 bg-ffa942">
                <div class="card">
                    <center>
                        <img src="{{ asset('img/asset/user.png') }}" alt="" width="200px" class="mt-2">
                    </center>

                    <form action="{{ route('login') }}" method="POST" class="form-input">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="username" value="{{ old('username') }}">
                            <label for="input" class="input-label">Username</label><i class="bar"></i>
                            @error('username')
                            <span class="has-error text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" name="password">
                            <label for="input" class="input-label">Password</label><i class="bar"></i>
                            @error('password')
                            <span class="has-error text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        @error('validation.required')
                        <span class="has-error text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="form-group">
                            <button class="btn btn-primary float-right">MASUK</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 mt-3">
                <h6 class="text-center footer">Oleh TIGA TRAINING; 
                Agatha, Altsa, Tsuraya, Putrintan</h6>
            </div>
        </div>
    </div>
</body>

</html>