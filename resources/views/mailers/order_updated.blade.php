<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Hola {{ $order->email }}</h1>
	<p>Nueva Información de tu pedido</p>
	<table class=''>
		<thead>
			<tr>
				<th>información</th>
				<th>estado</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>N° Guia</td>
				<td>{{ $order->guide_number }}</td>
			</tr>	
			<tr>
				<td>Estado</td>
				<td>{{ $order->status }}</td>
			</tr>	
			<tr>
				<td>Dirección</td>
				<td>{{ $order->address() }}</td>
			</tr>
			<tr>
				<td>Nombre recepción</td>
				<td>{{ $order->recipient_name }}</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
