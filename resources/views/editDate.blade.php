<div class="modal fade in" id="modal-{{$h->id}}" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title float-left">Edit Date</h4>
                <button type="button float-right" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/{{$h->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="text" class="form-control" id="date" placeholder="Date" name="date"
                                   value="{{$h->date}}">
                        </div>
                        <div class="form-group">
                            <label for="Hijri Date">Hijri Date</label>
                            <input type="text" class="form-control" id="Hijri Date" placeholder="Hijri Date"
                                   name="H_date" value="{{$h->H_date}}">
                        </div>
                        <div class="form-group">
                            <label for="countryName">Type</label>
                            <select class="form-control" name="type">
                                <option selected value="{{$h->type}}">{{$h->type}}</option>
                                <option value="Holidays">Holidays</option>
                                <option value="Rescheduled days off">Rescheduled days off</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
