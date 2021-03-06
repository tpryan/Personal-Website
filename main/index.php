<?php $page_title="TerrenceRyan.com";  include './modules/head.php';?>
<?php include './modules/page-header.php';?>
	<div class="top-bar">
		<div class="page-title home">
			<?php $active="home"; include './modules/nav.php';?>
		</div>

	</div>

	<div class="main home">
		<div class="design column">
			<h2><a href="https://speakerdeck.com/tpryan">Presentations <span class="icon">&#128187;</span></a></h2>
			<?php include './modules/presos.php';?>
			<p class="externalref">View more on <a href="http://www.speakerdeck.net/tpryan">speakerdeck.com</a>.</p>
		</div>
		<div class="code column">
			<h2><a href="https://github.com/tpryan">Code <span class="icon">&#62208;</span></a></h2>
			<?php include './modules/projects.php';?>
			<p class="externalref">View more on <a href="https://github.com/tpryan">github.com</a>.</p>
		</div>
		<div class="blog column">
			<h2><a href="/blog">Blog <span class="icon">&#59194;</span></a></h2>
			<?php 
			include './modules/blog.php';?>
			<p class="externalref">View more on <a href="/blog">my blog</a>.</p>
		</div>
	</div>
<?php include './modules/page-footer.php';?>
<?php include './modules/google.php';?>
<?php include './modules/foot.php';?>
