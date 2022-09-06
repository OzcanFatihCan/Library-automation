<div class="col-12">
    <div class="card">
        <div class="card-header" style="text-align: center">
            <h4>Kategoriler listesi</h4>
        </div>
        <div class="card-body">
            <div class="btn-group">
                <button data-bs-toggle="modal" data-bs-target="#addCatModal" class="btn btn-info">Kategori Ekle+</button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kategori ID</th>
                            <th>Kategori Adı</th>
                            <th style="text-align: center">ᐁ ᐁ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $val)
                            <tr>
                                <td class="px-5">{{ $val->id }}</td>
                                <td class="px-3">{{ $val->category_name }}</td>
                                <td style="text-align: center">
                                    <a href="{{ route('assistant.categoryek', $val->id) }}" class="btn btn-info">
                                          Düzenle 
                                    </a>
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $category->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal" id="addCatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Kategori Ekle</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCatForm" method="post" action="{{ route('assistant.addCategory') }}">
                    @csrf

                    <div class="form-group">
                        <label>Kategori Adı
                            @error('category_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input class="form-control" name="category_name" placeholder="Kategoriyi giriniz."
                            value="{{ old('category_name') }}" />
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kapat</span>
                </button>
                <button type="button" class="btn btn-primary ml-1" onclick="$('#addCatForm').submit();">
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
            $("#addCatModal").modal("show");
        @endif
    }
</script>



