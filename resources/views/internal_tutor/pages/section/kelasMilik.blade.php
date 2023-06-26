
<style>
    
    .hover-img:hover .middle {
        opacity: 1;
    }

    .hover-img:hover img {
        opacity: 1;
        filter: brightness(70%);
        
    }
    .btn-dashboard:hover {
        background: rgba(6, 56, 82, 0.10); 
    }
</style>
<div class="row tab-pane active" id="kelasAktif" role="tabpanel">
    @if($count_classes != 0)
        @php
            $activeClassExists = false;
        @endphp
        @foreach ($classes as $ckey => $class)
            @if($class->status == 'active')
                @php
                $activeClassExists = true;
                    $list_nilai_proyek = \App\Models\ProjectLog::join('users', 'users.id', '=', 'project_log.user_id')
                    ->join('quest', 'quest.class_id', '=', 'project_log.class_id')
                    ->join('classes', 'classes.id', '=', 'project_log.class_id')
                    ->leftJoin('quest_completion', function($join) {
                        $join->on('quest_completion.user_id', '=', 'project_log.user_id')
                            ->on('quest_completion.quest_id', '=', 'quest.id');
                    })
                    ->where('project_log.class_id', $class->id)
                    ->select([
                        'project_log.user_id as user_id',
                        'project_log.class_id as class_id',
                        'project_log.photo as photo',
                        'classes.price as class_price',
                        \DB::raw('MAX(project_log.id) as id'),
                        \DB::raw('MAX(project_log.score) as score'),
                        'users.name as user_name',
                        'users.email as user_email',
                        \DB::raw('MAX(CASE WHEN quest_completion.quest_type = \'posttest\' THEN quest_completion.score ELSE NULL END) as quest_score'),
                    ])
                    ->groupBy('project_log.user_id', 'project_log.class_id','project_log.photo', 'users.name', 'users.email','classes.price')
                    ->get();
                @endphp
                <div class="row" style="margin:48px 0px;">
                    <div class="col-sm-4">
                        <a class="hover-img" href="{{ route('internal_tutor.class.informasi.edit', $class->slug) }}">
                            <img style="width: 100%;height:144px;margin:0px;"
                                src="{{ asset($class->thumbnail) }}"
                                alt="">                        
                            <div class="middle">
                                <div class="text hover-text-card" style="color: #063852">Edit Kelas</div>
                            </div>            
                        </a>
                    </div>
                    <div class="col-sm-7">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="text-kelas-admin">
                                {{ $class->name }}
                            </p>
                            <a class="btn-edit hover-img" id="nav-dashboard-tab" href="{{ route('internal_tutor.class.informasi.edit', $class->slug) }}">
                                Edit Kelas
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="m-0 d-flex align-items-center">
                                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path style="fill:black !important" d="M0.833984 13.6668V11.3335C0.833984 10.8613 0.955512 10.4272 1.19857 10.0314C1.44162 9.63558 1.76454 9.3335 2.16732 9.12516C3.02843 8.69461 3.90343 8.37169 4.79232 8.15641C5.68121 7.94113 6.58398 7.8335 7.50065 7.8335C8.41732 7.8335 9.3201 7.94113 10.209 8.15641C11.0979 8.37169 11.9729 8.69461 12.834 9.12516C13.2368 9.3335 13.5597 9.63558 13.8027 10.0314C14.0458 10.4272 14.1673 10.8613 14.1673 11.3335V13.6668H0.833984ZM15.834 13.6668V11.1668C15.834 10.5557 15.6638 9.96891 15.3236 9.40641C14.9833 8.84391 14.5007 8.36127 13.8757 7.9585C14.584 8.04183 15.2507 8.18419 15.8757 8.38558C16.5007 8.58697 17.084 8.8335 17.6257 9.12516C18.1257 9.40294 18.5076 9.71197 18.7715 10.0522C19.0354 10.3925 19.1673 10.7641 19.1673 11.1668V13.6668H15.834ZM7.50065 7.00016C6.58398 7.00016 5.79926 6.67377 5.14648 6.021C4.49371 5.36822 4.16732 4.5835 4.16732 3.66683C4.16732 2.75016 4.49371 1.96544 5.14648 1.31266C5.79926 0.659885 6.58398 0.333496 7.50065 0.333496C8.41732 0.333496 9.20204 0.659885 9.85482 1.31266C10.5076 1.96544 10.834 2.75016 10.834 3.66683C10.834 4.5835 10.5076 5.36822 9.85482 6.021C9.20204 6.67377 8.41732 7.00016 7.50065 7.00016ZM15.834 3.66683C15.834 4.5835 15.5076 5.36822 14.8548 6.021C14.202 6.67377 13.4173 7.00016 12.5007 7.00016C12.3479 7.00016 12.1534 6.9828 11.9173 6.94808C11.6812 6.91336 11.4868 6.87516 11.334 6.8335C11.709 6.38905 11.9972 5.896 12.1986 5.35433C12.4 4.81266 12.5007 4.25016 12.5007 3.66683C12.5007 3.0835 12.4 2.521 12.1986 1.97933C11.9972 1.43766 11.709 0.944607 11.334 0.500163C11.5284 0.430718 11.7229 0.385579 11.9173 0.364746C12.1118 0.343913 12.3062 0.333496 12.5007 0.333496C13.4173 0.333496 14.202 0.659885 14.8548 1.31266C15.5076 1.96544 15.834 2.75016 15.834 3.66683Z" fill="#222222"/>
                                        </svg>                                    
                                        &nbsp;Total user
                                </p>
                            </div>
                            <div class="col-sm-8">
                                <p class="m-0">
                                    : {{ count($list_nilai_proyek) }} User
                                </p>
                            </div>
                        </div>
                        <div class="row" style="margin-top:8px; margin-bottom:8px;">
                            <div class="col-sm-4">
                                <p class="m-0 d-flex align-items-center">
                                    <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path style="fill:black !important" d="M2.16667 18.3335C1.70833 18.3335 1.31597 18.1703 0.989583 17.8439C0.663194 17.5175 0.5 17.1252 0.5 16.6668V6.66683C0.5 6.2085 0.663194 5.81613 0.989583 5.48975C1.31597 5.16336 1.70833 5.00016 2.16667 5.00016H3.83333C3.83333 3.84738 4.23958 2.86475 5.05208 2.05225C5.86458 1.23975 6.84722 0.833496 8 0.833496C9.15278 0.833496 10.1354 1.23975 10.9479 2.05225C11.7604 2.86475 12.1667 3.84738 12.1667 5.00016H13.8333C14.2917 5.00016 14.684 5.16336 15.0104 5.48975C15.3368 5.81613 15.5 6.2085 15.5 6.66683V16.6668C15.5 17.1252 15.3368 17.5175 15.0104 17.8439C14.684 18.1703 14.2917 18.3335 13.8333 18.3335H2.16667ZM8 11.6668C9.15278 11.6668 10.1354 11.2606 10.9479 10.4481C11.7604 9.63558 12.1667 8.65294 12.1667 7.50016H10.5C10.5 8.19461 10.2569 8.78488 9.77083 9.271C9.28472 9.75711 8.69444 10.0002 8 10.0002C7.30556 10.0002 6.71528 9.75711 6.22917 9.271C5.74306 8.78488 5.5 8.19461 5.5 7.50016H3.83333C3.83333 8.65294 4.23958 9.63558 5.05208 10.4481C5.86458 11.2606 6.84722 11.6668 8 11.6668ZM5.5 5.00016H10.5C10.5 4.30572 10.2569 3.71544 9.77083 3.22933C9.28472 2.74322 8.69444 2.50016 8 2.50016C7.30556 2.50016 6.71528 2.74322 6.22917 3.22933C5.74306 3.71544 5.5 4.30572 5.5 5.00016Z" fill="#222222"/>
                                        </svg>
                                        
                                        &nbsp;&nbsp;Pendapatan
                                </p>
                            </div>
                            <div class="col-sm-8">
                                <p class="m-0">
                                    @php
                                    $total_price = 0;
                                    @endphp

                                    @foreach($list_nilai_proyek as $nilai_proyek)
                                        @php
                                        $total_price += ($nilai_proyek->class_price);
                                        @endphp
                                    @endforeach
                                    <p class="m-0">
                                        : Rp.{{ number_format($total_price) }}
                                    </p>
                                </p>
                            </div>
                        </div>
                        <div class="nav-container pt-2">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="btn-dashboard" id="nav-dashboard-tab-1" data-bs-toggle="tab" href="#lihatForum{{ $ckey }}">
                                        <b>Lihat Forum</b>
                                    </a>
                                </li>
                                <li class="nav-item ps-3">
                                    <a class="btn-dashboard" id="nav-dashboard-tab-2" data-bs-toggle="tab" href="#nilaiProyek{{ $ckey }}">
                                        <b>Nilai Proyek</b>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="tab-content">
                            @include('internal_tutor.pages.section.lihatForum')
                            @include('internal_tutor.pages.section.nilaiProyek')
                        </div>
                    </div>
                </div>
            @else
            {{-- Kosong --}}
            @endif
        @endforeach
        @if(!$activeClassExists)
            <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;margin-top:40px;">
                Tidak ada kelas yang aktif
            </h2>
        @endif
    @else
    <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;margin-top:40px;">
        Tidak ada kelas yang dimiliki.
    </h2>
    @endif
</div>
