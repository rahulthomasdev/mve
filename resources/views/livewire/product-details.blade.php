<div>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <!-- bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Link Swiper's js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


    <section class="clickble_slider1">
        <div class="container py-4">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Swiper -->
                    <div class="row">
                        <div class="col-md-12 px-0 py-2">
                            <div class="swiper swiper_large_preview">
                                <div class="swiper-wrapper">
                                    @foreach($product->images as $image)
                                    <div class="swiper-slide">
                                        <div class="zoom_img">
                                            <img class="img-fluid" src="{{asset('/storage/'.$image)}}" />
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div class="col-md-12 px-0 py-2">
                            <div thumbsSlider="" class="swiper swiper_thumb">
                                <div class="swiper-wrapper">
                                    @foreach($product->images as $image)
                                    <div class="swiper-slide">
                                        <div class="zoom_img">
                                            <img class="img-fluid" src="{{asset('/storage/'.$image)}}" />
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-sm-6">
                    <h1>{{$product->name}}</h1>
                    <h3 class="text-success">Price: ${{$product->price}}</h3>
                    <div class="lorem_text">

                        <p>
                            {{$product->description}}
                        </p>
                    </div>

                    <label class="mt-3 pr-3">Plant Size:</label><br />
                    <div class="btn-group btn-group-toggle __btn_grp_bg_green" data-toggle="buttons">
                        @foreach ($plantSizes as $size => $label)
                        <label class="btn btn-outline-primary btn-sm" for="{{$size}}">
                            <input type="radio" id="{{$size}}" autocomplete="off" name="plant_size" value="{{ $size }}">
                            {{ $label }}
                        </label>
                        @endforeach
                    </div>
                    <br />
                    <label class="mt-3 pr-3">Select Planter:</label><br />
                    <div class="btn-group btn-group-toggle __btn_grp_bg_green" data-toggle="buttons">
                        @foreach ($planters as $planter => $label)
                        <label class="btn btn-outline-primary btn-sm" for="{{$planter}}">
                            <input type="radio" id="{{$planter}}" autocomplete="off" name="planter" value="{{ $planter }}">
                            {{ $label }}
                        </label>
                        @endforeach
                    </div>
                    <br>
                    <div class="form-group my-3 ">
                        <label for="quantity" class="pr-2 w-50">Enter Quantity: </label>
                        <input type="number" value="0" min="0" max="10" class="form-control w-50" name="quantity" id="quantity" />
                    </div>
                    <div><a href="#" class="btn __btn_bg_green btn-large">Add to cart</a></div>
                    <div class="form-group my-3 ">
                        <label for="pinCode" class="pr-2">Check Delivery: </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter pincode" aria-label="Pincode" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Check</button>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row justify-content-around py-3 __support">
                            <div class="col-md-4 text-primary text-center px-1">
                                <div class="d-flex flex-column">
                                    <i class="fa-solid fa-truck display-4"></i>
                                    <p class="text-center">Free Shipping above $500</p>
                                </div>
                            </div>
                            <div class="col-md-4 text-primary text-center px-1">
                                <div class="d-flex flex-column">
                                    <i class="fa-solid fa-right-left display-4"></i>
                                    <p class="text-center">Guaranteed Replacements if Damaged</p>
                                </div>
                            </div>
                            <div class="col-md-4 text-primary text-center px-1">
                                <div class="d-flex flex-column">
                                    <i class="fa-solid fa-headset display-4"></i>
                                    <p class="text-center">24x7 Support</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Reviews -->
        <div class="container">
            <h2 class="my-4">Customer Reviews</h2>
            <div class="container grid pb-4">
                <div class="product-reviews row">
                    <div class="col-12 col-lg-6 product-reviews__info reviews-info">
                        <h2 class="reviews-info__title headline">12 reviews</h2>
                        <fieldset class="rating">
                            <div class="rating__group">
                                <input type="radio" class="rating__star" name="product-rating" value="1" aria-label="one star">
                                <input type="radio" class="rating__star" name="product-rating" value="2" aria-label="two star">
                                <input type="radio" class="rating__star" name="product-rating" value="3" aria-label="three star">
                                <input type="radio" class="rating__star" name="product-rating" value="4" aria-label="four star" checked>
                                <input type="radio" class="rating__star" name="product-rating" value="5" aria-label="five star">
                            </div>
                        </fieldset>
                        <span class="reviews-info__caption">9 out of 12 (75%)</span>
                        <span class="reviews-info__caption">Customers recommended this product</span>
                    </div>
                    <div class="col-12 col-lg-6 product-reviews__bar reviews-bar">
                        <ul class="list-reset reviews-bar__list">
                            <li class="reviews-bar__item">
                                <div class="progress-bar-review">
                                    <span class="progress-bar-review__star">5</span>
                                    <div class="progress-bar-review__outter-line" data-rating="7">
                                        <span class="progress-bar-review__inner-line progress-bar-review__inner-line--excellent"></span>
                                    </div>
                                    <span id="value" class="progress-bar-review__quantity">7</span>
                                </div>
                            </li>
                            <li class="reviews-bar__item">
                                <div class="progress-bar-review">
                                    <span class="progress-bar-review__star">4</span>
                                    <div class="progress-bar-review__outter-line" data-rating="2">
                                        <span class="progress-bar-review__inner-line progress-bar-review__inner-line--good"></span>
                                    </div>
                                    <span id="value" class="progress-bar-review__quantity">2</span>
                                </div>
                            </li>
                            <li class="reviews-bar__item">
                                <div class="progress-bar-review">
                                    <span class="progress-bar-review__star">3</span>
                                    <div class="progress-bar-review__outter-line" data-rating="1">
                                        <span class="progress-bar-review__inner-line progress-bar-review__inner-line--normal"></span>
                                    </div>
                                    <span id="value" class="progress-bar-review__quantity">1</span>
                                </div>
                            </li>
                            <li class="reviews-bar__item">
                                <div class="progress-bar-review">
                                    <span class="progress-bar-review__star">2</span>
                                    <div class="progress-bar-review__outter-line" data-rating="1">
                                        <span class="progress-bar-review__inner-line progress-bar-review__inner-line--not-bad"></span>
                                    </div>
                                    <span id="value" class="progress-bar-review__quantity">1</span>
                                </div>
                            </li>
                            <li class="reviews-bar__item">
                                <div class="progress-bar-review">
                                    <span class="progress-bar-review__star">1</span>
                                    <div class="progress-bar-review__outter-line" data-rating="1">
                                        <span class="progress-bar-review__inner-line progress-bar-review__inner-line--bad"></span>
                                    </div>
                                    <span id="value" class="progress-bar-review__quantity">1</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-1">John Doe</h5>
                        <small class="text-muted">Rated: 4/5</small>
                    </div>
                    <p class="mb-1">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                    <small class="text-muted">Date: 2024-04-01</small>
                </li>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-1">Jane Smith</h5>
                        <small class="text-muted">Rated: 5/5</small>
                    </div>
                    <p class="mb-1">"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
                    <small class="text-muted">Date: 2024-04-03</small>
                </li>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-1">Alice Johnson</h5>
                        <small class="text-muted">Rated: 3/5</small>
                    </div>
                    <p class="mb-1">"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</p>
                    <small class="text-muted">Date: 2024-04-05</small>
                </li>
            </ul>
        </div>

    </section>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiper_thumb", {
            spaceBetween: 10,
            slidesPerView: 3,
            speed: 300,
            loop: true,
            freeMode: true,
            watchSlidesProgress: true,
            ClickAble: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper2 = new Swiper(".swiper_large_preview", {
            spaceBetween: 10,
            slidesPerView: 1,
            // speed: 300,
            speed: 0,
            loop: true,
            // freeMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });

        //Review bar
        const bars = document.querySelectorAll('.progress-bar-review__outter-line');
        const COUNT_STARS = 12;

        bars.forEach(el => {
            let rating = el.dataset.rating;

            let percent = (100 * rating) / COUNT_STARS;
            console.log(percent);
            el.querySelector('.progress-bar-review__inner-line').style.width = `${percent}%`;
        });

        ScrollReveal().reveal('.headline');
    </script>
</div>