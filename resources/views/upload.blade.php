@extends('layouts.layoutbaru')

@section('title')
 home
@endsection

@section('content')
	<div class="row">
		<div class="container">
 
			<h2 class="text-center my-5">Tutorial Laravel #30 : Membuat Upload File Dengan Laravel</h2>
			
			<div class="col-lg-8 mx-auto my-5">
 
				<form action="/coba/public/uploadfile" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
 
					<div class="form-group">
						<b>Nama</b><br/>
						<input type="text" name="nama">
					</div>
 
					<div class="form-group">
						<b>Pilih File</b>
						<input type="file" name="filename">
					</div>
 
					<input name="submit" type="submit" value="Upload" class="btn btn-primary">
				</form>
				
				 
			</div>
		</div>
	</div>
@endsection 

