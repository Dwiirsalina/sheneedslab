<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body class="landing-page" >
    <div class="page-header header-filter" data-parallax="true" 
    style=" background-image: url('http://localhost/sheneedslab/public/img/bg2.jpeg'); ">
    <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title"></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container" style="padding-top:0.5rem">
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
                                            <th class="text-center">No</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          @foreach ($requests as $request)
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>{{ $request->title }}</td>
                                            <td>{{ $request->category }}</td>
                                            <td>{{ $request->date }}</td>
                                            <td>{{ $request->status }}</td>
                                            <td class="td-actions">
                                                <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target="#modalDetail"><i class="material-icons">person</i>
                                                    Detail
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-success">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-danger">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>  
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a>
                                        <span class="sr-only">(current)</span></li>
                                        <li class="page-item">
                                        <span class="page-link">
                                            2
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

<!-- modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-signup" role="document">
    <div class="modal-content">
      <div class="card card-signup card-plain">
        <div class="modal-header">
          <h5 class="modal-title card-title">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-5 ml-auto">
              <div class="info info-horizontal">
                <div class="icon icon-rose">
                  <i class="material-icons">timeline</i>
                </div>
                <div class="description">
                  <h4 class="info-title">Marketing</h4>
                  <p class="description">
                  We've created the marketing campaign of the website. It was a very interesting collaboration.
                  </p>
                </div>
              </div>

              <div class="info info-horizontal">
                <div class="icon icon-primary">
                  <i class="material-icons">code</i>
                </div>
                <div class="description">
                  <h4 class="info-title">Fully Coded in HTML5</h4>
                  <p class="description">
                  We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub.
                  </p>
                </div>
              </div>

              <div class="info info-horizontal">
                <div class="icon icon-info">
                  <i class="material-icons">group</i>
                </div>
                <div class="description">
                  <h4 class="info-title">Built Audience</h4>
                  <p class="description">
                  There is also a Fully Customizable CMS Admin Dashboard for this product.
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-5 mr-auto">
              <div class="social text-center">
                <button class="btn btn-just-icon btn-round btn-twitter">
                  <i class="fa fa-twitter"></i>
                </button>
                <button class="btn btn-just-icon btn-round btn-dribbble">
                  <i class="fa fa-dribbble"></i>
                </button>
                <button class="btn btn-just-icon btn-round btn-facebook">
                  <i class="fa fa-facebook"> </i>
                </button>
                <h4> or be classical </h4>
              </div>

              <form class="form" method="" action="">
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">face</i>
                        </span>
                        <input type="text" class="form-control" placeholder="First Name...">
                    </div>
                  </div>

                <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">email</i>
                      </span>
                      <input type="text" class="form-control" placeholder="Email...">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">lock_outline</i>
                      </span>
                      <input type="password" placeholder="Password..." class="form-control" />
                  </div>
                </div>

                <div class="form-check">
                  <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="" checked>
                      <span class="form-check-sign">
                          <span class="check"></span>
                      </span>
                      I agree to the <a href="#something">terms and conditions</a>.
                  </label>
                </div>
                </div>
              <div class="modal-footer justify-content-center">
              <a href="#pablo" class="btn btn-primary btn-round">Get Started</a>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layout.footer')

<script>
    $('#signupModal').modal('static')
</script>

</body>

</html>