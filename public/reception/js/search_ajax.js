/**
 * Created by liang on 2016/10/29.
 */
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
});
$(function(){
    $("#sub_btn").click(function () {
        var cname=$(":input[name =select1]").val();
        var brandpay=$(":input[name =select2]").val();
        var acreage=$(":input[name =select3]").val();

        $.ajax({
            type:"POST",
            url:'/project',
            data:{"cname":cname,"brandpay":brandpay,"acreage":acreage},
            success: function (response, stutas, xhr) {
                if(response=='请选择行业分类'){
                    alert(response);
                }else{
                    window.location.href=response;
                }

                console.log(response);

            }
        });
    });
});
