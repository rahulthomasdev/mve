<div>
    <!-- product section -->

    <section class="product_section ">
        <div class="container">
            <div class="w-100 d-flex flex-row justify-content-between ">
                <div class="product_heading">
                    <h2>
                        {{$title}}
                    </h2>
                </div>
                <div>
                    <button class="btn border-none my-3 __btn_bg_green">View All</button>
                </div>
            </div>
            <div class="product_container">
                @foreach($products as $product)
                <div class="box">
                    <div class="box-content">
                        <div class="img-box">
                            <img src="{{ asset('/storage/'. $product->images[0]) }}" alt="$product->name">
                        </div>
                        <div class="detail-box">
                            <div class="text">
                                <h6>
                                    <a href="/product/{{$product->id}}">{{$product->name}}</a>
                                </h6>
                                <h5>
                                    <span>$</span> {{$product->price}}
                                </h5>
                            </div>
                            <div class="like">
                                <h6>
                                    Like
                                </h6>
                                <div class="star_container">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-box">
                        <a href="">
                            Add To Cart
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- end product section -->
</div>