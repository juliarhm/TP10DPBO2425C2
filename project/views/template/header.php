<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>K-Pop Database Management</title>
    <style>
        /* CSS tetap menggunakan gaya yang sama (diasumsikan ini adalah Tailwind/Utility CSS yang Anda gunakan di View) */
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        nav {
            background: #f0f0ff; /* Warna lebih cerah/pop */
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        nav a {
            margin-right: 25px;
            text-decoration: none;
            color: #5a00a0; /* Warna ungu/biru K-Pop */
            font-weight: bold;
            transition: color 0.3s;
        }
        nav a:hover {
            color: #ff4081; /* Pink/merah muda */
        }

        /* Styling umum untuk tabel */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #e6e6fa; /* Lavender */
        }
        
        /* Styling untuk tombol CRUD */
        .btn {
            padding: 7px 12px;
            text-decoration: none;
            background: #ccc;
            color: black;
            border-radius: 4px;
            font-size: 0.9em;
        }

        .btn-primary { /* Tombol Edit/Tambah */
            background: #007bff;
            color: white;
        }

        .btn-danger { /* Tombol Hapus */
            background: #dc3545;
            color: white;
        }

        /* Styling untuk Form */
        form {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 500px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: 500;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            margin-top: 15px;
            padding: 10px 20px;
            background: #5a00a0; /* Ungu K-Pop */
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <nav>
        <a href="index.php?entity=agensi">Agensi</a>
        <a href="index.php?entity=grup">Grup</a>
        <a href="index.php?entity=anggota">Anggota</a>
        <a href="index.php?entity=album">Album</a>
    </nav>

    <hr>
</body>
</html>
