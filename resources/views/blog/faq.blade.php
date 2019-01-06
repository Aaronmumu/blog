@extends('blog.layouts._header')

@section('content')
    <div class="content-tail">
        <div class="title-menu">
            <h2>常见问题</h2>
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
                                <th>内容</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($list as $item) {?>
                            <tr>
                                <td><?php echo $item['title'];?></td>
                                <td>...</td>
                                <td><?php echo $item['creat_time'];?></td>
                                <td>
                                    <button class="layui-btn layui-btn-sm" onclick="COMMON.edit('<?php echo $item['f_id'];?>', '<?php echo route('getFaqJson', ['id' => $item['f_id']]);?>')">编辑</button>
                                    <button class="layui-btn layui-btn-sm" onclick="COMMON.del('<?php echo $item['f_id'];?>', '<?php echo route('delFaq', ['id' => $item['f_id']]);?>')">删除</button>
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
                        <input type="hidden" data-keyid="keyid" name="f_id" value="">
                        <div class="layui-form-item">
                            <label class="layui-form-label">标题</label>
                            <div class="layui-input-block">
                                <input type="text" name="title" required lay-verify="required" placeholder="请输入标题"
                                       autocomplete="off" class="layui-input">
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
            setCurrMenu('faq');
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
                filebrowserUploadUrl: "<?php echo url('/blogs/uploadFile');?>",
                language: 'zh-cn',
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
                    COMMON.add("<?php echo url('/blogs/addFaq');?>", json);
                    return false;
                });
            });
        </script>
    </div>
@endsection
