<?php $sq = get_search_query() ? get_search_query() : 'Search on 432.fm'; ?>
<div class="search-form">
    <form method="get" action="<?php bloginfo('url'); ?>" >
        <fieldset>
            <p class="inp-text"><input type="text" name="s" value="" title="<?php echo $sq; ?>" /></p>
            <input type="submit" value="search" class="btn-search" />
        </fieldset>
    </form>
</div>