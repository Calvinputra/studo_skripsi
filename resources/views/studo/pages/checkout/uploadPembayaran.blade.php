@extends('studo.main')

<link href="{{ url('styles/font.css') }}" rel="stylesheet" type = "text/css">
<style>

    .middle {
        top: 520px !important;
    }
    .text {
        border: 1px solid #063852 !important;
        color: #063852 !important;
    }
    .notificationBank {
        position: fixed;
        top: 10px;
        right: 10px;
        background-color: #063852;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        display: none;
    }
    .notificationJumlah {
        position: fixed;
        top: 10px;
        right: 10px;
        background-color: #063852;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        display: none;
    }
</style>
@section('content')
<div class="container" style="padding-top:40px;padding-bottom:80px;">
    @php
        $normal_price = $class->price / (1 - $class->discount/100);  
        $normal_price_formatted = number_format($normal_price, 0, ',', '.');
    @endphp
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div>
                <h2 class="fw-bold">
                    Upload Bukti Pembayaran
                </h2>
                <p>
                    Pembelian kelas akan diproses maksimal 2x24 jam.
                </p>
                <div>
                    <b>
                        <p>
                            Mohon transfer ke Bank XYZ
                        </p>
                    </b>
                    <div class="row" style="padding: 24px;background: rgba(32, 162, 235, 0.1);border-radius: 5px;margin:0px;">
                        <div class="col-sm-9 d-grid align-items-center">
                            <p class="m-0">
                                010101010101
                            </p>
                        </div>
                        <div class="col-sm-3 d-grid align-items-center">
                            <button class="btn my-2 my-sm-0" style="color: #063852;background:white;border: 1px solid #063852;" type="button" onclick="copyTextToClipboard('010101010101')">
                                <b>Salin</b>
                            </button>
                        </div>
                    </div>
                    <div id="notificationBank" class="notificationBank"></div>
                </div>
                <div style="margin-top:24px;">
                    <b>
                        <p>
                            Jumlah Transfer
                        </p>
                    </b>
                    <div class="row" style="padding: 24px;background: rgba(32, 162, 235, 0.1);border-radius: 5px;margin:0px;">
                        <div class="col-sm-9 d-grid align-items-center">
                            <p class="m-0" style="font-weight: 600">
                                Rp.{{ $normal_price_formatted }}
                            </p>
                        </div>
                        <div class="col-sm-3 d-grid align-items-center">
                            <button class="btn my-2 my-sm-0" style="color: #063852;background:white;border: 1px solid #063852;" type="button" onclick="copyTextToClipboard('{{ $normal_price_formatted }}')">
                                <b>Salin</b>
                            </button>
                        </div>
                    </div>

                    <div id="notificationJumlah" class="notificationJumlah"></div>
                </div>
                <form action="{{ route('studo.checkout.upload.post', $class->slug) }}" method="POST" enctype="multipart/form-data" id="form-image">
                    @csrf
                    <div style="margin-top: 24px;">
                        <label for="paymentProof" class="hover-img" style="display: block;">
                            <img class="preview-image" style="height: 198px; width: 100%;" src="https://cdn.discordapp.com/attachments/722800563489865779/1120295169170874389/Frame_1939.png" alt="">
                            <div class="middle">
                                <div class="text hover-text-card">Upload Bukti Pembayaran</div>
                            </div>
                        </label>
                        <input type="file" id="paymentProof" name="photo" style="display: none;" accept=".jpg, .jpeg, .png" onchange="previewImage(event)">
                    </div>
                    <input type="hidden" name="class_id" value="{{ $class->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="status" value="deactive">
                    <div style="margin-top: 24px;">
                        <button class="btn my-2 my-sm-0" style="color: white; background: #063852; width: 100%;" type="submit">
                            <b>
                                Saya Sudah Transfer
                            </b>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
<script>
  function copyTextToClipboard(text) {
        const el = document.createElement('textarea');
        el.value = text;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);

        showNotificationBank('Teks berhasil disalin!');
    }

    function showNotificationBank(message) {
        const notificationBank = document.getElementById('notificationBank');
        notificationBank.textContent = message;
        notificationBank.style.display = 'block';

        setTimeout(function () {
            notificationBank.style.display = 'none';
        }, 3000);
    }
</script>
<script>
    function copyTextToClipboard(text) {
        const el = document.createElement('textarea');
        el.value = text;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);

        showNotification('Teks berhasil disalin!');
    }

    function showNotification(message) {
        const notification = document.getElementById('notificationJumlah');
        notification.textContent = message;
        notification.style.display = 'block';

        setTimeout(function () {
            notification.style.display = 'none';
        }, 3000);
    }
</script>
<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var imgElement = document.querySelector('.preview-image');
            imgElement.src = reader.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection