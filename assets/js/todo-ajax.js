function manageTasksAjax(event, taskName, key = 10000, type = '') {
    event.preventDefault();


    jQuery.ajax({
        url: todo_ajax_obj.ajaxurl,
        data: {
            'action': 'todo_ajax_request',
            'name': taskName,
            'key': key,
            'type': type,
            'nonce': todo_ajax_obj.nonce
        },
        success: function (data) {

            console.log(data);
        },
        error: function (errorThrown) {
            console.log(errorThrown);
        }
    });


}