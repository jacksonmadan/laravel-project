@extends('layouts.portal')

@section('content')
<div class="container">
    <h1>Edit User</h1>

    <form action="{{ url('/admin/users/' . $user->user_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
       
        <!-- Add other fields as needed -->

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection
