@extends('platform.layouts._header')

@section('body')
    <div class="banner-int gef-banner">
        <div class="wrapper gef-s"><div class="holder"><h2 id="flipInX" style="font-size: 30px">谷仓头程团队专业为客户提供海运散货、整柜、空运快递等头程服务。</h2><p id="fadeInUp"><a class="reserve" href=""></a></p></div></div>
        <div class="banner-bg"><img src="/platform/img/sub_banner1.jpg" alt=""></div>
    </div>
    <div class="wrapper">
        <div class="layerbody">
            <div class="ykTitle"><h2>服务流程</h2></div>
            <div class="process">
                <ul>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>签订协议</p></li>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>系统下单</p></li>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>交货仓库</p></li>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>仓库验货</p></li>

                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>安排出货</p></li>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>国内报关</p></li>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>货物运输</p></li>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>目的港到货</p></li>
                </ul>
            </div>
        </div>
        <div class="layerbody">
            <div class="ykTitle"><h2>服务类型</h2></div>
            <div class="serviceType">
                <ul>
                    <li><div class="action"><h3>海运</h3><p>降低物流端成本，备货周期长相对较长</p></div><img src="/platform/img/sertype1.jpg" alt="" /></li>
                    <li><div class="action"><h3>空加派</h3><p>备货周期短，时效快，物流成本相对海运备货要高</p></div><img src="/platform/img/sertype2.jpg" alt="" /></li>
                    <li><div class="action"><h3>快递</h3><p>门对门服务，备货周期短，时效快，物流成本相对海运备货要高</p></div><img src="/platform/img/sertype3.jpg" alt="" /></li>
                </ul>
            </div>
        </div>
        <div class="layerbody">
            <div class="ykTitle"><h2>服务商合作</h2></div>
            <div class="ser_provider">
                <ul>
                    <li><img src="/platform/img/friendship1.png" alt="" /></li>
                    <li><img src="/platform/img/friendship2.png" alt="" /></li>
                    <li><img src="/platform/img/friendship3.png" alt="" /></li>
                    <li><img src="/platform/img/friendship4.png" alt="" /></li>

                    <li><img src="/platform/img/friendship5.jpg" alt="" /></li>
                    <li><img src="/platform/img/friendship6.jpg" alt="" /></li>
                    <li><img src="/platform/img/friendship7.png" alt="" /></li>
                    <li><img src="/platform/img/friendship8.jpg" alt="" /></li>
                    <li><img src="/platform/img/friendship9.jpg" alt="" /></li>
                    <li><img src="/platform/img/friendship10.jpg" alt="" /></li>
                    <li><img src="/platform/img/friendship11.jpg" alt="" /></li>
                    <li><img src="/platform/img/friendship12.jpg" alt="" /></li>
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