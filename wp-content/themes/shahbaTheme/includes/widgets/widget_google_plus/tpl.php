<?php
if(!$page = $instance['page']){
  return;
}
$colorscheme = $instance['colorscheme'];
$layout = $instance['layout'];
$width = $instance['width'];
$cover_photo = ($instance['cover_photo'])?'true':'false';
$tagline = ($instance['tagline'])?'true':'false';

?>
<div class="google_plus_widget" >
  <!-- Place this tag where you want the widget to render. -->
  <div class="g-page" data-href="<?php echo $page ?>" data-theme="<?php echo $colorscheme ?>" data-width="<?php echo $width ?>" data-layout="<?php echo $layout ?>" data-rel="publisher" data-showtagline="<?php echo $tagline ?>" data-showcoverphoto="<?php echo $cover_photo ?>">
  </div>

  <!-- Place this tag after the last widget tag. -->
  <script type="text/javascript">
    (function() {
      var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
      po.src = 'https://apis.google.com/js/platform.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
  </script>
</div>