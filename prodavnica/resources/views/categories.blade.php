@extends("layout")
@section("css")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
@endsection
@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset("js/categories.js") }}"></script>
@endsection
@section("mainPart")
<h1 class = "text-primary text-center"> CATEGORIES </h1><hr>
@if ($session !== null && $session->role_id === 1 )
    <p class = "text-primary text-left" > INSERT CATEGORY </p>
    <form class = " text-center insert_category" method = "POST" action = "{{ route('categories.store') }}">
        @csrf
        @method('POST')
        <div class="form-group">
            <input type = "text" name = "category" placeholder = "Category name *" class = "form-control">
        </div>
        <div class="form-group">
            <button type = "submit" class = "btn btn-primary"> INSERT </button>
        </div>
    </form>
@endif
    <table class="categories_table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Deleted_at</th>
                {{-- ako je admin --}}
                @if ($session !== null && $session->role_id === 1 )
                    <th>Update</th>
                    <th>Delete</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category) 
                <tr>
                    <td> {{ $category->id}} </td>
                    <td> {{ $category->name}} </td>
                    <th> {{ date('d/m/Y', strtotime($category->created_at)) }} </th>
                    <th> {{ $category->updated_at !== null ? date('d/m/Y', strtotime($category->updated_at)) : 'no_changes' }} </th>
                    <th> {{ $category->deleted_at !== null ? date('d/m/Y', strtotime($category->deleted_at)) : 'no_changes' }} </th>
                    @if ($session !== null && $session->role_id === 1 )
                        <th>
                            <button type="submit" class="categories_table__update btn btn-primary"> UPDATE </button>
                        </th>
                        <th> 
                            <button type="submit" data-token="{{ csrf_token() }}" data-id = "{{ $category->id }}" class="categories_table__delete btn btn-primary"> DELETE </button>
                        </th>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection