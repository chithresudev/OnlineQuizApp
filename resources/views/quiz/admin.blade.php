@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Admin Dashboard
                    <a href="{{ route('pdf') }}" target="_blank"
                    class="btn btn-danger btn-sm float-right">Download PDF</a>
                </div>

                <div class="card-body p-0">
                <table class="table table-bordered table-striped mb-0 text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Attend Questions</th>
                            <th>Duration</th>
                            <th>Score</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                       <tr>
                           <td> {{ $loop->iteration }}</td>
                           <td> {{ ucwords($user->name) }}</td>
                           <td> {{ $user->email }}</td>
                           <td> {{ $user->phone }}</td>
                           <td> {{ $user->answers->count() }}</td>
                           <td>
                             @isset($user->userTest->duration)
                               <span class="badge badge-success">
                               {{ $user->userTest->duration }}
                             </span>
                             @endisset
                         </td>
                           <td>
                             <span class="badge {{ $user->isTested() ? 'badge-success' : 'badge-danger' }}">
                             {{ $user->isTested() ? 'Test Completed' : 'Test Not Completed' }}
                           </td>
                           <td>{{ $user->score }}</td>
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
