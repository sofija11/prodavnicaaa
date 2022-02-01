$(document).ready(function(){
    ///datatables
    $('.products_table').DataTable();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.products_table__delete').click(function(){
        let id = $(this).data('id');
         $.ajax({
             type: 'POST',
             dataType: 'json',
             data: {
                 id: id,
                 _method: 'DELETE'
             },
             url: "/products/" + id,
             success: function (data) {
                 
             } 
         });
     })
})