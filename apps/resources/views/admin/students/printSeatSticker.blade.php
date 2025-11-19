<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seat Stickers - Print</title>
        <link rel="shortcut icon" href="{{ asset('assets/admin/img/logo/favicon.png') }}">

        <link href='https://fonts.googleapis.com/css?family=Barlow' rel='stylesheet'>
        <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <style>
            *{
                box-sizing: border-box;
                font-family: 'Barlow';
                font-size: 11pt;
                margin: 0;
                padding: 0;
            }

            /* A4 page rules for print */
            @page { size: A4; margin: 0;}

            /* Page container that represents one A4 sheet */
            .a4-sheet {
                width: 8.268in; /* A4 width */
                height: 11.693in; /* A4 height */
                padding: 0.3in;   /* internal margin (adjust) */
                margin: 0 auto;
                border: 1px solid #ccc;
                /* Visual aid for screen only; removed on print */
                background: white;
                page-break-after: always; /* each .a4-sheet becomes its own printed page */
                margin-bottom: 0.5in;
            }

            /* When printing on some browsers, width/height may be ignored; ensure it prints well */
            @media print {
                body {
                    margin: 0;
                    -webkit-print-color-adjust: exact;
                }
                .no-print { display: none !important; } /* hide buttons when printing */
                .a4-sheet { box-shadow: none; border: none; }
            }

        </style>
    </head>
    <body>

        <div class="container-fluid my-2 no-print">
        <div class="d-flex justify-content-center align-items-center">
            <div>
            <button class="btn btn-primary btn-sm" onclick="window.print()">Print</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
        </div>
        </div>

        {{-- Loop through each a4-sheet (chunk/groups of 8) --}}
        @foreach($users->chunk(8) as $page)
            <div class="a4-sheet">
                <div class="row g-3">
                    @foreach($page as $user)
                    {{-- Each sticker occupies col-6 (2 per row) --}}
                    <div class="col-6">
                        <div class="sticker border border-2 border-success rounded-2">
                            {{-- Logo, Institute name --}}
                            <div class="col-12 d-flex justify-content-center align-items-center p-2">
                                <div class="col-3 text-end pe-3">
                                    @switch($user->institute_name)
                                        @case('Sirikotia Hafezia Nurani Model Madrasha')
                                            <img src="{{ asset('assets/admin/img/institutes/logo-1.png') }}"
                                                width="50px" height="auto">
                                            @break
                                        @case('AMN Islamia Madrasha')
                                            <img src="{{ asset('assets/admin/img/institutes/logo-2.png') }}"
                                                width="50px" height="auto">
                                            @break
                                        @default

                                    @endswitch
                                </div>
                                <div class="col-9">
                                    @switch($user->institute_name)
                                        @case('Sirikotia Hafezia Nurani Model Madrasha')
                                            <img src="{{ asset('assets/admin/img/institutes/title-header-1.png') }}"
                                                width="250px" height="auto">
                                            @break
                                        @case('AMN Islamia Madrasha')
                                            <img src="{{ asset('assets/admin/img/institutes/title-header-2.png') }}"
                                                width="250px" height="auto">
                                            @break
                                        @default

                                    @endswitch


                                </div>
                            </div>

                            {{-- Sticker Title --}}
                            <div class="col-12 d-flex flex-column">
                                <span class="bg-success text-white text-center "><b class="fs-6">{{ $exam_terms }}-{{ now()->year }}</b></span>
                            </div>

                            {{-- Examinee Details --}}
                            <div class="col-12 mt-1 px-2">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Name: </td>
                                            <td><b>{{ $user->name }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Father: </td>
                                            <td><b>{{ $user->father_name_en }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Division: </td>
                                            <td><b>{{ $user->division }}</b></td>
                                            <td class="ps-3">Group: </td>
                                            <td><b>{{ $user->group }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            {{-- Examinee Pic, Class, Roll --}}
                            <div class="col-12 p-2 d-flex flex-row justify-content-center">
                                <div class="col-4">
                                    <div class="col-12 text-start">
                                        <img src="{{ asset('assets/'.$user->profile_pic) }}"
                                            width="60px" height="auto">
                                    </div>
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <div class="col-12 text-center">
                                        <div class="col-12">Class</div>
                                        <div class="col-12"><b class="fs-3">{{ $user->class }}</b></div>
                                    </div>
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <div class="col-12 text-center border border-2 border-success rounded-2">
                                        <div class="col-12">Roll</div>
                                        <div class="col-12"><b class="fs-3">{{ $user->roll }}</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>{{-- div.sticker --}}
                    </div>{{-- div.col-6 --}}
                    @endforeach
                </div> {{-- .row --}}
            </div> {{-- .a4-sheet --}}
        @endforeach


        <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
