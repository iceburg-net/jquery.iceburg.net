// quick form validation (c) Brice Burgess <bhb@iceburg.net> 2006
// matched inputs with the following classes will be checked;
//   pvDate (date), pvNumber (number), pvEmpty (not blank)
var PommoValidate = {
	// input = form input selector
	// submit = form submit button selector
	// warn = alert errors/warnings (bool)
	// scope = DOM scope limiter of input/submit lookups
	ranInit: false,
	init: function(inputs, submit, warn, scope) {
		if (this.ranInit)
			return;
		this.ranInit = true;
		var warn = (typeof(warn) != 'undefined') ? warn : true;
		var scope = (typeof(scope) != 'undefined') ? scope : false;
		
		this.submit = (scope) ? $(submit, scope) : $(submit);
			if (this.submit.size() != 1) {
				this.submit = false;
				if(warn) alert('Submit selector did not return 1 DOM element');
			}
		this.inputs = (scope) ? $(inputs, scope) : $(inputs);
			if (this.inputs.size() < 1) {
				this.inputs = false;
				if(warn) alert('Input selector did not return any DOM elements');
			}
			else {
				// assign events
				this.inputs.mouseup(function() { PommoValidate.validate(this); });
				this.inputs.keyup(function() { PommoValidate.validate(this); });
			}
		this.disabled = false;
		this.validate();
	},
	validate: function(e) {
		if (!this.inputs)
			return;
		
		var e = (typeof(e) != 'undefined') ? $(e) : this.inputs;
		e.each(function(){
			var r = new Array();
			if ($(this).is('.pvNumber')) r.push('number');
			if ($(this).is('.pvDate')) r.push('date');
			if ($(this).is('.pvEmpty')) r.push('empty');
			if ($(this).is('.pvEmail')) r.push('email');
			
			var valid = true;
			value = $(this).val();
			value.replace(/^\s*|\s*$/g,""); // trims value

			for (var i = 0; i < r.length; i++) {
				if (r[i] == 'empty' || value == '') {
					if (value == '' && r[i] == 'empty') 
						valid = false;
					continue;
				}
				if (!PommoValidate.checkInput(value, r[i]))
					valid = false;	
			}
			
			(valid) ?
				$(this).removeClass('pvInvalid') :
				$(this).addClass('pvInvalid');
		});
		
		(this.inputs.is('.pvInvalid')) ?
			this.disable() :
			this.enable();
		
	},
	checkInput: function(value, rule) {
		switch(rule) {
			case 'number' :
				var regex = /^\d+$/;
				return (regex.test(value));
				break;
			case 'date' :
				var regex = /^\d\d?\/\d\d?\/\d{4}$/;
				return (regex.test(value));
				break;
			case 'email' :
				var regex = /^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/;
				return (regex.test(value));
				break;
		}
	},
	disable: function() {
		if (!this.submit || this.disabled == true)
			return;
		this.disabled = true;	
		this.submit.attr('disabled', true).css('opacity',0.5);
	},
	enable: function() {
		if (!this.submit || this.disabled == false)
			return;
		this.disabled = false;
		this.submit.attr('disabled', false).css('opacity',1);
	},
	reset: function() {
		this.submit = false;
		this.inputs = false;
		this.warn = false;
		this.ranInit = false;
		this.disabled = false;
	}
};