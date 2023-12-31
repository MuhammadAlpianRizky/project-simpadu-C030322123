@extends('layouts.app')

@section('title', 'Users')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Schedule</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Schedule</a></div>
                    <div class="breadcrumb-item">All Schedule</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Schedule</h4>
                                <div class="section-header-button">
                                    <a href="{{ route('Schedule.create') }}" class="btn btn-primary">New Schedule</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET", action="{{ route('Schedule.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>id</th>
                                            <th>student_id</th>
                                            <th>schedule_type</th>
                                            <th>Created At</th>
                                            <th>hari</th>
                                            <th>jam_mulai</th>
                                            <th>jam_selesai</th>
                                            <th>ruangan</th>
                                            <th>kode_absensi</th>
                                            <th>tahun_akademik</th>
                                            <th>semester</th>
                                            <th>Created by</th>
                                            <th>update_by </th>
                                            <th>delete_by</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    {{ $user->student_id }}
                                                </td>
                                                <td>
                                                    {{ $user->subject_id }}
                                                </td>
                                                <td>
                                                    {{ $user->schedule_type }}
                                                </td>
                                                <td>
                                                    {{ $user->created_at }}
                                                </td>
                                                <td>
                                                    {{ $user->hari }}
                                                </td>
                                                <td>
                                                    {{ $user->jam_mulai}}
                                                </td>
                                                <td>
                                                    {{ $user->jam_selesai }}
                                                </td>
                                                <td>
                                                    {{ $user->ruangan }}
                                                </td>
                                                <td>
                                                    {{ $user->kode_absensi }}
                                                </td>
                                                <td>
                                                    {{ $user->tahun_akademik}}
                                                </td>
                                                <td>
                                                    {{ $user->semester }}
                                                </td>
                                                <td>
                                                    {{ $user->created_by }}
                                                </td>
                                                <td>
                                                    {{ $user->update_by }}
                                                </td>
                                                <td>
                                                    {{ $user->delete_by}}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('Schedule.edit', $user->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                            class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $users->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
