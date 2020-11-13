<form role="search" method="get" class="search-form" action="<?= esc_url( home_url( '/' ) ) ?>">
    <input type="search" class="search-field" placeholder="Pretraga" value="<?= get_search_query() ?>" name="s" />
    <input type="submit" class="search-submit" value="Traži" />
</form>