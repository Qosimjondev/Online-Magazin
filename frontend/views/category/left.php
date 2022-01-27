<?php

/** @var $category \common\models\Category */
/** @var $brand \common\models\Brand */

?>

<div class="col-xl-3 col-lg-4 col-md-5">
    <div class="sidebar-categories">
        <div class="head">Browse Categories</div>
        <ul class="main-categories">
            <li class="common-filter">
                <form action="#">
                    <ul>
                        <?php foreach ($category as $cat): ?>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="<?=$cat->name?>" name="brand"><label for="<?=$cat->name?>"><?=$cat->name?><span> (3600)</span></label></li>
                        <?php endforeach; ?>
                    </ul>
                </form>
            </li>
        </ul>
    </div>
    <div class="sidebar-filter">
        <div class="top-filter-head">Product Filters</div>
        <div class="common-filter">
            <div class="head">Brands</div>
            <form action="#">
                <ul>
                    <?php foreach ($brand as $br): ?>
                        <li class="filter-list"><input class="pixel-radio" type="radio" id="<?=$br->brand_name?>" name="brand"><label for="<?=$br->brand_name?>"><?=$br->brand_name?><span> (3600)</span></label></li>
                    <?php endforeach; ?>
                </ul>
            </form>
        </div>
        <div class="common-filter">
            <div class="head">Price</div>
            <div class="price-range-area">
                <div id="price-range"></div>
                <div class="value-wrapper d-flex">
                    <div class="price">Price:</div>
                    <span>$</span>
                    <div id="lower-value"></div>
                    <div class="to">to</div>
                    <span>$</span>
                    <div id="upper-value"></div>
                </div>
            </div>
        </div>
    </div>
</div>
