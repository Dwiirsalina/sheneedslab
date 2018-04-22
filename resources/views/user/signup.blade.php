<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body class="signup-page " style="padding-top:5rem;background-image: url('{{url("img/bglp.jpg")}}');background-size:cover;">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="card card-signup" style="padding-top:1rem;">
                        <h2 class="card-title text-center">Register</h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form class="form" method="POST" action="{{ url('/register') }}">
                                        {{csrf_field()}}
                                        <div class="">
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder=" NRP" name="username">
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder=" Nama Lengkap" name="name">
                                            </div>
                                        </div>
        
                                
                                        <div class="">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder=" Email" name="email">
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">phone</i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder=" Nomor HP" name="no_hp">
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                                </div>
                                                <input type="password" placeholder=" Password..." class="form-control" name="password" />
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="SUBMIT" class="btn btn-primary btn-round">sign up</button>
                                        </div>
                                    </form>
                                    <br>
                                    <br>
                                        <div class="text-center">
                                            Sudah punya akun? <a href="{{ url('/login') }}">Log In</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


</body>

</html>