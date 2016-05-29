var isInt = /^\+?\d+$/;
var isEmail = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
var isFloat = /^\-?([0-9]+(\.[0-9]+)?|Infinity)$/;

function RequiredValid(control,message){
	var text = $(control).val();
	if(text==""){
		$(message).html("<font color='red'>Required</font>");
		return 0;
	}else{
		$(message).html("");
		return 1;
	}
}


function LengthValid (control,length,message) {
	var text = $(control).val();
	if(text==""){
		$(message).html("<font color='red'>Minimum "+Length+" characters required</font>");
		return 0;
	}else{
		$(message).html("");
		return 1;
	}
}

function ExpressionValid (control,expression,message,messageValue) {
	var text = $(control).val();
	if(!expression.test(text)){
		$(message).html("<font color='red'>"+messageValue+"</font>");
		return 0;
	}else{
		$(message).html("");
		return 1;
	}
}