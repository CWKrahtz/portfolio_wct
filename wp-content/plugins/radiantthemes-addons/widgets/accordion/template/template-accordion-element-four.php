<?php
/**
 * Accordion Template Style 2
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
    <span class="card-header" id="a'.$item['_id'].'">';
    

if ($item['add-img']=="yes") {
  $output .= '<span class="img-upload">';
  $output .= $item['svg'];
  $output .= '</span>';
} else{
	if($item['img1']['url']){
		$output .= '<img alt="item" src="'.  $item['img1']['url'] . '">';
    $output .= '</span>';
	}
}


$output .= '
      <' . $settings['title_html_tag'] . ' class="mb-0">
        
         ' . esc_html( $item['tab_title'] ) . '
        
      </' . $settings['title_html_tag'] . '>
    </span>
</button>
    <div id="a'.$item['_id'].'1" class="collapse '.$s.'" aria-labelledby="a'.$item['_id'].'" data-parent="#'.$rtrand.'">
      <div class="card-body">';
       $output .= $this->parse_text_editor( $item['tab_content'] );
      $output .='</div>
    </div>
  </div>';


