(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[42],{256:function(e,t,c){"use strict";var n=c(11),a=c.n(n),o=c(0),r=c(269),l=c(6),s=c.n(l);c(259);const i=e=>({thousandSeparator:null==e?void 0:e.thousandSeparator,decimalSeparator:null==e?void 0:e.decimalSeparator,fixedDecimalScale:!0,prefix:null==e?void 0:e.prefix,suffix:null==e?void 0:e.suffix,isNumericString:!0});t.a=e=>{var t;let{className:c,value:n,currency:l,onValueChange:u,displayType:m="text",...b}=e;const p="string"==typeof n?parseInt(n,10):n;if(!Number.isFinite(p))return null;const d=p/10**l.minorUnit;if(!Number.isFinite(d))return null;const v=s()("wc-block-formatted-money-amount","wc-block-components-formatted-money-amount",c),f=null!==(t=b.decimalScale)&&void 0!==t?t:null==l?void 0:l.minorUnit,j={...b,...i(l),decimalScale:f,value:void 0,currency:void 0,onValueChange:void 0},O=u?e=>{const t=+e.value*10**l.minorUnit;u(t)}:()=>{};return Object(o.createElement)(r.a,a()({className:v,displayType:m},j,{value:d,onValueChange:O}))}},259:function(e,t){},355:function(e,t){},423:function(e,t,c){"use strict";var n=c(0),a=c(1),o=c(6),r=c.n(o),l=c(256),s=c(7),i=c(30),u=c(2),m=c(36);c(355),t.a=e=>{let{currency:t,values:c,className:o}=e;const b=Object(u.getSetting)("taxesEnabled",!0)&&Object(u.getSetting)("displayCartPricesIncludingTax",!1),{total_price:p,total_tax:d,tax_lines:v}=c,{receiveCart:f,...j}=Object(i.a)(),O=Object(s.applyCheckoutFilter)({filterName:"totalLabel",defaultValue:Object(a.__)("Total","woocommerce"),extensions:j.extensions,arg:{cart:j}}),g=parseInt(d,10),x=v&&v.length>0?Object(a.sprintf)(
/* translators: %s is a list of tax rates */
Object(a.__)("Including %s","woocommerce"),v.map(e=>{let{name:c,price:n}=e;return`${Object(m.formatPrice)(n,t)} ${c}`}).join(", ")):Object(a.__)("Including <TaxAmount/> in taxes","woocommerce");return Object(n.createElement)(s.TotalsItem,{className:r()("wc-block-components-totals-footer-item",o),currency:t,label:O,value:parseInt(p,10),description:b&&0!==g&&Object(n.createElement)("p",{className:"wc-block-components-totals-footer-item-tax"},Object(n.createInterpolateElement)(x,{TaxAmount:Object(n.createElement)(l.a,{className:"wc-block-components-totals-footer-item-tax-value",currency:t,value:g})}))})}},514:function(e,t,c){"use strict";c.r(t);var n=c(0),a=c(423),o=c(36),r=c(30),l=c(7);const s=()=>{const{extensions:e,receiveCart:t,...c}=Object(r.a)(),a={extensions:e,cart:c,context:"woocommerce/checkout"};return Object(n.createElement)(l.ExperimentalOrderMeta.Slot,a)};t.default=e=>{let{children:t,className:c=""}=e;const{cartTotals:l}=Object(r.a)(),i=Object(o.getCurrencyFromPriceResponse)(l);return Object(n.createElement)("div",{className:c},t,Object(n.createElement)("div",{className:"wc-block-components-totals-wrapper"},Object(n.createElement)(a.a,{currency:i,values:l})),Object(n.createElement)(s,null))}}}]);