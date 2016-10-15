<?php global $blog;?>
<?php global $translation;?>
<?php $Parsedown = new Parsedown();?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $title;?></title>
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php
		global $bootstrap;
		$units = $bootstrap->GetUnitsByImplementation("IHeadUnit");
		foreach($units as $unit){
			$unit->Run();
		}
	?>
    <link rel="stylesheet" type="text/css" href="./themes/The-Shell/assets/highlighter/prettify.css" />
    <link rel="stylesheet" type="text/css" href="./themes/The-Shell/assets/css/screen.css" />
</head>
    <?php
		require_once $innerContent;
	?>
    <footer class="site-footer">
        <div class="inner">
            <section class="copyright"><?php echo $blog->Copyright;?></section>
            <section class="poweredby">Proudly published with Hitchhike in <a href="https://github.com/mityalebedev/The-Shell">The Shell</a> theme.</section>
            <?php if (count($sites) != 0) :?>
					<?php foreach($sites as $site):?>
						<a href="?/post/<?php echo $site->WebFilename;?>/"><?php echo $site->Title;?></a>
					<?php endforeach;?>
					<a href="?/feed/" data-no-instant>Feed</a>
			<?php endif;?>
        </div>
    </footer>
    <script type='text/javascript' src='/assets/highlighter/prettify.js'></script>
    <script type='text/javascript' src='/assets/js/shell.js'></script>
    <script src="./themes/The-Shell/instantclick.min.js" data-no-instant></script>
	<script data-no-instant>InstantClick.init();</script>
</body>
</html>