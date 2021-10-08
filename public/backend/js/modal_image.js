// Sự kiện modal lấy 1 ảnh
$('#modal-image').on('hide.bs.modal',function(){
    // Lấy value của input có id = image
    var image = $('#image').val();
    $('#img_image').attr('src',image);
});
