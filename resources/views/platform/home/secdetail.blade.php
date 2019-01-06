@extends('platform.layouts._header')

@section('body')
    <div class="banner-int gef-banner">
        <div class="wrapper gef-s"></div>
        <div class="banner-bg"><img src="/platform/img/sub_banner2.jpg" alt=""></div>
    </div>
    <div class="wrapper">
        <div class="faqbody">
            <div class="detailTit"><h2><?php echo $detail->title;?></h2></div>
            <div class="detailBody">
                <?php echo $detail->content;?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        setCurrMenu('dada');
        // 数字递增
        $('.counter-numb').lemCounter();
    </script>
@endsection