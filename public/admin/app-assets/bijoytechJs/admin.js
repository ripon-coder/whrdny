//start sahadat
(function ($) {
	$(document).ready(function () {
		
        initialization();
		$(document).on('submit', '#updateCategoryForm', updateCategory);
		$(document).on('submit', '#updateSubCategoryForm', updateSubCategory);
        $(document).on('submit', '#updateInnerCategoryForm', updateInnerCategory);
        $(document).on('submit', '#updateOrderStatusForm', updateOrderStatus);
        $(document).on('change', '#category',getSubcategoryByCategory);
        $(document).on('change', '#category',getSubcategoryByCategory);
		$(document).on('submit', '#paymentForm', makePaymentToVendor);
	});
})(jQuery)

window.categoryTable              = 'categoryTable';
window.subCategoryTable           = 'subCategoryTable';
window.innerCategoryTable         = 'innerCategoryTable';
window.orderTable                 = 'orderTable';
window.dashboardOrderTable        = 'dashboardOrderTable';
window.pendingOrderTable          = 'pendingOrderTable';
window.cancelOrderTable           = 'cancelOrderTable';
window.pendingPaymentRequestTable = 'pendingPaymentRequestTable';
window.payableOrderTable          = 'payableOrderTable';

function initialization(){
    // if( $('#content-body').hasClass('categoryTable') ) {
        loadCategory();
    // }
    loadSubCategory();
    loadInnerCategory();
    loadOrders();
    categoryCreateValidation();
    subCategoryCreateValidation();
    innerCategoryCreateValidation();
    colorCreateValidation();
    sizeCreateValidation();
    aboutUsCreateValidation();
    contactUsCreateValidation();
    faqCreateValidation();
    productCreateValidation();
    productUpdateValidation();
    couponUpdateValidation();
    shippingCreateValidation();
    shippingPriceBetweensValidation();
    groceryShippingCreateValidation();
    vendorValidation();
    loadDashboardOrder();
    loadPendingOrders();
    loadCancelOrders();
    loadPendingPaymentRequest();
    loadPayableOrderTable();
}

var categories_tbl        = $('.categoried-table');
var subcategories_tbl     = $('.sub-categories');
var course_tbl            = $('.course-table');
var course_curriculam_tbl = $('.course-curriculam-table');
var course_tag_tbl        = $('.course-tag-table');
var curriculam_item_tbl   = $('.curriculam-item-table');
var contact_tbl           = $('.contact-table');
var instructor_tbl        = $('.intructor-table');
var page_tbl              = $('.page-table');
//end sahadat

$(document).ready(function () {
    $(categories_tbl).DataTable({ stateSave: true });
    $(subcategories_tbl).DataTable({ stateSave: true });
    $(course_tbl).DataTable({ stateSave: true });
    $(course_curriculam_tbl).DataTable({ stateSave: true });
    $(contact_tbl).DataTable({ stateSave: true });
    $(instructor_tbl).DataTable({ stateSave: true });
    if ($('#summernote').length > 0) {
        $('#summernote').summernote({ height: 200 });
    }

	
	if ($('.summernote').length > 0) {
		
		
 // Define function to open filemanager window
    var lfm = function(options, cb) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
      window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
      var ui = $.summernote.ui;
      var button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: 'Insert image with filemanager',
        click: function() {

          lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
              context.invoke('insertImage', lfmItem.url);
            });
          });

        }
      });
      return button.render();
    };
	

    $('.summernote').summernote({
        height: 150, // Set the height of the editor
        toolbar: [
		    ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ['popovers', ['lfm']], // Add your custom button in the toolbar
        ],
        buttons: {
            lfm: LFMButton // Register the custom button
        }
    });
	
	
	
	
	
	
	
	
}

	
	
	
	
	
	
	
    if ($('#what_you_will_learn').length > 0) {
        $('#what_you_will_learn').summernote({ height: 200 });
    }
    if ($('#requirements').length > 0) {
        $('#requirements').summernote({ height: 150 });
    }
    if ($('#who_this_course_for').length > 0) {
        $('#who_this_course_for').summernote({ height: 200 });
    }
});

function resetForm(formId) {
    $("#" + formId)[0].reset();
}

function deleteCategory(id, status = false) {
    let data = new FormData();
    data.append('id', id);
    data.append('status', status);
    data.append('_token', window.token);
    let table = (status == false) ? categories_tbl : subcategories_tbl;
    let output = (status == false) ? 'set-cat-data' : 'set-sub-categories';
    let aditionalData = {
        url: window.delete_category,
        method: 'POST',
        table: table,
        output: output,
    }
    window.ajaxDelete(data, aditionalData);
}

function getSubCategory() {
    let id = $('#c-category').val();
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.category_subcategory,
        method: 'POST',
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $('#c-subcategory').html(data);
    });
}

function deleteCourse(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.delete_course,
        method: 'POST',
        table: course_tbl,
        output: 'set-course-data',
    }
    window.ajaxDelete(data, aditionalData);
}

function deleteInstructor(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.instructor_delete,
        method: 'POST',
        table: instructor_tbl,
        output: 'set-insturctor-data',
    }
    window.ajaxDelete(data, aditionalData);
}

function deletePage(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.page_delete,
        method: 'POST',
        table: page_tbl,
        output: 'set-page-data',
    }
    window.ajaxDelete(data, aditionalData);
}

function deleteCourseCurriculam(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.delete_course_curriculam,
        method: 'POST',
        table: course_curriculam_tbl,
        output: 'set-course-curriculam-data',
    }
    window.ajaxDelete(data, aditionalData);
}

function deleteCourseTag(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.delete_course_tag,
        method: 'POST',
        table: course_tag_tbl,
        output: 'set-course-tag-data',
    }
    window.ajaxDelete(data, aditionalData);
}

function deleteCurriculamItem(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.delete_curriculam_item,
        method: 'POST',
        table: curriculam_item_tbl,
        output: 'set-curriculam-item-data',
    }
    window.ajaxDelete(data, aditionalData);
}

function viewContact(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.contact_view,
        method: 'POST'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $('#contact-view-modal').html(data);
        $('#view-contact-modal').modal('show');

    });
}

function deleteContact(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.contact_delete,
        method: 'POST',
        table: contact_tbl,
        output: 'set-contact-data',
    }
    window.ajaxDelete(data, aditionalData);
}














// coded by sajib

window.customers = 'customers';
window.sliders = 'sliders';
window.paymentHistory = 'paymentHistory';

$(document).ready(function () {
    let objectPaymentHistory = {
        "dataTableName": window.paymentHistory,
        "url": window.payment_history,
        "type": "GET",
        "columns": [
            { data: "order_id" },
            { data: "total" },
            { data: "payment_at" },
            { data: "method" }
        ],
        "columnDefs": [
            {
                targets: [1],
                orderable: false,
            },
        ],
    }

    window.datatable(objectPaymentHistory);

});


var colorTable;
$(document).ready(function () {
    colorTable = $('.colorTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true,
        "stateSave": true,
        "order": [[0, "desc"]],
        "ajax": {
            "url": window.get_colors,
            "dataType": "json",
            "type": "GET",
            "data": { _token: window.token }
        },
        "columns": [
            { "data": "name" },
            { "data": "Action" }
        ],
        "columnDefs": [
            {
                "targets": [1],
                "orderable": false,
            },
        ],

    });
});

var sizeTable;
$(document).ready(function () {
    sizeTable = $('.sizeTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true,
        "stateSave": true,
        "order": [[0, "desc"]],
        "ajax": {
            "url": window.get_size,
            "dataType": "json",
            "type": "GET",
            "data": { _token: window.token }
        },

        "columns": [
            { "data": "name" },
            { "data": "Actions" }
        ],
        "columnDefs": [
            {
                "targets": [1],
                "orderable": false,
            },
        ],

    });
})

var faqTable;
$(document).ready(function () {
    faqTable = $(".faqTable").DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        stateSave: true,
        order: [[0, "desc"]],
        ajax: {
            url: window.get_faq,
            dataType: "json",
            type: "GET",
            data: { _token: window.token },
        },

        columns: [
            { data: "title" },
            { data: "description" },
            { data: "Actions" },
        ],
        columnDefs: [
            {
                targets: [2],
                orderable: false,
            },
        ],
    });
})

var activeVendor;
$(document).ready(function () {
    activeVendor = $(".activeVendor").DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        stateSave: true,
        order: [[0, "desc"]],
        ajax: {
            url: window.vendors,
            dataType: "json",
            type: "GET",
            data: { _token: window.token },
        },

        columns: [
            { data: "name" },
            { data: "store_name" },
            { data: "email" },
            { data: "phone" },
            { data: "Status" },
            { data: "Actions" },
        ],
        columnDefs: [
            {
                targets: [5],
                orderable: false,
            },
            { width: 170, targets: 5 },
        ],
    });
})

var deactiveVendor;
$(document).ready(function () {
    deactiveVendor = $(".deactiveVendor").DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        stateSave: true,
        order: [[0, "desc"]],
        ajax: {
            url: window.get_deactive_vendor,
            dataType: "json",
            type: "GET",
            data: { _token: window.token },
        },

        columns: [
            { data: "name" },
            { data: "store_name" },
            { data: "email" },
            { data: "phone" },
            { data: "Status" },
            { data: "Actions" },
        ],
        columnDefs: [
            {
                targets: [5],
                orderable: false,
            },
            { width: 170, targets: 5 },
        ],
    });
})


$(document).ready(function () {
    let objectCoustomers = {
        "dataTableName": window.customers,
        "url": window.get_customers,
        "type": "GET",
        "columns": [
            { data: "name" },
            { data: "phone" },
            { data: "email" },
            { data: "mobile" },
            { data: "city" },
            { data: "state_id" },
            { data: "zip_code" },
            { data: "address" },
            { data: "country_id"}
        ],
        "columnDefs": [],
    }
    window.datatable(objectCoustomers);
});


$(document).ready(function () {
    let objectSlider = {
        "dataTableName": window.sliders,
        "url": window.get_sliders,
        "type": "GET",
        "columns": [
            { data: "title" },
            { data: "description" },
            { data: "button_name" },
            { data: "url" },
            { data: "file" },
            { data: "show_button" },
            { data: "Status" },
            { data: "Actions" }
        ],
        "columnDefs": [
            {
                targets: [7],
                orderable: false,
            },

        ],
    }

    window.datatable(objectSlider);

});

function deleteColor(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url: window.delete_color,
        method: 'POST',
        table: colorTable,
    }
    window.ajaxDelete1(data, aditionalData);
}

function editColor(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.edit_color,
        method: 'post'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $('.setColorModal').html(data);
        colorEditValidation();
        $('#editColorModal').modal('show');

    });
}

$(document).on("submit", "#updateColorForm", function (event) {
    event.preventDefault();
    let data = new FormData($("form#updateColorForm")[0]);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.update_color,
        method: "post",
    };
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $("#editColorModal").modal("hide");
        colorTable.ajax.reload(null, false);
        toastr.success("Updated!", "Success");
    });
});

function editSize(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.edit_size,
        method: "post",
    };

    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $(".setSizeModal").html(data);
        sizeEditValidation();
        $("#editSizeModal").modal("show");
    });
}

function deleteSize(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);

    let aditionalData = {
        url: window.delete_size,
        method: "POST",
        table: sizeTable,
    };
    window.ajaxDelete1(data, aditionalData);
}

$(document).on("submit", "#updateSizeForm", function (event) {
    event.preventDefault();
    let data = new FormData($("form#updateSizeForm")[0]);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.update_size,
        method: "post",
    };
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $("#editSizeModal").modal("hide");
        sizeTable.ajax.reload(null, false);
        toastr.success("Updated!", "Success");
    });
});


function editFaq(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.edit_faq,
        method: "post",
    };
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $(".setFaqModal").html(data);
        faqUpdatetValidation();
        $("#editFaqModal").modal("show");
        if ($(".summernote").length > 0) {
            $(".summernote").summernote({ height: 150 });
        }
    });
}

function deleteFaq(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);

    let aditionalData = {
        url: window.delete_faq,
        method: "POST",
        table: faqTable,
    };
    window.ajaxDelete1(data, aditionalData);
}

$(document).on("submit", "#updateFaqForm", function (event) {
    event.preventDefault();
    let data = new FormData($("form#updateFaqForm")[0]);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.update_faq,
        method: "post",
    };
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $("#editFaqModal").modal("hide");
        faqTable.ajax.reload(null, false);
        toastr.success("Updated!", "Success");
    });
});



function vendorStatus(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url: window.vendor_status,
        method: 'post',
        table: deactiveVendor,
        output: 'set-vendor-data',
    }

    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data.status);
        (data.status == 0) ? activeVendor.ajax.reload(null, false) : deactiveVendor.ajax.reload(null, false);
        toastr.success("Status Updated!", "Success");
    });
}


function viewVendor(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.view_vendor,
        method: 'post'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $('.viewVendorModal').html(data);
        $('#viewVendorModal').modal('show');
    });
}


function deleteSlider(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url: window.delete_slider,
        method: 'POST',
        table: window.sliders,
    }
    window.ajaxDelete1(data, aditionalData);
}


function editSlider(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.edit_slider,
        method: 'post'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $('.setSliderModal').html(data);
        sliderUpdateValidation();
        $('#editSliderModal').modal('show');

    });
}

$(document).on("submit", "#updateSliderForm", function (event) {
    event.preventDefault();
    let data = new FormData($("form#updateSliderForm")[0]);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.update_slider,
        method: "post",
    };

    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $("#editSliderModal").modal("hide");
        window.sliders.ajax.reload(null, false);
        toastr.success("Updated!", "Success");
    });
});


$(document).on("submit", "#updateVendorForm", function (event) {
    event.preventDefault();
    let data = new FormData($("form#updateVendorForm")[0]);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.save_vendor_document,
        method: "post",
    };

    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $("#viewVendorModal").modal("hide");
        toastr.success("Updated!", "Success");
    });
});

function productCommission(value) {

    if (value == '1') {
        $(".commission_type").removeClass("d-none");
        $("#commission").attr("required", "required");
    } else {
        $('.commission_type').addClass('d-none');
        $("#commission").removeAttr("required");
    }

}





// Coded by Sakhawat

var productTable;
var activeProductTable;
var requestedProductTable;
var rejectedProductTable;

// Select2
$(".sr-multi-select2").select2({
    tags: true,
    placeholder: 'Select'
});
// Select2
$(".sr-single-select2").select2({
    tags: false,
    placeholder: 'Select'
});


function select2Refresh() {
    $(".sr-single-select2").select2({
        placeholder: "Select Color",
        allowClear: true,
        width: '100%',
        ajax: {
            url: window.live_search_color,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results:  $.map( data, function ( item ) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
}

var count = 0;
$(document).on('click', '.add-images.dynamic-add-new', function () {
    var html = `
        <div class="container p-0 mt-1 remove-item-color">
            <div class="row m-0 align-items-end item-color">
                <div class="col-6 pl-0 pr-1">
                    <label class="label-control">Upload image</label>
                    <div class="mx-auto">
                        <input required type="file" accept="image/*" class="form-control" name="add_image[]">
                    </div>
                </div>

                <div class="col pl-0 pr-1">
                    <label class="label-control">Select color for image</label>

                    <div class="mx-auto">
                        <select name="add_color[]" class="form-control sr-single-select2"></select>
                    </div>
                </div>
                <div class="dynamic-remove-new btn btn-danger">Remove</div>
            </div>
        </div>`;

    $('.dynamic-form-items-wrapper.add-images .dynamic-form-item').append(html);
    select2Refresh();

});

$(document).on('click', '.dynamic-remove-new', function () {
    $(this).closest('.remove-item-color').remove();
});

// Add Dynamic Form For Additional Image
$(document).on('click', '.size-charts.dynamic-add-new', function(){
    $('.dynamic-form-items-wrapper.size-charts').append(`<div class="row m-0 align-items-end mb-2 dynamic-form-item">
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_1[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_2[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_3[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_4[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_5[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_6[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_7[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_8[]" value="0">
                </div>
            </div>
            <div class="dynamic-remove-new btn btn-danger">Remove</div>
        </div>`)
});

// Remove For All Dynamic Form
$(document).on('click', '.dynamic-remove-new', function(){
    $(this).closest('.dynamic-form-item').remove();
});

// Get All Products
$(document).ready(function(){
    // Product Listing
    productTable = $('.productTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering":true,
        "stateSave": true,
        "order": [[ 0, "desc" ]],
        "ajax":{
                "url": window.get_products,
                "dataType": "json",
                "type": "GET",
                "data":{ _token: window.token }
        },
        "columns": [
            { "data": "cover_image" },
            { "data": "category_id" },
            { "data": "sub_category_id" },
            { "data": "inner_category_id" },
            { "data": "product_name" },
            { "data": "price" },
            { "data": "commission" },
            { "data": "stock" },
            { "data": "is_hidden" },
            { "data": "Status" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[10],
                "orderable":false,
            },
        ],
    });
});

// Get Active Products
$(document).ready(function(){
    // Product Listing
    activeProductTable = $('.activeProductTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering":true,
        "stateSave": true,
        "order": [[ 0, "desc" ]],
        "ajax":{
                "url": window.get_active_products,
                "dataType": "json",
                "type": "GET",
                "data":{ _token: window.token }
        },
        "columns": [
            { "data": "cover_image" },
            { "data": "category_id" },
            { "data": "sub_category_id" },
            { "data": "inner_category_id" },
            { "data": "product_name" },
            { "data": "price" },
            { "data": "commission" },
            { "data": "stock" },
            { "data": "is_hidden" },
            { "data": "Status" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[10],
                "orderable":false,
            },
        ],
    });
});

// Get Requested Products
$(document).ready(function(){
    // Product Listing
    requestedProductTable = $('.requestedProductTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering":true,
        "stateSave": true,
        "order": [[ 0, "desc" ]],
        "ajax":{
                "url": window.get_requested_products,
                "dataType": "json",
                "type": "GET",
                "data":{ _token: window.token }
        },
        "columns": [
            { "data": "cover_image" },
            { "data": "category_id" },
            { "data": "sub_category_id" },
            { "data": "inner_category_id" },
            { "data": "product_name" },
            { "data": "price" },
            { "data": "commission" },
            { "data": "stock" },
            { "data": "is_hidden" },
            { "data": "Status" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[10],
                "orderable":false,
            },
        ],
    });
});

// Get Rejected Products
$(document).ready(function(){
    // Product Listing
    rejectedProductTable = $('.rejectedProductTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering":true,
        "stateSave": true,
        "order": [[ 0, "desc" ]],
        "ajax":{
                "url": window.get_rejected_products,
                "dataType": "json",
                "type": "GET",
                "data":{ _token: window.token }
        },
        "columns": [
            { "data": "cover_image" },
            { "data": "category_id" },
            { "data": "sub_category_id" },
            { "data": "inner_category_id" },
            { "data": "product_name" },
            { "data": "price" },
            { "data": "commission" },
            { "data": "stock" },
            { "data": "is_hidden" },
            { "data": "Status" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[10],
                "orderable":false,
            },
        ],
    });
});

// Get Hidden Products
$(document).ready(function(){
    // Product Listing
    hiddenProductTable = $('.hiddenProductTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering":true,
        "stateSave": true,
        "order": [[ 0, "desc" ]],
        "ajax":{
                "url": window.get_hidden_products,
                "dataType": "json",
                "type": "GET",
                "data":{ _token: window.token }
        },
        "columns": [
            { "data": "cover_image" },
            { "data": "category_id" },
            { "data": "sub_category_id" },
            { "data": "inner_category_id" },
            { "data": "product_name" },
            { "data": "price" },
            { "data": "commission" },
            { "data": "stock" },
            { "data": "is_hidden" },
            { "data": "Status" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[10],
                "orderable":false,
            },
        ],
    });
});

// Create Product
$('#productCreateForm').submit(function(e){
    e.preventDefault();
    var formData = new FormData( this );
    $.ajax({
        type: 'post',
        url: window.create_product,
        data: formData,
        cache : false,
        processData: false,
        contentType: false,
        beforeSend: function(){
           $('#btnSave').html(
                `<div class="spinner-border spinner-border-sm text-primary"></div> Save`
           );
           $('#btnSave').prop("disabled",true);
        },
        complete: function(){
            $('#btnSave').html(`
                <i class="la la-check-square-o"></i> Save
            `);
            $('#btnSave').prop("disabled",false);
        },
        success: function(response) {
            console.log(response);
            if(response.success == 1){
                toastr.success('Success!', response.message);
            }
            if(response.success == 0){
                toastr.success('Opps!', response.message);
            }
            setTimeout(function(){
                location.reload();
            },1000);

        },
        error: function (jqXHR, exception) {

        },
    });
});

// Update Product
$('#productUpdateForm').submit(function(e){
    e.preventDefault();
    var formData = new FormData( this );
    $.ajax({
        type: 'post',
        url: window.update_product,
        data: formData,
        cache : false,
        processData: false,
        contentType: false,
        beforeSend: function(){
            $('#btnUpdate').html(
                 `<div class="spinner-border spinner-border-sm text-primary"></div> Update`
            );
            $('#btnSave').prop("disabled",false);
         },
         complete: function(){
             $('#btnUpdate').html(`
                 <i class="la la-check-square-o"></i> Update
             `);
             $('#btnSave').prop("disabled",true);
         },
        success: function(response) {
            console.log(response);
            if(response.success == 1){
                toastr.success('Success!', response.message);
            }
            if(response.success == 0){
                toastr.success('Opps!', response.message);
            }
            setTimeout(function(){
                location.reload();
            },1000);

        },
        error: function (jqXHR, exception) {

        },
    });
});

// Delete Product
function deleteProduct( id )
{
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url:window.delete_product,
        method:'POST',
        table:productTable,
    }
    window.ajaxDelete1(data, aditionalData);
}

function viewProduct(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.show_product,
        method: 'POST',
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $('.viewProductModal').html(data);
        $('#editProductModal').modal('show');
    });
}

function viewProductStatus(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.product_status,
        method: 'POST',
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $('.prroductStatusModal').html(data);
        $('#productStatusModal').modal('show');
    });
}

$(document).on("submit", "#updateProductStatusForm", function (event) {
    event.preventDefault();

    var baseUrl = window.location.href;

    var url = baseUrl.split('/').slice(-1).join('/');

    let data = new FormData($("form#updateProductStatusForm")[0]);
    data.append("_token", window.token);
    data.append("url", url);

    let aditionalData = {
        url: window.update_product_status,
        method: "post",
    };
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data.warning);

        $('#productStatusModal').modal('hide');
        if (data.url === 'active') {
            activeProductTable.ajax.reload(null, false);
        } else if (data.url === 'requested') {
            requestedProductTable.ajax.reload(null, false);
        } else if( data.url === 'rejected' ) {

        } else {
            productTable.ajax.reload(null, false);
        }

        if (data.warning === 'error') {
            toastr.error("Commission can\'t be greater or equal than price", "Warning");
        } else {
            toastr.success("Updated!", "Success");
        }

    });
});


// coded by Farhina Afrin
window.couponTable = "couponTable";
window.contactTable = "contactTable";

(function ($) {
    $(document).ready(function () {
        $(document).on("submit", "#updateCouponForm", updateCoupon);

        // initialization();
    });
})(jQuery);

$(document).ready(function () {
    let objectCoustomers = {
        dataTableName: window.couponTable,
        url: window.get_coupons,

        type: "GET",
        columns: [
            { data: "seller_id" },
            { data: "code" },
            { data: "coupon_amount" },
            { data: "buyed_amount" },
            { data: "coupon_type" },
            { data: "coupon_status" },
            { data: "Actions" },
        ],
        columnDefs: [
            {
                targets: [6],
                orderable: false,
            },
        ],
    };
    window.datatable(objectCoustomers);
});

function editCoupon(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.edit_coupons,
        method: "POST",
    };
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $(".setCouponModal").html(data);
        couponUpdateValidation();
        $("#editCouponModal").modal("show");
    });
}

// Delete Coupon Form Funtion
function deleteCoupon(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.delete_coupons,
        method: "POST",
        table: window.couponTable,
    };
    window.ajaxDelete1(data, aditionalData);
}

// Update Coupon Form funtion
function updateCoupon(event) {
    event.preventDefault();
    let data = new FormData($("form#updateCouponForm")[0]);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.update_coupons,
        method: "post",
    };
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        $("#editCouponModal").modal("hide");
        couponTable.ajax.reload(null, false);
        toastr.success("Coupon updated successfully!", "Success");
    });
}

//validate for Cupon Items Fronte
$(document).ready(function () {
    let error_data = {
        formId: "#couponForm",
        appendClass: ".col-md-9",
        rules: {
            coupon_amount: "required",
            coupon_type: "required",
            coupon_status: "required",
        },
    };
    show_error(error_data);
});

$(document).ready(function () {
    let objectCoustomers = {
        dataTableName: window.contactTable,
        url: window.get_contacts,

        type: "GET",
        columns: [
            { data: "name" },
            { data: "email" },
            { data: "description" },
            { data: "Actions" },
        ],
        columnDefs: [
            {
                targets: [3],
                orderable: false,
            },
        ],
    };
    window.datatable(objectCoustomers);
});

function deleteContact(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.delete_contacts,
        method: "POST",
        table: window.contactTable,
    };
    window.ajaxDelete1(data, aditionalData);
}


// Coded by Ripon
(function ($) {
    $(document).ready(function () {
        sliderCreateValidation();
        //socialSettingValidation();
        contactSettingValidation();
        paymentSettingValidation();
        faqValidation();
        privacyPolicyValidation();
        termsValidation();
        refundReturnValidation();
    });
})(jQuery)

function sliderCreateValidation() {
    let error_data = {
        formId: '#sliderForm',
        appendClass: '.col-md-9',
        rules: {
            file: "required",
            title: "required",
            show_button: "required",
            status: "required"
        },
    }
    show_error(error_data)
}

function sliderUpdateValidation() {
    let error_data = {
        formId: '#updateSliderForm',
        appendClass: '.col-md-9',
        rules: {
            title: "required"
        },
    }
    show_error(error_data)
}

function socialSettingValidation() {
    let error_data = {
        formId: '#socialSettingsForm',
        appendClass: '.col-md-9',
        rules: {
            facebook: "required"
        },
    }
    show_error(error_data)
}

function contactSettingValidation() {
    let error_data = {
        formId: '#contactSettingsForm',
        appendClass: '.col-md-9',
        rules: {
            phone_1st: "required",
            email_1st: "required",
        },
    }
    show_error(error_data)
}

function paymentSettingValidation() {
    let error_data = {
        formId: '#paymentRequestForm',
        appendClass: '.col-md-9',
        rules: {
            payment_request_day: "required"
        },
    }
    show_error(error_data)
}
function faqValidation() {
    let error_data = {
        formId: '#faqForm',
        //appendClass: '.col-md-9',
        rules: {
            title: "required",
            description: "required"
        },
    }
    show_error(error_data)
}

function privacyPolicyValidation() {
    let error_data = {
        formId: '#privacyPolicy',
        appendClass: '.col-md-9',
        rules: {
            title: "required",
            description: "required"
        },
    }
    show_error(error_data)
}

function termsValidation() {
    let error_data = {
        formId: '#userOFterms',
        appendClass: '.col-md-9',
        rules: {
            title: "required",
            description: "required"
        },
    }
    show_error(error_data)
}

function refundReturnValidation() {
    let error_data = {
        formId: '#refundReturn',
        appendClass: '.col-md-9',
        rules: {
            title: "required",
            description: "required"
        },
    }
    show_error(error_data)
}

//start sahadat

function categoryCreateValidation(){
    let error_data = {
        formId     : '#categoryForm',
        appendClass: '.col-md-9',
        rules      :  {
            name    : "required",
            position: "required",
            photo    : "required",
        },
    }
    show_error(error_data)
}

function categoryEditValidatation() {
    let error_data = {
        formId     : '#updateCategoryForm',
        rules      :  {
            name    : "required",
            position: "required",
        },
    }
    show_error(error_data)
}

let subCategoryRules  = {
    name       : "required",
    category_id: "required",
}

function subCategoryCreateValidation() {
    let error_data = {
        formId     : '#subCategoryForm',
        appendClass: '.col-md-9',
        rules      :  subCategoryRules,
    }
    show_error(error_data)
}
function subCategoryeditValidation() {
    let error_data = {
        formId     : '#updateSubCategoryForm',
        rules      :  subCategoryRules,
    }
    show_error(error_data)
}

function loadSubCategory() {
    let objectSubCategory = {
        "dataTableName":window.subCategoryTable,
        "url": window.get_sub_category,
        "type": "GET",
        "columns": [
            { "data": "category_id" },
            { "data": "name" },
            { "data": "product" },
            { "data": "photo" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[2],
                "orderable":false,
            },
            {
                "targets":[3],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectSubCategory);
}

function loadCategory() {
    let objectCategory = {
        "dataTableName":window.categoryTable,
        "url": window.get_category,
        "type": "GET",
        "columns":[
            { "data": "name" },
            { "data": "photo" },
            { "data": "position" },
            { "data": "product" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[1],
                "orderable":false,
            },
            {
                "targets":[2],
                "orderable":false,
            },
            {
                "targets":[3],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectCategory);
}

const innerCategoryRules = {
    name           : "required",
    category_id    : "required",
    sub_category_id: "required"
}

function innerCategoryCreateValidation() {
    let error_data = {
        formId     : '#innerCategoryForm',
        appendClass: '.col-md-9',
        rules      :  innerCategoryRules,
    }
    show_error(error_data)
}

function innerCategoryeditValidation() {
    let error_data = {
        formId     : '#updateInnerCategoryForm',
        rules      :  innerCategoryRules,
    }
    show_error(error_data)
}

function loadInnerCategory() {
    let objectInnerCategory = {
        "dataTableName":window.innerCategoryTable,
        "url": window.get_inner_category,
        "type": "GET",
        "columns": [
            { "data": "category_id" },
            { "data": "sub_category_id" },
            { "data": "name" },
            { "data": "product" },
            { "data": "photo" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[3],
                "orderable":false,
            },
            {
                "targets":[4],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectInnerCategory);
}

function editCategory( id ) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.edit_category,
        method:'POST'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $('.setCategroyModal').html(data);
        swithcer();
        categoryEditValidatation();
        $('#editCategoryModal').modal('show');
    });
}

function deleteCategory( id ) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.delete_category,
        method:'POST',
        table:window.categoryTable,
    }
    window.ajaxDelete1(data, aditionalData);
}

function editSubCategory( id ) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.edit_sub_category,
        method:'POST'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $('.setSubCategroyModal').html(data);
        swithcer();
        subCategoryeditValidation();
        $('#editSubCategoryModal').modal('show');

    });
}

function deleteSubCategory( id ) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url:window.delete_sub_category,
        method:'POST',
        table:subCategoryTable,
    }
    window.ajaxDelete1(data, aditionalData);
}

function deleteInnerCategory( id )
{
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url:window.delete_inner_category,
        method:'POST',
        table:innerCategoryTable,
    }
    window.ajaxDelete1(data, aditionalData);
}

function editInnerCategory( id )
{
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.edit_inner_category,
        method:'POST'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $('.setInnerCategroyModal').html(data);
        innerCategoryeditValidation();
        $('#editInnerCategoryModal').modal('show');

    });
}

function updateInnerCategory(event){
    event.preventDefault();
    let data = new FormData( $( 'form#updateInnerCategoryForm' )[ 0 ] );
    data.append('_token', window.token);
    let aditionalData = {
        url:window.update_inner_category,
        method:'post'
    }
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $('#editInnerCategoryModal').modal('hide');
        innerCategoryTable.ajax.reload( null, false );
        toastr.success('Inner category updated successfully!', 'Success');
    });
}

function updateCategory(event){
    event.preventDefault();
    let data = new FormData( $( 'form#updateCategoryForm' )[ 0 ] );
    data.append('_token', window.token);
    let aditionalData = {
        url:window.update_category,
        method:'post'
    }
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        $('#editCategoryModal').modal('hide');
        categoryTable.ajax.reload( null, false );
        toastr.success('Category updated successfully!', 'Success');
    });
}

function updateSubCategory(event){
    event.preventDefault();
    let data = new FormData( $( 'form#updateSubCategoryForm' )[ 0 ] );
    data.append('_token', window.token);
    let aditionalData = {
        url:window.update_sub_category,
        method:'post'
    }
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        $('#editSubCategoryModal').modal('hide');
        subCategoryTable.ajax.reload( null, false );
        toastr.success('Subcategory updated successfully!', 'Success');
    });
}

function getSubcategoryByCategory(){
    let id = $('#category').val();
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.sub_category_by_id,
        method:'POST'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $('#sub-category').html(data);
        console.log(data);

    });
}

function colorCreateValidation() {
    let error_data = {
        formId     : '#colorForm',
        appendClass: '.col-md-9',
        rules      :  {
            name:"required"
        },
    }
    show_error(error_data)
}

function colorEditValidation() {
    let error_data = {
        formId     : '#updateColorForm',
        rules      :  {
            name:"required"
        },
    }
    show_error(error_data)
}
function sizeCreateValidation() {
    let error_data = {
        formId     : '#sizeForm',
        appendClass: '.col-md-9',
        rules      :  {
            name:"required"
        },
    }
    show_error(error_data)
}

function sizeEditValidation() {
    let error_data = {
        formId     : '#updateSizeForm',
        rules      :  {
            name:"required"
        },
    }
    show_error(error_data)
}

function aboutUsCreateValidation(){
    let error_data = {
        formId     : '#aboutUsForm',
        appendClass: '.col-md-9',
        rules      :  {
            title      : "required",
            description: "required",
        },
    }
    show_error(error_data)
}

function contactUsCreateValidation(){
    let error_data = {
        formId     : '#contactInfoForm',
        appendClass: '.col-md-9',
        rules      :  {
            address      : "required",
            phone: "required",
            email: "required",
        },
    }
    show_error(error_data)
}

function faqCreateValidation(){
    let error_data = {
        formId     : '#faqForm',
        appendClass: '.col-md-9',
        rules      :  {
            title: "required",
        },
    }
    show_error(error_data)
}

function faqUpdatetValidation(){
    let error_data = {
        formId     : '#updateFaqForm',
        rules      :  {
            title: "required",
        },
    }
    show_error(error_data)
}

const productRules  = {
    product_name     : "required",
    price            : "required",
    stock            : "required",
    sku              : "required",
    category         : "required",
    cover_image      : "required",
    short_description: "required",
    width            : "required",
    height           : "required",
    weight           : "required",
}

function productCreateValidation() {
    let error_data = {
        formId     : '#productCreateForm',
        rules      : productRules,
    }
    show_error(error_data)
}

function productUpdateValidation() {
    delete productRules.cover_image;
    let error_data = {
        formId     : '#productUpdateForm',
        rules      : productRules,
    }
    show_error(error_data)
}

function couponUpdateValidation(){
    let error_data = {
        formId     : '#updateCouponForm',
        rules      : {
                    coupon_amount: "required",
                    coupon_type  : "required",
                    coupon_status: "required",
                },
    }
    show_error(error_data)
}

function shippingCreateValidation(){
    let error_data = {
        formId     : '#freeShippingForm',
        appendClass: '.col-md-9',
        rules      : {
                    amount       : "required",
                    shipping_name: "required",
                    delivery_time: "required",
                    zip_code     : "required",
                },
    }
    show_error(error_data)
}

function shippingPriceBetweensValidation(){
    let error_data = {
        formId     : '#shippingPriceBetween',
        appendClass: '.col-md-9',
        rules      : {
                        amount_lte_10: "required",
                        amount_lte_20: "required",
                        amount_lte_30: "required",
                        amount_lte_40: "required",
                        amount_lte_50: "required",
                },
    }
    show_error(error_data)
}

function groceryShippingCreateValidation(){
    let error_data = {
        formId     : '#groceryShipping',
        appendClass: '.col-md-9',
        rules      : {
                        zipcodes: "required",
                     },
    }
    show_error(error_data)
}

function vendorValidation(){
    let error_data = {
        formId     : '#vendorProfileForm',
        appendClass: '.col-md-9',
        rules      : {
                        name      : "required",
                        email     : "required",
                        phone     : "required",
                        mobile    : "required",
                        country_id: "required",
                        state_id  : "required",
                        city      : "required",
                        zip_code  : "required",
                     },
    }
    show_error(error_data)
}

function swithcer() {
     // Switchery
     var i = 0;
     if (Array.prototype.forEach) {

         var elems = $('.switchery');
         $.each(elems, function (key, value) {
             var $size = "",
                 $color = "",
                 $sizeClass = "",
                 $colorCode = "";
             $size = $(this).data('size');
             var $sizes = {
                 'lg': "large",
                 'sm': "small",
                 'xs': "xsmall"
             };
             if ($(this).data('size') !== undefined) {
                 $sizeClass = "switchery switchery-" + $sizes[$size];
             } else {
                 $sizeClass = "switchery";
             }

             $color = $(this).data('color');
             var $colors = {
                 'primary': "#967ADC",
                 'success': "#37BC9B",
                 'danger': "#DA4453",
                 'warning': "#F6BB42",
                 'info': "#3BAFDA"
             };
             if ($color !== undefined) {
                 $colorCode = $colors[$color];
             } else {
                 $colorCode = "#37BC9B";
             }

             var switchery = new Switchery($(this)[0], {
                 className: $sizeClass,
                 color: $colorCode
             });
         });
     } else {
         var elems1 = document.querySelectorAll('.switchery');

         for (i = 0; i < elems1.length; i++) {
             var $size = elems1[i].data('size');
             var $color = elems1[i].data('color');
             var switchery = new Switchery(elems1[i], {
                 color: '#37BC9B'
             });
         }
     }
     /*  Toggle Ends   */
}

function loadOrders () {
    let objectOrder = {
        "dataTableName":window.orderTable,
        "url": window.get_orders,
        "type": "GET",
        "columns":[
            { "data": "order_id"},
            { "data": "payment_id"},
            { "data": "user_id"},
            { "data": "created_at"},
            { "data": "seller_id"},
            { "data": "total"},
            { "data": "shipping_method"},
            { "data": "status"},
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[8],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectOrder);
}

function loadDashboardOrder() {
    let objectDashboardOrder = {
        "dataTableName":window.dashboardOrderTable,
        "url": window.get_dashboard_order,
        "type": "GET",
        "columns":[
            { "data": "order_id" },
            { "data": "name" },
            { "data": "total" },
            { "data": "created_at" },
            { "data": "status" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[1],
                "orderable":false,
            },
            {
                "targets":[5],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectDashboardOrder);
}

function changeStatus(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.edit_order_status,
        method:'POST'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (resp) {
        if (resp.warning) {
            toastr.warning(resp.warning, 'Warning');
        }else{
            $('.editModalContainer').html(resp);
            $('#editOrderModal').modal('show');
        }
    });
}

function updateOrderStatus(event) {
    event.preventDefault();
    let data = new FormData( $( 'form#updateOrderStatusForm' )[ 0 ] );
    data.append('_token', window.token);
    let aditionalData = {
        url:window.update_order_status,
        method:'post'
    }
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        $('#editOrderModal').modal('hide');
        dashboardOrderTable.ajax.reload(null, false);
        orderTable.ajax.reload( null, false );
        pendingOrderTable.ajax.reload( null, false );
        cancelOrderTable.ajax.reload( null, false );
        toastr.success(data.success, 'Success');
    });
}

function loadPendingOrders() {
    let objectPendingOrder = {
        "dataTableName":window.pendingOrderTable,
        "url": window.get_orders+'?status=pending',
        "type": "GET",
        "columns":[
            { "data": "order_id"},
            { "data": "payment_id"},
            { "data": "user_id"},
            { "data": "created_at"},
            { "data": "seller_id"},
            { "data": "total"},
            { "data": "shipping_method"},
            { "data": "status"},
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[8],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectPendingOrder);
}

function loadCancelOrders() {
    let objectCancelOrder = {
        "dataTableName":window.cancelOrderTable,
        "url": window.get_orders+'?status=cancel',
        "type": "GET",
        "columns":[
            { "data": "order_id"},
            { "data": "payment_id"},
            { "data": "user_id"},
            { "data": "created_at"},
            { "data": "seller_id"},
            { "data": "total"},
            { "data": "shipping_method"},
            { "data": "status"},
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[8],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectCancelOrder);
}

function viewOrder(id){
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.view_order,
        method:'POST'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (resp) {
        $('.ModalContainer').html(resp);
        $('#orderViewModal').modal('show');
    });
}

function paymentRequest(id) {
    // alert('id=>'+id)
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.payment_request,
        method:'POST'
    }
    let promise = window.ajaxPost(data, aditionalData);
    promise.then(function (resp) {
        if (resp.success) {
            toastr.success(resp.success,'Success!');
        }else{
            toastr.warning(resp.warning,'Warning!');
        }
    });
}

function loadPendingPaymentRequest() {
    let objectPendingPaymentRequest = {
        "dataTableName":window.pendingPaymentRequestTable,
        "url": window.get_pending_payment_request,
        "type": "POST",
        "columns": [
            { "data": "vendor_id" },
            { "data": "order_id" },
            { "data": "total" },
            { "data": "payable" },
            { "data": "requested_at" },
            { "data": "status" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[6],
                "orderable":false,
            },
            {
                "targets":[5],
                "orderable":false,
            },
            {
                "targets":[2],
                "orderable":false,
            },
            {
                "targets":[3],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectPendingPaymentRequest);
}

function paymentModal(id) {
    // alert(`ID=>${id}`);
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.get_payment,
        method:'POST'
    }
    let promise = window.ajaxPost(data, aditionalData);
    promise.then(function (resp) {
        $('.ModalContainer').html(resp);
        $('#PaymentModal').modal('show');
    });
}

function makePaymentToVendor(event){
    event.preventDefault();
    let data = new FormData( $( 'form#paymentForm' )[ 0 ] );
    data.append('_token', window.token);
    let aditionalData = {
        url:window.payment_store,
        method:'post'
    }
    let promise = window.ajaxPost(data, aditionalData);
    promise.then(function (resp) {
        console.log(resp);
        pendingPaymentRequestTable.ajax.reload( null, false );
        toastr.success(resp, 'Success');
        $('#PaymentModal').modal('hide');
    });
}

function loadPayableOrderTable() {
    let objectPayableOrder = {
        "dataTableName":window.payableOrderTable,
        "url": window.get_payable_order,
        "type": "POST",
        "columns":[
            { "data": "order_id" },
            { "data": "seller_id" },
            { "data": "billing_id" },
            { "data": "total" },
            { "data": "payable" },
            { "data": "order_completed_at" },
            { "data": "status" }
        ],
        "columnDefs":[
            {
                "targets":[6],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectPayableOrder);
}

//end sahadat
