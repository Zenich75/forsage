function openModal(id) {
    var obj = $('#' + id);
    if(obj) {
        obj.show();
    }
}

function closeModal(id) {
    var obj = $('#' + id);
    if(obj) {
        obj.hide();
    }
}