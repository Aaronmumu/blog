@extends('easyto.layouts._header')

@section('content')
    <style type="text/css">
    </style>
    <div class="content-tail">
        <div class="title-menu">
            <h2>轮播设置</h2>
        </div>
        <div class="edit-tail">
            <form class="layui-form" action="">
                <input type="hidden" name="_token" class="tag_token" value="<?php echo csrf_token(); ?>">
                <div class="layui-form-item">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-block">
                        <div class="layui-input-inline">
                            图片
                        </div>
                        <div class="layui-input-inline">
                            链接
                        </div>
                        <div class="layui-input-inline">
                            排序
                        </div>
                    </div>
                </div>
                <?php foreach ($list as $key=>$item) {?>
                    <div class="r1">
                        <div class="layui-form-item">
                            <label class="layui-form-label"></label>
                            <div class="layui-input-block">
                                <div class="layui-upload">
                                    <button type="button" class="layui-btn btn_upload_img<?php echo ($key+1);?>">
                                        <i class="layui-icon">&#xe67c;</i>上传图片
                                    </button>
                                    <img class="layui-upload-img img-upload-view<?php echo ($key+1);?>" width="100px" height="100px" src="<?php echo $item->path;?>">
                                    <p id="demoText"></p>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">轮播图</label>
                            <div class="layui-input-block">
                                <div class="layui-input-inline">
                                    <input type="text" name="pic" required lay-verify="required" placeholder="请上传图片" value="<?php echo $item->path;?>" autocomplete="off" class="layui-input pic-input<?php echo ($key+1);?>">
                                </div>
                                <div class="layui-input-inline">
                                    <input type="text" name="link" required lay-verify="" placeholder="请输入链接" value="<?php echo $item->link;?>" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-input-inline">
                                    <input type="text" name="order" required lay-verify="required" placeholder="请输入排序" value="<?php echo $item->sort;?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo"><?php echo $exSet ? '更新保存' : '添加保存';?></button>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript">
            setCurrMenu('branner');
            layui.use('upload', function(){
                var upload = layui.upload;
                var tag_token = $(".tag_token").val();
                //普通图片上传
                var uploadInst1 = upload.render({
                    elem: '.btn_upload_img1'
                    ,size: 1024*5
                    ,type : 'images'
                    ,field: 'source'
                    ,exts: 'jpg|png|jpeg|bmp' //设置一些后缀，用于演示前端验证和后端的验证
                    ,auto:true //选择图片后是否直接上传
                    ,accept:'images' //上传文件类型
                    ,url: "<?php echo url('/easytos/upload');?>"
                    ,data:{'_token':tag_token}
                    ,before: function(obj){
                        //预读本地文件示例，不支持ie8
                        /*obj.preview(function(index, file, result){
                            $('.img-upload-view').attr('src', result); //图片链接（base64）
                        });*/
                    }
                    ,done: function(res){
                        //如果上传失败
                        if(res.status == 1){
                            $('.img-upload-view1').attr('src', res.path);
                            $('.pic-input1').val(res.path);
                            return layer.msg('上传成功');
                        }else{//上传成功
                            layer.msg(res.message);
                        }
                    }
                    ,error: function(){
                        //演示失败状态，并实现重传
                        return layer.msg('上传失败,请重新上传');
                    }
                });

                var uploadInst2 = upload.render({
                    elem: '.btn_upload_img2'
                    ,size: 1024*5
                    ,type : 'images'
                    ,field: 'source'
                    ,exts: 'jpg|png|jpeg|bmp' //设置一些后缀，用于演示前端验证和后端的验证
                    ,auto:true //选择图片后是否直接上传
                    ,accept:'images' //上传文件类型
                    ,url: "<?php echo url('/easytos/upload');?>"
                    ,data:{'_token':tag_token}
                    ,before: function(obj){
                        //预读本地文件示例，不支持ie8
                        /*obj.preview(function(index, file, result){
                            $('.img-upload-view').attr('src', result); //图片链接（base64）
                        });*/
                    }
                    ,done: function(res){
                        //如果上传失败
                        if(res.status == 1){
                            $('.img-upload-view2').attr('src', res.path);
                            $('.pic-input2').val(res.path);
                            return layer.msg('上传成功');
                        }else{//上传成功
                            layer.msg(res.message);
                        }
                    }
                    ,error: function(){
                        //演示失败状态，并实现重传
                        return layer.msg('上传失败,请重新上传');
                    }
                });

                var uploadInst3 = upload.render({
                    elem: '.btn_upload_img3'
                    ,size: 1024*5
                    ,type : 'images'
                    ,field: 'source'
                    ,exts: 'jpg|png|jpeg|bmp' //设置一些后缀，用于演示前端验证和后端的验证
                    ,auto:true //选择图片后是否直接上传
                    ,accept:'images' //上传文件类型
                    ,url: "<?php echo url('/easytos/upload');?>"
                    ,data:{'_token':tag_token}
                    ,before: function(obj){
                        //预读本地文件示例，不支持ie8
                        /*obj.preview(function(index, file, result){
                            $('.img-upload-view').attr('src', result); //图片链接（base64）
                        });*/
                    }
                    ,done: function(res){
                        //如果上传失败
                        if(res.status == 1){
                            $('.img-upload-view3').attr('src', res.path);
                            $('.pic-input3').val(res.path);
                            return layer.msg('上传成功');
                        }else{//上传成功
                            layer.msg(res.message);
                        }
                    }
                    ,error: function(){
                        //演示失败状态，并实现重传
                        return layer.msg('上传失败,请重新上传');
                    }
                });
            });
            //Demo
            layui.use('form', function () {
                var form = layui.form;
                //监听提交
                form.on('submit(formDemo)', function (data) {
                    var json = [];
                    $('.r1').each(function () {
                        var pic = $(this).find('input[name=pic]').val();
                        var link = $(this).find('input[name=link]').val();
                        var order = $(this).find('input[name=order]').val();
                        var data = {
                            'pic':pic,
                            'link':link,
                            'order':order,
                        };
                        json.push(data);
                    });
                    var tag_token = $(".tag_token").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url('/easytos/addBannerPic');?>",
                        data: {
                            'addBannerPic':json,
                            '_token':tag_token
                        },
                        dataType: 'json',
                        beforeSend: function () {
                            COMMON.startLoading();
                        },
                        success: function (xhr) {
                            if (xhr.ret == 'succ') {
                                layer.msg(xhr.message);
                            } else {
                                layer.msg(xhr.message);
                            }
                            COMMON.closeLoading();
                        },
                        error: function () {
                            layer.msg('请求失败');
                            COMMON.closeLoading();
                        },
                    });
                    //layer.msg(JSON.stringify(data.field));
                    return false;
                });
            });
        </script>
    </div>
@endsection
