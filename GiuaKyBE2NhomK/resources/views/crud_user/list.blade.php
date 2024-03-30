@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <th>01</th>
                                <th>NguyenVu</th>
                                <th>nhieucon2014ncvn@gmail.com</th>
                                <th>
                                    <a href="">View</a> |
                                    <a href="">Edit</a> |
                                    <a href="">Delete</a>
                                </th>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
