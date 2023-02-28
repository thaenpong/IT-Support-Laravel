<x-app-layout>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
    <div class="py-8">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    รายระเอียด {{$registration->property_key->key}} {{$registration->property_code}}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <center>
                                <img src="{{url('images/img03.png')}}" width="400" alt="">
                            </center>
                        </div>
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="nick_name">ผู้ใช้ : </label>
                                        {{$registration->employee->name}} {{$registration->employee->nick_name}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">

                            </div>

                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-4 py-2">

                                หมวด :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->property_key->key}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">

                                รหัส :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->property_code}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">

                                หมายเลขซีเรียล :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->serial_number}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">

                                รุ่น :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->brand}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">

                                ประเภท :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->type}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                สเปค :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->spec}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                สี :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->color}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                หมายเหตุ :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->refer}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                วันที่ลงทะเบียน :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->created_at->format('d/m/Y')}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                ลงทะเบียนโดย :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->admin->name}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-md-4 py-2">
                                สถานะ :
                            </div>
                            <span class="col-md-6 py-2">
                                @if($registration->deleted_at == null)
                                <p class="text-success">ใช้งาน</p>
                                @else
                                <div class="text-danger"> ถอดถอนแล้ว <br>
                                    {{Carbon\Carbon::parse($registration->unregis->created_at)->format('d-m-Y')}}
                                </div>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                สาเหตุ :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->unregis->cause}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                ถอดถอนโดย :
                            </div>
                            <span class="col-6 py-2">
                                {{$registration->unregis->user->name}}
                            </span>
                        </div>
                        @endif
                        @if($registration->deleted_at == null)
                        <a class="btn btn-warning mb-3" href="{{route('registration_edit',['id' => $registration->id])}}">Edit</a>
                        <!--   <a class="btn btn-danger mb-3" href="{{route('registration_unregis',['id' => $registration->id])}}">Unregis</a> 
-->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#unregis">
                            Unregis
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="unregis" tabindex="-1" aria-labelledby="unregisLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="unregisLabel">Unregistration</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('registration_unregis',['id'=>$registration->id])}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="refer" class="form-label">Cuase Unregistration</label>
                                                <input type="text" class="form-control" id="refer" name="refer" placeholder="" require>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary btn-danger">Unregis</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-secondary mb-3 " href="{{ url()->previous() }}">Back</a>

                        @else
                        <a class="btn btn-info mb-3 " href="{{ route('unregistration',['key' => 'all']) }}">Back</a>
                        <a class="btn btn-primary mb-3" href="{{route('unregispdf',['id'=> $registration->id])}}" target="_blank">Download</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>