/* Presentation controls for standard core Group section patterns. Editor only. */
(function(wp){
 const el=wp.element.createElement,Fragment=wp.element.Fragment;
 const dims={background:{label:'Фон',options:[['','Наследи от темата'],['section--background-default','Светъл'],['section--contrast','Контрастен']],match:/^section--(background-default|surface|contrast)$/},width:{label:'Ширина',options:[['','Наследи от темата'],['section--width-normal','Стандартна'],['section--narrow','Тясна']],match:/^section--(width-normal|narrow|wide|full)$/},spacing:{label:'Вертикално отстояние',options:[['','Наследи от темата'],['section--spacing-default','Нормално'],['section--compact','Компактно']],match:/^section--(spacing-default|compact|spacious)$/}};
	const compositions={hero:[{label:'Изображение',options:[['','От съдържанието'],['section--hero-media-show','Покажи'],['section--hero-media-hide','Скрий']],match:/^section--hero-media-(show|hide)$/},{label:'Подравняване',options:[['','От темата'],['section--align-left','Вляво'],['section--align-center','Центрирано']],match:/^section--align-(left|center|right)$/}],content:[{label:'Композиция',options:[['','Стандартен текст'],['section--content-layout-steps','Стъпки']],match:/^section--content-layout-(single|narrow|two-columns|centered|steps)$/}],cards:[{label:'Колони',options:[['','От темата'],['section--cards-columns-2','2 колони'],['section--cards-columns-3','3 колони']],match:/^section--cards-columns-(2|3|4|auto)$/}],media:[{label:'Позиция на изображението',options:[['','От темата'],['section--media-position-left','Вляво'],['section--media-position-right','Вдясно']],match:/^section--media-position-(left|right)$/}],cta:[{label:'Подравняване',options:[['','От темата'],['section--align-left','Вляво'],['section--align-center','Центрирано']],match:/^section--align-(left|center|right)$/}]};
 function section(attrs){return (attrs.className||'').match(/(?:^|\s)section--(hero|content|cards|media|faq|cta)(?:\s|$)/);}
 wp.hooks.addFilter('editor.BlockEdit','vaedor/section-controls',function(Edit){return function(props){
  if(props.name!=='core/group'||!section(props.attributes))return el(Edit,props);
  const classes=(props.attributes.className||'').split(/\s+/);
  const type=section(props.attributes)[1],controls=Object.values(dims).concat(compositions[type]||[]);
  return el(Fragment,null,el(Edit,props),el(wp.blockEditor.InspectorControls,null,el(wp.components.PanelBody,{title:'Настройки на секцията'},
   controls.map(function(dim){return el(wp.components.SelectControl,{key:dim.label,label:dim.label,value:classes.find(c=>dim.match.test(c))||'',options:dim.options.map(v=>({value:v[0],label:v[1]})),onChange:function(value){const current=(props.attributes.className||'').split(/\s+/);props.setAttributes({className:current.filter(c=>!dim.match.test(c)).concat(value?[value]:[]).filter(Boolean).join(' ')});}});})
  )));
 };});
 wp.hooks.addFilter('editor.BlockListBlock','vaedor/section-defaults',function(Block){return function(props){
  const type=props.name==='core/group'&&section(props.attributes||{});
  if(!type)return el(Block,props);
  let classes=(props.attributes.className||'').split(/\s+/),defaults=(window.vaedorSectionDefaults||{})[type[1]]||'';
  let additions=defaults.split(/\s+/).filter(Boolean).filter(c=>!classes.includes(c));
  Object.values(dims).forEach(dim=>{if(classes.some(c=>dim.match.test(c)))additions=additions.filter(c=>!dim.match.test(c));});
  return el(Block,Object.assign({},props,{className:[props.className||'',...additions].join(' ')}));
 };});
})(window.wp);
