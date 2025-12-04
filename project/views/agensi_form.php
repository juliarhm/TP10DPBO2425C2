<?php

require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4 font-bold">
    <?php echo isset($agensi) ? 'Edit Data Agensi' : 'Tambah Agensi Baru'; ?>
</h2>

<form action="index.php?entity=agensi&action=<?php 
    // Data Binding Aksi Form: Tentukan apakah UPDATE atau SAVE (CREATE)
    echo isset($agensi) ? 'update&id=' . $agensi['id_agensi'] : 'save'; 
?>" method="POST" class="space-y-4 max-w-lg bg-white p-6 shadow-md rounded-lg">
    
    <div>
        <label for="nama_agensi" class="block text-sm font-medium text-gray-700">Nama Agensi:</label>
        <input 
            type="text" 
            id="nama_agensi"
            name="nama_agensi" 
            value="<?php 
                // Data Binding Nilai: Jika mode Edit, isi dengan data Agensi yang ada
                echo isset($agensi) ? htmlspecialchars($agensi['nama_agensi']) : ''; 
            ?>" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
    </div>

    <div>
        <label for="tahun_berdiri" class="block text-sm font-medium text-gray-700">Tahun Berdiri:</label>
        <input 
            type="number" 
            id="tahun_berdiri"
            name="tahun_berdiri" 
            value="<?php 
                // Data Binding Nilai
                echo isset($agensi) ? htmlspecialchars($agensi['tahun_berdiri']) : ''; 
            ?>" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            maxlength="4" 
            required
        >
    </div>
    
    <div>
        <label for="lokasi_kantor" class="block text-sm font-medium text-gray-700">Lokasi Kantor:</label>
        <input 
            type="text" 
            id="lokasi_kantor"
            name="lokasi_kantor" 
            value="<?php 
                // Data Binding Nilai
                echo isset($agensi) ? htmlspecialchars($agensi['lokasi_kantor']) : ''; 
            ?>" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold">
        <?php echo isset($agensi) ? 'Update Data' : 'Simpan Agensi'; ?>
    </button>
</form>

<?php
require_once 'views/template/footer.php';
?>