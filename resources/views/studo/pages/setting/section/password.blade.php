<div class="row tab-pane fade" id="password" role="tabpanel">
    <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
        Ubah Password
    </h2>

    <form action="{{ route('studo.post.updatePassword', auth()->user()->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;margin-top:24px;">
                Password Lama
            </p>
            <input type="text" placeholder="" name="password_lama" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
        </div>
        <div class="form-group" >
            <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;">
                Password Baru
            </p>
            <input type="text" name="password_baru" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
        </div>
        <div class="form-group" >
            <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;">
                Konfirmasi Password
            </p>
            <input type="text" name="konfirmasi_password" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
        </div>
        <div style="float:right;">
            <button class="btn my-4 my-sm-0" style="color:white;background:#063852;" type="submit">
                <b>
                    Simpan
                </b>
            </button>
        </div>
    </form>
</div>