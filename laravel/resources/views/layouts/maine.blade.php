<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>@yield('title','Hello Laravel! - by Frostmaki')</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        *{
            margin:0;
            padding:0;
        }
        html, body {
            height: 100%;
        }
        header{
            width: 100%;
            height: 50px;
            background:orangered;
        }
        div.container{
            /*保证footer是相对于container位置绝对定位*/
            position:relative;
            width:100%;
            min-height: 100% ;
            /*设置padding-bottom值大于等于footer的height值，以保证main的内容能够全部显示出来而不被footer遮盖；*/
            padding-bottom: 50px;
        }
        div.content{

        }
        footer{
            width: 100%;
            height:50px;   /* footer的高度一定要是固定值*/
            position:absolute;
            bottom:0;

            background: #333;
        }
    </style>
</head>

<body style="font-size: 18px;margin-left: 5px;margin-right: 5px">


    <div class="container">
        <header style="background-color: #ffe4c4;">
            @include("layouts._header")
        </header>

        <div class="content" style="color: red">
            @include('shared._messages')
            @yield("content")
        </div>

        <footer>
            @include("layouts._footer")
        </footer>
    </div>



</body>
</html>
