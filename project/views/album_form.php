<?php
// views/album/album_form.php
require_once 'views/template/header.php';

// Pastikan variabel $album (data album lama) dan $grupList (daftar semua grup) 
// sudah dilewatkan oleh Controller/Router saat memanggil View ini.
?>

<h2 class="text-xl mb-4 font-bold">
    <?php echo isset($album) ? 'Edit Data Album' : 'Tambah Album Baru'; ?>
</h2>

<form action="index.php?entity=album&action=<?php 
    // Binding Aksi Form
    echo isset($album) ? 'update&id=' . $album['id_album'] : 'save'; 
?>" method="POST" class="space-y-4 max-w-lg bg-white p-6 shadow-md rounded-lg">
    
    <div>
        <label for="id_grup" class="block text-sm font-medium text-gray-700">Grup / Artis:</label>
        <select 
            id="id_grup"
            name="id_grup" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
            <option value="">-- Pilih Grup --</option>
            <?php 
            // DATA BINDING: Mengisi Dropdown Grup (Foreign Key)
            foreach ($grupList as $grup): 
                $selected = '';
                // Cek jika mode Edit, dan ID Grup saat ini cocok dengan FK di Album
                if (isset($album) && $album['id_grup'] == $grup['id_grup']) {
                    $selected = 'selected';
                }
            ?>
                <option value="<?php echo $grup['id_grup']; ?>" <?php echo $selected; ?>>
                    <?php echo htmlspecialchars($grup['nama_grup']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="judul_album" class="block text-sm font-medium text-gray-700">Judul Album:</label>
        <input 
            type="text" 
            id="judul_album"
            name="judul_album" 
            value="<?php 
                echo isset($album) ? htmlspecialchars($album['judul_album']) : ''; 
            ?>" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
    </div>

    <div>
        <label for="tanggal_rilis" class="block text-sm font-medium text-gray-700">Tanggal Rilis:</label>
        <input 
            type="date" 
            id="tanggal_rilis"
            name="tanggal_rilis" 
            value="<?php 
                // Input date memerlukan format YYYY-MM-DD
                echo isset($album) ? htmlspecialchars($album['tanggal_rilis']) : ''; 
            ?>" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
    </div>
    
    <div>
        <label for="format" class="block text-sm font-medium text-gray-700">Format Rilisan:</label>
        <?php 
            // Definisikan pilihan format (seperti yang kita sepakati di awal: EP, LP, Single)
            $formats = ['EP', 'LP', 'Single'];
            $current_format = isset($album) ? $album['format'] : '';
        ?>
        <select 
            id="format"
            name="format" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
            <option value="">-- Pilih Format --</option>
            <?php foreach ($formats as $f): ?>
                <option value="<?php echo $f; ?>" 
                    <?php echo ($current_format == $f) ? 'selected' : ''; ?>>
                    <?php echo $f; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold">
        <?php echo isset($album) ? 'Update Album' : 'Simpan Album'; ?>
    </button>
</form>

<?php
require_once 'views/template/footer.php';
?>