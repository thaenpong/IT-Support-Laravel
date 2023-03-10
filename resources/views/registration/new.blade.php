<x-app-layout>
    <script>
        $(document).ready(function() {

            $('#property_id').click(function() {
                var id = $(this).val(); // get the selected value from the dropdown
                $.get("/registration/new/" + id,
                    function(data) {
                        var propertyCode = JSON.parse(data).property_code;
                        var newValue = (parseFloat(propertyCode) + 0.01).toFixed(2);
                        $('#property_code').val(newValue); // populate the input field with the data received from the server

                    });
            });
        });
    </script>
    <div class="py-8">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    ลงทะเบียน
                </div>
                <form action="{{route('registration_new_post')}}" method="post">
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
                                            <select name="user_id" id="" class="form-select" required>
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
                                    @foreach($property_key as $row)
                                    <option value="{{$row->id}}">{{$row->key}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group my-3 has-validation">
                                <label class="input-group-text" for="property_code">รหัส</label>
                                <input type="text" class="form-control" name="property_code" id="property_code">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">หมายเลขซีเรียล</label>
                                <input type="text" class="form-control" name="serial_number">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">รุ่น</label>
                                <input type="text" class="form-control" name="brand">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">ประเภท</label>
                                <input type="text" class="form-control" name="type">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">สเปค</label>
                                <input type="text" class="form-control" name="spec">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">สี</label>
                                <input type="text" class="form-control" name="color">
                            </div>
                            <div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">หมายเหตุ</label>
                                <input type="text" class="form-control" name="refer">
                            </div>
                            <!--<div class="input-group my-3 ">
                                <label class="input-group-text" for="property_code">วันที่ลงทะเบียน</label>
                                <input type="datetime-local" name="created_at" class="form-control">
                            </div> -->
                            <input class="btn btn-success text-right mb-3" type="submit" value="ลงทะเบียน">
                            <a class="btn btn-danger mb-3" href="{{route('registration',['key' => 'all'])}}">ยกเลิก</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>