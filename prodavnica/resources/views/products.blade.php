@extends("layout")
@section("css")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
@endsection
@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset("js/products.js") }}"></script>
@endsection
@section("mainPart")
<h1 class = "text-primary text-center"> PRODUCTS </h1><hr>
@if ($session !== null && $session->role_id === 1 )
    <p class = "text-primary text-left" > INSERT PRODUCT </p>
    <form enctype="multipart/form-data" class = "text-center insert_category" method = "POST" action = "{{ route('products.store')}}">
        @csrf
        @method('POST')
        <div class="form-group">
            <input type = "text" name = "product_name" value = "{{ old('product_name') }}" placeholder = "Product name *" class = "form-control">
        </div>
        <div class="form-group">
            <input type = "text" name = "code" value = "{{ old('code') }}"placeholder = "Code *" class = "form-control">
        </div>
        <div class="form-group">
            <input type = "text" name = "description" value = "{{ old('description') }}" placeholder = "Description *" class = "form-control">
        </div>
        <div class="form-group">
            <input type = "text" name = "price" value = "{{ old('price') }}" placeholder = "Price *" class = "form-control">
        </div>
        <div class="form-group">
            <select name = "categories" class ="categories form-control" value = "{{ old('categories') }}">
                <option value = "0" selected disabled> Choose category *</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="file" name="images[]" value = "{{ old('images[]') }}" multiple="true" class = "form-control">
        </div>
        <div class="form-group">
            <button type = "submit" class = "btn btn-primary"> INSERT </button>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-primary">
                {{ session()->get('message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-primary">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endif
    <table class="products_table table-hover" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Photos</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Deleted_at</th>
                @if ($session !== null && $session->role_id === 1 )
                    <th>Update</th>
                    <th>Delete</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product) 
                <tr class = "product_row--{{ $product->id }}">
                    <td> {{ $product->id }} </td>
                    <td> {{ $product->name }} </td>
                    <td> {{ $product->code }} </td>
                    <td> {{ $product->description }} </td>
                    <td> {{ $product->price }} </td>
                    <td> {{ $product->category->name }} </td>
                    <td> 
                        @foreach($product->photos as $photo)
                            <img src="uploads/{{ $photo->image}}"/>
                        @endforeach
                    </td>
                    <th> {{ date('d/m/Y', strtotime($product->created_at)) }} </th>
                    <th> {{ $product->updated_at !== null ? date('d/m/Y', strtotime($product->updated_at)) : 'no_changes' }} </th>
                    <th> {{ $product->deleted_at !== null ? date('d/m/Y', strtotime($product->deleted_at)) : 'no_changes' }} </th>
                    @if ($session !== null && $session->role_id === 1 )
                        <th>
                            <form action ="{{ route('products.edit',[ $product->id ]) }}" method="GET">
                                    <input type="submit" value="UPDATE" class="btn btn-primary"></button>
                            </form>
                        </th>
                        <th> 
                            <button type="submit" data-token="{{ csrf_token() }}" data-id = "{{ $product->id }}" class="products_table__delete btn btn-primary"> DELETE </button>
                        </th>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection