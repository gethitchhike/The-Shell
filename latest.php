<body class="home-template">	
<header id="site-head" >
	<div id="particles" style="
	    top: 0px;
    /* position: fixed; */
    left: 0px;
    position: absolute;
    width: 100%;
    height: 100%;
	">

	</div>
    <div class="vertical animated bounceInDown">
        <div id="site-head-content" class="inner">
            <h1 class="blog-title"><a href="<?php echo $blog->URL;?>"><?php echo $blog->Name;?></a></h1>
            <h2 class="blog-description"><?php echo $blog->Subtitle;?></h2>
        </div>
    </div>
</header>
<?php if (count($posts) > 0) :?>
	<main class="content" role="main">
	<?php foreach($posts as $post) :?>
		<article class="post">
		    <header class="post-header">
		        <span class="post-meta"><time datetime="<?php echo date("d.m.Y,H:i",$post->Date);?>"><?php echo date("d.m.Y,H:i",$post->Date);?></span>
		        <h2 class="post-title"><a href="?/post/<?php echo $post->WebFilename;?>/"><?php echo $post->Title;?></a></h2>
		    </header>
		    <section class="post-excerpt">
		        <p><?php echo \BTRString::SubStrClause(strip_tags($Parsedown->text($post->Content)),2,true)."...";?></p>
		    </section>
		</article>
	<?php endforeach;?>  
	<?php
		$suffix = isset($php->post->query) ? "&query=".$php->post->query : "";
		if (empty($suffix) && isset($php->get->query)){
			$suffix = "&query=".$php->get->query;
		}
		$canGoBack = $currentSite -1 != 0;
		$canGoForward = $currentSite < $max;
	?>
	<nav class="pagination" role="navigation">
	    	<span class="page-number"><?php echo $currentSite;?>/ <?php echo $max;?></span>
	        <?php if ($canGoBack) :?>
				<a class="newer-posts" href="index.php?/&site=<?php echo $currentSite-1;?><?php echo $suffix;?>"><?php echo $translation["prevpage"];?> <span aria-hidden="true">←</span></a>
			<?php endif;?>
			<?php if ($canGoForward) :?>
				<a class="older-posts" href="index.php?/&site=<?php echo $currentSite+1;?><?php echo $suffix;?>"><?php echo $translation["nextpage"];?> <span aria-hidden="true">→</span></a>
			<?php endif;?>
	</nav>
</main>	
<?php endif;?>