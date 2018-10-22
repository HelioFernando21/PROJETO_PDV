/*
 * ---------------------------
 * functions for the examples
 * ---------------------------
 */
function mycallbackfunc(v,m){
	$.prompt('i clicked ' + v);
}

function mycallbackform(v,m){
	$.prompt(v +' ' + m.children('#alertName').val());
}

function mysubmitfunc(v,m){
	an = m.children('#alertName');
	if(an.val() == ""){
		an.css("border","solid #ff0000 1px");
		return false;
	}
	return true;
}

jQuery.fn.extend({
	myanimation: function(speed){
		var t = $(this);
		if(t.css("display") == "none") 
			t.show(speed,function(){ t.hide(speed,function(){ t.show(speed); }); });
		else t.hide(speed,function(){ t.show(speed,function(){ t.hide(speed); }); });
	}
});

var txt = 'Entre com seu nome:<br /><input type="text" id="alertName" name="myname" value="Seu nome aqui..." />';
var txt2 = 'Try submitting an empty field:<br /><input type="text" id="alertName" name="myname" value="" />';	

var brown_theme_text = '<h3>Example 13</h3><p>Save these settings?</p><img src="images/help.gif" alt="help" class="helpImg" />';

var statesdemo = {
	state0: {
		html:'test 1.<br />test 1..<br />test 1...',
		buttons: { Cancel: false, Next: true },
		focus: 1,
		submit:function(v,m){ 
			if(!v) return true;
			else $.ImpromptuGoToState('state1');//go forward
			return false; 
		}
	},
	state1: {
		html:'test 2',
		buttons: { Back: -1, Exit: 0 },
		focus: 1,
		submit:function(v,m){ 
			if(v==0) jQuery.ImpromptuClose()
			else if(v=-1) $.ImpromptuGoToState('state0');//go back
			return false; 
		}
	}
};
