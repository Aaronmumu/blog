/**
 * COMMON用于放置全局通用类及方法，全局事件等
 */
var COMMON = (function () {
    var COMMON = {
        delUrl:'',
        addUrl:'',
        editUrl:'',
        LOADINGTIP : null,
        initAdd: function(){
            $('input[data-keyid=keyid]').val('');
        },
        /**
         * 格式化日期补位0
         * @param arg
         * @returns {string}
         */
        getFormatDate : function(arg) {
            if (arg == undefined || arg == '') {
                return '';
            }
            var re = arg + '';
            if (re.length < 2) {
                re = '0' + re;
            }
            return re;
        },
        /**
         * 日期+天数
         * @param date
         * @param days
         * @returns {string}
         */
        addDate : function(date, days) {
            if (days == undefined || days == '') {
                days = 1;
            }
            var date = new Date(date);
            date.setDate(date.getDate() + days);
            var month = date.getMonth() + 1;
            var day = date.getDate();
            return date.getFullYear() + '-' + COMMON.getFormatDate(month) + '-' + COMMON.getFormatDate(day);
        },
        /**
         * 获取两个日期的天数差
         * @param strDateStart
         * @param strDateEnd
         * @returns {number}
         */
        getDays : function(strDateStart,strDateEnd){
            s1 = new Date(strDateStart.replace(/-/g, "/"));
            s2 = new Date(strDateEnd.replace(/-/g, "/"));
            var days = s2.getTime() - s1.getTime();
            return parseInt(days / (1000 * 60 * 60 * 24));
        },
        /**
         * 关闭新弹出窗
         * <div class="judgealert hide judgealert-openprint" data-tar="printLabel">
         * 添加属性 data-tar="printLabel" tar = printLabel
         * @param tar
         */
        closeDig : function(tar){
            var _this = $('div[data-tar='+tar+']');
            var t = _this.find('.popup-main');
            t.removeClass("showSweetAlert");
            t.addClass("hideSweetAlert");
            _this.fadeOut("fast");
            $("body").css("overflow","auto");
            $("body").css("overflow","auto");
            //
            $('div[data-tar='+tar+']').hide();
            $('div[data-tar='+tar+'] .popup-main').hide();
        },
        /**
         * 弹出新弹出窗
         * <div class="judgealert hide judgealert-openprint" data-tar="printLabel">
         * 添加属性 data-tar="printLabel" tar = printLabel
         * @param tar
         */
        openDig : function(tar){
            $("body").css("overflow","hidden");
            var _this = $('div[data-tar='+tar+']');
            var eo = _this.find(".pop_animation");
            eo.addClass("showSweetAlert");
            eo.removeClass("hideSweetAlert");
            _this.fadeIn();
            //
            $('div[data-tar='+tar+']').show();
            $('div[data-tar='+tar+'] .popup-main').show();
        },
        /**
         * 加载中
         */
        startLoading : function(){
            layui.use(['layer'], function(){
                var layer = layui.layer;
                COMMON.LOADINGTIP = layer.load(1,{shade: [0.2,'#fff']});
            });
            // $("#result_list").myLoading();
            // var lhtml = '<div class="common-loading"><div class="common-gif"></div></div>';
            // $('body').append(lhtml);
        },
        /**
         * 关闭加载中
         */
        closeLoading : function(){
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.close(COMMON.LOADINGTIP);
            });
            // $('body .common-loading').remove();
        },
        /**
         * 点击图片放大公共
         * @param mask 黑色遮罩
         * @param bigimg 点击放大的图片
         * @param smallimg 小图
         * @param mon 倍数
         */
        zoomImg : function(mask, bigimg, smallimg, mon) {
            this.bigimg = bigimg;
            this.smallimg = smallimg;
            this.mask = mask
            this.mon = mon
        },
        /**
         * 内置正则集
         * @attribute reg
         * @type {Object}
         */
        reg : {
            'int': /^-?\d+$/,
            positiveInt: /^[1-9]\d*$/,  // 正整数
            decimals: /^-?(([1-9]\d*(\.\d+))|(0\.\d+))$/, // 小数（不包含整数）
            positiveDecimals: /^(([1-9]\d*(\.\d+))|(0\.\d+))$/,  // 正小数
            url: /^(http[s]?:\/\/)?([\w-]+\.)+[\w-]+([\w-.\/?%&=]*)?$/,
            email: /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/,
            zipcode: /^\d{6}$/,
            notempty: /\S+/,
            mobile: /^1\d{10}$/,
            tel: /^(([0\+]\d{2,3}-)?(0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/,	//电话号码的函数(包括验证国内区号,国际区号,分机号),
            currency: /^-?(\d{1,3})((\,\d{3})+)?(\.\d+)?$/,			// 货币格式(包括千分号)
        },
        /**
         * 去掉字符串俩边的空格
         * @param  {String} str
         * @return {string}
         */
        trim : function (str) {
            return str.replace(/(^\s*)|(\s*$)/g, "");
        },
        /**
         * 校验上传文件的格式是否允许
         * @param fileId
         * @param type
         * @param callBack
         * @returns {boolean}
         */
        fileTypeAllowCheck : function(fileId, type='img', callBack='') {

            var res = false;
            var err = '';
            var file = document.getElementById(fileId);
            var fileName = file.value.toLowerCase();

            if(fileName==''||fileName=='undefined'){
                alertTip('请选择文件');
                return false;
            }else{
                switch (type){
                    case 'img':
                        err = /.(jpg|png|gif|bmp)$/.test(fileName) ? '' : '图片格式仅支持jpg、png、gif、bmp格式';
                        break;
                    case 'xls':
                        err = /.(xls|xls)$/.test(fileName) ? '' : '上传格式仅支持xls格式';
                        break;
                    case 'certificate':
                        err = /.(pdf|doc|docx|xls|xlsx)$/.test(fileName) ? '' : '上传格式仅支持PDF、DOC、DOCX、XLS、XLSX格式';
                        break;
                    default:
                        err = '未符合要求';
                }
            }

            res = err == '' ? true : false;

            if(typeof callBack == 'function'){
                callBack(res, err);
            }else if(err!=''){
                alertTip(err);
                return false;
            }else{
                return true;
            }
        },
        /**
         * 弹出提示
         * @param message
         * @param autoHide
         * @param width
         * @param height
         */
        showTip : function (message, autoHide, width, height) {

            width = width ? width : 400;
            height = height ? height : 'auto';

            alertTip(message, width, height);

            if (autoHide) {
                setTimeout(function () {
                    alertTipClose();
                },1000);
            }
        },
        /**
         * 复制文字至剪贴板中
         * @param val
         */
        copyText : function (val) {
            var oInput = document.createElement('input');
            oInput.value = val;
            document.body.appendChild(oInput);
            oInput.select(); // 选择对象
            document.execCommand("Copy"); // 执行浏览器复制命令
            oInput.className = 'oInput';
            oInput.style.display='none';
            COMMON.showTip('文字已复制到剪贴板中', true);
        },
        edit: function (id, url = '', callBack='') {
            if (url == '' && this.editUrl == '') {
                return false;
            }
            url = url == '' ? this.editUrl : url;
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                beforeSend: function () {
                    COMMON.startLoading();
                },
                success: function (xhr) {
                    if(typeof callBack == 'function'){
                        callBack(xhr);
                    }else{
                        COMMON.editCallBack(xhr);
                    }
                    COMMON.closeLoading();
                },
                error: function () {
                    layer.msg('请求失败');
                    COMMON.closeLoading();
                },
            });
        },
        'editCallBack' : function (xhr) {
            if (xhr.ret == 'succ') {
                $('li[data-opre=add]').click();
                for (i in xhr.data) {
                    if (i == 'month' || i == 'year') {
                        $(".c-sel").find("option[value=" + xhr.data[i] + "]").attr("selected", true);
                        layui.form.render('select');
                    } else {
                        $('input[name='+ i +']').val(xhr.data[i]);
                    }

                    if (i == 'cover') {
                        $('.img-upload-view').attr('src', xhr.data[i]);
                    }
                }
                CKEDITOR.instances.editor1.setData(xhr.data.content);
            } else {
                layer.msg(xhr.message);
            }
            COMMON.closeLoading();
        },
        del: function (id, url = '', callBack='') {
            layer.confirm('是否确定删除?', {icon: 3, title:'提示'}, function(index){
                if (url == '' && this.delUrl == '') {
                    return false;
                }
                //do something
                url = url == '' ? this.editUrl : url;
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: 'json',
                    beforeSend: function () {
                        COMMON.startLoading();
                    },
                    success: function (xhr) {
                        if(typeof callBack == 'function'){
                            callBack(xhr);
                        }else{
                            if (xhr.ret == 'succ') {
                                layer.msg(xhr.message);
                            } else {
                                layer.msg(xhr.message);
                            }
                        }
                        COMMON.closeLoading();
                        location.reload();
                    },
                    error: function () {
                        layer.msg('请求失败');
                        COMMON.closeLoading();
                    },
                });
                layer.close(index);
            });
        },
        add: function (url = '', json = '', callBack='') {
            $.ajax({
                type: "POST",
                url: url,
                data: json,
                dataType: 'json',
                beforeSend: function () {
                    COMMON.startLoading();
                },
                success: function (xhr) {
                    if (xhr.ret == 'succ') {
                        layer.msg(xhr.message);
                        COMMON.closeLoading();
                        location.reload();
                    } else {
                        layer.msg(xhr.message);
                        COMMON.closeLoading();
                    }
                },
                error: function () {
                    layer.msg('请求失败');
                    COMMON.closeLoading();
                },
            });
        }
    }
    COMMON.zoomImg.prototype = {
        init: function() {
            var that = this;
            this.smallimgClick();
            this.maskClick();
            // this.mouseWheel()
        },
        smallimgClick: function() {
            var that = this;
            $("." + that.smallimg).click(function() {
                $("." + that.bigimg).css({
                    height: $("." + that.smallimg).height() * that.mon,
                    width: $("." + that.smallimg).width() * that.mon
                });
                $("." + that.mask).fadeIn();
                $("." + that.bigimg).attr("src", $(this).attr("src")).fadeIn()
            })
        },
        maskClick: function() {
            var that = this;
            $("." + that.mask).click(function() {
                $("." + that.bigimg).fadeOut();
                $("." + that.mask).fadeOut()
            })
        },
        mouseWheel: function() {
            function mousewheel(obj, upfun, downfun) {
                if (document.attachEvent) {
                    obj.attachEvent("onmousewheel", scrollFn)
                } else {
                    if (document.addEventListener) {
                        obj.addEventListener("mousewheel", scrollFn, false);
                        obj.addEventListener("DOMMouseScroll", scrollFn, false)
                    }
                }
                function scrollFn(e) {
                    var ev = e || window.event;
                    var dir = ev.wheelDelta || ev.detail;
                    if (ev.preventDefault) {
                        ev.preventDefault()
                    } else {
                        ev.returnValue = false
                    }
                    if (dir == -3 || dir == 120) {
                        upfun()
                    } else {
                        downfun()
                    }
                }
            }
            var that = this;
            mousewheel($("." + that.bigimg)[0],
                function() {
                    if ($("." + that.bigimg).innerWidth() > $("body").width() - 20) {
                        return
                    }
                    if ($("." + that.bigimg).innerHeight() > $("body").height() - 50) {
                        return
                    }
                    var zoomHeight = $("." + that.bigimg).innerHeight() * 1.03;
                    var zoomWidth = $("." + that.bigimg).innerWidth() * 1.03;
                    $("." + that.bigimg).css({
                        height: zoomHeight + "px",
                        width: zoomWidth + "px"
                    })
                },
                function() {
                    if ($("." + that.bigimg).innerWidth() < 100) {
                        return
                    }
                    if ($("." + that.bigimg).innerHeight() < 100) {
                        return
                    }
                    var zoomHeight = $("." + that.bigimg).innerHeight() * 1.03;
                    var zoomWidth = $("." + that.bigimg).innerWidth() * 1.03;
                    $("." + that.bigimg).css({
                        height: zoomHeight + "px",
                        width: zoomWidth + "px"
                    })
                })
        }
    };
    return COMMON;
})();