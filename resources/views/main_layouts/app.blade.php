<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="{{asset('img/MinistryLogo.png')}}"/>
    <title>PPW</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400%7CSource+Sans+Pro:700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    {{--<link type="text/css" rel="stylesheet" href="{{asset('css/theme-style.css')}}"/>--}}
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script nonce="f55df08c-0035-452f-9326-85af7d89702d">(function (w, d) {
            !function (a, e, t, r) {
                a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zaraz = {deferred: []}, a.zaraz.q = [], a.zaraz._f = function (e) {
                    return function () {
                        var t = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({m: e, a: t})
                    }
                };
                for (const e of["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
                a.addEventListener("DOMContentLoaded", (() => {
                    var t = e.getElementsByTagName(r)[0], z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    for (n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.x = Math.random(), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), a.zarazData.q = []; a.zaraz.q.length;) {
                        const e = a.zaraz.q.shift();
                        a.zarazData.q.push(e)
                    }
                    z.defer = !0;
                    for (const e of[localStorage, sessionStorage]) Object.keys(e).filter((a => a.startsWith("_zaraz_"))).forEach((t => {
                        try {
                            a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t))
                        } catch {
                            a.zarazData["z_" + t.slice(7)] = e.getItem(t)
                        }
                    }));
                    z.referrerPolicy = "origin", z.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t)
                }))
            }(w, d, 0, "script");
        })(window, document);</script>
    <style>
        html {
            scroll-behavior: smooth;
        }
        p{
            color: black;
            font-size: medium;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
    </style>
</head>
<body>

@include('main_layouts.header')
@yield('main_content')
@include('main_layouts.footer')

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js%2bowl.carousel.min.js.pagespeed.jc.6INv6TP5LI.js')}}"></script>
<script>eval(mod_pagespeed_o3ddRsRvMY);</script>
<script>eval(mod_pagespeed_hws1mPg42b);</script>
<script src="{{asset('js/jquery.stellar.min.js%2bmain.js.pagespeed.jc.TaD_OS7Wkn.js')}}"></script>
<script>eval(mod_pagespeed_Ki5OopftaL);</script>
<script>eval(mod_pagespeed_JMZFdOFuYW);</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
        integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
        data-cf-beacon='{"rayId":"717ffef97824892c","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}'
        crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/charity2/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2022 07:43:36 GMT -->
</html>
