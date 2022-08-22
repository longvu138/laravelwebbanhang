@extends('admin.layouts.app')
@section('title', 'Roles add')
@section('content')

    <div class="card">
        <div class="row">

            <h1>Role List</h1>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                    {{ session('message') }}

                </div>
            @endif
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('roles.create') }}"> Create Role</a>

            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>DisplayName</th>
                    <th>action</th>
                </tr>
                <?php $i = 1; ?>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td><a href="
                            {{ route('roles.edit', $role->id) }}"
                                class="btn btn-warning">edit</a>

                            <form style="display: inline" action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">delete</button>

                            </form>

                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $roles->links() }}
        </div>

    </div>
@endsection
