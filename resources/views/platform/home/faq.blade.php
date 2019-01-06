@extends('platform.layouts._header')

@section('body')
    <div class="banner-int gef-banner">
        <div class="wrapper gef-s"></div>
        <div class="banner-bg"><img src="/platform/img/sub_banner2.jpg" alt=""></div>
    </div>
    <div class="wrapper">
        <div class="faqbody">
            <div class="menuTit"><h2>常见问题</h2></div>
            <?php foreach ($list as $item) {?>
            <div class="faqitem">
                <div class="faqtit"><h3><?php echo $item['title'];?></h3><span class="slidebtn">展开答案</span></div>
                <div class="itembody">
                    <?php echo $item['content'];?>
                </div>
            </div>
            <?php }?>
        </div>
        <div id="page-con">

        </div>
    </div>

    <script>
        layui.use('laypage', function(){
            var laypage = layui.laypage;
            laypage.render({
                elem: 'page-con'
                ,layout:['prev', 'page', 'next', 'limit']
                ,limit: '<?php echo $limit;?>'
                ,limits: [10, 20, 30, 50, 100]
                ,curr: '<?php echo $curr;?>'
                ,count: '<?php echo $total;?>' //数据总数，从服务端得到
                ,jump: function(obj, first){
                    //
                    //obj包含了当前分页的所有参数，比如：
                    console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                    console.log(obj.limit); //得到每页显示的条数
                    //首次不执行
                    if(!first){
                        window.location.href = '/help/faq/page/' + obj.curr + '/pageSize/' + obj.limit;
                        //do something
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        setCurrMenu('dada');
        // 数字递增
        $('.counter-numb').lemCounter();
    </script>
@endsection