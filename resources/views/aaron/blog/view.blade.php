@extends('aaron.layouts._header_blog')

@section('body')

    <div class="wrapper" style="margin-top: 100px">
        <div class="faqbody">
            <div class="menuTit"><h2>常见问题</h2></div>
            <?php foreach ($list as $item) {?>
            <div class="faqitem">
                <div class="faqtit">
                    <h3><?php echo $item['type'];?> - <?php echo $item['title'];?></h3>
                    <span class="slidebtn right">展开答案</span>
                    <i class="right" style="padding: 0px 10px"><?php echo $item['creat_at'];?></i>
                </div>
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
                ,limits: [1, 10, 20, 30, 50, 100]
                ,curr: '<?php echo $curr;?>'
                ,count: '<?php echo $total;?>' //数据总数，从服务端得到
                ,jump: function(obj, first){
                    //
                    //obj包含了当前分页的所有参数，比如：
                    console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                    console.log(obj.limit); //得到每页显示的条数
                    //首次不执行
                    if(!first){
                        window.location.href = '/blog/page/' + obj.curr + '/pageSize/' + obj.limit;
                        //do something
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        setCurrMenu('blog');
        // 数字递增
        $('.counter-numb').lemCounter();
    </script>
@endsection