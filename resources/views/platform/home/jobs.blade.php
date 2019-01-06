@extends('platform.layouts._header')

@section('body')
    <link href="/easyto/layui/css/layui.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/easyto/layui/layui.js"></script>

    <div class="banner-int gef-banner">
        <div class="wrapper gef-s"></div>
        <div class="banner-bg"><img src="/platform/img/sub_banner3.jpg" alt=""></div>
    </div>
    <div class="wrapper">
        <div class="faqbody">
            <div class="menuTit"><h2>招聘信息</h2></div>
            <div class="jobsBody">
                <ul>
                    <?php foreach ($jobList as $key=>$item) {?>
                    <li>
                        <div class="jobname">
                            <h3><?php echo $item['job'];?><span class="place"><?php echo $item['city'];?></span></h3>
                            <div class="Apply"><a style="display: none" data-email="<?php echo $item['email'];?>" href="javascript:;" class="apply_job">立即申请</a><i class="arrowbtm"></i></div>
                        </div>
                        <div class="jobsDesc">
                            <?php echo $item['content'];?>
                        </div>
                    </li>
                    <?php }?>
                </ul>
            </div>
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
                        window.location.href = '/jobList/page/' + obj.curr + '/pageSize/' + obj.limit;
                        //do something
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        setCurrMenu('about');
        // 数字递增
        $('.counter-numb').lemCounter();
        layui.use(['layer','form','element'], function(){
            var layer = layui.layer,form = layui.form,element = layui.element;
            $(document).on('click','.apply_job',function(){
                var email = $(this).attr('data-email');
                layer.open({
                    type: 1,
                    area: ['600px','90px'],
                    title: false,
                    content: '<div class="alert-body"><h3 class="resume">请将简历发送至邮箱：<a href="mailto:ykd@ykd.com">' + email +'</a></h3></div>',

                });
            })
        })
    </script>
@endsection
