@extends('layouts.adminLte')
@section('content')
    <div class="container-fluid my-3">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card ">
                    <div class="card-header bg-light">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <h3 class="card-title">User</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered bg-secondary">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th style="width: 150px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td>
                                            @if ($user['is_aktif'])
                                                <a href="/user42/{{ $user['id'] }}"
                                                    class="btn btn-success btn-block">detail</a>
                                            @else
                                                <form action="/user42/{{ $user['id'] }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="btn btn-success btn-block">
                                                        Accept
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
