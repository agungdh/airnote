@php
$now = date('YmdHis');

$flashData = session()->get('flashData');
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ $app_title }}</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('AdminBSBMaterialDesign-1.0.5') }}/favicon.ico?time={{ $now }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('AdminBSBMaterialDesign-1.0.5') }}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('AdminBSBMaterialDesign-1.0.5') }}/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('AdminBSBMaterialDesign-1.0.5') }}/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="{{ asset('AdminBSBMaterialDesign-1.0.5') }}/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('AdminBSBMaterialDesign-1.0.5') }}/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">{{ $app_title }}</a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ action('SignController@in') }}">
                    @csrf
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Email" required autofocus value="{{ $flashData != null ? $flashData->email : null }}">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN IN</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="{{ action('SignController@signUp') }}">Register Now!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('AdminBSBMaterialDesign-1.0.5') }}/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('AdminBSBMaterialDesign-1.0.5') }}/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('AdminBSBMaterialDesign-1.0.5') }}/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('AdminBSBMaterialDesign-1.0.5') }}/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('AdminBSBMaterialDesign-1.0.5') }}/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src="{{ asset('AdminBSBMaterialDesign-1.0.5') }}/js/admin.js"></script>
    <script type="text/javascript">
        @php
            if ($flashData != null) {
                @endphp
                swal('{{ $flashData->header }}', '{{ $flashData->message }}', '{{ $flashData->status }}');
                @php
            }
        @endphp
    </script>
</body>

</html>