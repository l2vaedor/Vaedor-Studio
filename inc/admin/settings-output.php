<?php
/** One validated token output shared by frontend, editor and isolated previews. */
if(!defined('ABSPATH')){exit;}
function vaedor_base_field_tokens(){
 $map=array('typography'=>array('base_size'=>array('--font-size-base','px'),'base_line_height'=>array('--line-height-base',''),'base_letter_spacing'=>array('--letter-spacing-base','px')),
 'buttons'=>array('radius'=>array('--button-radius','px'),'uppercase'=>array('--button-text-transform','case'),'min_width'=>array('--button-min-width','px')),
 'forms'=>array('radius'=>array('--input-radius','px'),'padding_y'=>array('--input-padding-y','px'),'padding_x'=>array('--input-padding-x','px'),'background'=>array('--input-background',''),'text'=>array('--input-text',''),'border'=>array('--input-border',''),'focus_border'=>array('--input-focus-border','')),
 'cards'=>array('radius'=>array('--card-radius','px'),'padding'=>array('--card-padding','px'),'background'=>array('--card-background',''),'border'=>array('--card-border',''),'media_ratio'=>array('--card-media-ratio','ratio'),'shadow'=>array('--card-shadow','shadow')),
 'layout'=>array('shell_custom'=>array('--shell-width','px'),'content_narrow'=>array('--content-width-narrow','px'),'content_wide'=>array('--content-width-wide','px'),'section_space'=>array('--section-spacing-max','px'),'section_compact'=>array('--section-spacing-compact-max','px'),'gap'=>array('--grid-gap','px')));
 foreach(array('top','bottom','left','right') as $side){$map['buttons']['padding_'.$side]=array('--button-padding-'.$side,'px');}
 for($i=1;$i<=6;$i++){foreach(array('line_height'=>'','letter_spacing'=>'px','uppercase'=>'case') as $key=>$unit){$map['typography']['h'.$i.'_'.$key]=array('--h'.$i.'-'.str_replace('_','-', 'uppercase'===$key?'text_transform':$key),$unit);}}
 foreach(vaedor_base_settings_defaults('colors') as $key=>$value){$map['colors'][$key]=array('--'.$key,'');}
 return $map;
}
function vaedor_base_token_value($value,$format){
 if('case'===$format){return $value?'uppercase':'none';}
 if('ratio'===$format){return str_replace('-','/',$value);}
 if('shadow'===$format){return array('none'=>'none','subtle'=>'0 4px 16px color-mix(in srgb,var(--shadow-color) 8%,transparent)','medium'=>'0 12px 32px color-mix(in srgb,var(--secondary-shadow-color) 14%,transparent)')[$value]??'none';}
 return $value.$format;
}
function vaedor_base_design_tokens_css(){
 $tokens=array();
 foreach(vaedor_base_field_tokens() as $group=>$fields){
  $values=vaedor_base_get_settings($group);
  foreach($fields as $key=>$spec){$tokens[$spec[0]]=vaedor_base_token_value($values[$key],$spec[1]);}
 }
 // Resolve shadow colors in each card's local (possibly contrast) environment.
 $shadow=$tokens['--card-shadow'];unset($tokens['--card-shadow']);
 $css='';foreach($tokens as $key=>$value){$css.=$key.':'.$value.';';}
 return ':root,.editor-styles-wrapper{'.$css.'}.card{--card-shadow:'.$shadow.'}';
}
add_action('wp_enqueue_scripts',function(){wp_add_inline_style('vaedor-base',vaedor_base_design_tokens_css());},20);
add_filter('block_editor_settings_all',function($settings){$settings['styles'][]=array('css'=>vaedor_base_design_tokens_css());return $settings;});
function vaedor_base_body_design_classes($classes){$classes[]='site--contained';return $classes;}
add_filter('body_class','vaedor_base_body_design_classes');
function vaedor_base_header_classes(){return 'header'.(vaedor_base_get_settings('header')['sticky']?' header--sticky':'');}
function vaedor_base_footer_classes(){return 'footer';}
function vaedor_base_theme_json($data){
 $colors=vaedor_base_get_settings('colors');$layout=vaedor_base_get_settings('layout');$type=vaedor_base_get_settings('typography');$g=vaedor_base_get_settings('gutenberg');$palette=array();
 foreach($colors as $key=>$value){$palette[]=array('slug'=>$key,'name'=>vaedor_base_settings_schema()['colors']['fields'][$key]['label'],'color'=>$value);}
 $sizes=array();foreach(array('small'=>12,'base'=>$type['base_size'],'large'=>20,'x-large'=>30,'2-x-large'=>40) as $slug=>$size){$sizes[]=array('slug'=>$slug,'name'=>$slug,'size'=>$size.'px');}
 return $data->update_with(array('version'=>3,'settings'=>array('color'=>array('palette'=>$palette,'custom'=>$g['custom_colors'],'customGradient'=>$g['custom_gradients']),'typography'=>array('customFontSize'=>$g['custom_font_sizes'],'fontSizes'=>$sizes),'spacing'=>array('customSpacingSize'=>$g['custom_spacing']),'layout'=>array('contentSize'=>$layout['content_narrow'].'px','wideSize'=>$layout['content_wide'].'px')),'styles'=>array('typography'=>array('fontSize'=>'var(--font-size-base)','lineHeight'=>'var(--line-height-base)','letterSpacing'=>'var(--letter-spacing-base)'))));
}
add_filter('wp_theme_json_data_theme','vaedor_base_theme_json');
function vaedor_base_flush_theme_json_on_settings_change($option){if(str_starts_with($option,'vaedor_base_')){wp_clean_theme_json_cache();}}
add_action('updated_option','vaedor_base_flush_theme_json_on_settings_change');
add_action('added_option','vaedor_base_flush_theme_json_on_settings_change');
add_action('deleted_option','vaedor_base_flush_theme_json_on_settings_change');
add_filter('block_type_metadata_settings',function($settings){
 if(empty($settings['supports']['align'])){return $settings;}
 $align=true===$settings['supports']['align']?array('left','center','right','wide','full'):$settings['supports']['align'];
 $g=vaedor_base_get_settings('gutenberg');
 if(!$g['wide_alignment']){$align=array_diff($align,array('wide'));}if(!$g['full_alignment']){$align=array_diff($align,array('full'));}
 $settings['supports']['align']=array_values($align);return $settings;
});
