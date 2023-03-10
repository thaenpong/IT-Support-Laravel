<x-app-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <div class="py-3">
        <div class="container">
            <script>
                $(document).ready(function() {
                    $("#registration_search").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#registration tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>
            <div class="row">
                <div class="col-md-4">
                    <form action="" method="post">
                        <div class="input-group mb-3 py-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">ค้นหา</span>
                            </div>

                            <select name="property_key" id="property_key" class="form-control" onchange="javascript:handleSelect(this)">

                                @foreach($property_defualt as $row)
                                <option selected="selected" value="{{route('registration',['key' => $row->id])}}">
                                    {{$row->name}}
                                </option>


                                @endforeach


                                <option value="{{route('registration',['key' => 'all'])}}">ทั้งหมด</option>
                                @foreach($property_key as $row)
                                <option value="{{route('registration',['key' => $row->id])}}">{{$row->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 py-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary col-md-12" data-bs-toggle="modal" data-bs-target="#newcode" id="modalbut">
                        เพิ่มหมวดใหม่
                    </button>
                </div>
                <div class="col-md-2 py-2">
                    <a href="{{route('registration_export')}}" class="form-control btn btn-primary">รายงาน</a>

                </div>
                <div class="col-md-2 py-2">
                    <a href="{{route('registration_new')}}" class="form-control btn btn-success">ลงทะเบียน</a>

                </div>
                <div class="col-md-2 py-2">
                    <a href="{{route('unregistration',['key' =>'all'])}}" class="form-control btn btn-danger">ถอดถอนแล้ว</a>
                </div>
            </div>

            <div class="row">
                <div class="card my-3">
                    <div class="card-header">
                        ทะเบียนคอมพิวเตอร์ และ อุปกรณ์ต่อพ่วง
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <div class="col-md-2 pb-3">
                                    <input id="registration_search" type="text" placeholder="Search.." class="form-control">
                                </div>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">หรัสทรัพสิน</th>
                                        <th scope="col">ประเภท</th>
                                        <th scope="col">แผนก</th>
                                        <th scope="col">ผู้ใช้</th>
                                        <th scope="col">วันทึ่ลงทะเบียน</th>
                                        <th scope="col">หมายเหตุ</th>
                                        <!--<th scope="col">Edit</th>
                                    <th scope="col">UnRegitor</th>-->
                                    </tr>
                                </thead>
                                <tbody id="registration">
                                    @php($i=1)
                                    @foreach($registration as $row)
                                    <tr>
                                        <td class="">{{$i++}}</td>
                                        <td> <a href="{{route('registration_detail',['id' => $row->id])}}" style="text-decoration: none">{{$row->property_key->key}}{{$row->property_code}}</a></td>
                                        <td>{{$row->type}}</td>
                                        <td>{{$row->employee->department->name}}</td>
                                        <td><a href="{{route('employee_detail',['id' => $row->employee->id])}}" style="text-decoration: none">{{$row->employee->name}} ({{$row->employee->nick_name}})</a></td>
                                        <td>{{$row->created_at->format('d/m/Y')}}</td>
                                        <td>{{$row->refer}}</td>
                                        <!--<td><a href="{{route('registration_edit',['id' => $row->id])}}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{route('registration_unregistration',['id' => $row->id])}}" class="btn btn-danger">unregistration</a></td> -->
                                    </tr>

                                    @endforeach

                                </tbody>

                            </table>

                            <div class="table-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="newcode" tabindex="-1" aria-labelledby="newcode" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newcode">เพิ่มหมวดใหม่</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('property_new')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="key" class="form-label pt-1">ตัวอักษรย่อ</label>
                                    <input type="text" class="form-control pb-1" id="key" name="key" placeholder="" require>
                                    <label for="name" class="form-label pt-1">ชื่อ</label>
                                    <input type="text" class="form-control pb-1" id="refer" name="name" placeholder="" require>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary btn-primary">บันทึก</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function handleSelect(elm) {
                window.location = elm.value;
            }
        </script>
</x-app-layout>