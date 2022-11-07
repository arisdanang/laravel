<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<title>Laravel</title>

		<!-- Fonts -->
		<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


		<!-- style -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	</head>
	<body class="antialiased">
		<div class="container pt-4">
			<div class="container" style="padding-top: 3.5rem">
			<div class="row">
				<div class="col">
					<div class="dropdown mt-3">
						<button
							class="btn btn-secondary dropdown-toggle"
							type="button"
							id="dropdownMenuButton"
							data-bs-toggle="dropdown"
							aria-haspopup="true"
							aria-expanded="false"
						>
							Dropdown button
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Action</a>
							<div class="dropdown dropend">
								<a
									class="dropdown-item dropdown-toggle"
									href="#"
									id="dropdown-layouts"
									data-bs-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
									>Layouts</a
								>
								<div class="dropdown-menu" aria-labelledby="dropdown-layouts">
									<label class="dropdown-item" for="file">Attach File</label>
									<input
										type="file"
										name=""
										class="custom-file-input"
										id="file"
										hidden
									/>
									<a class="dropdown-item" href="#">Compact Aside</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a href="#"></a>
			<form action="{{route('SAP.store')}}" method="post">
				@csrf
				<fieldset>
					<div class="mb-3 row">
						<div class="col-sm-6">
							<div class="row">
								<label for="invoiceDate" class="col-sm-2 col-form-label col-form-label-sm">Invoice Date</label>
								<div class="col-sm-4">
									<input type="text" name="invoiceDate" class="form-control form-control-sm" id="invoiceDate">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="row">
								<label for="reference" class="col-sm-2 col-form-label col-form-label-sm">Reference</label>
								<div class="col-sm-4">
									<input type="text" name="reference" class="form-control form-control-sm" id="reference">
								</div>
							</div>
						</div>
					</div>
					<div class="mb-3 row">
						<?php
							date_default_timezone_set("Asia/Jakarta");
							$date = date("d-M-Y");
						?>
						<label for="postingDate" class="col-sm-2 col-form-label col-form-label-sm" style="width:110px">Posting Date</label>
						<div class="col-sm-3">
							<input type="text" name="postingDate" class="form-control form-control-sm" id="postingDate" value="{{$date}}" readonly>
						</div>
					</div>
					<div class="mb-3 row">
						<div class="col-sm-6">
							<div class="row">
								<label for="amount" class="col-sm-2 col-form-label col-form-label-sm">Amount</label>
								<div class="col-sm-5">
									<input type="number" name="amount" class="form-control form-control-sm" id="amount">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="row">
								<label for="currency" class="col-sm-2 col-form-label col-form-label-sm">Currency</label>
								<div class="col-sm-5">
									<input type="text" name="currency" class="col-sm-2 form-control form-control-sm" id="currency" value="EUR">
								</div>
							</div>
						</div>
					</div>
					<div class="mb-3 row">
						<div class="col-sm-6">
							<div class="row">
								<label for="taxAmount" class="col-sm-2 col-form-label col-form-label-sm">Tax Amount</label>
								<div class="col-sm-5">
									<input type="number" name="taxAmount" class="form-control form-control-sm" id="taxAmount">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="row">
								<div class="row">
									<label for="taxVersion" class="col-sm-2 col-form-label col-form-label-sm" style="width: 100px">Tax Version</label>
									<div class="col-sm-5">
										<select class="form-select form-select-sm" name="taxVersion" aria-label=".form-select-sm example">
											<option hidden>Pilih Pajak</option>
											<option value="1">V1</option>
											<option value="2">V2</option>
											<option value="3">V3</option>
											<option value="4">V4</option>
											<option value="5">V5</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="text" class="col-sm-2 col-form-label col-form-label-sm" style="width:110px">Text</label>
						<div class="col-sm-3">
							<input type="text" name="text" class="form-control form-control-sm" id="text" >
						</div>
					</div>
					<div class="mb-3 row">
						<label for="paymentTerm" class="col-sm-2 col-form-label col-form-label-sm" style="width:110px">Payment Term</label>
						<div class="col-sm-3">
							<input type="text" name="paymentTerm" class="form-control form-control-sm" id="paymentTerm" readonly value="30 Days net">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="baselineDate" class="col-sm-2 col-form-label col-form-label-sm" style="width:110px">Baseline Date</label>
						<div class="col-sm-3">
							<input type="text" name="baselineDate" class="form-control form-control-sm" id="baselineDate" readonly value="14.05.2013">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="companyCode" class="col-sm-2 col-form-label col-form-label-sm" style="width:110px">Company Code</label>
						<div class="col-sm-3">
							<input type="text" name="companyCode" class="form-control form-control-sm" id="companyCode" readonly value="0001 SAP A.G Walldorf">
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</fieldset>
			</form>
		</div>
		<div class="container pt-3">
			<form action="" method="post">
				@csrf
				<div class="col-sm-2">
					<input type="text" class="form-control form-control-sm" name="keyword" id="keyword">
				</div>
			</form>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Amount</th>
							<th scope="col">Quantity</th>
							<th scope="col">Purchase Code</th>
							<th scope="col">Item</th>
							<th scope="col">PO Text</th>
							<th scope="col">Tax Code</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.js" integrity="sha512-yBpuflZmP5lwMzZ03hiCLzA94N0K2vgBtJgqQ2E1meJzmIBfjbb7k4Y23k2i2c/rIeSUGc7jojyIY5waK3ZxCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<script src="{{ asset('/js/bootstrap5-dropdown-ml-hack.js') }}"></script>
		<script>
			$('#keyword').on('keyup',function(){
				search();
			})

			search();

			function search(){
				var keyword = $('#keyword').val()

				console.log(keyword);
				$.post('{{ route("SAP.search") }}',{
					_token: $('meta[name="csrf-token"]').attr('content'),
					keyword: keyword
				},
				function(data){
					table_post_row(data);
					console.log(data)
				});
			}

			// table row with ajax
			function table_post_row(res){
				let htmlView = ''

				if(res.data.length <= 0){
					htmlView += `
						<tr>
							<td colspan="4">No. data</td>
						</tr>
					`
				}

				for(let i = 0; i < res.data.length; i++){
					htmlView += `
						<tr>
							<td>`+ (i+1) +`</td>
							<td>`+res.data[i].amount+`</td>
							<td>`+res.data[i].quantity+`</td>
							<td>`+res.data[i].purchaseNum+`</td>
							<td>`+res.data[i].item+`</td>
							<td>`+res.data[i].po_text+`</td>
							<td>`+res.data[i].tax_code+`</td>
						</tr>
					`
				}

				$('tbody').html(htmlView)
			}
		</script>
	</body>
</html>
