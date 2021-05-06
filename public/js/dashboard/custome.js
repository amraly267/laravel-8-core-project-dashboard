// === Submit forms via ajax call ===
function submitForm(form, beforeSendAction, afterCompleteAction, successResponse, errorResponse)
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
