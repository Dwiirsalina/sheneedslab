<!DOCTYPE html>
<html lang="en">

    @include('layout.head')

<body class="landing-page" style="background-color:#ceabf1">
    
    <div class="page-header " data-parallax="true" style="margin-top:-1.5rem;background-image: url('{{url("img/h3.jpg")}}');background-size: 100% 100%;width: 100%;
    height: 12rem; ">
        <div class="container text-center">
            
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreate"><i class="material-icons">assignment</i> Create Request
            </button>
            <a href="{{ url('/logout') }}">
                <button class="btn btn-round btn-danger" style="float:right">
                    <i class="material-icons">exit_to_app</i>
                        Logout
                </button>
            </a>
           
            <!-- <div class="text-center"> -->
            
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">Large modal</button> -->
                <h3 class="text-center">Request List</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <div class="team-player"> -->
                                <div class="card card-plain">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
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
                                                    
                                                <td class="td-actions text-right"">
                                                    <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" onclick="prepareModal('{{$request->id}}');" >
                                                        Detail
                                                    </button>
                                                    @if($request->status == 10)
                                                    <a href="/user/cetaksurat/{{$request->id}}" target="_blank" >
                                                    <button type="button" rel="tooltip" class="btn btn-info">
                                                    <i class="material-icons">printer</i>Surat
                                                    </button>
                                                    </a>
                                                        
                                                    @endif
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

    <!-- Modal -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" role="form" method="POST" action="{{url('user/dashboard/form')}}">
                <div class="modal-body">
                
                    {!! csrf_field() !!}
                    <input type="hidden" value="1" id="lodgerNum">
                    <div class="">
                        <label for="title" class="" style="color:#009688">category</label>
                        <select name="category" class="selectpicker form-control" data-style="btn btn-primary btn-round" title="Single Select" data-size="7">
                            <option disabled selected> choose category</option>
                            @foreach ($category as $key =>  $cat)
                            <option value="{{$key+1}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <label for="Title" class=""style="color:#009688">title</label>
                        <input name="title" type="text" class="form-control" >
                    </div>
                    <div class="">
                        <label for="Desc" class=""style="color:#009688">desc</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="">
                        <label for="Location" class=""style="color:#009688">location</label>
                        <input name="location" type="text" class="form-control" >
                    </div>
                    <div class="">
                        <label for="Date" class=""style="color:#009688">Date</label>
                        <input type="text" class="form-control" readonly value="{{date("Y-m-d")}}">
                    </div>
                    <div class="repeater">
                        <div class="" id="nrp1">
                            <label class=""style="color:#009688">nrp penginap 1</label>
                            <input name="nrp[0]" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <input data-repeater-create type="button" id="addButton" class="btn btn-primary" value="+" onclick="addLodger();"/>
                    <input type="button" id="minButton" class="btn btn-primary"value="-" onclick="minLodger();">
                </div>
                <div class="modal-footer">
                <p class="form-submit">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input name="submit" type="submit" id="submit"  class="btn btn-primary" value="Submit"/>
                </div>
            </form>
            </div>
        </div>
    </div>



    <!-- Modal -->
    @foreach ($requests as $request)
    
    <div class="modal fade" id="{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                    <p>LP</p>
                <span class="info-title" style="color:#1ab1f5">Description</span>
                    <p>{{$request->description}}</p>

                <span class="info-title" style="color:#1ab1f5">Penginap</span>
                    <div id="lodgerDiv{{$request->id}}">
                        
                    </div>

                <div class="row" id="1checkDiv{{$request->id}}">
                    
                  
                </div>   
     
                <div class="row" id="2checkDiv{{$request->id}}">
                
                </div>
                <div id="infoDiv{{$request->id}}">
                    
                </div>
            </div>
           

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
            </div>
            </div>
        </div>
    </div>
    @endforeach
    @include('layout.footer')

    <script type="text/javascript">
        function addLodger(){
            var count = $("#lodgerNum").val();
            count++;
            $(".repeater").append(`<div class="" id="nrp`+count+`"><span class="bmd-form-group">
                            <label class="">nrp penginap `+count+`</label>
                            <input name="nrp[`+(count-1)+`]" type="text" placeholder="" class="form-control">
                            </span>
                        </div>`);
            $("#lodgerNum").val(count);
        }
        function minLodger(){
            var count = $("#lodgerNum").val();

            if(count > 1){
                $("#nrp"+count).remove();
                count--;
                $("#lodgerNum").val(count);
            }
        }
        
        function prepareModal($id) {
            $.ajax({
              url: "{{url('user/dashboard/check')}}?user="+$id,
              context: document.body
            }).done(function(response) {
                console.log(response);
                var itemCount = 0;

                var reason_list = JSON.parse(response);
                // console.log(reason_list.lodger);
                $("#1checkDiv"+$id).empty();
                $("#2checkDiv"+$id).empty();
                $("#infoDiv"+$id).empty();
                if(reason_list.response.length == 0){
                    $("#infoDiv"+$id).append(`Maaf, Permintaan Kamu masih Belum Diproses`);
                }
                var status;
                reason_list.response.forEach(function (row){
                    if(row.status == -1)
                    {
                        status = '&#10006;';
                        $("#infoDiv"+$id).append(`<span class="info-title" style="color:#1ab1f5">alasan `+row.user.username+`</span>
                    <p>`+row.reason+`</p>`);
                    }    
                    else
                        status = '&#10004;';
                    if(itemCount < 5){
                        $("#1checkDiv"+$id).append(`<div class="col-md-2"><span class="info-title">`+row.user.username+`</span>
                        <p style="color:#1ab1f5">`+status+`</p>
                    </div>`);
                    }
                    else{
                        $("#2checkDiv"+$id).append(`<div class="col-md-2"><span class="info-title">`+row.user.username+`</span>
                        <p style="color:#1ab1f5">`+status+`</p>
                    </div>`);   
                    }

                    itemCount++;
                });
                var lodgerCount = 1;
                $("#lodgerDiv"+$id).empty();
                reason_list.lodger.forEach(function(row){
                    // console.log(row.user);
                    if(row.user != null)
                        $("#lodgerDiv"+$id).append(`<p>`+lodgerCount+`. `+row.user.name+`</p>`);
                    lodgerCount++;
                })
                $("#"+$id).modal('show');
            });            
        }       
    </script>
</body>

</html>