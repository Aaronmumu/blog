@extends('platform.layouts._header')

@section('body')
    <?php
        use App\Services\Platform\Basics\WebsiteThemeServices;
        $webPic = WebsiteThemeServices::getByCondition([
            'type' => 'banner'
        ], '*', 0, 0, 'sort asc');
    ?>

    <div id="indxbanr" class="indxbanr">
        <div class="hd"><ul></ul></div>
        <div class="bd">
            <ul class="branner-il">
                <?php foreach ($webPic as $item) {?>
                <li data-href="<?php echo empty(trim($item->link)) ? 'unLink' : $item->link;?>" style="background: url(<?php echo $item->path;?>) no-repeat center top">
                </li>
                <?php }?>
            </ul>
        </div>
        <a class="prev" href="javascript:void(0)"></a>
        <a class="next" href="javascript:void(0)"></a>
    </div>
    <script type="text/javascript">
        jQuery(".indxbanr").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,effect:"left"});
    </script>
    <div class="wrapper">
        <div class="introPro">
            <div class="ykTitle"><h2>产品介绍</h2></div>
            <div class="ItemPro">
                <div class="getload"><img src="/platform/img/gc.jpg" alt="" /></div>
                <div class="getload">
                    <div class="article art-Right">
                        <h3>谷仓仓储配送</h3>
                        <div class="text">
                            <p>谷仓仓储主要从事全球仓储配送服务，竭诚为客户提供专业化、国际化、个性化的全方位、高品质的标准化第三方海外仓服务。</p>
                        </div>
                        <a href="<?php echo route('business', ['type' => 'business1']);?>" class="view">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="ItemPro ip2">
                <div class="getload">
                    <div class="article art-Left">
                        <h3>谷仓头程送仓</h3>
                        <div class="text">
                            <p>谷仓头程团队专业为客户提供FBA头程、海运散货整柜、空运快递等头程服务。</p>
                        </div>
                        <a href="<?php echo route('business', ['type' => 'business2']);?>" class="view">查看详情</a>
                    </div>
                </div>
                <div class="getload"><img src="/platform/img/ed.jpg" alt="" /></div>
            </div>
        </div>
    </div>
    <div class="whatwedo">
        <div class="ykTitle"><h2>我们能为你做什么</h2></div>
        <div class="ourService">
            <div class="hd">
                <a class="next"></a>
                <a class="prev"></a>
            </div>
            <div class="bd">
                <ul class="picList">
                    <li>
                        <div class="serArticle"><div><i class="icon tg1"></i><h3>专业的仓库管理团队</h3><div class="as"><p>拥有专业的仓库管理团队，为您提供更放心更省心的仓储服务。</p><a style="display: none" href="" class="more">查看详情</a></div></div></div>
                        <img src="/platform/img/bs1.jpg" alt="" />
                    </li>
                    <li>
                        <div class="serArticle"><div><i class="icon tg1"></i><h3>高效的仓配处理</h3><div class="as"><p>仓库全年无休运作，24小时发货，保证客户订单准确、准时发货；48小时入库，保证客户货物准时、准确入库。</p><a style="display: none" href="" class="more">查看详情</a></div></div></div>
                        <img src="/platform/img/bs1.jpg" alt="" />
                    </li>
                    <li>
                        <div class="serArticle"><div><i class="icon tg1"></i><h3>精准的库存管理</h3><div class="as"><p>定期定区盘点和不定期动态盘点，保证库存准确，仓库丢失包赔；库存计划管理，提供大数据分析，为客户提供最优备货方案，提高库存周转。</p><a style="display: none" href="" class="more">查看详情</a></div></div></div>
                        <img src="/platform/img/bs1.jpg" alt="" />
                    </li>
                    <li>
                        <div class="serArticle"><div><i class="icon tg1"></i><h3>多元化服务产品</h3><div class="as"><p>标准化第三方海外仓、定制化仓储服务、头程专线物流服务、尾程物流综合代理服务、专线包裹转运、FBA货物转运，服务对接方便快捷、费用透明。</p><a style="display: none" href="" class="more">查看详情</a></div></div></div>
                        <img src="/platform/img/bs1.jpg" alt="" />
                    </li>
                    <li>
                        <div class="serArticle"><div><i class="icon tg1"></i><h3>优惠的服务资费</h3><div class="as"><p>免60天仓租，优惠的订单操作费与仓租费用，并根据发货量享有不同的价格套餐；与全球各大物流公司保持良好的合作，超低的小包裹派送费，为客户提供高品质、价格优廉的运输服务。</p><a style="display: none" href="" class="more">查看详情</a></div></div></div>
                        <img src="/platform/img/bs1.jpg" alt="" />
                    </li>
                    <li>
                        <div class="serArticle"><div><i class="icon tg1"></i><h3>多平台无缝对接</h3><div class="as"><p>与eBay、Amazon、Wish、AliExpress等平台无缝对接，实现自动载单；与多家第三方ERP软件对接，系统开放式标准化API接口。</p><a style="display: none" href="" class="more">查看详情</a></div></div></div>
                        <img src="/platform/img/bs1.jpg" alt="" />
                    </li>
                </ul>
            </div>
        </div>

        <script type="text/javascript">
            jQuery(".ourService").slide({mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:4,trigger:"click"});
        </script>
    </div>
    <div class="wrapper">
        <div class="trait_service">
            <div class="ykTitle"><h2>其他特色服务</h2></div>
            <ul class="traitItems">
                <li>
                    <div class="icon"><img src="/platform/img/ico2.png" alt="" /></div>
                    <div class="text"><h3>智能的渠道优选</h3><p>根据客户对订单时效、运费的要求，系统自动优选最快、最省的物流渠道,客户使用更省心</p></div>
                </li>
                <li>
                    <div class="icon"><img src="/platform/img/ico2.png" alt="" /></div>
                    <div class="text"><h3>物流查询</h3><p>OMS系统支持对订单物流轨迹的查询，客户可实时跟踪包裹的派送情况</p></div>
                </li>
                <li>
                    <div class="icon"><img src="/platform/img/ico2.png" alt="" /></div>
                    <div class="text"><h3>运费试算器</h3><p>根提前试算某票订单的收费（包含库内操作计费和运输费）情况</p></div>
                </li>
                <li>
                    <div class="icon"><img src="/platform/img/ico2.png" alt="" /></div>
                    <div class="text"><h3>邮箱推送</h3><p>定期推送入库单、盘点单，订单异常、退件单、商品动态的邮件以及余额预警邮件</p></div>
                </li>
                <li>
                    <div class="icon"><img src="/platform/img/ico2.png" alt="" /></div>
                    <div class="text"><h3>报表统计</h3><p>数据统计报表、商品库龄统计分析、财务报表等，多样化的报表满足客户不同需求</p></div>
                </li>
                <li>
                    <div class="icon"><img src="/platform/img/ico2.png" alt="" /></div>
                    <div class="text"><h3>更多功能</h3><p>即将上线...</p></div>
                </li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('.branner-il li').bind('click', function () {
                var href = $(this).attr('data-href');
                if (href != 'unLink') {
                    window.open(href);
                    //window.location.href=href;
                }
            });
        });
        setCurrMenu('index');
    </script>
@endsection
