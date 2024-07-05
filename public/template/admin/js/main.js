$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function Remove(id,url) {
    if(confirm("Xoá không thể khôi phục đâu nhé")){
        $.ajax({
            type:'DELETE',
            dataType : 'JSON',
            data : {id},
            url: url,
            success: function (result) {
                if(!result.error){
                    alert(result.message);
                    location.reload();
                }else{
                    alert("Xoá lỗi");
                }
            }
        })
    }

}
$('#upload').change(function (){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results) {
            if (results.error == false){
                $('#image_show').html('<a href="'+ results.url +'" target="_blank"><img src="'+results.url+'" width="100px"></a>');
                $('#thumb').val(results.url);
            }else{
                alert('Upload File Bị lỗi');
            }
        }
    });
})
