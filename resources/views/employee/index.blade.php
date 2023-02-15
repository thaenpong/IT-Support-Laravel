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
                                            <td><a class="btn btn-primary" href="">Edit</a></td>
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
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="input-group my-3 has-validation">
                                    <label class="input-group-text" for="nickname">Nick Name</label>
                                    <input type="text" class="form-control" name="nick_name">
                                </div>
                                <div class="input-group my-3 has-validation">
                                    <label class="input-group-text" for="Department">Department</label>
                                    <select name="department_id" class="form-select" id="Department">
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
                            Department
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
                                            <td>{{$i++}}</td>
                                            <td>{{$row->name}}</td>
                                            <td></td>
                                            <td><a class="btn btn-primary disabled" href="">Edit</a>
                                                <a class="btn btn-warning disabled
                                                
                                                " href="{{ route('department_delete', ['id' => $row->id]) }}">Delete</a>
                                            </td>
                                        </tr>
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
                                    <input type="text" class="form-control" name="name">
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