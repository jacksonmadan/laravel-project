@extends('layouts.portal')

@section('content')
<div class="container">
@if(Auth::user()->role_id == 1)
    <h1>Partners List</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if($partners->isEmpty())
        <p>No partners found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Status</th>
                   <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partners as $partner)
                    <tr>
                        <td>{{ $partner->id }}</td>
                        <td>{{ $partner->user_id }}</td>
                        <td>{{ $partner->first_name }}</td>
                        <td>{{ $partner->last_name }}</td>
                        <td>{{ $partner->email }}</td>
                        <td>{{ $partner->status }}</td>
                      <td>
    <div style="display: flex; gap: 10px;">
        @if($partner->status == 'approved')
            <span class="btn btn-success btn-sm" style="padding: 5px 10px; font-size: 0.875rem;">Approved</span>
        @elseif($partner->status == 'declined')
            <span class="btn btn-danger btn-sm" style="padding: 5px 10px; font-size: 0.875rem;">Declined</span>
        @else
            <form method="POST" action="{{ route('admin.approve', ['user_id' => $partner->user_id]) }}">
                @csrf
                <button type="submit" class="btn btn-success btn-sm" style="padding: 5px 10px; font-size: 0.875rem;">Approve</button>
            </form>
            <form method="POST" action="{{ route('admin.decline', ['user_id' => $partner->user_id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" style="padding: 5px 10px; font-size: 0.875rem;">Decline</button>
            </form>
        @endif
    </div>
</td>



                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@else
        <h1>Unauthorized Access</h1>
        <p>You do not have permission to view this page.</p>
    @endif
@endsection
