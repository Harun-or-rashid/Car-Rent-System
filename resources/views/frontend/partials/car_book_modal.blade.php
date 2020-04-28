<!-- Modal -->
<div id="carBookModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Book This Car</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('car_request.book') }}" method="post">
                    @csrf
                    @if(\Illuminate\Support\Facades\Auth::check()==false)
                    <div class="form-group">
                        <label class="control-label col-sm-5" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-5" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-5" for="phone">Phone:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" required>
                        </div>
                    </div>
                    @endif()
                    <div class="form-group">
                        <label class="control-label col-sm-5" for="pickUpLocation">Pick-Up Location:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pickUpLocation" id="pickUpLocation" placeholder="Enter pick up location" required>
                        </div>
                    </div>
                    <input type="hidden" id="car_id" name="car_id" value="">

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>