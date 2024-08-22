@extends('layouts.portal')

@section('content')
<div class="container">
    @if(Auth::user()->role_id == 1)
        <h1>Users List</h1>

        @if ($users->isEmpty())
            <p>No users found.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->user_id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <!-- Dropdown Menu for Actions -->
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $user->user_id }}" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $user->user_id }}">
                                        <li><a class="dropdown-item" href="/admin/users/{{ $user->user_id }}/edit">Edit</a></li>
                                        <li>
                                            <form action="/admin/users/{{ $user->user_id }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Delete</button>
                                            </form>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('admin.loginAsUser', $user->user_id) }}">Login as {{ $user->name }}</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @else
        <h1>Unauthorized Access</h1>
        <p>You do not have permission to view this page.</p>
    @endif
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownButtons = document.querySelectorAll('.dropdown-toggle');
        dropdownButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                var dropdownMenu = this.nextElementSibling;
                dropdownMenu.classList.toggle('show');
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            var openDropdowns = document.querySelectorAll('.dropdown-menu.show');
            openDropdowns.forEach(function(menu) {
                if (!menu.parentElement.contains(e.target)) {
                    menu.classList.remove('show');
                }
            });
        });
    });
</script>
@endsection
