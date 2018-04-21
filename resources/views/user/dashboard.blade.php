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
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Create Request<i class="material-icons">assignment</i>
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
                                        {{dd($requests)}}
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
                        <label for="title" class="">category</label>
                        <select name="category" class="selectpicker form-control" data-style="btn btn-primary btn-round" title="Single Select" data-size="7">
                            <option disabled selected> choose category</option>
                            @foreach ($category as $cat)
                            <option value="1">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <label for="title" class="">title</label>
                        <input name="title" type="text" class="form-control" >
                    </div>
                    <div class="">
                        <label for="desc" class="">desc</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="repeater">
                        <div class="" id="nrp1">
                            <label class="">nrp penginap 1</label>
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