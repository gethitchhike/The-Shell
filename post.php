<body class="post-template">
	<main class="content" role="main">

		<article class="post tag-wort-zum-sonntag tag-politik">

			<header class="post-header">
				<?php if (count($blog->Authors) == 1 && !empty($blog->Authors[0]->Avatar)) :?>
				<a id="blog-logo" href="<?php echo $blog->URL;?>"><img src="<?php echo $blog->Authors[0]->Avatar;?>" alt="Blog Logo"></a>
			<?php elseif (property_exists($blog,"Image")) :?>
			<a id="blog-logo" href="<?php echo $blog->URL;?>"><img src="<?php echo $blog->Image;?>" alt="Blog Logo"></a>
		<?php endif;?>
	</header>

	<span class="post-meta"><time datetime="<?php echo date("d.m.Y,H:i",$post->Date);?>"><?php echo date("d.m.Y,H:i",$post->Date);?></span>
	<h1 class="post-title"><?php echo $post->Title;?></h1>
	<section class="post-content">
		<p>
			<?php echo $Parsedown->text($post->Content);?>
		</p>
	</section>
	<footer class="post-footer">
	<section class="unit">
		<?php
			global $bootstrap;
			$units = $bootstrap->GetUnitsByImplementation("IPostUnit");
			foreach($units as $unit){
				try{
					$unit->Run();
				}catch(\Exception $ex){

				}
			}
		?>
	</section>
	<section class="author">
		<h4><?php echo $post->Author->Name;?></h4>
		<p><?php echo $post->Author->About;?></p>
	</section>

	<section class="share">
		<?php
			$href = urlencode($blog->URL."?/post/".$post->WebFilename."/");
		?>
		<a class="icon-twitter" href="http://twitter.com/share?text=<?php echo $post->Title;?>&amp;url=<?php echo $href;?>" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;">
			<span class="hidden">Twitter</span>
		</a>
		<a class="icon-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $href;?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;">
			<span class="hidden">Facebook</span>
		</a>
		<a class="icon-google-plus" href="https://plus.google.com/share?url=<?php echo $href;?>" onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;">
			<span class="hidden">Google+</span>
		</a>
	</section>
	</footer>
</article>
</main>
