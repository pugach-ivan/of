<?php $sq = get_search_query() ? get_search_query() : 'Search on 432.fm'; ?>
<form method="get" action="<?php bloginfo('url'); ?>" class="search-form">
    <fieldset>
        <input type="text" class="form-text" name="s" placeholder="Search" value="" title="<?php echo $sq; ?>" />
        <input type="submit" class="form-submit" value="Go" />
    </fieldset>
</form>