<section id="basic-vertical-layouts">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('assistant.books') }}" class="btn btn-primary">
            Geri
        </a>
    </div>
    <div class="row match-height">
        <!--güncelleme -->
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kitap Güncelleme</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('assistant.updateBook') }}" method="post">
                            <input type="hidden" name='book_id' value="{{ $book->id }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 ">
                                        <div class="d-flex justify-content-center">
                                            <img id="img"
                                                src="{{ str_replace('public', '/storage', $book->image) }}"
                                                class="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="kitap-adi-icon">Kitap Adı
                                                @error('kitap_adi')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <div class="position-relative">
                                                <input name="kitap_adi" type="text" value="{{ $book->kitap_adi }}"
                                                    class="form-control" placeholder="Kitap adı giriniz"
                                                    id="first-name-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-book"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="kitap-tür-icon">Kitap Türü
                                                @error('catid')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <div class="position-relative">
                                                <select name="catid" id="" class="form-control">
                                                    <option value="">
                                                        Seçiniz
                                                    </option>
                                                    @foreach ($cats as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-journal-bookmark-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="kitap-adi-icon">Kitap Yayınevi
                                                @error('yayinevi_id')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <div class="position-relative">
                                                <select name="yayinevi_id" id="" class="form-control">
                                                    <option value="">
                                                        Seçiniz
                                                    </option>
                                                    @foreach ($publishers as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->yayinevi_adi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-inboxes-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="basim-yili-icon">Basım Yılı

                                            </label>
                                            <div class="position-relative">

                                                <input type="date" name="basim_yili" class="form-control"
                                                    id="basim-yili-icon">{{ $book->basim_yili }}
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-month-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button onclick="$('#deleteBookForm').submit();" type="button"
                                            class="btn btn-primary me-1 mb-1">Sil</button>
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
        <!--Yazar Ekleme -->
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Yazar Ekle</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" id="yazar_form"
                            action="{{ route('assistant.updateWriterBook') }}" method="post">
                            <input type="hidden" name='book_id' value="{{ $book->id }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="yazar-id-icon">Yazar Seç
                                                @if (session('result'))
                                                    <strong class="text-danger"> {{ session('message') }} </strong>
                                                @endif
                                            </label>
                                            <div class="position-relative">
                                                <select name="yazar_id" id="" class="form-control">
                                                    <option value="">
                                                        Seçiniz
                                                    </option>
                                                    @foreach ($writers as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->writer_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-vector-pen"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" name="submit"
                                            class="btn btn-primary me-1 mb-1">Ekle</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Yazar listele -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Yazarlar</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Yazar adı</th>
                                    <th style="text-align: center">ᐁᐁ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($writer_book as $val)
                                    <tr>
                                        <td> <a href="{{ route('assistant.Writerbook', $val->id) }}">
                                                {{ $val->writer_name }}</a></td>
                                        <td style="text-align: center">
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<form method="post" action="{{ route('assistant.deleteBook', $book->id) }}" id="deleteBookForm">
    @method('delete')
    @csrf
</form>
