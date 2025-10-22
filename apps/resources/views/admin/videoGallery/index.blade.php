@extends('admin.themes.main')

@section('page-title') Video Gallery @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->
@endsection

@section('page-body')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Video Gallery
                </h5>
                <a href="{{ route('video-gallery.create') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus"></i>
                    <span>Add Video Gallery</span>
                </a>
            </div>
            <div class="card-body">

                <table id="dataTable" class="table table-striped table-bordered mobileResponsiveTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>YouTube Video Preview</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($gallerys as $data)
                    <tr>
                            <td data-label="ID:">{{$data->id}}</td>
                            <td data-label="Video Preview:">
                                <div class="youtube-player" data-link="{{$data->youtube_link}}" id="player-{{$data->id}}"></div>
                            </td>
                            <td data-label="Title:">{{$data->youtube_link}}</td>
                            <td data-label="Status:">{{$data->enable_status}}</td>
                            <td class="">
                                <a href="{{ route('video-gallery.show',$data->id) }}" class="btn btn-success rounded-3 m-1 w-100">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('video-gallery.edit',$data->id) }}" class="btn btn-warning rounded-3 m-1 w-100">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <form action="{{ route('video-gallery.destroy',$data->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-3 m-1 w-100"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                </table>

            </div>
        </div>
    </div>

@endsection


@section('js')
    <!-- Datatable -->
    <script >
      const table = new DataTable('#dataTable', {
          lengthMenu: [
              [-1, 10, 25, 50],
              ['All',10, 25, 50]
          ],
          order: [],
          scrollX: true,
          layout: {
            topStart: {
                buttons: ['copy', 'csv', 'excel', 'pdf',
                {
                    text: 'JSON',
                    action: function (e, dt, button, config) {
                        var data = dt.buttons.exportData();

                        DataTable.fileSave(new Blob([JSON.stringify(data)]), 'Export.json');
                    }
                },
                {
                  extend: 'print',
                  exportOptions: {
                    columns: ':visible'
                  },
                  autoPrint: false
                },
                {
                    extend: 'colvis',
                    collectionLayout: 'fixed columns',
                    popoverTitle: 'Column visibility control',
                    postfixButtons: ['colvisRestore']
                },
                ]
            },
            topEnd: 'search',
            bottomStart: 'pageLength',
            bottomEnd: 'info'
          }
      });

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
                  el.innerHTML = '<iframe width="100%" height="auto" src="' + embedUrl + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
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
    <!-- Datatable -->
@endsection
