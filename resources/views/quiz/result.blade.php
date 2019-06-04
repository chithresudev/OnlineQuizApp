@extends('layouts.app')

@php
  $user = auth()->user();
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body p-0">
                  <table class="table table-striped table-bordered mb-0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <td>{{ ucfirst($user->name) }}</td>
                      </tr>
                      <tr>
                        <th scope="col">Attend Question</th>
                        <td>{{ $user->answers->count() }}</td>
                      </tr>

                      <tr>
                        <th scope="col">Status</th>
                        <td><span class="badge {{ $user->isTested() ? 'badge-success' : 'badge-danger' }}">
                          {{ $user->isTested() ? 'Test Completed' : 'Test Pending' }}</td>
                      </tr>
                      <tr>
                        <th scope="col">Score</th>
                        <td>{{ $user->score }}</td>
                      </tr>
                    </thead>
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
