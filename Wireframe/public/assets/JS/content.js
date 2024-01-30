var quill = new Quill('#editor', { 
    modules: { 
        toolbar: [
            [ { header: [1, 2, 3, 4, 5, false] } ],
            ['bold', 'italic', 'underline'],
            ['image', 'code-block'],
            [ { list: "ordered" } , { list: "bullet" } ]
        ]
     } ,
    theme: 'snow'
 } );

$('#submit').click(function() { 
    var value = quill.getContents();
    $('#content').val(JSON.stringify(value));
 } ); 

$(document).on('submit', '#edit_content', function (event) { 
    event.preventDefault();

    var formData = new FormData(this);
    formData.append('updated', true);

    $.ajax( { 
        type: "POST",
        url: "/contents/update",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) { 
            var res = $.parseJSON(response);
            if(res.status == 500) { 
                $('#errormessage').removeClass('d-none');
                $('#errormessage').text(res.message);
             } 
            else if(res.status == 200) { 
                $('#errormessage').addClass('d-none');
                $('#editContentModal').modal('hide');
                $('#edit_content')[0].reset();
                $('#myTable').DataTable().draw();
             } 
         } 
    } );

 } );

$(document).on('click', '.editContentBtn', function () { 
    var id = $(this).data('id'); 
    $.ajax( { 
        type: "GET",
        url: "/contents/edit?id=" + id,
        success: function (response) { 
            var res = $.parseJSON(response);
            if(res.status == 422) { 
                alert(res.message);
             } 
            else if(res.status == 200) { 
                $('#id').val(res.data.row.id);
                $('#content_title').val(res.data.row.content_title);
                var opsData = res.data.row.content;
                quill.setContents(JSON.parse(opsData));

                var categories = res.data.categories;

                var selectElement = $('#category_id');

                selectElement.empty();

                $.each(categories, function(key, value) { 
                    selectElement.append($('<option>', { 
                        value: value,
                        text: key
                     } ));
                 } );
                selectElement.val(res.data.row.category_id);
                $('#editContentModal').modal('show');
             } 
         } 
    } );

 } );

$(document).on('click', '.deleteContentBtn', function (event) { 
    event.preventDefault();

    if(confirm('Are you sure you want to delete this Content?')) { 
        var id = $(this).data('id');

        $.ajax( { 
            type: "POST",
            url: "/contents/delete?id=" + id,
            success: function (response) { 
                var res = $.parseJSON(response);
                if(res.status == 500) { 
                    alert(res.message);
                 } 
                else if(res.status == 200) { 
                    alert(res.message);
                    $('#myTable').DataTable().draw();
                 } 
             } 
        } );
     } 
 } );

$(document).ready( function () { 
    $('#myTable').DataTable( { 
        serverSide: true,
        ajax: '/contents/table',
        orderMulti: false,
        columns: [
             { sortable: false, data: "id" } ,
             { sortable: false, data: "content_title" } ,
             { sortable: false, data: "category_name" } ,
             { sortable: false, data: "added_date" } ,
             { sortable: false, data: "added_by" } ,
             //added_by later 
             { 
                sortable: false,
                data: row => `
                <button type="button" data-id="${row.id} " class="editContentBtn btn btn-info float-end">
                Edit
            </button>

            <button type="button" data-id="${row.id} " class="deleteContentBtn btn btn-danger float-end">
                Delete
            </button>
                `
             } 
        ]
    } );
} );