@extends('admin.layouts.app')
@section('title', 'Edit Role ' . $role->name)
@section('content')
    <div class="card">
        <h1>Edit Role</h1>

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="input-group input-group-static mb-4">
                <label>Name</label>
                <input type="text" value="{{ old('name') ?? $role->name }}" name="name" class="form-control">

                @error('name')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label>Display Name</label>
                <input type="text" value="{{ old('display_name') ?? $role->display_name }}" name="display_name"
                    class="form-control">
                @error('display_name')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label name="group" class="ms-0">Group</label>
                <select name="group" class="form-control">
                    <option {{ $role->group === 'user' ? 'selected' : '' }} value="user">User</option>
                    <option {{ $role->group === 'system' ? 'selected' : '' }} value="system">System</option>

                </select>


                </select>

                @error('group')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="">Permission</label>
                <div class="row">
                    @foreach ($permissions as $groupName => $permission)
                        <div class="col-4">
                            <h4>{{ $groupName }}</h4>

                            <div>
                                @foreach ($permission as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" name="permission_ids[]" type="checkbox"
                                            {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
                                            value="{{ $item->id }}">
                                        <label class="custom-control-label"
                                            for="customCheck1">{{ $item->display_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('permission_ids[]')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-submit btn-primary">Submit</button>

        </form>
    </div>
@endsection
