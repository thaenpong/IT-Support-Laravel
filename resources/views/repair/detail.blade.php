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
                    รายระเอียด
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <center>
                                <img class="my-3" src="{{url('images/repair_detail.jpg')}}" width="400" alt="">
                            </center>
                        </div>
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="nick_name">ผู้ใช้ : </label>

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

                                รหัสทรัพสิน :
                            </div>
                            <span class="col-6 py-2">
                                {{$data->regis->property_key->key}}{{$data->regis->property_code}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">

                                วันที่แจ้ง :
                            </div>
                            <span class="col-6 py-2">
                                {{$data->created_at->format('d/m/Y')}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">

                                เวลา :
                            </div>
                            <span class="col-6 py-2">
                                {{$data->created_at->format('h:i')}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">

                                อุปกรณ์ :
                            </div>
                            <span class="col-6 py-2">
                                {{$data->regis->type}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">

                                อาการ :
                            </div>
                            <span class="col-6 py-2">
                                {{$data->emp_behave}}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                ผู้แจ้ง :
                            </div>
                            <span class="col-6 py-2">
                                {{$data->emp->name}}
                            </span>
                        </div>
                        @if($data->deleted_at == null)
                        <div class="row">
                            <div class="col-4 py-2">
                                สถานะ :
                            </div>
                            <span class="col-6 py-2">

                                <div class="text-success"> รับงานแล้ว </div>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 py-2">
                                โดย :
                            </div>
                            <span class="col-6 py-2">
                                {{$data->admin->name}}

                            </span>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-4 py-2">
                                สถานะ :
                            </div>
                            <span class="col-6 py-2">
                                <div class="text-danger"> ปิดงานแล้ว </div>
                            </span>
                        </div>

                        @endif

                        <a class="btn btn-warning mb-3" href="">Edit</a>

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
                                    <form action="" method="post">
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


                        <a class="btn btn-info mb-3 " href="">Back</a>
                        <a class="btn btn-primary mb-3" href="" target="_blank">Download</a>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>