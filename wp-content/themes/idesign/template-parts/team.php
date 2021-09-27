<?php 
    $meta = get_post_meta( $post->ID, 'designers', true );
?>

<div class="team-card">
    <div class="team-image">
        <img src="<?= $meta['image'] ?? ''  ?>" alt="Designers">
    </div>
    <div class="team-info">
        <h2><?= $meta['name'] ?? ''  ?></h2>
        <p class="team-date">Joined at <?= $meta['join_date'] ?? ''  ?></p>
        <p class="body-text"><?= $meta['description'] ?? ''  ?></p> 
    </div>
</div>