@extends('admin.themes.main')

@section('page-title') Gallery- Edit- {{$video_gallery->youtube_link}} @endsection

@section('page-body')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Gallery- Edit- {{$video_gallery->youtube_link}}
                </h5>
                <a href="{{ route('video-gallery.index') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-chevron-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('video-gallery.update', $video_gallery->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUt')
                    <div class="mb-3">
                        <label class="form-label">YouTube Link<span class="text-danger ms-2">(*)</span></label>
                        <input  value="{{ old('youtube_link', $video_gallery->youtube_link) }}"
                                type="text"
                                class="form-control @error('youtube_link') is-invalid @enderror"
                                name="youtube_link"
                                id="youtube_link"
                                onkeyup="updateVideoPreview()">
                        <span class="text-danger"> @error('youtube_link') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Enable Status</label>
                        <select class="form-select form-select-sm" name="enable_status">
                            <option value="on" {{ old('enable_status', $video_gallery->enable_status) == 'on' ? 'selected' : '' }}>On</option>
                            <option value="off" {{ old('enable_status', $video_gallery->enable_status) == 'off' ? 'selected' : '' }}>Off</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Video Preview</label>
                        <div id="video-preview"></div>
                    </div>

                    <script>
                        function updateVideoPreview() {
                            const link = document.getElementById('youtube_link').value;
                            const videoId = getYoutubeId(link);
                            const previewDiv = document.getElementById('video-preview');
                            
                            if (videoId) {
                                previewDiv.innerHTML = `<iframe width="100%" height="315" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>`;
                            } else {
                                previewDiv.innerHTML = 'Invalid YouTube URL';
                            }
                        }

                        function getYoutubeId(url) {
                            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                            const match = url.match(regExp);
                            return (match && match[2].length === 11) ? match[2] : false;
                        }

                        // Load preview when page loads
                        document.addEventListener('DOMContentLoaded', function() {
                            updateVideoPreview();
                        });
                    </script>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

