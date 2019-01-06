@extends('aaron.layouts._header')

@section('body')
    <div class="banner-int gef-banner">
        <div class="wrapper gef-s">
            <div class="holder" style="display: block">
                <h2 id="flipInX" style="font-size: 30px">专业的仓储管理团队、先进的机械设备，专注为客户提供优质的服务，打造全球物流网服务</h2>
                <p id="fadeInUp"><a class="reserve" href=""></a></p>
            </div>
        </div>
        <div class="banner-bg"><img src="/aaron/img/sub_banner0.jpg" alt=""></div>
    </div>
    <div class="wrapper">
        <div class="layerbody">
            <div class="capacity">
                <div class="ykTitle"><h2>作业能力</h2></div>
                <ul class="digital">
                    <li><div class="text-body"><h3><em class="counter-numb" data-lem-counter='{"value_from": 0, "value_to": 280000, "animate_duration": 1, "locale": "en-US"}'>0</em>+</h3><p>日均出库处理量(件)</p></div></li>
                    <li><div class="text-body"><h3><em class="counter-numb" data-lem-counter='{"value_from": 0, "value_to": 300000, "animate_duration": 1, "locale": "en-US"}'>0</em>+</h3><p>日均入库处理量(件)</p></div></li>
                    <li><div class="text-body"><h3><em class="counter-numb" data-lem-counter='{"value_from": 0, "value_to": 2000, "animate_duration": 1, "locale": "en-US"}'>0</em>+</h3><p>日均售后处理量(件)</p></div></li>
                </ul>
            </div>
        </div>
        <div class="layerbody">
            <div class="ykTitle"><h2>海外仓布局</h2></div>
            <div class="mapworld map-hm">
                <div class="coordinate-item left-side place-r1">
                    <div class="cname"><span class="red-pointer"></span>美西</div>
                    <div class="warehouse-detail"><div class="box-flex">
                            <div class="house-section">
                                <div class="item">
                                    <h4 class="with-icon">美西 加利福尼亚</h4>
                                    <ul class="house-info">
                                        <li><b>面积：</b>48700m²</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="house-pic"></div> -->
                        </div>
                    </div>
                </div>
                <div class="coordinate-item left-side place-r2">
                    <div class="cname"><span class="red-pointer"></span>美东</div>
                    <div class="warehouse-detail"><div class="box-flex">
                            <div class="house-section">
                                <div class="item">
                                    <h4 class="with-icon">美东 新泽西</h4>
                                    <ul class="house-info">
                                        <li><b>面积：</b>49000m²</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coordinate-item left-side place-r3">
                    <div class="cname"><span class="red-pointer"></span>英国</div>
                    <div class="warehouse-detail"><div class="box-flex">
                            <div class="house-section">
                                <div class="item">
                                    <h4 class="with-icon">英国 伯明翰</h4>
                                    <ul class="house-info">
                                        <li><b>面积：</b>20500m²</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coordinate-item left-side place-r4">
                    <div class="cname"><span class="red-pointer"></span>捷克</div>
                    <div class="warehouse-detail"><div class="box-flex">
                            <div class="house-section">
                                <div class="item">
                                    <h4 class="with-icon">捷克 布拉格</h4>
                                    <ul class="house-info">
                                        <li><b>面积：</b>34400m²</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coordinate-item right-side place-r5">
                    <div class="cname"><span class="red-pointer"></span>澳洲</div>
                    <div class="warehouse-detail"><div class="box-flex">
                            <div class="house-section">
                                <div class="item">
                                    <h4 class="with-icon">澳洲 墨尔本</h4>
                                    <ul class="house-info">
                                        <li><b>面积：</b>10500m²</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coordinate-item left-side place-r6">
                    <div class="cname"><span class="red-pointer"></span>法国</div>
                    <div class="warehouse-detail"><div class="box-flex">
                            <div class="house-section">
                                <div class="item">
                                    <h4 class="with-icon">法国 巴黎</h4>
                                    <ul class="house-info">
                                        <li><b>面积：</b>10700m²</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coordinate-item left-side place-r7">
                    <div class="cname"><span class="red-pointer"></span>意大利</div>
                    <div class="warehouse-detail"><div class="box-flex">
                            <div class="house-section">
                                <div class="item">
                                    <h4 class="with-icon">意大利 都灵</h4>
                                    <ul class="house-info">
                                        <li><b>面积：</b>1000m²</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coordinate-item left-side place-r8">
                    <div class="cname"><span class="red-pointer"></span>西班牙</div>
                    <div class="warehouse-detail"><div class="box-flex">
                            <div class="house-section">
                                <div class="item">
                                    <h4 class="with-icon">西班牙 马德里</h4>
                                    <ul class="house-info">
                                        <li><b>面积：</b>1000m²</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img class="mapimg" src="/aaron/img/mapworld.jpg" alt="" />
            </div>
        </div>
        <div class="layerbody">
            <div class="ykTitle"><h2>海外仓实景</h2></div>
            <ul class="live-action">
                <li><img src="/aaron/img/live1.jpg" alt="" /></li>
                <li><img src="/aaron/img/live2.jpg" alt="" /></li>
                <li><img src="/aaron/img/live3.jpg" alt="" /></li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        setCurrMenu('osw');
        // 数字递增
        $('.counter-numb').lemCounter();
    </script>
@endsection