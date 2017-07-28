$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
});
$(function(){
//详情菜单
 $(".header .mcate b").click(function(){
	    $('.d_nav').slideToggle();
});

//搜索框
$('input:text').each(function(){  
	var txt = $(this).val();
	$(this).css("color","#ccc");
	$(this).focus(function(){  
		if(txt === $(this).val()){$(this).val(""); $(this).css("color","#333");} 
	}).blur(function(){  
		if($(this).val() === "") {$(this).val(txt); $(this).css("color","#ccc");} 
	});  
});

//弹窗留言
$("#js_popup").click(function(){
	$(".popup_mask").show();	
});
$(".popup_close").click(function(){
	$(".popup_mask").hide();
});

});
/*
数据提交
 */
$(function(){


    $("#submit_sub").click(function(){

        var phoneno = $("#phone_msg").val();
        var name=$("#name_msg").val();
        var note=$("#note_msg").val();
        var host=window.location.href;


        if( phoneno  && /^1[3|4|5|8]\d{9}$/.test(phoneno) ){
            $.ajax({
                //提交数据的类型 POST GET
                type:"POST",
                //提交的网址
                url:"/phone/complate",
                //提交的数据
                data:{"phoneno":phoneno,"name":name,"note":note,"host":host},
                //返回数据的格式
                datatype: "html",    //"xml", "html", "script", "json", "jsonp", "text".

                success:function (response, stutas, xhr) {
                    alert(response);
                    $("#results").html(response);
                }
            });

        } else{
            alert("您输入的手机号码"+phoneno+"不正确，请重新输入")
        }
    })
});

$(function(){


    $("#msg_sub").click(function(){

        var phoneno = $("#msg_phone").val();
        var name=$("#msg_name").val();
        var note=$("#msg_cont").val();
        var host=window.location.href;


        if( phoneno  && /^1[3|4|5|8]\d{9}$/.test(phoneno) ){
            $.ajax({
                //提交数据的类型 POST GET
                type:"POST",
                //提交的网址
                url:"/phone/complate",
                //提交的数据
                data:{"phoneno":phoneno,"name":name,"note":note,"host":host},
                //返回数据的格式
                datatype: "html",    //"xml", "html", "script", "json", "jsonp", "text".

                success:function (response, stutas, xhr) {
                    alert(response);
                    $("#results").html(response);
                }
            });

        } else{
            alert("您输入的手机号码"+phoneno+"不正确，请重新输入")
        }
    })
});

$(function(){
    $(".content img,.brand_cont img").addClass("img-responsive center-block").css('height','auto').css('border-radius','5px');
    $(".wec_tftable").css('width','100%');
})