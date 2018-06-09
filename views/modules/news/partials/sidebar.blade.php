@newsCategories('categories')
@newsLatestPosts(3, 'sidebar-latest')
@isset($post)
    @newsTags($post, 5)
@endisset
@isset($posts)
    @newsTags($posts, 2)
@endisset