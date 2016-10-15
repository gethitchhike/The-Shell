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
    <script type="text/javascript" src="./themes/The-Shell/particles.min.js"></script>
	<script data-no-instant>
		particlesJS("particles", {
		  "particles": {
		    "number": {
		      "value": 80,
		      "density": {
		        "enable": true,
		        "value_area": 800
		      }
		    },
		    "color": {
		      "value": "#ffffff"
		    },
		    "shape": {
		      "type": "circle",
		      "stroke": {
		        "width": 0,
		        "color": "#000000"
		      },
		      "polygon": {
		        "nb_sides": 5
		      },
		      "image": {
		        "src": "img/github.svg",
		        "width": 100,
		        "height": 100
		      }
		    },
		    "opacity": {
		      "value": 0.5,
		      "random": false,
		      "anim": {
		        "enable": false,
		        "speed": 1,
		        "opacity_min": 0.1,
		        "sync": false
		      }
		    },
		    "size": {
		      "value": 3,
		      "random": true,
		      "anim": {
		        "enable": false,
		        "speed": 40,
		        "size_min": 0.1,
		        "sync": false
		      }
		    },
		    "line_linked": {
		      "enable": true,
		      "distance": 150,
		      "color": "#ffffff",
		      "opacity": 0.4,
		      "width": 1
		    },
		    "move": {
		      "enable": true,
		      "speed": 1,
		      "direction": "none",
		      "random": false,
		      "straight": false,
		      "out_mode": "out",
		      "bounce": false,
		      "attract": {
		        "enable": false,
		        "rotateX": 600,
		        "rotateY": 1200
		      }
		    }
		  },
		  "interactivity": {
		    "detect_on": "canvas",
		    "events": {
		      "onhover": {
		        "enable": true,
		        "mode": "repulse"
		      },
		      "onclick": {
		        "enable": true,
		        "mode": "push"
		      },
		      "resize": true
		    },
		    "modes": {
		      "grab": {
		        "distance": 400,
		        "line_linked": {
		          "opacity": 1
		        }
		      },
		      "bubble": {
		        "distance": 400,
		        "size": 40,
		        "duration": 2,
		        "opacity": 8,
		        "speed": 3
		      },
		      "repulse": {
		        "distance": 200,
		        "duration": 0.4
		      },
		      "push": {
		        "particles_nb": 4
		      },
		      "remove": {
		        "particles_nb": 2
		      }
		    }
		  },
		  "retina_detect": true
		});
	</script>
</body>
</html>