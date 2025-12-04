<?php
// views/grup/grup_list.php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Grup K-Pop</h2>
<a href="index.php?entity=grup&action=add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Tambah Grup Baru</a>

<table class="w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2 text-left">Grup</th>
            <th class="border px-4 py-2 text-left">Agensi</th>
            <th class="border px-4 py-2 text-left">Tipe</th>
            <th class="border px-4 py-2 text-left">Tgl. Debut</th>
            <th class="border px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // DATA BINDING: Loop melalui data yang dilewatkan oleh ViewModel ($grupList)
        foreach ($grupList as $grup): 
        ?>
            <tr>
                <td class="border px-4 py-2 font-semibold">
                    <?php echo htmlspecialchars($grup['nama_grup']); ?>
                </td>
                
                <td class="border px-4 py-2">
                    <?php 
                        // Asumsi Model Grup sudah melakukan JOIN ke tabel Agensi dan mengambil nama_agensi
                        echo htmlspecialchars($grup['nama_agensi'] ?? '—'); 
                    ?>
                </td>
                
                <td class="border px-4 py-2">
                    <?php echo htmlspecialchars($grup['tipe']); ?>
                </td>
                
                <td class="border px-4 py-2">
                    <?php echo htmlspecialchars($grup['tanggal_debut']); ?>
                </td>
                
                <td class="border px-4 py-2 whitespace-nowrap text-center">
                    <a href="index.php?entity=grup&action=edit&id=<?php echo $grup['id_grup']; ?>" class="text-indigo-600 hover:text-indigo-900 mx-1">Edit</a>
                    
                    |
                    
                    <a href="index.php?entity=grup&action=delete&id=<?php echo $grup['id_grup']; ?>" 
                       onclick="return confirm('Apakah Anda yakin ingin menghapus grup <?php echo htmlspecialchars($grup['nama_grup']); ?>? Semua anggota dan album terkait akan terhapus!');" 
                       class="text-red-600 hover:text-red-900 mx-1">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once 'views/template/footer.php';
?>