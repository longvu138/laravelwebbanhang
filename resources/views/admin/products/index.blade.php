@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')

    <div class="card">
        <div class="row">

            <h1>product List</h1>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                    {{ session('message') }}

                </div>
            @endif
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('products.create') }}"> Create product</a>

            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>price</th>
                    <th>sale</th>
                    <th>action</th>
                </tr>
                <?php $i = 1; ?>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{ $product->images->count() > 0 ? asset('upload/' . $product->images->first()->url) : 'upload/default.png' }}"
                                width="200px" height="200px" alt=""></td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->sale }}</td>
                        <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">edit</a>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">show</a>

                            <form action="{{ route('products.destroy', $product->id) }}" style="display: inline;"
                                id="form-delete{{ $product->id }}" method="post">
                                @csrf
                                @method('delete')

                            </form>

                            <button class="btn btn-delete btn-danger" data-id={{ $product->id }}>Delete</button>

                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $products->links() }}
        </div>

    </div>
@endsection
