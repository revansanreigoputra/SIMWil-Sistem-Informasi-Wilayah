@extends('layouts.master')

@section('title', 'Data User')

@section('action')
    @can('user.create')
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDataModal">Tambah Data</button>
        @include('pages.user.modal-create')
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="categories-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>No. Telp</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email ?? '-' }}</td>
                                <td>{{ $user->address ?? '-' }}</td>
                                <td>{!! $user->roles[0]->name === 'adminkabupaten'
                                    ? '<span class="badge bg-green text-green-fg">Admin Kabupaten</span>'
                                    : '<span class="badge bg-azure text-azure-fg">Admin Desa</span>' !!}</td>
                                <td>
                                    @canany(['user.update', 'user.delete'])
                                        @can('user.update')
                                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editModal-{{ $user->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                                Edit
                                            </button>

                                            @include('pages.user.modal-edit')
                                        @endcan
                                        @can('user.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-user-{{ $user->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg>
                                                Hapus
                                            </button>

                                            <x-modal.delete-confirm id="delete-user-{{ $user->id }}" :route="route('user.destroy', $user->id)"
                                                item="{{ $user->name }}" title="Hapus user?"
                                                description="user yang dihapus tidak bisa dikembalikan." />
                                        @endcan
                                    @else
                                        <span class="text-muted">Tidak ada aksi</span>
                                    @endcanany
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
