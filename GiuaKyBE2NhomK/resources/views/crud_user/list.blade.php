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
                            <th>Phone_Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->email }}</th>
                                <td><img style="width: 70px; height: 70px" src="{{ asset('uploads/userimage/' . $user->phone_image) }}" alt="Phone Image"></td>
                                <th>
                                    <a href="">View</a> |
                                    <a href="{{ route('user.UpdatetUser', ['id' => $user->id]) }}">Edit</a> |
                                    <a href="">Delete</a>
                                </th>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
