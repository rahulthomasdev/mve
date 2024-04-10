<div>

    <div class="hero_area">
        <!-- slider section -->
        <section class="slider_section ">
            <div class="slider_bg_box">
                <img src="{{asset('images/frontend/slider-bg.jpg')}}" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Lorem ipsum dolor sit amet
                                        </h1>
                                        <p>
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores perspiciatis, illo
                                            maxime voluptatem a itaque suscipit.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Contact Us
                                            </a>
                                            <a href="" class="btn2">
                                                About Us
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Lorem ipsum dolor sit amet
                                        </h1>
                                        <p>
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores perspiciatis, illo
                                            maxime voluptatem a itaque suscipit.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Contact Us
                                            </a>
                                            <a href="" class="btn2">
                                                About Us
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Lorem ipsum dolor sit amet
                                        </h1>
                                        <p>
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores perspiciatis, illo
                                            maxime voluptatem a itaque suscipit.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Contact Us
                                            </a>
                                            <a href="" class="btn2">
                                                About Us
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>
        </section>
        <!-- end slider section -->
    </div>
    @livewire('service')
    @livewire('product-section', ['title'=>'Best Picks', 'highlight'=>'best_picks'])
    @livewire('product-section', ['title'=>'Featured', 'highlight'=>'featured'])
    @livewire('product-section', ['title'=>'Best Seller', 'highlight'=>'best_seller'])
</div>