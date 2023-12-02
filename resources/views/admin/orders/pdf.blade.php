

<h1>Order Details</h1>

Customer name: <h3>{{$order->user->name}}</h3>
Customer email: <h3>{{$order->user->email}}</h3>
Customer phone: <h3>{{$order->user->phone}}</h3>
Customer address: <h3>{{$order->user->address}}</h3>
Customer id: <h3>{{$order->user->id}}</h3>

Prodcut name: <h3>{{str_replace('-',' ',$order->product->title)}}</h3>
Prodcut price: <h3>{{$order->price}}</h3>
Prodcut quantity: <h3>{{$order->quantity}}</h3>
Payment status: <h3>{{$order->payment_status}}</h3>
Product id: <h3>{{$order->product_id}}</h3>

<br><br>

<img height="250" width="450" src="images/products/{{$order->image}}">
