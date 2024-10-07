@extends('home')

@section("center")
@if(!empty(session('error')))    
        <div class="alert alert-danger w-50 m-auto">{{ session('error')}}</div>
@endif


<div class="login-page bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <h3 class="mb-3">整合式後台管理介面</h3>
                <div class="bg-white shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-0">
                            <div class="form-left h-100 py-5 px-5">
                                <form action="../public/login" method="POST" class="row g-4">
                                @csrf
                                        <div class="col-12">
                                            <label>Username<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="text" name="acc" id="acc" class="form-control" placeholder="Enter Username">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                <input type="password" name="pw" id="pw" class="form-control" placeholder="Enter Password">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary px-4 float-end mt-4">登入</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 ps-0 d-none d-md-block">
                            <div class="form-right h-100 bg-light text-white text-center p-5">
                                
                                <img src="{{asset('storage/images/logo.png')}}" alt="AverMedia" class="img-fluid" >
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-end text-secondary mt-3"> </p>
            </div>
        </div>
    </div>
</div>


@endsection

@section("script")
<script>
$("#acc").val('');
$("#pw").val('');
</script>
@endsection