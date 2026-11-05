<?php
/** Declarative presentation settings. Existing option names remain stable. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
function vaedor_base_select_field($label,$choices,$default,$description='') { return compact('label','choices','default','description')+array('type'=>'select'); }
function vaedor_base_number_field($label,$default,$min,$max,$step=1,$description='') { return compact('label','default','min','max','step','description')+array('type'=>'number'); }
function vaedor_base_color_field($label,$default) { return compact('label','default')+array('type'=>'color'); }
function vaedor_base_checkbox_field($label,$default=false,$description='') { return compact('label','default','description')+array('type'=>'checkbox'); }
function vaedor_base_range_field($label,$default,$min,$max,$step=1,$unit='px') { return vaedor_base_number_field($label,$default,$min,$max,$step)+array('range'=>true,'unit'=>$unit); }
function vaedor_base_text_field($label,$default='',$type='text') { return compact('label','default','type'); }
function vaedor_base_group($label,$fields,$description='Настройките се прилагат след записване.') { return compact('label','fields','description'); }
function vaedor_base_global_settings_schema() {
 $n='vaedor_base_number_field';$r='vaedor_base_range_field';$c='vaedor_base_color_field';$s='vaedor_base_select_field';$b='vaedor_base_checkbox_field';
 $type=array('base_size'=>$r('Основен текст — размер',14,9,18,1),'base_line_height'=>$r('Основен текст — междуредие',1.3,.7,2,.1,''),'base_letter_spacing'=>$r('Основен текст — разстояние между буквите',.2,-1,1,.1));
 for($i=1;$i<=6;$i++){ $type['h'.$i.'_line_height']=$r('H'.$i.' — междуредие',1.2,.7,2,.1,'');$type['h'.$i.'_letter_spacing']=$r('H'.$i.' — разстояние между буквите',0,-1,1,.1);$type['h'.$i.'_uppercase']=$b('H'.$i.' — главни букви'); }
 $colors=array(
 'accent-color'=>$c('Основен акцент','#245BFF'),'on-accent-color'=>$c('Текст върху акцента','#FFFFFF'),
 'text-color'=>$c('Основен текст','#525B6B'),'heading-color'=>$c('Заглавия','#172033'),
 'background-color'=>$c('Фон','#F7F8FC'),'secondary-background-color'=>$c('Повърхности и карти','#FFFFFF'),
 'border-color'=>$c('Рамки','#E1E5EE'),'background-color-contrast'=>$c('Контрастен фон','#172033'),'text-color-contrast'=>$c('Текст върху контрастен фон','#FFFFFF'),
 'secondary-text-color'=>$c('Вторичен текст','#667085'),'secondary-accent-color'=>$c('Вторичен акцент','#1744CC'),
 'secondary-text-color-contrast'=>$c('Вторичен контрастен текст','#CBD5E1'),'accent-color-contrast'=>$c('Контрастен акцент','#A5B4FC'),'secondary-accent-color-contrast'=>$c('Вторичен контрастен акцент','#C7D2FE'),'secondary-background-color-contrast'=>$c('Контрастна повърхност','#253149'),
 'shadow-color'=>$c('Сянка','#111827'),'secondary-shadow-color'=>$c('Вторична сянка','#111827'),'shadow-color-contrast'=>$c('Контрастна сянка','#000000'),'secondary-shadow-color-contrast'=>$c('Вторична контрастна сянка','#000000'));
 $buttons=array('radius'=>$r('Заобляне',6,0,20),'uppercase'=>$b('Главни букви'),'min_width'=>$n('Минимална ширина (px)',0,0,600));
 foreach(array('top'=>10,'bottom'=>10,'left'=>20,'right'=>20) as $side=>$default){$names=array('top'=>'Горе','bottom'=>'Долу','left'=>'Ляво','right'=>'Дясно');$buttons['padding_'.$side]=$n('Отстояние — '.$names[$side].' (px)',$default,0,80);}
 return array(
 'general'=>vaedor_base_group('Общи настройки',array('alignment'=>$s('Подравняване',array('left'=>'Вляво','center'=>'Центрирано'),'left'),'background'=>$s('Фон на секциите',array('default'=>'Светъл','contrast'=>'Контрастен'),'default'),'width'=>$s('Ширина на секциите',array('normal'=>'Стандартна','narrow'=>'Тясна'),'normal'),'spacing'=>$s('Отстояние на секциите',array('default'=>'Нормално','compact'=>'Компактно'),'default'))),
 'layout'=>vaedor_base_group('Контейнери и отстояния',array('shell_custom'=>$n('Стандартен контейнер (px)',1200,720,1920,1),'content_narrow'=>$n('Тесен контейнер (px)',760,320,1200,1),'content_wide'=>$n('Широк контейнер (px)',1440,960,2400,1),'section_space'=>$n('Нормално отстояние на секция (px)',80,0,200,1),'section_compact'=>$n('Компактно отстояние на секция (px)',40,0,120,1),'gap'=>$n('Основен gap (px)',24,0,80,1))),
 'colors'=>vaedor_base_group('Цветове',$colors),
 'typography'=>vaedor_base_group('Типография',$type,'Размерите на H1–H6 са фиксирани в темата и не зависят от размера на основния текст.'),
 'buttons'=>vaedor_base_group('Бутони',$buttons,'Стойност 0 за минимална ширина означава без ограничение. Текстовите връзки не наследяват padding и min-width.'),
 'forms'=>vaedor_base_group('Форми',array('radius'=>$r('Заобляне',6,0,20),'padding_y'=>$n('Вертикално отстояние (px)',10,0,40),'padding_x'=>$n('Хоризонтално отстояние (px)',12,0,60),'background'=>$c('Фон','#FFFFFF'),'text'=>$c('Текст','#525B6B'),'border'=>$c('Рамка','#E1E5EE'),'focus_border'=>$c('Рамка при фокус','#245BFF')),'Само оформление. Изпращането се управлява от плъгин за форми.'),
 'cards'=>vaedor_base_group('Карти',array('radius'=>$r('Заобляне',12,0,24),'padding'=>$r('Вътрешно отстояние',24,0,48),'background'=>$c('Фон','#FFFFFF'),'border'=>$c('Рамка','#E1E5EE'),'shadow'=>$s('Сянка',array('none'=>'Без','subtle'=>'Лека','medium'=>'Средна'),'subtle'),'media_ratio'=>$s('Пропорция на изображението',array('3-2'=>'3:2','4-3'=>'4:3','16-9'=>'16:9','1-1'=>'1:1'),'3-2'))),
 'header'=>vaedor_base_group('Хедър',array('sticky'=>$b('Залепен хедър'),'cta_enabled'=>$b('Показване на CTA'),'cta_text'=>vaedor_base_text_field('Текст на CTA','Свържете се с нас'),'cta_url'=>vaedor_base_text_field('Адрес на CTA','','url')),'Логото и менюто се управляват от стандартните WordPress настройки.'),
 'footer'=>vaedor_base_group('Футър',array('description'=>vaedor_base_text_field('Кратко описание'),'copyright'=>vaedor_base_text_field('Copyright текст','© {year} {site}. Всички права запазени.')),'Можете да използвате {year} и {site} в copyright текста.'),
 'gutenberg'=>vaedor_base_group('Редактор',array('custom_colors'=>$b('Произволни цветове'),'custom_gradients'=>$b('Произволни градиенти'),'custom_font_sizes'=>$b('Произволни размери на текста'),'custom_spacing'=>$b('Произволни отстояния'),'wide_alignment'=>$b('Широко подравняване',true),'full_alignment'=>$b('Пълна ширина',true)))
 );
}
function vaedor_base_settings_schema() {
 $schema=vaedor_base_global_settings_schema();
 $labels=array('hero'=>'Водеща секция (Hero)','content'=>'Съдържание','section-cards'=>'Мрежа с карти','media'=>'Текст и изображение','faq'=>'Въпроси и отговори','cta'=>'Призив за действие');
 foreach($labels as $key=>$label){
 $schema[$key]=vaedor_base_group($label,array(
 'enabled'=>vaedor_base_checkbox_field('Налична в библиотеката',true),
 'background'=>vaedor_base_select_field('Фон',array('inherit'=>'От общите настройки','default'=>'Светъл','contrast'=>'Контрастен'),'inherit'),
 'width'=>vaedor_base_select_field('Ширина',array('inherit'=>'От общите настройки','normal'=>'Стандартна','narrow'=>'Тясна'),'inherit'),
 'spacing'=>vaedor_base_select_field('Отстояние',array('inherit'=>'От общите настройки','default'=>'Нормално','compact'=>'Компактно'),'inherit')
 ),'Само начални стойности. Съдържанието се редактира в страницата.');
 $schema[$key]['parent']='sections';
 }
 $schema['section-cards']['option_name']='vaedor_base_cards_section';
 return $schema;
}
function vaedor_base_option_name($tab){ return 'section-cards'===$tab?'vaedor_base_cards_section':'vaedor_base_'.$tab; }
function vaedor_base_section_tabs(){return array('hero','content','section-cards','media','faq','cta');}
