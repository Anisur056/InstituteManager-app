
<html >
<head>
    <link href='https://fonts.googleapis.com/css?family=Barlow' rel='stylesheet'>
    <style>
        @page { size: A4; margin: 0 }
        body {
            margin: 0;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Barlow';
            font-size: 22px;
        }

        .admit-card {
            width: 8.268in;
            height: 11.693in;
            margin: 0;
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
            page-break-after: always;
            padding: 0in;
            background-color: #fafafa;
            padding: .3in;
        }

        .admit-card img{
            width: 100%;
        }

        .admit-card .admit-content{
            position: absolute;
            width: 100%;
            top: 1.9in;
            left: 0.7in;
            font-size: 17pt;
        }

        .admit-content p{
            margin: 0;
            line-height: 27pt;
        }
        .admit-card .right{
            position: absolute;
            top: 2.4in;
            right: 0.8in;
            font-size: 22pt;
            font-weight: bold;
        }
        .admit-card .pic{
            width: 128px;
            position: absolute;
            top: 0.5in;
            right: 0.5in;
        }

        #qrcode img{
            width: 110px;
            height: 110px;
            position: absolute;
            top: 2in;
            right: 2in;
        }
        /** For screen preview **/
        @media screen {
            body { background: #e0e0e0 }
            .admit-card {
                background: white;
                box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
                margin: 5mm auto;
            }
        }
        /** Fix for Chrome issue #273306 **/
        @media print {
            body.A4 { width: 8.268in;}
        }
    </style>
</head>
<body class="A4">


    <section class="admit-card" id="a4-pdf">
        <img src="{{ asset('assets/admin/img/bg-admit-card.png') }}">
        <div class="admit-content">
            <p>Name: <b>{{ $record->name_en }}</b></p>
            <p>Class: <b>{{ $record->class }}</b></p>
            <p>Academic Year: <b>{{ $record->academic_year }}</b></p>
        </div>
        <p class="right"><b>{{ $record->roll }}</b></p>
        <img class="pic" src="{{ asset($record->profile_pic) }}">
        <span id="qrcode"></span>
    </section>




    <!-- Open Print Dialog Box -->
    {{-- <script> window.print(); </script> --}}

    <!-- QR Library -->
    <script src="{{ asset('assets/admin/js/qrcode.js') }}"></script>

    <!-- QR Contet -->
    <script type="text/javascript">
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "Name: {{ $record->name_en }}\n Class: {{ $record->class }}\n Roll: {{ $record->roll }}",
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    </script>

    <!-- html2pdf Library -->
    {{-- <script src="source/html2pdf.js"></script>
    <script>
        function generatePDF(){
            const element = document.getElementById("a4-pdf");
            var opt = {
                margin:       0,
                filename:     'eeee',
                image:        { type: 'jpeg', quality: 1 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'A4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script> --}}
</body>
</html>
