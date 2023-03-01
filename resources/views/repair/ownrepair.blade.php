<x-app-layout>
    <div class="container">
        <div class="row">

            <div class="col-md-2 py-2">
                <a href="{{route('repair')}}" class="form-control btn btn-success">งานใหม่</a>

            </div>
            <div class="col-md-2 py-2">
                <a href="{{route('ownrepair')}}" class="form-control btn btn-primary">รับงานแล้ว</a>

            </div>
            <div class="col-md-2 py-2">
                <a href="{{route('allrepair')}}" class="form-control btn btn-secondary">ทั้งหมด</a>
            </div>
        </div>

        <div class="card my-3">
            <div class="card-header">
                รายการที่รับมอบหมาย
            </div>
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">รหัสทรัพสิน</th>
                            <th scope="col">รายระเอียด</th>
                            <th scope="col">ผู้แจ้ง</th>
                            <th scope="col">วันที่</th>
                            <th scope="col">วันที่รับ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($data as $row)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$row->regis->property_key->key}}{{$row->regis->property_code}}</td>
                            <td>{{$row->emp_behave}}</td>
                            <td>{{$row->emp->name}}</td>
                            <td>{{$row->created_at->format('d/m/Y')}}</td>
                            <td>{{Carbon\Carbon::parse($row->admin_date)->format('d/m/Y')}}</td>
                            <td>
                                <a href="{{route('repair_detail',['id'=>$row->id])}}"><span class="material-symbols-outlined">
                                        visibility
                                    </span></a>&emsp;
                                <span class="material-symbols-outlined" data-bs-toggle="modal" data-bs-target="#done{{$row->id}}">
                                    check_circle
                                </span>
                            </td>

                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="done{{$row->id}}" tabindex="-1" aria-labelledby="unregisLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="unregisLabel">ปิดงานซ่อม {{$row->regis->property_key->key}}{{$row->regis->property_code}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('donerepair',['id'=>$row->id])}}" method="post">
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
                                                <textarea class="form-control" placeholder="" require name="admin_behave" id="" cols="30" rows="3"></textarea>
                                            </div>
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                <button type="submit" class="btn btn-primary btn-danger">ปิดงาน</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</x-app-layout>