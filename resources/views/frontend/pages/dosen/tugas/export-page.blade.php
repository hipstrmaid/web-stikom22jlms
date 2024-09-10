<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
        }

        th {
            padding: 5px;
        }

        button {
            padding: 5px;
        }

        .btn {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <table style="border: none; border-collapse: collapse;">
        <tr>
            <td style="border: none; border-collapse: collapse; padding:5px;">
                NAMA MATKUL: {{ $tugass->pertemuan->matkul->nama_matkul }}</td>
        </tr>
        <tr>
            <td style="border: none; border-collapse: collapse; padding:5px;">
                JUDUL TUGAS: {{ $tugass->pertemuan->judul_pertemuan }}</td>
        </tr>
    </table>
    <table>
        <thead>
            <tr>
                <th>
                    No
                </th>
                <th>
                    NAMA
                </th>
                <th>
                    NIM
                </th>
                <th>
                    PROGRAM STUDI
                </th>
                <th>
                    NILAI
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tugas->sortBy('pengumpulan.mahasiswa.prodi.nama_prodi') as $data)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $data->pengumpulan->mahasiswa->nama }}
                    </td>
                    <td>
                        {{ $data->pengumpulan->mahasiswa->nim }}
                    </td>
                    <td>
                        {{ $data->pengumpulan->mahasiswa->prodi->nama_prodi }}
                    </td>
                    <td>
                        {{ $data->nilai }}
                    </td>
                </tr>
            @endforeach
            <!-- Add this button to your view file -->
        </tbody>
    </table>
    <button class="btn p-5">
        <a href="{{ route('export.nilai', ['id' => $tugass->id]) }}" class="text-white">
            Download Excel
        </a>
    </button>

</body>

</html>
