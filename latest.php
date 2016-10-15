<body class="home-template">
<header id="site-head" style="background-image: url(https://media2.giphy.com/media/l0HlNaQ6gWfllcjDO/200.gif#3)">
    <div class="vertical animated bounceInDown">
        <div id="site-head-content" class="inner">
        	<?php if (count($blog->Authors) == 1 && !empty($blog->Authors[0]->Avatar)) :?>
					<a id="blog-logo" href="<?php echo $blog->URL;?>"><img src="<?php echo $blog->Authors[0]->Avatar;?>" alt="Blog Logo"></a>
			<?php elseif (property_exists($blog,"Image")) :?>
					<a id="blog-logo" href="<?php echo $blog->URL;?>"><img src="<?php echo $blog->Image;?>" alt="Blog Logo"></a>
			<?php endif;?>
            <h1 class="blog-title"><?php echo $blog->Name;?></h1>
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