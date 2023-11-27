<meta name="csrf-token" content="{{ csrf_token() }}">
@if ($count == 0)
<div class="document-preview">
    ESTE USAURIO NO TIENE DOCUMENTOS ALMACENADOS EN EL SISTEMA
</div>
<h4>DOCUMENTOS:</h4>
@elseif ($count > 0)
    @foreach($documentos as $documento)
        <div class="document-preview">
            
            <h5>{{ strtoupper($documento->typeNme) }}
                @if ($documento->validated == 1)  
                    <i class="mdi mdi-check-decagram text-success"></i>  
                @endif
            </h5>
            <iframe src="{{ asset('storage/uploads/contractors/'.$documento->contractorName.'/'. $documento->path) }}" width="700" height="500"></iframe>
            <form action="" method="POST" id="eliminarForm">
                <button type="button" class="btn btn-danger" onclick="eliminarDocumento({{ $documento->idDocument }})">ELIMINAR DOCUMENTO</button>
            </form>
        </div>
        <br>
    @endforeach

@endif



