function to_slug(str) {
    str = str.toLowerCase();

    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
    str = str.replace(/(đ)/g, 'd');

    str = str.replace(/([^0-9a-z-\s])/g, '');

    str = str.replace(/(\s+)/g, '-');

    str = str.replace(/^-+/g, '');

    str = str.replace(/-+$/g, '');

    return str;
}

function changeStatus(id, status, endpoint) {
    if (confirm("Bạn chắc chắn muốn đổi trạng thái?")) {
        var url = window.location.origin;
        $.ajax({
            url: url + '/sb-admin' + endpoint,
            method: 'GET',
            data: {
                id: id,
                status: status
            },
            success: function (res) {
                alert(res.msg);
                location.reload();
            },
            error: function (error) { 
                alert(error.responseJSON.msg);
            }
        });
    }
}

function deleteRow(id, endpoint) {
    var r = confirm("Chắc chắn xoá?");
    if (r == true) {
        var url = window.location.origin;
        $.ajax({
            url: url + '/sb-admin' + endpoint,
            method: 'GET',
            data: {
                id: id
            },
            success: function (res) {
                alert(res.msg);
                location.reload();
            },
            error: function (error) {
                alert(error.responseJSON.msg);
            }
        });
    } else {
        // user did not agree, do something else
    }
}