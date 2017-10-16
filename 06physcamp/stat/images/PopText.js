
tPopWait=50;  //停留tWait (ms)后顯示提示
tPopShow=5000;//顯示tShow (ms)后關閉提示

showPopStep=20;
popOpacity=99;

sPop=null;
curShow=null;
tFadeOut=null;
tFadeIn=null;
tFadeWaiting=null;

document.write("<style type='text/css' id='defaultPopStyle'>");
document.write(".cPopText {  background-color: #FFFF99; color:#000000; border: 1px #000000 solid; font-size: 12px; padding: 2px 4px 2px 4px; height: 20px; filter: Alpha(Opacity=0)}");
document.write("</style>");
document.write("<div id='dypopLayer' style='position:absolute;z-index:1000;' class='cPopText'></div>");


function showPopupText(){
    var o=event.srcElement;
    MouseX=event.x;
    MouseY=event.y;
    if(o.alt!=null && o.alt!="") {o.dypop=o.alt;o.alt=""};
    if(o.title!=null && o.title!="") {o.dypop=o.title;o.title=""};

    if(o.dypop!=sPop) {
        sPop=o.dypop;
        clearTimeout(curShow);
        clearTimeout(tFadeOut);
        clearTimeout(tFadeIn);
        clearTimeout(tFadeWaiting);
        if(sPop==null || sPop=="") {
            dypopLayer.innerHTML="";
            dypopLayer.style.filter="Alpha()";
            dypopLayer.filters.Alpha.opacity=0;
        } else {
            if(o.dyclass!=null) popStyle=o.dyclass;
            else popStyle="cPopText";
            curShow=setTimeout("showIt()",tPopWait);
        }
    }
}

function showIt(){
    dypopLayer.className=popStyle;
    dypopLayer.innerHTML=sPop;
    popWidth=dypopLayer.clientWidth;
    popHeight=dypopLayer.clientHeight;

    if(MouseX+12+popWidth>document.body.clientWidth) popLeftAdjust=-popWidth-24
    else popLeftAdjust=0;

    if(MouseY+12+popHeight>document.body.clientHeight) popTopAdjust=-popHeight-24
    else popTopAdjust=0;

    dypopLayer.style.left=MouseX+12+document.body.scrollLeft+popLeftAdjust;
    dypopLayer.style.top=MouseY+12+document.body.scrollTop+popTopAdjust;
    dypopLayer.style.filter="Alpha(Opacity=0)";

    moveElement("SELECT");
    moveElement("OBJECT");
    moveElement("EMBED");

    fadeOut();
}

function fadeOut(){
    if(dypopLayer.filters.Alpha.opacity<popOpacity) {
        dypopLayer.filters.Alpha.opacity+=showPopStep;
        tFadeOut=setTimeout("fadeOut()",1);
    } else {
        dypopLayer.filters.Alpha.opacity=popOpacity;
        tFadeWaiting=setTimeout("fadeIn()",tPopShow);
    }
}

function fadeIn(){
    if(dypopLayer.filters.Alpha.opacity>0) {
        dypopLayer.filters.Alpha.opacity -= 1;
        tFadeIn=setTimeout("fadeIn()",1);
    }
}

function moveElement(tagName) {
    document.fo_muLeft = dypopLayer.offsetLeft;
    document.fo_muRight = document.fo_muLeft + dypopLayer.offsetWidth;
    document.fo_muTop = dypopLayer.offsetTop;
    document.fo_muBottom = document.fo_muTop + dypopLayer.offsetHeight;
    var els = document.all.tags(tagName);
    var i;
    for (i=0; i < els.length; i++)
    {
        var el = els.item(i);
        if (tags_overlap_h(el) && tags_overlap_v(el))
        {
            if(tags_overlap_h(el)) dypopLayer.style.pixelLeft -= 10;
            if(tags_overlap_v(el)) dypopLayer.style.pixelTop  -= 2;
            setTimeout("moveElement('"+ tagName +"')",1);
        }
    }
}

//horizontal
function tags_overlap_h(el)
{
    var left = 0;
    var width = el.offsetWidth;
    while (el)
    {
        left += el.offsetLeft;
        el = el.offsetParent;
    }
    return ((left < document.fo_muRight) && (left + width > document.fo_muLeft));
}

//vertical
function tags_overlap_v(el)
{
    var top = 0;
    var height = el.offsetHeight;
    while (el)
    {
        top += el.offsetTop;
        el = el.offsetParent;
    }
    return ((top < document.fo_muBottom) && (top + height > document.fo_muTop));
}

document.onmouseover=showPopupText;