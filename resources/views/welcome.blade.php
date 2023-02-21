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
        $("#registration_search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#registration tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
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
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-header">
                        รายระเอียด
                    </div>
                    <div class="card-body">

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
                                        <td scope="col">รหัสทรัพสิน</td>
                                        <td scope="col">ประเภท</td>
                                        <td scope="col">หมายเหตุ</td>
                                    </tr>
                                </thead>
                                <tbody id="registration">
                                    <tr>
                                        <td><input type="radio" name="id" id="id"></td>
                                        <td scope="col"><label for="id">1</label></td>
                                        <td><label for="id">Cs.65.01</label></td>
                                        <td><label for="id">Server</label></td>
                                        <td hidden><label for="id" hidden>Edge</label></td>
                                        <td><label for="id">Server</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="id" id="id2"></td>
                                        <td scope="col"><label for="id2">2</label></td>
                                        <td><label for="id2">ms.61.01</label></td>
                                        <td><label for="id2">Server</label></td>
                                        <td><label for="id2">Chrome</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="id" id="id3"></td>
                                        <td scope="col"><label for="id3">3</label></td>
                                        <td><label for="id3">kb.53.05</label></td>
                                        <td><label for="id3">Server</label></td>
                                        <td><label for="id3">Chrome</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="id" id="id2"></td>
                                        <td scope="col"><label for="id2">2</label></td>
                                        <td><label for="id2">ms.61.01</label></td>
                                        <td><label for="id2">Server</label></td>
                                        <td><label for="id2">Chrome</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="id" id="id3"></td>
                                        <td scope="col"><label for="id3">3</label></td>
                                        <td><label for="id3">kb.53.05</label></td>
                                        <td><label for="id3">Server</label></td>
                                        <td><label for="id3">Chrome</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="id" id="id"></td>
                                        <td scope="col"><label for="id">1</label></td>
                                        <td><label for="id">Cs.65.01</label></td>
                                        <td><label for="id">Server</label></td>
                                        <td hidden><label for="id" hidden>Edge</label></td>
                                        <td><label for="id">Server</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="id" id="id2"></td>
                                        <td scope="col"><label for="id2">2</label></td>
                                        <td><label for="id2">ms.61.01</label></td>
                                        <td><label for="id2">Server</label></td>
                                        <td><label for="id2">Chrome</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="id" id="id3"></td>
                                        <td scope="col"><label for="id3">3</label></td>
                                        <td><label for="id3">kb.53.05</label></td>
                                        <td><label for="id3">Server</label></td>
                                        <td><label for="id3">Chrome</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="id" id="id2"></td>
                                        <td scope="col"><label for="id2">2</label></td>
                                        <td><label for="id2">ms.61.01</label></td>
                                        <td><label for="id2">Server</label></td>
                                        <td><label for="id2">Chrome</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="id" id="id3"></td>
                                        <td scope="col"><label for="id3">3</label></td>
                                        <td><label for="id3">kb.53.05</label></td>
                                        <td><label for="id3">Server</label></td>
                                        <td><label for="id3">Chrome</label></td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <div class="container">

        <div class="row">
            <form action="" method="post">
                <div class="col-md-5">
                    <label for="emp_name" class="form-label">ชื่อ</label>
                    <input list="browsers" name="browser" id="registration_search" class="form-control">
                    <datalist id="browsers">
                        <option value="Edge">
                        <option value="Firefox">
                        <option value="Chrome">
                        <option value="Opera">
                        <option value="Safari">
                    </datalist>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col"></td>
                                <td scope="col">#</td>
                                <td scope="col">รหัสทรัพสิน</td>
                                <td scope="col">ประเภท</td>
                                <td scope="col">หมายเหตุ</td>
                            </tr>
                        </thead>
                        <tbody id="registration">
                            <tr>
                                <td><input type="radio" name="id" id="id"></td>
                                <td scope="col"><label for="id">1</label></td>
                                <td><label for="id">Cs.65.01</label></td>
                                <td><label for="id">Server</label></td>
                                <td hidden><label for="id" hidden>Edge</label></td>
                                <td><label for="id">Server</label></td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="id" id="id2"></td>
                                <td scope="col"><label for="id2">2</label></td>
                                <td><label for="id2">ms.61.01</label></td>
                                <td><label for="id2">Server</label></td>
                                <td><label for="id2">Chrome</label></td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="id" id="id3"></td>
                                <td scope="col"><label for="id3">3</label></td>
                                <td><label for="id3">kb.53.05</label></td>
                                <td><label for="id3">Server</label></td>
                                <td><label for="id3">Chrome</label></td>
                            </tr>
                        </tbody>

                    </table>

                </div>
            </form>
        </div>

    </div>

</body>
<script type="text/javascript">
    function handleSelect(elm) {
        window.location = elm.value;
    }
</script>

</html>