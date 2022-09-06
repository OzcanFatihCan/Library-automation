<div class="col-12">
    <div class="card">
        <div class="card-header" style="text-align: center">
            <h4>Kitaplar Listesi</h4>
        </div>
        <div class="card-body">
            <div class="btn-group mb-3">
                <button data-bs-toggle="modal" data-bs-target="#addBookModal" class="btn btn-info">Kitap Ekle+</button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kitap İcon</th>
                            <th>Kitap Adı</th>
                            <th>Kitap Türü</th>
                            <th>Yayın Evi</th>
                            <th>Basım Yılı</th>
                            <th style="text-align:center">ᐁ ᐁ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $val)
                            <tr>
                                <td class="px-4">
                                    <a href="{{ route('assistant.book', $val->id) }}">
                                        <img src="{{ str_replace('public', '/storage', $val->image) }}" width="40"
                                            height="50" class="img img-responsive">
                                    </a>
                                </td>
                                <td>{{ $val->kitap_adi }}</td>
                                <td> {{ $val->category_name }}</td>
                                <td> {{ $val->yayinevi_adi }}</td>
                                <td>{{ $val->basim_yili }}</td>
                                <td style="text-align:center">
                                    <a href="{{ route('assistant.book', $val->id) }}" class="btn btn-info">
                                        Düzenle
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $books->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Kitap Ekle</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="addBookForm" enctype="multipart/form-data" method="post"
                    action="{{ route('assistant.addBook') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label>Kitap Adı
                            @error('kitap_adi')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input class="form-control" name="kitap_adi" placeholder="Kitap adını giriniz."
                            value="{{ old('kitap_adi') }}" />
                    </div>
                    <div class="form-group">
                        <label>Kitap Fotoğrafı </label>
                        <input class="form-control" name="image" id="image" type="file" />
                    </div>
                    <div class="form-group">
                        <label>Kategori
                        </label>
                        <select name="catid" class="form-control" id="category">
                            <option value="">
                                Seçiniz
                            </option>
                            @foreach ($cats as $item)
                                <option value="{{ $item->id }}"> {{ $item->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Yayınevi
                        </label>
                        <select name="yayinevi_id" id="" class="form-control">
                            <option value="">
                                Seçiniz
                            </option>
                            @foreach ($publishers as $item)
                                <option value="{{ $item->id }}"> {{ $item->yayinevi_adi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Basım Yılı
                        </label>
                        <input class="form-control" type="date" name="basim_yili" placeholder="basım yılını giriniz"
                            value="{{ old('basim_yili') }}" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kapat</span>
                </button>
                <button type="button" class="btn btn-primary ml-1" onclick="$('#addBookForm').submit();">
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
            $("#addBookModal").modal("show");
        @endif
    }
</script>


