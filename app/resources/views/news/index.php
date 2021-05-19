<div style="display: flex; flex-direction: row;">
    <div style="margin: 0 20px">
        <h2>Новости</h2>
        <?php
        foreach ($newsList as $key => $news) {
            ++$key;
            echo "<a href='" . route('news.showNews', ['id' => $key]) . "'>" . $news['name'] . "</a><br>";
        }
        ?>
    </div>
    <div style="margin: 0 20px">
        <h2>Категории</h2>
        <?php
        foreach ($newsCategories as $key => $category) {
            echo "<a href='" . route('news.by_categories', ['id' => $key]) . "'>" . $category . "</a><br>";
        }
        ?>
    </div>
</div>
