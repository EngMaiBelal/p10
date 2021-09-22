<?php

include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "app/models/Product.php";

$pro = new product;
$pro->setStatus(1);
// if url has query string => $_GET Array has value
if ($_GET) {
    // check on subcat key if exists
    if (isset($_GET['id'])) {
        // value of subcat must be numeric
        if (is_numeric($_GET['id'])) {
            $pro->setId($_GET['id']);
            $proResult = $pro->findProduct();
            // if subcat exists in db
            if ($proResult) {
                $product = $proResult->fetch_object();
            } else {
                header('location:errors/404.php');
            }
        } else {
            header('location:errors/404.php');
        }
    } else {
        header('location:errors/404.php');
    }
} else {
    header('location:errors/404.php');
}
// print_r($product);die;
?>
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3><?= $product->name_en ?></h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active"><?= $product->name_en ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Product Deatils Area Start -->
<div class="product-details pt-100 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <img class="zoompro" src="assets/img/product/<?= $product->photo ?>" data-zoom-image="assets/img/product/<?= $product->photo ?>" alt="zoom" />
                    <div id="gallery" class="mt-20 product-dec-slider owl-carousel">
                    </div>
                    <!-- <span>-29%</span> -->
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4><?= $product->name_en ?></h4>
                    <div class="rating-review">
                        <div class="pro-dec-rating">
                            <?php for ($i = 0; $i < $product->reviews_avg; $i++) { ?>
                                <i class="ion-android-star-outline theme-star"></i>
                                <!-- <i class="ion-star theme-color"></i> -->

                            <?php }  ?>

                            <?php for ($i = 0; $i < 5 - $product->reviews_avg; $i++) { ?>
                                <i class="ion-android-star-outline"></i>
                                <!-- <i class="ion-android-star-outline theme-star"></i> -->

                            <?php }  ?>
                        </div>
                        <div class="pro-dec-review">
                            <ul>
                                <li><?= $product->reviews_count ?> Reviews </li>
                                <li> Add Your Reviews</li>
                            </ul>
                        </div>
                    </div>
                    <span><?= $product->price ?> <b>EGP</b> </span>
                    <div class="in-stock">
                        <p>Available:
                            <?php
                            if ($product->quantity == 0) {
                                $msg = 'Out Of Stock';
                                $color = 'danger';
                            } else {
                                $msg = 'In Stock';
                                if ($product->quantity > 5) {
                                    $color = 'success';
                                } else {
                                    $color = 'warning';
                                }
                            }
                            ?>
                            <span class="text-<?= $color ?>"><?= $msg ?></span>
                        </p>
                    </div>
                    <p><?= $product->details_en ?></p>
                    <?php
                    if ($product->quantity != 0) {
                    ?>
                        <div class="quality-add-to-cart">
                            <div class="quality">
                                <label>Qty:</label>
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                            </div>
                            <div class="shop-list-cart-wishlist">
                                <a title="Add To Cart" href="#">
                                    <i class="icon-handbag"></i>
                                </a>
                                <a title="Wishlist" href="#">
                                    <i class="icon-heart"></i>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">KeyWords:</li>
                            <li><a href="shop.php?subcat=<?= $product->subcategory_id ?>"><?= $product->subcategory_name_en ?></a></li>
                            <li><a href="shop.php?brand=<?= $product->brand_id ?>"><?= $product->brand_name_en ?></a></li>
                            <li><a href="shop.php?cat=<?= $product->category_id ?>"><?= $product->category_name_en ?></a></li>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Deatils Area End -->
<div class="description-review-area pb-70">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">Description</a>

                <a data-toggle="tab" href="#des-details3">Review</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p>
                            <?= $product->details_en ?>
                        </p>
                    </div>
                </div>

                <div id="des-details3" class="tab-pane">
                    <div class="rattings-wrapper">
                        <?php
                        $productReviewsResult = $pro->getProductReviews();
                        if ($productReviewsResult) {
                            $reviews = $productReviewsResult->fetch_all(MYSQLI_ASSOC);
                            foreach ($reviews as $index => $review) {
                        ?>
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="ratting-star f-left">
                                            <!-- <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i> -->
                                            <?php for ($i = 0; $i < $review['value']; $i++) { ?>
                                                <i class="ion-star theme-color"></i>
                                            <?php }  ?>

                                            <?php for ($i = 0; $i < 5 - $review['value']; $i++) { ?>
                                                <i class="ion-android-star-outline"></i>
                                            <?php }  ?>
                                            <span><?= $review['value'] ?></span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <h3><?= $review['full_name'] ?></h3>
                                            <span><?= $review['created_at'] ?></span>
                                        </div>
                                    </div>
                                    <p><?= $review['comment'] ?></p>
                                </div>
                            <?php
                            }
                        } else { ?>
                            <div class="row">
                                <div class="col-12 alert alert-warning text-center"> No Reviews Yet</div>
                            </div>
                        <?php } ?>

                    </div>
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <div class="ratting-form-wrapper">
                            <h3>Add your Comments :</h3>
                            <div class="ratting-form">
                                <form action="#">
                                    <div class="star-box">
                                        <h2>Rating:</h2>
                                        <div class="ratting-star">
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <input placeholder="Name" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <input placeholder="Email" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="rating-form-style form-submit">
                                                <textarea name="message" placeholder="Message"></textarea>
                                                <input type="submit" value="add review">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-35">
            <div class="section-title-wrap">
                <h3 class="section-title section-bg-white">Related Products</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img alt="" src="assets/img/product/product-1.jpg">
                        </a>
                        <span>-30%</span>
                        <div class="product-action">
                            <a class="action-wishlist" href="#" title="Wishlist">
                                <i class="ion-android-favorite-outline"></i>
                            </a>
                            <a class="action-cart" href="#" title="Add To Cart">
                                <i class="ion-ios-shuffle-strong"></i>
                            </a>
                            <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content text-left">
                        <div class="product-hover-style">
                            <div class="product-title">
                                <h4>
                                    <a href="product-details.html">Le Bongai Tea</a>
                                </h4>
                            </div>
                            <div class="cart-hover">
                                <h4><a href="product-details.html">+ Add to cart</a></h4>
                            </div>
                        </div>
                        <div class="product-price-wrapper">
                            <span>$100.00 -</span>
                            <span class="product-price-old">$120.00 </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <!-- Thumbnail Large Image start -->
                        <div class="tab-content">
                            <div id="pro-1" class="tab-pane fade show active">
                                <img src="assets/img/product-details/product-detalis-l1.jpg" alt="">
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l2.jpg" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l3.jpg" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l4.jpg" alt="">
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        <div class="product-thumbnail">
                            <div class="thumb-menu owl-carousel nav nav-style" role="tablist">
                                <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/img/product-details/product-detalis-s1.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-2"><img src="assets/img/product-details/product-detalis-s2.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-3"><img src="assets/img/product-details/product-detalis-s3.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-4"><img src="assets/img/product-details/product-detalis-s4.jpg" alt=""></a>
                            </div>
                        </div>
                        <!-- Thumbnail image end -->
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="modal-pro-content">
                            <h3>Dutchman's Breeches </h3>
                            <div class="product-price-wrapper">
                                <span class="product-price-old">£162.00 </span>
                                <span>£120.00</span>
                            </div>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p>
                            <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Size*</label>
                                    <select class="select">
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value="">L</option>
                                    </select>
                                </div>
                                <div class="quickview-color-wrap">
                                    <label>Color*</label>
                                    <div class="quickview-color">
                                        <ul>
                                            <li class="blue">b</li>
                                            <li class="red">r</li>
                                            <li class="pink">p</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-quantity">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                </div>
                                <button>Add to cart</button>
                            </div>
                            <span><i class="fa fa-check"></i> In stock</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "layouts/footer.php";
?>