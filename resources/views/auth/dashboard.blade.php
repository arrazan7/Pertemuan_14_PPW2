@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @else
                <div class="alert alert-success">
                    You are logged in!
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="header text-center">
        <img src="koceng.jpg" class="profile-img img-fluid rounded-circle" alt="Foto Profil">
        <h1>Fayyadh Arrazan Miftakhul</h1>
        <p>Mahasiswa S1 di Universitas Gadjah Mada</p>
    </div>

    <div class="section">
        <h2>Ringkasan Pribadi</h2>
        <p>
            Saya adalah seorang mahasiswa bersemangat yang sedang mengejar gelar D4 dalam Teknologi Rekayasa Perangkat Lunak. 
            Saya memiliki minat yang kuat dalam web and mobile development dan percaya pada penggabungan pendidikan dan pengalaman praktis.
        </p>
    </div>

    <div class="section">
        <h2>Pendidikan</h2>
        <p>
            <strong>Universitas Gadjah Mada</strong> - 2022 - Now<br>
            Teknologi Rekayasa Perangkat Lunak<br>
            IPK: 3,67
        </p>
        <p>
            <strong>Man 1 Yogyakarta</strong> - 2019 - 2022<br>
            IPA<br>
            Rata-rata Rapor: 8,5
        </p>
    </div>

    <div class="section">
        <h2>Keterampilan</h2>
        <p>
            <strong>Keterampilan Bahasa:</strong><br>
            Bahasa Inggris - Mahir<br>
            Bahasa Arab - Dasar<br><br>
            
            <strong>Keterampilan Komputer:</strong><br>
            Microsoft Office Suite (Word, Excel, PowerPoint)<br>
            Adobe Creative Suite (Photoshop, Illustrator)<br>
            Pengetahuan dasar dalam pemrograman (Python, Java)<br><br>
            
            <strong>Keterampilan Lainnya:</strong><br>
            Komunikasi efektif<br>
            Kemampuan analisis<br>
            Manajemen waktu<br>
            Kreativitas dan inovasi
        </p>
    </div>

    <div class="section">
        <h2>Hobi dan Minat</h2>
        <p>
            Seni, musik, game, dan olahraga
        </p>
    </div>

    <div class="section">
        <h2>Referensi</h2>
        <p>
            Tersedia jika diminta.
        </p>
    </div>
</div>

@endsection