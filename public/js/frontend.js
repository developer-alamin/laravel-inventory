toastr.options = {
    "positionClass": "toast-bottom-center"
}

toastr.options.extendedTimeOut = 1500; //1000;
toastr.options.timeOut = 1500;
toastr.options.fadeOut = 250;
toastr.options.fadeIn = 250;

function removeClass(ele,action){
	document.querySelector(ele).classList.remove(action);
}
function addClass(ele,action){
	document.querySelector(ele).classList.add(action);
}



var progress = document.querySelector(".ProgressContent");
var fullScreen = document.querySelector(".fullScreenDiv");


function signInFunc(){
	var signForm = document.querySelector("#signFormId");
	var email = document.querySelector(".email");
	var password = document.querySelector(".password");
	signForm.addEventListener("submit",function(e){
		e.preventDefault();
		if(email.value == "") {
			toastr.error("Please Email");
		}else if(password.value == ""){
			toastr.error("Please Password");
		}else{

			removeClass(".ProgressContent","d-none");
			removeClass(".fullScreenDiv","d-none");
			
			var url = "/loginPost";
			var data = new FormData(signForm);
			$.ajax({
				type: "POST",
	            url: url,
	            data: data,
	            cache: false,
	            contentType: false,
	            processData: false,
	            success:function(response){
	            	addClass(".ProgressContent","d-none");
					addClass(".fullScreenDiv","d-none");
					signForm.reset();
	            	if (response.error) {
	            		toastr.error(response.error);
	            	}else if(response.passerror){
	            		toastr.error(response.passerror);
	            	}else{
	            		toastr.success(response.data)
	            		window.location.replace("/admin");
	            	}
	            },
	            error:function(error){
	            	addClass(".ProgressContent","d-none");
					addClass(".fullScreenDiv","d-none");
	            }
			})
		}
	})
}