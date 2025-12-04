<?php
// views/album/album_list.php

require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Album Rilisan</h2>
<a href="index.php?entity=album&action=add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Tambah Album Baru</a>

<table class="w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2 text-left">Grup/Artis</th>
            <th class="border px-4 py-2 text-left">Judul Album</th>
            <th class="border px-4 py-2 text-left">Format</th>
            <th class="border px-4 py-2 text-left">Tgl. Rilis</th>
            <th class="border px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // DATA BINDING: Loop melalui data yang dilewatkan oleh ViewModel ($albumList)
        foreach ($albumList as $album): 
        ?>
            <tr>
                <td class="border px-4 py-2 font-semibold">
                    <?php 
                        // Asumsi Model Album sudah melakukan JOIN ke tabel Grup dan mengambil nama_grup
                        echo htmlspecialchars($album['nama_grup'] ?? '—'); 
                    ?>
                </td>
                
                <td class="border px-4 py-2">
                    <?php echo htmlspecialchars($album['judul_album']); ?>
                </td>
                
                <td class="border px-4 py-2">
                    <?php echo htmlspecialchars($album['format']); ?>
                </td>
                
                <td class="border px-4 py-2">
                    <?php echo htmlspecialchars($album['tanggal_rilis']); ?>
                </td>
                
                <td class="border px-4 py-2 whitespace-nowrap text-center">
                    <a href="index.php?entity=album&action=edit&id=<?php echo $album['id_album']; ?>" class="text-indigo-600 hover:text-indigo-900 mx-1">Edit</a>
                    
                    |
                    
                    <a href="index.php?entity=album&action=delete&id=<?php echo $album['id_album']; ?>" 
                       onclick="return confirm('Apakah Anda yakin ingin menghapus album <?php echo htmlspecialchars($album['judul_album']); ?>?');" 
                       class="text-red-600 hover:text-red-900 mx-1">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once 'views/template/footer.php';
?>