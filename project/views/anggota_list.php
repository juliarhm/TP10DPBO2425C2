<?php
// views/anggota/anggota_list.php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Anggota Grup</h2>
<a href="index.php?entity=anggota&action=add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Tambah Anggota Baru</a>

<table class="w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2 text-left">Grup</th>
            <th class="border px-4 py-2 text-left">Nama Panggung</th>
            <th class="border px-4 py-2 text-left">Nama Asli</th>
            <th class="border px-4 py-2 text-left">Tgl. Lahir</th>
            <th class="border px-4 py-2 text-left">Posisi Utama</th>
            <th class="border px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // DATA BINDING: Loop melalui data yang dilewatkan oleh ViewModel ($anggotaList)
        foreach ($anggotaList as $anggota): 
        ?>
            <tr>
                <td class="border px-4 py-2 font-semibold">
                    <?php echo htmlspecialchars($anggota['nama_grup'] ?? '—'); ?>
                </td>
                
                <td class="border px-4 py-2">
                    <?php echo htmlspecialchars($anggota['nama_panggung']); ?>
                </td>
                
                <td class="border px-4 py-2">
                    <?php echo htmlspecialchars($anggota['nama_asli']); ?>
                </td>
                
                <td class="border px-4 py-2">
                    <?php echo htmlspecialchars($anggota['tanggal_lahir']); ?>
                </td>

                <td class="border px-4 py-2">
                    <?php echo htmlspecialchars($anggota['posisi_utama']); ?>
                </td>
                
                <td class="border px-4 py-2 whitespace-nowrap text-center">
                    <a href="index.php?entity=anggota&action=edit&id=<?php echo $anggota['id_anggota']; ?>" class="text-indigo-600 hover:text-indigo-900 mx-1">Edit</a>
                    
                    |
                    
                    <a href="index.php?entity=anggota&action=delete&id=<?php echo $anggota['id_anggota']; ?>" 
                       onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo htmlspecialchars($anggota['nama_panggung']); ?>?');" 
                       class="text-red-600 hover:text-red-900 mx-1">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once 'views/template/footer.php';
?>