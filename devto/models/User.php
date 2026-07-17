<?php

declare(strict_types=1);

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName(): string
    {
        return 'user';
    }

    public static function findIdentity($id): ?static
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null): ?static
    {
        return static::findOne(['auth_key' => $token]);
    }

    public static function findByUsername(string $username): ?static
    {
        return static::findOne(['username' => $username]);
    }

    public function getId(): int|string
    {
        return $this->id;
    }

    public function getAuthKey(): ?string
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey): bool
    {
        return $this->auth_key === $authKey;
    }


    // Password hashing when creating account
    public function setPassword(string $password): void
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }


    // Password checking during login
    public function validatePassword(string $password): bool
    {
        return Yii::$app->security->validatePassword(
            $password,
            $this->password_hash
        );
    }


    // Generate login key
    public function generateAuthKey(): void
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }


    // User comments relationship
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['user_id' => 'id']);
    }
}