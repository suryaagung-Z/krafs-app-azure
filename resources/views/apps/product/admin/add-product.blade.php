@extends('layouts.simple.master')
@section('title', 'Add Product')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/simple-mde.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Add Product</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Ecommerce</li>
<li class="breadcrumb-item active">Add Product</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Add Product</h5>
				</div>
				<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
					class="row needs-validation" novalidate>
					@csrf
					<div class="card-body add-post row">
						<div class="col-12 col-sm-7">
							<div class="mb-3">
								<label for="name">Name:</label>
								<input class="form-control" id="name" type="text" placeholder="Product Name" name="name"
									required>
								<div class="invalid-feedback text-danger">
									Please provide a valid name.
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-5">
							<div class="mb-3">
								<label for="category">Category:</label>
								<select class="form-select" name="category" id="category">
									<option disabled selected>--Select--</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
								<div class="invalid-feedback text-danger">
									Please provide a valid category.
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-5">
							<div class="mb-3">
								<label for="price">Price (Rp):</label>
								<input class="form-control" id="price" type="number" placeholder="Price" name="price"
									required>
								<div class="invalid-feedback text-danger">
									Please provide a valid price.
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-3">
							<div class="mb-3">
								<label for="stock">Stock:</label>
								<input class="form-control" id="stock" type="number" placeholder="Stock" name="stock"
									required>
								<div class="invalid-feedback text-danger">
									Please provide a valid stock.
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-4">
							<div class="mb-3">
								<label for="weight">Weight (Kg):</label>
								<input class="form-control" id="weight" type="number" placeholder="Weight" name="weight"
									required>
								<div class="invalid-feedback text-danger">
									Please provide a valid weight.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="mb-3">
								<label>Description:</label>
								<div class="row">
									<div class="col-md-6">
										<textarea class="CodeMirror" id="smde" name="description"></textarea>
									</div>
									<div class="col-md-6 reader" id="write_here"></div>
								</div>
								<div class="invalid-feedback text-danger">
									Please provide a valid description.
								</div>
							</div>
						</div>
						<div class="col-8">
							<div class="mb-3">
								<label>Photos:</label>
								<input class="form-control" type="file" id="formFileMultiple" name="images[]" multiple>
								<div class="invalid-feedback text-danger">
									Please provide a valid photos.
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-end">
						<div class="btn-showcase text-end">
							<button class="btn btn-primary" type="submit">Save</button>
							<input class="btn btn-light" type="reset" value="Discard">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/editor/simple-mde/simplemde.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script>
	(function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<script>
	(function(){
		document.getElementById('formFileMultiple').addEventListener('change', function (event) {
			const input = event.target;
			const files = input.files;

			for (var i = 0; i < files.length; i++) {
				const file = files[i];

				if (file.size > 2 * 1024 * 1024) {
					alert('File "' + file.name + '" melebihi ukuran maksimal 2 MB.');
					input.value = '';
					return;
				}
			}
		});
	})();
</script>

<script>
	(function(){
		const sample = [
			"### Instructions",
			"Enter text in the area on the left. For more info, click the ? (help) icon in the menu.",
		];
		const simplemde = new SimpleMDE({
			element: $("#smde")[0],
			toolbar: [
				"bold",
				"italic",
				"heading",
				"|",
				"quote",
				"unordered-list",
				"ordered-list",
				"|",
				"link",
				"image",
				"|",
				"guide",
			],
		});
		$(document).ready(function () {
			writeSample();
			simplemde.codemirror.on("change", function () {
				const renderedHTML = simplemde.options.previewRender(simplemde.value());
				$("#write_here").html(renderedHTML);
				$("#write_here").css("height", $(".row").height() + "px");

				$('textarea#smde').val(simplemde.value());
			});
		});
		function writeSample() {
			let s = "";
			s = getSample();
			simplemde.value(s);
			const renderedHTML = simplemde.options.previewRender(simplemde.value());
			$("#write_here").html(renderedHTML);
			$("#write_here").css("height", $(".row").height() + "px");
		}
		function getSample() {
			let s = "";
			$.each(sample, function (index, value) {
				//alert( index + ": " + value );
				s = s + value + "\n\r";
			});
			return s;
		}
	})();
</script>
@endsection