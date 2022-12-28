@extends('layouts.adminLte')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center mb-4">
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
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
                        <div class="card-header">
                            <h3 class="card-title">Bordered Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr class="text-center">
                                    <th colspan="2"><img src="/img/{{ $user['foto'] }}" alt="error" width="200px"
                                            class="rounded-circle"></th>
                                </tr>
                                <tr>
                                    <th style="width: 50%">Nama lengkap</th>
                                    <td style="width: 50%">{{ $user['name'] }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user['email'] }}</td>
                                </tr>
                                @if ($user['detail_data'] == null)
                                    <tr>
                                        <th colspan="3" class="text-center">
                                            <i>
                                                <p>USER BELUM MELENGKAPI DATA</p>
                                            </i>
                                        </th>
                                    </tr>
                                @else
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $user['detail_data']['alamat'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Agama</th>
                                        <td>{{ $user['agama']['nama_agama'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Umur</th>
                                        <td>{{ $user['detail_data']['umur'] }} tahun</td>
                                    </tr>
                                    <tr>
                                        <th>Foto KTP</th>
                                        <td><img src="/img/{{ $user['detail_data']['foto_ktp'] }}"
                                                alt="{{ $user['detail_data']['foto_ktp'] }}" width="100px"></td>
                                    </tr>
                                @endif

                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <form action="/user42/{{ $user['id'] }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
