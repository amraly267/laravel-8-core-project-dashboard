// === Submit forms via ajax call ===
function submitForm(form, beforeSendAction, afterCompleteAction, successResponse, errorResponse, ckeditorTextareas)
{
    event.preventDefault();
    var formData = new FormData(form);
    var form = $(form);
    var url = form.attr('action');
    var className = form.className;
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,

        beforeSend: function(){
            $.each(ckeditorTextareas, function(index, value) {
                formData.append(value, CKEDITOR.instances[value].getData());
            });

            beforeSendAction();
        },
        complete: function(){
            afterCompleteAction();
        },
        success: function(response)
        {
            callResponse = response
            successResponse();
        },
        error: function(response)
        {
            callResponse = response
            errorResponse();
        }
    });
}
// === End function ===

// === Delete Row ===
function deleteRow(route, deleteToken)
{
    console.log(route);

    Swal.fire({
        icon: 'question',
        title: title,
        showCancelButton: true,
    }).then((result) => {
        if(result.isConfirmed)
        {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: 'DELETE',
                url: route,
                data: {"_method": 'DELETE', "_token": deleteToken},
                contentType: false,
                cache: false,
                processData: false,
                success: function (response)
                {
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                },
                error: function(response)
                {
                    Swal.fire({
                        icon: 'error',
                        title: response.responseJSON.message,
                        showConfirmButton: true,
                    });
                }
            });
        }
    })
}
// === End script ===

// function tableGenerate(data = '', url) {

//     var dataTable =
//         $('#kt_datatable_example_1').DataTable({
//             "createdRow": function (row, data, dataIndex) {
//                 if (data["deleted_at"] != null) {
//                     $(row).addClass('danger');
//                 }
//             },
//             ajax: {
//                 url: url,
//                 type: "GET",
//                 data: {
//                     req: data,
//                 },
//             },
//             language: {
//                 url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/English.json"
//             },
//             stateSave: true,
//             processing: true,
//             serverSide: true,
//             responsive: !0,
//             order: [[1, "desc"]],
//             columns: [
//                 {data: 'id', className: 'dt-center'},
//                 {data: 'id', className: 'dt-center'},
//                 {
//                     data: "image", orderable: false, width: "1%",
//                     render: function (data, type, row) {
//                         return '<img src="' + data + '" width="50px"/>'
//                     }
//                 },
//                 {data: 'status', className: 'dt-center'},
//                 {data: 'title', className: 'dt-center', orderable: false},
//                 {data: 'created_at', className: 'dt-center'},
//                 {data: 'id'},
//             ],
//             columnDefs: [
//                 {
//                     targets: 0,
//                     width: '30px',
//                     className: 'dt-center',
//                     orderable: false,
//                     render: function (data, type, full, meta) {
//                         return `<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
//                   <input type="checkbox" value="` + data + ` class="group-checkable" name="ids">
//                   <span></span>
//                 </label>
//               `;
//                     },
//                 },
//                 {
//                     targets: 3,
//                     width: '30px',
//                     className: 'dt-center',
//                     render: function (data, type, full, meta) {
//                         if (data == 1) {
//                             return '<span class="badge badge-success"> Active </span>';
//                         } else {
//                             return '<span class="badge badge-danger"> Unactive </span>';
//                         }
//                     },
//                 },
//                 {
//                     targets: -1,
//                     width: '13%',
//                     title: 'Options',
//                     className: 'dt-center',
//                     orderable: false,
//                     render: function (data, type, full, meta) {

//                         // Edit
//                         var editUrl = 'http://127.0.0.1:8000/en/dashboard/restaurants/:id/edit';
//                         editUrl = editUrl.replace(':id', data);

//                         // Delete
//                         var deleteUrl = 'http://127.0.0.1:8000/en/dashboard/restaurants/:id';
//                         deleteUrl = deleteUrl.replace(':id', data);

//                         return `
//                                                             <a href="` + editUrl + `" class="btn btn-sm blue" title="Edit">
//                                 <i class="fa fa-edit"></i>
//                             </a>


//                                                         <input type="hidden" name="_token" value="k8vNumzloSZQUFZ25erTidd7LescbjeRosjSSg6A">                                <a href="javascript:;" onclick="deleteRow('` + deleteUrl + `')" class="btn btn-sm red">
//                                             <i class="fa fa-trash"></i>
//                                         </a>

//                         `;
//                     },
//                 },
//             ],
//             dom: 'Bfrtip',
//             lengthMenu: [
//                 [10, 25, 50, 100, 500],
//                 ['10', '25', '50', '100', '500']
//             ],
//             buttons: [
//                 {
//                     extend: "pageLength",
//                     className: "btn blue btn-outline",
//                     text: "Page Lenght",
//                     exportOptions: {
//                         stripHtml: false,
//                         columns: ':visible',
//                         columns: [1, 2, 3, 4, 5]
//                     }
//                 },
//                 {
//                     extend: "print",
//                     className: "btn blue btn-outline",
//                     text: "Print",
//                     exportOptions: {
//                         stripHtml: false,
//                         columns: ':visible',
//                         columns: [1, 2, 3, 4, 5]
//                     }
//                 },
//                 {
//                     extend: "pdf",
//                     className: "btn blue btn-outline",
//                     text: "PDF",
//                     exportOptions: {
//                         stripHtml: false,
//                         columns: ':visible',
//                         columns: [1, 2, 3, 4, 5]
//                     }
//                 },
//                 {
//                     extend: "excel",
//                     className: "btn blue btn-outline ",
//                     text: "Excel",
//                     exportOptions: {
//                         stripHtml: false,
//                         columns: ':visible',
//                         columns: [1, 2, 3, 4, 5]
//                     }
//                 },
//                 {
//                     extend: "colvis",
//                     className: "btn blue btn-outline",
//                     text: "Colvis",
//                     exportOptions: {
//                         stripHtml: false,
//                         columns: ':visible',
//                         columns: [1, 2, 3, 4, 5]
//                     }
//                 }
//             ]
//         });
//     }

