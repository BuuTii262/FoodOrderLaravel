
<div id="DetailModal{{$food->uuid}}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title display-4 font-weight-bold" style="color: gold; id="exampleModalLabel">{{$food->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><h1>&times;</h1></span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                                                
                            <img src="{{ asset('uploads/foodImage/'.$food->food_image) }}" class="imageDetail">
                    
                        </div>

                        <div class="col-sm-6">
                            <br>
                            <h2>
                                Price : <span class="badge badge-warning">{{$food->price}} MMK </span>
                            </h2>
                            <br>
                            <h3>
                                Description : {{$food->description}}
                            </h3>              
                        </div>

                    </div>
                </div>   
            </div>

            <div class="modal-footer">
                <button type="button" class="btn bg-white text-dark" data-dismiss="modal" style="font-size: 14px;">Close</button>
            </div>
        
        </div>
    </div>
</div>