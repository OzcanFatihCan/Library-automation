<div class="col-12">
    <div class="card">
        <div class="card-header" style="text-align: center">
            <h4>Yazarlar Listesi</h4>
        </div>
        <div class="card-body">
            <div class="btn-group">
                <button data-bs-toggle="modal" data-bs-target="#addWriterModal" class="btn btn-info">Yazar Ekle+</button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>İsim</th>
                            <th>Email</th>
                            <th>Telefon</th>
                            <th style="text-align: center">ᐁ ᐁ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($writers as $val)
                            <tr>
                                <td>{{ $val->writer_name }}</td>   
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->phone }}</td>
                                
                                <td style="text-align: center">
                                    <a href="{{ route('assistant.writer', $val->id) }}" class="btn btn-info">
                                        Düzenle
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $writers->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal" id="addWriterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Yazar Ekle</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="addWriterForm" method="post" action="{{ route('assistant.addWriters') }}">
                    @csrf

                    <div class="form-group">
                        <label>İsmi
                            @error('writer_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input class="form-control" name="writer_name" placeholder="Yazar adını giriniz."
                            value="{{ old('writer_name') }}" />
                    </div>          
                    <div class="form-group">
                        <label>Email
                            @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input class="form-control" name="email" placeholder="email giriniz"
                            value="{{ old('email') }}" />
                    </div>
                    <div class="form-group">
                        <label>Telefon
                        </label>
                        <input class="form-control" name="phone" placeholder="phone giriniz"
                            value="{{ old('phone') }}" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kapat</span>
                </button>
                <button type="button" class="btn btn-primary ml-1" onclick="$('#addWriterForm').submit();">
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
            $("#addWriterModal").modal("show");
        @endif
    }
</script>
