<table>
    <thead>
        <tr>
            <th>id</th>
            <th>producto</th>
            <th>venta total euros</th>
            <th>vendedor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
            <tr>
                <th scope="row">{{ $venta->id }}</th>

                <td>{{$venta->product}}</td>
                <td>{{$venta->price_total}}</td>
                <td>{{$venta->salesman}}</td>
                <td><a href="{{ route('convert', $venta->id) }}">calcular monto a soles</a></td>
            </tr>
        @endforeach
    </tbody>
</table>