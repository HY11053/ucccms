$(function(){
    var Obj = $.cookie('prosion');
    var proLayer = $("#bybLayer");
    var selectedplan = $("#selectedplan");
    if(Obj && Obj !='null'){
        selectedplan.append(Obj);
        $("#Db_number").text($('#selectedplan a').length);
        proLayer.show();
        if($('#selectedplan a').length>0){
            for(var i=0;i<=$('#selectedplan a').length;i++){
                var checks = "Db_"+$('#selectedplan a').eq(i).attr('pid');
                if($("#"+checks)){
                    $("#"+checks).attr('checked',true);
                }
            }
        }
    }else{
        proLayer.hide();
    }
});
// 选择项目
$(function(){
    var proBox = $("#productBox");
    var proLayer = $("#bybLayer");
    var selectedplan = $("#selectedplan");
    var bybNumber = $("#bybNumber");
    var bybReset = $("#bybReset");
    var suBtn = $(".byb-submit");
    proBox.delegate(".checkbox","change", function(){
        var $this = $(this);
        var data = $.parseJSON($(this).attr("data-pro"));
        if($('#selectedplan a').length<3 && $("#productBox .checkbox:checked").length<=3){
//            console.log($('#selectedplan a[pid="'+data.pid+'"]').length);
            if( $('#selectedplan a[pid="'+data.pid+'"]').length != 0 ){
                $('#selectedplan a[pid="'+data.pid+'"]').remove();
            }else{
                selectedplan.append('<a href="' + data.url + '" pid="' + data.pid + '" target="_blank" id="closebg_'+data.pid+'"><img src="' + data.pic + '"><em>' + data.name + '</em><input name="dataId_' + data.pid + '" type="hidden" value="' + data.pid + '"></a>');
                var Obj = selectedplan.html();
                $.cookie('prosion',Obj,{path:'/',domain:'www.58lingshi.com'});
                $("#Db_number").text($('#selectedplan a').length);
                proLayer.show();
            }
            if(!$('#selectedplan a').length){proLayer.hide();}
        }else{
            var  value = [];
            $('#selectedplan a').each(function(){
                value.push($(this).attr('pid'));
            });
            if(value.indexOf($this.attr('cid'))>=0){
                $('#selectedplan a[pid="'+$this.attr('cid')+'"]').remove();
                var Obj = selectedplan.html();
                $.cookie('prosion',Obj,{path:'/',domain:'www.58lingshi.com'});

            }else if($("#productBox .checkbox:checked").length>3){
                $("#error").text("项目对比最多可选三个!");
                $("#limit-tips_un").dialog();
            }



//            alert("项目对比最多可选三个!");
            $this.attr("checked",false);
        }

    });
    bybReset.bind("click", function(){
        selectedplan.html('');
        $.cookie('prosion',null,{path:'/',domain:'www.58lingshi.com'});
        proLayer.hide();
        $("#productBox .checkbox").attr("checked",false);
    });

    $('#byb-submit').click(function(){
        var url = "/comparision/";

        if($("#selectedplan a").length>=1){
            url+= $("#selectedplan a").eq(0).attr('pid')+"-";
        }else{
            url+= "0-";
        }
        if($("#selectedplan a").length>=2){
            url+= $("#selectedplan a").eq(1).attr('pid')+"-";
        }else{
            url+= "0-";
        }
        if($("#selectedplan a").length==3){
            url+= $("#selectedplan a").eq(2).attr('pid')+".shtml";
        }else{
            url+= "0.shtml";
        }
        window.location.href=url;
    });

});