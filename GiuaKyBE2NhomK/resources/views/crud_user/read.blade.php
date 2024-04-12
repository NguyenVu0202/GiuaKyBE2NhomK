@extends('dashboard')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">

            <div class="card">
                <h3 class="card-header text-center">Màn hình chi tiết</h3>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>ID</span></div>
                            <div class="col-md-3">{{ $user->id }}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Username</span></div>
                            <div class="col-md-3">{{ $user->name }}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Email</span></div>
                            <div class="col-md-3">{{ $user->email}}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Name Image</span></div>
                            <div class="col-md-3">{{ $user->image}}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row btn_edit">
                            <div class="col-md-8"></div>
                            <div class="col-md-2">
                                <div class="d-grid mx-auto">
                                    <a href="{{ route('user.UpdatetUser', ['id' => $user->id]) }}" class="btn btn-primary btn-block">Chỉnh sửa</a>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection