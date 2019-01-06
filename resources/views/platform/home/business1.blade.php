@extends('platform.layouts._header')

@section('body')
    <div class="banner-int gef-banner">
        <div class="wrapper gef-s"><div class="holder"><h2 id="flipInX" style="font-size: 30px">谷仓海外仓为客户提供仓储、货物转运落地即出库、物流等定制化服务</h2><p id="fadeInUp"><a class="reserve" href=""></a></p></div></div>
        <div class="banner-bg"><img src="/platform/img/sub_banner1.jpg" alt=""></div>
    </div>
    <div class="wrapper">
        <div class="layerbody">
            <div class="ykTitle"><h2>仓储服务流程</h2></div>
            <div class="process">
                <ul>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>签订协议</p></li>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>客户备货</p></li>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>自发/代发至海外仓</p></li>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>海外仓收货上架</p></li>

                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>客户下单</p></li>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>海外仓下架打包</p></li>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>服务商派送</p></li>
                    <li><div class="pico"><img src="/platform/img/book.jpg" alt="" /></div><p>买家收货</p></li>
                </ul>
            </div>
        </div>
        <div class="layerbody">
            <div class="ykTitle"><h2>服务项目</h2></div>
            <div class="Available">
                <ul>
                    <li class="sa1">
                        <h3>智能存储</h3>
                        <div class="list"><p>精确的存储，配合系统使得库存准确率得到有效保证；</p><p>全流程库存数据细致准确，单据状态和明细清晰明了；</p><p>波次任务保证下架及时，出货扫描确保发货准确。</p></div>
                    </li>
                    <li class="sa2">
                        <h3>订单派送</h3>
                        <div class="list"><p>日均处理单量48196；</p><p>支持库存货物发往FBA的操作，包括FNSKU换标和FBA箱唛粘贴；</p></div>
                    </li>
                    <li class="sa3">
                        <h3>售后服务</h3>
                        <div class="list"><p>提供增值服务，支持拍照回传，给仓库下达处理指令；</p><p>重新包装使退件的二次销售更加便利；</p><p>提高买家满意度和体验。</p></div>
                    </li>
                    <li class="sa4">
                        <h3>尾程服务</h3>
                        <div class="list"><p>为跨境电商提供无库存，落地即配送的海外仓服务。</p></div>
                    </li>
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