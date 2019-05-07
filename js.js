//golable values for checking validations and dataform
var userCheck = false;
var affiliationChecker = false;
var commentChecker = false;
var carChecker = false;
var colorChecker = false;
var formdata = {};
var tryCount = 0;
var tryLimit = 3;
$(document).ready(function () {
    // user value validation
	$("#user").change(function(){
		if($("#user").val().length < 3){
			$("#userError").css("display","block");
			userCheck = false;
		}
		else{
			$("#userError").css("display","none");
			userCheck = true;
		}
    });
    // affiliation **
	$("#affiliation").change(function(){
		if($("#affiliation").val().length < 1){
			$("#affiliationError").css("display","block");
			affiliationChecker = false;

		}
		else{
			$("#affiliationError").css("display","none");
			affiliationChecker = true;
		}
    });
    // comments **
	$("#comment").change(function(){
		var comment = $("#comment").val();
		var temp = comment.substring(comment.indexOf(" ") + 1,comment.length);
		if(comment.length < 1 || comment.indexOf("<") != -1 || temp.indexOf(" ") == -1){
			$("#commentError").css("display","block");
			commentChecker = false;

		}
		else{
			$("#commentError").css("display","none");
			commentChecker = true;

		}
    });
    // car **
	$("#car").change(function(){
		if($("#car").val().length < 1){
			$("#carError").css("display","block");
			carChecker = false;

		}
		else{
			$("#carError").css("display","none");
			carChecker = true;
		}
    });
    // color **
	$("#color").change(function(){
		if($("#color").val().length < 1){
			$("#ColorError").css("display","block");
			colorChecker = false;

		}
		else{
			$("#ColorError").css("display","none");
			colorChecker = true;
		}
	});
    // this function will make ajax call when submition if all values are valid
    $("#form").on("submit", function (a) {
        //read data and store them in formdata
		a.preventDefault();
		formdata.user = $("#user").val();
		formdata.affiliation = $("#affiliation").val();
		formdata.comment = $("#comment").val();
		formdata.car = $("#car").val();
		formdata.color = $("#color").val();

        //
		console.log(JSON.stringify(formdata));
		if(userCheck && affiliationChecker && commentChecker && carChecker && colorChecker){
			$.ajax({
				type: 'POST',
				url: 'http://ceclnx01.cec.miamioh.edu/~campbest/cse383/forms1/form-ajax.php',
				contentType : 'application/json',
				data: JSON.stringify(formdata),	
				success: function(text) {
					$.each(text.data, function(i, a){
						var d = '<tr>';
                        d += '<td><b>User<\/td><td>' + a.user + '<\/td>';
                        d += '<\/tr><tr>';
                        d += '<td><b>Affilation<\/td><td>' + a.affilation + '<\/td>';
                        d += '<\/tr><tr>';
                        d += '<td><b>Comments<\/td><td>' + a.comment + '<\/td>';
                        d += '<\/tr><tr>';
                        d += '<td><b>Car<\/td><td>' + a.car + '<\/td>';
                        d += '<\/tr><tr>';
                        d += '<td><b>Color<\/td><td>' + a.color + '<\/td>';
                        d += '<\/tr><tr>';
                        d += '<td><b>Timestamp<\/td><td>' + a.timestamp + '<\/td>';
                        d += '<\/tr>';
                        $("#tableBody").append(d);
                        return false;
					});
					$("#formDiv").css("display","none");
					$("#tableDiv").css("display","block");

				},
				error: function( xhr ) {
					alert( "The server has thrown an error. Please check console log for details!" );
					console.log( "Error: " + xhr.statusText );
					console.log( "Status: " + xhr.status );
					if(tryCount < tryLimit){
						$.ajax(this);
						tryCount++;
					}

				}
			});
		}else{
			return false;
		}
	});
    // this function make the table invisible when return button clicked
	$("#button2").on("click",function(){
		$("#tableBody").empty();
		$("#formDiv").css("display","block");
        $("#tableDiv").css("display", "none");
        $("#user").val(formdata.user);
        $("#affiliation").val(formdata.affiliation);
        $("#comment").val(formdata.comment);
        $("#car").val(formdata.car);
        $("#color").val(formdata.color);
		userCheck = true;
		affiliationChecker = true;
		commentChecker = true;
		carChecker = true;
		colorChecker = true;
    });
    // this function display the validation of input values
	$("#button1").on("click",function(){	
		if(!userCheck){
			$("#userError").css("display","block");
		}
		if(!affiliationChecker){
			$("#affiliationError").css("display","block");
		}
		if(!commentChecker){
			$("#commentError").css("display","block");
		}
		if(!carChecker){
			$("#carError").css("display","block");
		}
		if(!colorChecker){
			$("#ColorError").css("display","block");
		}
	});


});