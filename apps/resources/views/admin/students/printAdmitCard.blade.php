<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admit Cards - Print</title>
        <link rel="shortcut icon" href="{{ asset('assets/admin/img/logo/favicon.png') }}">

        <link href='https://fonts.googleapis.com/css?family=Barlow' rel='stylesheet'>
        <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <style>
            *{
                box-sizing: border-box;
                font-family: 'Barlow';
                font-size: 10pt;
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
                width: 100%; height: 90px;
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

            .admit-card {
                border: 1px solid #000;
                border-radius: 8px;
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

        {{-- Loop through each a4-sheet (chunk/groups of 1) --}}
        @foreach($users->chunk(1) as $page)
            <div class="a4-sheet">
                <div class="row">
                    @foreach($page as $user)
                    {{-- Each Admit Card occupies col-12 --}}
                    <div class="col-12">
                        <div class="admit-card">
                            {{-- Logo, title-header, pic --}}
                            <div class="col-12 d-flex flex-row p-3">
                                <div class="col-3 d-flex flex-column align-items-start">
                                    <img src="{{ asset('assets/admin/img/institutes/logo-1.png') }}"
                                            width="100px" height="auto">
                                </div>
                                <div class="col-6 d-flex flex-column align-items-start">
                                    <img src="{{ asset('assets/admin/img/institutes/title-header-1.png') }}"
                                            width="400px" height="auto">
                                </div>
                                {{-- QR Code --}}
                                <div class="col-3 d-flex flex-column align-items-end">
                                    <span class="qrcode-container" id="qrcode-{{ $user->roll }}"></span>
                                </div>
                            </div>
                            
                            {{-- Admit Card Title --}}
                            <div class="col-12 d-flex flex-column">
                                <span class="bg-success text-white text-center mt-2"><b class="fs-4">ADMIT CARD</b></span>
                                <span class="text-dark fs-5 text-center"><b class="fs-5">{{ $exam_terms }}-{{ now()->year }}</b></span>
                            </div>

                            {{-- Examinee Details --}}
                            <div class="col-12 mt-2">
                                <span class="ms-2"><b>Examinee Details: </b></span>
                                <table class="table table-striped table-sm table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Name: </th>
                                            <th>{{ $user->name }}</th>
                                            <th>Father: </th>
                                            <th>{{ $user->father_name }}</th>
                                        </tr>
                                        <tr>
                                            <th>Roll: </th>
                                            <td><b>{{ $user->roll }}</b></td>
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
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <p class="text-center"><b>{{ $user->name }}, Roll-{{ $user->roll }}</b>- is allowed to appear in the term of <b>FINAL YEAR EXAM-2025</b> .</p>

                            {{-- Exam Rutine Table --}}
                            <div class="col-12 mt-2">
                                @php
                                    $jsonData = file_get_contents(resource_path('views/admin/students/printAdmitCardData.json'));
                                    $examData = json_decode($jsonData, true);
                                    $exams = $examData[$user->class] ?? [];
                                    
                                    // Split the exams array into two halves
                                    $totalExams = count($exams);
                                    $midpoint = ceil($totalExams / 2);
                                    $leftExams = array_slice($exams, 0, $midpoint);
                                    $rightExams = array_slice($exams, $midpoint);
                                @endphp
                                
                                <span class="ms-2"><b>Exam Rutine: </b></span>
                                
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-6">
                                        <table class="table table-striped table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Exam Subject</th>
                                                    <th>Exam Date</th>
                                                    <th>Exam Time</th>
                                                </tr>
                                                @forelse($leftExams as $exam)
                                                    <tr>
                                                        <td>{{ $exam['id'] }}</td>
                                                        <td>{{ $exam['subject'] }}</td>
                                                        <td>{{ $exam['date'] }}</td>
                                                        <td>09:00 AM</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">No exam routine found for your class.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <!-- Right Column -->
                                    <div class="col-6">
                                        <table class="table table-striped table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Exam Subject</th>
                                                    <th>Exam Date</th>
                                                    <th>Exam Time</th>
                                                </tr>
                                                @forelse($rightExams as $exam)
                                                    <tr>
                                                        <td>{{ $exam['id'] }}</td>
                                                        <td>{{ $exam['subject'] }}</td>
                                                        <td>{{ $exam['date'] }}</td>
                                                        <td>09:00 AM</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">&nbsp;</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- Rules Exam Note --}}
                            <div class="container-fluid p-2 text-danger">
                                <p class="m-0"># Examinee must bring this card in the examination hall. Arrive at least 30 minutes before the exam time.</p>
                                <p class="m-0"># Examinee must bring their own Pen(black or blue ink only allowed), Scale(plastic only allowed), Pencil, Eraser.</p>
                                <p class="m-0"># Do not bring any unauthorised material (e.g. written notes, books, paper and sticky tape eraser).</p>
                            </div>

                            {{-- Signatures --}}
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
                            </div>{{-- Signatures --}}

                        </div>{{-- div.admit-card --}}
                    </div>{{-- div.col-6 --}}
                    @endforeach
                </div> {{-- .row --}}
            </div> {{-- .a4-sheet --}}
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
    </body>
</html>
