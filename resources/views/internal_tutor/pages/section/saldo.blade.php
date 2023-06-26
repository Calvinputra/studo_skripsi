<div class="row tab-pane fade" id="saldo" role="tabpanel">
    <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
        Penarikan Saldo
    </h2>

    <div class="d-flex align-items-center justify-content-between" style="margin-tp:40px;background: rgba(255, 193, 0, 0.1);border-radius: 5px;">
        <div>
            <p class="text-category m-0">
                Total Saldo
            </p>
        </div>
        <div>
            <p class="header-text-category m-0">
                Rp.{{ number_format($check_balance->balance) }}
            </p>
        </div>
    </div>
    <p style="color:#EB2020;margin-bottom:40px;padding:0px;">
        *Cek saldo kamu setelah pengajuan dalam waktu 2x24 jam pada hari kerja.
    </p>


    <form action="{{ route('internal_tutor.post.tarikSaldo', $check_balance->id) }}" method="POST">
        @csrf
        <div style="">
            <label class="form-label semibold fw-bold">Bank</label>
            <select name="bank" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
                <option value="" disabled selected>Pilih Bank</option>
                <option value="BCA">BCA</option>
                <option value="BRI">BRI</option>
                <option value="MANDIRI">MANDIRI</option>
                <option value="BNI">BNI</option>
            </select>
        </div>
        <div class="form-group">
            <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;margin-top:24px;">
                Nomor Rekening
            </p>
            <input type="number" value="" placeholder="321354354" name="account_number" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
            <p style="color:#EB2020;">
                * Pastikan nomor rekening yang tertera sudah sesuai dengan bank kamu
            </p>
        </div>
        <div class="form-group">
            <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;margin-top:24px;">
                Jumlah saldo yang ingin ditarik
            </p>
            <input id="balance_logic" type="number" value="" placeholder="100000" name="balance" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
            <p style="color:#EB2020;">
                * Maximal jumlah saldo yang ditarik sebesar Rp.{{ number_format($check_balance->balance) }}
            </p>
        </div>
        <div style="float:right;">
            <button  id="save_button_balance"class="btn my-4 my-sm-0" style="color:white;background:#063852;" type="submit">
                <b>
                    Ajukan tarik saldo
                </b>
            </button>
        </div>
    </form>
</div>
<script>
    const BalanceInput = document.getElementById('balance_logic');

    BalanceInput.addEventListener('keypress', function(event) {
        // Mencegah input jika karakter yang dimasukkan bukan angka
        if (event.which < 48 || event.which > 57) {
            event.preventDefault();
        }
    });
</script>
