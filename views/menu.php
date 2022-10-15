<link rel="stylesheet" href="/css/home/aacf5e3.css">
<link rel="stylesheet" href="/css/home//20b58a1.css">

<div class="filter-sort__list-product">
    <div class="block-product-list-filter">
        <div class="product-list-filter is-flex is-flex-wrap-wrap">
            <?php
            foreach ($params['products'] as $param) {
                echo '
                    <div class="product-info-container product-item">
                        <div class="product-info"><a href="/product?id=' . $param->id . '"
                                class="product__link">
                                <div class="product__image">
                                    <img src="' . $param->image_url . '" alt="' . $param->name . '" class="product__img">
                                </div>
                                <div class="product__name">
                                    <h3>' . $param->name . '</h3>
                                </div>
                                <div class="product__badge"></div>
                                <div class="product__more-info is-flex is is-flex-wrap-wrap">
                                    <p class="product__more-info__item notification is-danger is-light">
                                        Sắp về hàng
                                    </p>
                                </div>
                                <div class="block-box-price">
                                    <span class="title-price" style="display:none;">:</span>
                                    <div class="box-info__box-price">
                                        <p class="product__price--show">
                                        ' . $param->price_show . ' ₫
                                        </p>
                                        <p class="product__price--through">
                                        ' . $param->price_through . ' ₫
                                        </p>
                                        <div class="product__price--percent">
                                            <p class="product__price--percent-detail">
                                                Giảm ' . $param->discount . '%
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="product__promotions">
                                    <div>
                                        <div class="promotion">
                                            <p class="gift-cont">
                                                '. $param->description .'
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="product__box-rating">
                                <div>
                                    <div class="icon-star is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512">
                                            <path
                                                d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z">
                                            </path>
                                        </svg></div>
                                    <div class="icon-star is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512">
                                            <path
                                                d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z">
                                            </path>
                                        </svg></div>
                                    <div class="icon-star is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512">
                                            <path
                                                d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z">
                                            </path>
                                        </svg></div>
                                    <div class="icon-star is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512">
                                            <path
                                                d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z">
                                            </path>
                                        </svg></div>
                                    <div class="icon-star is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512">
                                            <path
                                                d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z">
                                            </path>
                                        </svg></div>
                                </div>
                            </div>
                            <div class="product__sticker-doc-quyen" style="display:none;"></div>
                        </div>
                        <div class="btn-wish-list"><span>Yêu thích </span>
                            <div id="wishListBtn">
                                <button class="btn__effect inactive">
                                    <svg viewBox="20 18 29 28" aria-hidden="true" focusable="false" class="heart-border icon-svg icon-svg--color-cps">
                                        <path
                                            d="M28.3 21.1a4.3 4.3 0 0 1 4.1 2.6 2.5 2.5 0 0 0 2.3 1.7c1 0 1.7-.6 2.2-1.7a3.7 3.7 0 0 1 3.7-2.6c2.7 0 5.2 2.7 5.3 5.8.2 4-5.4 11.2-9.3 15a2.8 2.8 0 0 1-2 1 3.4 3.4 0 0 1-2.2-1c-9.6-10-9.4-13.2-9.3-15 0-1 .6-5.8 5.2-5.8m0-3c-5.3 0-7.9 4.3-8.2 8.5-.2 3.2.4 7.2 10.2 17.4a6.3 6.3 0 0 0 4.3 1.9 5.7 5.7 0 0 0 4.1-1.9c1.1-1 10.6-10.7 10.3-17.3-.2-4.6-4-8.6-8.4-8.6a7.6 7.6 0 0 0-6 2.7 8.1 8.1 0 0 0-6.2-2.7z">
                                        </path>
                                    </svg> 
                                    <svg viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false" class="heart-stroke icon-svg icon-svg--color-silver">
                                        <path
                                            d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z">
                                        </path>
                                    </svg> 
                                    <svg viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false" class="heart-full icon-svg icon-svg--color-cps">
                                        <path
                                            d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z">
                                        </path>
                                    </svg> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="5.707 17 48 20" class="broken-heart">
                                        <g fill="#D70018">
                                            <path
                                                d="M29.865 32.735V18.703a4.562 4.562 0 0 0-3.567-1.476c-2.916.017-4.378 2.403-4.538 4.756-.118 1.781.227 4.006 5.672 9.737a3.544 3.544 0 0 0 2.428 1.025l-.008-.008.013-.002z" class="broken-heart--left">
                                            </path>
                                            <path
                                                d="M37.868 22.045c-.135-2.588-2.277-4.823-4.697-4.823a4.258 4.258 0 0 0-3.302 1.487l-.004-.003v14.035a3.215 3.215 0 0 0 2.289-1.033c.598-.596 5.882-5.99 5.714-9.663z" class="broken-heart--right">
                                            </path>
                                        </g>
                                        <path fill="none" stroke="#FFF" stroke-miterlimit="10" d="M29.865 18.205v14.573"class="broken-heart--crack"></path>
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
                    </div>';
                }
            ?>
            
        </div>
        <div class="cps-block-content_btn-showmore">
            <a class="button btn-show-more">Xem thêm
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="10" height="10">
                        <path
                            d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z">
                        </path>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</div>