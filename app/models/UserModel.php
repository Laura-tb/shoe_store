<!-- MODELO -->
<!--
- Toda la lógica de acceso a tabla users (SELECT, UPDATE, etc).
-->


<?php
class UserModel
{
    public static function getAll(mysqli $db): array
    {
        $res = $db->query("SELECT * FROM users");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public static function getById(mysqli $db, int $id): ?array
    {
        $stmt = $db->prepare("SELECT id, email, name, surname, role, pass_hash FROM users WHERE id=? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_assoc() ?: null;
    }


    public static function update(
        mysqli $db,
        int $id,
        string $name,
        string $surname,
        string $email,
        string $pass_hash,
        string $role
    ): bool {
        $stmt = $db->prepare(
            "UPDATE users
             SET name = ?, surname = ?, email = ?, pass_hash = ?, role = ?
             WHERE id = ?"
        );
        $stmt->bind_param("sssssi", $name, $surname, $email, $pass_hash, $role, $id);
        return $stmt->execute();
    }

    public static function delete(mysqli $db, int $id): bool
    {
        $stmt = $db->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public static function create(
    mysqli $db,
    string $email,
    string $name,
    string $surname,    
    string $pass_hash,
    string $role
): bool {
    $stmt = $db->prepare(
        "INSERT INTO users (email, name, surname, pass_hash, role, created_at)
         VALUES (?, ?, ?, ?, ?, NOW())"
    );
    $stmt->bind_param("sssss", $email, $name, $surname, $pass_hash, $role);
    return $stmt->execute();
}

public static function existsByEmail($db, $email) {
    $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch() ? true : false;
}
}
