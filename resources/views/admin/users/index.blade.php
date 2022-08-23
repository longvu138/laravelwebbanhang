@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')

    <div class="card">
        <div class="row">

            <h1>User List</h1>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                    {{ session('message') }}

                </div>
            @endif
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('users.create') }}"> Create user</a>

            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>action</th>
                </tr>
                <?php $i = 1; ?>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td><img src="{{ $user->images->count() > 0 ? asset('upload/' . $user->images->first()->url) : 'upload/default.png' }}"
                                width="200px" height="200px" alt=""></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td><a href="
                            {{ route('users.edit', $user->id) }}"
                                class="btn btn-warning">edit</a>

                            <form style="display: inline" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">delete</button>

                            </form>

                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $users->links() }}
        </div>

    </div>
@endsection
