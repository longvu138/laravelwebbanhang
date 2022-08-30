@extends('admin.layouts.app')
@section('title', 'Coupons')
@section('content')

    <div class="card">
        <div class="row">

            <h1>coupons List</h1>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                    {{ session('message') }}

                </div>
            @endif
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('coupons.create') }}"> Create Coupon</a>

            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>type</th>
                    <th>value</th>
                    <th>expery_date</th>
                    <th>action</th>
                </tr>
                <?php $i = 1; ?>
                @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $coupon->name }}</td>
                        <td>{{ $coupon->type }}</td>
                        <td>{{ $coupon->value }}</td>
                        <td>{{ $coupon->expery_date }}</td>


                        <td><a href=" {{ route('coupons.edit', $coupon->id) }}" class="btn btn-warning">edit</a>
                            <form action="{{ route('coupons.destroy', $coupon->id) }}" style="display: inline;"
                                id="form-delete{{ $coupon->id }}" method="post">
                                @csrf
                                @method('delete')

                            </form>
                            <button class="btn btn-delete btn-danger" data-id={{ $coupon->id }}>Delete</button>




                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $coupons->links() }}
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    </div>
@endsection
