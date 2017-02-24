
	<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> <?php print $view_mode; ?> " <?php print $attributes; ?>>
		<div class="node-inner">
		
			<?php print render($title_prefix); ?>
			<h1 class="node-title"><?php print $title;?></h1>
			<?php
			print render($content);
			?>
			<?php print render($title_suffix); ?>
			
		</div>
	</div>	