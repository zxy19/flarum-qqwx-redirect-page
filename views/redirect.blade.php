<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $translator->trans('xypp-qqwx-redirect-page.view.title') }}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="format-detection" content="telephone=no">
    <meta content="false" name="twcClient" id="twcClient">
    <meta name="aplus-touch" content="1">
    <style>
        body,
        html {
            width: 100%;
            height: 100%
        }

        * {
            margin: 0;
            padding: 0
        }

        body {
            background-color: #fff
        }

        #browser img {
            width: 50px;
        }

        #browser {
            margin: 0px 10px;
            text-align: center;
        }

        #contens {
            font-weight: bold;
            color: #2466f4;
            margin: -285px 0px 10px;
            text-align: center;
            font-size: 20px;
            margin-bottom: 125px;
            white-space: pre;
        }

        .top-bar-guidance {
            font-size: 15px;
            color: #fff;
            height: 70%;
            line-height: 1.8;
            padding-left: 20px;
            padding-top: 20px;
            background: url({{ $base }}/banner.png) center top/contain no-repeat
        }

        .top-bar-guidance .icon-safari {
            width: 25px;
            height: 25px;
            vertical-align: middle;
            margin: 0 .2em
        }

        .app-download-tip {
            margin: 0 auto;
            width: 290px;
            text-align: center;
            font-size: 15px;
            color: #2466f4;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAcAQMAAACak0ePAAAABlBMVEUAAAAdYfh+GakkAAAAAXRSTlMAQObYZgAAAA5JREFUCNdjwA8acEkAAAy4AIE4hQq/AAAAAElFTkSuQmCC) left center/auto 15px repeat-x
        }

        .app-download-tip .guidance-desc {
            background-color: #fff;
            padding: 0 5px
        }

        .app-download-tip .icon-sgd {
            width: 25px;
            height: 25px;
            vertical-align: middle;
            margin: 0 .2em
        }

        .app-download-btn {
            display: block;
            width: 214px;
            height: 40px;
            line-height: 40px;
            margin: 18px auto 0 auto;
            text-align: center;
            font-size: 18px;
            color: #2466f4;
            border-radius: 20px;
            border: .5px #2466f4 solid;
            text-decoration: none
        }
    </style>
</head>

<body>

    <div class="top-bar-guidance">
        <p>
            {{ $translator->trans('xypp-qqwx-redirect-page.view.tip.line1_before_icon') }}
            <img src="{{ $base }}/3dian.png" class="icon-safari">
            {{ $translator->trans('xypp-qqwx-redirect-page.view.tip.line1_after_icon') }}
        </p>
        <p>
            {{ $translator->trans('xypp-qqwx-redirect-page.view.tip.line2_before_ios') }}
            <img src="{{ $base }}/iphone.png" class="icon-safari">
            {{ $translator->trans('xypp-qqwx-redirect-page.view.tip.line2_before_android') }}
            <img src="{{ $base }}/android.png" class="icon-safari">
            {{ $translator->trans('xypp-qqwx-redirect-page.view.tip.line2_after') }}
        </p>
    </div>

    <div id="contens">
        {{$translator->trans('xypp-qqwx-redirect-page.view.content')}}
    </div>

    <div class="app-download-tip">
        <span class="guidance-desc">{{ $siteUrl }}</span>
    </div>
    <p><br /></p>
    <div class="app-download-tip">
        <span class="guidance-desc">
            {{ $translator->trans('xypp-qqwx-redirect-page.view.click_tip.before_icon') }}
            <img src="{{ $base }}/3dian.png" class="icon-sgd">
            {{ $translator->trans('xypp-qqwx-redirect-page.view.click_tip.after_icon') }}
        </span>
    </div>

    <script src="{{ $base }}/jquery-3.3.1.min.js"></script>
    <script src="{{ $base }}/clipboard.min.js"></script>
    <a data-clipboard-text="{{ $siteUrl }}" class="app-download-btn">
        {{ $translator->trans('xypp-qqwx-redirect-page.view.copy.tip') }}
    </a>
    <script src="{{ $base }}/layer/layer.js"></script>
    <script type="text/javascript">
        new ClipboardJS(".app-download-btn");
    </script>
    <script>
        $(".app-download-btn").click(function() {
            layer.msg(
                "{{ $translator->trans('xypp-qqwx-redirect-page.view.copy.success') }}",
                function() {});
        })
    </script>

    <body>

</html>
