$("document").ready(function(){
	
	preload = '<div class="preload">'+
				'<span class="bar bar-1"></span>'+
				'<span class="bar bar-2"></span>'+
				'<span class="bar bar-3"></span>'+
			'</div>';
	
	$('header nav a[href^="#"], footer ul a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 500, 'swing', function () {
	        window.location.hash = target;
	    });
	});
	
	
	
	$('#contact form').ajaxForm({
		dataType : 'json',
		beforeSubmit : function(formData, form) {
			$msgs = $(form).find('.msgs');
			$msgs.html('').removeClass('error success');
			
			var  $email = $(form).find('#inputEmail');
			var  $name = $(form).find('#inputEmail');
			var  $msg = $(form).find('#textMsg');
			$msg.attr('rows', 6);

 			if ($email.val() == '') {
				$msgs.html('<div>O campo Email é obrigatório.</div>').addClass('error');
				$msg.attr('rows', 4);
				username.focus();
				return false;
			}
			if ($name.val() == '') {
				$msgs.html('<div>O campo Nome é obrigatório.</div>').addClass('error');
				$msg.attr('rows', 4);
				password.focus();
				return false;
			}
			if ($msg.val() == '') {
				$msgs.html('<div>Você deve digitar uma mensagem.</div>').addClass('error');
				$msg.attr('rows', 4);
				password.focus();
				return false;
			}
			$msgs.html(preload);
			$($msg).attr('rows', 4);
		},
		success : function(data, status, xhr, $form) {
			$msgs = $form.find('.msgs');
			$msgs.html('').removeClass('error success');
			
			if (data.result) {
				$msgs.html('<div class="success">' + data.msg + '</div>');
				$form.clearForm();
			} else {
				$msgs.html('<div class="error">' + data.msg + '</div>');
			}
		}
	}); 

	
	
	/*
	$(window).scroll(function () {
		if($(this).scrollTop() > 50){
			$('header #navigationBar').addClass('fixed');
			$('header #accessibilityBar').addClass('margined-bottom');
		}else{
			$('header #navigationBar').removeClass('fixed');
			$('header #accessibilityBar').removeClass('margined-bottom');
		}
	});
	*/
	
});