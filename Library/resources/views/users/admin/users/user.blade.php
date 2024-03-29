<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('admin.updateUser') }}" method="post">
                            <input type="hidden" name='user_id' value="{{ $user->id }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">First Name
                                                @error("first_name")
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <div class="position-relative">
                                                <input name="first_name" type="text" value="{{ $user->first_name }}"
                                                    class="form-control" placeholder="Input with icon left"
                                                    id="first-name-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="last-name-icon">Last Name
                                                @error("last_name")
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <div class="position-relative">
                                                <input name="last_name" type="text" value="{{ $user->last_name }}"
                                                    class="form-control" placeholder="Input with icon left"
                                                    id="last-name-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="phone-id-icon">Phone
                                                @error("phone")
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <div class="position-relative">
                                                <input type="text" name="phone" value="{{ $user->phone }}"
                                                    class="form-control" placeholder="Telefon" id="phone-id-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="address-id-icon">Address
                                                @error("address")
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </label>
                                            <div class="position-relative">
                                                <textarea type="text" name="address" class="form-control"
                                                    placeholder="Adresi" id="address-id-icon">{{ $user->address }}</textarea>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-house"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="role-id-icon">Role</label>
                                            <div class="position-relative">
                                                <select class="form-control" id="role-id-icon" name="role">
                                                    <option value="3">Admin</option>
                                                    <option value="2">Super Admin</option>
                                                    <option value="1">Asistan</option>
                                                </select>

                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button onclick="$('#deleteUserForm').submit();" type="button" class="btn btn-primary me-1 mb-1">Sil</button>
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

<script>
    window.onload = function() {
        $("#role-id-icon").val('{{ $user->role }}');
    }
</script>

<form method="post" action="{{ route('admin.deleteUser',$user->id) }}" id="deleteUserForm">
    @method("delete")
    @csrf
</form>
