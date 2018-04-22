<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body class="landing-page" style="background-color:#ceabf1">
    
    <div class="page-header " data-parallax="true" style="margin-top:-1.5rem;background-image: url('http://localhost/sheneedslab/public/img/h3.jpg');background-size: 100% 100%;width: 100%;
    height: 12rem; ">
        <div class="container text-center">
            
        </div>
    </div>
    <div class="main main-raised">
        <div class="container" style="padding-top:0.5rem">
        <a href="{{ url('admin/dashboard') }}">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreate"><i class="material-icons">assignment</i> Current Request
                </button>
            </a>
            <!-- <div class="text-center"> -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">Large modal</button> -->
            <h3 class="text-center">History Request List</h3>
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
                                            @if($request->category_id == 1)
                                                <td class="text-center">Kuliah</td>
                                            @else
                                                <td class="text-center">Himpunan</td>
                                            @endif
                                            <td>{{ $request->date }}</td>
                                            <td class="text-center">
                                                @if ($request->status < 0)
                                                <p style="color:#d04e44"><b>REJECTED</b></p>
                                                @else
                                                <p style="color:#35b546"><b>APPROVED</b></p>
                                                @endif
                                                </td>
                                            
                                            <td class="td-actions text-center">
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
                                <div class="text-center">
                                {{ $requests->links() }}
                                    
                                </div>
                                </div>
                                <!-- Large modal -->

                            <!-- </div> -->
                        </div>
                    </div>
            <!-- </div> -->
        </div>
    </div>

    @foreach($requests as $key => $request)
            <div class="modal fade" id="modalAccept{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                  <form action="{{url('admin/dashboard/confirm/'.$request->slug)}}" method="POST" >
                    {{csrf_field()}}
                  <span class="info-title" style="color:#1ab1f5">Category</span>
                    @if($request->category_id == 1)
                        <p>Kuliah</p>
                    @else
                        <p>Himpunan</p>
                    @endif
                <span class="info-title" style="color:#1ab1f5">Title</span>
                    <p>{{$request->title}}</p>
                <span class="info-title" style="color:#1ab1f5">Date</span>
                    <p>{{$request->date}}</p>
                <span class="info-title" style="color:#1ab1f5">Location</span>
                    <p>Kuliah</p>
                <span class="info-title" style="color:#1ab1f5">Description</span>
                    <p>{{$request->description}}</p>
                <span class="info-title" style="color:#1ab1f5">Penginap</span>
                    <p>penginap</p>
                  <div class="row">
                    <div class="col-md-2"><span class="info-title">LP</span>
                        <p style="color:#1ab1f5">&#10004;</p>
                    </div>
                    <div class="col-md-2"><span class="info-title">LP2</span>
                        <p style="color:#1ab1f5">&#10004;</p>
                    </div>
                    <div class="col-md-2"><span class="info-title">IGS</span>
                        <p style="color:#1ab1f5">&#10004;</p>
                    </div>
                    <div class="col-md-2"><span class="info-title">AJK</span>
                        <p style="color:">&#10006;</p>
                    </div>
                    <div class="col-md-2"><span class="info-title">RPL</span>
                        <p style="color:#1ab1f5">&#10004;</p>
                    </div>
                  
                </div>   
                <div class="row">
                <div class="col-md-2"><span class="info-title">KCV</span>
                        <p style="color:#1ab1f5">&#10004;</p>
                    </div>
                    <div class="col-md-2"><span class="info-title">NCC</span>
                        <p style="color:#1ab1f5">&#10004;</p>
                    </div>
                    <div class="col-md-2"><span class="info-title">MIS</span>
                        <p style="color:#1ab1f5">&#10004;</p>
                    </div>
                    <div class="col-md-2"><span class="info-title">ALPRO</span>
                        <p style="color:#1ab1f5">&#10004;</p>
                    </div>
                    <div class="col-md-2"><span class="info-title">MI</span>
                        <p style="color:#1ab1f5">&#10004;</p>
                    </div> 
                </div>
                <span class="info-title" style="color:#1ab1f5">Alasan AJK</span>
                    <p>deskripsi ga meyakinkan</p>
            </div>
           

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
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