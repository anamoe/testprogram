<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('public/login_template/style.css')}}" />
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="{{url('postlogin')}}" method="post" class="sign-in-form">
                    @csrf
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" required="required" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password"  required="required"/>
                    </div>
                    <button type="submit" class="btn solid" >Login</button>
          

                </form>
                
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Belum punya akun ?</h3>
                    <p>
                       Silahkan melakukan registrasi disini
                    </p>
                    <a href="{{url('register')}}">
                        <button class="btn transparent">
                            Sign up
                        </button>
                    </a>
                </div>
                <img src="{{asset('public/login_template/img/log.svg')}}" class="image" alt="" />
            </div>

        </div>
    </div>

    <script src="{{asset('public/login_template/app.js')}}"></script>
    <script src="{{asset('public/vendor/sweetalert/sweetalert.all.js')}}"></script>
        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script>
$(document).ready(function() {

@if(session()->has('message'))
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: "{{session()->get('message')}}",
})
@elseif(session()->has('error'))
Swal.fire({
    icon: 'failure',
    title: 'Gagal',
    text: "{{session()->get('error')}}",
})

@endif




});
            </script>
</body>

</html>