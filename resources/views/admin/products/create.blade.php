@extends('admin.layouts.app')
@section('title', 'Create products')
@section('content')
    <div class="card">
        <h1>Create products</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class=" input-group-static col-5 mb-4">
                    <label>Image</label>
                    <input value="{{ old('image') }}" type="file" accept="image/*" name="image" id="image-input"
                        class="form-control">

                    @error('image')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="col-5">
                    <img src="" id="show-image" alt="" style="width: 150px;">
                </div>
            </div>



            <div class="input-group input-group-static mb-4">
                <label>Name</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control">

                @error('name')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label>Price</label>
                <input type="text" value="{{ old('price') }}" name="price" class="form-control">
                @error('price')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label>Sale</label>
                <input type="sale" value="{{ old('sale') }}" name="sale" class="form-control">
                @error('sale')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label>Description</label>
                <textarea type="text" name="description" id="description" class="form-control">{{ old('description') }} </textarea>
                @error('description')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <input type="hidden" id="inputSize" name='sizes'>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddSizeModal">
                Add size
            </button>

            <!-- Modal -->
            <div class="modal fade" id="AddSizeModal" tabindex="-1" aria-labelledby="AddSizeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AddSizeModalLabel">Add size</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="AddSizeModalBody">

                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn  btn-primary btn-add-size">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group input-group-static mb-4">
                <label name="group" class="ms-0">Category</label>
                <select name="category_ids[]" class="form-control" multiple>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>

                @error('category_ids')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-submit btn-primary">Submit</button>

        </form>
    </div>





    </div>


@endsection


@section('style')
    <style>
        .w-40 {
            width: 40%;
        }

        .w-20 {
            width: 20%;
        }

        .row {
            justify-content: center;
            align-items: center
        }

        .ck.ck-editor {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection



@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="{{ asset('plugin/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <script>
        let sizes = [{
            id: Date.now(),
            size: 'M',
            quantity: 1
        }];
    </script>
    <script src="{{ asset('admin/assets/js/product/product.js') }}"></script>

@endsection
