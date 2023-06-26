<div style="margin-top:24px;" class="tab-pane" id="forum" role="tabpanel">
    <div class="d-flex pb-3" style="justify-content: space-between;align-items: center">
        <p style="font-weight: 700;font-size: 18px;line-height: 22px;">
            Diskusi dengan teman-teman di Forum
        </p>
       <button id="buatForumButton" class="btn-overview" style="background: rgba(6, 56, 82, 1); color: white">
            <b>
                <svg width="24" height="24" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0_522_9" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                    <rect width="24" height="24" fill="#D9D9D9"/>
                    </mask>
                    <g mask="url(#mask0_522_9)">
                    <path d="M11 17H13V13H17V11H13V7H11V11H7V13H11V17ZM12 22C10.6167 22 9.31667 21.7375 8.1 21.2125C6.88333 20.6875 5.825 19.975 4.925 19.075C4.025 18.175 3.3125 17.1167 2.7875 15.9C2.2625 14.6833 2 13.3833 2 12C2 10.6167 2.2625 9.31667 2.7875 8.1C3.3125 6.88333 4.025 5.825 4.925 4.925C5.825 4.025 6.88333 3.3125 8.1 2.7875C9.31667 2.2625 10.6167 2 12 2C13.3833 2 14.6833 2.2625 15.9 2.7875C17.1167 3.3125 18.175 4.025 19.075 4.925C19.975 5.825 20.6875 6.88333 21.2125 8.1C21.7375 9.31667 22 10.6167 22 12C22 13.3833 21.7375 14.6833 21.2125 15.9C20.6875 17.1167 19.975 18.175 19.075 19.075C18.175 19.975 17.1167 20.6875 15.9 21.2125C14.6833 21.7375 13.3833 22 12 22Z" fill="white"/>
                    </g>
                </svg>
                Buat Forum
            </b>
        </button>
    </div>
        @php
            $chapterId = request()->segment(3);
        @endphp
    <!-- Form Buat -->
    <div id="forumForm" style="display: none;">
        <form action="{{ route('studo.pages.forum.submit', [$class->slug, $chapterId])  }}" method="POST">
            @csrf
            <div class="row" style="border: 1px solid #E6EBED;border-radius: 5px;padding: 16px;">
                <div class="col-sm-1">
                    <img style="width: 50px; height:50px;border-radius:100px;margin:0px;" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q==" alt="">
                </div>
                <p style="font-weight: bold" for="description" class="form-label">{{ $user->name }}</p>
                <div class="mb-3">
                    <textarea  placeholder="Tuliskan pertanyaanmu.." class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" style="border: 2px solid rgba(6, 56, 82, 1); color:rgba(6, 56, 82, 1);background:white" id="cancelForumButton" class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn" style="background: rgba(6, 56, 82, 1); color: white; margin-left: 16px;">Submit</button>
                </div>
            </div>
        </form>
    </div>
    @if(count($list_forum) > 0)
        @foreach($list_forum as $forum)
            <div class="row mb-3" style="border: 1px solid #E6EBED;border-radius: 5px;padding: 16px;">
                <!-- Konten Forum -->
                <div class="col-sm-1">
                    <img style="width: 50px; height:50px;border-radius:100px;margin:0px;" src="{{ asset($user->avatar) }}" alt="">
                </div>
                <div class="col-sm-10">
                    <p class="m-0 text-chapter">
                        {{ $forum->name }}
                    </p>
                    <p style="margin: 8px 0px;">
                        {{ $forum->description }}
                    </p>
                </div>
                <div class="col-sm-1">
                    <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 16C1.45 16 0.979167 15.8042 0.5875 15.4125C0.195833 15.0208 0 14.55 0 14C0 13.45 0.195833 12.9792 0.5875 12.5875C0.979167 12.1958 1.45 12 2 12C2.55 12 3.02083 12.1958 3.4125 12.5875C3.80417 12.9792 4 13.45 4 14C4 14.55 3.80417 15.0208 3.4125 15.4125C3.02083 15.8042 2.55 16 2 16ZM2 10C1.45 10 0.979167 9.80417 0.5875 9.4125C0.195833 9.02083 0 8.55 0 8C0 7.45 0.195833 6.97917 0.5875 6.5875C0.979167 6.19583 1.45 6 2 6C2.55 6 3.02083 6.19583 3.4125 6.5875C3.80417 6.97917 4 7.45 4 8C4 8.55 3.80417 9.02083 3.4125 9.4125C3.02083 9.80417 2.55 10 2 10ZM2 4C1.45 4 0.979167 3.80417 0.5875 3.4125C0.195833 3.02083 0 2.55 0 2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0C2.55 0 3.02083 0.195833 3.4125 0.5875C3.80417 0.979167 4 1.45 4 2C4 2.55 3.80417 3.02083 3.4125 3.4125C3.02083 3.80417 2.55 4 2 4Z" fill="#636466"/>
                        </svg>
                </div>

                <!-- Form Reply -->
                <div style="display:flex; justify-content:right;">
                    <button id="replyButton-{{ $forum->id }}" class="btn fw-bold" style="background: #20A2EB;color:White;border-radius: 5px;padding: 10px;width: 98px;height: 44px;text-align">Reply</button>
                </div>

                <div id="replyForm-{{ $forum->id }}" style="display: none;">
                    <form action="{{ route('studo.pages.reply.forum.submit',[$class->slug, $chapterId]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="content" class="form-label">Tuliskan Reply...</label>
                            <textarea class="form-control" id="content" name="description" rows="3" required></textarea>
                        </div>
                        <input type="hidden" id="forum_id" name="forum_id" value="{{ $forum->id }}">
                        <div class="d-flex" style="justify-content:right">
                            <button id="cancelButton" class="btn btn-secondary" style="background: white;color:rgba(6, 56, 82, 1);">Cancel</button>
                            <button type="submit" class="btn" style="background: rgba(6, 56, 82, 1);color:White;margin-left:16px;">Submit</button>
                        </div>
                    </form>
                </div>
                {{-- end Form Reply  --}}
            </div>
            <!-- Reply yang Ada di Database -->
            <div class="replyContainer" style="margin-top: 16px;">
                @foreach($reply_forum->where('forum_id', $forum->id) as $reply)
                    <div class="row mb-2 reply" style="border-bottom: 3px solid rgba(32, 162, 235, 1);background:rgba(32, 162, 235, 0.1);border-radius: 5px;padding: 16px;">
                        <!-- Reply Forum -->
                        <div class="col-sm-1">
                            <img style="width: 50px; height:50px;border-radius:100px;margin:0px;" src="{{ asset($reply->avatar) }}" alt="">
                        </div>
                        <div class="col-sm-10">
                            <p class="m-0 text-chapter">
                                {{ $reply->name }}
                            </p>
                            <p style="margin: 8px 0px;">
                                {{ $reply->description }}
                            </p>
                        </div>
                        <div class="col-sm-1">
                            <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 16C1.45 16 0.979167 15.8042 0.5875 15.4125C0.195833 15.0208 0 14.55 0 14C0 13.45 0.195833 12.9792 0.5875 12.5875C0.979167 12.1958 1.45 12 2 12C2.55 12 3.02083 12.1958 3.4125 12.5875C3.80417 12.9792 4 13.45 4 14C4 14.55 3.80417 15.0208 3.4125 15.4125C3.02083 15.8042 2.55 16 2 16ZM2 10C1.45 10 0.979167 9.80417 0.5875 9.4125C0.195833 9.02083 0 8.55 0 8C0 7.45 0.195833 6.97917 0.5875 6.5875C0.979167 6.19583 1.45 6 2 6C2.55 6 3.02083 6.19583 3.4125 6.5875C3.80417 6.97917 4 7.45 4 8C4 8.55 3.80417 9.02083 3.4125 9.4125C3.02083 9.80417 2.55 10 2 10ZM2 4C1.45 4 0.979167 3.80417 0.5875 3.4125C0.195833 3.02083 0 2.55 0 2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0C2.55 0 3.02083 0.195833 3.4125 0.5875C3.80417 0.979167 4 1.45 4 2C4 2.55 3.80417 3.02083 3.4125 3.4125C3.02083 3.80417 2.55 4 2 4Z" fill="#636466"/>
                                </svg>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <p style="font-weight: 700;font-size: 18px;line-height: 22px;">
            Maaf, Forum belum dibuat untuk Kelas ini!
        </p>
    @endif
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#buatForumButton').click(function() {
            // Menampilkan form ketika tombol ditekan
            $('#forumForm').show();
        });
    });

    $(document).ready(function() {
        $('#buatForumButton').click(function() {
            // Menampilkan form ketika tombol ditekan
            $('#forumForm').show();
        });

        $('#cancelForumButton').click(function() {
            // Menyembunyikan form ketika tombol "Cancel" ditekan
            $('#forumForm').hide();
        });
    });
</script>
<script>
   $(document).ready(function() {
  $('[id^="replyButton-"]').click(function() {
    var forumId = $(this).attr('id').split('-')[1];
    var replyFormId = '#replyForm-' + forumId;

    $(this).hide();
    $(replyFormId).show();
  });

  $('[id^="cancelButton-"]').click(function() {
    var forumId = $(this).attr('id').split('-')[1];
    var replyButtonId = '#replyButton-' + forumId;
    var replyFormId = '#replyForm-' + forumId;

    $(replyButtonId).show();
    $(replyFormId).hide();
  });
});
</script>