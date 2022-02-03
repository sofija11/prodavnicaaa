
@extends("layout")
@section("mainPart")
    <h1 class = "text-primary text-center" > UPDATE CATEGORY </h1>
        <form class = " text-center insert_category" method = "POST" action = "{{ route('categories.update', [$category->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type = "text" name = "category_edit" value = "{{ $category->name }}" placeholder = "Category name *" class = "form-control">
            </div>
            <div class="form-group">
                <button type = "submit" class = "btn btn-primary"> UPDATE </button>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-primary">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
@endsection