<html lang="en">
@include('layout.head')

<body class="signup-page ">
    <nav class="navbar    navbar-absolute  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <!-- <a class="navbar-brand" href="../index.html"> </a> -->She Needs Lab
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/hmtc_its" target="_blank" data-original-title="Follow us on Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/HMTCFTIf" target="_blank" data-original-title="Like us on Facebook">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/hmtc_its" target="_blank" data-original-title="Follow us on Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="page-header header-filter" filter-color="purple" style="background-image: url('{{ url("/img/bg2.jpeg") }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
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
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Username" name="username">
                                            </div>
                                        </div>
                                        <div class="form-group">
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
                                <a class="btn btn-success btn-round" href="#" target="_blank" 
                                    onclick="window.open('https://notify-bot.line.me/oauth/authorize?client_id=8wlegGyCdDpQvGZUUf9SPC&redirect_uri=http://192.168.33.15:8000/&response_type=code&scope=notify&state=sadf', 
                                    'newwindow', 
                                    'width=800,height=600'); 
                                    return false;">Connect to LINE</a>
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
        <footer class="footer ">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div id="test">
                </div>
                <div class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Admin LP</a>
                </div>
            </div>
        </footer>
    </div>

@include('layout.footer')
</body>

</html>