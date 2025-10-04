@extends('admin.themes.main')

@section('page-title') Send Group SMS @endsection

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
                <h5 class="m-0 fs-18 fw-semi-bold text-success">
                    Send Group SMS
                </h5>
                <a href="{{ route('dashboard') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-chevron-left"></i>
                    <span>Home</span>
                </a>
            </div>
            <div class="card-body">
                <form method="post" action=" " enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Sender ID:</label>
                        <input type="text" class="form-control" value="8809617624990">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Recipients:</label>
                        <input type="text" name="contact_sms" class="form-control" value="{{ $data->contact_sms }}">
                    </div>

                    <div class="mb-3">
                        <label>SMS Body:</label>
                        <textarea
                            rows="4"
                            class="form-control"
                            name="message"
                            id="sms-input-field"
                            oninput="updateSmsDetails()">This is a test SMS.</textarea>
                    </div>

                    <div class="mb-3 p-2 border border-success rounded">

                        <span style="color:black;">
                            <strong>Encoding: </strong>
                            <span id="encoding">GSM_7BIT_EX</span>
                        </span><br>

                        <span style="color:green;">
                            <strong>Character Count: </strong>
                            <span id="setSmsCharacterCount">0</span>
                        </span><br>

                        <span style="color:red;">
                            <strong>SMS Parts: </strong>
                            <span id="setSmsPartCount">0</span>
                        </span><br>

                        <span style="color:green;">
                            <strong>Remaining: </strong>
                            <span id="setSmsRemainingCount">160</span>
                        </span><br>

                        <span style="color:black; margin-top: 1rem;">
                            <strong>SMS Rate (Per Part): </strong>
                            <span id="setSmsRate">0.35</span>
                        </span><br>

                        <span style="color:blue;">
                            <strong>Total Cost: </strong>
                            <span id="setSmsTotalCost">0.00</span>
                        </span><br>
                    </div>

                    <button type="submit" id="save_draft" class="btn btn-info">
                        <i class="fa fa-paper-plane"></i> Send SMS
                    </button>

                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <!-- SMS Character Analyzer -->
    <script>
        // --- GSM 7-bit Character Set Definitions ---
        // Standard GSM characters (1 character slot)
        const GSM_STANDARD = "@£$¥èéùìòÇ\nØø\rÅåΔ_ΦΓΛΩΠΨΣΘΞÆæßÉ !\"#¤%&'()*+,-./0123456789:;<=>?¡ABCDEFGHIJKLMNOPQRSTUVWXYZÄÖÑÜ§¿abcdefghijklmnopqrstuvwxyzäöñüà";

        // GSM Extension characters (2 character slots)
        const GSM_EXTENDED = "{}[~]\\|^€";

        // SMS Limits
        const LIMITS = {
            GSM_7BIT_EX: { single: 160, concat: 153, label: "GSM_7BIT_EX" },
            UCS_2: { single: 70, concat: 67, label: "UCS-2 (Unicode)" }
        };

        // Cost Constants
        const SMS_RATE = 0.35;
        const CURRENCY_SYMBOL = "TK ";

        function analyzeText(text) {
            let charCount = 0;
            let encoding = LIMITS.GSM_7BIT_EX.label;

            for (const char of text) {
                if (GSM_EXTENDED.includes(char)) {
                    // Extended character counts as 2
                    charCount += 2;
                } else if (GSM_STANDARD.includes(char)) {
                    // Standard character counts as 1
                    charCount += 1;
                } else {
                    // Non-GSM character found, switch to UCS-2 encoding
                    encoding = LIMITS.UCS_2.label;
                    // In UCS-2, every character is 1 unit.
                    // We need to restart counting based on the standard JS string length
                    // since the loop broke due to a UCS-2 character.
                    charCount = text.length;
                    break;
                }
            }

            // If UCS-2 was detected (i.e., loop completed but encoding was set to UCS-2,
            // or the break happened), use simple string length for count.
            if (encoding === LIMITS.UCS_2.label) {
                 charCount = text.length;
            }

            return { encoding, charCount };
        }

        function calculateParts(charCount, singleLimit, concatLimit) {
            if (charCount === 0) {
                return { parts: 0, remaining: singleLimit };
            }

            let parts;
            let remaining;

            if (charCount <= singleLimit) {
                // Single part SMS
                parts = 1;
                remaining = singleLimit - charCount;
            } else {
                // Concatenated SMS
                // The number of parts is calculated based on the concatenated limit
                parts = Math.ceil(charCount / concatLimit);
                remaining = (parts * concatLimit) - charCount;
            }

            return { parts, remaining };
        }

        /**
         * Main function to run the analysis and update the UI.
         */
        function updateSmsDetails() {
            // Updated to use the new input ID
            const inputElement = document.getElementById('sms-input-field');
            const text = inputElement.value;

            // 1. Analyze text for encoding and character count
            const { encoding, charCount } = analyzeText(text);

            // 2. Determine limits based on encoding
            const limitsKey = encoding.startsWith('GSM') ? 'GSM_7BIT_EX' : 'UCS_2';
            const { single, concat } = LIMITS[limitsKey];

            // 3. Calculate parts and remaining
            const { parts, remaining } = calculateParts(charCount, single, concat);

            // 3.5. Calculate Total Cost
            const totalCost = parts * SMS_RATE;

            // 4. Update UI (Using the user-specified output IDs)
            document.getElementById('encoding').textContent = encoding;
            document.getElementById('setSmsCharacterCount').textContent = charCount;
            document.getElementById('setSmsPartCount').textContent = parts;

            // Set fixed rate and Total Cost (formatted to 2 decimal places)
            document.getElementById('setSmsRate').textContent = `${CURRENCY_SYMBOL}${SMS_RATE.toFixed(2)}`;
            document.getElementById('setSmsTotalCost').textContent = `${CURRENCY_SYMBOL}${totalCost.toFixed(2)}`;

            // Handle display of remaining characters when text is empty
            if (charCount === 0) {
                 document.getElementById('setSmsRemainingCount').textContent = single;
            } else {
                document.getElementById('setSmsRemainingCount').textContent = remaining;
            }
        }

        // Initialize on load to calculate the default value "This is a test SMS."
        window.onload = updateSmsDetails;
    </script>
    <!-- SMS Character Analyzer -->
@endsection

