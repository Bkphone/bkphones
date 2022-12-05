<?php
$path = str_replace("\\", "/", "http://" . $_SERVER['SERVER_NAME'] . __DIR__ . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

header("Content-type: text/html; charset=utf-8");
use app\core\Application;
use app\models\ProductInCart;

$user = null;
if(!Application::$app->isGuest()) {
  $user = Application::$app->user;
}
?>
<!doctype html>
<html data-n-head-ssr lang="vi" data-n-head="%7B%22lang%22:%7B%22ssr%22:%22vi%22%7D%7D">

<head>
    <title>Bkphone - Điện thoại, laptop, tablet, phụ kiện chính hãng</title>
    <meta data-n-head="ssr" name="description"
        content="Hệ thống cửa hàng bán lẻ điện thoại, máy tính laptop, smartwatch, smarthome, thiết bị IT, phụ kiện chính hãng - Giá tốt, trả góp 0%, giao miễn phí.">
    <meta data-n-head="ssr" charset="utf-8">
    <meta data-n-head="ssr" name="viewport" content="width=device-width, initial-scale=1">
    <meta data-n-head="ssr" name="keywords" content="Bkphone, cellphone, cellphone s, cell phones, cell phone">
    <meta data-n-head="ssr" name="url" content="">
    <meta data-n-head="ssr" name="robots" content="INDEX,FOLLOW">
    <meta data-n-head="ssr" property="og:locale" content="vi_VN">
    <meta data-n-head="ssr" property="og:type" content="website">
    <meta data-n-head="ssr" property="og:title" content="Bkphone - Điện thoại, laptop, tablet, phụ kiện chính hãng">
    <meta data-n-head="ssr" property="og:description"
        content="Hệ thống cửa hàng bán lẻ điện thoại, máy tính laptop, smartwatch, smarthome, thiết bị IT, phụ kiện chính hãng - Giá tốt, trả góp 0%, giao miễn phí.">
    <meta data-n-head="ssr" property="og:site_name"
        content="Bkphone - Điện thoại, laptop, tablet, phụ kiện chính hãng">
    <meta data-n-head="ssr" rel="canonical" content="">
    <meta data-n-head="ssr" property="fb:app_id" content="112980886043945">
    <link data-n-head="ssr" rel="icon" type="image/x-icon" href="/images/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/home/1196541.css">
    <link rel="stylesheet" href="/css/home/0f46318.css">
    <link rel="stylesheet" href="/css/home/38c6d13.css">
    <link rel="stylesheet" href="/css/home/63e594b.css">
    <link rel="stylesheet" href="/css/home/b10a813.css">
    <link rel="stylesheet" href="/css/home/6aa7e2b.css">
    <link rel="stylesheet" href="/css/home/1a0550b.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <div data-server-rendered="true" id="__nuxt">
        <div id="__layout">
            <div class="cps-page">
                <div data-fetch-key="Header:0">
                    <header id="cpsHeader" class="cps-header sticky ">
                        <!-- <div id="topBarHeader">
                            <div class="is-flex is-justify-content-center is-align-content-center">
                                <div class="pulsingButton mr-3"></div> 
                                <a href="/mobile/apple/iphone-14.html" class="has-text-white text-topbar">
                                    iPhone 14 Series đặt hàng từ 7-13/10 - Đăng ký ngay!
                                </a>
                            </div>
                        </div> -->
                        <div class="cps-container">
                            <nav class="cps-navbar">
                                <a href="/" class="navbar-brand">
                                    <div class="box-logo cps-navbar__logo logo__desktop navbar-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="160" height="30" viewBox="0 0 160 30" xml:space="preserve">
                                            <rect x="0" y="0" width="100%" height="100%" fill="transparent"/>
                                            <g transform="matrix(1 0 0 1 80 15)" id="ae4eff19-8ffd-40db-a734-d50515ade8f2">
                                                <rect style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1; visibility: hidden;" vector-effect="non-scaling-stroke" x="-80" y="-15" rx="0" ry="0" width="160" height="30"/>
                                            </g>
                                            <g transform="matrix(Infinity NaN NaN Infinity 0 0)" id="5bbda9ed-0694-44e1-af7f-88badba7e946"></g>
                                            <g transform="matrix(0.36 0 0 0.36 80 15.41)" id="9acab445-a213-434d-aa42-f94a34807fe5">
                                                <text xml:space="preserve" font-family="Kanit-Regular" font-size="78" 
                                                    font-style="normal" font-weight="400" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1; white-space: pre; font-family: 'Kanit', sans-serif;">
                                                    <tspan x="-169.92" y="24.5">Bkphone</tspan>
                                                </text>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="box-logo cps-navbar__logo logo__mobile navbar-item">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="0 0 120 120">
                                            <title>Logo Bkphone</title>
                                            <g id="Layer_2" data-name="Layer 2">
                                                <g id="Layer_1-2" data-name="Layer 1">
                                                <image width="120" height="120"
                                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAIAAAC2BqGFAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTFGN0JGRkVDMEM1MTFFQTkwMkZBOEFENzdFODgwMUYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NTFGN0JGRkZDMEM1MTFFQTkwMkZBOEFENzdFODgwMUYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo1MUY3QkZGQ0MwQzUxMUVBOTAyRkE4QUQ3N0U4ODAxRiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo1MUY3QkZGREMwQzUxMUVBOTAyRkE4QUQ3N0U4ODAxRiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgpTqXEAAAhlSURBVHja7JwLbBTHGcdnZnf29p4G2+czhhST1tDWPFpMwyNReCYhkBCEaZUHCqCWCDWVAq0SqUnaVFRq2oZKEAiFtokAA1YKBAohhjwNpG5DRZvYjWtiit1CZIxtjO+1dze7O907O1RE4JydW9/e5vtbsmTdzXr3t9/O9/9mZwa30HIEMl8EEABoAA0C0AAaQIMANIAGAWgADaBBANpGEjN3KIxUlfO4neBg6kCIWwy0rgolfmlyefLMeO5Dxlg9d541nUVEtBZoXYs5p38jsPd528RzcMP2zrXPEOK1Xh+taXbqVTlTIRmC6wABaAANoEEAGkCDADSABtAgAJ1rErPyX1lza/zUB1ig2QegMcetU8TSkfYEHX2ttmPNjwTkyzpnjuKOiZNH1O4mw/NsCBpTSpAHU3fWQWPkjtfXd656qmjvJoQx9NFmpinRF95/6MrPNkEyND2qieDpXrcxsrcGQJsd1QRhsXPVk4kPmgC0yWEtSnpP8NKDa/WuKwDaXAOCqSvR+GHnd3+MdN0uoLk135NzQn3hPx3p/smGVJBn0oRkyd6JAkcJi3bXgufKLzY7ZnyT5HlyPqLdlXe5bpups3Ay5VsxMdKuR34ae/uvmDhyGzQpzC/a/4JjYjm3JGssUq2tM/LyUSzkOGhDQlFB4MBvxdLRnEWtGNeigAQBZW7OVTZdh3jzlwKHtgnFhZwpVmSd0TPKsr2TJowL7NtCvG7O7DQ70pI+2nFrRdGeDdghcFUF0Gk+a4N82Jz3zPa/+CuEVJvN3jMN9OcISfdDiwo2PsP1mBlVmRUkrBGKMhPNRNQutLF/niF5Xlo6ahDR7Zg6CWMx+k4tJpKpQ8O5DTqJJqHG6xsiVYeVoyeM6BZHjyRu14COIc+6hfdElbq6ZKVgL9Q48/t1cM7VOEeMloxyLbnLu2KJVDF+QAfoWP5EaGc1oXkAOj3gTOVIIdTtnDvNs7LStXAOdjvTaphgl5b+IHK4hlAfgE5bus61mEGPji3zPHSvZ9l9Rp3y2Y3CkfZ7VinH/5xizQF0+uGNuJrgKCbkFbgWzvKsXOqcO6P/jKd3XG67c3n8/QZCvZ9m3TvKmlMJEw/1nkqqpnMFI9HwGN7lS1yV84Wight+t/XCxXkPs3+3pt6X86uUsVPm4SjnCSw6cyVn4uxsXvVJwhRHjHQvne9dUZlaN3cdscbmtnkPa20dmDr7WGsaCQz3rX5QeasuduIvRimARdn60Z05ezdAL4gFEQsOvScSO3UqvP1grO40lqhhwI3f15yfv0CeXhHZf5RHFZwcTkuOF+s9PUhTA69skadPNu6B2vIfpCcwplbGjS2xHdvVhDmuzLNskeeBReKXr0mYSs2J9iWreVzDYu9twDoLuufPDdS8lPr0ePD5HdFj7xqdCRFcyZF7iOgbBzg1CkKto0t553h4xyFWf4YM89IxN/V2wbRsNC0rjbxSgznu5Wg8DYmPGrXWdtfiO4yPDDPjnD2VhxXW3KKzsJEDrIbbGqD7cBv4hORLDSURb2iI7DxkVJicsd4KUxo/Vgz4o68eM8r03i4CEzn2j9NIJ87Z04w/ja+5v7PAteB2lNDYRy16LIi5hXBbCfT/R7oIFiRMBPX8x9Ejb0R3H1H/+7FY7HfdO0fIz4++9mYfa+MHU6X2XbFkhOOT4lMoCRgx7l58ByaievacFulGunHzso8bW3/LzL4KU3I7583wPboseuxkaOtuA19f6tNUI3CLD2xzLpj5aXfYciH0u+rQjgNq2wWMZEwlAJ1+wiTS+K+q5y/yiHLVY3CWEIZ5it+quq5H1C52hF7aG/r9H1lrC0ZSamcIAJ1WhcmwKF7r5DBnUaOyH/H2bnF0yfVvU3dPuOpgcOuexL+aMKIp6w2gB3UhOgvJ36oofnMH8d1w4othxsMvHwm9UBU7XY+HttLBdtrWOGmu71sY2Lc5OVmgHzE1cvD14KadsZN/44ZrSVpv03Fb0nUMOmoMc93YoF8OuxbM6veiiVRe5l25VL5lkn65h51t5Zpy1TUC6PRYE0fsvfeI7JJvm/KZX05VOouds6byUJQ1t6YqHWpSdNsNdLLINMz1Gyfo2DHShHHptBBLjUpnoevuVKXTfM6kSgfbcut5rqpYFopffVGeM21ADVnj2eCWXeE9h7XuDoJdKDm0wgF0/2VOXAjkG4aPfv0rA21rVDrBbdXh7fv1rh6j489MtYtsKkxlrb2jvfJRrb1zoG3FMaPyf/l43pqVuhrN2LACsq04pu5EU9Ol+x8z7PNgDkAzOUvf3mtYOKFepfZk5/eeGpQt5wB6IFco+kLV+7qf+HWWT8P2oFPrNb3dz20JbqoC0GZfJSbE2bX259EDrwNos8caBKQlJ5vF6/4OoM02fJIW6gxurgLQQyAxW1MSvnhLlO0AWtc5YwhhBDIPNFfj8swp8rRJnEWAtZmguSqUFPn3/EYoLLT9WrYsdx16RBHH3OSvWo9EbOP1VVZJhs75txesf1LXo1bdK8JGBYvvseV5q1foahD4mm7v8jc+7Zo7R2chSIzmgsYS9e9aL5WVpTYvAJlZsAjF/qLqjcTn5SoD0OZWhlJFeeEfnkVIs+vCYwuV4O5v3z183Q91LYy+2B5kKDavGvb099mZc8FdVRg5spsbdRQa5PvDnABtqHDrOmniWB5jQzDLrb/yVWOOCV+zM2jsduU9/gj00SAADaBBABpAA2gQgAbQIAANoAE0KHdA8+TKYRsJy44MblCWMTTJxZTvN11e+6xNxvgFkjj9IRbkjPHJ3KosjBjTkWKfiE5uhSBnKqgz+LBzREWCvPbqWm2x9TwkQxCABtAgAA2gATQIQANoEIAG0AAalGn9T4ABAAi7CCUB4zUcAAAAAElFTkSuQmCC">
                                                </image>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </a> 
                                <a href="/menu" class="header-item btn-menu">
                                    <div class="about__box-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.99 26.99">
                                            <defs>
                                                <style>
                                                    .cls-1 {
                                                        fill: none;
                                                        stroke: #fff;
                                                        stroke-linecap: round;
                                                        stroke-linejoin: round;
                                                        stroke-width: 1.8px;
                                                    }
                                                </style>
                                            </defs>
                                            <g id="Layer_2" data-name="Layer 2">
                                                <g id="Layer_1-2" data-name="Layer 1">
                                                    <line x1="7.06" y1="7.52" x2="19.92" y2="7.52" class="cls-1"></line>
                                                    <line x1="7.06" y1="13.49" x2="19.92" y2="13.49" class="cls-1"></line>
                                                    <line x1="7.06" y1="19.47" x2="11.95" y2="19.47" class="cls-1"></line>
                                                    <rect x="0.9" y="0.9" width="25.19" height="25.19" rx="4.71" class="cls-1"></rect>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="about__box-content">
                                        <p class="title">Danh mục<br>điện thoại</p>
                                    </div>
                                </a>
                                <div class="box-search cps-navbar__search">
                                    <form>
                                        <div class="cps-group-input is-flex">
                                            <div class="input-group-btn">
                                                <button type="submit" class="pr-0 border-0 shadow-none outline-none text-dark">
                                                    <div>
                                                        <img src="/images/home/search.svg">
                                                    </div>
                                                </button>
                                            </div> 
                                            <input id="inpSearch" type="text" placeholder="Bạn cần tìm gì?" autocomplete="off" value="" class="cps-input">
                                        </div>
                                    </form>
                                    <div class="header-overlay"></div>
                                </div> 
                                <a href="tel:18002097" class="header-item about-contact">
                                    <div class="about__box-icon">
                                        <img src="/images/home/phone.svg">
                                    </div>
                                    <div class="about__box-content">
                                        <p class="title">Gọi mua hàng<br> <strong>1800.2097</strong></p>
                                    </div>
                                </a> 
                                <!-- <a target="_blank" rel="noopener" href="/stores" class="header-item about-store">
                                    <div class="about__box-icon">
                                        <img src="/images/home/location.svg">
                                    </div>
                                    <div class="about__box-content">
                                        <p class="title">Cửa hàng<br>gần bạn</p>
                                    </div>
                                </a>  -->
                                <a target="_blank" rel="noopener" href="/lookup-orders" class="header-item about-delivery-tracking">
                                    <div class="about__box-icon">
                                        <img src="/images/home/order-lookup.svg" alt="Tra cứu đơn hàng">
                                    </div>
                                    <div class="about__box-content">
                                        <p class="title">Tra cứu<br>đơn hàng</p>
                                    </div>
                                </a> 
                                <a href="/cart" class="header-item about-cart">
                                    <div class="about__box-icon">
                                        <img src="/images/home/cart.svg"/>
                                    </div>
                                    <div class="about__box-content">
                                        <p class="title">Giỏ <br>hàng</p> 
                                        <span id="items_in_cart">
                                            <?php 
                                            $quantity = 0;
                                            if(isset($user)){
                                                $quantity = ProductInCart::getTotalQuantity($user->id);
                                            }
                                            echo (isset($quantity))? $quantity: 0;
                                            ?>
                                        </span>
                                    </div>
                                </a>
                                <a href="/login" class="header-item about-5 about-smember cta-smember">
                                    <div class="about__box-icon">
                                        <img src="/images/home/login.svg">
                                    </div>
                                    <div class="about__box-content">
                                        <span class="title">
                                            <?php
                                                echo $user ? $user->getName() : "Đăng nhập";
                                            ?>
                                        </span>
                                    </div>
                                </a>
                            </nav>
                        </div>
                    </header>
                    <div class="clear"></div>
                    <div class="header-overlay"></div>
                </div>
                <div class="cps-container cps-body">
                    <div>
                        {{content}}
                    </div>
                </div>
                <footer data-fetch-key="Footer:0" class="cps-footer">
                    <div class="cps-footer__top">
                        <div class="cps-container">
                            <div class="columns columns is-flex is-flex-wrap-wrap">
                                <div class="column is-one-quarter-desktop is-half-tablet is-full-mobile top__box-one">
                                    <div class="box-one__store mb-3">
                                        <div class="store__title">
                                            <p class="mb-3 title">Tìm cửa hàng</p>
                                        </div>
                                        <div class="store__content">
                                            <ul class="list-link">
                                                <li class="link">
                                                    <a target="_blank" rel="noopener" href="/stores">Danh sách cửa hàng</a>
                                                </li>
                                                <li class="link">
                                                    <a target="_blank" rel="noopener" href="/delivery-policy">Mua hàng từ xa</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="box-one__pay-gate-way">
                                        <div class="pay-gate-way__title">
                                            <p class="mb-3 title">Phương thức thanh toán</p>
                                        </div>
                                        <div class="pay-gate-way__content">
                                            <ul class="list-link">
                                                <li class="link border icon-cps rounded">
                                                    <a href="/sforum/huong-dan-toan-bang-zalopay-khi-mua-hang-tren-website-Bkphone">
                                                        <img src="/images/logo/payment/zalopay-logo.png" alt="Zalopay">
                                                    </a>
                                                </li>
                                                <li class="link border icon-cps rounded">
                                                    <a href="/sforum/huong-dan-su-dung-vnpay-qrcode-tren-website-Bkphone">
                                                        <img src="/images/logo/payment/vnpay-logo.png" alt="Vnpay">
                                                    </a>
                                                </li>
                                                <li class="link border icon-cps rounded">
                                                    <a href="/uu-dai-doi-tac/moca">
                                                        <img src="/images/logo/payment/moca-logo.png" alt="Moca">
                                                    </a>
                                                </li>
                                                <li class="link border icon-cps rounded">
                                                    <a href="/huong-dan-mua-hang-va-thanh-toan-qua-cong-momo">
                                                        <img src="/images/logo/payment/momo-logo.png" alt="Momo">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-one-quarter-desktop is-half-tablet is-full-mobile top__box-two">
                                    <div class="box-two__call mb-3">
                                        <ul class="list-link">
                                            <li class="link">
                                                <div>Gọi mua hàng <a href="tel:18002097"><strong>1800.2097</strong></a>
                                                    (8h00 - 22h00)
                                                </div>
                                            </li>
                                            <!-- <li class="link">
                                                <div>Gọi bảo hành <a href="tel:18002064"><strong>1800.2064</strong></a>
                                                    (8h00 - 21h00)
                                                </div>
                                            </li>
                                            <li class="link">
                                                <div>Gọi khiếu nại <a href="tel:18002063"><strong>1800.2063</strong></a>
                                                    (8h00 - 21h30)
                                                </div>
                                            </li> -->
                                        </ul>
                                    </div>
                                    <!-- <div class="box-two__warranty">
                                        <div class="warranty-logo">
                                            <a href="#" class="warranty-logo-dtv">
                                                <div class="box-left">
                                                    <p><strong>Đối tác dịch vụ bảo hành</strong>Điện Thoại - Máy tính</p>
                                                </div>
                                                <div class="box-right">
                                                    <img src="/images/home/box-right.svg"/>
                                                </div>
                                            </a>
                                            <a href="#" class="warranty-logo-dtv dtv-asp">
                                                <div class="box-left">
                                                    <p><strong class="font-10">Trung tâm bảo hành ủy quyền Apple</strong></p>
                                                </div>
                                                <div class="box-right">
                                                    <img width="100%" alt="dtv-asp" src="/images/logo/icon/logo_dtv-asp.png">
                                                </div>
                                            </a>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="column is-one-quarter-desktop is-half-tablet is-full-mobile top__box-three">
                                    <div class="box-three__search">
                                        <ul class="list-link">
                                            <li class="link">
                                                <a target="_blank" rel="noopener" href="/delivery policy">
                                                    Mua hàng và thanh toán Online
                                                </a>
                                            </li>
                                            <!-- <li class="link">
                                                <a target="_blank" rel="noopener" href="/tra-gop-online-the-tin-dung">Mua
                                                    hàng trả góp Online
                                                </a>
                                            </li> -->
                                            <li class="link">
                                                <a target="_blank" rel="noopener" href="/lookup-orders">
                                                    Tra thông tin đơn hàng
                                                </a>
                                            </li>
                                            <!-- <li class="link">
                                                <a target="_blank" rel="noopener" href="/bkmember">
                                                    Tra điểm Smember
                                                </a>
                                            </li> -->
                                            <!-- <li class="link">
                                                <a target="_blank" rel="noopener"href="/sua-chua-phan-cung.html">
                                                    Dịch vụ bảo hành điện thoại
                                                </a>
                                            </li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="column is-one-quarter-desktop is-half-tablet is-full-mobile top__box-four">
                                    <div class="box-four--information">
                                        <ul class="list-link">
                                            <li class="link">
                                                <a target="_blank" rel="noopener"
                                                    href="/tos">Quy chế hoạt động
                                                </a>
                                            </li>
                                            <li class="link">
                                                <a target="_blank" rel="noopener" href="/chinh-sach-bao-hanh">
                                                    Chính sách Bảo hành
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>