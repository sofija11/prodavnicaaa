$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.photo_edit').click(function(){
        let id = $(this).data('id');
         $.ajax({
             type: 'POST',
             dataType: 'json',
             data: {
                 id: id,
                 _method: 'DELETE'
             },
             url: "/photo_delete/" + id,
             success: function (data) {
                 
             } 
         });
     })
})