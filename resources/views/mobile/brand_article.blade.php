@extends('mobile.mobile')
@section('title') {{$thisarticleinfos->title}} @stop
@section('keywords') {{$thisarticleinfos->keywords}} @stop
@section('description')  {{$thisarticleinfos->description}} @stop
@section('main_content')
    <div class="brand_detail">
        <div class="hd">
            <div class="img_show"><img src="{{$thisarticleinfos->litpic}}" alt="{{$thisarticleinfos->title}}"/></div>
            <div class="cont">
                <h1 class="tit">{{$thisarticleinfos->article->brandname}}</h1>
                <p class="price">基本投资：<em>{{$thisarticleinfos->article->brandpay}}</em></p>
                <p>意向加盟 {{$thisarticleinfos->article->brandattch}}</p>
                <p>申请加盟：{{$thisarticleinfos->article->brandapply}}</p>
                <p>品牌好评率{{rand(85,99)}}%</p>
            </div>
        </div>

        <div class="brand_company">
            <p><strong>公司名称：</strong>{{$thisarticleinfos->article->brandgroup}}</p>
            <p><strong>联系电话：</strong>400-881-3178</p>
            <p><strong>公司地址：</strong>{{$thisarticleinfos->article->brandaddr}}</p>
        </div>
        <div class="brand_tit" id="js_join_1" style="margin-bottom: 8px">@if(!empty($thisarticleinfos->ppjstitle))  <h3 class="tit">{{$thisarticleinfos->ppjstitle}}</h3> @else <span class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>品牌介绍</em></span>  @endif</div>
        <table cellspacing="0" style="border-top: 1px solid rgb(230, 230, 230);">
            <tbody>
            <tr>
                <td class="td_color" >品牌名称</td>
                <td class="td_style">{{$thisarticleinfos['shorttitle']}}</td>
                <td class="td_color">投资金额</td>
                <td class="td_style">{{$thisarticleinfos->article['brandpay']}}</td>
            </tr>
            <tr>
                <td class="td_color" >成立日期</td>
                <td class="td_style">{{$thisarticleinfos->article['brandtime']}}</td>
                <td class="td_color">门店总数</td>
                <td class="td_style">{{$thisarticleinfos->article['brandnum']}}</td>
            </tr>
            <tr>
                <td class="td_color">经营范围</td>
                <td class="td_style">{{$thisarticleinfos->article['brandmap']}}</td>
                <td class="td_color">适合人群</td>
                <td class="td_style">{{$thisarticleinfos->article['brandperson']}}</td>
            </tr>
            <tr>
                <td class="td_color">加盟区域</td>
                <td class="td_style">{{$thisarticleinfos->article['brandarea']}}</td>
                <td class="td_color">是否有区域授权</td>
                <td class="td_style">{{$thisarticleinfos->article['brandduty']}}</td>
            </tr>
            <tr>
                <td class="td_color">品牌发源地</td>
                <td class="td_style">{{$thisarticleinfos->article['brandorigin']}}</td>
                <td class="td_color">合同期限</td>
                <td class="td_style"></td>
            </tr>
            <tr>
                <td class="td_color">培训期限</td>
                <td class="td_style">二周</td>
                <td class="td_color">特许使用费</td>
                <td class="td_style"></td>
            </tr>
            <tr>
                <td class="td_color">公司名称</td>
                <td class="td_style">{{$thisarticleinfos->article['brandgroup']}}</td>
                <td class="td_color">公司性质</td>
                <td class="td_style">{{$thisarticleinfos->article['genre']}}</td>
            </tr>
            <tr>
                <td class="td_color">所需面积</td>
                <td class="td_style">{{$thisarticleinfos->article['acreage']}}</td>
                <td class="td_color"> </td>
                <td class="td_style"> </td>
            </tr>
            </tbody>
        </table>

        <div class="brand_cont">
            {!! $thisarticleinfos->article->body !!}
      	</div>
        <div class="brand_tit" id="js_join_">@if(!empty($thisarticleinfos->jmxqtitle))  <h3 class="tit">{{$thisarticleinfos->jmxqtitle}}</h3> @else <span class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>加盟详情</em></span>  @endif</div>
        <div class="brand_cont">
            {!! $thisarticleinfos->article->jmxq_content !!}
        </div>

        <div class="brand_tit" id="js_join_2">@if(!empty($thisarticleinfos->jmystitle))  <h3 class="tit">{{$thisarticleinfos->jmystitle}}</h3> @else <span class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>加盟优势</em></span>  @endif </div>

        <div class="brand_cont">
            {!! $thisarticleinfos->article->jmys_content !!}
        </div>
        <div class="brand_tit" id="js_join_3">@if(!empty($thisarticleinfos->jmlctitle))  <h3 class="tit">{{$thisarticleinfos->jmlctitle}}</h3> @else <span class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>加盟流程</em></span>  @endif </div>
        <div class="brand_cont">
            {!! $thisarticleinfos->article->jmlc_content !!}
        </div>
        <div class="brand_tit" id="js_join_4">@if(!empty($thisarticleinfos->jmzctitle))  <h3 class="tit">{{$thisarticleinfos->jmzctitle}}</h3> @else <span class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>加盟政策</em></span>   @endif </div>
        <div class="brand_cont">
            {!! $thisarticleinfos->article->jmzc_content !!}
        </div>
        <div class="brand_tit" id="js_join_5">@if(!empty($thisarticleinfos->jmasktitle))  <h3 class="tit" >{{$thisarticleinfos->jmasktitle}}</h3> @else <span class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>加盟问答</em></span>  @endif </div>
        <div class="brand_cont">
            {!! $thisarticleinfos->article->jmask_content !!}
        </div>
        <div class="index_btn" > <a href="#" class="btn_2">开店咨询</a> <a href="#" class="btn">索取资料</a> </div>
        <div class="brand_tit" > <span class="tit">【{{$thisarticleinfos['shorttitle']}}】<em>品牌展示</em></span> </div>
        <div class=" join_img">
            <ul>
                @foreach( array_filter(explode(',',$thisarticleinfos->article['imagepics'])) as $pics)
                    <li><img src="{{$pics}}" alt="【{{$thisarticleinfos->shorttitle}}】"/></li>
                @endforeach
            </ul>
        </div>
        <div class="clear"></div>
        <div class="brand_tit" style="margin-bottom: 10px;" > <h2 class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>投资分析</em></h2> </div>
        <table cellspacing="0" style="border-top: 1px solid rgb(230, 230, 230);">
            <tbody>
            <tr>
                <td class="td_color" >品牌名称</td>
                <td class="td_style">{{$thisarticleinfos->article['brandname']}}</td>
                <td class="td_color">装修费用</td>
                <td class="td_style">{{$thisarticleinfos->article['decorationpay']}}</td>
            </tr>
            <tr>
                <td class="td_color" >前两季度房租</td>
                <td class="td_style">{{$thisarticleinfos->article['quartersrent']}}</td>
                <td class="td_color">货铺/设备费用</td>
                <td class="td_style">{{$thisarticleinfos->article['equipmentcost']}}</td>
            </tr>
            <tr>
                <td class="td_color">流动资金</td>
                <td class="td_style">{{$thisarticleinfos->article['workingcapital']}}</td>
                <td class="td_color">人工开支</td>
                <td class="td_style">{{$thisarticleinfos->article['laborquarter']}}</td>
            </tr>
            <tr>
                <td class="td_color">工商税务杂项</td>
                <td class="td_style">{{$thisarticleinfos->article['miscellaneous']}}</td>
                <td class="td_color">水电煤(元/月)</td>
                <td class="td_style">{{$thisarticleinfos->article['watercoal']}}</td>

            </tr>
            <tr>
                <td class="td_color">日成交量</td>
                <td class="td_style">{{$thisarticleinfos->article['dailyvolume']}}</td>
                <td class="td_color">平均单价</td>
                <td class="td_style">{{$thisarticleinfos->article['unitprice']}}</td>

            </tr>
            <tr>
                <td class="td_color">日均成本</td>
                <td class="td_style">{{($thisarticleinfos->article['decorationpay']/365)+($thisarticleinfos->article['quartersrent']/180)+($thisarticleinfos->article['equipmentcost']/365)+($thisarticleinfos->article['laborquarter']/365)+($thisarticleinfos->article['miscellaneous']/365)+($thisarticleinfos->article['watercoal']/30)}}</td>
                <td class="td_color">日均收入</td>
                <td class="td_style">{{($thisarticleinfos->article['dailyvolume']*$thisarticleinfos->article['dailyvolume'])-(($thisarticleinfos->article['decorationpay']/365)+($thisarticleinfos->article['quartersrent']/180)+($thisarticleinfos->article['equipmentcost']/365)+($thisarticleinfos->article['laborquarter']/365)+($thisarticleinfos->article['miscellaneous']/365)+($thisarticleinfos->article['watercoal']/30))}}</td>
            </tr>
            <tr>
                <td class="td_color">月收入</td>
                <td class="td_style">{{$thisarticleinfos->article['brandgroup']}}</td>
                <td class="td_color">公司性质</td>
                <td class="td_style">{{$thisarticleinfos->article['genre']}}</td>
            </tr>
            <tr>
                <td class="td_color">年收入</td>
                <td class="td_style">{{$thisarticleinfos->article['acreage']}}</td>
                <td class="td_color"> 投资总额</td>
                <td class="td_style"> </td>
            </tr>
            </tbody>
        </table>

        <div class="join_intro clear">
            <div class="col-md-6">

                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$thisarticleinfos->article['brandname']}} 投资比例</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="pieChart" style="height:250px"></canvas>
                    </div>

                </div>

            </div>
            <hr/>
            <div class="col-md-6">

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$thisarticleinfos->article['brandname']}}投资对比柱状图</h3>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="barChart" style="height:230px"></canvas>
                        </div>
                    </div>

                </div>


            </div>

        </div>

        <div class="clear"></div>
@include('mobile.comments')


    </div>
	<div class="index_news rela_news">
		<div class="common_tit">
			<a class="tit">相关文章</a>
		</div>
		<div class="bd">
			<ul>
                @foreach($xgsearchs as $xgsearch)
                    <li><span class="date">{{$xgsearch->published_at}}</span><a class="txt" href="/{{$xgsearch->arctype->real_path}}/{{$xgsearch->id}}.shtml" title="{{$xgsearch->title}}">{{$xgsearch->title}} </a></li>
                @endforeach
              </ul>
		</div>
	</div>
    <div class="index_news rela_news">
        <div class="common_tit">
            <a class="tit">最新零食新闻</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($latesnews as $latesnew)
                    <li><span class="date">{{$latesnew->published_at}}</span><a class="txt" href="/{{$latesnew->arctype->real_path}}/{{$latesnew->id}}.shtml" title="{{$latesnew->title}}">{{$latesnew->title}} </a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <script src="/AdminLTE/plugins/chartjs/Chart.min.js"></script>
    <script>
        $(function () {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.

            var areaChartData = {
                labels: ["三只松鼠", "良品铺子", "一扫光", "老婆大人", "怡佳人", "零食多", "舌间味"],
                datasets: [
                    {
                        label: "其他热门品牌",
                        fillColor: "rgba(210, 214, 222, 1)",
                        strokeColor: "rgba(210, 214, 222, 1)",
                        pointColor: "rgba(210, 214, 222, 1)",
                        pointStrokeColor: "#c1c7d1",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [90000, 80000, 70000, 60000, 50000, 40000, 70500]
                    },
                    {
                        label: "{{$thisarticleinfos->article['brandname']}}",
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "rgba(60,141,188,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: [28000, 20000, 28000, 28000, 28000, 28000, 28000]
                    }
                ]
            };

            var areaChartOptions = {
                //Boolean - If we should show the scale at all
                showScale: true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines: false,
                //String - Colour of the grid lines
                scaleGridLineColor: "rgba(0,0,0,.05)",
                //Number - Width of the grid lines
                scaleGridLineWidth: 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines: true,
                //Boolean - Whether the line is curved between points
                bezierCurve: true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension: 0.3,
                //Boolean - Whether to show a dot for each point
                pointDot: false,
                //Number - Radius of each point dot in pixels
                pointDotRadius: 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth: 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius: 20,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke: true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth: 2,
                //Boolean - Whether to fill the dataset with a color
                datasetFill: true,
                //String - A legend template
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };


    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: {{$thisarticleinfos->article['decorationpay']}},
        color: "#f56954",
        highlight: "#f56954",
        label: "店铺装修费用"
      },
      {
        value: {{$thisarticleinfos->article['quartersrent']}},
        color: "#00a65a",
        highlight: "#00a65a",
        label: "前两季度房租"
      },
      {
        value: {{$thisarticleinfos->article['equipmentcost']}},
        color: "#f39c12",
        highlight: "#f39c12",
        label: "铺货/设备费用"
      },
      {
        value: {{$thisarticleinfos->article['workingcapital']}},
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "流动资金"
      },
      {
        value: {{$thisarticleinfos->article['laborquarter']}},
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "一季度人工开支"
      },
       {
        value: {{$thisarticleinfos->article['watercoal']}},
        color: "#ec8dbc",
        highlight: "#3c8dbc",
        label: "水电煤(元/月)"
      },
      {
        value: {{$thisarticleinfos->article['miscellaneous']}} ,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "工商税务等杂项"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
@stop
