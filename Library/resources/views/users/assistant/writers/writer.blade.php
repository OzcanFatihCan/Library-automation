<section id="basic-vertical-layouts">
    <div class="btn-group mb-3">
        <a href="{{ route('assistant.writers') }}" class="btn btn-primary">
            Geri
        </a>
    </div>
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Yazar Güncelleme</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('assistant.updateWriter') }}" method="post">
                            <input type="hidden" name='writer_id' value="{{ $writer->id }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="writer-name-icon">İsmi
                                                @error("writer_name")
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <div class="position-relative">
                                                <input name="writer_name" type="text" value="{{ $writer->writer_name }}"
                                                    class="form-control" placeholder="Yazar adı giriniz"
                                                    id="writer-name-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="email-icon">Email
                                            </label>
                                            <div class="position-relative">
                                                <input name="email" type="text" value="{{ $writer->email }}"
                                                    class="form-control" placeholder="Yazar eposta giriniz"
                                                    id="email-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-mailbox"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="phone-icon">Telefon
                                            </label>
                                            <div class="position-relative">
                                                <input name="phone" type="text" value="{{ $writer->phone }}"
                                                    class="form-control" placeholder="Yazar telefonu giriniz"
                                                    id="phone-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="col-12 d-flex justify-content-end">
                                        <button onclick="$('#deleteWriterForm').submit();" type="button" class="btn btn-primary me-1 mb-1">Sil</button>
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


<form method="post" action="{{ route('assistant.deleteWriter',$writer->id) }}" id="deleteWriterForm">
    @method("delete")
    @csrf
</form>
