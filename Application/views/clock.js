
            <script type="text/javascript">        	
var mins;
var secs;
var hours;
var x,y,z;
var x1,y1,z1;
function int(k)
{
	var i;
	for(i=0;i<k;i++)
	{}
	return i-1;
}
function cd(h1,m1,s1){
	
	hours= 1 * h(h1);
 	mins = 1 * m(m1); // change minutes here
 	secs = 0 + s(s1); // change seconds here (always add an additional second to your total)
 	redo();
}
function h(obj) {
 	for(var i = 0; i < obj.length; i++) {
  		if(obj.substring(i, i + 1) == ":")
  		break;
 	}
 	return(obj.substring(0, i));
}
function m(obj) {
 	for(var i = 0; i < obj.length; i++) {
  		if(obj.substring(i, i + 1) == ":")
  		break;
 	}
 	return(obj.substring(i+1,obj.length));
}
function s(obj) {
 	for(var i = 0; i < obj.length; i++) {
  		if(obj.substring(i, i + 1) == ":")
  		break;
 	}
 	return(obj.substring(i + 1, obj.length));
}
function dis(mins,secs,hours) {
 	var disp;
 	if(hours<=9)
 	{
 	 	disp="0";
 	}
 	else {disp="";}
 	disp+=hours+":";
 	if(mins <= 9) {
  		disp += "0";
 	} else {
  		disp += " ";
 	}
 	disp += mins + ":";
 	if(secs <= 9) {
  		disp += "0" + secs;
 	} else {
  		disp += secs;
 	}
 	return(disp);
}
function redo() {
 	secs--;
 	if(secs == -1) {
  		secs = 59;
  	mins--;
 	}
 	if(mins==-1)
 	{mins=59;
      hours--;
 	}
 	document.cd1.disp1.value =dis(mins,secs,hours); // setup additional displays here.
 	if((mins == 0) && (secs == 0)&&(hours==0)) {
  		window.alert("Time is up. Press OK to continue."); // change timeout message as required
  		// window.location = "yourpage.htm" // redirects to specified page once timer ends and ok button is pressed
 	} else {
 		cd = setTimeout("redo()",1000);
 	}
}
var kt1='<?php echo $kt1;?>';

function init() {
	x=(kt1/3600);x=int(x);x1=""+x;
	y=(kt1-x*3600)/60;y=int(y);y1=":"+y;
	z=kt1-x*3600-y*60;z1=":"+z;
  cd(x1,y1,z1);
}
window.onload = init;

</script>