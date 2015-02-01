<?php foreach ($posts as $post): ?>
    <h2><a href="<?php $this->route('/article/'.$post['_id']);?>"><?=$post['title'];?></a></h2>
<?php endforeach; ?>

<div class="pagination">
    <?php for($i=1;$i<=$pages;$i++): ?>

        <?php if($page==$i): ?>
            <span><?=$i;?></span>
        <?php else: ?>
            <a href="<?=$this->route("/?page={$i}");?>"><?=$i;?></a>
        <?php endif; ?>

    <?php endfor; ?>
</div>