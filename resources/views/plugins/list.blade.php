@if(empty($plugins))
    <h1>No hay módulos instalados</h1>
@else
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Autor</th>
                <th>Version</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plugins as $plugin)
                <tr>
                    <th scope="row">{{ $plugin->id }}</th>
                    <td>{{ $plugin->name }}</td>
                    <td>{{ $plugin->description }}</td>
                    <td>{{ $plugin->author }}</td>
                    <td>{{ $plugin->version }}</td>
                    <td>
                        <a href="{{ route('status', $plugin->id) }}">{{ $plugin->status ? 'Desactivar' : 'Activar' }}</a>
                        <a href="{{ route('delete', $plugin->id) }}">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endif

<a href="{{ route('insert') }}">Agregar nuevo plugin</a>