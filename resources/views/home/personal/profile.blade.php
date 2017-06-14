@extends('home/default')
@section('content')
<center>
<div class="profile comWidth">
	<script src="{{ asset('/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('/org/uploadify/uploadify.css')}}">
	<img src="<?php echo $user->face?asset('/uploads/'.$user->face) :asset('/uploads/default.jpg') ?>" id="faceImg"><br>

	<input id="file_upload" name="file_upload" type="file" multiple="true">

	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'_token'     : '{{ csrf_token() }}'
				},
				'buttonText' : '上传照片',
				'swf'      : "{{ asset('/org/uploadify/uploadify.swf')}}",
				'uploader' : "{{ url('/personal/upform')}}",
				'onUploadSuccess' : function(file, data, response) {
           			$('#faceImg').attr('src','http://localhost:8000/uploads/'+data);
           			$('#faceImg2').attr('src','http://localhost:8000/uploads/'+data);        		}
		});


            // bind 'myForm' and provide a simple callback function
            var options = {
			    success:    function(data) {
			        alert(data);
			    }
			};
            $('#myForm').ajaxForm(options);

		});
	</script>
	<!-- <form  enctype="multipart/form-data" method="post" name="upform" action="{{ asset('/personal/upform') }}">  
	<br>>

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<label class="face" id="face">头像:</lable>
		<input name="face" type="file" style=" border:none;">
		<input type="submit" value="上传"><br /><br />

	</form> -->
	



	<form id="myForm" class="" action="{{ asset('/personal/updata')}}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<table>
			<tr>
				<td class="label"><label for="username">昵称:</label></td>
				<td class="text"><input type="text"  name="username" required="required" value="{{ $user->name }}"></td>
			</tr>
			<tr>
				<td class="label"><label for="set">性别:</label></td>
				<td class="text">
					<input type="radio"  name="sex" required="required" <?php echo $user->sex=='男'?'checked':null; ?> value="男">男
					<input type="radio"  name="sex" required="required" <?php echo $user->sex=='女'?'checked':null; ?> value="女">女
				</td>
			</tr>
			<tr>
				<td class="label"><label for="word">签名:</label></td>
				<td class="text"><input type="text"  name="word" value="{{ $user->word }}"></td>
			</tr>
			<tr>
				<td class="label"><label for="word">新密码:</label></td>
				<td class="text"><input type="password"  name="password"></td>
			</tr>
			<tr align="center">
				<td  colspan="2"><input type='submit' value="确定修改"></td>
			</tr>
		</table>
	</form>
</div>
</center>
@endsection