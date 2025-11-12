<html >
<head>
    <link href='https://fonts.googleapis.com/css?family=Barlow' rel='stylesheet'>
    <style>
        /* --- Print and Page Setup --- */
        @page { size: A4; margin: 0 }

        body {
            margin: 0;
            background-color: #f0f0f0;
            display: block;
            font-family: 'Barlow';
            font-size: 18px;
        }

        /* --- New Styles for A4 Sheet Wrapper (Holds 3 Cards) --- */
        .card-wrapper {
            /* Defines the A4 size and sets up the layout */
            display: grid;
            grid-template-columns: 1fr;
            width: 8.268in;
            height: 11.693in;
            margin: 0;
            overflow: hidden;
            page-break-after: always; /* Forces a new A4 page after every 3 cards */
            box-sizing: border-box;
            padding: .3in;
            background-color: #fafafa;
        }

        /* --- Modified Admit Card Styles (1/3 A4 Height) --- */
        .admit-card {
            /* Height is 1/3 of the effective printable height of the wrapper */
            height: 3.69in;
            width: 100%;
            margin: 0;
            overflow: hidden;
            position: relative; /* Context for absolutely positioned children */
            box-sizing: border-box;
            page-break-after: auto;
            padding: 0;
            background-color: transparent;
            page-break-inside: avoid; /* Prevents a single card from splitting across pages */
        }

        .admit-card img{
            width: 100%;
        }

        /* --- Adjusted Absolute Positioning (Relative to the 3.69in card height) --- */

        /* Content block */
        .admit-card .admit-content{
            position: absolute;
            width: 100%;
            top: 1.6in;
            left: 0.3in;
        }

        .admit-content p{
            margin: 0;
            line-height: 20pt;
        }

        /* Roll number block */
        .admit-card .right{
            position: absolute;
            top: 2.1in;
            right: 0.55in;
            font-size: 22pt;
            font-weight: bold;
        }

        /* Profile picture block */
        .admit-card .pic{
            width: 90px;
            position: absolute;
            top: .8in;
            right: 0.3in;
        }

        /* QR code block */
        .admit-card .qrcode-container{
            width: 100px;
            height: 100px;
            position: absolute;
            top: 1.8in;
            right: 1.4in;
        }

        .admit-card .qrcode-container img{
            width: 100px;
            height: 100px;
        }

        /** For screen preview **/
        @media screen {
            body { background: #e0e0e0 }
            .card-wrapper {
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
        // Using `chunk(3)` assumes $users is a Laravel Collection.
        // If it's a plain PHP array, use: $user_chunks = array_chunk($users, 3);
        $user_chunks = $users->chunk(3);
    @endphp

    @foreach($user_chunks as $chunk_index => $user_chunk)
        <section class="card-wrapper" id="a4-page-{{ $chunk_index }}">

            @foreach($user_chunk as $user)
                <div class="admit-card" id="a4-pdf-{{ $user->roll }}">
                    <img src="{{ asset('assets/admin/img/institutes/exam-admit-card-1.png') }}" alt="Admit Card Background">

                    <div class="admit-content">
                        <p>Name: <b>{{ $user->name }}</b></p>
                        <p>Class: <b>{{ $user->class }}</b></p>
                        <p>Academic Year: <b>{{ $user->academic_year }}</b></p>
                    </div>
                    <p class="right"><b>{{ $user->roll }}</b></p>
                    <img class="pic" src="{{ asset('assets/'.$user->profile_pic) }}" alt="Profile Picture">

                    <span class="qrcode-container" id="qrcode-{{ $user->roll }}"></span>
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
