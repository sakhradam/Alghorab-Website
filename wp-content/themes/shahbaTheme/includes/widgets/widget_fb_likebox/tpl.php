<?php
if(!$page = $instance['page']){
  return;
}
$width = $instance['width'];
$height = $instance['height'];
$colorscheme = $instance['colorscheme'];
$show_faces = ($instance['show_faces'])?'true':'false';
$header = ($instance['header'])?'true':'false';
$show_border = ($instance['show_border'])?'true':'false';
$stream = ($instance['stream'])?'true':'false';
$show_faces = 'true';
?>
<div class="facebook_box_widget" >
<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $page ?>&amp;width=<?php echo $width ?>&amp;colorscheme=<?php echo $colorscheme ?>&amp;show_faces=<?php echo $show_faces ?>&amp;header=<?php echo $header ?>&amp;stream=<?php echo $stream ?>&amp;show_border=<?php echo $show_border ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:370px;" allowTransparency="true" ></iframe>
</div>