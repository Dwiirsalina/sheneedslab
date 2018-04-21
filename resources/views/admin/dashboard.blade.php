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
                                          @foreach ($requests as $key => $request)
                                        <tr>
                                            <td class="text-center">{{$key+1}}</td>
                                            <td>{{ $request->title }}</td>
                                            <td>{{ $request->category }}</td>
                                            <td>{{ $request->date }}</td>
                                            <td>{{ $request->status }}</td>
                                            <td class="td-actions">
                                                <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target="#modalAccept{{$key}}"><i class="material-icons">person</i>
                                                    Detail
                                                </button>
                                                <!-- <button type="button" rel="tooltip" class="btn btn-success">
                                                    <i class="material-icons">check</i>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-danger">
                                                    <i class="material-icons">close</i>
                                                </button> -->
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

    @foreach($requests as $key => $request)
            <div class="modal fade" id="modalAccept{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                  <form action="{{url('admin/dashboard/confirm/'.$request->slug)}}" method="POST" >
                    {{csrf_field()}}
                  <div class="description">
                    <h4 class="info-title">Judul</h4>
                    <p class="description">
                      {{$request->title}}
                    </p>
                  </div>

                  <div class="description">
                    <h4 class="info-title">Tempat Menginap</h4>
                    <p class="description">
                      {{$request->location}}
                    </p>
                  </div>

                  <div class="description">
                    <h4 class="info-title">Deskripsi</h4>
                    <p class="description">
                      {{$request->description}}
                    </p>
                  </div>
                  <div class="form-group">
                    <label for="Select{{$key}}">Pilih Approve / Reject</label>
                    <select onchange="checkReject({{$key}});" name="confirmation{{$request->slug}}" class="form-control" id="Select{{$key}}">

                      <option value="1">Approve</option>
                      <option value="-1">Reject</option>
                    </select>
                  </div>

                  <h6 class="info-title" id="warn{{$key}}"></h6>
                  <div class="form-group">
                    <label for="reason{{$key}}">Masukkan alasan penolakan</label>
                    <input disabled type="text" class="form-control" id="reason{{$key}}" name="reason{{$request->slug}}" placeholder="Masukkan Alasan Penolakan disini">
                  </div>

                </div>
                <div class="modal-footer">
                <p class="form-submit">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input name="submit" type="submit" id="submit" onsubmit="checkReason({{$key}});" class="btn btn-primary" value="Submit"/>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach




@include('layout.footer')

<script>
    $('#signupModal').modal('static')

    function checkReject(key)
    {
      status = $("#Select"+key).val();
      console.log(status);
      if(status == -1)
      {
        $("#reason"+key).prop('disabled', false);
      }
      else
      {
        $("#reason"+key).prop('disabled', true);
      }
    }
    function checkReason(key)
    {
      status = $("#Select"+key).val();
      reason = $("#reason"+key).val();
      if(status == -1 && reason == "")
      {
        $("#warn"+key).innerHtml = "Mohon mengisi alasan penolakan";
        return FALSE;
      }
      return TRUE;
    }
</script>

</body>

</html>