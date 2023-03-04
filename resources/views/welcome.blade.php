<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT_Support</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>
<script>
    $(document).ready(function() {
        $("#registration_check").on("click", function() {
            if ($('#registration_search').val() != '') {
                var value = $('#registration_search').val().toLowerCase();
                $("#registration tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                $('#registration').show();
            }
        });
    });
</script>
<style>
    .my-custom-scrollbar {
        position: relative;
        height: 300px;
        overflow: auto;
    }

    .table-wrapper-scroll-y {
        display: block;
    }
</style>

<body>
    <form action="" method="post">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{Route('index')}}">IT -Support</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                        </li>

                        @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                        @endif
                        @endauth
                        @endif
                    </ul>
                </div>
        </nav>
    </form>
    <form action="{{route('request_repair')}}" method="post">
        @csrf
        <div class="container">
            <center>
                <h1>แจ้งซ่อมอุปกรณ์ IT</h1>
            </center>
            <div class="row">
                <div class="col-md-6">
                    <div class="card my-3">
                        <div class="card-header">
                            รายระเอียด
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input list="browsers" name="name" id="registration_search" class="form-control" placeholder="ระบุชือ">
                                <datalist id="browsers">
                                    @foreach($emp as $row)
                                    <option value="{{$row->name}}">
                                        @endforeach
                                </datalist>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="registration_check">ค้นหา</button>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <textarea class="form-control" aria-label="With textarea" placeholder="รายระเอียด" name="behave" required></textarea>
                            </div>
                            @if(!empty($err))
                            @if($err == '2')
                            <div>
                                <center>
                                    <p class="text-danger">ข้อมูลไม่ถูกต้อง</p>
                                </center>
                            </div>
                            @else
                            <div>
                                <center>
                                    <p class="text-success">บันทึกข้อมูลสำเร็จ</p>
                                </center>
                            </div>
                            @endif

                            @endif
                            <input type="submit" value="บันทึก" class="form-control btn btn-success">
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card my-3">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col"></td>
                                            <td scope="col">#</td>
                                            <td scope="col">ประเภท</td>
                                            <td scope="col">รหัสท</td>
                                            <td scope="col">ผู้ใช้</td>
                                            <td scope="col">หมายเหตุ</td>
                                        </tr>
                                    </thead>
                                    <tbody id="registration" style="display: none">
                                        @php($i=1)
                                        @foreach($data as $row)
                                        <tr id="data">
                                            <td class="">{{$i++}}</td>
                                            <td><input type="radio" name="res_id" id="res_id{{$row->id}}" value="{{$row->id}}" required></td>
                                            <td><label for="res_id{{$row->id}}">{{$row->type}}</label></td>
                                            <td> {{$row->property_key->key}}{{$row->property_code}}</td>


                                            <td>{{$row->employee->name}}</td>

                                            <td>{{$row->refer}}</td>
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
    </form>
    <div class="container">
        <hr>
        <div class="table-responsive">
            <div class="card my-3">
                <div class="card-header">
                    รายการซ่อม
                </div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">รหัสทรัพสิน</th>
                            <th scope="col">รายระเอียด</th>
                            <th scope="col">ผู้แจ้ง</th>
                            <th scope="col">วันที่</th>
                            <th scope="col">รับงาน</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($repair as $row)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$row->regis->property_key->key}}{{$row->regis->property_code}}</td>
                            <td>{{$row->emp_behave}}</td>
                            <td>{{$row->emp->name}}</td>
                            <td>{{$row->created_at->format('d/m/Y')}}</td>
                            @if($row->st == '1')
                            <td class="text-primary">ยังไม่รับงาน</td>
                            @elseif($row->st == '2')
                            <td class="text-success">{{$row->admin->name}}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</body>
<script type="text/javascript">
    function handleSelect(elm) {
        window.location = elm.value;
    }
</script>

</html>