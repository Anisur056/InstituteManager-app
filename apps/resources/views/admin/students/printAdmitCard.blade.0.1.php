<html >
<head>
    <link href='https://fonts.googleapis.com/css?family=Barlow' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        /* --- Print and Page Setup --- */
        @page { size: A4; margin: 0 }

        *{
            font-size: 9pt;
        }

        body {
            margin: 0;
            background-color: #f0f0f0;
            display: block;
            font-family: 'Barlow';

        }

        /* --- New Styles for A4 Sheet Wrapper (Holds 2 Cards) --- */
        .a4-sheet {
            /* Defines the A4 size and sets up the layout */
            display: grid;
            grid-template-columns: 1fr;
            width: 8.268in;
            height: 11.693in;
            margin: 0;
            overflow: hidden;
            page-break-after: always; /* Forces a new A4 page after every 2 cards */
            box-sizing: border-box;
            padding: .3in;
            background-color: #fafafa;
        }

        /* --- Modified Admit Card Styles (1/2 A4 Height) --- */
        .admit-card {
            /* * Height is 1/2 of the effective printable height of the wrapper.
             * The A4 height is 11.693in. The wrapper padding is .3in top/bottom,
             * so printable height is 11.693 - (2 * 0.3) = 11.093in.
             * 11.093in / 2 = ~5.546in.
             * Using 5.5in for a slightly cleaner division.
             */
            height: 5in; /* CHANGED from 3.69in to 5.5in */
            border: 1px solid #222222;
            border-radius: 15px;
            width: 100%;
            margin-top: 0.2in;
            overflow: hidden;
            position: relative; /* Context for absolutely positioned children */
            box-sizing: border-box;
            page-break-after: auto;
            padding: .1in;
            background-color: transparent;
            page-break-inside: avoid; /* Prevents a single card from splitting across pages */
        }
        /* Grid Css Style */

        /* .admit-card img{
            width: 100%;
        } */

        /* --- Adjusted Absolute Positioning (Relative to the 5.5in card height) --- */

        /* Content block */
        .admit-card .admit-content{
            position: absolute;
            width: 100%;
            top: 2.5in; /* ADJUSTED for the increased card height (e.g., from 1.6in to 2.5in) */
            left: 0.3in;
        }

        .admit-content p{
            margin: 0;
            line-height: 20pt;
        }

        /* Roll number block */
        .admit-card .right{
            position: absolute;
            top: 3.2in; /* ADJUSTED for the increased card height (e.g., from 2.1in to 3.2in) */
            right: 0.55in;
            font-size: 18pt;
            font-weight: bold;
        }

        /* Profile picture block */
        .admit-card .pic{
            width: 90px;
            position: absolute;
            top: 1in; /* ADJUSTED for the increased card height (e.g., from .8in to 1in) */
            right: 0.3in;
        }

        /* QR code block */
        .admit-card .qrcode-container{
            width: 80;
            height: 80;
        }

        .admit-card .qrcode-container img{
            width: 80;
            height: 80;
        }

        /** For screen preview **/
        @media screen {
            body { background: #e0e0e0 }
            .a4-sheet {
                background: white;
                box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
                margin: 5mm auto;
                height: auto; /* Allow viewing all cards on screen */
                page-break-after: auto;
            }
        }

        /** Fix for Chrome issue #273306 **/
        @media print {
            body.A4 { width: 8.268in;}
        }
    </style>
</head>
<body class="A4">

    @php
        // CHANGED: Use chunk(2) to group users into chunks of 2 for 2 rows per page.
        // Using `chunk(2)` assumes $users is a Laravel Collection.
        // If it's a plain PHP array, use: $user_chunks = array_chunk($users, 2);
        $user_chunks = $users->chunk(2);
    @endphp

    @foreach($user_chunks as $chunk_index => $user_chunk)
        <section class="a4-sheet" id="a4-page-{{ $chunk_index }}">

            @foreach($user_chunk as $user)
                <div class="admit-card" id="a4-pdf-{{ $user->roll }}">

                    {{-- Logo, title-header, pic --}}
                    <div class="row">
                        <div class="col-3 col-md-3">
                            <img src="{{ asset('assets/admin/img/institutes/logo-1.png') }}"
                                    width="70px" height="auto">
                        </div>
                        <div class="col-6 col-md-6 text-center">
                            <img src="{{ asset('assets/admin/img/institutes/title-header-1.png') }}"
                                    width="300px" height="auto">
                        </div>
                        <div class="col-3 col-md-3 text-end">
                            <img src="{{ asset('assets/'.$user->profile_pic) }}"
                                    width="60px" height="auto">
                        </div>
                    </div>

                    <div class="row">
                        <span class="bg-success text-white fs-4 px-2 text-center mt-2">ADMIT CARD</span>
                        <span class="text-dark fs-5 text-center">FINAL YEAR EXAM-2025</span>
                    </div>

                    <div class="row mt-2">
                        <div class="col-10">
                            <table class="table table-striped table-sm table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name: </th>
                                    <th>{{ $user->name }}</th>
                                    <th>Branch: </th>
                                    <td>{{ $user->branch }}</td>
                                </tr>
                                <tr>
                                    <th>Division: </th>
                                    <td>{{ $user->division }}</td>
                                    <th>Shift: </th>
                                    <td>{{ $user->shift }}</td>
                                </tr>
                                <tr>
                                    <th>Class: </th>
                                    <td>{{ $user->class }}</td>
                                    <th>Section: </th>
                                    <td>{{ $user->section }}</td>
                                </tr>
                                <tr>
                                    <th>Group: </th>
                                    <td>{{ $user->group }}</td>
                                    <th>Roll: </th>
                                    <td><b><span class="fs-5">{{ $user->roll }}</span></b></td>
                                </tr>

                            </tbody>
                            </table>
                        </div>
                        <div class="col-2 text-center">
                            <span class="qrcode-container" id="qrcode-{{ $user->roll }}"></span>
                        </div>
                    </div>

                    <div class="container-fluid bg-light p-2">
                        <p class="m-0"><b>{{ $user->name }} ({{ $user->roll }})</b>- is allowed to appear in the term of 2ND-TERM-EXAMINATION - 2025.</p>
                        <p class="m-0"># Examinee must bring this card in the examination hall. Arrive at least 30 minutes before the exam time.</p>
                        <p class="m-0"># Examinee must bring their own Pen(black or blue ink only allowed), Scale(plastic only allowed), Pencil, Eraser.</p>
                        <p class="m-0"># Do not bring any unauthorised material (e.g. written notes, books, paper and sticky tape eraser).</p>
                    </div>

                    {{-- <div class="row">
                        <div class="col-12 text-center bg-success text-white p-1">
                            Exam Rutine
                        </div>
                        <div class="col-12">
                            <table class="table table-striped table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <th>Bangla</th>
                                        <th>15-11-2025</th>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> --}}



                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('assets/admin/img/institutes/SIGN-PRINCIPLE-SEAL.png') }}"
                                    width="100px" height="auto">
                        </div>
                        <div class="col-4 text-center">

                        </div>
                        <div class="col-4">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="m-0">Signature of Principal</p>
                        </div>
                        <div class="col-4 text-center">
                            <b><p class="m-0">Date of Issue: {{ date('d-m-Y') }}</p></b>
                        </div>
                        <div class="col-4">
                            <p class="m-0 text-end">Signature of Class Teacher</p>
                        </div>
                    </div>

                </div>
            @endforeach
        </section>
    @endforeach

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

    {{-- <script> window.print(); </script> --}}

    {{-- <script src="source/html2pdf.js"></script>
    <script>
        // Note: For multi-page PDF generation, you may need a more advanced setup
        // using the library's ability to handle multiple elements or a single large element.
    </script> --}}
</body>
</html>
