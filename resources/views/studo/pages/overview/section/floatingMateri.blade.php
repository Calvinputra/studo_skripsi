<div class="sidebar" style="margin-top: 40px;">
    <h2 style="color:black;font-weight:bold;" class="text-category">
        Materi Pembelajaran
    </h2>
    
    <a href="{{ route('studo.pages.quest.pre-test', $class->slug) }}">
        <div class="d-flex align-items-center justify-content-between" style="padding: 10px 16px;border: 1px solid #FFC100;border-radius: 5px 5px 0px 0px;background:#FFFFFF">
            <div class="d-flex align-items-center">
                <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.66634 14H10.333V12.3333H3.66634V14ZM3.66634 10.6667H10.333V8.99999H3.66634V10.6667ZM1.99967 17.3333C1.54134 17.3333 1.14898 17.1701 0.822591 16.8437C0.496202 16.5174 0.333008 16.125 0.333008 15.6667V2.33332C0.333008 1.87499 0.496202 1.48263 0.822591 1.15624C1.14898 0.829851 1.54134 0.666656 1.99967 0.666656H8.66634L13.6663 5.66666V15.6667C13.6663 16.125 13.5031 16.5174 13.1768 16.8437C12.8504 17.1701 12.458 17.3333 11.9997 17.3333H1.99967ZM7.83301 6.49999H11.9997L7.83301 2.33332V6.49999Z" fill="#063852"/>
                </svg>
                <p class="text-materi m-0">
                    &nbsp;&nbsp; Pre-test
                </p>
            </div>
            <div>
                @if($check_pretest)
                    <svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.54961 13L0.849609 7.30001L2.27461 5.87501L6.54961 10.15L15.7246 0.975006L17.1496 2.40001L6.54961 13Z" fill="#063852"/>
                    </svg>
                @endif
            </div>
        </div>
    </a>
    @php
        $chapter_id = $chapter->id; // Ganti dengan nilai chapter id yang sesuai
        $current_page = $chapter_id;
        $completed_chapters = $chapter_log->pluck('chapter_id')->toArray(); // Ambil semua chapter yang sudah selesai
    @endphp
    @foreach ($all_chapter as $chapter)
        <a href="{{ route('studo.overview', [$class->slug, $chapter->id]) }}">
            <div class="d-flex align-items-center justify-content-between" style="padding: 10px 16px;border: 1px solid #FFC100;border-radius: 0px 0px 0px 0px;background: {{ $current_page == $chapter->id ? '#FFC100' : '#FFFFFF' }};">
                <div class="d-flex align-items-center">
                    @if($chapter->type == 'video')
                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.33366 13.6667C1.87533 13.6667 1.48296 13.5035 1.15658 13.1771C0.830187 12.8507 0.666992 12.4583 0.666992 12V2.00001C0.666992 1.54168 0.830187 1.14932 1.15658 0.822927C1.48296 0.496538 1.87533 0.333344 2.33366 0.333344H12.3337C12.792 0.333344 13.1844 0.496538 13.5107 0.822927C13.8371 1.14932 14.0003 1.54168 14.0003 2.00001V5.75001L17.3337 2.41668V11.5833L14.0003 8.25001V12C14.0003 12.4583 13.8371 12.8507 13.5107 13.1771C13.1844 13.5035 12.792 13.6667 12.3337 13.6667H2.33366Z" fill="#063852"/>
                        </svg>
                    @else
                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.33366 13.6667C1.87533 13.6667 1.48296 13.5035 1.15658 13.1771C0.830187 12.8507 0.666992 12.4583 0.666992 12V2.00001C0.666992 1.54168 0.830187 1.14932 1.15658 0.822927C1.48296 0.496538 1.87533 0.333344 2.33366 0.333344H15.667C16.1253 0.333344 16.5177 0.496538 16.8441 0.822927C17.1705 1.14932 17.3337 1.54168 17.3337 2.00001V12C17.3337 12.4583 17.1705 12.8507 16.8441 13.1771C16.5177 13.5035 16.1253 13.6667 15.667 13.6667H2.33366ZM9.83366 12H15.667V2.00001H9.83366V12ZM10.667 9.50001H14.8337V8.25001H10.667V9.50001ZM10.667 7.41668H14.8337V6.16668H10.667V7.41668ZM10.667 5.33334H14.8337V4.08334H10.667V5.33334Z" fill="#063852"/>
                        </svg>
                    @endif
                    <p class="text-materi m-0">
                        &nbsp; {{ $chapter->name }}
                    </p>
                </div>
                <div>
                    @if(in_array($chapter->id, $completed_chapters))
                        <svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.54961 13L0.849609 7.30001L2.27461 5.87501L6.54961 10.15L15.7246 0.975006L17.1496 2.40001L6.54961 13Z" fill="#063852"/>
                        </svg>
                    @endif
                </div>
            </div>
        </a>
    @endforeach
    @if($check_pretest && count($completed_chapters) == count($all_chapter->pluck('id')->toArray()))
        <a href="{{ route('studo.pages.quest.post-test', $class->slug) }}">
            <div class="d-flex align-items-center justify-content-between" style="padding: 10px 16px;border: 1px solid #FFC100;border-radius: 0px 0px 5px 5px;background: #FFFFFF;">
                <div class="d-flex align-items-center">
                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.66634 14H10.333V12.3333H3.66634V14ZM3.66634 10.6667H10.333V8.99999H3.66634V10.6667ZM1.99967 17.3333C1.54134 17.3333 1.14898 17.1701 0.822591 16.8437C0.496202 16.5174 0.333008 16.125 0.333008 15.6667V2.33332C0.333008 1.87499 0.496202 1.48263 0.822591 1.15624C1.14898 0.829851 1.54134 0.666656 1.99967 0.666656H8.66634L13.6663 5.66666V15.6667C13.6663 16.125 13.5031 16.5174 13.1768 16.8437C12.8504 17.1701 12.458 17.3333 11.9997 17.3333H1.99967ZM7.83301 6.49999H11.9997L7.83301 2.33332V6.49999Z" fill="#063852"/>
                    </svg>
                    <p class="text-materi m-0">
                        &nbsp;&nbsp; Post-Test
                    </p>
                </div>
                <div>
                    @if($check_posttest)
                        <svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.54961 13L0.849609 7.30001L2.27461 5.87501L6.54961 10.15L15.7246 0.975006L17.1496 2.40001L6.54961 13Z" fill="#063852"/>
                        </svg>
                    @endif
                </div>
            </div>
        </a>
        @else
        <a href="#">
            <div class="d-flex align-items-center justify-content-between" style="padding: 10px 16px;border: 1px solid #FFC100;border-radius: 0px 0px 5px 5px;background: #FFFFFF;">
                <div class="d-flex align-items-center">
                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.66634 14H10.333V12.3333H3.66634V14ZM3.66634 10.6667H10.333V8.99999H3.66634V10.6667ZM1.99967 17.3333C1.54134 17.3333 1.14898 17.1701 0.822591 16.8437C0.496202 16.5174 0.333008 16.125 0.333008 15.6667V2.33332C0.333008 1.87499 0.496202 1.48263 0.822591 1.15624C1.14898 0.829851 1.54134 0.666656 1.99967 0.666656H8.66634L13.6663 5.66666V15.6667C13.6663 16.125 13.5031 16.5174 13.1768 16.8437C12.8504 17.1701 12.458 17.3333 11.9997 17.3333H1.99967ZM7.83301 6.49999H11.9997L7.83301 2.33332V6.49999Z" fill="#063852"/>
                    </svg>
                    <p class="text-materi m-0">
                        &nbsp;&nbsp; Post-Test
                    </p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M17 9.761v-4.761c0-2.761-2.238-5-5-5-2.763 0-5 2.239-5 5v4.761c-1.827 1.466-3 3.714-3 6.239 0 4.418 3.582 8 8 8s8-3.582 8-8c0-2.525-1.173-4.773-3-6.239zm-8-4.761c0-1.654 1.346-3 3-3s3 1.346 3 3v3.587c-.927-.376-1.938-.587-3-.587s-2.073.211-3 .587v-3.587zm3 17c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6zm2-6c0 1.104-.896 2-2 2s-2-.896-2-2 .896-2 2-2 2 .896 2 2z"/></svg>
                </div>
            </div>
        </a>
    @endif
</div>