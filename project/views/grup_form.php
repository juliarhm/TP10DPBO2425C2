<?php
// views/grup/grup_form.php
require_once 'views/template/header.php';

$is_edit = isset($grup);
?>

<h2 class="text-xl mb-4 font-bold">
    🎤 <?php echo $is_edit ? 'Edit Data Grup' : 'Tambah Grup Baru'; ?>
</h2>

<form action="index.php?entity=grup&action=<?php 
    // Binding Aksi Form
    echo $is_edit ? 'update&id=' . $grup['id_grup'] : 'save'; 
?>" method="POST" class="space-y-4 max-w-lg bg-white p-6 shadow-md rounded-lg">
    
    <div>
        <label for="id_agensi" class="block text-sm font-medium text-gray-700">Agensi:</label>
        <select 
            id="id_agensi"
            name="id_agensi" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
            <option value="">-- Pilih Agensi --</option>
            <?php 
            // DATA BINDING: Mengisi Dropdown Agensi ($agensiList diasumsikan tersedia)
            foreach ($agensiList as $agensi): 
                $selected = '';
                // Cek jika mode Edit, dan ID Agensi saat ini cocok dengan FK di Grup
                if ($is_edit && $grup['id_agensi'] == $agensi['id_agensi']) {
                    $selected = 'selected';
                }
            ?>
                <option value="<?php echo $agensi['id_agensi']; ?>" <?php echo $selected; ?>>
                    <?php echo htmlspecialchars($agensi['nama_agensi']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="nama_grup" class="block text-sm font-medium text-gray-700">Nama Grup:</label>
        <input 
            type="text" 
            id="nama_grup"
            name="nama_grup" 
            value="<?php echo $is_edit ? htmlspecialchars($grup['nama_grup']) : ''; ?>" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
    </div>

    <div>
        <label for="tanggal_debut" class="block text-sm font-medium text-gray-700">Tanggal Debut:</label>
        <input 
            type="date" 
            id="tanggal_debut"
            name="tanggal_debut" 
            value="<?php echo $is_edit ? htmlspecialchars($grup['tanggal_debut']) : ''; ?>" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
    </div>
    
    <div>
        <label for="tipe" class="block text-sm font-medium text-gray-700">Tipe Grup:</label>
        <?php 
            $tipes = ['Boy', 'Girl'];
            $current_tipe = $is_edit ? $grup['tipe'] : '';
        ?>
        <select 
            id="tipe"
            name="tipe" 
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
            required
        >
            <option value="">-- Pilih Tipe --</option>
            <?php foreach ($tipes as $t): ?>
                <option value="<?php echo $t; ?>" 
                    <?php echo ($current_tipe == $t) ? 'selected' : ''; ?>>
                    <?php echo $t; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold">
        <?php echo $is_edit ? 'Update Grup' : 'Simpan Grup'; ?>
    </button>
</form>

<?php
require_once 'views/template/footer.php';
?>