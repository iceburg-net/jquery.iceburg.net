/**
 * jqRevolve - jQuery plugin for smooth-action carousel navigation
 * 	(http://dev.iceburg.net/jquery/jqRevolve/)
 *
 * Copyright (c) 2008 Brice Burgess <bhb@iceburg.net>
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * @author: Brice Burgess
 * @version: 2008.10.15 +r1
 * @requires: jQuery v1.2 or later
 */
;(function($){$.fn.jqRevolve=function(o){o=$.extend({next:'.revolve-next',prev:'.revolve-prev',content:'.revolve-content',autoSize:true,autoCenter:true,startPos:0,maxSpeed:100},o||{});return this.each(function(){JR.sane=true;var a=exists(o.content,this,'content'),next=exists(o.next,this,'next'),prev=exists(o.prev,this,'prev');if(this._jqRev||!JR.sane)return;S++;$(this).css('overflow','hidden');css(this,'relative');css(a,'absolute');H[S]={content:a,pressure:1,maxSpeed:o.maxSpeed,autoSize:o.autoSize,center:o.autoCenter,start:o.startPos};tag(this,next,prev);$(this).jqrRefresh();next.mousedown(function(){JR.start(H[this._jqRev],'-=')});prev.mousedown(function(){JR.start(H[this._jqRev],'+=')})})};$.fn.jqrRefresh=function(d){return this.each(function(){var s=this._jqRev,h=H[s],e=$(this)if(d)h.content.html(d);var c=h.content.clone().css({position:'absolute',top:-9999,left:-9999,height:'auto',width:'auto'});$('body').append(c);(function resize(){if(h.autoSize){var a=true;$('img',h.content).each(function(){if((this.naturalWidth&&this.naturalWidth==0)||!this.complete||(c.height()<this.scrollHeight)){setTimeout(resize,300);a=false;return false}});if(a)e.height(c.height())}var b=c.width(),view=e.width()pos=(h.center&&b<view)?50:h.start;h.max=b-view;h.content.css({left:-((h.max*pos)/100)+'px',width:b+999});if(!h.autoSize||a)c.remove()})()})};$.jqRevolve={hash:{},start:function(h,b){var c=150 total=4500,duration=c,halt=false;function stop(){halt=true};$().one('mouseup',stop);(function scroll(){var p=h.maxSpeed,pos=parseInt(h.content.css('left'));if(halt||(pos>=0&&b=='+=')||(Math.abs(pos)>=h.max&&b=='-='))return h.content.queue('fx',[]);if(duration<total){var f=duration/total,p=parseInt(h.maxSpeed*((3-2*f)*f*f))}var a=(b=='+=')?pos+p:pos-p;if((b=='+='&&a>0)||(b=='-='&&Math.abs(a)>=h.max)){p=(b=='+=')?0-pos:h.max-Math.abs(pos);halt=true}duration+=c;h.content.queue('fx',[]).animate({left:b+p},c+5);setTimeout(scroll,c)})()}};function exists(s,e,d){var a=(typeof s=='string')?$(s,e):$(s);if(a.length==0){alert('jqRevolve: could not find '+d+' element!');JR.sane=false}return a};function tag(){var i=arguments.length;while(i--){$(arguments[i])[0]._jqRev=S}};function css(e,p){if($(e).css('position')=='static')$(e).css('position',p)};var S=0,JR=$.jqRevolve,H=JR.hash})(jQuery);