<x-app-layout>
    <style>
        #err {
            border-radius: 10px;
            background-color: #FF7A7A;
            width: 50%;
            color: white;
            margin: auto;
        }
    </style>

    <div class="py-8">
        @if($err == '2')
        <div class="row py-3">
            <div class="d-flex justify-content-center" id="err">
                <h4 class="">ข้อมูลไม่ถูกต้อง</h4>
            </div>
        </div>
        @endif
        <div class="container">
            <form action="{{route('registration_swap_post')}}" method="post">
                @csrf
                <div class="row py-8">
                    <div class="col-md-5">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="pro_label01">รหัสทรัพย์สิน</span>
                            </div>
                            <input list="property01" class="form-control" name="property01" placeholder="รหัสทรัพย์สิน" required oninput="this.value = this.value.toUpperCase()">
                            <datalist id="property01">
                                @foreach($data as $row)
                                <option value="{{$row->property_key->key}}{{$row->property_code}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center py-2">
                        <span class="material-symbols-outlined">
                            sync_alt
                        </span>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="pro_label02">รหัสทรัพย์สิน</span>
                            </div>
                            <input list="property02" class="form-control" name="property02" placeholder="รหัสทรัพย์สิน" required oninput="this.value = this.value.toUpperCase()">
                            <datalist id="property02">
                                @foreach($data as $row)
                                <option value="{{$row->property_key->key}}{{$row->property_code}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="d-flex justify-content-center">
                        @if($err == '2')
                        <h1 class="text-danger"></h1>
                        @endif
                        <input type="submit" value="บันทึก" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>