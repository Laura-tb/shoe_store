<!-- MODELO -->
<!--
- Toda la lógica de acceso a tabla products (SELECT, UPDATE, etc).
-->

<?php
class ProductModel
{
    public static function getAll(mysqli $db): array
    {
        $res = $db->query("SELECT * FROM products");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public static function getById(mysqli $db, int $id_product): ?array
    {
        $stmt = $db->prepare("SELECT id_product, image_product, name_product, price_product, stock_product FROM products WHERE id_product=? LIMIT 1");
        $stmt->bind_param("i", $id_product);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_assoc() ?: null;
    }


    public static function update(
        mysqli $db,
        int $id_product,
        string $image_product,
        string $name_product,
        string $price_product,
        string $stock_product
    ): bool {
        $stmt = $db->prepare(
            "UPDATE products
             SET image_product = ?, name_product = ?, price_product = ?, stock_product = ?
             WHERE id_product = ?"
        );
        $stmt->bind_param("ssssi", $image_product, $name_product, $price_product, $stock_product, $id_product);
        return $stmt->execute();
    }

    public static function delete(mysqli $db, int $id_product): bool
    {
        $stmt = $db->prepare("DELETE FROM products WHERE id_product=?");
        $stmt->bind_param("i", $id_product);
        return $stmt->execute();
    }

    public static function create2(
        mysqli $db,
        string $image_product,
        string $name_product,
        float $price_product,
        int $stock_product
    ): bool {
        $stmt = $db->prepare(
            "INSERT INTO products (image_product, name_product, price_product, stock_product, created_at)
         VALUES (?, ?, ?, ?, NOW())"
        );
        $stmt->bind_param("ssss", $image_product, $name_product, $price_product, $stock_product);
        return $stmt->execute();
    }

    // INSERT sin imagen (image_product NULL, created_at automático)
    public static function create(mysqli $db, string $name_product, float $price_product, int $stock_product): ?int
    {
        $stmt = $db->prepare("
            INSERT INTO products (name_product, price_product, stock_product)
            VALUES (?, ?, ?)
        ");
        $stmt->bind_param("sdi", $name_product, $price_product, $stock_product); // s = string, d = decimal, i = int

        if (!$stmt->execute()) {
            return null;
        }
        return $db->insert_id;          // ← id_product AUTOINCREMENT
    }

    public static function updateImage(mysqli $db, int $id, string $fileName): bool
    {
        $stmt = $db->prepare("
            UPDATE products
            SET image_product = ?
            WHERE id_product = ?
        ");
        $stmt->bind_param("si", $fileName, $id);

        return $stmt->execute();
    }
}
