@extends('layouts.user')

@section("title")
    Geneology - Tree
@endsection

@section('styles')
<link rel="stylesheet" href="/userfiles/vendor/getOrgChart/getorgchart.css">
<style type="text/css">

    @@media (max-width: 420px) {
        #chart-container
        {
            width: 100%;
            height: 470px;
        }

    }

    @media (min-width: 421px)
    {
        #chart-container
        {
            width: 100%;
            height: 100%;
        }
    }

    .get-text {
        fill: #686868 !important;
    }

    .myCustomTheme-box {
        fill: #FFFFFF;
        stroke: #DDDAB9;
    }

    .reporters {
        fill: #0072C6;
    }
    .reporters-text {
        fill: #ffffff;
    }

    .get-blue.get-org-chart > a
    {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div id="chart-container"></div>
    </div>
</div>
@endsection


@section('scripts')
<script src="/userfiles/vendor/getOrgChart/getorgchart.js"></script>

<script type="text/javascript">
    getOrgChart.themes.myCustomTheme =
    {
        size: [270, 400],
        toolbarHeight: 106,
        textPoints: [
            { x: 130, y: 50, width: 250 },
            { x: 130, y: 90, width: 250 }
        ],
        textPointsNoImage: [
            { x: 130, y: 50, width: 250 },
            { x: 130, y: 90, width: 250 }
        ],
        expandCollapseBtnRadius: 20,
        defs: '<filter id="f1" x="0" y="0" width="200%" height="200%"><feOffset result="offOut" in="SourceAlpha" dx="5" dy="5" /><feGaussianBlur result="blurOut" in="offOut" stdDeviation="5" /><feBlend in="SourceGraphic" in2="blurOut" mode="normal" /></filter>',
        box: '<rect x="0" y="0" height="400" width="270" rx="10" ry="10" class="myCustomTheme-box" filter="url(#f1)"  />',
        text: '<text text-anchor="middle" width="[width]" class="get-text get-text-[index]" x="[x]" y="[y]">[text]</text>',
        image: '<clipPath id="getMonicaClip"><circle cx="135" cy="255" r="85" /></clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#getMonicaClip)" xlink:href="[href]" x="50" y="150" height="190" width="170"/>',
        reporters: '<circle cx="80" cy="190" r="20" class="reporters"></circle><text class="reporters-text" text-anchor="middle" width="100" x="80" y="195">[reporters]</text>'

    };


        var peopleElement = document.getElementById("chart-container");
        var orgChart = new getOrgChart(peopleElement, {
            theme: "myCustomTheme",
            enableGridView: false,
            enableEdit: false,
            enableDetailsView: false,
            primaryFields: ["name", "joined"],
            photoFields: ["image"],
            renderNodeEvent: renderNodHandler,
            expandToLevel: 6,

            dataSource: <?php echo $geneologyJSON; ?>
        });

        function renderNodHandler(sender, args) {
            for (var i = 0; i < args.content.length; i++) {
                if (args.content[i].indexOf("[reporters]") != -1) {
                    args.content[i] = args.content[i].replace("[reporters]", args.node.children.length);
                }
            }
        }
</script>

@endsection
