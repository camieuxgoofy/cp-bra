@include('controls/admins.outline.header')

<div class="container mt-3">
	<h1 class="tabel1"><strong>Data Produk</strong></h1>
	<hr>


	<a href="/add-properties" class="btn btn-primary mb-1"><i class="fas fa-plus"></i> Tambah</a>

	<table class="table table-bordered table-striped mt-3" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Properties Name</th>
				<th>Type</th>
				<th>Location</th>
				<th>Properties Image</th>
				<th>Properties Descroption</th>
				<th>Price</th>
				<th>No. Telp yang dapat di hubungi</th>
				<th>Created</th>
			</tr>
		</thead>

		<tbody>
			<?php $no = 1; ?>
			@foreach($properties as $property)
			<tr>
				<td><?php echo $no++; ?></td>
				<td>{{ $property->properties_name }}</td>
				<td>{{ $property->type }}</td>
				<td>{{ $property->location }}</td>
				<td>{{ $property->properties_image }}</td>
				<td>{{ $property->properties_description }}</td>
				<td>{{ $property->price }}</td>
				<td>{{ $property->notelp }}</td>
				<td><?php echo date('d-m-y | H:i:s', strtotime($property['created_at'])); ?></td>
				<td width=75% class="text-center">
					<a href="detail_produk.php?id=<?php echo $property['id'] ?>"><button class="btn btn-secondary"><i class="fas fa-eye"></i> Detail</button></a>
					<a href="/update-properties/{{ $property->id }}"> <button class="btn btn-warning"><i class="fas fa-edit"></i> Edit</button></a>
					<form action="{{ url('/properties', ['id' => $property->id]) }}" method="post">
						<input class="btn btn-danger" type="submit" value="Delete" />
						@method('delete')
						@csrf
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>


</div> <!-- container -->

@include('controls/admins.outline.footer')