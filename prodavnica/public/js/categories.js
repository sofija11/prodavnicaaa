$(document).ready(function(){
    ///datatables
    $('.categories_table').DataTable();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.categories_table__delete').click(function(){
       let id = $(this).data('id');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                _method: 'DELETE'
            },
            url: "/categories/" + id,
            success: function (data) {
                
            } 
        });
    })
})