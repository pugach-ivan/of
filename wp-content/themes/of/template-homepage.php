<?php
/*
Template Name: Homepage Template
*/
?>
<?php get_header();?>
<div id="main-front">
    <?php get_sidebar('homepage'); ?>
    <div id="basic-area">
        <div class="caption-holder">
            <div class="filter-box">
                <form action="" class="filter-form">
                    <fieldset>
                        <label for="object-1">Filter by:</label>
                        <select id="object-1">
                            <option>Closest</option>
                            <option>Closest - 1</option>
                            <option>Closest - 2</option>
                            <option>Closest - 3</option>
                            <option>Closest - 4</option>
                            <option>Closest - 5</option>
                        </select>
                    </fieldset>
                </form>
            </div><!-- filter-box -->
            <h2>Groups</h2>
        </div><!-- caption-holder -->
        <div class="groups-area">
            <?php displayHomepageGroups();?>
            <?php
            /*
            <div class="groups-box">
                <a href="#">
                    <span class="img-frame">
                        <img src="images/img-groups-01.jpg" alt="" />
                    </span><!-- img-frame -->
                    <span class="txt-frame">
                        <strong class="head">Derby Hills Cycling</strong>
                        <span>Home Town: NYC</span>
                        <span>Members: 238</span>
                    </span>
                </a>
            </div><!-- groups-box -->
            */
            ?>
            <div class="link-holder">
                <a href="#" class="load-link">Load More </a>
            </div>
        </div><!-- groups-area -->
    </div><!-- basic-area -->
</div><!-- main-front -->
<?php get_footer(); ?>