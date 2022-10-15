<?php
    $list = array_chunk($params['products'], 4);
?>

<link rel="stylesheet" href="/css/home/711d96f.css">
<link rel="stylesheet" href="/css/home/e9086d3.css">
<link rel="stylesheet" href="/css/home/aacf5e3.css">
<link rel="stylesheet" href="/css/home//20b58a1.css">
<link rel="stylesheet" href="/css/home/dd6ffaf.css">

<div class="block-featured-product">
    <div class="product-list-title is-flex is-flex-wrap-wrap">
        <a href="/menu" class="title">
            <h2>ĐIỆN THOẠI NỔI BẬT NHẤT</h2>
        </a> 
        <a href="/menu" class="more-product">Xem tất cả</a>
        <div class="list-related-tag">
            <a href="/menu/apple"class="related-tag">Apple</a>
            <a href="/menu/samsung"class="related-tag">Samsung</a>
            <a href="/menu/xiaomi"class="related-tag">Xiaomi</a>
            <a href="/menu/oppo"class="related-tag">OPPO</a>
            <a href="/menu/vivo"class="related-tag">vivo</a>
            <a href="/menu/realme"class="related-tag">realme</a>
            <a href="/menu/nokia"class="related-tag">Nokia</a>
            <a href="/menu/asus"class="related-tag">ASUS</a>
            <a href="/menu/tecno"class="related-tag">Tecno</a> 
            <a href="/menu" class="related-tag">Xem tất cả</a>
        </div>
    </div>
    <div class="product-list" style="display: flex; flex-wrap: wrap;">
        <div class="product-list-swiper">
            <div class="product-list-filter is-flex is-flex-wrap-wrap p-2 swiper-container">
                <?php
                    foreach($list as $group) {
                        echo '<div class="swiper-wrapper" style="max-width: 1135px;">';
                        foreach($group as $element) {
                            echo '<div class="swiper-slide" style="width: 277px; margin-right: 10px; margin-top: 20px;">
                                    <div class="product-info-container">
                                        <div class="product-info">
                                        <a href="/product?id='. $element->id .'" class="product__link">
                                                <div class="product__image">
                                                    <img src="'. $element->image_url .'" alt="'. $element->name .'" class="product__img">
                                                </div>
                                                <div class="product__name">
                                                    <h3>'. $element->name .'</h3>
                                                </div>
                                                <div class="product__more-info is-flex is is-flex-wrap-wrap">
                                                    <p class="product__more-info__item notification is-danger is-light">
                                                        '. $element->description .'
                                                    </p>
                                                </div>
                                                <div class="block-box-price">
                                                    <span class="title-price" style="display: none;">:</span>
                                                    <div class="box-info__box-price">
                                                        <p class="product__price--show">
                                                            '. $element->price_show .'&nbsp;₫
                                                        </p>
                                                        <p class="product__price--through">
                                                            '. $element->price_through .'&nbsp;₫
                                                        </p>
                                                        <div class="product__price--percent">
                                                            <p class="product__price--percent-detail">
                                                                Giảm&nbsp;'. $element->discount .'%
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="product__box-rating"></div>
                                            <div class="product__sticker-doc-quyen" data-src="https://cdn2.cellphones.com.vn/70x/media/sticker/sticker-doc-quyen-3.svg" lazy="loading" style="display: none; background-image: url(&quot;https://cdn2.cellphones.com.vn/200x/media/wysiwyg/placehoder.png&quot;);"></div>
                                        </div>
                                        <div class="btn-wish-list">
                                            <span>Yêu thích &nbsp;</span>
                                            <div id="wishListBtn">
                                                <button class="btn__effect inactive">
                                                    <svg viewBox="20 18 29 28" aria-hidden="true" focusable="false" class="heart-border icon-svg icon-svg--color-cps">
                                                        <path d="M28.3 21.1a4.3 4.3 0 0 1 4.1 2.6 2.5 2.5 0 0 0 2.3 1.7c1 0 1.7-.6 2.2-1.7a3.7 3.7 0 0 1 3.7-2.6c2.7 0 5.2 2.7 5.3 5.8.2 4-5.4 11.2-9.3 15a2.8 2.8 0 0 1-2 1 3.4 3.4 0 0 1-2.2-1c-9.6-10-9.4-13.2-9.3-15 0-1 .6-5.8 5.2-5.8m0-3c-5.3 0-7.9 4.3-8.2 8.5-.2 3.2.4 7.2 10.2 17.4a6.3 6.3 0 0 0 4.3 1.9 5.7 5.7 0 0 0 4.1-1.9c1.1-1 10.6-10.7 10.3-17.3-.2-4.6-4-8.6-8.4-8.6a7.6 7.6 0 0 0-6 2.7 8.1 8.1 0 0 0-6.2-2.7z"></path>
                                                    </svg> 
                                                    <svg viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false"class="heart-stroke icon-svg icon-svg--color-silver">
                                                        <path d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z"></path>
                                                    </svg> 
                                                    <svg viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false"class="heart-full icon-svg icon-svg--color-cps">
                                                        <path d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z"></path>
                                                    </svg> 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="5.707 17 48 20" class="broken-heart">
                                                        <g fill="#D70018">
                                                            <path d="M29.865 32.735V18.703a4.562 4.562 0 0 0-3.567-1.476c-2.916.017-4.378 2.403-4.538 4.756-.118 1.781.227 4.006 5.672 9.737a3.544 3.544 0 0 0 2.428 1.025l-.008-.008.013-.002z" class="broken-heart--left"></path>
                                                            <path d="M37.868 22.045c-.135-2.588-2.277-4.823-4.697-4.823a4.258 4.258 0 0 0-3.302 1.487l-.004-.003v14.035a3.215 3.215 0 0 0 2.289-1.033c.598-.596 5.882-5.99 5.714-9.663z" class="broken-heart--right"></path>
                                                        </g>
                                                        <path fill="none" stroke="#FFF" stroke-miterlimit="10" d="M29.865 18.205v14.573" class="broken-heart--crack"></path>
                                                    </svg> 
                                                    <span class="effect-group">
                                                        <span class="effect"></span>
                                                        <span class="effect"></span> 
                                                        <span class="effect"></span> 
                                                        <span class="effect"></span> 
                                                        <span class="effect"></span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
