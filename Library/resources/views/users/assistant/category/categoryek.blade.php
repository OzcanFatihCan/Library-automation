<section id="basic-vertical-layouts">
    <div class="btn-group mb-3">
        <a href="{{ route('assistant.category') }}" class="btn btn-primary">
            Geri
        </a>
    </div>
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kategori Güncelleme</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('assistant.updateCategory') }}" method="post">
                            <input type="hidden" name='categoryek_id' value="{{ $categoryek->id }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="category-name-icon">Kategori Adı
                                                @error("category_name")
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <div class="position-relative">
                                                <input name="category_name" type="text" value="{{ $categoryek->category_name }}"
                                                    class="form-control" placeholder="Kategori adı giriniz"
                                                    id="category-name-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-journal-bookmark-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button onclick="$('#deleteCatForm').submit();" type="button" class="btn btn-primary me-1 mb-1">Sil</button>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Güncelle</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<form method="post" action="{{ route('assistant.deleteCategory',$categoryek->id) }}" id="deleteCatForm">
    @method("delete")
    @csrf
</form>
