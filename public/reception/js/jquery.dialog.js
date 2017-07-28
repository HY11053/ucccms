/**
 * Created by mikesonia on 2017/1/24.
 */
(function ($){
    /**
     * @author 梁李良
     * 弹出层
     * @version v1.06
     * @param  {boolean} isfixed 是否用fixed定位
     * @param  {boolean} isbgDiv 是否创建遮蔽层
     * v1.06 2012-06-20 修改：加入isbgDiv参数
     * v1.05 2011-11-24 修改：加入固定弹出层样式
     * v1.04 2011-10-19 修改：IE6下关闭窗口解除滚动事件时，只解除dialog里的滚动定位事件
     * v1.03 2011-9-21 修改：如果对象不存在则直接退出函数
     * $('div').dialog();
     **/
    $.fn.dialog = function (isfixed, isbgDiv){
        var box = $(this);
        if (! box[0]){
            return this;
        }
        if(isfixed == null || typeof isfixed != 'boolean'){
            isfixed = true;
        }

        if(isbgDiv == null || typeof isbgDiv != 'boolean'){
            isbgDiv = true;
        }

        var pageSizeArr = [
            document.documentElement.scrollWidth,
            document.documentElement.scrollHeight,
            document.documentElement.clientWidth,
            document.documentElement.clientHeight
        ];
        var isIE6 = $.browser.msie && $.browser.version == '6.0';
        $('.close', box).bind('click', function (e){
            e.preventDefault();
            if ($.browser.msie){
                $('#dialogBackground').hide();
                $('#dialogBackgroundiframe').hide();
                box.hide();
            } else {
                $('#dialogBackground').fadeOut(200);
                $('#dialogBackgroundiframe').fadeOut(200);
                box.fadeOut(200);
            }
            $(this).unbind('click');
            $(window).unbind('scroll.dialogScroll');
        });

        var createDialog = function (){
            //如果是IE6 则创建iframe
            if (isIE6){
                var backgroundiframe = $('<iframe>',{
                    id: 'dialogBackgroundiframe',
                    frameborder: '0'
                }).css({
                    position: 'absolute',
                    background: '#000',
                    zIndex: 990,
                    //border: '1px solid red',
                    top: 0,
                    left: 0,
                    width: pageSizeArr[2] > pageSizeArr[0] ? pageSizeArr[2] : pageSizeArr[0],
                    height: pageSizeArr[3] > pageSizeArr[1] ? pageSizeArr[3] : pageSizeArr[1],
                    zoom:1,
                    display: 'none'
                });

                if ($.browser.msie){
                    backgroundiframe.css('filter', 'Alpha(Opacity=40)');
                } else {
                    backgroundiframe.css('opacity', '0.4');
                }
                backgroundiframe.appendTo('body');
                backgroundiframe.show();
            }

            var backgroundDiv = $('<div>',{
                id: 'dialogBackground'
            }).css({
                position: 'absolute',
                background: '#000',
                zIndex: 991,
                top: 0,
                left: 0,
                width: pageSizeArr[2] > pageSizeArr[0] ? pageSizeArr[2] : pageSizeArr[0],
                height: pageSizeArr[3] > pageSizeArr[1] ? pageSizeArr[3] : pageSizeArr[1],
                zoom:1,
                display: 'none'
            });
            if ($.browser.msie){
                backgroundDiv.css('filter', 'Alpha(Opacity=40)');
            } else {
                backgroundDiv.css('opacity', '0.4');
            }
            backgroundDiv.appendTo('body');
            backgroundDiv.show();
        };

        var dialogshow = function (){
            if (isbgDiv){
                if ($('#dialogBackground')[0]) {
                    $('#dialogBackground').show();
                    $('#dialogBackgroundiframe').show();
                } else {
                    createDialog();
                }
            }
            if (isIE6 || ! isfixed){
                box.css({
                    position: 'absolute',
                    zIndex: 999,
                    top: document.documentElement.scrollTop + (document.documentElement.clientHeight - box.height()) / 2,
                    left: document.documentElement.scrollLeft + (document.documentElement.clientWidth - box.width()) / 2,
                    marginTop: 0,
                    marginLeft: 0
                });
            } else {
                box.css({
                    position: (isfixed ? 'fixed' : 'absolute'),
                    zIndex: 999,
                    left: '50%',
                    marginLeft: 0 - box.width() / 2,
                    top: '50%',
                    marginTop: 0 - box.height() / 2
                });
            }
            box.show();
        };

        if (isIE6 && isfixed){
            $(window).bind('scroll.dialogScroll', function (){
                box.css({
                    top: document.documentElement.scrollTop + (document.documentElement.clientHeight - box.height()) / 2,
                    left: document.documentElement.scrollLeft + (document.documentElement.clientWidth - box.width()) / 2
                });
            });
        }

        dialogshow();
        return this;
    };
})(jQuery);