@extends('admin.layouts.app')
@section('title', 'Categories')
@section('content')

    <div class="card">
        <div class="row">

            <h1>Categories List</h1>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                    {{ session('message') }}

                </div>
            @endif
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('categories.create') }}"> Create category</a>

            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Parent Name</th>
                    <th>action</th>
                </tr>
                <?php $i = 1; ?>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent_name }}</td>

                        <td><a href=" {{ route('categories.edit', $category->id) }}" class="btn btn-warning">edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" style="display: inline;"
                                id="form-delete{{ $category->id }}" method="post">
                                @csrf
                                @method('delete')

                            </form>
                            <button class="btn btn-delete btn-danger" data-id={{ $category->id }}>Delete</button>




                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $categories->links() }}
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    </div>
@endsection
