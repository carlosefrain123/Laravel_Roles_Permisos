<div class="card">
    <div class="card-header">
        <input wire:model.live="search" class="form-control" placeholder="Ingresa el nombre del post">
    </div>
    @if ($posts->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td width="10px">
                                <a href="{{ route('admin.publications.edit', $post) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{-- {{ route('admin.tags.destroy', $post->id) }} --}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
</div>
