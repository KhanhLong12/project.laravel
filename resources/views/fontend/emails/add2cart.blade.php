<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<h1 style="color: red">Chúc mừng {{ $name }}, bạn đã đặt hàng thành công</h1>
	<h2>Mã đơn hàng {{ $bill->code }}</h2>
	<h2>Đơn hàng có giá {{ $total }} VNĐ</h2>
	<table>
		<thead>
			<th>Tên sản phẩm</th>
			<th>Giá sản phẩm</th>
			<th>Số lượng</th>
		</thead>
		@foreach($carts as $cart)
		<tr>
			<td>{{ $cart->name }}</td>
			<td>{{number_format($cart->price) }}VNĐ</td>
			<td>{{ $cart->qty }}</td>
		</tr>
		@endforeach
	</table>
</body>
</html>