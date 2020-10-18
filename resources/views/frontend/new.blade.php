<?php
$category = array('' => 'Select Category');
$location = array('' => 'Select Location');
if(@$categories)
{
	foreach($categories as $cat)
	{
		$category[$cat['cid']] = ucwords($cat['category']);
	}
}
if(@$locations)
{
	foreach($locations as $loc)
	{
		$location[$loc['ctid']] = ucwords($loc['city']);
	}
}
?>
<div class="page-header" style="background: url(<?=base_url()?>assets/img/banner1.webp);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Purchase New Mobiles</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url()?>">Home /</a></li>
                        <li class="current">All Mobiles</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-container section-padding">
    <div class="container">
        <div class="row">
            <!--<div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">-->
            <!--    <aside>-->

            <!--        <div class="widget_search">-->
            <!--            <form role="search" id="search-form">-->
            <!--                <input type="search" class="form-control" autocomplete="off" name="s" placeholder="Search..." id="search-input" value="">-->
            <!--                <button type="submit" id="search-submit" class="search-btn"><i class="lni-search"></i></button>-->
            <!--            </form>-->
            <!--        </div>-->

            <!--        <div class="widget categories">-->
            <!--            <h4 class="widget-title">All Brands</h4>-->
            <!--            <ul class="categories-list">-->
            <!--                <li>-->
            <!--                    <a href="#">-->
            <!--                        <i class="lni-dinner"></i> Hotel & Travels <span class="category-counter">(5)</span>-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <a href="#">-->
            <!--                        <i class="lni-control-panel"></i> Services <span class="category-counter">(8)</span>-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <a href="#">-->
            <!--                        <i class="lni-github"></i> Pets <span class="category-counter">(2)</span>-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <a href="#">-->
            <!--                        <i class="lni-coffee-cup"></i> Restaurants <span class="category-counter">(3)</span>-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <a href="#">-->
            <!--                        <i class="lni-home"></i> Real Estate <span class="category-counter">(4)</span>-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <a href="#">-->
            <!--                        <i class="lni-pencil"></i> Jobs <span class="category-counter">(5)</span>-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <a href="#">-->
            <!--                        <i class="lni-display"></i> Electronics <span class="category-counter">(9)</span>-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--            </ul>-->
            <!--        </div>-->
            <!--        <div class="widget">-->
            <!--            <h4 class="widget-title">Advertisement</h4>-->
            <!--            <div class="add-box">-->
            <!--                <img class="img-fluid" src="assets/img/img1.jpg" alt="">-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </aside>-->
            <!--</div>-->
            <div class="col-lg-12 col-md-12 col-xs-12 page-content">

                <div class="product-filter">
                    <div class="short-name">
                        <span>Showing (<?=$offset?> - <?=$per_page?> mobile of <?=$count?> New Mobiles)</span>
                    </div>
                    <!--<div class="Show-item">-->
                    <!--    <span>Show Items</span>-->
                    <!--    <form class="woocommerce-ordering" method="post">-->
                    <!--        <label>-->
                    <!--            <select name="order" class="orderby">-->
                    <!--                <option selected="selected" value="menu-order">49 items</option>-->
                    <!--                <option value="popularity">popularity</option>-->
                    <!--                <option value="popularity">Average ration</option>-->
                    <!--                <option value="popularity">newness</option>-->
                    <!--                <option value="popularity">price</option>-->
                    <!--            </select>-->
                    <!--        </label>-->
                    <!--    </form>-->
                    <!--</div>-->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#grid-view"><i class="lni-grid"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#list-view"><i class="lni-list"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="adds-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show">
                            <div class="row">
                            <?php if(@$categoryads){ foreach($categoryads as $adcat){ ?>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="featured-box">
                                        <figure>
                                            <div class="homes-tag featured"><?php echo ucwords($adcat['brand_name']); ?></div>
                                            <span class="price-save">Rs. <?php echo number_format(@$adcat['pro_sale_price']) ?></span>
                                            <a href="<?php echo base_url() .'new-mobiles/'.str_replace(' ', '-', $adcat['pro_name']) . '-' . $adcat['product_id'].$this->config->item('url_suffix');?>"><img class="img-fluid" onerror="this.src='<?php echo base_url('images/noimage.png'); ?>'" src="<?php echo $this->config->item('atombuddy').'image/'.$adcat['product_image_path']; ?>" alt="<?php echo @ucwords($adcat['pro_name']); ?> price in pakistan"></a>
                                        </figure>
                                        <div class="content-wrapper">
                                            <div class="feature-content">
                                                <h4><a href="<?php echo base_url() .'new-mobiles/'.str_replace(' ', '-', $adcat['pro_name']) . '-' . $adcat['product_id'].$this->config->item('url_suffix');?>"><?php echo @ucwords($adcat['pro_name']); ?></a></h4>
                                                <div class="meta-tag">
                                                    <div class="user-name">
                                                        <a href="#"><i class="lni-user"></i> Atombuddy</a>
                                                    </div>
                                                    <div class="listing-category">
                                                        <a href="#"><i class="lni-mobile"></i>New Mobiles </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="listing-bottom clearfix">
                                                <a href="#" class="float-left"><i class="lni-map-marker"></i> Lahore</a>
                                                <a href="<?php echo base_url() .'new-mobiles/'.str_replace(' ', '-', $adcat['pro_name']) . '-' . $adcat['product_id'].$this->config->item('url_suffix');?>" class="float-right">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>
                            </div>
                        </div>
                        <div id="list-view" class="tab-pane fade">
                            <div class="row">
                            <?php if(@$categoryads){ foreach($categoryads as $adcat){ ?>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="featured-box">
                                        <figure>
                                            <div class="homes-tag featured"><?php echo ucwords($adcat['brand_name']); ?></div>
                                            <span class="price-save">Rs. <?php echo number_format(@$adcat['pro_sale_price']) ?></span>
                                            <a href="<?php echo base_url() .'new-mobiles/'.str_replace(' ', '-', $adcat['pro_name']) . '-' . $adcat['product_id'].$this->config->item('url_suffix');?>"><img class="img-fluid" onerror="this.src='<?php echo base_url('images/noimage.png'); ?>'" src="<?php echo $this->config->item('atombuddy').'image/'.$adcat['product_image_path']; ?>" alt="<?php echo @ucwords($adcat['pro_name']); ?> price in pakistan"></a>
                                        </figure>
                                        <div class="content-wrapper">
                                            <div class="feature-content">
                                                <h4><a href="<?php echo base_url() .'new-mobiles/'.str_replace(' ', '-', $adcat['pro_name']) . '-' . $adcat['product_id'].$this->config->item('url_suffix');?>"><?php echo @ucwords($adcat['pro_name']); ?></a></h4>
                                                <div class="meta-tag">
                                                    <div class="user-name">
                                                        <a href="#"><i class="lni-user"></i> Atombuddy</a>
                                                    </div>
                                                    <div class="listing-category">
                                                        <a href="#"><i class="lni-mobile"></i>New Mobiles </a>
                                                    </div>
                                                </div>
                                                <p class="dsc"><?=$adcat['pro_des']?></p>
                                            </div>
                                            <div class="listing-bottom clearfix">
                                                <a href="#" class="float-left"><i class="lni-map-marker"></i> New Mobiles in Lahore</a>
                                                <a href="ads-details.html" class="float-right">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pagination-bar">
                    <nav>
                        <?php if(@$pagination) echo $pagination; ?>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>