(function(){var S,L,t,i,h=[].slice,p=function(t,i){return function(){return t.apply(i,arguments)}},o={}.hasOwnProperty,n=function(t,i){for(var e in i)o.call(i,e)&&(t[e]=i[e]);function s(){this.constructor=t}return s.prototype=i.prototype,t.prototype=new s,t.__super__=i.prototype,t},a=[].indexOf||function(t){for(var i=0,e=this.length;i<e;i++)if(i in this&&this[i]===t)return i;return-1};L=window.Morris={},S=jQuery,L.EventEmitter=function(){function t(){}return t.prototype.on=function(t,i){return null==this.handlers&&(this.handlers={}),null==this.handlers[t]&&(this.handlers[t]=[]),this.handlers[t].push(i),this},t.prototype.fire=function(){var t,i,e,s,o,n,r;if(e=arguments[0],t=2<=arguments.length?h.call(arguments,1):[],null!=this.handlers&&null!=this.handlers[e]){for(r=[],s=0,o=(n=this.handlers[e]).length;s<o;s++)i=n[s],r.push(i.apply(null,t));return r}},t}(),L.commas=function(t){var i,e,s,o;return null!=t?(s=t<0?"-":"",i=Math.abs(t),s+=(e=Math.floor(i).toFixed(0)).replace(/(?=(?:\d{3})+$)(?!^)/g,","),(o=i.toString()).length>e.length&&(s+=o.slice(e.length)),s):"-"},L.pad2=function(t){return(t<10?"0":"")+t},L.Grid=function(t){function i(t){this.hasToShow=p(this.hasToShow,this),this.resizeHandler=p(this.resizeHandler,this);var n=this;if("string"==typeof t.element?this.el=S(document.getElementById(t.element)):this.el=S(t.element),null==this.el||0===this.el.length)throw new Error("Graph container element not found");"static"===this.el.css("position")&&this.el.css("position","relative"),this.options=S.extend({},this.gridDefaults,this.defaults||{},t),"string"==typeof this.options.units&&(this.options.postUnits=t.units),this.raphael=new Raphael(this.el[0]),this.elementWidth=null,this.elementHeight=null,this.dirty=!1,this.selectFrom=null,this.init&&this.init(),this.setData(this.options.data),this.el.bind("mousemove",function(t){var i,e,s,o;return e=n.el.offset(),o=t.pageX-e.left,n.selectFrom?(i=n.data[n.hitTest(Math.min(o,n.selectFrom))]._x,s=n.data[n.hitTest(Math.max(o,n.selectFrom))]._x-i,n.selectionRect.attr({x:i,width:s})):n.fire("hovermove",o,t.pageY-e.top)}),this.el.bind("mouseleave",function(t){return n.selectFrom&&(n.selectionRect.hide(),n.selectFrom=null),n.fire("hoverout")}),this.el.bind("touchstart touchmove touchend",function(t){var i,e;return e=t.originalEvent.touches[0]||t.originalEvent.changedTouches[0],i=n.el.offset(),n.fire("hovermove",e.pageX-i.left,e.pageY-i.top)}),this.el.bind("click",function(t){var i;return i=n.el.offset(),n.fire("gridclick",t.pageX-i.left,t.pageY-i.top)}),this.options.rangeSelect&&(this.selectionRect=this.raphael.rect(0,0,0,this.el.innerHeight()).attr({fill:this.options.rangeSelectColor,stroke:!1}).toBack().hide(),this.el.bind("mousedown",function(t){var i;return i=n.el.offset(),n.startRange(t.pageX-i.left)}),this.el.bind("mouseup",function(t){var i;return i=n.el.offset(),n.endRange(t.pageX-i.left),n.fire("hovermove",t.pageX-i.left,t.pageY-i.top)})),this.options.resize&&S(window).bind("resize",function(t){return null!=n.timeoutId&&window.clearTimeout(n.timeoutId),n.timeoutId=window.setTimeout(n.resizeHandler,100)}),this.el.css("-webkit-tap-highlight-color","rgba(0,0,0,0)"),this.postInit&&this.postInit()}return n(i,t),i.prototype.gridDefaults={dateFormat:null,axes:!0,grid:!0,gridLineColor:"#aaa",gridStrokeWidth:.5,gridTextColor:"#888",gridTextSize:12,gridTextFamily:"sans-serif",gridTextWeight:"normal",hideHover:!1,yLabelFormat:null,xLabelAngle:0,numLines:5,padding:25,parseTime:!0,postUnits:"",preUnits:"",ymax:"auto",ymin:"auto 0",goals:[],goalStrokeWidth:1,goalLineColors:["#666633","#999966","#cc6666","#663333"],events:[],eventStrokeWidth:1,eventLineColors:["#005a04","#ccffbb","#3a5f0b","#005502"],rangeSelect:null,rangeSelectColor:"#eef",resize:!1},i.prototype.setData=function(s,t){var i,e,o,n,r,h,a,l,p,u,d,c,f,g,y,m,x,v,w,b,M;if(null==t&&(t=!0),null==(this.options.data=s)||0===s.length)return this.data=[],this.raphael.clear(),void(null!=this.hover&&this.hover.hide());if(y=this.cumulative?0:null,m=this.cumulative?0:null,0<this.options.goals.length&&(a=Math.min.apply(Math,this.options.goals),h=Math.max.apply(Math,this.options.goals),m=null!=m?Math.min(m,a):a,y=null!=y?Math.max(y,h):h),this.data=function(){var t,i,e;for(e=[],r=t=0,i=s.length;t<i;r=++t)p=s[r],(l={src:p}).label=p[this.options.xkey],this.options.parseTime?(l.x=L.parseDate(l.label),this.options.dateFormat?l.label=this.options.dateFormat(l.x):"number"==typeof l.label&&(l.label=new Date(l.label).toString())):(l.x=r,this.options.xLabelFormat&&(l.label=this.options.xLabelFormat(l))),c=0,l.y=function(){var t,i,e,s;for(e=this.options.ykeys,s=[],n=t=0,i=e.length;t<i;n=++t)g=e[n],"string"==typeof(x=p[g])&&(x=parseFloat(x)),null!=x&&"number"!=typeof x&&(x=null),null!=x&&this.hasToShow(n)&&(this.cumulative?c+=x:null!=y?(y=Math.max(x,y),m=Math.min(x,m)):y=m=x),this.cumulative&&null!=c&&(y=Math.max(c,y),m=Math.min(c,m)),s.push(x);return s}.call(this),e.push(l);return e}.call(this),this.options.parseTime&&(this.data=this.data.sort(function(t,i){return(t.x>i.x)-(i.x>t.x)})),this.xmin=this.data[0].x,this.xmax=this.data[this.data.length-1].x,this.events=[],0<this.options.events.length){if(this.options.parseTime)for(v=0,w=(b=this.options.events).length;v<w;v++)(i=b[v])instanceof Array?(o=i[0],d=i[1],this.events.push([L.parseDate(o),L.parseDate(d)])):this.events.push(L.parseDate(i));else this.events=this.options.events;e=S.map(this.events,function(t){return t}),this.xmax=Math.max(this.xmax,Math.max.apply(Math,e)),this.xmin=Math.min(this.xmin,Math.min.apply(Math,e))}return this.xmin===this.xmax&&(this.xmin-=1,this.xmax+=1),this.ymin=this.yboundary("min",m),this.ymax=this.yboundary("max",y),this.ymin===this.ymax&&(m&&(this.ymin-=1),this.ymax+=1),!0!==(M=this.options.axes)&&"both"!==M&&"y"!==M&&!0!==this.options.grid||(this.options.ymax===this.gridDefaults.ymax&&this.options.ymin===this.gridDefaults.ymin?(this.grid=this.autoGridLines(this.ymin,this.ymax,this.options.numLines),this.ymin=Math.min(this.ymin,this.grid[0]),this.ymax=Math.max(this.ymax,this.grid[this.grid.length-1])):(u=(this.ymax-this.ymin)/(this.options.numLines-1),this.grid=function(){var t,i,e;for(e=[],f=t=this.ymin,i=this.ymax;0<u?t<=i:i<=t;f=t+=u)e.push(f);return e}.call(this))),this.dirty=!0,t?this.redraw():void 0},i.prototype.yboundary=function(t,i){var e,s;return"string"==typeof(e=this.options["y"+t])?"auto"===e.slice(0,4)?5<e.length?(s=parseInt(e.slice(5),10),null==i?s:Math[t](i,s)):null!=i?i:0:parseInt(e,10):e},i.prototype.autoGridLines=function(t,i,e){var s,o,n,r,h,a,l,p;return r=i-t,p=Math.floor(Math.log(r)/Math.log(10)),a=Math.pow(10,p),o=Math.floor(t/a)*a,s=Math.ceil(i/a)*a,h=(s-o)/(e-1),1===a&&1<h&&Math.ceil(h)!==h&&(h=Math.ceil(h),s=o+h*(e-1)),o<0&&0<s&&(o=Math.floor(t/h)*h,s=Math.ceil(i/h)*h),h<1?(n=Math.floor(Math.log(h)/Math.log(10)),function(){var t,i;for(i=[],l=t=o;0<h?t<=s:s<=t;l=t+=h)i.push(parseFloat(l.toFixed(1-n)));return i}()):function(){var t,i;for(i=[],l=t=o;0<h?t<=s:s<=t;l=t+=h)i.push(l);return i}()},i.prototype._calc=function(){var s,t,o,i,n,e,r,h,a;if(e=this.el.width(),i=this.el.height(),(this.elementWidth!==e||this.elementHeight!==i||this.dirty)&&(this.elementWidth=e,this.elementHeight=i,this.dirty=!1,this.left=this.options.padding,this.right=this.elementWidth-this.options.padding,this.top=this.options.padding,this.bottom=this.elementHeight-this.options.padding,!0!==(h=this.options.axes)&&"both"!==h&&"y"!==h||(r=function(){var t,i,e,s;for(s=[],t=0,i=(e=this.grid).length;t<i;t++)o=e[t],s.push(this.measureText(this.yAxisFormat(o)).width);return s}.call(this),this.options.horizontal?this.bottom-=Math.max.apply(Math,r):this.left+=Math.max.apply(Math,r)),!0!==(a=this.options.axes)&&"both"!==a&&"x"!==a||(s=this.options.horizontal?-90:-this.options.xLabelAngle,t=function(){var t,i,e;for(e=[],n=t=0,i=this.data.length;0<=i?t<i:i<t;n=0<=i?++t:--t)e.push(this.measureText(this.data[n].label,s).height);return e}.call(this),this.options.horizontal?this.left+=Math.max.apply(Math,t):this.bottom-=Math.max.apply(Math,t)),this.width=Math.max(1,this.right-this.left),this.height=Math.max(1,this.bottom-this.top),this.options.horizontal?(this.dx=this.height/(this.xmax-this.xmin),this.dy=this.width/(this.ymax-this.ymin),this.yStart=this.left,this.yEnd=this.right,this.xStart=this.top,this.xEnd=this.bottom,this.xSize=this.height,this.ySize=this.width):(this.dx=this.width/(this.xmax-this.xmin),this.dy=this.height/(this.ymax-this.ymin),this.yStart=this.bottom,this.yEnd=this.top,this.xStart=this.left,this.xEnd=this.right,this.xSize=this.width,this.ySize=this.height),this.calc))return this.calc()},i.prototype.transY=function(t){return this.options.horizontal?this.left+(t-this.ymin)*this.dy:this.bottom-(t-this.ymin)*this.dy},i.prototype.transX=function(t){return 1===this.data.length?(this.xStart+this.xEnd)/2:this.xStart+(t-this.xmin)*this.dx},i.prototype.redraw=function(){if(this.raphael.clear(),this._calc(),this.drawGrid(),this.drawGoals(),this.drawEvents(),this.draw)return this.draw()},i.prototype.measureText=function(t,i){var e,s;return null==i&&(i=0),e=(s=this.raphael.text(100,100,t).attr("font-size",this.options.gridTextSize).attr("font-family",this.options.gridTextFamily).attr("font-weight",this.options.gridTextWeight).rotate(i)).getBBox(),s.remove(),e},i.prototype.yAxisFormat=function(t){return this.yLabelFormat(t,0)},i.prototype.yLabelFormat=function(t,i){return"function"==typeof this.options.yLabelFormat?this.options.yLabelFormat(t,i):""+this.options.preUnits+L.commas(t)+this.options.postUnits},i.prototype.getYAxisLabelX=function(){return this.left-this.options.padding/2},i.prototype.drawGrid=function(){var t,i,e,s,o,n,r,h,a;if(!1!==this.options.grid||!0===(n=this.options.axes)||"both"===n||"y"===n){for(t=this.options.horizontal?this.getXAxisLabelY():this.getYAxisLabelX(),a=[],s=0,o=(r=this.grid).length;s<o;s++)i=r[s],e=this.transY(i),!0!==(h=this.options.axes)&&"both"!==h&&"y"!==h||(this.options.horizontal?this.drawXAxisLabel(e,t,this.yAxisFormat(i)):this.drawYAxisLabel(t,e,this.yAxisFormat(i))),this.options.grid?(e=Math.floor(e)+.5,this.options.horizontal?a.push(this.drawGridLine("M"+e+","+this.xStart+"V"+this.xEnd)):a.push(this.drawGridLine("M"+this.xStart+","+e+"H"+this.xEnd))):a.push(void 0);return a}},i.prototype.drawGoals=function(){var t,i,e,s,o,n,r;for(r=[],e=s=0,o=(n=this.options.goals).length;s<o;e=++s)i=n[e],t=this.options.goalLineColors[e%this.options.goalLineColors.length],r.push(this.drawGoal(i,t));return r},i.prototype.drawEvents=function(){var t,i,e,s,o,n,r;for(r=[],e=s=0,o=(n=this.events).length;s<o;e=++s)i=n[e],t=this.options.eventLineColors[e%this.options.eventLineColors.length],r.push(this.drawEvent(i,t));return r},i.prototype.drawGoal=function(t,i){var e,s;return s=Math.floor(this.transY(t))+.5,e=this.options.horizontal?"M"+s+","+this.xStart+"V"+this.xEnd:"M"+this.xStart+","+s+"H"+this.xEnd,this.raphael.path(e).attr("stroke",i).attr("stroke-width",this.options.goalStrokeWidth)},i.prototype.drawEvent=function(t,i){var e,s,o,n;return t instanceof Array?(e=t[0],o=t[1],e=Math.floor(this.transX(e))+.5,o=Math.floor(this.transX(o))+.5,this.options.horizontal?this.raphael.rect(this.yStart,e,this.yEnd-this.yStart,o-e).attr({fill:i,stroke:!1}).toBack():this.raphael.rect(e,this.yEnd,o-e,this.yStart-this.yEnd).attr({fill:i,stroke:!1}).toBack()):(n=Math.floor(this.transX(t))+.5,s=this.options.horizontal?"M"+this.yStart+","+n+"H"+this.yEnd:"M"+n+","+this.yStart+"V"+this.yEnd,this.raphael.path(s).attr("stroke",i).attr("stroke-width",this.options.eventStrokeWidth))},i.prototype.drawYAxisLabel=function(t,i,e){return this.raphael.text(t,i,e).attr("font-size",this.options.gridTextSize).attr("font-family",this.options.gridTextFamily).attr("font-weight",this.options.gridTextWeight).attr("fill",this.options.gridTextColor).attr("text-anchor","end")},i.prototype.drawGridLine=function(t){return this.raphael.path(t).attr("stroke",this.options.gridLineColor).attr("stroke-width",this.options.gridStrokeWidth)},i.prototype.startRange=function(t){return this.hover.hide(),this.selectFrom=t,this.selectionRect.attr({x:t,width:0}).show()},i.prototype.endRange=function(t){var i,e;if(this.selectFrom)return e=Math.min(this.selectFrom,t),i=Math.max(this.selectFrom,t),this.options.rangeSelect.call(this.el,{start:this.data[this.hitTest(e)].x,end:this.data[this.hitTest(i)].x}),this.selectFrom=null},i.prototype.resizeHandler=function(){return this.timeoutId=null,this.raphael.setSize(this.el.width(),this.el.height()),this.redraw()},i.prototype.hasToShow=function(t){return!0===this.options.shown||!0===this.options.shown[t]},i}(L.EventEmitter),L.parseDate=function(t){var i,e,s,o,n,r,h,a,l,p,u;return"number"==typeof t?t:(e=t.match(/^(\d+) Q(\d)$/),o=t.match(/^(\d+)-(\d+)$/),n=t.match(/^(\d+)-(\d+)-(\d+)$/),h=t.match(/^(\d+) W(\d+)$/),a=t.match(/^(\d+)-(\d+)-(\d+)[ T](\d+):(\d+)(Z|([+-])(\d\d):?(\d\d))?$/),l=t.match(/^(\d+)-(\d+)-(\d+)[ T](\d+):(\d+):(\d+(\.\d+)?)(Z|([+-])(\d\d):?(\d\d))?$/),e?new Date(parseInt(e[1],10),3*parseInt(e[2],10)-1,1).getTime():o?new Date(parseInt(o[1],10),parseInt(o[2],10)-1,1).getTime():n?new Date(parseInt(n[1],10),parseInt(n[2],10)-1,parseInt(n[3],10)).getTime():h?(4!==(p=new Date(parseInt(h[1],10),0,1)).getDay()&&p.setMonth(0,1+(4-p.getDay()+7)%7),p.getTime()+6048e5*parseInt(h[2],10)):a?a[6]?(r=0,"Z"!==a[6]&&(r=60*parseInt(a[8],10)+parseInt(a[9],10),"+"===a[7]&&(r=0-r)),Date.UTC(parseInt(a[1],10),parseInt(a[2],10)-1,parseInt(a[3],10),parseInt(a[4],10),parseInt(a[5],10)+r)):new Date(parseInt(a[1],10),parseInt(a[2],10)-1,parseInt(a[3],10),parseInt(a[4],10),parseInt(a[5],10)).getTime():l?(u=parseFloat(l[6]),i=Math.floor(u),s=Math.round(1e3*(u-i)),l[8]?(r=0,"Z"!==l[8]&&(r=60*parseInt(l[10],10)+parseInt(l[11],10),"+"===l[9]&&(r=0-r)),Date.UTC(parseInt(l[1],10),parseInt(l[2],10)-1,parseInt(l[3],10),parseInt(l[4],10),parseInt(l[5],10)+r,i,s)):new Date(parseInt(l[1],10),parseInt(l[2],10)-1,parseInt(l[3],10),parseInt(l[4],10),parseInt(l[5],10),i,s).getTime()):new Date(parseInt(t,10),0,1).getTime())},L.Hover=function(){function t(t){null==t&&(t={}),this.options=S.extend({},L.Hover.defaults,t),this.el=S("<div class='"+this.options.class+"'></div>"),this.el.hide(),this.options.parent.append(this.el)}return t.defaults={class:"morris-hover morris-default-style"},t.prototype.update=function(t,i,e,s){return t?(this.html(t),this.show(),this.moveTo(i,e,s)):this.hide()},t.prototype.html=function(t){return this.el.html(t)},t.prototype.moveTo=function(t,i,e){var s,o,n,r,h,a;return h=this.options.parent.innerWidth(),r=this.options.parent.innerHeight(),o=this.el.outerWidth(),s=this.el.outerHeight(),n=Math.min(Math.max(0,t-o/2),h-o),null!=i?!0===e?(a=i-s/2)<0&&(a=0):(a=i-s-10)<0&&r<(a=i+10)+s&&(a=r/2-s/2):a=r/2-s/2,this.el.css({left:n+"px",top:parseInt(a)+"px"})},t.prototype.show=function(){return this.el.show()},t.prototype.hide=function(){return this.el.hide()},t}(),L.Line=function(t){function i(t){if(this.hilight=p(this.hilight,this),this.onHoverOut=p(this.onHoverOut,this),this.onHoverMove=p(this.onHoverMove,this),this.onGridClick=p(this.onGridClick,this),!(this instanceof L.Line))return new L.Line(t);i.__super__.constructor.call(this,t)}return n(i,t),i.prototype.init=function(){if("always"!==this.options.hideHover)return this.hover=new L.Hover({parent:this.el}),this.on("hovermove",this.onHoverMove),this.on("hoverout",this.onHoverOut),this.on("gridclick",this.onGridClick)},i.prototype.defaults={lineWidth:3,pointSize:4,lineColors:["#0b62a4","#7A92A3","#4da74d","#afd8f8","#edc240","#cb4b4b","#9440ed"],pointStrokeWidths:[1],pointStrokeColors:["#ffffff"],pointFillColors:[],smooth:!0,shown:!0,xLabels:"auto",xLabelFormat:null,xLabelMargin:24,hideHover:!1,trendLine:!1,trendLineWidth:2,trendLineColors:["#689bc3","#a2b3bf","#64b764"]},i.prototype.calc=function(){return this.calcPoints(),this.generatePaths()},i.prototype.calcPoints=function(){var o,n,t,i,e,s;for(s=[],t=0,i=(e=this.data).length;t<i;t++)(o=e[t])._x=this.transX(o.x),o._y=function(){var t,i,e,s;for(s=[],t=0,i=(e=o.y).length;t<i;t++)null!=(n=e[t])?s.push(this.transY(n)):s.push(n);return s}.call(this),s.push(o._ymax=Math.min.apply(Math,[this.bottom].concat(function(){var t,i,e,s;for(s=[],t=0,i=(e=o._y).length;t<i;t++)null!=(n=e[t])&&s.push(n);return s}())));return s},i.prototype.hitTest=function(t){var i,e,s,o;if(0===this.data.length)return null;for(i=e=0,s=(o=this.data.slice(1)).length;e<s&&!(t<(o[i]._x+this.data[i]._x)/2);i=++e);return i},i.prototype.onGridClick=function(t,i){var e;return e=this.hitTest(t),this.fire("click",e,this.data[e].src,t,i)},i.prototype.onHoverMove=function(t,i){var e;return e=this.hitTest(t),this.displayHoverForRow(e)},i.prototype.onHoverOut=function(){if(!1!==this.options.hideHover)return this.displayHoverForRow(null)},i.prototype.displayHoverForRow=function(t){var i;return null!=t?((i=this.hover).update.apply(i,this.hoverContentForRow(t)),this.hilight(t)):(this.hover.hide(),this.hilight())},i.prototype.hoverContentForRow=function(t){var i,e,s,o,n,r,h;for(s=this.data[t],i=(i=S("<div class='morris-hover-row-label'>").text(s.label)).prop("outerHTML"),e=n=0,r=(h=s.y).length;n<r;e=++n)o=h[e],!1!==this.options.labels[e]&&(i+="<div class='morris-hover-point' style='color: "+this.colorFor(s,e,"label")+"'>\n  "+this.options.labels[e]+":\n  "+this.yLabelFormat(o,e)+"\n</div>");return"function"==typeof this.options.hoverCallback&&(i=this.options.hoverCallback(t,this.options,i,s.src)),[i,s._x,s._ymax]},i.prototype.generatePaths=function(){var o,n,r,h;return this.paths=function(){var t,i,e,s;for(s=[],n=t=0,i=this.options.ykeys.length;0<=i?t<i:i<t;n=0<=i?++t:--t)h="boolean"==typeof this.options.smooth?this.options.smooth:(e=this.options.ykeys[n],0<=a.call(this.options.smooth,e)),1<(o=function(){var t,i,e,s;for(s=[],t=0,i=(e=this.data).length;t<i;t++)void 0!==(r=e[t])._y[n]&&s.push({x:r._x,y:r._y[n]});return s}.call(this)).length?s.push(L.Line.createPath(o,h,this.bottom)):s.push(null);return s}.call(this)},i.prototype.draw=function(){var t;if(!0!==(t=this.options.axes)&&"both"!==t&&"x"!==t||this.drawXAxis(),this.drawSeries(),!1===this.options.hideHover)return this.displayHoverForRow(this.data.length-1)},i.prototype.drawXAxis=function(){var t,i,e,h,a,o,l,s,n,r,p=this;for(l=this.bottom+this.options.padding/2,h=a=null,t=function(t,i){var e,s,o,n,r;return r=(e=p.drawXAxisLabel(p.transX(i),l,t)).getBBox(),e.transform("r"+-p.options.xLabelAngle),s=e.getBBox(),e.transform("t0,"+s.height/2+"..."),0!==p.options.xLabelAngle&&(n=-.5*r.width*Math.cos(p.options.xLabelAngle*Math.PI/180),e.transform("t"+n+",0...")),s=e.getBBox(),(null==a||a>=s.x+s.width||null!=h&&h>=s.x)&&0<=s.x&&s.x+s.width<p.el.width()?(0!==p.options.xLabelAngle&&(o=1.25*p.options.gridTextSize/Math.sin(p.options.xLabelAngle*Math.PI/180),h=s.x-o),a=s.x-p.options.xLabelMargin):e.remove()},(e=this.options.parseTime?1===this.data.length&&"auto"===this.options.xLabels?[[this.data[0].label,this.data[0].x]]:L.labelSeries(this.xmin,this.xmax,this.width,this.options.xLabels,this.options.xLabelFormat):function(){var t,i,e,s;for(s=[],t=0,i=(e=this.data).length;t<i;t++)o=e[t],s.push([o.label,o.x]);return s}.call(this)).reverse(),r=[],s=0,n=e.length;s<n;s++)i=e[s],r.push(t(i[0],i[1]));return r},i.prototype.drawSeries=function(){var t,i,e,s,o,n;for(this.seriesPoints=[],t=i=s=this.options.ykeys.length-1;s<=0?i<=0:0<=i;t=s<=0?++i:--i)this.hasToShow(t)&&((!1!==this.options.trendLine&&!0===this.options.trendLine||!0===this.options.trendLine[t])&&this._drawTrendLine(t),this._drawLineFor(t));for(n=[],t=e=o=this.options.ykeys.length-1;o<=0?e<=0:0<=e;t=o<=0?++e:--e)this.hasToShow(t)?n.push(this._drawPointFor(t)):n.push(void 0);return n},i.prototype._drawPointFor=function(t){var i,e,s,o,n,r;for(this.seriesPoints[t]=[],r=[],s=0,o=(n=this.data).length;s<o;s++)(i=null)!=(e=n[s])._y[t]&&(i=this.drawLinePoint(e._x,e._y[t],this.colorFor(e,t,"point"),t)),r.push(this.seriesPoints[t].push(i));return r},i.prototype._drawLineFor=function(t){var i;if(null!==(i=this.paths[t]))return this.drawLinePath(i,this.colorFor(null,t,"line"),t)},i.prototype._drawTrendLine=function(t){var i,e,s,o,n,r,h,a,l,p,u,d,c,f,g;for(c=o=a=h=l=r=0,f=(g=this.data).length;c<f;c++)u=(p=g[c]).x,void 0!==(d=p.y[t])&&(o+=1,r+=u,l+=d,h+=u*u,a+=u*d);return e=l/o-(i=(o*a-r*l)/(o*h-r*r))*r/o,(s=[{},{}])[0].x=this.transX(this.data[0].x),s[0].y=this.transY(this.data[0].x*i+e),s[1].x=this.transX(this.data[this.data.length-1].x),s[1].y=this.transY(this.data[this.data.length-1].x*i+e),n=L.Line.createPath(s,!1,this.bottom),this.raphael.path(n).attr("stroke",this.colorFor(null,t,"trendLine")).attr("stroke-width",this.options.trendLineWidth)},i.createPath=function(t,i,e){var s,o,n,r,h,a,l,p,u,d;for(l="",i&&(n=L.Line.gradients(t)),p={y:null},r=u=0,d=t.length;u<d;r=++u)null!=(s=t[r]).y&&(null!=p.y?i?(o=n[r],a=n[r-1],h=(s.x-p.x)/4,l+="C"+(p.x+h)+","+Math.min(e,p.y+h*a)+","+(s.x-h)+","+Math.min(e,s.y-h*o)+","+s.x+","+s.y):l+="L"+s.x+","+s.y:i&&null==n[r]||(l+="M"+s.x+","+s.y)),p=s;return l},i.gradients=function(t){var i,e,s,o,n,r,h,a;for(e=function(t,i){return(t.y-i.y)/(t.x-i.x)},a=[],s=r=0,h=t.length;r<h;s=++r)null!=(i=t[s]).y?(o=t[s+1]||{y:null},null!=(n=t[s-1]||{y:null}).y&&null!=o.y?a.push(e(n,o)):null!=n.y?a.push(e(n,i)):null!=o.y?a.push(e(i,o)):a.push(null)):a.push(null);return a},i.prototype.hilight=function(t){var i,e,s,o,n;if(null!==this.prevHilight&&this.prevHilight!==t)for(i=e=0,o=this.seriesPoints.length-1;0<=o?e<=o:o<=e;i=0<=o?++e:--e)this.seriesPoints[i][this.prevHilight]&&this.seriesPoints[i][this.prevHilight].animate(this.pointShrinkSeries(i));if(null!==t&&this.prevHilight!==t)for(i=s=0,n=this.seriesPoints.length-1;0<=n?s<=n:n<=s;i=0<=n?++s:--s)this.seriesPoints[i][t]&&this.seriesPoints[i][t].animate(this.pointGrowSeries(i));return this.prevHilight=t},i.prototype.colorFor=function(t,i,e){return"function"==typeof this.options.lineColors?this.options.lineColors.call(this,t,i,e):"point"===e?this.options.pointFillColors[i%this.options.pointFillColors.length]||this.options.lineColors[i%this.options.lineColors.length]:"line"===e?this.options.lineColors[i%this.options.lineColors.length]:this.options.trendLineColors[i%this.options.trendLineColors.length]},i.prototype.drawXAxisLabel=function(t,i,e){return this.raphael.text(t,i,e).attr("font-size",this.options.gridTextSize).attr("font-family",this.options.gridTextFamily).attr("font-weight",this.options.gridTextWeight).attr("fill",this.options.gridTextColor)},i.prototype.drawLinePath=function(t,i,e){return this.raphael.path(t).attr("stroke",i).attr("stroke-width",this.lineWidthForSeries(e))},i.prototype.drawLinePoint=function(t,i,e,s){return this.raphael.circle(t,i,this.pointSizeForSeries(s)).attr("fill",e).attr("stroke-width",this.pointStrokeWidthForSeries(s)).attr("stroke",this.pointStrokeColorForSeries(s))},i.prototype.pointStrokeWidthForSeries=function(t){return this.options.pointStrokeWidths[t%this.options.pointStrokeWidths.length]},i.prototype.pointStrokeColorForSeries=function(t){return this.options.pointStrokeColors[t%this.options.pointStrokeColors.length]},i.prototype.lineWidthForSeries=function(t){return this.options.lineWidth instanceof Array?this.options.lineWidth[t%this.options.lineWidth.length]:this.options.lineWidth},i.prototype.pointSizeForSeries=function(t){return this.options.pointSize instanceof Array?this.options.pointSize[t%this.options.pointSize.length]:this.options.pointSize},i.prototype.pointGrowSeries=function(t){if(0!==this.pointSizeForSeries(t))return Raphael.animation({r:this.pointSizeForSeries(t)+3},25,"linear")},i.prototype.pointShrinkSeries=function(t){return Raphael.animation({r:this.pointSizeForSeries(t)},25,"linear")},i}(L.Grid),L.labelSeries=function(t,i,e,s,o){var n,r,h,a,l,p,u,d,c,f,g;if(h=200*(i-t)/e,r=new Date(t),void 0===(u=L.LABEL_SPECS[s]))for(c=0,f=(g=L.AUTO_LABEL_ORDER).length;c<f;c++)if(a=g[c],h>=(p=L.LABEL_SPECS[a]).span){u=p;break}for(void 0===u&&(u=L.LABEL_SPECS.second),o&&(u=S.extend({},u,{fmt:o})),n=u.start(r),l=[];(d=n.getTime())<=i;)t<=d&&l.push([u.fmt(n),d]),u.incr(n);return l},t=function(i){return{span:60*i*1e3,start:function(t){return new Date(t.getFullYear(),t.getMonth(),t.getDate(),t.getHours())},fmt:function(t){return L.pad2(t.getHours())+":"+L.pad2(t.getMinutes())},incr:function(t){return t.setUTCMinutes(t.getUTCMinutes()+i)}}},i=function(i){return{span:1e3*i,start:function(t){return new Date(t.getFullYear(),t.getMonth(),t.getDate(),t.getHours(),t.getMinutes())},fmt:function(t){return L.pad2(t.getHours())+":"+L.pad2(t.getMinutes())+":"+L.pad2(t.getSeconds())},incr:function(t){return t.setUTCSeconds(t.getUTCSeconds()+i)}}},L.LABEL_SPECS={decade:{span:1728e8,start:function(t){return new Date(t.getFullYear()-t.getFullYear()%10,0,1)},fmt:function(t){return""+t.getFullYear()},incr:function(t){return t.setFullYear(t.getFullYear()+10)}},year:{span:1728e7,start:function(t){return new Date(t.getFullYear(),0,1)},fmt:function(t){return""+t.getFullYear()},incr:function(t){return t.setFullYear(t.getFullYear()+1)}},month:{span:24192e5,start:function(t){return new Date(t.getFullYear(),t.getMonth(),1)},fmt:function(t){return t.getFullYear()+"-"+L.pad2(t.getMonth()+1)},incr:function(t){return t.setMonth(t.getMonth()+1)}},week:{span:6048e5,start:function(t){return new Date(t.getFullYear(),t.getMonth(),t.getDate())},fmt:function(t){return t.getFullYear()+"-"+L.pad2(t.getMonth()+1)+"-"+L.pad2(t.getDate())},incr:function(t){return t.setDate(t.getDate()+7)}},day:{span:864e5,start:function(t){return new Date(t.getFullYear(),t.getMonth(),t.getDate())},fmt:function(t){return t.getFullYear()+"-"+L.pad2(t.getMonth()+1)+"-"+L.pad2(t.getDate())},incr:function(t){return t.setDate(t.getDate()+1)}},hour:t(60),"30min":t(30),"15min":t(15),"10min":t(10),"5min":t(5),minute:t(1),"30sec":i(30),"15sec":i(15),"10sec":i(10),"5sec":i(5),second:i(1)},L.AUTO_LABEL_ORDER=["decade","year","month","week","day","hour","30min","15min","10min","5min","minute","30sec","15sec","10sec","5sec","second"],L.Area=function(t){var e;function s(t){var i;if(!(this instanceof L.Area))return new L.Area(t);i=S.extend({},e,t),this.cumulative=!i.behaveLikeLine,"auto"===i.fillOpacity&&(i.fillOpacity=i.behaveLikeLine?.8:1),s.__super__.constructor.call(this,i)}return n(s,t),e={fillOpacity:"auto",behaveLikeLine:!1},s.prototype.calcPoints=function(){var o,n,r,t,i,e,s;for(s=[],t=0,i=(e=this.data).length;t<i;t++)(o=e[t])._x=this.transX(o.x),n=0,o._y=function(){var t,i,e,s;for(s=[],t=0,i=(e=o.y).length;t<i;t++)r=e[t],this.options.behaveLikeLine?s.push(this.transY(r)):(n+=r||0,s.push(this.transY(n)));return s}.call(this),s.push(o._ymax=Math.max.apply(Math,o._y));return s},s.prototype.drawSeries=function(){var t,i,e,s,o,n,r,h;for(this.seriesPoints=[],h=[],e=0,s=(i=this.options.behaveLikeLine?function(){n=[];for(var t=0,i=this.options.ykeys.length-1;0<=i?t<=i:i<=t;0<=i?t++:t--)n.push(t);return n}.apply(this):function(){r=[];for(var t=o=this.options.ykeys.length-1;o<=0?t<=0:0<=t;o<=0?t++:t--)r.push(t);return r}.apply(this)).length;e<s;e++)t=i[e],this._drawFillFor(t),this._drawLineFor(t),h.push(this._drawPointFor(t));return h},s.prototype._drawFillFor=function(t){var i;if(null!==(i=this.paths[t]))return i=i+"L"+this.transX(this.xmax)+","+this.bottom+"L"+this.transX(this.xmin)+","+this.bottom+"Z",this.drawFilledPath(i,this.fillForSeries(t))},s.prototype.fillForSeries=function(t){var i;return i=Raphael.rgb2hsl(this.colorFor(this.data[t],t,"line")),Raphael.hsl(i.h,this.options.behaveLikeLine?.9*i.s:.75*i.s,Math.min(.98,this.options.behaveLikeLine?1.2*i.l:1.25*i.l))},s.prototype.drawFilledPath=function(t,i){return this.raphael.path(t).attr("fill",i).attr("fill-opacity",this.options.fillOpacity).attr("stroke","none")},s}(L.Line),L.Bar=function(t){function i(t){if(this.onHoverOut=p(this.onHoverOut,this),this.onHoverMove=p(this.onHoverMove,this),this.onGridClick=p(this.onGridClick,this),!(this instanceof L.Bar))return new L.Bar(t);i.__super__.constructor.call(this,S.extend({},t,{parseTime:!1}))}return n(i,t),i.prototype.init=function(){if(this.cumulative=this.options.stacked,"always"!==this.options.hideHover)return this.hover=new L.Hover({parent:this.el}),this.on("hovermove",this.onHoverMove),this.on("hoverout",this.onHoverOut),this.on("gridclick",this.onGridClick)},i.prototype.defaults={barSizeRatio:.75,barGap:3,barColors:["#0b62a4","#7a92a3","#4da74d","#afd8f8","#edc240","#cb4b4b","#9440ed"],barOpacity:1,barRadius:[0,0,0,0],xLabelMargin:50,horizontal:!1,shown:!0},i.prototype.calc=function(){var t;if(this.calcBars(),!1===this.options.hideHover)return(t=this.hover).update.apply(t,this.hoverContentForRow(this.data.length-1))},i.prototype.calcBars=function(){var t,o,n,i,e,s,r;for(r=[],t=i=0,e=(s=this.data).length;i<e;t=++i)(o=s[t])._x=this.xStart+this.xSize*(t+.5)/this.data.length,r.push(o._y=function(){var t,i,e,s;for(s=[],t=0,i=(e=o.y).length;t<i;t++)null!=(n=e[t])?s.push(this.transY(n)):s.push(null);return s}.call(this));return r},i.prototype.draw=function(){var t;return!0!==(t=this.options.axes)&&"both"!==t&&"x"!==t||this.drawXAxis(),this.drawSeries()},i.prototype.drawXAxis=function(){var t,i,e,s,o,n,r,h,a,l,p,u,d,c,f,g;for(i=this.options.horizontal?this.getYAxisLabelX():this.getXAxisLabelY(),h=a=null,g=[],e=c=0,f=this.data.length;0<=f?c<f:f<c;e=0<=f?++c:--c)l=this.data[this.data.length-1-e],s=this.options.horizontal?this.drawYAxisLabel(i,l._x-.5*this.options.gridTextSize,l.label):this.drawXAxisLabel(l._x,i,l.label),t=this.options.horizontal?0:this.options.xLabelAngle,d=s.getBBox(),s.transform("r"+-t),o=s.getBBox(),s.transform("t0,"+o.height/2+"..."),0!==t&&(r=-.5*d.width*Math.cos(t*Math.PI/180),s.transform("t"+r+",0...")),n=this.options.horizontal?(u=o.y,p=o.height,this.el.height()):(u=o.x,p=o.width,this.el.width()),(null==a||u+p<=a||null!=h&&u<=h)&&0<=u&&u+p<n?(0!==t&&(h=u-1.25*this.options.gridTextSize/Math.sin(t*Math.PI/180)),this.options.horizontal?g.push(a=u):g.push(a=u-this.options.xLabelMargin)):g.push(s.remove());return g},i.prototype.getXAxisLabelY=function(){return this.bottom+(this.options.xAxisLabelTopPadding||this.options.padding/2)},i.prototype.drawSeries=function(){var o,n,r,t,h,a,l,p,i,u,d,c,e,f,g,y,s,m;if(r=this.xSize/this.options.data.length,this.options.stacked)i=1;else for(t=s=i=0,m=this.options.ykeys.length-1;0<=m?s<=m:m<=s;t=0<=m?++s:--s)this.hasToShow(t)&&(i+=1);return o=(r*this.options.barSizeRatio-this.options.barGap*(i-1))/i,this.options.barSize&&(o=Math.min(o,this.options.barSize)),e=r-o*i-this.options.barGap*(i-1),p=e/2,y=this.ymin<=0&&0<=this.ymax?this.transY(0):null,this.bars=function(){var t,i,e,s;for(e=this.data,s=[],h=t=0,i=e.length;t<i;h=++t)u=e[h],a=0,s.push(function(){var t,i,e,s;for(e=u._y,s=[],d=t=0,i=e.length;t<i;d=++t)g=e[d],this.hasToShow(d)&&(null!==g?(n=y?(f=Math.min(g,y),Math.max(g,y)):(f=g,this.bottom),l=this.xStart+h*r+p,this.options.stacked||(l+=d*(o+this.options.barGap)),c=n-f,this.options.verticalGridCondition&&this.options.verticalGridCondition(u.x)&&(this.options.horizontal?this.drawBar(this.yStart,this.xStart+h*r,this.ySize,r,this.options.verticalGridColor,this.options.verticalGridOpacity,this.options.barRadius):this.drawBar(this.xStart+h*r,this.yEnd,r,this.ySize,this.options.verticalGridColor,this.options.verticalGridOpacity,this.options.barRadius)),this.options.stacked&&(f-=a),this.options.horizontal?(this.drawBar(f,l,c,o,this.colorFor(u,d,"bar"),this.options.barOpacity,this.options.barRadius),s.push(a-=c)):(this.drawBar(l,f,o,c,this.colorFor(u,d,"bar"),this.options.barOpacity,this.options.barRadius),s.push(a+=c))):s.push(null));return s}.call(this));return s}.call(this)},i.prototype.colorFor=function(t,i,e){var s,o;return"function"==typeof this.options.barColors?(s={x:t.x,y:t.y[i],label:t.label},o={index:i,key:this.options.ykeys[i],label:this.options.labels[i]},this.options.barColors.call(this,s,o,e)):this.options.barColors[i%this.options.barColors.length]},i.prototype.hitTest=function(t,i){var e;return 0===this.data.length?null:(e=this.options.horizontal?i:t,e=Math.max(Math.min(e,this.xEnd),this.xStart),Math.min(this.data.length-1,Math.floor((e-this.xStart)/(this.xSize/this.data.length))))},i.prototype.onGridClick=function(t,i){var e;return e=this.hitTest(t,i),this.fire("click",e,this.data[e].src,t,i)},i.prototype.onHoverMove=function(t,i){var e,s;return e=this.hitTest(t,i),(s=this.hover).update.apply(s,this.hoverContentForRow(e))},i.prototype.onHoverOut=function(){if(!1!==this.options.hideHover)return this.hover.hide()},i.prototype.hoverContentForRow=function(t){var i,e,s,o,n,r,h;for(s=this.data[t],i=(i=S("<div class='morris-hover-row-label'>").text(s.label)).prop("outerHTML"),e=n=0,r=(h=s.y).length;n<r;e=++n)o=h[e],!1!==this.options.labels[e]&&(i+="<div class='morris-hover-point' style='color: "+this.colorFor(s,e,"label")+"'>\n  "+this.options.labels[e]+":\n  "+this.yLabelFormat(o,e)+"\n</div>");return"function"==typeof this.options.hoverCallback&&(i=this.options.hoverCallback(t,this.options,i,s.src)),this.options.horizontal?[i,this.left+.5*this.width,o=this.top+(t+.5)*this.height/this.data.length,!0]:[i,this.left+(t+.5)*this.width/this.data.length]},i.prototype.drawXAxisLabel=function(t,i,e){return this.raphael.text(t,i,e).attr("font-size",this.options.gridTextSize).attr("font-family",this.options.gridTextFamily).attr("font-weight",this.options.gridTextWeight).attr("fill",this.options.gridTextColor)},i.prototype.drawBar=function(t,i,e,s,o,n,r){var h;return(0===(h=Math.max.apply(Math,r))||s<h?this.raphael.rect(t,i,e,s):this.raphael.path(this.roundedRect(t,i,e,s,r))).attr("fill",o).attr("fill-opacity",n).attr("stroke","none")},i.prototype.roundedRect=function(t,i,e,s,o){return null==o&&(o=[0,0,0,0]),["M",t,o[0]+i,"Q",t,i,t+o[0],i,"L",t+e-o[1],i,"Q",t+e,i,t+e,i+o[1],"L",t+e,i+s-o[2],"Q",t+e,i+s,t+e-o[2],i+s,"L",t+o[3],i+s,"Q",t,i+s,t,i+s-o[3],"Z"]},i}(L.Grid),L.Donut=function(t){function i(t){this.resizeHandler=p(this.resizeHandler,this),this.select=p(this.select,this),this.click=p(this.click,this);var i=this;if(!(this instanceof L.Donut))return new L.Donut(t);if(this.options=S.extend({},this.defaults,t),"string"==typeof t.element?this.el=S(document.getElementById(t.element)):this.el=S(t.element),null===this.el||0===this.el.length)throw new Error("Graph placeholder not found.");void 0!==t.data&&0!==t.data.length&&(this.raphael=new Raphael(this.el[0]),this.options.resize&&S(window).bind("resize",function(t){return null!=i.timeoutId&&window.clearTimeout(i.timeoutId),i.timeoutId=window.setTimeout(i.resizeHandler,100)}),this.setData(t.data))}return n(i,t),i.prototype.defaults={colors:["#0B62A4","#3980B5","#679DC6","#95BBD7","#B0CCE1","#095791","#095085","#083E67","#052C48","#042135"],backgroundColor:"#FFFFFF",labelColor:"#000000",formatter:L.commas,resize:!1},i.prototype.redraw=function(){var t,i,e,s,o,n,r,h,a,l,p,u,d,c,f,g,y,m,x,v,w,b;for(this.raphael.clear(),i=this.el.width()/2,e=this.el.height()/2,u=(Math.min(i,e)-10)/3,d=p=0,g=(x=this.values).length;d<g;d++)p+=x[d];for(h=5/(2*u),t=1.9999*Math.PI-h*this.data.length,o=n=0,this.segments=[],s=c=0,y=(v=this.values).length;c<y;s=++c)a=n+h+t*(v[s]/p),(l=new L.DonutSegment(i,e,2*u,u,n,a,this.data[s].color||this.options.colors[o%this.options.colors.length],this.options.backgroundColor,o,this.raphael)).render(),this.segments.push(l),l.on("hover",this.select),l.on("click",this.click),n=a,o+=1;for(this.text1=this.drawEmptyDonutLabel(i,e-10,this.options.labelColor,15,800),this.text2=this.drawEmptyDonutLabel(i,e+10,this.options.labelColor,14),r=Math.max.apply(Math,this.values),b=[],f=o=0,m=(w=this.values).length;f<m;f++){if(w[f]===r){this.select(o);break}b.push(o+=1)}return b},i.prototype.setData=function(t){var o;return this.data=t,this.values=function(){var t,i,e,s;for(s=[],t=0,i=(e=this.data).length;t<i;t++)o=e[t],s.push(parseFloat(o.value));return s}.call(this),this.redraw()},i.prototype.click=function(t){return this.fire("click",t,this.data[t])},i.prototype.select=function(t){var i,e,s,o;for(e=0,s=(o=this.segments).length;e<s;e++)o[e].deselect();return this.segments[t].select(),i=this.data[t],this.setLabels(i.label,this.options.formatter(i.value,i))},i.prototype.setLabels=function(t,i){var e,s,o,n,r,h,a,l;return n=1.8*(e=2*(Math.min(this.el.width()/2,this.el.height()/2)-10)/3),o=e/2,s=e/3,this.text1.attr({text:t,transform:""}),r=this.text1.getBBox(),h=Math.min(n/r.width,o/r.height),this.text1.attr({transform:"S"+h+","+h+","+(r.x+r.width/2)+","+(r.y+r.height)}),this.text2.attr({text:i,transform:""}),a=this.text2.getBBox(),l=Math.min(n/a.width,s/a.height),this.text2.attr({transform:"S"+l+","+l+","+(a.x+a.width/2)+","+a.y})},i.prototype.drawEmptyDonutLabel=function(t,i,e,s,o){var n;return n=this.raphael.text(t,i,"").attr("font-size",s).attr("fill",e),null!=o&&n.attr("font-weight",o),n},i.prototype.resizeHandler=function(){return this.timeoutId=null,this.raphael.setSize(this.el.width(),this.el.height()),this.redraw()},i}(L.EventEmitter),L.DonutSegment=function(t){function i(t,i,e,s,o,n,r,h,a,l){this.cx=t,this.cy=i,this.inner=e,this.outer=s,this.color=r,this.backgroundColor=h,this.index=a,this.raphael=l,this.deselect=p(this.deselect,this),this.select=p(this.select,this),this.sin_p0=Math.sin(o),this.cos_p0=Math.cos(o),this.sin_p1=Math.sin(n),this.cos_p1=Math.cos(n),this.is_long=n-o>Math.PI?1:0,this.path=this.calcSegment(this.inner+3,this.inner+this.outer-5),this.selectedPath=this.calcSegment(this.inner+3,this.inner+this.outer),this.hilight=this.calcArc(this.inner)}return n(i,t),i.prototype.calcArcPoints=function(t){return[this.cx+t*this.sin_p0,this.cy+t*this.cos_p0,this.cx+t*this.sin_p1,this.cy+t*this.cos_p1]},i.prototype.calcSegment=function(t,i){var e,s,o,n,r,h,a,l,p,u;return e=(p=this.calcArcPoints(t))[0],o=p[1],s=p[2],n=p[3],r=(u=this.calcArcPoints(i))[0],a=u[1],h=u[2],l=u[3],"M"+e+","+o+"A"+t+","+t+",0,"+this.is_long+",0,"+s+","+n+"L"+h+","+l+"A"+i+","+i+",0,"+this.is_long+",1,"+r+","+a+"Z"},i.prototype.calcArc=function(t){var i,e,s,o,n;return i=(n=this.calcArcPoints(t))[0],s=n[1],e=n[2],o=n[3],"M"+i+","+s+"A"+t+","+t+",0,"+this.is_long+",0,"+e+","+o},i.prototype.render=function(){var t=this;return this.arc=this.drawDonutArc(this.hilight,this.color),this.seg=this.drawDonutSegment(this.path,this.color,this.backgroundColor,function(){return t.fire("hover",t.index)},function(){return t.fire("click",t.index)})},i.prototype.drawDonutArc=function(t,i){return this.raphael.path(t).attr({stroke:i,"stroke-width":2,opacity:0})},i.prototype.drawDonutSegment=function(t,i,e,s,o){return this.raphael.path(t).attr({fill:i,stroke:e,"stroke-width":3}).hover(s).click(o)},i.prototype.select=function(){if(!this.selected)return this.seg.animate({path:this.selectedPath},150,"<>"),this.arc.animate({opacity:1},150,"<>"),this.selected=!0},i.prototype.deselect=function(){if(this.selected)return this.seg.animate({path:this.path},150,"<>"),this.arc.animate({opacity:0},150,"<>"),this.selected=!1},i}(L.EventEmitter)}).call(this);