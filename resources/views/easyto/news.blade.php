@extends('easyto.layouts._header')

@section('content')
    <div class="content-tail">
        <div class="title-menu">
            <h2>新闻资讯</h2>
        </div>
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li data-opre="list" class="layui-this">列表</li>
                <li data-opre="add" onclick="COMMON.initAdd();">添加</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="content-list">
                        <table class="layui-table">
                            <colgroup>
                                <col width="150">
                                <col width="200">
                                <col>
                            </colgroup>
                            <thead>
                            <tr>
                                <th>标题</th>
                                <th>封面</th>
                                <th>内容</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($list as $item) {?>
                            <tr>
                                <td><?php echo $item['title'];?></td>
                                <td><?php echo $item['cover'];?></td>
                                <td><?php echo '...';?></td>
                                <td><?php echo $item['creat_time'];?></td>
                                <td>
                                    <button class="layui-btn layui-btn-sm" onclick="COMMON.edit('<?php echo $item['n_id'];?>', '<?php echo route('getNewsJson', ['id' => $item['n_id']]);?>')">编辑</button>
                                    <button class="layui-btn layui-btn-sm" onclick="COMMON.del('<?php echo $item['n_id'];?>', '<?php echo route('delNews', ['id' => $item['n_id']]);?>')">删除</button>
                                </td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="layui-tab-item">
                    <form class="layui-form" action="">
                        <input type="hidden" name="_token" class="tag_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" data-keyid="keyid" name="n_id" value="">
                        <div class="layui-form-item">
                            <label class="layui-form-label">标题</label>
                            <div class="layui-input-block">
                                <input type="text" name="title" required lay-verify="required" placeholder="请输入标题"
                                       autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="r1">
                            <div class="layui-form-item">
                                <label class="layui-form-label">封面</label>
                                <div class="layui-input-block">
                                    <div class="layui-upload">
                                        <button type="button" class="layui-btn btn_upload_img">
                                            <i class="layui-icon">&#xe67c;</i>上传图片
                                        </button>
                                        <img class="layui-upload-img img-upload-view" width="100px" height="100px" src="">
                                        <p id="demoText"></p>
                                    </div>
                                </div>
                                <div class="layui-input-block">
                                    <input type="text" name="cover" required lay-verify="required" placeholder="请上传图片" value="" autocomplete="off" class="layui-input pic-input">
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">内容</label>
                            <div class="layui-input-block">
                        <textarea style="display: none" id="content" lay-verify="" name="content" placeholder="请输入内容"
                                  class="layui-textarea"></textarea>
                                <textarea id="editor1" lay-verify="" name="editor1" placeholder="请输入内容"
                                          class="layui-textarea"></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            setCurrMenu('news');
            //注意：选项卡 依赖 element 模块，否则无法进行功能性操作
            layui.use('element', function(){
                var element = layui.element;

                //…
            });
            CKEDITOR.replace('editor1', {
                height: 200,
                fileTools_requestHeaders: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                isFileUploadSupported: true,
                filebrowserUploadUrl: "<?php echo url('/easytos/uploadFile');?>",
                language: 'zh-cn',
            });
            layui.use('upload', function(){
                var upload = layui.upload;
                var tag_token = $(".tag_token").val();
                //普通图片上传
                var uploadInst1 = upload.render({
                    elem: '.btn_upload_img'
                    ,size: 1024*2
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
                            $('.img-upload-view').attr('src', res.path);
                            $('.pic-input').val(res.path);
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
                    var text = CKEDITOR.instances.editor1.getData();
                    var json = data.field;
                    if (text == '') {
                        layer.msg('内容必填');
                        return false;
                    }
                    json.content = text;
                    COMMON.add("<?php echo url('/easytos/addNews');?>", json);
                    return false;
                });
            });
        </script>
    </div>
@endsection
