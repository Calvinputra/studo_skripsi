<style>
    .upload{
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 24px;
        gap: 32px;
        background: rgba(32, 162, 235, 0.1);
        border-radius: 5px;
        justify-content:space-between;
    }
</style>
<div style="margin-top:24px;" class="tab-pane" id="project" role="tabpanel">
    <div>
        <p style="font-weight: 700;font-size: 18px;line-height: 22px;">
            Berikut ini Soal Project yang harus dikerjakan
        </p>
        <p style="font-weight: 400;font-size: 18px;line-height: 22px;">
            {{ $project->description }}
        </p>
    </div>
    @if($project->photo)
        <div>
            <img style="width: 448px;height:252px;margin:24px 0px;" src="{{ $project->photo }}" alt="">
        </div>
    @else

    @endif
    <div class="upload">
        <div class="d-flex align-items-center">
            <div>
            <svg width="28" height="27" viewBox="0 0 28 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.00033 26.8334C3.08366 26.8334 2.29894 26.507 1.64616 25.8542C0.993381 25.2014 0.666992 24.4167 0.666992 23.5V18.5H4.00033V23.5H24.0003V18.5H27.3337V23.5C27.3337 24.4167 27.0073 25.2014 26.3545 25.8542C25.7017 26.507 24.917 26.8334 24.0003 26.8334H4.00033ZM12.3337 20.1667V6.58335L8.00033 10.9167L5.66699 8.50002L14.0003 0.166687L22.3337 8.50002L20.0003 10.9167L15.667 6.58335V20.1667H12.3337Z" fill="#1C1B1F"/>
            </svg>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <div>
                <p class="title-text-card" style="margin-bottom:8px;">
                    Upload Hasil Project    
                </p>
                <p class="m-0">
                    File dalam bentuk dokumen denagn extension (.xml, .png, .jpg, .pdf, .jpeg, .xlxs)
                </p>
            </div>
        </div>
        @php
            $chapterId = request()->segment(3);
        @endphp
        @if($check_project == null )
            <form action="{{ route('studo.pages.project.submit', [$class->slug, $chapterId]) }}" method="POST" 
                enctype="multipart/form-data" id="form-image">
                @csrf
                <div>
                    <label for="file-upload" class="btn my-2 my-sm-0" style="color:white;background:#063852;">
                        <b>Upload</b>
                    </label>
                    <input id="file-upload" type="file" name="photo" style="display: none;" onchange="document.getElementById('form-image').submit();">
                </div>
            </form>
        @elseif($check_project->score == null)
            <label for="file-upload" class="btn my-2 my-sm-0" style="color:white;background:#063852;">
                <b>Project Sedang Dalam Pemeriksaan</b>
            </label>
        @else
            <label for="file-upload" class="btn my-2 my-sm-0" style="color:white;background:green;">
                <b>Done</b>
            </label>
        @endif
    </div>
</div>