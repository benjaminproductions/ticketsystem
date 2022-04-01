<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticketsystem @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}"/>
</head>
<body>
<div class="container">
    <div class="form signUp">
        <form action="#">
            <h1>Create Account</h1>
            <div class="socials">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-google"></a>
                <a href="#" class="fa fa-reddit"></a>
            </div>
            <span>or use your email for registration</span>
            <input type="text" placeholder="Name" />
            <input type="email" placeholder="Email" />
            <input type="password" placeholder="Password" />
            <button>Sign Up</button>
        </form>
    </div>
    <div class="form signIn">
        <form method="POST" action="{{ route('login.checkLogin') }}" enctype="multipart/form-data">
            @csrf
            <h1>Sign in</h1>
            <div class="socials">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-google"></a>
                <a href="#" class="fa fa-reddit"></a>
            </div>
            <span>or use your account details</span>
            <input type="text" placeholder="Name" name="name"/>
            <input type="password" placeholder="Password" name="password"/>
            <button type="submit">Sign In</button>
        </form>
    </div>
    <div class="overlay">
        <div class="overlay-inner">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>Please log in</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>What's Up?</h1>
                <h2>To Use The Ticket System, Simply Use One Of Those Login-Details:</h2>
                <br>
                <table>
                    <tr style="text-transform: uppercase; font-weight: bold;">
                        <td>User</td>
                        <td>Password</td>
                    </tr>
                    <tr>
                        <td>Kunde</td>
                        <td>Feuerwehr</td>
                    </tr>
                    <tr>
                        <td>Mitarbeiter</td>
                        <td>Feuerwehr</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

        @if(!empty(Auth::user()))
            <script>window.location = "/tcp";</script>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(!empty($success))
            <div class="alert alert-info success-block">
                <strong>{{ $success }}</strong>
            </div>
        @endif
</body>
</html>
