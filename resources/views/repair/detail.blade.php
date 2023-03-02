<x-app-layout>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>

    </style>
    <!-- <div class="py-8">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    รายระเอียด
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <center>
                                    <img class="my-3" src="{{url('images/re_de.png')}}" width="350" alt="">
                                </center>
                            </div>
                            <div class="row">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-8">
                                    <div class="card">

                                        <label for="nick_name">ผู้ใช้ : </label>


                                    </div>
                                </div>
                                <div class="col-md-2">

                                </div>

                            </div>

                        </div>
                        <div class="col-md-5">
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
                                    {{$data->created_at->format('d/m/Y')}}
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">

                                    เวลา :
                                </div>
                                <span class="col-6 py-2">
                                    {{$data->created_at->format('h:i')}}
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
                            @elseif($data->st == '2')
                            <div class="row">
                                <div class="col-4 py-2">
                                    สถานะ :
                                </div>
                                <span class="col-6 py-2">

                                    <div class="text-success"> รับงานแล้ว </div>
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">
                                    โดย :
                                </div>
                                <span class="col-6 py-2">
                                    @if($data->admin_id != null)
                                    {{$data->admin->name}}
                                    @endif
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">
                                    วันที่ :
                                </div>
                                <span class="col-6 py-2">
                                    @if($data->admin_date != null)
                                    {{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y h:i') }}
                                    @endif
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-md-10">

                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#done">
                                        ปิดงาน
                                    </button>
                                </div>
                            </div>
                            


                            @elseif($data->st == '3')
                            <div class="row">
                                <div class="col-4 py-2">
                                    สถานะ :
                                </div>
                                <span class="col-6 py-2">
                                    <div class="text-primary"> ปิดงานแล้ว </div>
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">
                                    รับงานโดย :
                                </div>
                                <span class="col-6 py-2">
                                    @if($data->admin_id != null)
                                    {{$data->admin->name}}
                                    @endif
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">
                                    ปิดงานเมื่่อ :
                                </div>
                                <span class="col-6 py-2">
                                    @if($data->deleted_at != null)
                                    {{$data->deleted_at->format('d/m/Y')}}
                                    @endif

                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">
                                    อาการ/แก้ไข :
                                </div>
                                <span class="col-6 py-2">
                                    @if($data->deleted_at != null)
                                    {{$data->admin_behave}}
                                    @endif

                                </span>
                            </div>
                            <a class="btn btn-primary mb-3" href="" target="_blank">Download</a>
                            @else
                            <div class="row">
                                <div class="col-4 py-2">
                                    สถานะ :
                                </div>
                                <span class="col-6 py-2">
                                    <div class="text-danger"> ยกเลิก </div>
                                </span>
                            </div>
                            @endif
                            
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
                                                        <input class="form-check-input" type="radio" name="st_be" id="st_be1" value="รับซ่อม" checked>
                                                        <label class="form-check-label" for="st_be1">
                                                            รับซ่อม
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="st_be" id="st_be2" value="ส่งซ่อมภายนอก">
                                                        <label class="form-check-label" for="st_be2">
                                                            ส่งซ่อมภายนอก
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="refer" class="form-label">สถานะ(After)</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="st_af" id="st_af1" value="ใช้งานได้" checked>
                                                        <label class="form-check-label" for="st_af1">
                                                            ใช้งานได้
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="st_af" id="st_af2" value="ใช้งานไม่ได้">
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
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-10">
                            </div>

                            <div class="col-md-2">
                                <a href="{{route('repair_accept',['id'=>$data->id])}}" class="btn btn-primary my-3">รับงาน</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    -->
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
                                    {{$data->created_at->format('d/m/Y')}}
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-4 py-2">

                                    เวลา :
                                </div>
                                <span class="col-6 py-2">
                                    {{$data->created_at->format('h:i')}}
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-end">

                    @if($data->st == '1')
                    <a href="" class="btn btn-danger my-3">ยกเลิกงาน</a>
                    <a href="{{route('repair_accept',['id'=>$data->id])}}" class="btn btn-primary my-3">รับงาน</a>
                    @elseif($data->st == '2')
                    <a href="" class="btn btn-danger my-3">ยกเลิกงาน</a>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#done">
                        ปิดงาน
                    </button>
                    @elseif($data->st == '3')
                    <a class="btn btn-primary mb-3" href="" target="_blank">Download</a>
                    @else
                    @endif

                </div>
            </div>
        </div>
</x-app-layout>