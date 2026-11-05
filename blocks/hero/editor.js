/* Uses WordPress-provided editor packages; no frontend script or build dependency. */
(function (wp) {
 'use strict';
 var el=wp.element.createElement, Fragment=wp.element.Fragment, be=wp.blockEditor, c=wp.components;
 var config=window.vaedorHero, defaults=config.defaults;
 var fields={
  layout:['Оформление',{'content-only':'Само съдържание',centered:'Центрирано',split:'Разделено','media-left':'Изображение вляво','media-right':'Изображение вдясно'}],
  ratio:['Пропорции',{'50-50':'50 / 50','60-40':'60 / 40','40-60':'40 / 60'}],
  alignment:['Подравняване',{left:'Вляво',center:'Център',right:'Вдясно'}],
  size:['Размер',{compact:'Компактен',default:'Стандартен',large:'Голям'}],
  background:['Фон',{default:'Стандартен',surface:'Повърхност',contrast:'Контрастен'}],
  media_ratio:['Формат на изображението',{natural:'Естествен',landscape:'Пейзаж',portrait:'Портрет',square:'Квадрат',cover:'Запълване'}]
 };
 function classes(a,preview){
  var names=['section','section--hero'];
  Object.keys(fields).forEach(function(key){
   var value=a[key]; if(value==='inherit'){if(!preview)return;value=defaults[key];}
   var prefix={layout:'hero-layout-',ratio:'ratio-',alignment:'align-',size:'hero-size-',media_ratio:'media-ratio-'}[key];
   names.push('section--'+(prefix?prefix+value:(value==='default'?'background-default':value)));
  });
  return names.join(' ');
 }
 function safeUrl(value){return /^(https?:\/\/|mailto:|tel:|\/|#|\?)/i.test(value||'')?value:'';}
 function body(a,edit,set){
  function rich(key,tag,cls,placeholder){
   if(!edit&&!a[key])return null;
   return el(edit?be.RichText:be.RichText.Content,Object.assign({tagName:tag,className:cls,value:a[key]},edit?{placeholder:placeholder,allowedFormats:['core/bold','core/italic'],onChange:function(v){var next={};next[key]=v;set(next);}}:{}));
  }
  function action(key,style){
   if(!edit&&!a[key+'Text'])return null;
   return edit?el(be.RichText,{tagName:'span',className:'button button--'+style,value:a[key+'Text'],placeholder:'Текст на бутона',allowedFormats:[],onChange:function(v){var next={};next[key+'Text']=v;set(next);}}):
    el('a',{className:'button button--'+style,href:safeUrl(a[key+'Url'])||undefined},a[key+'Text']);
  }
  return el('div',{className:'shell section__body'},
   el('div',{className:'section__content'},
    rich('eyebrow','p','section__eyebrow','Надзаглавие'),
    rich('title','h'+a.headingLevel,'section__title','Заглавие'),
    rich('description','p','section__description','Описание'),
    el('div',{className:'section__actions'},action('primary','primary'),action('secondary','outline')),
    rich('supporting','p','section__footer','Допълнителен текст (по избор)')
   ),
   a.imageUrl?el('figure',{className:'section__media'},el('img',{src:safeUrl(a.imageUrl),alt:a.imageAlt,className:a.imageId?'wp-image-'+a.imageId:undefined})):
    (edit?el('div',{className:'section__media'},el('p',{},'Добавете изображение от настройките на блока.')):null)
  );
 }
 wp.blocks.registerBlockType('vaedor/hero',{
  title:'Vaedor Hero',category:'vaedor-base',icon:'cover-image',
  attributes:{"eyebrow":{"type":"string","default":"Vaedor Base"},"title":{"type":"string","default":"Ясно послание за вашия бизнес"},"description":{"type":"string","default":"Представете накратко как помагате на клиентите си."},"supporting":{"type":"string","default":""},"primaryText":{"type":"string","default":"Свържете се с нас"},"primaryUrl":{"type":"string","default":""},"secondaryText":{"type":"string","default":"Научете повече"},"secondaryUrl":{"type":"string","default":""},"imageUrl":{"type":"string","default":""},"imageAlt":{"type":"string","default":""},"imageId":{"type":"number","default":0},"headingLevel":{"type":"number","default":1},"layout":{"type":"string","default":"inherit"},"ratio":{"type":"string","default":"inherit"},"alignment":{"type":"string","default":"inherit"},"size":{"type":"string","default":"inherit"},"background":{"type":"string","default":"inherit"},"media_ratio":{"type":"string","default":"inherit"}},
  supports:{html:false,align:false,inserter:config.enabled},
  edit:function(props){
   var a=props.attributes,set=props.setAttributes;
   var controls=Object.keys(fields).map(function(key){
    var f=fields[key],opts=[{label:'Наследи глобалната настройка',value:'inherit'}];
    Object.keys(f[1]).forEach(function(value){opts.push({label:f[1][value],value:value});});
    return el(c.SelectControl,{key:key,label:f[0],value:a[key],options:opts,onChange:function(v){var next={};next[key]=v;set(next);}});
   });
   return el(Fragment,null,
    el(be.InspectorControls,null,
     el(c.PanelBody,{title:'Hero — оформление'},controls,el(c.SelectControl,{label:'Ниво на заглавието',value:a.headingLevel,options:[1,2,3,4,5,6].map(function(v){return{label:'H'+v,value:v};}),onChange:function(v){set({headingLevel:Number(v)});}})),
     el(c.PanelBody,{title:'Бутони',initialOpen:false},['primary','secondary'].map(function(key){return el(c.TextControl,{key:key,label:key==='primary'?'Основна връзка':'Вторична връзка',type:'url',value:a[key+'Url'],help:'https://, /страница/, #секция, mailto: или tel:',onChange:function(v){var next={};next[key+'Url']=v;set(next);}});})),
     el(c.PanelBody,{title:'Изображение',initialOpen:true},
      el(be.MediaUploadCheck,null,el(be.MediaUpload,{allowedTypes:['image'],value:a.imageId,onSelect:function(media){set({imageId:media.id,imageUrl:media.sizes&&media.sizes.large?media.sizes.large.url:media.url,imageAlt:media.alt||''});},render:function(p){return el(c.Button,{variant:'secondary',onClick:p.open},a.imageId?'Смени изображението':'Избери изображение');}})),
      a.imageUrl?el(c.Button,{isDestructive:true,onClick:function(){set({imageId:0,imageUrl:'',imageAlt:''});}},'Премахни изображението'):null,
      el(c.TextControl,{label:'Алтернативен текст',value:a.imageAlt,help:'Опишете смисъла на изображението; оставете празно, ако е декоративно.',onChange:function(v){set({imageAlt:v});}})
     )
    ),
    el('section',be.useBlockProps({className:classes(a,true)}),body(a,true,set))
   );
  },
  save:function(props){var a=props.attributes;return el('section',be.useBlockProps.save({className:classes(a,false)}),body(a,false));}
 });
})(window.wp);

