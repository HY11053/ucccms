@inject('headers',App\Header')
<div class="header">
    <p class="title"><img src="/mobiles/images/logo.png" alt="零食加盟网"/></p>
    <p class="mcate"><b>分类</b></p>
    <div class="d_nav">
        <ul>
            @foreach($headers->HeaderLists() as $real_path=>$header)
                <li><a href="/{{$real_path}}/" >{{$header}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<div class="search">
    <input type="text" name="keyword" class="search_txt" maxlength="18" id="keyword" value="输入您要找的项目">
    <a type="submit" class="search_btn"></a>
</div>
<div id="focus" class="focus">
    <div class="hd">
        <ul>
        </ul>
    </div>
    <div class="bd">
        <ul>
            <li><a href="/lingshidianpp/5.shtml"><img _src="/mobiles/images/temp/bn1.jpg" src="/mobiles/images/blank.png" /></a></li>
            <li><a href="/lingshidianpp/38.shtml"><img _src="/mobiles/images/temp/bn2.jpg" src="/mobiles/images/blank.png"/></a></li>
            <li><a href="/lingshidianpp/91.shtml"><img _src="/mobiles/images/temp/bn3.jpg" src="/mobiles/images/blank.png"/></a></li>
            <li><a href="/lingshidianpp/111.shtml"><img _src="/mobiles/images/temp/bn4.jpg" src="/mobiles/images/blank.png"/></a></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    TouchSlide({
        slideCell:"#focus",
        titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell:".bd ul",
        effect:"left",
        autoPlay:true,//自动播放
        autoPage:true, //自动分页
        switchLoad:"_src" //切换加载，真实图片路径为"_src"
    });
</script>