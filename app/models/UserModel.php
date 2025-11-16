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
        $stmt = $db->prepare("SELECT id, email, name, surname, role FROM users WHERE id=? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_assoc() ?: null;
    }

    public static function update2(mysqli $db, int $id, string $email, string $name, string $surname, string $pass_hash, string $role): bool
    {
        $stmt = $db->prepare("UPDATE users SET email=?, name=?, surname=?, pass_hash=?, role=? WHERE id=?");
        $stmt->bind_param("sssssi", $email, $name, $surname, $pass_hash, $role, $id);
        return $stmt->execute();
    }

    public static function update(
        mysqli $db,
        int $id,
        string $name,
        string $surname,
        string $email,
        string $role
    ): bool {
        $stmt = $db->prepare(
            "UPDATE users
             SET name = ?, surname = ?, email = ?, role = ?
             WHERE id = ?"
        );
        $stmt->bind_param("ssssi", $name, $surname, $email, $role, $id);
        return $stmt->execute();
    }

    public static function delete(mysqli $db, int $id): bool
    {
        $stmt = $db->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
