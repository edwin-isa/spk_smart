@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h4>Daftar Rekomendasi Penerima Beasiswa</h4>

        <div style="overflow-x:auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 50px; font-size: 0.8em;">No</th>
                        <th style="width: 200px; font-size: 0.8em;">Nama</th>
                        @foreach ($dataRekomendasi[0]['nilai_kriteria'] as $nilaiKriteria)
                            <th style="width: 150px; font-size: 0.8em;">{{ $nilaiKriteria['kriteria'] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataRekomendasi as $index => $alternatif)
                        <tr style="border-bottom: 1px solid #000;">
                            <td style="width: 50px; padding: 10px;">{{ $index + 1 }}</td>
                            <td style="width: 200px; padding: 10px;">{{ $alternatif['name_alternatif'] }}</td>
                            @foreach ($alternatif['nilai_kriteria'] as $nilaiKriteria)
                                <td style="width: 150px; padding: 10px;">{{ $nilaiKriteria['nilai'] }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
