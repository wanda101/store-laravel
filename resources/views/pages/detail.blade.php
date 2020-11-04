@extends('layouts.app')

@section('title')
  Store - Detail Page
@endsection

@section('content')
    <div class="page-content page-details">
            <!-- breadcrumbs  -->
            <section
                class="store-breadcrumbs"
                data-aos="fade-down"
                data-aos-delay="100"
            >
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Product Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumbs  -->
            <!-- galeri -->
            <section class="store-gallery" id="gallery" data-aos="zoom-in">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8" data-aos="zoom-in">
                            <transition name="slide-fade" mode="out-in">
                                <img
                                    :src="photos[activePhoto].url"
                                    :key="photos[activePhoto].id"
                                    class="w-100 main-image"
                                    alt=""
                                />
                            </transition>
                        </div>
                        <div class="col-lg-2">
                            <div class="row">
                                <div
                                    class="col-3 col-lg-12 mt-2 mt-lg-0"
                                    v-for="(photo, index) in photos"
                                    :key="photo.id"
                                    data-aos="zoom-in"
                                    data-aos-delay="100"
                                >
                                    <a href="#" @click="changeActive(index)">
                                        <img
                                            :src="photo.url"
                                            class="w-100 thumbnail-image"
                                            :class="{active: index == activePhoto}"
                                            alt=""
                                        />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- akhir galeri -->
            <!-- heading -->
            <div class="store-details-container">
                <section class="store-heading" data-aos="zoom-in">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <h1>Sofa Kece</h1>
                                <div class="owner">Wanda Suwanda</div>
                                <div class="price">Rp. 7.000.000</div>
                            </div>
                            <div class="col-lg-2" data-aos="zoom-in">
                                <a
                                    href="/cart.html"
                                    class="btn btn-success px-4 text-white btn-block mb-3"
                                    >Add To Cart</a
                                >
                            </div>
                        </div>
                    </div>
                </section>
                <section class="store-description" data-aos="zoom-in">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Quisquam sequi, distinctio
                                    quod ullam voluptatum doloremque qui, nihil
                                    eius a deserunt, ducimus laborum odit
                                    tenetur repellendus aliquam consequuntur
                                    omnis reiciendis amet.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Hic voluptatum veritatis
                                    fugiat alias enim? Atque suscipit ab debitis
                                    culpa explicabo ducimus esse, veritatis
                                    magni dolore doloremque sapiente molestias
                                    recusandae accusantium.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="store-review">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-8 mt-3 mb-3">
                                <h5>Customer Review (3)</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <ul class="list-unstyled">
                                    <li class="media">
                                        <img
                                            src="/images/icon-testimonial-1.png"
                                            alt=""
                                            class="mr-3 rounded-circle"
                                        />
                                        <div class="media-body">
                                            <h5 class="mt-2 mb-1">
                                                Cucok Meong
                                            </h5>
                                            Lorem ipsum dolor, sit amet
                                            consectetur adipisicing elit. Quod,
                                            aspernatur explicabo expedita ad
                                            deleniti nisi consequatur. Optio
                                            facere, beatae consectetur quia
                                            neque aspernatur consequuntur
                                            obcaecati perferendis sunt, officia,
                                            fugiat dolor.
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img
                                            src="/images/icon-testimonial-3.png"
                                            alt=""
                                            class="mr-3 rounded-circle"
                                        />
                                        <div class="media-body">
                                            <h5 class="mt-2 mb-1">Odading</h5>
                                            Lorem ipsum dolor, sit amet
                                            consectetur adipisicing elit. Quod,
                                            aspernatur explicabo expedita ad
                                            deleniti nisi consequatur. Optio
                                            facere, beatae consectetur quia
                                            neque aspernatur consequuntur
                                            obcaecati perferendis sunt, officia,
                                            fugiat dolor.
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img
                                            src="/images/icon-testimonial-2.png"
                                            alt=""
                                            class="mr-3 rounded-circle"
                                        />
                                        <div class="media-body">
                                            <h5 class="mt-2 mb-1">Sopo</h5>
                                            Lorem ipsum dolor, sit amet
                                            consectetur adipisicing elit. Quod,
                                            aspernatur explicabo expedita ad
                                            deleniti nisi consequatur. Optio
                                            facere, beatae consectetur quia
                                            neque aspernatur consequuntur
                                            obcaecati perferendis sunt, officia,
                                            fugiat dolor.
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- akhir heading -->
        </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
        <script>
            var gallery = new Vue({
                el: "#gallery",
                mounted() {
                    AOS.init();
                },
                data: {
                    activePhoto: 1,
                    photos: [
                        {
                            id: 1,
                            url: "/images/product-details-1.jpg"
                        },
                        {
                            id: 2,
                            url: "/images/product-details-2.jpg"
                        },
                        {
                            id: 3,
                            url: "/images/product-details-3.jpg"
                        },
                        {
                            id: 4,
                            url: "/images/product-details-4.jpg"
                        }
                    ]
                },
                methods: {
                    changeActive(id) {
                        this.activePhoto = id;
                    }
                }
            });
        </script>
        <script src="/script/navbar-scroll.js"></script>
@endpush