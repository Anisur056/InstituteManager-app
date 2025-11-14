<html >
<head>
    <link href='https://fonts.googleapis.com/css?family=Barlow' rel='stylesheet'>
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        /* --- Print and Page Setup --- */
        @page { size: A4; margin: 0; }

        *{
            font-family: 'Barlow'; font-size: 10pt; box-sizing: border-box;
            margin: 0; padding: 0;
        }

        body {
            background-color: #f0f0f0;
        }

        /* --- New Styles for A4 Sheet Wrapper (Holds 2 Cards) --- */
        .a4-sheet {
            /* Defines the A4 size and sets up the layout */
            display: grid;
            grid-template-columns: 1fr;
            width: 8.268in;
            height: auto;
            overflow: hidden;
            page-break-after: always; /* Forces a new A4 page after every 2 cards */
            padding: .3in;
            padding-top: .2in;
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
            height: auto; /* CHANGED from 3.69in to 5.5in */
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

        /* QR code block */
        .admit-card .qrcode-container{
            width: 100px; height: 100px;
        }

        .admit-card .qrcode-container img{
            width: 100px; height: 100px;
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
        $user_chunks = $users->chunk(1);
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

                    {{-- Card Title --}}
                    <div class="row">
                        <span class="bg-success text-white text-center mt-2"><b class="fs-4">ADMIT CARD</b></span>
                        <span class="text-dark fs-5 text-center"><b class="fs-5">{{ $exam_terms }}-{{ now()->year }}</b></span>
                    </div>

                    <div class="row mt-2">
                        {{-- Examinee Details --}}
                        <div class="col-10">
                            <span class="d-block bg-success text-white text-center">Examinee Details</span>
                            <table class="table table-striped table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Name: </th>
                                        <th>{{ $user->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Roll: </th>
                                        <td><b><span class="fs-5">{{ $user->roll }}</span></b></td>
                                    </tr>
                                    <tr>
                                        <th>Branch: </th>
                                        <td>{{ $user->branch }}</td>
                                    </tr>
                                    <tr>
                                        <th>Division: </th>
                                        <td>{{ $user->division }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shift: </th>
                                        <td>{{ $user->shift }}</td>
                                    </tr>
                                    <tr>
                                        <th>Class: </th>
                                        <td>{{ $user->class }}</td>
                                    </tr>
                                    <tr>
                                        <th>Section: </th>
                                        <td>{{ $user->section }}</td>
                                    </tr>
                                    <tr>
                                        <th>Group: </th>
                                        <td>{{ $user->group }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        {{-- QR Code --}}
                        <div class="col-2 d-flex flex-column align-items-center justify-content-start">
                            <span class="qrcode-container" id="qrcode-{{ $user->roll }}"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            {{-- Exam Rutine JSON data --}}
                            @php
                                $jsonData = file_get_contents(resource_path('views/admin/students/printAdmitCardData.json'));
                                $examData = json_decode($jsonData, true);
                                $exams = $examData[$user->class] ?? [];
                                $counter = 1;
                            @endphp

                            <span class="d-block fs-4 bg-success text-white text-center">Exam Rutine</span>
                            <div class="col-12">
                                <table class="table table-striped table-sm table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Exam Subject</th>
                                            <th>Exam Date</th>
                                            <th>Exam Time</th>
                                        </tr>
                                        @forelse($exams as $exam)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $exam['subject'] }}</td>
                                            {{-- <td>{{ $exam['date']->format('M d, Y') }}</td> --}}
                                            <td>{{ \Carbon\Carbon::parse($exam['date'])->format('d M, Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($exam['date'])->format('d M, Y') }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No exam routine found for your class.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid border border-danger rounded-3 p-2 text-danger">
                        <p class="m-0"><b>{{ $user->name }} ({{ $user->roll }})</b>- is allowed to appear in the term of <b>FINAL YEAR EXAM-2025</b> .</p>
                        <p class="m-0"># Examinee must bring this card in the examination hall. Arrive at least 30 minutes before the exam time.</p>
                        <p class="m-0"># Examinee must bring their own Pen(black or blue ink only allowed), Scale(plastic only allowed), Pencil, Eraser.</p>
                        <p class="m-0"># Do not bring any unauthorised material (e.g. written notes, books, paper and sticky tape eraser).</p>
                    </div>

                    @php
                        $classTeachers = [
                            'Play' => 'assets/admin/img/signature/habibur-rahman.png',
                            'Nursery' => 'assets/admin/img/signature/mohammad-sadrul-ula.png',
                            'One' => 'assets/admin/img/signature/nasrin-akhter.png',
                            'Two' => 'assets/admin/img/signature/rasheda-akhter.png',
                            'Three' => 'assets/admin/img/signature/rofiqual-principal.png',
                            'Four' => 'assets/admin/img/signature/sufia-akhter-simi.png',
                        ];

                        $signaturePath = $classTeachers[$user->class] ?? 'assets/admin/img/signature/sample.jpg';
                    @endphp

                    <div class="row mt-3">
                        <div class="col-4 text-center d-flex flex-column align-items-center justify-content-end">
                            <img src="{{ asset('assets/admin/img/signature/rofiqual-principal-seal.png') }}"
                                    width="150px" height="auto">
                        </div>
                        <div class=" col-4 text-center d-flex flex-column align-items-center justify-content-end">

                        </div>
                        <div class="col-4 text-center d-flex flex-column align-items-center justify-content-end">
                            <img src="{{ asset($signaturePath) }}"
                                    width="150px" height="auto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 text-center d-flex flex-column align-items-center justify-content-end">
                            <p class="m-0">Signature of Principal</p>
                        </div>
                        <div class="col-4 text-center d-flex flex-column align-items-center justify-content-end">
                            <b><p class="m-0">This card was issued on: {{ date('d-m-Y') }}</p></b>
                        </div>
                        <div class="col-4 text-center d-flex flex-column align-items-center justify-content-end">
                            <p class="m-0 text-end">Signature of Class Teacher</p>
                        </div>
                    </div>

                </div>
            @endforeach
        </section>
    @endforeach

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

    {{-- <script> window.print(); </script> --}}

    {{-- <script src="source/html2pdf.js"></script>
    <script>
        // Note: For multi-page PDF generation, you may need a more advanced setup
        // using the library's ability to handle multiple elements or a single large element.
    </script> --}}
</body>
</html>
