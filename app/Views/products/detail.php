<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div id="product-detail">
    <div class="container">
        <div class="card mb-5 mt-5 detail-desktop w-100" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//84/MTA-7235121/oem_oem_makaroni_pedas_daun_jeruk_full02_dnt91hfc.jpg" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="product-detail-title">{{ products.product_name }}</h5>
                        <h3 class="card-text price-detail">Rp.{{ products.price }}</h3>
                        <p class="card-text">Stock : {{ products.stock }}</p>
                        <div class="quantity">
                            <button class="btn btn-dark">-</button>
                            <span class="badge badge-light">
                                <p id="badge-text">0</p>
                            </span></button>
                            <button class="btn btn-dark">+</button>
                            <button class="btn btn-dark btn-cart">+ Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card detail-mobile">
            <div class="card-body">
                <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//84/MTA-7235121/oem_oem_makaroni_pedas_daun_jeruk_full02_dnt91hfc.jpg" class="card-img" alt="...">
                <h3 class="card-title mt-2">{{ products.product_name }}</h3>
                <p class="card-text">Harga : Rp.{{ products.price }}</p>
                <p class="card-text">Stock : {{ products.stock }}</p>
                <div class="text-center">
                    <div class="quantity">
                        <button class="btn btn-dark">-</button>
                        <span class="badge badge-light">
                            <p id="badge-text">0</p>
                        </span></button>
                        <button class="btn btn-dark">+</button>
                    </div>
                    <button class="btn btn-dark m-auto">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="others ">
    <div class="container">
        <p>Produk Lainnya</p>
        <hr>
        <div id="app">
            <div class="row mt-5">
                <div class="col-md-3 col-xs-4" v-for="product in filterProduct" :key='product.id'>
                    <div class="card mt-2">
                        <div class="card-body">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Macaroni_closeup.jpg/1200px-Macaroni_closeup.jpg" class="img-fluid">
                            <h5 class="mt-2">{{ product.product_name }}&nbsp;<h6>{{ product.variant }}</h6>
                            </h5>
                            <!-- field harga -->
                            <p>Harga : Rp. {{ product.price }}</p>
                            <!-- field stock -->
                            <p>stock : {{ product.stock }}</p>
                            <div class="row">
                                <div class="col-md-8">
                                    <a :href="'product/detail/' + product.id" class="btn btn-outline-dark w-100">Detail</a>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-dark w-100">Beli</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/product/all" class="nav-link">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
<script src="/js/products/product-detail.js"></script>
<script src="/js/products/product.js"></script>
<?= $this->endSection(); ?>