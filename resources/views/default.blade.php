<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Nilai Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-8 p-8 bg-white rounded shadow">
        <button id="toggleForm" class="bg-blue-600 px-4 rounded-lg text-white">Tambahkan nilai siswa</button>
        <div id="nilaiForm" style="display:none;">
            <h1 class="text-2xl font-bold my-4">Formulir Nilai Siswa</h1>
            <form action="/simpan-nilai" method="post">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-600">Nama Siswa</label>
                    <input type="text" id="nama" name="nama" class="mt-1 p-2 border rounded w-full" required>
                </div>
    
                <div class="flex gap-5">
                    <div>
                        <!-- Input Nilai Tugas (1-5) -->
                        @for ($i = 1; $i <= 5; $i++)
                        <div class="mb-4">
                            <label for="tugas{{ $i }}" class="text-sm font-medium text-gray-600">Tugas {{ $i }}</label>
                            <input type="number" min="0" max="100" id="tugas{{ $i }}" name="tugas{{ $i }}" class="p-2 border rounded" required>
                        </div>
                        @endfor
                    </div>
                    <div>
                        <!-- Input Nilai Ujian (1-2) -->
                        @for ($i = 1; $i <= 2; $i++)
                        <div class="mb-4">
                            <label for="ujian{{ $i }}" class="text-sm font-medium text-gray-600">Ujian {{ $i }}</label>
                            <input type="number" min="0" max="100" id="ujian{{ $i }}" name="ujian{{ $i }}" class="p-2 border rounded" required>
                        </div>
                        @endfor
                    </div>
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Simpan Nilai</button>
            </form>
        </div>

        <!-- Tabel Data Siswa -->
        @if ($dataSiswa->count() > 0)
            <h2 class="text-xl font-bold mt-8 mb-4">Data Nilai Siswa</h2>
            <table class="w-full border-collapse border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">No.</th>
                        <th class="border p-2">Nama</th>
                        <th class="border p-2">Tugas 1</th>
                        <th class="border p-2">Tugas 2</th>
                        <th class="border p-2">Tugas 3</th>
                        <th class="border p-2">Tugas 4</th>
                        <th class="border p-2">Tugas 5</th>
                        <th class="border p-2">Ujian 1</th>
                        <th class="border p-2">Ujian 2</th>
                        <th class="border p-2">Nilai Akhir</th>
                        <th class="border p-2">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSiswa as $siswa)
                        <tr>
                            <td class="border p-2">{{ $loop->iteration }}</td>
                            <td class="border p-2">{{ $siswa->nama }}</td>
                            <td class="border p-2">{{ $siswa->tugas1 }}</td>
                            <td class="border p-2">{{ $siswa->tugas2 }}</td>
                            <td class="border p-2">{{ $siswa->tugas3 }}</td>
                            <td class="border p-2">{{ $siswa->tugas4 }}</td>
                            <td class="border p-2">{{ $siswa->tugas5 }}</td>
                            <td class="border p-2">{{ $siswa->ujian1 }}</td>
                            <td class="border p-2">{{ $siswa->ujian2 }}</td>
                            <td class="border p-2">{{ $siswa->nilai_akhir }}</td>
                            <td class="border p-2">{{ $siswa->grade }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <script>
        document.getElementById('toggleForm').addEventListener('click', function() {
            var nilaiForm = document.getElementById('nilaiForm');
            nilaiForm.style.display = (nilaiForm.style.display === 'none') ? 'block' : 'none';
        });
    </script>
</body>
</html>
