window.ajaxGet = function (data, aditionalData) {
    return $.ajax({
        processData: false,
        contentType: false,
        data: data,
        type: aditionalData.method,
        url: aditionalData.url
    });
}

window.ajaxPost = function (data, aditionalData) {
    return $.ajax({
        processData: false,
        contentType: false,
        data: data,
        type: aditionalData.method,
        url: aditionalData.url
    });
}

window.ajaxUpdate = function (data, aditionalData) {
    return $.ajax({
        processData: false,
        contentType: false,
        data: data,
        type: aditionalData.method,
        url: aditionalData.url
    });
}

window.ajaxDelete1 = function (data, aditionalData) {
    $.confirm({
        title: 'Alert!',
        content: 'Are you sure to delete this item?',
        buttons: {
            confirm: function () {
                $.ajax({
                    processData: false,
                    contentType: false,
                    data: data,
                    type: aditionalData.method,
                    url: aditionalData.url,
                    success: function (response) {
                        if (response.error) {
                            toastr.error(response.error, 'Error');
                        }else{
                            aditionalData.table.ajax.reload(null, false);
                            toastr.success('Deleted!', 'Success');
                        }
                    },
                    error: function (jqXHR, exception) {

                    },
                });
            },
            cancel: function () {

            },
        }
    });
}


window.datatable = function (data) {

    window[data.dataTableName] = $('.' + data.dataTableName).DataTable(
        {
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "stateSave": true,
            "order": [[0, "desc"]],
            "ajax": {
                "url": data.url,
                "dataType": "json",
                "type": data.type,
                "data": { _token: window.token }
            },
            "columns": [...data.columns],
            "columnDefs": [...data.columnDefs],
        }
    );
}


//this function for previous code no need after fiew days
window.ajaxDelete = function (data, aditionalData) {
    $.confirm({
        title: 'Alert!',
        content: 'Are you sure to delete this item?',
        buttons: {
            confirm: function () {
                $.ajax({
                    processData: false,
                    contentType: false,
                    data: data,
                    type: aditionalData.method,
                    url: aditionalData.url,
                    success: function (response) {
                        console.log(response)
                        aditionalData.table.dataTable().fnDestroy();
                        $('#' + aditionalData.output).html(response.data);
                        aditionalData.table.dataTable({ stateSave: true });
                        toastr.success('Deleted!', 'Success');
                    },
                    error: function (jqXHR, exception) {

                    },
                });
            },
            cancel: function () {

            },
        }
    });
}


function show_error(error_data) {
    let { formId, appendClass = '.form-group', rules } = error_data;
    $(formId).validate({
        rules: rules,
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest(appendClass).append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
}
