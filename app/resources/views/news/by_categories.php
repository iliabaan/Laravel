<a href="<?=route('news')?>">На главную</a><br>
<h2>Все новости с категорией <?=$category?></h2>
<?php
foreach ($newsList as $key => $news) {
    if ($news['category'] == $category) {
        echo "<a href='" . route('news.showNews', ['id' => $key]) . "'>" . $news['name'] . "</a><br>";
    }
}
?>
