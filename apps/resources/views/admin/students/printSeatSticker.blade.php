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

            .qrcode-container img{
                width: 50px; height: 50px;
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

            .sticker {
                /* height: calc((297mm - 16mm - 3 * 8mm) / 4);  */
                /* padding: 8px; */
                border: 1px solid #000;
                border-radius: 8px;
                /* margin-bottom: 8px;  */
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

        {{-- Iterate through each a4-sheet (chunk of 8) --}}
        @foreach($users->chunk(8) as $page)
            <div class="a4-sheet">
                <div class="row g-4">
                    @foreach($page as $user)
                    {{-- Each sticker occupies col-6 (2 per row) --}}
                    <div class="col-6">
                        <div class="sticker">

                            {{-- Logo, title-header, pic --}}
                            <div class="col-12 d-flex justify-content-center align-items-center p-2">
                                <div class="col-3 text-center">
                                    <img src="{{ asset('assets/admin/img/institutes/logo-1.png') }}"
                                            width="50px" height="auto">
                                </div>
                                <div class="col-9 text-center">
                                    <img src="{{ asset('assets/admin/img/institutes/title-header-1.png') }}"
                                            width="200px" height="auto">
                                </div>                                
                            </div>

                            {{-- Card Title --}}
                            <div class="col-12 d-flex flex-column">
                                <span class="bg-success text-white text-center "><b class="fs-6">{{ $exam_terms }}-{{ now()->year }}</b></span>
                            </div>

                            <div class="col-12 mt-1 px-2">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Name: </td>
                                            <td><b>{{ $user->name }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Father: </td>
                                            <td><b>{{ $user->father_name }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Division: </td>
                                            <td><b>{{ $user->division }}</b></td>
                                            <td>Group: </td>
                                            <td><b>{{ $user->group }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

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
                                    <div class="col-12 text-center">
                                        <div class="col-12">Roll</div>
                                        <div class="col-12"><b class="fs-3">{{ $user->roll }}</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    

                </div> {{-- .row --}}
            </div> {{-- .a4-sheet --}}
        @endforeach

        <!-- Bootstrap JS (optional, not required for printing) -->
        <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/qrcode.js') }}"></script>

        <script type="text/javascript">
        // Always explain the code with comments.
        // Convert the PHP collection/array into a JavaScript array for client-side processing.
        const usersData = @json($users);

        // Loop through all user data to generate a QR code for each card.
        usersData.forEach(user => {
            // Get the unique element ID for this user's QR code container.
            const qrcodeElement = document.getElementById(`qrcode-${user.roll}`);

            // Check if the container element exists before trying to create the QR code.
            if (qrcodeElement) {
                // Define the content for the QR code, including the user's details.
                const qrText = `Name: ${user.name}\n Class: ${user.class}\n Roll: ${user.roll}`;

                // Create the new QR code instance, placing it in the specific container.
                new QRCode(qrcodeElement, {
                    text: qrText,
                    colorDark : "#000000",
                    colorLight : "#ffffff",
                    correctLevel : QRCode.CorrectLevel.H
                });
            }
        });
    </script>
    </body>
</html>
