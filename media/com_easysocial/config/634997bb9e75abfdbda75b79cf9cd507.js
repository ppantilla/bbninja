FD40.component("EasySocial", {"environment":"static","source":"local","mode":"compressed","baseUrl":"http:\/\/localhost\/betsnbits\/index.php?option=com_easysocial&lang=none&Itemid=256","version":"1.3.10","momentLang":"en-gb"});
!function(t){var e,n=" ",i="width",r="height",o="replace",f="classList",s="className",u="parentNode",a="fit-width",c="fit-height",h="fit-both",g="fit-small",d=a+n+c+n+h+n+g,l=function(t,e){return t.getAttribute("data-"+e)},m=function(t,e){return t["natural"+e[0].toUpperCase()+e.slice(1)]},p=function(t,e){return parseInt(l(t,e)||m(t,e)||t[e])},v=function(t,e){t[f]?t[f].add(e):t[s]+=n+e},b=function(t,e){t[s]=t[s][o](RegExp("\\b("+e[o](/\s+/g,"|")+")\\b","g"),n)[o](/\s+/g,n)[o](/^\s+|\s+$/g,"")},y=function(t,e,n){t.style[e]=n+"px"},E=function(t,e,n,o,f,s,w,H,I,L){return l(t,i)||0!==m(t,i)||(t._retry||(t._retry=0))>25?(e=t[u],n=e[u],o=n[u],f=l(e,"mode"),s=l(e,"threshold"),w=p(t,i),H=p(t,r),I=e.offsetWidth,L=e.offsetHeight,b(o,d),v(o,s>w&&s>H?function(){return y(t,i,w),y(t,r,H),g}():"cover"==f?function(e,n,i){return 1>I||1>L?(x.push(t),h):(e=I/L,n=I/w,i=L/H,1>e?L>H*n?c:a:e>1?I>w*i?a:c:1==e?w/H>1?c:a:void 0)}():function(){return x.push(t),t.style.maxHeight="none",y(t,"maxHeight",e.offsetHeight),h}()),void t.removeAttribute("onload")):setTimeout(function(){t._retry++,E(t)},200)},w=function(t,e){for(e=x,x=[];t=e.shift();)t[u]&&E(t)},x=[],H=function(){clearTimeout(e),e=setTimeout(w,500)},I=t.ESImageList||[];for(t.ESImage=E,t.ESImageRefresh=w,t.addEventListener("resize",H,!1);I.length;)E(I.shift())}(window);
