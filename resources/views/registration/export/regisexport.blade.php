<table>
    <thead>
        <tr>
            <th>ที่</th>
            <th>รหัส</th>
            <th>ซีเรียลนัมเบอร์</th>
            <th>ยี่ห้อ</th>
            <th>ประเภท</th>
            <th>รุ่น</th>
            <th>สี</th>
            <th>แผนก</th>
            <th>วันที่เข้าระบบ</th>
            <th>ใช้งาน</th>
            <th>ยกเลิก</th>
            <th>วันที่ยกเลิกใช้งาน</th>
            <th>อ้างอิง</th>
        </tr>
    </thead>
    {{$i = 1}}
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$row->property_key->key}}{{$row->property_code}}</td>
            <td>{{$row->serial_number}}</td>
            <td>{{$row->brand}}</td>
            <td>{{$row->type}}</td>
            <td>{{$row->spec}}</td>
            <td>{{$row->color}}</td>
            <td>{{$row->employee->department->name}}</td>
            <td>{{$row->created_at->format('d/m/Y')}}</td>
            <td>
                @if($row->deleted_at == null)
                    ✓
                @endif
            </td>
            <td>
                @if($row->deleted_at != null)
                    ✓
                @endif
            </td>
            <td>
                @if($row->deleted_at != null)
                {{$row->deleted_at->format('d/m/Y')}}
                @endif
            </td>
            @if($row->deleted_at != null)
                <td>ถอดถอนแล้ว</td>
            @else
                <td>{{$row->employee->name}}</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>