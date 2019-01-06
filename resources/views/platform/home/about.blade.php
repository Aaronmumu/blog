@extends('platform.layouts._header')

@section('body')
    <div class="banner-int gef-banner">
        <div class="wrapper gef-s"></div>
        <div class="banner-bg"><img src="/platform/img/sub_banner3.jpg" alt=""></div>
    </div>
    <div class="wrapper">
        <div class="layerbody">
            <div class="ykTitle"><h2>了解易可达</h2></div>
            <div class="details">
                <p>公司名取义“操作简易，四通八达”，主要从事全球仓储配送服务，和头程运输服务，坚持用专业化和规模化的管理，来降低跨境电商头程运输和订单配送成本，实现头程、海外仓储、转运代收、订单管理、售前售后的优质服务。易可达自主研发了一套完善的物流管理系统——订单管理系统（OMS）和运输订单管理系统（TOMS），以现代物流信息系统为核心、以海外仓储为支撑，专注于为跨境电商提供全程物流合作伙伴。</p>
                <p>&nbsp;</p>
                <p>易可达与多家国际知名物流商结成深度合作伙伴关系，头程服务商有 UPS、DHL、FEDEX、TNT、MSK、MSC、HMM、ONE、PIL、YML、EMC、OOCL、APL、HPL、WHL、ZIMFEDEX;尾程服务商有FEDEX、USPS、ROYAL MAIL 、UPS、HERMES、AU POST等。目前与多家国际知名电商平台达成长期良好的合作关系，Amazon、AliExpress、Ebay、Wish。并实现多家第三方ERP系统无缝对接，通途、赛盒、芒果店长、普源、马帮等。我们的宗旨是致力于为客户提供最优质的服务，我们的愿景是成为全球最大的网络贸易公司。</p>
            </div>
        </div>
        <div class="layerbody chronicle">
            <div class="ykTitle"><h2>大事记</h2></div>
            <?php foreach ($list as $key=>$item) {?>
            <div class="item">
                <div class="year"><h3><?php echo $key;?></h3></div>
                <div class="thebody">
                    <ul class="things">
                        <?php foreach ($item as $li) {?>
                        <li>
                            <div class="month"><?php echo $li['month'];?>月</div>
                            <div class="passage"><p><?php echo $li['content'];?></p></div>
                        </li>
                        <?php }?>
                    </ul>
                    {{--<div class="dataimg"><img src="/platform/img/pic2.jpg" alt="" /></div>--}}
                </div>
            </div>
            <?php }?>
        </div>

        <div class="layerbody">
            <div class="ykTitle"><h2>加入我们</h2></div>
            <div class="jobsBody">
                <div class="jobTit"><h3>招聘信息</h3><a href="<?php echo url('/jobList');?>">查看更多</a></div>
                <ul class="jobList">
                    <?php foreach ($jobList as $key=>$item) {?>
                    <li>
                        <div class="item"><h4><?php echo $item['job'];?></h4>
                            <div class="text">
                                <p><?php echo $item['content'];?></p>
                            </div>
                            <a class="morejob" href="<?php echo url('/jobList');?>">查看职位</a>
                        </div>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        setCurrMenu('about');
        // 数字递增
        $('.counter-numb').lemCounter();
    </script>
@endsection