(()=>{var t={730:()=>{window.requestAnimFrame=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(t){window.setTimeout(t,1e3/60)};var t=function(t,i,o,s,n){this.scale=t,this.color=i,this.vx=o,this.vy=s,this.gv=n,this.position={x:0,y:0}};function i(){for(var t in requestAnimFrame(i),ctx.clearRect(0,0,ctx.canvas.width,ctx.canvas.height),particles)particles[t].update(t)}t.prototype.update=function(t){this.vy+=this.gv,this.position.x+=this.vx,this.position.y+=this.vy;var i=.6;this.position.y>canvas.height-this.scale&&(this.vy*=-.6,this.vx*=.85,this.position.y=canvas.height-this.scale),this.position.x>canvas.width-this.scale&&(this.vy*=i,this.vx*=-.85,this.position.x=canvas.width-this.scale),this.position.x<0&&(this.vy*=i,this.vx*=-.85,this.position.x=-this.position.x);for(var o=0;o<particles.length;o++)if(t!=o){var s=particles[o],n=particles[t],e=this.scale;Math.sqrt(Math.pow(n.position.x-s.position.x,2)+Math.pow(n.position.y-s.position.y,2))<e&&(n.position.x<s.position.x?(this.vy*=i,this.vx*=-.85,this.position.x=n.position.x-(e-(s.position.x-n.position.x))):(this.vy*=i,this.vx*=-.85,this.position.x=n.position.x+(e-(n.position.x-s.position.x))))}!function(t,i,o){$("#objbox"+t).css({top:o}),$("#objbox"+t).css({left:i})}(t,this.position.x,this.position.y)},$((function(){particles=[];for(var o=$(".menubox").eq(0).width(),s=$("#canvas_container").width()/2-4*o,n=0,e=0,a=0,r=0;r<4;r++)n=10*Math.random()-5,e=9*Math.random()+4,a=.2*Math.random()+.3,particles[r]=new t(o,"#fff",n,-e,a),particles[r].position.x=s,particles[r].position.y=2*o,s+=2*o;setTimeout((function(){i()}),1e3)})),$(window).on("load",(function(){canvas=document.querySelector("#canvas_container"),ctx=canvas.getContext("2d")})),$(window).on("load resize",(function(){var t,i;i=(t=document.getElementById("canvas_container")).ownerDocument.defaultView.getComputedStyle(t,""),t.width=Math.round(parseFloat(i.width)),t.height=Math.round(parseFloat(i.height))}))}},i={};function o(s){var n=i[s];if(void 0!==n)return n.exports;var e=i[s]={exports:{}};return t[s](e,e.exports,o),e.exports}o.n=t=>{var i=t&&t.__esModule?()=>t.default:()=>t;return o.d(i,{a:i}),i},o.d=(t,i)=>{for(var s in i)o.o(i,s)&&!o.o(t,s)&&Object.defineProperty(t,s,{enumerable:!0,get:i[s]})},o.o=(t,i)=>Object.prototype.hasOwnProperty.call(t,i),(()=>{"use strict";o(730),$((function(){setTimeout((function(){$(".site_title_space").fadeIn(2e3)}),0)}))})()})();