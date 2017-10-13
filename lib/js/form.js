let fname;
let lname;
let email;
let comment;

$('#comment-form').submit(function(e){
	fname = $('#fname').val();
	lname = $('#lname').val();
	email = $('#email').val();
	comment = $('#comment').val();

	if(fname == "" || lname == "" || email == "" || comment == ""){
		e.preventDefault();
		alert("Please fill in all fields");
	}
})