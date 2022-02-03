@extends("layout")
@section("mainPart")
@section('js')
    <script type="text/javascript" charset="utf8" src="{{ asset("js/product_edit.js") }}"></script>
@endsection
<h1 class = "text-primary text-left" > UPDATE PRODUCT </h1>
    <form enctype="multipart/form-data" class = "text-center edit_category" method = "POST" action = "{{ route('products.update', [ $product->id ])}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type = "text" name = "product_name_edit" value = "{{ $product->name }}" placeholder = "Product name *" class = "form-control">
        </div>
        <div class="form-group">
            <input type = "text" name = "code_edit" value = "{{ $product->code }}" placeholder = "Code *" class = "form-control">
        </div>
        <div class="form-group">
            <input type = "text" name = "description_edit" value = "{{ $product->description }}" placeholder = "Description *" class = "form-control">
        </div>
        <div class="form-group">
            <input type = "text" name = "price_edit" value = "{{ $product->price }}" placeholder = "Price *" class = "form-control">
        </div>
        <div class="form-group">
            <select id = "categories_edit"  name = "categories_edit" class ="categories form-control">
                <option name = "category_edit_opt" value = "{{ $product->category->id }}" selected > {{ $product->category->name }} </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
            </select>
        </div>
            @foreach($product->photos as $photo)
                <img src="{{ '../../uploads/'. $photo->image}}"/> 
                 <a class = "text-primary photo_edit" data-id = " {{$photo->id}} " value=""> Obrisi </a>
            @endforeach
        <div class="form-group">
            <input type="file" name="images_edit[]" multiple="true" class = "form-control">
        </div>
        <div class="form-group">
            <button type = "submit" class = "btn btn-primary"> UPDATE </button>
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
@endsection