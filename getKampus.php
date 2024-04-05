<?php
include 'cfg.php'; // Veritabanı bağlantı dosyasını dahil et

$organizasyonId = isset($_GET['organizasyon_id']) ? intval($_GET['organizasyon_id']) : 0;

// Kampüs bilgilerini çekmek için sorgu
$query = $pdo->prepare("SELECT id, sube_adi FROM kampus WHERE organizasyon_id = ?");
$query->execute([$organizasyonId]);
$kampusler = $query->fetchAll(PDO::FETCH_ASSOC);

// Kampüs bilgilerini JSON formatında döndür
echo json_encode($kampusler);
?>
