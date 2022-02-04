@extends("layout")
@section("css")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
@endsection
@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('.users_table').DataTable();
        } );
    </script>
@endsection
@section("mainPart")
<h1 class = "text-primary text-center"> USERS </h1>
    <table class="users_table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td> {{ $user->id}} </td>
                    <td> {{ $user->name}} </td>
                    <td> {{ $user->email}} </td>
                    <td> {{ $user->role->name }} </td>
                    <th> {{ date('d/m/Y', strtotime($user->created_at)) }} </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection