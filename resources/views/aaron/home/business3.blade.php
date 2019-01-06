@extends('aaron.layouts._header')

@section('body')
    <div class="banner-int gef-banner">
        <div class="wrapper gef-s"><div class="holder"><h2 id="flipInX" style="font-size: 30px">丰富的尾程物流产品，打造全球物流网，实现包裹全球派送</h2><p id="fadeInUp"><a class="reserve" href=""></a></p></div></div>
        <div class="banner-bg"><img src="/aaron/img/sub_banner1.jpg" alt=""></div>
    </div>
    <div class="wrapper">
        <div class="layerbody">
            <div class="ykTitle"><h2>服务优势</h2></div>
            <div class="liftpoints" style="margin-top: 0">
                <ul>
                    <li><div class="pico"><img src="/aaron/img/tq1.png" alt="" /></div><h3>选择多样</h3><p>选择多样，满足客户对时效和价格的要求</p></li>
                    <li><div class="pico"><img src="/aaron/img/tq2.png" alt="" /></div><h3>价格优惠</h3><p>与多家服务商良好的合作关系取得有优势的服务价格；</p></li>
                    <li><div class="pico"><img src="/aaron/img/tq3.png" alt="" /></div><h3>时效保证</h3><p>派送时效稳定，平均派送时效在3~7天</p></li>
                    <li><div class="pico"><img src="/aaron/img/tq4.png" alt="" /></div><h3>派送范围广</h3><p>派送区域范围广，可支持国内外货物派送</p></li>
                </ul>
            </div>
        </div>
        <style type="text/css">
            /*.ser_provider img{width: 278px;height: 89px;}*/
        </style>
        <div class="layerbody">
            <div class="ykTitle"><h2>服务商合作</h2></div>
            <div class="ser_provider">
                <ul>
                    <li><img src="/aaron/img/friendship13.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship15.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship16.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship17.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship18.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship19.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship20.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship21.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship22.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship23.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship24.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship25.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship26.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship27.png" alt="" /></li>
                    <li><img src="/aaron/img/friendship28.png" alt="" /></li>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        setCurrMenu('business');
        // 数字递增
        $('.counter-numb').lemCounter();
    </script>
@endsection