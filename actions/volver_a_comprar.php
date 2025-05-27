<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['firebase_uid'])) {
    header("Location: /index.php");
    exit;
}

$pedido_id = $_POST['pedido_id'] ?? null;
$uid = $_SESSION['firebase_uid'];

if (!$pedido_id) {
    header("Location: /carrito/historial.php");
    exit;
}

// Verifica que el pedido pertenezca al usuario
$stmt = $pdo->prepare("SELECT * FROM pedidos WHERE id = ? AND firebase_uid = ?");
$stmt->execute([$pedido_id, $uid]);
$pedido = $stmt->fetch();

if (!$pedido) {
    header("Location: /carrito/historial.php?error=no_permitido");
    exit;
}

// Obtener los productos del pedido
$stmt = $pdo->prepare("
    SELECT pd.producto_id, pd.cantidad, pd.precio_unitario, pd.variante
    FROM pedido_detalle pd
    WHERE pd.pedido_id = ?
");
$stmt->execute([$pedido_id]);
$productos = $stmt->fetchAll();

// Insertar en carrito (o actualizar si ya está)
foreach ($productos as $item) {
    $stmt = $pdo->prepare("
        INSERT INTO carrito (usuario_id, producto_id, cantidad, variante)
        VALUES (?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE cantidad = cantidad + VALUES(cantidad)
    ");
    $stmt->execute([
        $uid,
        $item['producto_id'],
        $item['cantidad'],
        $item['variante'] ?? ''
    ]);
}

header("Location: /carrito/index.php?recompra=ok");
exit;
