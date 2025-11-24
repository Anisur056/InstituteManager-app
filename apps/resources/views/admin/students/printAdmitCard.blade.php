<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admit Cards - Print</title>
        <link rel="shortcut icon" href="{{ asset('assets/admin/img/logo/favicon.png') }}">

        <link href='https://fonts.googleapis.com/css?family=Barlow' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css2?family=Noto" rel="stylesheet">
        <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <style>
            *{
                box-sizing: border-box;
                font-family: 'Barlow';
                font-size: 10pt;
                margin: 0;
                padding: 0;
            }

            p {
                margin-bottom: 0;
            }

            .bangla{
                font-family: "Noto", serif;
                font-optical-sizing: auto;
                font-weight: 400;
                font-style: normal;
            }

            /* A4 page rules for print */
            @page { size: A4; margin: 0;}

            /* Page container that represents one A4 sheet */
            .a4-sheet {
                width: 8.268in; /* A4 width */
                height: 11.693in; /* A4 height */
                padding: 0.2in;   /* internal margin (adjust) */
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
                                    @switch($user->institute_name)
                                        @case('Sirikotia Hafezia Nurani Model Madrasha')
                                            <img src="{{ asset('assets/admin/img/institutes/logo-1.png') }}"
                                                    width="100px" height="auto">
                                            @break
                                        @case('AMN Islamia Madrasha')
                                            <img src="{{ asset('assets/admin/img/institutes/logo-2.png') }}"
                                                    width="100px" height="auto">
                                            @break
                                        @default

                                    @endswitch
                                </div>
                                <div class="col-6 d-flex flex-column align-items-start">
                                    @switch($user->institute_name)
                                        @case('Sirikotia Hafezia Nurani Model Madrasha')
                                            <img src="{{ asset('assets/admin/img/institutes/title-header-1.png') }}"
                                                width="400px" height="auto">
                                            @break
                                        @case('AMN Islamia Madrasha')
                                            <img src="{{ asset('assets/admin/img/institutes/title-header-2.png') }}"
                                                    width="400px" height="auto">
                                            @break
                                        @default

                                    @endswitch


                                </div>
                                {{-- QR Code --}}
                                <div class="col-3 d-flex flex-column align-items-end">
                                    <span class="qrcode-container" id="qrcode-{{ $user->id }}"></span>
                                </div>
                            </div>

                            {{-- Exam Center --}}
                            <span class="text-center text-white d-block bg-success py-1"><b>পরীক্ষার কেন্দ্র: ক্যাম্পাস-১ : হাজী দরবেশ আলী চৌধুরী বাড়ী, বিশ্বাস পাড়া, কাট্টলী, আকবরশাহ, চট্টগ্রাম।</b></span>

                            {{-- Admit Card Title --}}
                            <div class="col-12 d-flex flex-column">
                                <span class="bg-success text-white text-center mt-2"><b class="fs-4">ADMIT CARD</b></span>
                                <span class="text-dark fs-5 text-center"><b class="fs-5">{{ $exam_terms }}-{{ now()->year }}</b></span>
                            </div>

                            {{-- Examinee Details --}}
                            <div class="col-12 d-flex flex-row align-items-center mt-2">
                                <div class="col-9">
                                    <span class="ms-2"><b>Examinee Details: </b></span>
                                    <table class="table table-striped table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Name: </th>
                                                <th>{{ $user->name }}</th>
                                                <th>Father: </th>
                                                <th>{{ $user->father_name_en }}</th>
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
                                <div class="col-3 ps-3">
                                    <img class="rounded-3 border border-success border-2" src="{{ asset('assets/'.$user->profile_pic) }}"
                                            width="90%" height="auto">
                                </div>
                            </div>



                            {{-- Exam Rutine Table --}}
                            <div class="col-12 mt-2">
                                @php
                                    $jsonData = file_get_contents(resource_path('views/admin/students/printAdmitCardData.json'));
                                    $examData = json_decode($jsonData, true);
                                    $exams = $examData[$user->class] ?? [];

                                    // Split the exams array into three parts
                                    $totalExams = count($exams);
                                    $chunkSize = ceil($totalExams / 3);
                                    $firstColumn = array_slice($exams, 0, $chunkSize);
                                    $secondColumn = array_slice($exams, $chunkSize, $chunkSize);
                                    $thirdColumn = array_slice($exams, $chunkSize * 2);
                                @endphp

                                <span class="text-center text-white d-block bangla bg-success py-1">

                                    @php
                                        $examTime = [
                                            'Play' => '০৯:০০ থেকে ১০:৩০',
                                            'Nursery' => '০৯:০০ থেকে ১০:৩০',
                                            'One' => '০৯:০০ থেকে ১১:০০',
                                            'Two' => '১১:০০ থেকে ০১:০০',
                                            'Three' => '১১:০০ থেকে ০১:০০',
                                            'Four' => '১১:০০ থেকে ০১:০০',
                                            'Hifz-One' => '১০:৩০ থেকে ১২:৩০',
                                            'Hifz-Two' => '১০:৩০ থেকে ১২:৩০',
                                            'Hifz-Three' => '১০:৩০ থেকে ১২:৩০',
                                        ];

                                        $examTimeEcho = $examTime[$user->class] ?? 'প্রদান করা হয়নি';
                                    @endphp


                                    <b>পরীক্ষার রুটিন: পরীক্ষার শুরু সময়: ({{ $examTimeEcho }})  
                                    </b>
                                </span>

                                <div class="row p-2">
                                    <!-- First Column -->
                                    <div class="col-4">
                                        <table class="table table-striped table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>#</th>
                                                    <th>বিষয়</th>
                                                    <th>তারিখ</th>
                                                </tr>
                                                @forelse($firstColumn as $exam)
                                                    <tr>
                                                        <td>{{ $exam['id'] }}</td>
                                                        <td>{{ $exam['subject'] }}</td>
                                                        <td>{{ $exam['date'] }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="text-center">No exam routine found for your class.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Second Column -->
                                    <div class="col-4">
                                        <table class="table table-striped table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>#</th>
                                                    <th>বিষয়</th>
                                                    <th>তারিখ</th>
                                                </tr>
                                                @forelse($secondColumn as $exam)
                                                    <tr>
                                                        <td>{{ $exam['id'] }}</td>
                                                        <td>{{ $exam['subject'] }}</td>
                                                        <td>{{ $exam['date'] }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="text-center">&nbsp;</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Third Column -->
                                    <div class="col-4">
                                        <table class="table table-striped table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>#</th>
                                                    <th>বিষয়</th>
                                                    <th>তারিখ</th>
                                                </tr>
                                                @forelse($thirdColumn as $exam)
                                                    <tr>
                                                        <td>{{ $exam['id'] }}</td>
                                                        <td>{{ $exam['subject'] }}</td>
                                                        <td>{{ $exam['date'] }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="text-center">&nbsp;</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- Rules Exam Note --}}
                            <span><b class="text-danger text-center d-block bangla">পরিক্ষায় করণীয় নির্দেশনাসমূহ:</b></span>
                            {{-- <div class="col-12 d-flex flex-row p-2"> --}}
                            <div class="col-12 d-flex flex-row p-2">
                                <div class="col-4 border border-1 border-dark rounded-2">
                                    <span class="text-center d-block fw-bold bg-danger text-white p-1 ">পরিক্ষার পূর্বে করণীয়:</span>
                                    <div class="p-2">
                                        <p><b class="text-decoration-underline">সময়ানুবর্তিতা:</b>পরীক্ষা শুধুর ৩০ মিনিট আগে হলে প্রবেশ করুন এবং নিজ আসনে বসুন।</p>
                                        <p><b class="text-decoration-underline">পরিচয়:</b> আপনার এডমিট কার্ড বা পরিচয়পত্র সাথে রাখুন।</p>
                                        <p><b class="text-decoration-underline">ড্রেস:</b> নির্ধারিত ড্রেস কোর্ড মেনে চলুন।</p>
                                        <p><b class="text-decoration-underline">নিষিদ্ধ জিনিসপত্র:</b> ব্যাগ, মোবাইল, স্মার্টওয়াচ ইত্যাদি জিনিসপত্র নিষিদ্ধ।</p>
                                        <p><b class="text-decoration-underline">স্টেশনারি:</b> শুধুমাত্র কলম, পেন্সিল, স্কেল এবং ইরেজার একটি পরিষ্কার স্বচ্ছ ফাইলে আনুন।</p>
                                    </div>
                                </div>
                                <div class="col-4 border border-1 border-dark rounded-2">
                                    <span><b class="text-center d-block fw-bold bg-danger text-white p-1">পরিক্ষার সময় করণীয়:</b></span>
                                    <div class="p-2">
                                        <p><b class="text-decoration-underline">নিরবতা: </b>পরীক্ষার হলে নীরবতা বজায় রাখুন। </p>
                                        <p><b class="text-decoration-underline">নির্দেশাবলী: </b>পরীক্ষকের সমস্ত নির্দেশাবলী মনোযোগ সহকারে অনুসরণ করুন।</p>
                                        <p><b class="text-decoration-underline">ধার নেওয়া যাবে না: </b>কলম, পেন্সিল, স্কেল এবং ইরেজার, অন্যান্য শিক্ষার্থীদের কাছ থেকে ধার করবেন না।</p>
                                        <p><b class="text-decoration-underline">অন্যায্য উপায়ে নয়: </b>নকল উপায় অবলম্বন বা অন্যদের কাছ থেকে দেখে লেখা নিষিদ্ধ। এতে বহিষ্কার হওয়ার সম্ভাবনা রয়েছে।</p>
                                    </div>
                                </div>
                                <div class="col-4 border border-1 border-dark rounded-2">
                                    <span><b class="text-center d-block fw-bold bg-danger text-white p-1">পরিক্ষার পর করণীয়:</b></span>
                                    <div class="p-2">
                                        <p><b class="text-decoration-underline">লেখা বন্ধ করুন: </b>পরীক্ষা সমাপ্তি ঘোষণা করলে অবিলম্বে লেখা বন্ধ করুন।</p>
                                        <p><b class="text-decoration-underline">উত্তরপত্র হস্তান্তর: </b>পরীক্ষা সমাপ্তি হলে উত্তরপত্র আপনার ডেস্কে রাখুন।</p>
                                        <p><b class="text-decoration-underline">প্রস্থান: </b>পরিদর্শক হল প্রস্থান করতে বললে নিয়ম অনুসরণ করে হল প্রস্তান করুন।</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Signatures --}}
                            @php
                                $classTeachers = [
                                    'Play' => 'assets/admin/img/signature/habibur-rahman.png',
                                    'Nursery' => 'assets/admin/img/signature/rasheda-akhter.png',
                                    'One' => 'assets/admin/img/signature/mohammad-sadrul-ula.png',
                                    'Two' => 'assets/admin/img/signature/nasrin-akhter.png',
                                    'Three' => 'assets/admin/img/signature/sufia-akhter-simi.png',
                                    'Four' => 'assets/admin/img/signature/sufia-akhter-simi.png',
                                    'Hifz-One' => 'assets/admin/img/signature/nurun-nabi.png',
                                    'Hifz-Two' => 'assets/admin/img/signature/nurun-nabi.png',
                                    'Hifz-Three' => 'assets/admin/img/signature/nurun-nabi.png',
                                ];

                                $signaturePath = $classTeachers[$user->class] ?? 'assets/admin/img/signature/sample.jpg';
                            @endphp

                            <div class="row mt-2">
                                <div class="col-4 text-center d-flex flex-column align-items-center justify-content-end">
                                    @switch($user->institute_name)
                                        @case('Sirikotia Hafezia Nurani Model Madrasha')
                                            <img src="{{ asset('assets/admin/img/signature/rofiqual-principal-seal-1.png') }}"
                                                width="150px" height="auto">
                                            @break
                                        @case('AMN Islamia Madrasha')
                                            <img src="{{ asset('assets/admin/img/signature/rofiqual-principal-seal-2.png') }}"
                                                width="150px" height="auto">
                                            @break
                                        @default

                                    @endswitch

                                    
                                </div>
                                <div class=" col-4 text-center d-flex flex-column align-items-center justify-content-end">

                                </div>
                                <div class="col-4 text-center d-flex flex-column align-items-center justify-content-end">
                                    @switch($user->institute_name)
                                        @case('Sirikotia Hafezia Nurani Model Madrasha')
                                            <img src="{{ asset($signaturePath) }}"
                                                width="150px" height="auto">
                                            @break
                                        @case('AMN Islamia Madrasha')
                                            
                                            @break
                                        @default

                                    @endswitch                                    
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
                const qrcodeElement = document.getElementById(`qrcode-${user.id}`);

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
