<!DOCTYPE html>
<html lang="en">
@include('layout.head')

<body class="signup-page " style="padding-top:5rem;background-image: url('http://localhost/sheneedslab/public/img/bg2.jpeg');">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="card card-signup"style="padding-top:1rem;">
                        <h2 class="card-title text-center">Sign In</h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form class="form" method="POST" action="{{ url('/login') }}">
                                        {{ csrf_field() }}
                                        <div class="">
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder=" Username" name="username">
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                                </div>
                                                <input type="password" placeholder=" Password" class="form-control" name="password" />
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="SUBMIT" class="btn btn-primary btn-round">sign in </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                                <div class="col-md-4 mr-auto ml-auto">
                                    <br>
                                    <br>
                                        <div class="text-center">
                                            Belum punya akun? <a href="{{ url('/register') }}">Sign Up</a>
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