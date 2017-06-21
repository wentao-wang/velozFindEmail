<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Find Email</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 80px;
            margin-top: -330px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 0px;
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
                @endif
            </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                 Find Email
             </div>
             <div class="links">
                <a href="/home">About</a> 
            </div><br><br><br>
            <div >
                <form action="/search" method="post"> 
                    <b>Linkedin Sign in</b><br><br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" name="email" placeholder=" Email" required="required">&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="password" name="password" placeholder=" Password" required="required"><br><br>
                    <select name="internalCompany" required> 
                        <option value="">---Select Internal Company---</option>
                        <option value="0">Custom Tobacco</option> 
                        <option value="1">Beverly Hills Chairs</option> 
                    </select><br><br><br>
                    <input type="submit" value="Begin Search">

                </form>
                

            </div>

            
        </div>
    </body>
    </html>
