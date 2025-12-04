<?php
// index.php - Router / Controller Utama K-Pop Database

// --- 1. REQUIRE VIEW MODELS ---
require_once 'viewmodels/AgensiViewModel.php';
require_once 'viewmodels/GrupViewModel.php';
require_once 'viewmodels/AnggotaViewModel.php';
require_once 'viewmodels/AlbumViewModel.php';


// --- 2. TENTUKAN ENTITAS DAN AKSI DARI URL ---
// Default adalah Agensi list
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'agensi';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';


// --- 3. LOGIKA ROUTING ---

// =========================================================================
// A. ENTITAS: AGENSI
// =========================================================================
if ($entity === 'agensi') {
    $agensiVM = new AgensiViewModel();

    switch ($action) {
        case 'list':
            $agensiList = $agensiVM->getAgensiList();
            require_once 'views/agensi_list.php';
            break;
        
        case 'add':
            require_once 'views/agensi_form.php';
            break;
            
        case 'edit':
            $id = $_GET['id'];
            $agensi = $agensiVM->getAgensiById($id);
            require_once 'views/agensi_form.php';
            break;
            
        case 'save':
            $nama_agensi = $_POST['nama_agensi'];
            $tahun_berdiri = $_POST['tahun_berdiri'];
            $lokasi_kantor = $_POST['lokasi_kantor'];
            $agensiVM->addAgensi($nama_agensi, $tahun_berdiri, $lokasi_kantor);
            header('Location: index.php?entity=agensi&action=list');
            break;
            
        case 'update':
            $id = $_GET['id'];
            $nama_agensi = $_POST['nama_agensi'];
            $tahun_berdiri = $_POST['tahun_berdiri'];
            $lokasi_kantor = $_POST['lokasi_kantor'];
            $agensiVM->updateAgensi($id, $nama_agensi, $tahun_berdiri, $lokasi_kantor);
            header('Location: index.php?entity=agensi&action=list');
            break;
            
        case 'delete':
            $id = $_GET['id'];
            $agensiVM->deleteAgensi($id);
            header('Location: index.php?entity=agensi&action=list');
            break;
            
        default:
            echo "Aksi Agensi tidak valid.";
            break;
    }

// =========================================================================
// B. ENTITAS: GRUP
// =========================================================================
} elseif ($entity === 'grup') {
    $grupVM = new GrupViewModel();

    switch ($action) {
        case 'list':
            $grupList = $grupVM->getGrupList();
            require_once 'views/grup_list.php';
            break;
            
        case 'add':
            // Sediakan daftar Agensi untuk Foreign Key dropdown
            $agensiList = $grupVM->getAllAgensiForDropdown(); 
            require_once 'views/grup_form.php';
            break;
            
        case 'edit':
            $id = $_GET['id'];
            $grup = $grupVM->getGrupById($id);
            // Sediakan daftar Agensi untuk Foreign Key dropdown
            $agensiList = $grupVM->getAllAgensiForDropdown(); 
            require_once 'views/grup_form.php';
            break;
            
        case 'save':
            $id_agensi = $_POST['id_agensi'];
            $nama_grup = $_POST['nama_grup'];
            $tanggal_debut = $_POST['tanggal_debut'];
            $tipe = $_POST['tipe'];
            $grupVM->addGrup($id_agensi, $nama_grup, $tanggal_debut, $tipe); 
            header('Location: index.php?entity=grup&action=list');
            break;
            
        case 'update':
            $id = $_GET['id'];
            $id_agensi = $_POST['id_agensi'];
            $nama_grup = $_POST['nama_grup'];
            $tanggal_debut = $_POST['tanggal_debut'];
            $tipe = $_POST['tipe'];
            $grupVM->updateGrup($id, $id_agensi, $nama_grup, $tanggal_debut, $tipe); 
            header('Location: index.php?entity=grup&action=list');
            break;
            
        case 'delete':
            $id = $_GET['id'];
            $grupVM->deleteGrup($id);
            header('Location: index.php?entity=grup&action=list');
            break;
            
        default:
            echo "Aksi Grup tidak valid.";
            break;
    }

// =========================================================================
// C. ENTITAS: ANGGOTA
// =========================================================================
} elseif ($entity === 'anggota') {
    $anggotaVM = new AnggotaViewModel();

    switch ($action) {
        case 'list':
            $anggotaList = $anggotaVM->getAnggotaList();
            require_once 'views/anggota_list.php';
            break;
            
        case 'add':
            // Sediakan daftar Grup untuk Foreign Key dropdown
            $grupList = $anggotaVM->getAllGrupForDropdown();
            require_once 'views/anggota_form.php';
            break;
            
        case 'edit':
            $id = $_GET['id'];
            $anggota = $anggotaVM->getAnggotaById($id);
            // Sediakan daftar Grup untuk Foreign Key dropdown
            $grupList = $anggotaVM->getAllGrupForDropdown();
            require_once 'views/anggota_form.php';
            break;
            
        case 'save':
            $id_grup = $_POST['id_grup'];
            $nama_panggung = $_POST['nama_panggung'];
            $nama_asli = $_POST['nama_asli'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $posisi_utama = $_POST['posisi_utama'];
            $anggotaVM->addAnggota($id_grup, $nama_panggung, $nama_asli, $tanggal_lahir, $posisi_utama); 
            header('Location: index.php?entity=anggota&action=list');
            break;
            
        case 'update':
            $id = $_GET['id'];
            $id_grup = $_POST['id_grup'];
            $nama_panggung = $_POST['nama_panggung'];
            $nama_asli = $_POST['nama_asli'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $posisi_utama = $_POST['posisi_utama'];
            $anggotaVM->updateAnggota($id, $id_grup, $nama_panggung, $nama_asli, $tanggal_lahir, $posisi_utama);
            header('Location: index.php?entity=anggota&action=list');
            break;
            
        case 'delete':
            $id = $_GET['id'];
            $anggotaVM->deleteAnggota($id);
            header('Location: index.php?entity=anggota&action=list');
            break;
            
        default:
            echo "Aksi Anggota tidak valid.";
            break;
    }
    
// =========================================================================
// D. ENTITAS: ALBUM
// =========================================================================
} elseif ($entity === 'album') {
    $albumVM = new AlbumViewModel();

    switch ($action) {
        case 'list':
            $albumList = $albumVM->getAlbumList();
            require_once 'views/album_list.php';
            break;
            
        case 'add':
            // Sediakan daftar Grup untuk Foreign Key dropdown
            $grupList = $albumVM->getAllGrupForDropdown();
            require_once 'views/album_form.php';
            break;
            
        case 'edit':
            $id = $_GET['id'];
            $album = $albumVM->getAlbumById($id);
            // Sediakan daftar Grup untuk Foreign Key dropdown
            $grupList = $albumVM->getAllGrupForDropdown();
            require_once 'views/album_form.php';
            break;
            
        case 'save':
            $id_grup = $_POST['id_grup'];
            $judul_album = $_POST['judul_album'];
            $tanggal_rilis = $_POST['tanggal_rilis'];
            $format = $_POST['format'];
            $albumVM->addAlbum($id_grup, $judul_album, $tanggal_rilis, $format); 
            header('Location: index.php?entity=album&action=list');
            break;
            
        case 'update':
            $id = $_GET['id'];
            $id_grup = $_POST['id_grup'];
            $judul_album = $_POST['judul_album'];
            $tanggal_rilis = $_POST['tanggal_rilis'];
            $format = $_POST['format'];
            $albumVM->updateAlbum($id, $id_grup, $judul_album, $tanggal_rilis, $format);
            header('Location: index.php?entity=album&action=list');
            break;
            
        case 'delete':
            $id = $_GET['id'];
            $albumVM->deleteAlbum($id);
            header('Location: index.php?entity=album&action=list');
            break;
            
        default:
            echo "Aksi Album tidak valid.";
            break;
    }

// =========================================================================
// E. ENTITAS TIDAK DIKENAL
// =========================================================================
} else {
    echo "Entitas tidak valid.";
}