@extends("backend.layout.app")
@section("title","Admin | Profile")
@section("content")
<div class="profileContent">
	<div class="row">
		<div class="col-10 m-auto">
			<div class="card">
				<div class="card-body">
					<h5>User Profile</h5>
					<hr>
					<div class="userInfo">
						<form id="userInfoForm">
							<input type="hidden" name="proUpId" value="{{ $cusData->id }}">
							<div class="row">
								<div class="col-4">
									<label>Name:</label>
									<input type="text" name="ProName" class="ProName form-control" value="{{ $cusData->name }}">
								</div>	
								<div class="col-4">
									<label>Email:</label>
									<input type="email" name="ProEmail" class="ProEmail form-control" value="{{ $cusData->email }}">
								</div>	
								<div class="col-4">
									<label>Phone:</label>
									<input type="number" name="ProPhone" class="ProPhone form-control" value="{{ $cusData->phone }}">
								</div>
								<div class="col-4 mt-2">
									<button type="submit" class="btn create ProUpBtn form-control">Update</button>
								</div>	
								
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
@endsection
@section("script")
<script type="text/javascript">
 ProfileUpdate();
 function ProfileUpdate(){
    var userInfoForm = document.querySelector("#userInfoForm");
    var ProUpBtn = document.querySelector(".ProUpBtn");
    userInfoForm.addEventListener("submit",function(e){
        e.preventDefault();

        ProUpBtn.innerHTML = loaderSpen;
        var url  = "{{ route('admin.profileUpdate') }}";
        var data = new FormData(userInfoForm)
        axios.post(url,data)
        .then(function(response){
            ProUpBtn.innerHTML = "Update";
            Swal.fire("Updated !","Profile Updated Success","success")
            setTimeout(()=>{
                 location.reload();
            },1000);
           
        })
        .catch(function(error){
            ProUpBtn.innerHTML = "Update";
            Swal.fire("Sorry !","Profile Updated Faild","error");
             setTimeout(()=>{
                 location.reload();
            },1000)
        })
    })
}
</script>
@endsection