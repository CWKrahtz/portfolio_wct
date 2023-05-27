<?php
/**
 * Accordion Template Style One
 *
 * @package Radiantthemes
 */
$item['_id'];

    $s = ( $c==1 ? "show" : "");
    $a = ( $c==1 ? "true" : "false");
	$b = ( $c>1 ? "collapsed" : "");
    $c++;

 $output .='<div class="card">
 <button class="btn btn-link '.$b.'" data-toggle="collapse" data-target="#a'.$item['_id'].'1" aria-expanded="'.$a.'" aria-controls="a'.$item['_id'].'">
    <div class="card-header" id="a'.$item['_id'].'">';
    

if ($item['add-img']=="yes" && $item['svg']) {
  $output .= '<div class="img-upload">';
  $output .= $item['svg'];
  $output .= '</div>';
} else{
	if(!empty($item['img1']['url'])){
		$output .= '<img alt="item" src="'.  $item['img1']['url'] . '">';
    $output .= '</div>';
	}
}


$output .= '
      <' . $settings['title_html_tag'] . ' class="mb-0">
        
         ' . esc_html( $item['tab_title'] ) . '
        
      </' . $settings['title_html_tag'] . '>
    </div>
</button>
    <div id="a'.$item['_id'].'1" class="collapse '.$s.'" aria-labelledby="a'.$item['_id'].'" data-parent="#'.$rtrand.'">
      <div class="card-body">';
       $output .= $this->parse_text_editor( $item['tab_content'] );
      $output .='</div>
    </div>
  </div>';





/*
$output .= '<div class="radiantthemes-accordion-item active">';
$output .= '<div class="radiantthemes-accordion-item-title">';
$output .= '<div class="radiantthemes-accordion-item-title-icon"><i class="main-icon"></i></div>';
$output .= '<div class="img-upload">';

if ($item['add-img']=="yes") {

$output .= $item['svg'];
} else{
	if($item['img1']['url']){
		$output .= '<img alt="item" src="'.  $item['img1']['url'] . '">';
	}
}


$output .= '</div><' . $settings['title_html_tag'] . '  class="panel-title" >' . esc_html( $item['tab_title'] ) . '</' . $settings['title_html_tag'] . '>' ;

$output .= '</div>';
$output .= '<div' . $this->get_render_attribute_string( 'tab_content' ) . ' class="radiantthemes-accordion-item-body">';
$output .= $this->parse_text_editor( $item['tab_content'] );
$output .= '</div>';
$output .= '</div>';
*/