<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  {{--  <!-- Set page size here: A5, A4 or A3 -->  --}}
  {{--  <!-- Set also "landscape" if you need -->  --}}
  <style>@page { 
    size: A4 
                }

    #title {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18px;
        font-weight: bold;
    }

    .tabeldatakaryawan {
        margin-top: 40px;
    }

    .tabeldatakaryawan td {
        padding: 5px;
    }

    .tabelpresensi {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;

    }

    .tabelpresensi tr th  {
        border: 1px solid #090909;
        padding: 8px;
        background: #a5a5a5;
        font-size: 10px
    }

    .tabelpresensi tr td  {
        border: 1px solid #090909;
        padding: 5px;
        font-size: 10px;
    }

    .foto {
        width: 40px;
        height: 30px;
        
    }
    

</style>
</head>

{{--  <!-- Set "A5", "A4" or "A3" for class name -->
{{Set also "landscape" if you need}}  --}}
<body class="A4 landscape">
    @php
    function selisih($jam_masuk, $jam_keluar)
    {
        list($h, $m, $s) = explode(":", $jam_masuk);
        $dtAwal = mktime($h, $m, $s, "1", "1", "1");
        list($h, $m, $s) = explode(":", $jam_keluar);
        $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
        $dtSelisih = $dtAkhir - $dtAwal;
        $totalmenit = $dtSelisih / 60;
        $jam = explode(".", $totalmenit / 60);
        $sisamenit = ($totalmenit / 60) - $jam[0];
        $sisamenit2 = $sisamenit * 60;
        $jml_jam = $jam[0];
        return $jml_jam . ":" . round($sisamenit2);
    }
    @endphp

  {{--  <!-- Each sheet element should have the class "sheet" -->  --}}
  {{--  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->  --}}
  <section class="sheet padding-10mm">

    <table style="width: 100%">
        <tr>
            <td style="width: 30px">
                <img src="{{ asset('assets/img/logopresensi.png') }}" width="190" height="70" alt="">
            </td>
            <td>
                <span id="title">
                    REKAP PRESENSI PEGAWAI <br>
                    PERIODE {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }} <br>
                    KOPERASI JASA KARYAWAN PLTU PANGKALAN SUSU SEJAHTERA <br>
                </span>
                <span><i>Dusun VI Sei Dua Desa Tanjung Pasir , Kec. Pangkalan Susu, Kab. Langkat Sumatera Utara</i></span>
            </td>
        </tr>
    </table>
    
    <table class="tabelpresensi">
        <tr>
            <th rowspan="2">NIK</th>
            <th rowspan="2">Nama Pegawai</th>
            <th colspan="31">Tanggal</th>
            <th rowspan="2">TH</th>
            <th rowspan="2">TT</th>
           
        </tr>
        <tr>
            @php
                for ($i=1; $i<=31; $i++){
            @endphp  
            <th>{{ $i }}</th>
            @php
            }    
            @endphp   
        </tr>
            @foreach ($rekap as $d)
                <tr>
                    <td>{{ $d->nik }}</td>
                    <td>{{ $d->nama_lengkap }}</td>
                    
                    @php
                    $totalhadir = 0;
                    $totalterlambat = 0;
                for($i=1; $i<=31; $i++)
                {
                    $tgl = "tgl_".$i;
                    if(empty($d->$tgl)) {
                        $hadir = ['',''];
                        $totalhadir += 0;
                    } else {
                        $hadir = explode("-",$d->$tgl);
                        $totalhadir += 1;
                        if($hadir[0] > "08:00:00") {
                            $totalterlambat += 1;
                        }
                    }

                    @endphp  

                    <td>
                        <span style="color:{{ $hadir[0] > "08:00:00" ? "red" : "" }}">{{ $hadir[0] }}</span><br>
                        <span style="color:{{ $hadir[1] < "16:30:00" ? "red" : "" }}">{{ $hadir[1] }}</span>
                    </td>
                    
                    @php
                    }    
                    @endphp
                    <td>{{ $totalhadir }}</td>
                    <td>{{ $totalterlambat }}</td>
                </tr>
            @endforeach
    </table>

        <table width="100%" style="margin-top: 100px">
            <tr>
                <td></td>
                <td style="text-align: center">Pangkalan Susu, {{ date('d-m-Y') }}</td>
            </tr>
            <tr>
                <td style="text-align: center; vertical-align:bottom" height="100px">
                    <u>Vira Yuliana</u> <br>
                    <i><b>Human Resource Development</b></i>
                </td>
                <td style="text-align: center; vertical-align:bottom">
                    <u>Heryban Kesuma</u> <br>
                    <i><b>Manager Koperasi</b></i>
                </td>
            </tr>
        </table>

  </section>

</body>
