<x-app-layout>

    <div class="py-8">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    แก้ไขข้อมูล {{$registration->property_key->key}} {{$registration->property_code}}
                </div>
                <form action="{{route('registration_edit_post',['id'=> $registration->id])}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <center>
                                    <img src="{{url('images/img03.png')}}" width="400" alt="">
                                </center>
                            </div>
                            <div class="row">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="input-group my-3 has-validation">
                                            <label class="input-group-text" for="user_id">ผู้ใช้</label>
                                            <select name="user_id" id="" class="form-select">
                                                <option selected value="{{$registration->employee->id}}">{{$registration->employee->nick_name}}</option>
                                                @foreach($employee as $row)
                                                <option value="{{$row->id}}">{{$row->nick_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">

                                </div>

                            </div>

                        </div>
                        <div class="col-md-5">
                            <div class="input-group my-3 has-validation">
                                <label class="input-group-text" for="property_id">หมวด</label>
                                <select name="property_id" id="property_id" class="form-select">
                                    <option selected value="{{$registration->id}}">{{$registration->property_key->key}}</option>
                                    @foreach($property_key as $row)
                                    <option value="{{$row->id}}">{{$row->key}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="input-group my-3 has-validation">
                                <label class="input-group-text" for="property_code">รหัส</label>
                                <input type="text" class="form-control" name="property_code" value="{{$registration->property_code}}">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">หมายเลขซีเรียล</label>
                                <input type="text" class="form-control" name="serial_number" value="{{$registration->serial_number}}">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">รุ่น</label>
                                <input type="text" class="form-control" name="brand" value="{{$registration->brand}}">
                            </div>
                            <div class=" input-group my-3 ">
                                <label class=" input-group-text" for="property_code">ประเภท</label>
                                <input type="text" class="form-control" name="type" value="{{$registration->type}}">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">สเปค</label>
                                <input type="text" class="form-control" name="spec" value="{{$registration->spec}}">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">สี</label>
                                <input type="text" class="form-control" name="color" value="{{$registration->color}}">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">หมายเหตุ</label>
                                <input type="text" class="form-control" name="refer" value="{{$registration->refer}}">
                            </div>
                            <input class="btn btn-success text-right mb-3" type="submit" value="บันทึก">
                            <a class="btn btn-danger mb-3" href="{{ url()->previous() }}">ยกเลิก</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>