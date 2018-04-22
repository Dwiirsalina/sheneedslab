<!DOCTYPE html>
<html lang="en">

    @include('layout.head')

<body class="landing-page" style="background-color:#ceabf1">
    
    <div class="page-header " data-parallax="true" style="margin-top:-1.5rem;background-image: url('http://localhost/sheneedslab/public/img/h3.jpg');background-size: 100% 100%;width: 100%;
    height: 11rem; ">
        <div class="container text-center">
            
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Create Request<i class="material-icons">assignment</i>
            </button>
           
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
                                                @elseif ($request->status > 0)
                                                <p style="color:#35b546"><b>APPROVED</b></p>
                                                @else
                                                <p style="color:#f4a103"><b>ON PROCESS</b></p>
                                                @endif
                                                </td>
                                                    
                                                <td class="td-actions text-right"">
                                                    <button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target="#{{$request->id}}">
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
                        <label for="title" class=""style="color:#009688">title</label>
                        <input name="title" type="text" class="form-control" >
                    </div>
                    <div class="">
                        <label for="desc" class=""style="color:#009688">desc</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="">
                        <label for="title" class=""style="color:#009688">location</label>
                        <input name="location" type="text" class="form-control" >
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
                <span class="info-title" style="color:#1ab1f5">title</span>
                    <p>{{$request->title}}</p>
                <span class="info-title" style="color:#1ab1f5">date</span>
                    <p>{{$request->date}}</p>
                <span class="info-title" style="color:#1ab1f5">location</span>
                    <p>Kuliah</p>
                <span class="info-title" style="color:#1ab1f5">description</span>
                    <p>{{$request->description}}</p>
                <span class="info-title" style="color:#1ab1f5">penginap</span>
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
                <span class="info-title" style="color:#1ab1f5">alasan AJK</span>
                    <p>deskripsi ga meyakinkan</p>
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
       
    </script>
</body>

</html>