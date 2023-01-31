<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['slug' => 'manage-users', 'name' => 'Управление пользователями'],
            ['slug' => 'create-user', 'name' => 'Создание пользователя'],
            ['slug' => 'edit-user', 'name' => 'Редактирование пользователя'],
            ['slug' => 'delete-user', 'name' => 'Удаление пользователя'],

            ['slug' => 'manage-roles', 'name' => 'Управление ролями пользователей'],
            ['slug' => 'create-role', 'name' => 'Создание роли пользователя'],
            ['slug' => 'edit-role', 'name' => 'Редактирование роли пользователя'],
            ['slug' => 'delete-role', 'name' => 'Удаление роли пользователя'],

            ['slug' => 'assign-role', 'name' => 'Назначение роли для пользователя'],
            ['slug' => 'assign-permission', 'name' => 'Назначение права для пользователя'],

            ['slug' => 'manage-posts', 'name' => 'Управление постами блога'],
            ['slug' => 'create-post', 'name' => 'Создание поста блога'],
            ['slug' => 'edit-post', 'name' => 'Редактирование поста блога'],
            ['slug' => 'publish-post', 'name' => 'Публикация поста блога'],
            ['slug' => 'delete-post', 'name' => 'Удаление поста блога'],

            ['slug' => 'manage-categories', 'name' => 'Управление категориями блога'],
            ['slug' => 'create-category', 'name' => 'Создание категории блога'],
            ['slug' => 'edit-category', 'name' => 'Редактирование категории блога'],
            ['slug' => 'delete-category', 'name' => 'Удаление категории блога'],

            ['slug' => 'manage-comments', 'name' => 'Управление комментариями блога'],
            ['slug' => 'create-comment', 'name' => 'Создание комментария к посту'],
            ['slug' => 'edit-comment', 'name' => 'Редактирование комментария к посту'],
            ['slug' => 'publish-comment', 'name' => 'Публикация комментария к посту'],
            ['slug' => 'delete-comment', 'name' => 'Удаление комментария к посту'],

            ['slug' => 'manage-tags', 'name' => 'Управление тегами'],
            ['slug' => 'create-tag', 'name' => 'Создание комментария к посту'],
            ['slug' => 'edit-tag', 'name' => 'Редактирование тега'],
            ['slug' => 'delete-tag', 'name' => 'Удаление тега'],

            ['slug' => 'manage-pages', 'name' => 'Управление страницами'],
            ['slug' => 'create-page', 'name' => 'Создание страницы'],
            ['slug' => 'edit-page', 'name' => 'Редактирование страницы'],
            ['slug' => 'delete-page', 'name' => 'Удаление страницы'],

        ];
        foreach ($permissions as $item) {
            $permission = new Permission();
            $permission->name = $item['name'];
            $permission->slug = $item['slug'];
            $permission->save();
        }
    }
}
