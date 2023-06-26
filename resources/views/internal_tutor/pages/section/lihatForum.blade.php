<div style="margin-top:24px;" class="tab-pane" id="lihatForum{{ $ckey }}" role="tabpanel">
    <div>
        <p style="font-weight: 700;font-size: 18px;line-height: 22px;">
            Diskusi dengan teman-teman di Forum
        </p>
    </div>
    @if(count($list_forum) > 0)
        @foreach($list_forum as $forum)
            <div class="row mb-3" style="border: 1px solid #E6EBED;border-radius: 5px;padding: 16px;">
                <!-- Konten Forum -->
                <div class="col-sm-1">
                    @if($forum->avatar)
                        <img style="width: 50px; height:50px;border-radius:100px;margin:0px;" src="{{ asset($forum->avatar) }}" alt="">
                    @else
                        <img style="width: 50px; height:50px;border-radius:100px;margin:0px;" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q==" alt="">
                    @endif
                </div>
                <div class="col-sm-10">
                    <p class="m-0 text-chapter">
                        {{ $forum->name }}
                    </p>
                    <p style="margin: 8px 0px;">
                        {{ $forum->description }}
                    </p>
                </div>
                <!-- Form Reply -->
                <div style="display:flex; justify-content:right;">
                    <button id="replyButton-{{ $forum->id }}" class="btn fw-bold" style="background: #20A2EB;color:White;border-radius: 5px;padding: 10px;width: 98px;height: 44px;text-align">Reply</button>
                </div>

                <div id="replyForm-{{ $forum->id }}" style="display: none;">
                    <form action="{{ route('internal_tutor.pages.reply.forum.submit') }}" method="POST">
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
            </div>
            <!-- Reply yang Ada di Database -->
            <div class="replyContainer" style="margin-top: 16px;">
                @foreach($reply_forum->where('forum_id', $forum->id) as $reply)
                    <div class="row mb-2 reply" style="border-bottom: 3px solid rgba(32, 162, 235, 1);background:rgba(32, 162, 235, 0.1);border-radius: 5px;padding: 16px;">
                        <!-- Reply Forum -->
                        <div class="col-sm-1">
                        @if($reply->avatar)
                            <img style="width: 50px; height:50px;border-radius:100px;margin:0px;" src="{{ asset($reply->avatar) }}" alt="">
                            @if($reply->role_id == 2)
                                <div style="width: 50px;background-color: #ffffff;border-radius: 5px;">
                                    <p style="color: #FFC100!important;font-size: 16px;font-weight: 700;padding-left: 5px">Tutor</p>
                                </div>
                            @endif
                        @else
                            <img style="width: 50px; height:50px;border-radius:100px;margin:0px;" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q==" alt="">
                            @if($reply->role_id == 2)
                                <div style="width: 50px;background-color: #ffffff;border-radius: 5px;">
                                    <p style="color: #FFC100!important;font-size: 16px;font-weight: 700;padding-left: 5px">Tutor</p>
                                </div>
                            @endif
                        @endif
                        </div>
                        <div class="col-sm-10">
                            <p class="m-0 text-chapter">
                                {{ $reply->name }}
                            </p>
                            <p style="margin: 8px 0px;">
                                {{ $reply->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <p style="font-weight: 700;font-size: 18px;line-height: 22px;">
            Maaf, Forum belum dibuat untuk Kelas !
        </p>
    @endif
</div>
<script>
    const replyButton = document.getElementById('replyButton');
    const replyForm = document.getElementById('replyForm');
    const cancelButton = document.getElementById('cancelButton');

    replyButton.addEventListener('click', function() {
        replyButton.style.display = 'none';
        replyForm.style.display = 'block';
        cancelButton.style.display = 'block';
    });

    cancelButton.addEventListener('click', function() {
        replyButton.style.display = 'block';
        replyForm.style.display = 'none';
        cancelButton.style.display = 'none';
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