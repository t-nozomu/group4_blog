<!-- File: src/Template/Articles/view.ctp -->
<h1><?= h($article->title) ?></h1>
<p><small>Created: <?= $article->created->format('Y年m月d日 H:i:s') ?></small></p>
<p><?= h($article->body) ?></p>

<!--heyheyhey-->
