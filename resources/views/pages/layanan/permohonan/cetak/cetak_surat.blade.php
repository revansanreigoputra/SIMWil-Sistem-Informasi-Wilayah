<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $surat_judul ?? 'Surat Keterangan' }}</title>
    <style>
        /* ======================================================= */
        /* 1. PAPER SIZE AND MARGINS (Absolute A4) */
        /* ======================================================= */
        @page {
            /* Standard Indonesian A4 Margins */
            margin: 2.5cm 2.5cm 2.5cm 2.5cm;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            font-size: 12pt;
            /* Using a relative container to align content to the page margin */
            position: relative;
        }

        /* The main content wrapper, removing screen padding */
        .page {
            padding: 0;
        }

        /* ======================================================= */
        /* 2. KOP SURAT (Header and Logo Alignment) */
        /* ======================================================= */

        .kop {
            /* Use table layout for precise vertical alignment and centering across the page */
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15pt;
            /* Space between header and document title */
            padding-bottom: 5px;
            /* Space inside the header block before the line */
            border-bottom: 3pt solid #000;
        }

        .kop td {
            vertical-align: top;
            padding: 0;
        }

        /* Logo Column */
        .kop .logo-col {
            width: 15%;
            /* Fixed width for logo column */
            text-align: center;
        }

        .kop .logo-col img {
            /* Fix: Use absolute units for PDF rendering */
            width: 65pt;
            height: 65pt;
            display: block;
            margin: 0 auto;
        }

        /* Header Text Column */
        .kop .header-col {
            width: 85%;
            text-align: center;
            line-height: 1.1;
            padding-left: 10px;
        }

        .kop .header-col h2,
        .kop .header-col h3 {
            margin: 0;
            font-weight: bold;
            text-transform: uppercase;
        }

        .kop .header-col h2 {
            font-size: 16pt;
            /* Slightly smaller for density */
        }

        .kop .header-col h3 {
            font-size: 13pt;
        }

        .kop .header-col p {
            margin-top: 4pt;
            font-size: 10pt;
        }

        /* ======================================================= */
        /* 3. JUDUL SURAT (Title and Number) */
        /* ======================================================= */
        .judul {
            text-align: center;
            margin-top: 15pt;
            margin-bottom: 15pt;
        }

        .judul h3 {
            font-size: 13pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 0;
        }

        .judul p {
            font-size: 11pt;
            margin-top: 4pt;
        }

        /* ======================================================= */
        /* 4. CONTENT & DATA TABLE */
        /* ======================================================= */

        .content {
            font-size: 12pt;
            line-height: 1.5;
            text-align: justify;
        }

        .content table {
            /* Reduced vertical margin for table and removed left margin */
            margin: 10pt 0;
            border-collapse: collapse;
            width: 100%;
        }

        /* Fix: Use two columns for cleaner separation (Nama, NIK, etc.) */
        .content table td:nth-child(1) {
            width: 120pt;
            /* Fixed width for field names */
        }

        .content table td:nth-child(2) {
            width: 10pt;
            /* Separator width */
        }

        .content table td {
            /* Reduced padding for tight data presentation */
            padding: 1pt 0;
            vertical-align: top;
            line-height: 1.5;
        }

        /* Paragraphs surrounding the table */
        .content p {
            margin-bottom: 12pt;
        }

        /* ======================================================= */
        /* 5. TTD (Signature Block) */
        /* ======================================================= */
        .ttd {
            margin-top: 40pt;
            width: 100%;
        }

        .ttd .isi {
            text-align: center;
            font-size: 12pt;
            /* Pushes TTD block to the right */
            float: right;
            width: 45%;
        }

        .ttd .isi p {
            margin: 4pt 0;
        }
    </style>
</head>
<body>

    <div class="page">

        <table class="kop">
            <tr>
                <td class="logo-col">
                    {{-- Bind Logo URL --}}
                    @if (!empty($logo_url))
                    {{-- NOTE: For PDF generation, $logo_url MUST be an absolute file path or an absolute URL (e.g., https://...) --}}
                    <img src="{{ $logo_url }}" alt="Logo Instansi">
                    @else
                    <div style="width: 65pt; height: 65pt; border: 1px solid #ccc; text-align: center; line-height: 65pt; font-size: 8pt; margin: 0 auto;">Logo Instansi</div>
                    @endif
                </td>
                <td class="header-col">
                    {{-- Bind KOP TEMPLATE Content --}}
                    <h2>{{ $instansi_kabupaten ?? 'N/A' }}</h2>
                    <h3>{{ $instansi_kecamatan ?? 'N/A'}}</h3>
                    <h3>{{ $instansi_desa ?? 'N/A' }}</h3>
                </td>
            </tr>
        </table>

        <div class="judul">
            <h3>{{ $surat_judul ??'SURAT KETERANGAN' }}</h3>
            <p>Nomor : {{ $nomor ?? 'N/A' }}</p>
        </div>

        <div class="content">
            <p>
                {{ $paragraf_pembuka ?? 'N/A' }}
            </p>

            <table>
                {{-- FIX: LOOP THROUGH COMBINED DYNAMIC DATA ($contentTableData) --}}
                {{-- This now includes both SYSTEM (like NIK, Nama) and CUSTOM (like Keperluan, Usaha) variables --}}
                @foreach ($contentTableData as $item)
                <tr>
                    <td width="150pt">{{ $item['label'] }}</td>
                    <td>:</td>
                    <td>
                        {{-- Conditionally bold the Name field --}}
                        @if ($item['key'] === 'nama')
                        <strong>{{ $item['value'] }}</strong>
                        @else
                        {{ $item['value'] }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>

            <p>
                {{ $paragraf_penutup ?? 'N/A' }}
            </p>

        </div>
        
        {{-- TTD SECTION --}}
        <div class="ttd">
            <div class="isi">
                <p>{{ $city_village ?? 'N/A' }}, {{ $tanggal_surat ?? 'N/A'}}</p>
                <p>{{ $ttd_jabatan ?? 'N/A' }}</p>
                
                {{-- Placeholder for TTD image, use if needed --}}
                <div style="height: 60pt; margin: 5pt 0;"></div> 
                
                <p><strong><u>{{ $ttd_nama ?? 'N/A' }}</u></strong></p>
                <p> {{ $nip ?? 'N/A' }} </p>
            </div>
        </div>
        <div style="clear: both;"></div>

    </div>

</body>

</html>