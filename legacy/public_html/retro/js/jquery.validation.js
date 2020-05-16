$(function() {
		
	$.widget( "custom.validation", {
	  /*
		type : 
			text	  
			email
			date
			number
			date-future
	  */
      options: {
        type: "text",
		colorDefault: '#ddd',
		colorError: '#ff0000',
		colorValid: '#00ff00'
      },
 
      // the constructor
      _create: function() {		       
		this._on({
			blur : function (e) { this.validateField(); },
			change : function (e) { this.validateField(); }
		}); 
        this._refresh();
      },
	
	validateField: function ( event ) {
		if(this.isValid()) {
			this.element.css('border-color', this.options.colorDefault);
			return true;
		} else {
			this.element.css('border-color', this.options.colorError);
			return false;
		}	
	},	  
	isValid: function( event ) {	
		var elementValue = $.trim(this.element.val());			
		
		if (this.options.type=='text') {
			return isValidText( elementValue );
		} else if (this.options.type=='email') {
			return isValidEmail( elementValue );
		} else if(this.options.type=='date') {
			return isValidDate( elementValue );
		} else if(this.options.type=='number') {
			return isValidNumber( elementValue);
		} else {
			return true;
		}		
	},
 
      // called when created, and later when changing options
      _refresh: function() {
		//this.element.css('color', this.options.colorDefault);
		
        // trigger a callback/event
        this._trigger( "validate" );
      },
 
      // events bound via _on are removed automatically
      // revert other modifications here
      _destroy: function() {
        // remove generated elements
        
        /*this.element
          .removeClass( "custom-colorize" )
          .css( "background-color", "transparent" );
		  */
      },
 
      // _setOptions is called with a hash of all options that are changing
      // always refresh when changing options
      _setOptions: function() {
        // _super and _superApply handle keeping the right this-context
        this._superApply( arguments );
        this._refresh();
      },
 
      // _setOption is called for each individual option that is changing
      _setOption: function( key, value ) {        	
        this._super( key, value );
      }
    }); 
	
	function isValidText (value) {
		return (value.length > 0);
	}
	
	function isValidEmail( value ) {
		var emailRegEx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return emailRegEx.test(value);
	}
	
	function isValidDate( value ) {		
		var comp = value.split('/');
		var d = parseInt(comp[0], 10);
		var m = parseInt(comp[1], 10);		
		var y = parseInt(comp[2], 10);
		var date = new Date(y, m-1, d);
		if (date.getFullYear() == y && date.getMonth() + 1 == m && date.getDate() == d) {
			return true;
		} else {
			return false;
		}
	}
	
	function isValidNumber( value ) {
		return !isNaN(value);
	}	
});