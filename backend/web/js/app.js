function send(_url, formData=null) {
    $.ajax({
        url:_url,
        type:"POST",
        dataType:"json",
        data:formData,
        success:function (data) {
            if (data.status == false){

                $("#my-Modal").modal('show').find('.modal-body').html(data.content);

                $("#save-button").click(function (e) {
                    e.preventDefault();
                    let form = $("#my-data").serialize();
                    send(_url, form);
                    return false;
                })
                return false;
            }else{

                $.pjax.reload({container:"#pjax-data"});
                $("#my-Modal").modal('hide');

            }

        }
    })
}
