<x-app-layout>
    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card my-3">
                        <div class="card-header">
                            Employee
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Nick Name</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @foreach($employee as $row)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td><a href="{{route('employee_detail',['id' => $row->id])}}" style="text-decoration: none">{{$row->name}}</a></td>
                                            <td><a href="{{route('employee_detail',['id' => $row->id])}}" style="text-decoration: none">{{$row->nick_name}}</a></td>
                                            <td>{{$row->department->name}}</td>
                                            <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#empedit{{$row->id}}">
                                                    แก้ไข
                                                </button></td>
                                            <td>
                                                <?php
                                                if ($row->id == 1) {
                                                    $clss = "btn btn-warning disabled";
                                                } else {
                                                    $clss = "btn btn-warning";
                                                }

                                                ?>
                                                <a class="<?= $clss ?>" href="{{ route('employee_delete', ['id' => $row->id]) }}">Delete</a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="empedit{{$row->id}}" tabindex="-1" aria-labelledby="unregisLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="unregisLabel">แก้ไขข้อมูลพนักงาน </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{route('employee_edit',['id'=>$row->id])}}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="refer" class="form-label">ชื่อจริง</label>
                                                                <input type="text" class="form-control" placeholder="ชื่อแผนก" required name="name" value="{{$row->name}}"></input>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="refer" class="form-label">ชื่อเล่น</label>
                                                                <input type="text" class="form-control" placeholder="ชื่อแผนก" required name="nick_name" value="{{$row->nick_name}}"></input>
                                                            </div>
                                                            <div class="input-group my-3 has-validation">
                                                                <label class="input-group-text" for="Department">Department</label>
                                                                <select name="depart_id" class="form-select" id="Department" required>
                                                                    <option value="{{$row->department_id}}">{{$row->department->name}}</option>
                                                                    @foreach($department_select as $row)
                                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <input type="hidden" name="id" value="{{$row->id}}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                                <button type="submit" class="btn btn-primary btn-warning">บันทึก</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$employee->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card my-3">
                        <div class="card-header">
                            Add new Employee
                        </div>
                        <div class="card-body">
                            <form action="{{route('employee_new')}}" method="post">
                                @csrf
                                <div class="input-group my-3 has-validation">
                                    <label class="input-group-text" for="property_code">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="input-group my-3 has-validation">
                                    <label class="input-group-text" for="nickname">Nick Name</label>
                                    <input type="text" class="form-control" name="nick_name" required>
                                </div>
                                <div class="input-group my-3 has-validation">
                                    <label class="input-group-text" for="Department">Department</label>
                                    <select name="department_id" class="form-select" id="Department" required>
                                        @foreach($department_select as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-3">

                                    <input type="submit" value="Save" class="btn btn-success">

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card my-3">
                        <div class="card-header">
                            แผนก
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php($i=1)
                                        @foreach($department as $row)
                                        <tr>
                                            <td scope="col">{{$i++}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->employeesCount()}}</td>
                                            <td> <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$row->id}}">
                                                    แก้ไข
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="edit{{$row->id}}" tabindex="-1" aria-labelledby="unregisLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="unregisLabel">แก้ไขข้อมูลแผนก </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{route('department_edit',['id'=>$row->id])}}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="refer" class="form-label">ชื่อแผนก</label>
                                                                <input type="text" class="form-control" placeholder="ชื่อแผนก" required name="depart_name" value="{{$row->name}}"></input>
                                                            </div>
                                                            <input type="hidden" name="id" value="{{$row->id}}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                                <button type="submit" class="btn btn-primary btn-warning">บันทึก</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{$department->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card my-3">
                        <div class="card-header">
                            Add new Department
                        </div>
                        <div class="card-body">
                            <form action="{{route('department_new')}}" method="post">
                                @csrf
                                <div class="input-group my-3 has-validation">
                                    <label class="input-group-text" for="property_code">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                @error('name')
                                <span>{{$message}}</span>
                                @enderror
                                <div class="my-3">
                                    <input type="submit" value="Save" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>