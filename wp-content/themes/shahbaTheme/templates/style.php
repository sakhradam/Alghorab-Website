<?php global $shahbaConfig ?>
<style type="text/css">
<?php if($shahbaConfig['custom_font']) { ?>
@font-face {
    font-family: Custom font;
    src: url(<?=$shahbaConfig['custom_font']?>);
}
<?php } ?>
<?php
foreach ( get_categories() as $cat) {
    $color = get_category_color( $cat->term_id );
    ?>
    .meta .cat<?php echo $cat->term_id; ?>_bg {
        background: <?php echo $color ?> ;
    }
<?php } ?>
/* #D84833 */
<?php $color = $shahbaConfig['main_color']; ?>
::-webkit-scrollbar  {width: 12px;}
::-webkit-scrollbar-track-piece{ background:#fff;color: #fff;}
::-webkit-scrollbar-thumb{ background:<?php echo $color; ?>;color: ;}
::selection {color:#fff;background:<?php echo $color; ?>;}
::-moz-selection {color:#fff;background:<?php echo $color; ?>;}
.main_color,.main_color_hover:hover,.main_color:hover,a:hover{
    color: <?php echo $color; ?>;
}
.main_border_color,.section_title h1:before,.section_title h2:before,.main-footer,#header .top,.widget-tab-titles li.active a:before{
    border-color: <?php echo $color; ?>!important;
}
.menu_section .navbar nav li:hover> a, .menu_section .navbar nav li.active > a,.nav .open > a, .nav .open > a:hover, .nav .open > a:focus,.main_bg{
    background: <?php echo $color; ?>;
    color: <?= $shahbaConfig['active_menu_color'];?>;
}
.pagination > li > a:hover, .pagination > li > span:hover, .pagination > li > a:focus, .pagination > li > span:focus
,.pagination > li > .current
{
    background-color: <?php echo $color; ?>;
    color: #fff;
}
<?php //print_R( shahbaHelper::reduxColor2rgba($shahbaConfig['section_bg']) ); die; ?>

body{
    background-color     : <?= $shahbaConfig['body_bg']['background-color'];?>;
    background-image     : url(<?= $shahbaConfig['body_bg']['background-image'];?>);
    background-repeat    : <?= $shahbaConfig['body_bg']['background-repeat'];?>;
    background-position  : <?= $shahbaConfig['body_bg']['background-position'];?>;
    background-size      : <?= $shahbaConfig['body_bg']['background-size'];?>;
    background-attachment: <?= $shahbaConfig['body_bg']['background-attachment'];?>;

    color                : <?= $shahbaConfig['body_font']['color']?>;
    font-weight:         : <?= $shahbaConfig['body_font']['font-weight']?>;
    font-family          : "<?= $shahbaConfig['body_font']['font-family']?>";
    font-size            : <?= $shahbaConfig['body_font']['font-size']?>;
    line-height          : <?= $shahbaConfig['body_font']['line-height']?>;
}
.block{
    background-color      : <?= shahbaHelper::reduxColor2rgba($shahbaConfig['section_bg'])?>;
}
a{
    color : <?= $shahbaConfig['links_color']['regular'] ?>;
}
a:hover{
    color : <?= $shahbaConfig['links_color']['hover']?>;
}
a:active{
    color : <?= $shahbaConfig['links_color']['active']?>;
}
.form-submit input{
    background: <?php echo $shahbaConfig['main_color']?>;
}
.section_title h1,
.section_title h2,
.section_title h3,
.section_title h4,
.section_title h5,
.section_title h6,
h1,h2,h3,h4,h5,h6{
    color       :  <?= $shahbaConfig['title_font']['color']?>;
    font-family :  <?= $shahbaConfig['title_font']['font-family']?>;
}
.section_title{
    border-color: <?= $shahbaConfig['border_color']?>;
}
span.img_post_title h3,.excerpt h4{
    color: <?= $shahbaConfig['tittle_color']?>;
}
.img_post_title{
    background: <?= shahbaHelper::reduxColor2rgba($shahbaConfig['title_bg'])?>;
}
#header .top{
    background: <?= shahbaHelper::reduxColor2rgba($shahbaConfig['top_header_bg'])?>;
}
#header .top i,#header .top .search input.form-control,#header .top .social ul li a i  {
    color: <?= $shahbaConfig['top_header_color']?>;
}
#header .top .search input.form-control::-ms-input-placeholder {
    color: <?= $shahbaConfig['top_header_color']?>;
}
#header .top .search input.form-control::-webkit-input-placeholder  {
    color: <?= $shahbaConfig['top_header_color']?>;
}
#header .top .search input.form-control::-moz-placeholder {
    color: <?= $shahbaConfig['top_header_color']?>;
}
div.menu_section .navbar .top_navbar{
    background: <?= shahbaHelper::reduxColor2rgba($shahbaConfig['navbar_header_bg'])?>;
}
.menu_section .navbar nav li a {
     Color:         <?= $shahbaConfig['navbar_typography']['color']?>;
     Font-family:   <?= $shahbaConfig['navbar_typography']['font-family']?>;
     Font-size:     <?= $shahbaConfig['navbar_typography']['font-size']?>;
     Line-height:   <?= $shahbaConfig['navbar_typography']['line-height']?>;
}
.main-footer {
    background: <?= shahbaHelper::reduxColor2rgba($shahbaConfig['footer_bg'])?>;
}
.main-footer .widgettitle {
    color: <?= $shahbaConfig['footer_title']['color']?>;
    font-size :  <?= $shahbaConfig['footer_title']['font-size']?>;
    font-weight: <?= $shahbaConfig['footer_title']['font-weight']?>;
    font-family: <?= $shahbaConfig['footer_title']['font-family']?>;
}
.main-footer .item_title_1 a h3{
    color: #EEE
}
.main-footer a,.main-footer  {
    color: <?= $shahbaConfig['footer_text']['color']?>;
    font-size :  <?= $shahbaConfig['footer_text']['font-size']?>;
}
.lower-foot {
    background: <?= shahbaHelper::reduxColor2rgba($shahbaConfig['footer_rights_bg'])?>;
}
.shahbatheme-toolbar-page{
    background-color: <?php echo $shahbaConfig['main_color']?>!important;
}
.shahbatheme-toolbar-page a{
    font-weight: bold;
}
@media (min-width: 992px) {
    header .logo img {
        width: <?= $shahbaConfig['logo_spacing']['width']?>;
        height: <?= $shahbaConfig['logo_spacing']['height']?>;
        margin-top: <?= $shahbaConfig['logo_margin']['margin-top']?>;
        margin-right: <?= $shahbaConfig['logo_margin']['margin-right']?>;
        margin-bottom: <?= $shahbaConfig['logo_margin']['margin-bottom']?>;
        margin-left: <?= $shahbaConfig['logo_margin']['margin-left']?>;
    }
}
</style>