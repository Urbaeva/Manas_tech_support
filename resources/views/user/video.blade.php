@extends('user.layouts.main')
@section('content')

    <style>
        .video-container {
            position: relative;
            overflow: hidden;
            padding-bottom: 56.25%; /* 16:9 aspect ratio, adjust as needed */
            max-width: 100%;
        }

        video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    <!-- Hero Section Begin -->
    <!-- Hero Section End -->


    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <h4>{{ __('pathLang.other_videos') }}</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($video->service->videos as $video_o)
                                    <a href="{{ route('user.service.video', $video_o->id) }}"
                                       class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img style="width: 70px; height: 70px; border: 2px solid #ddd"
                                                 src="{{ asset('storage/'.$video_o->service->logo) }}" alt="">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>{{ $video_o->getTitle() }}</h6>
                                            @php
                                                $date = \Illuminate\Support\Carbon::parse($video_o->created_at);
                                            @endphp
                                            <span
                                                style="font-size: 10px;">{{ $date->format('F') }} {{ $date->day }}, {{ $date->year }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>{{ __('pathLang.categories') }}</h4>
                            <div class="blog__sidebar__item__tags">
                                @foreach($category->department->categories as $category_o)
                                    <a href="#">{{ $category_o->getTitle() }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">

                        <div class="video-container">
                            <video controls style="width: 100%; height: auto;" id="videoPlayId">
                                <source src="{{ route('user.service.getVideo', $video->id) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>

                        <a href="{{ route('user.service.getVideo', $video->id) }}">
                            <h3 class="text-center">{{ $video->getTitle() }}</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let session = "{{csrf_token()}}";
        let watched_videos = localStorage.getItem('watched_videos');


        document.getElementById('videoPlayId').addEventListener('play', function() {
            if(watched_videos)
            {
                if(typeof watched_videos === 'string')
                {
                    watched_videos = JSON.parse(watched_videos);
                }

                if(!watched_videos.hasOwnProperty(session))
                {
                    watched_videos = {};
                    watched_videos[session] = {};
                    watched_videos[session][video] = true;
                    localStorage.setItem('watched_videos', JSON.stringify(watched_videos));
                    queryToServer(video);
                }
                else{
                    if(!watched_videos[session].hasOwnProperty(video))
                    {
                        watched_videos[session][video] = true;
                        localStorage.setItem('watched_videos', JSON.stringify(watched_videos));
                        queryToServer(video);
                    }
                }
            }
            else{
                watched_videos = {};
                watched_videos[session] = {};
                watched_videos[session][video] = true;
                localStorage.setItem('watched_videos', JSON.stringify(watched_videos));
                queryToServer(video);
            }
        });
        function queryToServer(video)
        {
            let url = `/save/video/view/${video}`;
            fetch(url, {
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    </script>
    <!-- Related Blog Section End -->

@endsection
