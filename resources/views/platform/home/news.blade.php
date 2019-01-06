@extends('platform.layouts._header')

@section('body')
    <div class="banner-int gef-banner">
        <div class="wrapper gef-s"></div>
        <div class="banner-bg"><img src="/platform/img/sub_banner2.jpg" alt=""></div>
    </div>
    <div class="wrapper">
        <div class="faqbody">
            <div class="menuTit"><h2>新闻资讯</h2></div>
            <?php foreach ($list as $item) {?>
            <div class="newsitem">
                <div class="imgpic"><a href="<?php echo route('newDetail', ['id' => $item['n_id']]);?>"><img src="<?php echo $item['cover'];?>" alt="" /></a></div>
                <div class="figure">
                    <h3><a href="<?php echo route('newDetail', ['id' => $item['n_id']]);?>"><?php echo $item['title'];?></a></h3>
                    <div class="details divomit">
                        <p>
                            <?php echo $item['content'];?>
                        </p>
                    </div>
                    <div class="ReadMore"><a class="linkbtn" href="<?php echo route('newDetail', ['id' => $item['n_id']]);?>">查看全文</a></div>
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
                        window.location.href = '/help/news/page/' + obj.curr + '/pageSize/' + obj.limit;
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