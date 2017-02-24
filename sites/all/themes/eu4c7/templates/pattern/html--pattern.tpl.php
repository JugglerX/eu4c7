<html>
<head>
  <?php print $head; ?>
  <title><?php print html_entity_decode($head_title); ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <link href="<?php print base_path() . drupal_get_path('module', 'autodesk_pattern') . '/css/prism.css'; ?>"rel="stylesheet" />

</head>

<body class="pattern <?php print $classes; ?>" <?php print $attributes; ?>>

<?php print $page_top; ?>

<div class="pattern__header">
  <div class="row">
    <div class="column small-12">
      <a href="/"><img class="pattern__logo" src="/sites/all/themes/autodesk_foundation5/images/standard/logo.png" alt="Autodesk"></a>
      <span class="pattern__logo-text"><a href="/pattern">Pattern Library</a></span>
    </div>
  </div>
</div>

<?php print $page; ?>
<?php print $page_bottom; ?>
<script src="<?php print base_path() . drupal_get_path('module', 'autodesk_pattern') . '/js/prism.js'; ?>"></script>
</body>
</html>
