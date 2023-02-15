<x-app-layout>

    <div class="py-8">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    New
                </div>
                <form action="{{route('registration_new_post')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <center>
                                    <img src="{{url('images/registrator_new.png')}}" width="500" alt="">
                                </center>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <!--  USER AND PICTURE -->
                                </div>

                            </div>

                        </div>
                        <div class="col-md-5">

                            <div class="input-group my-3 has-validation">
                                <label class="input-group-text" for="property_code">property_code</label>
                                <input type="text" class="form-control" name="property_code">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">serial_number</label>
                                <input type="text" class="form-control" name="serial_number">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">brand</label>
                                <input type="text" class="form-control" name="brand">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">type</label>
                                <input type="text" class="form-control" name="type">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">spec</label>
                                <input type="text" class="form-control" name="spec">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">color</label>
                                <input type="text" class="form-control" name="color">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">refer</label>
                                <input type="text" class="form-control" name="refer">
                            </div>
                            <input class="btn btn-success text-right mb-3" type="submit" value="Save">
                            <a class="btn btn-danger mb-3" href="{{route('registration')}}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>