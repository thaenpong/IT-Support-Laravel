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
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">ค้นหา</span>
                            </div>

                            <select name="property_key" id="property_key" class="form-control" onchange="javascript:handleSelect(this)">

                                @foreach($property_defualt as $row)
                                <option selected="selected" value="{{route('registration',['key' => $row->id])}}">
                                    {{$row->name}}
                                </option>


                                @endforeach


                                <option value="{{route('unregistration',['key' => 'all'])}}">ทั้งหมด</option>
                                @foreach($property_key as $row)
                                <option value="{{route('unregistration',['key' => $row->id])}}">{{$row->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">

                </div>
                <div class="col-md-2">
                    <a href="{{ url()->previous() }}" class="form-control btn btn-secondary">ย้อนกลับ</a>
                </div>
            </div>

            <div class="row">
                <div class="card my-3">
                    <div class="card-header">
                        อุปกรณ์ที่ถอดถอนแล้ว
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
                                        <th scope="col">รุ่น</th>
                                        <th scope="col">แผนก</th>
                                        <th scope="col">ผู้ใช้</th>
                                        <th scope="col">วันที่เข้าระบบ</th>
                                        <th scope="col">หมายเหตุ</th>
                                        <!--<th scope="col">Edit</th>
                                    <th scope="col">UnRegitor</th>-->
                                    </tr>
                                </thead>
                                <tbody id="registration">
                                    @php($i=1)
                                    @foreach($registration as $row)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td> <a href="{{route('registration_detail',['id' => $row->id])}}" style="text-decoration: none" class="link-danger">{{$row->property_key->key}}{{$row->property_code}}</a></td>
                                        <td>{{$row->type}}</td>
                                        <td>{{$row->employee->department->name}}</td>
                                        <td><a href="" style="text-decoration: none" class="link-danger">{{$row->employee->name}} ({{$row->employee->nick_name}}) </a></td>
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
            <script type="text/javascript">
                function handleSelect(elm) {
                    window.location = elm.value;
                }
            </script>
</x-app-layout>