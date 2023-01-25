$(document).ready(function () {
    showAllLinks();
});

// insert link
$(document).on('click', '#submit', function (e) {
    e.preventDefault();
    const action = 'insert';
    $.ajax({
        url: 'backend/action.php',
        type: 'POST',
        data: $('#formData').serialize() + '&action=' + action,
        success: function (response) {
            $('#formData')[0].reset();
            showAllLinks();
        }
    });
});

// delete link
$(document).on('click', '.delete', function (e) {
    e.preventDefault();
    const action = 'delete';
    const delete_id = $(this).data('id');
    const confirm_del = confirm("Are you sure?");
    if (confirm_del === true) {
        $.ajax({
            url: 'backend/action.php',
            type: 'POST',
            data: {id: delete_id, action: action},
            success: function (response) {
                $(this).closest('tr').fadeOut(800, function () {
                    $(this).remove();
                });
                showAllLinks();
            }
        });
    }
});

// update clicks counter
$(document).on('click', '#addClick', function () {
    console.log('click on link');
    const action = 'update_clicks';
    const link_id = $(this).data('click');
    $.ajax({
        url: 'backend/action.php',
        type: 'POST',
        data: {id: link_id, action: action},
        success: function (response) {
            $(this).closest('tr').fadeOut(800, function () {
                $(this).replaceWith(response);
            });
            showAllLinks();
        }
    });
});

// view all links
function showAllLinks() {
    $.ajax({
        url: 'backend/action.php',
        type: 'POST',
        data: {
            action: 'view'
        },
        success: function (response) {
            $('#linksList').html(response);
        }
    });
}
