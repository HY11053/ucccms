@include('vendor.ueditor.assets')
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container',{
        toolbars: [
            ['bold', 'italic', 'underline', 'strikethrough', 'blockquote','forecolor','backcolor',
                'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'unlink', 'insertimage',
                'imageleft',
                'imageright',
                'imagecenter',
                'superscript',
                'subscript',
                'autotypeset',
                'lineheight',
                'pasteplain',
                'selectall',
                'removeformat',
                'formatmatch',
                'cleardoc',
                'rowspacingtop',
                'rowspacingbottom',
                'customstyle',
                'paragraph',
                'fontfamily',
                'fontsize',
                'directionalityltr',
                'directionalityrtl',
                'indent',
                'touppercase', //字母大写
                'tolowercase', //字母小写
                'anchor', //锚点
                'insertvideo','music',
                'insertcode', //代码语言
                'template', //模板
                'horizontal', //分隔线
                'time', //时间
                'date', //日期
                'spechars', //特殊字符
                'inserttable',
                'deletetable', //删除表格
                'insertparagraphbeforetable', //"表格前插入行"
                'insertrow', //前插入行
                'deleterow', //删除行
                'insertcol', //前插入列
                'deletecol', //删除列
                'mergecells', //合并多个单元格
                'mergeright', //右合并单元格
                'mergedown', //下合并单元格
                'splittocells', //完全拆分单元格
                'splittorows', //拆分成行
                'splittocols', //拆分成列
                'charts', // 图表
                'source', //源代码
                'emotion', 'fullscreen']
        ],
        elementPathEnabled: false,
        enableContextMenu: true,
        autoClearEmptyNode:true,
        initialFrameHeight:500,
        wordCount:false,
        imagePopup:false,
        autotypeset:{ indent: true,imageBlockLine: 'center' }
    });
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>