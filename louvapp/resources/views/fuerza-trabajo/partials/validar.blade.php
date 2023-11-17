<form action="" method="POST">
    @csrf
    <h4 class="card-title mb-3">ESTE USUARIO TIENE {{$tusDocumentos}} DOCUMENTOS AGREGADOS</h4>                

    @foreach($documentos as $document)
    <div class="card mb-1 shadow-none border">
        <div class="p-2">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="avatar-sm">
                        <span class="avatar-title rounded">
                            Doc.
                        </span>
                    </div>
                </div>
                <div class="col ps-0">
                    <p class="text-capitalize">{{$document->typeNme}}</p>
                    <a href="javascript:void(0);" class="text-muted fw-bold">{{$document->path}}</a>
                    <p class="mb-0"></p>
                </div>
                <div class="col-auto">
                    <input type="checkbox" class="btn btn-link btn-lg text-mutede" name="validated[{{$document->idDocument}}]" id="{{$document->idDocument}}" @if($document->validated) checked="checked" @endif>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="mb-3">
        <button type="button" class="btn btn-primary" onclick="validarDocumentos()" >
            VALIDAR DOCUMENTOS
        </button>
    </div>
</form>