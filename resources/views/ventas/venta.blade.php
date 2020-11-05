<table>
    <thead>
        <tr>
            <th>id</th>
            <th>producto</th>
            <th>venta total euros</th>
            <th>vendedor</th>
            <th>Precio euro</th>
            <th>nuevo precio</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <th scope="row">{{ $venta->id }}</th>

                <td>{{$venta->product}}</td>
                <td>{{$venta->price_total}}</td>
                <td>{{$venta->salesman}}</td>
                <td>{{ $new_price/$venta->price_total }}</td>
                <td>{{ $new_price }}</td>
            </tr>
    </tbody>
</table>