@extends('admin.layouts.app')
@section('title', 'Roles')
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

                            <form action="{{ route('roles.destroy', $role->id) }}" style="display: inline;"
                                id="form-delete{{ $role->id }}" method="post">
                                @csrf
                                @method('delete')

                            </form>
                            <button class="btn btn-delete btn-danger" data-id={{ $role->id }}>Delete</button>

                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $roles->links() }}
        </div>

    </div>
@endsection
