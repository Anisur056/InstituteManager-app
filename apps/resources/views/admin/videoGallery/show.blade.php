@extends('admin.themes.main')

@section('page-title') Video Gallery- {{$video_gallery->youtube_link}} @endsection

@section('css')

@endsection

@section('page-body')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Video Gallery- {{$video_gallery->youtube_link}}
                </h5>
                <a href="{{ route('video-gallery.index') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-list"></i>
                    <span>All Video</span>
                </a>
            </div>
            <div class="card-body">
                <p> ID: {{ $video_gallery->id }}</p>
                <p> Title: {{ $video_gallery->youtube_link }}</p>
                <p> Enable Status: {{ $video_gallery->enable_status }}</p>

                <td data-label="Video Preview:">
                    <div class="youtube-player" data-link="{{$video_gallery->youtube_link}}" id="player-{{$video_gallery->id}}"></div>
                </td>

            </div>
        </div>
    </div>

@endsection

@section('js')

<script>
    // Render YouTube iframes for each player element and re-render on DataTable draw
    function getYoutubeId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = String(url).match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }

    function renderYoutubePlayers() {
        document.querySelectorAll('.youtube-player').forEach(function(el) {
            const link = el.dataset.link;
            const videoId = getYoutubeId(link);
            if (videoId) {
                const embedUrl = 'https://www.youtube.com/embed/' + videoId;
                el.innerHTML = '<iframe width="100%" height="400" src="' + embedUrl + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            } else {
                el.innerHTML = ''; // clear if invalid
            }
        });
    }

    // initial render and re-render when DataTable redraws rows
    renderYoutubePlayers();
    if (table && table.on) {
        table.on('draw', renderYoutubePlayers);
    }
</script>

@endsection
