<h2><?php echo $title; ?></h2>

<?php foreach ($author as $single_author): ?>

        <h3><?php echo $single_author->name; ?></h3>
        <div class="main">
                <?php echo $single_author->description; ?> <br/>
                <img src="<?php echo base_url('./uploads/authors/' . $single_author->image); ?>" />
        </div>

<?php endforeach; ?>