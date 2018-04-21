<!DOCTYPE html>
<html lang="en">

    @include('layout.head')

<body class="landing-page" >
    
    <div class="page-header header-filter" data-parallax="true" style=" background-image: url('http://localhost/sheneedslab/public/img/bg2.jpeg'); ">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title">She Needs Lab</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container" style="padding-top:0.5rem">
            <button class="btn btn-round" data-toggle="modal" data-target="#loginModal">Login<i class="material-icons">assignment</i>
            </button>
            
            <div class="text-center">
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">Large modal</button> -->
                <h2 class="title">Request List</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <div class="team-player"> -->
                                <div class="card card-plain">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($requests as $request)
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>{{ $request->title }}</td>
                                            <td>{{ $request->category }}</td>
                                            <td>{{ $request->date }}</td>
                                            <td>{{ $request->status }}</td>
                                            <td class="td-actions">
                                                <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target="#modalDetail">
                                                    Detail
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>  
                                <nav aria-label="...">

                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                        
                                        <span class="page-link">{{ $requests->links() }}Previous</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active">
                                        <span class="page-link">
                                            2
                                            <span class="sr-only">(current)</span>
                                        </span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                                </div>
                                <!-- Large modal -->

                            <!-- </div> -->
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="">
            <div class="modal-dialog modal-login" role="document">
                <div class="modal-content">
                    <div class="card card-signup card-plain">
                        <div class="modal-header">
                            <div class="card-header card-header-primary text-center">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                                <h4 class="card-title">Log in</h4>
                                <div class="social-line">
                                    <a href="#pablo" class="btn btn-just-icon btn-link">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-just-icon btn-link">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-just-icon btn-link">
                                        <i class="fa fa-google-plus"></i>
                                    <div class="ripple-container"></div></a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="" action="">
                                <p class="description text-center">Or Be Classical</p>
                                <div class="card-body">

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="First Name...">
                                        </div>
                                    </div>

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Email...">
                                        </div>
                                    </div>

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <input type="password" placeholder="Password..." class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal -->
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    @include('layout.footer')


</body>

</html>