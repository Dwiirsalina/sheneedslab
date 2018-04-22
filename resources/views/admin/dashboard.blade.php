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
        <div class="container">
            <a href="{{ url('admin/history') }}">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreate"><i class="material-icons">assignment</i> History Request
                </button>
            </a>
            <a href="{{ url('/logout') }}">
                <button class="btn btn-round btn-danger" style="float:right">
                    <i class="material-icons">exit_to_app</i>
                        Logout
                </button>
            </a>
            <!-- <div class="text-center"> -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">Large modal</button> -->
            <h3 class="text-center">Request List</h3>
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
                                            <td class="text-center">{{ $request->date }}</td>
                                            <td class="text-center">
                                                @if ($request->status < 0)
                                                <p style="color:#d04e44"><b>REJECTED</b></p>
                                                @elseif ($request->status == 10)
                                                <p style="color:#35b546"><b>APPROVED</b></p>
                                                @else
                                                <p style="color:#f4a103"><b>ON PROCESS</b></p>
                                                @endif
                                                </td>
                                            <td class="td-actions text-center">
                                                <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" onclick="prepareModal('{{$request->id}}');" <i class="material-icons">person</i>
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
            <div class="modal fade" id="modalAccept{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
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
                    <div id="lodgerDiv{{$request->id}}">
                        
                    </div>
                  <div class="form">
                    <label for="Select{{$key}}" class="info-title" style="color:#1ab1f5">Pilih Approve / Reject</label>
                    <select onchange="checkReject({{$key}});" name="confirmation{{$request->slug}}" class="form-control" id="Select{{$key}}">

                      <option value="1">Approve</option>
                      <option value="-1">Reject</option>
                    </select>
                  </div>
                  <br>
                  <h6 class="info-title" id="warn{{$key}}"></h6>
                  <div class="form">
                    <label for="reason{{$key}}" class="info-title" style="color:#1ab1f5">Masukkan alasan penolakan</label>
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

    function prepareModal($id) {
            $.ajax({
              url: "{{url('user/dashboard/check')}}?user="+$id,
              context: document.body
            }).done(function(response) {
                // console.log(response);
                var itemCount = 0;

                var reason_list = JSON.parse(response);
                console.log(reason_list.lodger);
                $("#infoDiv"+$id).empty();
                var lodgerCount = 1;
                $("#lodgerDiv"+$id).empty();
                reason_list.lodger.forEach(function(row){
                    // console.log(row.user);
                    if(row.user != null)
                        $("#lodgerDiv"+$id).append(`<p>`+lodgerCount+`. `+row.user.name+`</p>`);
                    lodgerCount++;
                })
                $("#modalAccept"+$id).modal('show');
            });            
        }
</script>

</body>

</html>