<?php
require_once '_inc/config.php';
	try {
		$results = simplexml_load_file(BASE_URL.'/rss.php');
	}
	catch ( PDOException $e ) {

		$results = [];
	}

	include_once "_partials/header.php";

?>

	<section class="box post-list">
		<h1 class="box-heading text-muted">RSS reader</h1>
		<?php if ( count($results) ) : foreach ( $results->channel->item as $post ) : ?>

			<article id="post-<?= $post->id ?>" class="post">
				<header class="post-header">
					<h2>
						<a href="<?= $post->link ?>"><?= $post->title ?></a>
					</h2>
				</header>
				<div class="post-content">
					<p>
						<?= $post->description ?>
					</p>
				</div>
				<div class="footer post-footer">
					<a class="read-more" href="<?= htmlspecialchars($post->link)?>">
						read more
					</a>
				</div>
			</article>

		<?php endforeach; else : ?>

			<p>nothing :(</p>

		<?php endif ?>
	</section>

<?php include_once "_partials/footer.php" ?>