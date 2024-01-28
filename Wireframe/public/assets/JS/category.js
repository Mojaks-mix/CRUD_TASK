$(document).on('submit', '#edit_category', function (event) { 
    event.preventDefault();

    var formData = new FormData(this);
    console.log(formData);
    formData.append('updated', true);

    $.ajax( { 
        type: "POST",
        url: "/categories/update",
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
                $('#editCategoryModal').modal('hide');
                $('#edit_category')[0].reset();
                $('#myTable').DataTable().draw();
             } 
         } 
    } );

 } );

 $(document).on('click', '.editCategoryBtn', function () { 
    var id = $(this).data('id'); 
    $.ajax( { 
        type: "GET",
        url: "/categories/edit?id=" + id,
        success: function (response) { 
            var res = $.parseJSON(response);
            if(res.status == 422) { 
                alert(res.message);
             } 
            else if(res.status == 200) { 
                $('#id').val(res.data.row.id);
                $('#category_name').val(res.data.row.category_name);
                var categories = res.data.categories;

                var selectElement = $('#parent_id');

                selectElement.empty();

                selectElement.append($('<option>', { 
                    value: null,
                    text: 'No Parent'
                 } ));

                $.each(categories, function(key, value) { 
                    selectElement.append($('<option>', { 
                        value: value,
                        text: key
                     } ));
                 } );

                selectElement.val(res.data.row.parent_id);
                $('#editCategoryModal').modal('show');
             } 
         } 
    } );

 } );

 $(document).on('click', '.deleteCategoryBtn', function (event) { 
    event.preventDefault();

    if(confirm('Are you sure you want to delete this Category?')) { 
        var id = $(this).data('id');

        $.ajax( { 
            type: "POST",
            url: "/categories/delete?id=" + id,
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
        ajax: '/categories/table',
        orderMulti: false,
        columns: [
             { sortable: false, data: "id" } ,
             { sortable: false, data: "category_name" } ,
             { sortable: false, data: "parent_category_name" } ,
             { sortable: false, data: "content_count" } ,
             { 
                sortable: false,
                data: row => `
                <button type="button" data-id="${row.id} " class="editCategoryBtn btn btn-info float-end">
                Edit
            </button>

            <button type="button" data-id="${row.id} " class="deleteCategoryBtn btn btn-danger float-end">
                Delete
            </button>
                `
             } 
        ]
    } );
} );