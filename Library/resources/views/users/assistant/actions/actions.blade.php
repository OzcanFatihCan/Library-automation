<div class="col-12">
    <div class="card">
        <div class="card-header" style="text-align: center">
            <h4>Ödünç Kitap Alanlar Listesi</h4>
        </div>
        <div class="card-body">
            <div class="btn-group">
                <button data-bs-toggle="modal" data-bs-target="#addActionModal" class="btn btn-info">Ödünç Kitap
                    Ver</button>
            </div>
            <div class="table-responsive" >
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kullanıcı Mail</th>
                            <th>Kitap Adı</th>
                            <th>Kitap Veriliş Tarihi</th>
                            <th>Kitap Teslim Tarihi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actions as $val)
                            <tr>
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->kitap_adi }}</td>

                                <td>{{ $val->k_verilis_tarih }}</td>
                                <td>{{ $val->k_teslim_tarih }}</td>

                                <td>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $actions->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal" id="addActionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Kitap ödünç bilgileri gir</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="addActionForm" method="post" action="{{ route('assistant.addAction') }}">
                    @csrf

                    <div class="form-group">
                        <label>Kullanıcı Mail</label>
                        <select name="user_id" id="" class="form-control">
                            <option value="">
                                Seçiniz
                            </option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}"> {{ $item->email}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kitap adı</label>
                        <select name="kitap_id" id="" class="form-control">
                            <option value="">
                                Seçiniz
                            </option>
                            @foreach ($books as $item)
                                <option value="{{ $item->id }}"> {{ $item->kitap_adi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kitap veriliş tarihi
                            @error('k_verilis_tarih')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input class="form-control" name="k_verilis_tarih" type="date"
                            value="{{ old('k_verilis_tarih') }}" />
                    </div>
                    <div class="form-group">
                        <label>Kitap teslim tarihi
                            @error('k_teslim_tarih')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </label>
                        <input class="form-control" name="k_teslim_tarih" type="date"
                            value="{{ old('k_teslim_tarih') }}" />
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kapat</span>
                </button>
                <button type="button" class="btn btn-primary ml-1" onclick="$('#addActionForm').submit();">
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
            $("#addActionModal").modal("show");
        @endif
    }
</script>
