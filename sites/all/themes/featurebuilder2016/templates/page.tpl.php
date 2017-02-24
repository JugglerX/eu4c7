<?php if ($page['top']): ?>
  <div class="layout-top layout">
    <?php print render($page['top']); ?>
  </div>
<?php endif; ?>

<?php if ($page['header']): ?>
  <div class="layout-header layout">
    <?php print render($page['header']); ?>
  </div>
<?php endif; ?>

<?php if ($page['subheader']): ?>
  <div class="layout-subheader layout">
    <?php print render($page['subheader']); ?>
  </div>
<?php endif; ?>

<?php if ($page['featured_fullwidth']): ?>
  <div class="layout-featured-fullwidth layout">
    <?php print render($page['featured_fullwidth']); ?>
  </div>
<?php endif; ?>

<?php if ($page['featured']): ?>
  <div class="layout-featured layout ">
    <?php print render($page['featured']); ?>
  </div>
<?php endif; ?>

<div class="layout-middle layout">
  <div class="content">
    <?php if ($page['above_content']): ?>
        <?php print render($page['above_content']); ?>
    <?php endif; ?>

    <?php if (!empty($page['sidebar_first'])): ?>
      <?php print render($page['sidebar_first']); ?>
    <?php endif; ?>

    <?php if ($page['content']): ?>
        <?php print render($title_prefix); ?>
        <?php print render($page['content']) ?>
        <?php print render($title_suffix); ?>
    <?php endif; ?>

    <?php if (!empty($page['sidebar_second'])): ?>
        <?php print render($page['sidebar_second']); ?>
    <?php endif; ?>

    <?php if ($page['below_content']): ?>
        <?php print render($page['below_content']); ?>
    <?php endif; ?>
  </div>
</div>

<?php if ($page['canyon']): ?>
  <div class="layout-canyon layout">
        <?php print render($page['canyon']); ?>
  </div>
<?php endif; ?>

<?php if ($page['canyon_fullwidth']): ?>
  <div class="layout-canyon-fullwidth layout">
    <?php print render($page['canyon_fullwidth']); ?>
  </div>
<?php endif; ?>

<?php if ($page['footer']): ?>
  <div class="layout-footer layout">
    <div class="row">
      <?php print render($page['footer']); ?>
    </div>
  </div>
<?php endif; ?>

<?php if ($page['subfooter']): ?>
  <div class="layout-subfooter layout">
    <div class="row">
      <div class="medium-12 column">
        <?php print render($page['subfooter']); ?>
      </div>
    </div>
  </div>
<?php endif; ?>

