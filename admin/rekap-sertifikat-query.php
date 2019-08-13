<?php
$query=mysql_query("
    SELECT 
    m.id_mhs,
    m.nama_mhs,
    m.jurusan,
    m.angkatan,
    SUM(CASE WHEN status_sertifikat='Valid' THEN 1 ELSE 0 END) AS 'JV',
    SUM(CASE WHEN kategori_sertifikat='Prestasi' AND status_sertifikat='Valid' THEN 1 ELSE 0 END) AS 'PreV',
    SUM(CASE WHEN kategori_sertifikat='Pelatihan' AND status_sertifikat='Valid' THEN 1 ELSE 0 END) AS 'PelV',
    SUM(CASE WHEN kategori_sertifikat='Kegiatan' AND status_sertifikat='Valid' THEN 1 ELSE 0 END) AS 'KegV',
    SUM(CASE WHEN kategori_sertifikat='Seminar' AND status_sertifikat='Valid' THEN 1 ELSE 0 END) AS 'SemV',
    SUM(CASE WHEN kategori_sertifikat='Lain-lain' AND status_sertifikat='Valid' THEN 1 ELSE 0 END) AS 'LaiV',
    SUM(CASE WHEN status_sertifikat='Pengajuan' THEN 1 ELSE 0 END) AS 'JP',
    SUM(CASE WHEN kategori_sertifikat='Prestasi' AND status_sertifikat='Pengajuan' THEN 1 ELSE 0 END) AS 'PreP',
    SUM(CASE WHEN kategori_sertifikat='Pelatihan' AND status_sertifikat='Pengajuan' THEN 1 ELSE 0 END) AS 'PelP',
    SUM(CASE WHEN kategori_sertifikat='Kegiatan' AND status_sertifikat='Pengajuan' THEN 1 ELSE 0 END) AS 'KegP',
    SUM(CASE WHEN kategori_sertifikat='Seminar' AND status_sertifikat='Pengajuan' THEN 1 ELSE 0 END) AS 'SemP',
    SUM(CASE WHEN kategori_sertifikat='Lain-lain' AND status_sertifikat='Pengajuan' THEN 1 ELSE 0 END) AS 'LaiP',
    SUM(CASE WHEN status_sertifikat='Pengajuan' THEN 1 ELSE 0 END) AS 'JTV',
    SUM(CASE WHEN kategori_sertifikat='Prestasi' AND status_sertifikat='Tidak Valid' THEN 1 ELSE 0 END) AS 'PreTV',
    SUM(CASE WHEN kategori_sertifikat='Pelatihan' AND status_sertifikat='Tidak Valid' THEN 1 ELSE 0 END) AS 'PelTV',
    SUM(CASE WHEN kategori_sertifikat='Kegiatan' AND status_sertifikat='Tidak Valid' THEN 1 ELSE 0 END) AS 'KegTV',
    SUM(CASE WHEN kategori_sertifikat='Seminar' AND status_sertifikat='Tidak Valid' THEN 1 ELSE 0 END) AS 'SemTV',
    SUM(CASE WHEN kategori_sertifikat='Lain-lain' AND status_sertifikat='Tidak Valid' THEN 1 ELSE 0 END) AS 'LaiTV'
FROM 
    mahasiswa m LEFT JOIN sertifikat s ON m.id_mhs=s.id_mhs
GROUP BY
    m.id_mhs")
?>