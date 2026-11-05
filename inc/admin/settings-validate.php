<?php
/** Shared validation: read, save and CSS all use the same bounded values. */
if(!defined('ABSPATH')){exit;}
function vaedor_base_effective_fields($tab){
 $schema=vaedor_base_settings_schema();
 $legacy=vaedor_base_section_settings_schema();
 $type='section-cards'===$tab?'cards':$tab;
 $fields=in_array($tab,array_merge(vaedor_base_section_tabs(),array('contact','posts')),true)?($legacy[$type]['fields']??array()):array();
 return array_replace($fields,$schema[$tab]['fields']??array());
}
function vaedor_base_validate_values($fields,$values){
 $values=is_array($values)?$values:array();$clean=array();
 foreach($fields as $key=>$field){
  $value=$values[$key]??$field['default'];
  if(!is_scalar($value)){$value=$field['default'];}
  switch($field['type']){
   case 'number':
    $n=is_numeric($value)?(float)$value:(float)$field['default'];
    if(!is_finite($n)){$n=(float)$field['default'];}
    $step=(float)($field['step']??1);$min=(float)$field['min'];$max=(float)$field['max'];
    $n=max($min,min($max,$n));$n=$min+round(($n-$min)/$step)*$step;
    $clean[$key]=round(max($min,min($max,$n)),4);break;
   case 'checkbox': $clean[$key]=in_array($value,array(true,1,'1','true','yes','on'),true);break;
   case 'color': $clean[$key]=sanitize_hex_color((string)$value)?:$field['default'];break;
   case 'url': $clean[$key]=esc_url_raw((string)$value,array('http','https','mailto','tel'));break;
   case 'text': $clean[$key]=sanitize_text_field((string)$value);break;
   default: $v=sanitize_key((string)$value);$clean[$key]=array_key_exists($v,$field['choices'])?$v:$field['default'];
  }
 }
 return $clean;
}
function vaedor_base_sanitize_settings($tab,$values){
 $schema=vaedor_base_settings_schema();
 if(!isset($schema[$tab])){return array();}
 $input=is_array($values)?$values:array();
 foreach($schema[$tab]['fields'] as $key=>$field){if('checkbox'===$field['type']&&!isset($input[$key])){$input[$key]=false;}}
 $clean=vaedor_base_validate_values($schema[$tab]['fields'],$input);
 // Hidden legacy settings remain available for existing blocks and future rollback.
 $saved=get_option(vaedor_base_option_name($tab),array());
 return array_replace(is_array($saved)?$saved:array(),$clean);
}
