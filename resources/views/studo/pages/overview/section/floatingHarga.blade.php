<div class="sidebar" style="margin-top:40px;background: rgba(255, 193, 0, 0.1);border-radius: 5px;padding: 24px;width:352px;">
    <div style="display:flex;align-items:center;">
        @php
            $normal_price = $class->price / (1 - $class->discount/100);  
            $normal_price_formatted = number_format($normal_price, 0, ',', '.');
        @endphp
        @if($class->discount == 0)
            <span style="color:#063852;font-weight: 500;font-size: 24px;line-height: 29px;">Rp.{{ number_format($class->price, 0, ',', '.') }}</span>
        @else
            <span style="color:#063852;font-weight: 500;font-size: 24px;line-height: 29px;">Rp.{{ number_format($class->price, 0, ',', '.') }}</span>
            <span class="ms-1" style="text-decoration: line-through; font-size: 14px; color: grey">Rp.{{ $normal_price_formatted }}</span>
        @endif
    </div>
    @if(auth()->check())
        <a href="{{route('studo.checkout', $class->slug)}}">
            <button class="btn my-2 my-sm-0" style="color:white;background:#063852;width:100%;margin:24px 0px !important;" type="submit">
                <b>
                    Beli kelas
                </b>
            </button>
        </a>
    @else
        <button class="btn my-2 my-sm-0"  data-bs-toggle="modal" data-bs-target="#loginModal" style="color:white;background:#063852;width:100%;margin:24px 0px !important;" type="button">
            <b>
                Beli kelas
            </b>
        </button>
    @endif
    <div>
        <div>
            <span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.3 14.7L14.7 13.3L11 9.6V5H9V10.4L13.3 14.7ZM10 20C8.61667 20 7.31667 19.7375 6.1 19.2125C4.88333 18.6875 3.825 17.975 2.925 17.075C2.025 16.175 1.3125 15.1167 0.7875 13.9C0.2625 12.6833 0 11.3833 0 10C0 8.61667 0.2625 7.31667 0.7875 6.1C1.3125 4.88333 2.025 3.825 2.925 2.925C3.825 2.025 4.88333 1.3125 6.1 0.7875C7.31667 0.2625 8.61667 0 10 0C11.3833 0 12.6833 0.2625 13.9 0.7875C15.1167 1.3125 16.175 2.025 17.075 2.925C17.975 3.825 18.6875 4.88333 19.2125 6.1C19.7375 7.31667 20 8.61667 20 10C20 11.3833 19.7375 12.6833 19.2125 13.9C18.6875 15.1167 17.975 16.175 17.075 17.075C16.175 17.975 15.1167 18.6875 13.9 19.2125C12.6833 19.7375 11.3833 20 10 20Z" fill="#1C1B1F"/>
                </svg>
                &nbsp; {{ $total_duration }} Menit
            </span>
        </div>
        <div style="margin-top:10px;">
            <span>
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 2V9L6.5 7.5L9 9V2H4ZM15 21C13.6167 21 12.4375 20.5125 11.4625 19.5375C10.4875 18.5625 10 17.3833 10 16C10 14.6167 10.4875 13.4375 11.4625 12.4625C12.4375 11.4875 13.6167 11 15 11C16.3833 11 17.5625 11.4875 18.5375 12.4625C19.5125 13.4375 20 14.6167 20 16C20 17.3833 19.5125 18.5625 18.5375 19.5375C17.5625 20.5125 16.3833 21 15 21ZM13.75 18.5L17.75 16L13.75 13.5V18.5ZM8 15.9933C8 16.7144 8.1125 17.4125 8.3375 18.0875C8.5625 18.7625 8.86667 19.4 9.25 20H2C1.45 20 0.979167 19.8042 0.5875 19.4125C0.195833 19.0208 0 18.55 0 18V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H14C14.55 0 15.0208 0.195833 15.4125 0.5875C15.8042 0.979167 16 1.45 16 2V9.05C15.8323 9.03333 15.6645 9.02083 15.4968 9.0125C15.3291 9.00417 15.1613 9 14.9936 9C13.0479 9 11.3958 9.67921 10.0375 11.0376C8.67917 12.396 8 14.0479 8 15.9933Z" fill="#1C1B1F"/>
                </svg>
                &nbsp; {{ $count_chapter }} Chapter ({{ $count_video }} Video, {{ $count_reading }} Reading)
            </span>
        </div>
    </div>
</div>