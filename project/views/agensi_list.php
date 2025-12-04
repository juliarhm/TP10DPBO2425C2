<?php

require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Agensi K-Pop</h2>
<a href="index.php?entity=agensi&action=add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Tambah Agensi Baru</a>

<table class="w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2 text-left">Nama Agensi</th>
            <th class="border px-4 py-2 text-left">Tahun Berdiri</th>
            <th class="border px-4 py-2 text-left">Lokasi Kantor</th>
            <th class="border px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // DATA BINDING: Loop melalui data yang dilewatkan oleh ViewModel ($agensiList)
        // Pastikan variabel $agensiList tersedia saat file ini dipanggil.
        foreach ($agensiList as $agensi): 
        ?>
            <tr>
                <td class="border px-4 py-2 font-semibold"><?php echo htmlspecialchars($agensi['nama_agensi']); ?></td>
                
                <td class="border px-4 py-2"><?php echo htmlspecialchars($agensi['tahun_berdiri']); ?></td>
                
                <td class="border px-4 py-2"><?php echo htmlspecialchars($agensi['lokasi_kantor']); ?></td>
                
                <td class="border px-4 py-2 whitespace-nowrap text-center">
                    <a href="index.php?entity=agensi&action=edit&id=<?php echo $agensi['id_agensi']; ?>" class="text-indigo-600 hover:text-indigo-900 mx-1">Edit</a>
                    
                    |
                    
                    <a href="index.php?entity=agensi&action=delete&id=<?php echo $agensi['id_agensi']; ?>" 
                       onclick="return confirm('Apakah Anda yakin ingin menghapus Agensi <?php echo htmlspecialchars($agensi['nama_agensi']); ?>?');" 
                       class="text-red-600 hover:text-red-900 mx-1">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once 'views/template/footer.php';
?>