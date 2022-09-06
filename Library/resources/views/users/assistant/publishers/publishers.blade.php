<div class="col-12">
    <div class="card">
        <div class="card-header" style="text-align: center">
            <h4>Yayınevleri Listesi</h4>
        </div>
        <div class="card-body">
            <div class="btn-group">
                <button data-bs-toggle="modal" data-bs-target="#addPublisherModal" class="btn btn-info">Yayınevi
                    Ekle+</button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover" id="tblyay">
                    <thead>
                        <tr>
                            <th>Yayınevi Adı</th>
                            <th>Yayınevi Adresi</th>
                            <th>Yayınevi Telefon</th>
                            <th style="text-align: center">ᐁᐁ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($publishers as $val)
                            <tr>
                                <td>{{ $val->yayinevi_adi }}</td>
                                <td>{{ $val->yayinevi_adres }}</td>
                                <td class="px-3">{{ $val->yayinevi_tel }}</td>
                                <td style="text-align: center">
                                    <a href="{{ route('assistant.dellPublishers',$val->id)}}" class="btn btn-danger btn-sm px-2"> <i class="bx bx-trash">Sil</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $publishers->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal" id="addPublisherModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Yayınevi Ekle</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="addPublisherForm" method="post" action="{{ route('assistant.addPublishers') }}">
                    @csrf

                    <div class="form-group">
                        <label>Yayınevi Adı
                            @error('yayinevi_adi')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input class="form-control" name="yayinevi_adi" placeholder="Adını giriniz."
                            value="{{ old('yayinevi_adi') }}" />
                    </div>
                    <div class="form-group">
                        <label>Yayınevi Adres
                        </label>
                        <input class="form-control" name="yayinevi_adres" placeholder="Adresi giriniz."
                            value="{{ old('yayinevi_adres') }}" />
                    </div>
                    <div class="form-group">
                        <label>Yayınevi Telefon
                        </label>
                        <input class="form-control" name="yayinevi_tel" placeholder="Telefonu giriniz."
                            value="{{ old('yayinevi_tel') }}" />
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kapat</span>
                </button>
                <button type="button" class="btn btn-primary ml-1" onclick="$('#addPublisherForm').submit();">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kaydet</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {

        @if ($errors->any())
            $("#addPublisherModal").modal("show");
        @endif
    }
</script>

