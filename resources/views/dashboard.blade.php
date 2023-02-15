<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div id="map">
                    <div class="text-center my-5">

                        <h1><b>IT Support </b></h1>
                    </div>
                    <div class="form-group row my-3 justify-content-center">

                        <div class="card text-center col-md-4 my-3" style="height: 24rem;">
                            <a href="{{route('registration',['key' => 'all'])}}">
                                <img src=" {{ URl('images/f01.png') }}" class="card-img-top">
                                <div class="card-body ">
                                    <h5 class="card-title position-absolute bottom-0 start-50 translate-middle-x my-3">ทะเบียนคอมพิวเตอร์และอุปกรณ์ต่อพ่วง</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-1">

                        </div>
                        <div class="card text-center col-md-4 my-3" style="height: 24rem;">
                            <a href="{{ route('employee') }}" class="text-decoration-none">
                                <img src="{{ URl('images/f02.png') }}" class="card-img-top">
                                <div class="card-body ">
                                    <h5 class="card-title position-absolute bottom-0 start-50 translate-middle-x my-3">พนักงานและแผนก</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>