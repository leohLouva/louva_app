<meta name="csrf-token" content="{{ csrf_token() }}">
@if ($count == 0)
<div class="document-preview">
    ESTE USAURIO NO TIENE DOCUMENTOS ALMACENADOS EN EL SISTEMA
</div>
@elseif ($count > 0)
    @foreach($documentos as $documento)
        <div class="document-preview">
            
            <h5>{{ strtoupper($documento->typeNme) }}
                @if ($documento->validated == 1)  
                    <i class="mdi mdi-check-decagram text-success"></i>  
                @endif
            </h5>
            <iframe src="{{ asset('storage/uploads/contractors/'.$documento->contractorName.'/'. $documento->path) }}" width="700" height="500"></iframe>
            <form action="{{ route('eliminarArchivo', $documento->idDocument) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="path" value="{{ $documento->path }}">
                <input type="hidden" name="contractorName" value="{{ $documento->contractorName }}">
                <button type="button" class="btn btn-danger" onclick="eliminarDocumento({{ $documento->idDocument }})">ELIMINAR DOCUMENTO</button>
            </form>
        </div>
    @endforeach
    <script>
        var idDocument = {{ $documento->idDocument }};
        var  eliminarArchivo = '{{ route('eliminarArchivo', ['idDocument' => ':idDocument']) }}'.replace(':idDocument', idDocument);
    </script>
@endif



