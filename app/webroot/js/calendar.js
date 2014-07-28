var myApp = new Framework7();

var $$ = Framework7.$;

$$('.form-to-json').on('click', function(){
		var formData = myApp.formToJSON('#create_memo');
		alert(JSON.stringify(formData));
});
