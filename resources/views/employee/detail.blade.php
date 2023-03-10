<x-app-layout>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-header">
                        รายระเอียดพนักงาน
                    </div>
                    <div class="card-body">
                        <img src="/images/img04.png" alt="" width="248" class="center" style="display: block;margin-left: auto;margin-right: auto;">
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-2">
                                <p>ชื่อเล่น : </p>
                                <p>ชื่อจริง : </p>
                                <p>แผนก : </p>
                            </div>
                            <div class="col-md-auto">
                                <p>{{$emp->nick_name}}</p>
                                <p>{{$emp->name}}</p>
                                <p>{{$emp->department->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-header">
                        รายการทรัพสิน
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">รหัสทรัพสิน</th>
                                        <th scope="col">ประเภท</th>
                                        <th scope="col">วันที่ใช้</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($regis as $row)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><a href="{{route('registration_detail',['id'=>$row->id])}}" style="text-decoration: none">{{$row->property_key->key}}{{$row->property_code}}</a></td>
                                        <td>{{$row->type}}</td>
                                        <td>
                                            <?php
                                            try {
                                                echo $row->regislog->created_at->format('d/m/Y');
                                            } catch (\Exception $e) {
                                                echo 'ยังไม่มีการบันทึก';
                                            }

                                            ?>
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-3">
            <div class="card">
                <div class="card-header">
                    ประวัติการแจ้งซ่อม
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">รหัสทรัพสิน</th>
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
                                    <td><a href="{{route('registration_detail',['id'=>$row->regis->id])}}">{{$row->regis->property_key->key}}{{$row->regis->property_code}}</a></td>
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
</x-app-layout>