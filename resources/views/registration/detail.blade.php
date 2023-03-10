<x-app-layout>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
    <div class="py-8">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    รายระเอียด {{$registration->property_key->key}} {{$registration->property_code}}
                </div>
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
                                    <div class="card-body">
                                        <label for="nick_name">ผู้ใช้ : </label>
                                        <a href="{{route('employee_detail',['id'=>$registration->employee->id])}}">{{$registration->employee->name}} {{$registration->employee->nick_name}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">

                            </div>

                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-4 py-2">

                                หมวด :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->property_key->key}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">

                                รหัส :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->property_code}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">

                                หมายเลขซีเรียล :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->serial_number}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">

                                รุ่น :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->brand}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">

                                ประเภท :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->type}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                สเปค :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->spec}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                สี :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->color}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                หมายเหตุ :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->refer}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                วันที่ลงทะเบียน :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->created_at->format('d/m/Y')}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                ลงทะเบียนโดย :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->admin->name}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-md-4 py-2">
                                สถานะ :
                            </div>
                            <span class="col-md-6 py-2">
                                @if($registration->deleted_at == null)
                                <p class="text-success">ใช้งาน</p>
                                @else
                                <div class="text-danger"> ถอดถอนแล้ว <br>
                                    {{Carbon\Carbon::parse($registration->unregis->created_at)->format('d-m-Y')}}
                                </div>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                สาเหตุ :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->unregis->cause}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                ถอดถอนโดย :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->unregis->user->name}}
                            </span>
                        </div>
                        @endif
                        @if($registration->deleted_at == null)
                        <a class="btn btn-warning mb-3" href="{{route('registration_edit',['id' => $registration->id])}}">Edit</a>
                        <!--   <a class="btn btn-danger mb-3" href="{{route('registration_unregis',['id' => $registration->id])}}">Unregis</a> 
-->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#unregis">
                            ถอดถอน
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="unregis" tabindex="-1" aria-labelledby="unregisLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="unregisLabel">Unregistration</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('registration_unregis',['id'=>$registration->id])}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="refer" class="form-label">Cuase Unregistration</label>
                                                <input type="text" class="form-control" id="refer" name="refer" placeholder="" require>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary btn-danger">Unregis</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-secondary mb-3 " href="{{ url()->previous() }}">กลับ</a>

                        @else
                        <a class="btn btn-info mb-3 " href="{{ route('unregistration',['key' => 'all']) }}">กลับ</a>
                        <a class="btn btn-primary mb-3" href="{{route('unregispdf',['id'=> $registration->id])}}" target="_blank">Download</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="py-3">
            <div class="card">
                <div class="card-header">
                    ประวัติผู้ใช้
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">พนักงาน</th>
                                    <th scope="col">วันที่เริ่มใช้</th>
                                    <th scope="col">โดย</th>
                                    <th scope="col">ถึงวันที่</th>
                                    <th scope="col">โดย</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($logs as $row)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td><a href="{{route('employee_detail',['id'=>$row->emp->id])}}">{{$row->emp->name}}</a></td>
                                    <td>{{$row->created_at->format('d-m-Y h:i')}}</td>
                                    <td>{{$row->admin_in->name}}</td>
                                    @if($row->deleted_at == "")
                                    <td>ปัจจุบัน</td>
                                    <td></td>
                                    @else
                                    <td>{{$row->deleted_at->format('d-m-Y h:i')}}</td>
                                    <td>{{$row->admin_out->name}}</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-3">
            <div class="card">
                <div class="card-header">
                    ประวัติการซ่อม
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">พนักงาน</th>
                                    <th scope="col">วันที่</th>
                                    <th scope="col">อาการ</th>
                                    <th scope="col">ผู้รับผิดชอบ</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($logs_re as $row)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td><a href="{{route('employee_detail',['id'=>$row->emp->id])}}">{{$row->emp->name}}</a></td>
                                    <td>{{$row->created_at->format('d-m-Y')}}</td>
                                    <td>{{$row->emp_behave}}</td>
                                    @if($row->admin_id == "")
                                    <td>ยังไม่รับงาน</td>
                                    @else
                                    <td>{{$row->admin->name}}</td>
                                    @endif
                                    <td>{{$row->admin_behave}}</td>
                                    <td><a href="{{route('repair_detail',['id'=>$row->id])}}"><span class="material-symbols-outlined">
                                                visibility
                                            </span></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>