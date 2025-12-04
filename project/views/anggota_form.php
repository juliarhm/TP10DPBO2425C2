<?php
// views/anggota/anggota_form.php
require_once 'views/template/header.php';

// Cek mode operasi (Add atau Edit)
$is_edit = isset($anggota);
?>

<h2 class="text-xl mb-4 font-bold">
    🎤 <?php echo $is_edit ? 'Edit Data Anggota' : 'Tambah Anggota Baru'; ?>
</h2>

<form action="index.php?entity=anggota&action=<?php 
    // Binding Aksi Form
    echo $is_edit ? 'update&id=' . $anggota['id_anggota'] : 'save'; 
?>" method="POST" class="space-y-4 max-w-lg bg-white p-6 shadow-md rounded-lg">
    
    <div>
        <label for="id_grup" class="block text-sm font-medium text-gray-700">Grup Asal:</label>
        <select 
            id="id_grup"
            name="id_grup" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
            <option value="">-- Pilih Grup Anggota --</option>
            <?php 
            // DATA BINDING: Mengisi Dropdown Grup ($grupList diasumsikan tersedia)
            foreach ($grupList as $grup): 
                $selected = '';
                if ($is_edit && $anggota['id_grup'] == $grup['id_grup']) {
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
        <label for="nama_panggung" class="block text-sm font-medium text-gray-700">Nama Panggung (Stage Name):</label>
        <input 
            type="text" 
            id="nama_panggung"
            name="nama_panggung" 
            value="<?php echo $is_edit ? htmlspecialchars($anggota['nama_panggung']) : ''; ?>" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
    </div>

    <div>
        <label for="nama_asli" class="block text-sm font-medium text-gray-700">Nama Asli:</label>
        <input 
            type="text" 
            id="nama_asli"
            name="nama_asli" 
            value="<?php echo $is_edit ? htmlspecialchars($anggota['nama_asli']) : ''; ?>" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
    </div>
    
    <div>
        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir:</label>
        <input 
            type="date" 
            id="tanggal_lahir"
            name="tanggal_lahir" 
            value="<?php echo $is_edit ? htmlspecialchars($anggota['tanggal_lahir']) : ''; ?>" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
    </div>

    <div>
        <label for="posisi_utama" class="block text-sm font-medium text-gray-700">Posisi Utama (Vocal/Rapper/Dancer):</label>
        <input 
            type="text" 
            id="posisi_utama"
            name="posisi_utama" 
            value="<?php echo $is_edit ? htmlspecialchars($anggota['posisi_utama']) : ''; ?>" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold">
        <?php echo $is_edit ? 'Update Anggota' : 'Simpan Anggota'; ?>
    </button>
</form>

<?php
require_once 'views/template/footer.php';
?>