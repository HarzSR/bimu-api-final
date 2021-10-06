<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Sign In | BIMU</title>
        <!-- Favicon-->
        <link rel="icon" href="../../favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="{{ url('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="{{ url('plugins/node-waves/waves.css') }}" rel="stylesheet"/>

        <!-- Animation Css -->
        <link href="{{ url('plugins/animate-css/animate.css') }}" rel="stylesheet"/>

        <!-- Custom Css -->
        <link href="{{ url('css/admin_css/style.css') }}" rel="stylesheet">
    </head>

    <body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b> BIMU</b></a>
            <small>Admin Panel</small>
            <br>
            @if(Session::has('error_message'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    {{-- <strong>Oopsy!</strong> Something is wrong. Please try again. --}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Oopsy!</strong> {{ Session::get('error_message') }}.
                </div>
            @endif
            @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Bam!</strong> You have logged out. See you soon. Have a great time.
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" name="sign_in" action="{{ url('/admin') }}" method="POST">
                    @csrf
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" required autofocus value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ url('plugins/node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ url('plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ url('js/admin_js/admin.js') }}"></script>
    <script src="{{ url('js/admin_js/pages/examples/sign-in.js') }}"></script>
    </body>

</html>
