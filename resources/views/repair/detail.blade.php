<x-app-layout>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>

    </style>
    <div class="container py-8">
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <center>
                                <img class="my-3" src="{{url('images/re_de.png')}}" width="350" alt="">
                            </center>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="row">
                                <div class="col-4 py-2">
                                    รหัสทรัพสิน :
                                </div>
                                <span class="col-6 py-2">
                                    {{$data->regis->property_key->key}}{{$data->regis->property_code}}
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">

                                    วันที่แจ้ง :
                                </div>
                                <span class="col-6 py-2">
                                    {{$data->created_at->format('d-m-Y h:i')}}
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">

                                    อุปกรณ์ :
                                </div>
                                <span class="col-6 py-2">
                                    {{$data->regis->type}}
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">

                                    อาการ :
                                </div>
                                <span class="col-6 py-2">
                                    {{$data->emp_behave}}
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">
                                    ผู้แจ้ง :
                                </div>
                                <span class="col-6 py-2">
                                    {{$data->emp->name}}
                                </span>
                            </div>
                            @if($data->st == '1')
                            <div class="row">
                                <div class="col-4 py-2">
                                    สถานะ :
                                </div>
                                <span class="col-6 py-2 text-warning">
                                    ยังไม่รับงาน
                                </span>
                            </div>
                            @elseif($data->st == '2')
                            <div class="row">
                                <div class="col-4 py-2">
                                    สถานะ :
                                </div>
                                <span class="col-6 py-2 text-success">
                                    กำลังปฎิบัติ
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">
                                    รับงานโดย :
                                </div>
                                <span class="col-6 py-2 ">
                                    {{$data->admin->name}}
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">
                                    วันที่ :
                                </div>
                                <span class="col-6 py-2 ">
                                    {{Carbon\Carbon::parse($data->admin_date)->format('d-m-Y h:i')}}
                                </span>
                            </div>
                            @elseif($data->st == '3')
                            <div class="row">
                                <div class="col-4 py-2">
                                    สถานะ :
                                </div>
                                <span class="col-6 py-2 text-primary">
                                    ปิดงานแล้ว
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">
                                    รับงานโดย :
                                </div>
                                <span class="col-6 py-2 ">
                                    {{$data->admin->name}}
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">
                                    วันที่ :
                                </div>
                                <span class="col-6 py-2 ">
                                    {{Carbon\Carbon::parse($data->admin_date)->format('d-m-Y h:i')}}
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">
                                    ปิดงานวันที่ :
                                </div>
                                <span class="col-6 py-2 ">
                                    {{Carbon\Carbon::parse($data->deleted_at)->format('d-m-Y h:i')}}
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">
                                    แก้ไข :
                                </div>
                                <span class="col-6 py-2 ">
                                    {{$data->admin_behave}}
                                </span>
                            </div>
                            @elseif($data->st == '4')
                            <div class="row">
                                <div class="col-4 py-2">
                                    สถานะ :
                                </div>
                                <span class="col-6 py-2 text-danger">
                                    ยกเลิก
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-end">

                    @if($data->st == '1')
                    <a href="{{route('delete_re',['id'=>$data->id])}}" class="btn btn-danger my-3">ยกเลิกงาน</a>
                    <a href="{{route('repair_accept',['id'=>$data->id])}}" class="btn btn-primary my-3">รับงาน</a>
                    @elseif($data->st == '2'and $data->admin_id == $admin)
                    <a href="{{route('delete_re',['id'=>$data->id])}}" class="btn btn-danger my-3">ยกเลิกงาน</a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#done">
                        ปิดงาน
                    </button>
                    @elseif($data->st == '3')
                    <a class="btn btn-primary mb-3" href="{{route('download',['id' => $data->id])}}" target="_blank">Download</a>
                    @else
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="done" tabindex="-1" aria-labelledby="unregisLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="unregisLabel">ปิดงานซ่อม {{$data->regis->property_key->key}}{{$data->regis->property_code}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('donerepair',['id'=>$data->id])}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="refer" class="form-label">สถานะ(Before)</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="st_be" id="st_be1" value="1" checked>
                                <label class="form-check-label" for="st_be1">
                                    รับซ่อม
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="st_be" id="st_be2" value="2">
                                <label class="form-check-label" for="st_be2">
                                    ส่งซ่อมภายนอก
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="refer" class="form-label">สถานะ(After)</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="st_af" id="st_af1" value="1" checked>
                                <label class="form-check-label" for="st_af1">
                                    ใช้งานได้
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="st_af" id="st_af2" value="2">
                                <label class="form-check-label" for="st_af2">
                                    ใช้งานไม่ได้
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="refer" class="form-label">รายระเอียด</label>
                            <textarea class="form-control" placeholder="" required name="admin_behave" id="" cols="30" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary btn-success">ปิดงาน</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>