	$('document').ready(function(){
		//SAKUHIN
		$('.showUpdateModalSakuhin').on('click',function(){

			$('#formModalLabel').html('データ編集');
			$('.modal-footer button[type=submit]').html('データ編集');
			const id = $(this).data('code');
			

			$.ajax({
				url:'http://localhost:8080/ichiran/public/sakuhin/getUpdate',
				data:{id:id},
				method:'post',
				dataType:"json",
				success: function(data){
					console.log(data);
					$('#code').val(data.code);
					$('#old_name').val(data.file_name);
					$('#seishakushaText').val(data.username);
					$('#sakuhinmei').val(data.sakuhinmei);
					$('#conceptText').val(data.concept);
					$('#genre').val(data.genre);
					$('.modal-body form').attr('action','http://localhost:8080/ichiran/public/sakuhin/updateData/'+data.username);
					
					
					
				},
				error : function(e){
					console.log(e.messege);

				}
				
			});

		});
		//SAKUHIN
		$('#addDataSakuhin').on('click',function(){
			const sakusha = $(this).data('id');
			$('#formModalLabel').html('データ追加');
			$('.modal-footer button[type=submit]').html('データ追加');
			$('#code').val('');
			$('#old_name').val('');
			$('#sakuhinmei').val('');
			$('#conceptText').val('');
			$('#genre').val('');
			$('.modal-body form').attr('action','http://localhost:8080/ichiran/public/sakuhin/addData/'+sakusha);
		});


		//管理者　DASHBOARD SAKUHIN
		$('._showUpdateModalSakuhin').on('click',function(){

			$('.modal-body form').attr('action','http://localhost:8080/ichiran/public/dashboard/updateDataSakuhinDashboard');
			$('#formModalLabel').html('データ編集');
			$('.modal-footer button[type=submit]').html('データ編集');
			const id = $(this).data('code');
			

			$.ajax({
				url:'http://localhost:8080/ichiran/public/dashboard/getUpdateDashboard',
				data:{id:id},
				method:'post',
				dataType:"json",
				success: function(data){
					console.log(data);
					$('#code').val(data.code);
					$('#old_name').val(data.file_name);
					$('#seishakushaText').val(data.username);
					$('#sakuhinmei').val(data.sakuhinmei);
					$('#conceptText').val(data.concept);
					$('#genre').val(data.genre);
					
				},
				error : function(e){
					console.log(e.messege);

				}
				
			});

		});

		//管理者　DASHBOARD SAKUHIN
		$('#_addDataSakuhin').on('click',function(){
			$('#formModalLabel').html('データ追加');
			$('.modal-footer button[type=submit]').html('データ追加');
			$('#code').val('');
			$('#old_name').val('');
			$('#sakuhinmei').val('');
			$('#conceptText').val('');
			$('#genre').val('');
			$('.modal-body form').attr('action','http://localhost:8080/ichiran/public/dashboard/addDataSakuhinDashboard/');
		});





		//管理者　DASHBOARD USER
		$('._showUpdateModalUser').on('click',function(){

			$('.modal-body form').attr('action','http://localhost:8080/ichiran/public/dashboard/updateDataUserDashboard');
			$('#formModalLabel').html('データ編集');
			$('.modal-footer button[type=submit]').html('データ編集');
			const id = $(this).data('code');
			

			$.ajax({
				url:'http://localhost:8080/ichiran/public/dashboard/getUpdateUserDashboard',
				data:{id:id},
				method:'post',
				dataType:"json",
				success: function(data){
					console.log(data);
					$('#username').val(data.username);
					$('#level').val(data.level);
					$('#password').val(data.password);
					$('#email').val(data.email);
				},
				error : function(e){
					console.log(e.messege);

				}
				
			});

		});

		//管理者　DASHBOARD USER
		$('#_addDataUser').on('click',function(){
			$('#formModalLabel').html('データ追加');
			$('.modal-footer button[type=submit]').html('データ追加');
			$('#username').val('');
			$('#level').val('');
			$('#password').val('');
			$('#email').val('');
			$('.modal-body form').attr('action','http://localhost:8080/ichiran/public/dashboard/addDataUsersDashboard/');
		});


		//パスワード変更
		$('.showEditPwd').on('click',function(){
			const id = $(this).data('code');
			$('#formModalLabel').html('パスワード変更');
			$('.modal-footer button[type=submit]').html('パスワード変更');
			$('.modal-body form').attr('action','http://localhost:8080/ichiran/public/user/editPwd/'+id);

			$(".form-group").empty();
			$(".form-group").append("<input type='hidden' name='username' id='username' class='form-control' required value=''>");
			$(".form-group").append("<input type='hidden' name='old_pwd' id='old_pwd' class='form-control' required value=''>");
			$(".form-group").append("<label>旧パスワード：</label>");
			$(".form-group").append("<input type='password' name='old_pwd_conf' id='old_pwd_conf' class='form-control' required value='' placeholder='旧パスワード'>");
			$(".form-group").append("<label>新パスワード：</label>");
			$(".form-group").append("<input type='password' name='new_pwd' id='new_pwd' class='form-control' required value='' placeholder='新パスワード'>");
			$(".form-group").append("<label>新パスワード確認：</label>");
			$(".form-group").append("<input type='password' name='new_pwd_conf' id='new_pwd_conf' class='form-control' required value='' placeholder='新パスワード確認'>");		
			
			

			$.ajax({
				url:'http://localhost:8080/ichiran/public/user/loadOldPwd',
				data:{id:id},
				method:'post',
				dataType:"json",
				success: function(data){
					console.log(data);
					$('#username').val(data.username);
					$('#old_pwd').val(data.password);
				},
				error : function(e){
					console.log(e.messege);

				}
				
			});

		});

		$('.editData').on('click',function(){
			const id = $(this).data('code');
			const email = $(this).data('email');
			$('#formModalLabel').html('データ編集');
			$('.modal-footer button[type=submit]').html('データ編集');
			$('.modal-body form').attr('action','http://localhost:8080/ichiran/public/user/editData'+id);
			
			$(".form-group").empty();
			$(".form-group").append("<input type='hidden' class='form-control' id='username' name='username' value='"+id+"' required>");
			$(".form-group").append("<input type='email' class='form-control' id='email' name='email' value='"+ email +"' placeholder='email' required>");
		});


		$('body').on('load',function(){

		});

		

		//function loadDataSakuhin() {
	    //    $.ajax({ 
	    //       url: 'http://localhost:8080/ichiran/public/',
	    //        dataType: "json",            
	    //        success: function (data) {
	    //            $.each(data,function(key,value)){
	    //           	$('.column').append("<img src='http://localhost:8080/ichiran/public/img"+ value.file_name +"' class='img-fluid img-thumbnail' style='padding-top: 5px;'  alt='...'>");
	    //           }
	    //           setTimeout(load, 5000)
	    //       }
	    //   });
    	//}
    	//loadDataSakuhin();


});
 

