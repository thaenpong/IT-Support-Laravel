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
                รายการใหม่
            </div>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">รหัสทรัพสิน</th>
                            <th scope="col">รายระเอียด</th>
                            <th scope="col">ผู้แจ้ง</th>
                            <th scope="col">วันที่</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($data as $row)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td><a href="{{route('registration_detail',['id'=>$row->regis->id])}}">{{$row->regis->property_key->key}}{{$row->regis->property_code}}</a></td>
                            <td>{{$row->emp_behave}}</td>
                            <td><a href="{{route('employee_detail',['id'=>$row->emp->id])}}">{{$row->emp->name}}</a></td>
                            <td>{{$row->created_at->format('d/m/Y')}}</td>
                            <td>
                                <a href="{{route('repair_detail',['id'=>$row->id])}}"><span class="material-symbols-outlined">
                                        visibility
                                    </span></a>&emsp;
                                <a href="{{route('repair_accept',['id'=>$row->id])}}"><span class="material-symbols-outlined">
                                        how_to_reg
                                    </span></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>