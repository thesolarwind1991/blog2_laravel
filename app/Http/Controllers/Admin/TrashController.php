<?php

namespace App\Http\Controllers\Admin;

use App\Classes\ImageSaver;
use App\Classes\ImageUploader;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function __construct() {
        $this->middleware('perm:delete-post');
        //$this->middleware('perm:manage-posts')->only('index');
        //$this->middleware('perm:delete-post')->only(['restore', 'destroy']);
    }

    /**
     * Список всех удаленных постов блога
     */
    public function index() {
        $posts = Post::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate();
        return view('admin.trash.index', compact('posts'));
    }

    /**
     * Восстанавливает удаленный пост блога
     */
    public function restore($id) {
        $id = (int)$id;
        Post::withTrashed()->findOrFail($id)->restore();
        //$post->restore();
        return redirect()
            ->route('admin.trash.index')
            ->with('success', 'Пост блога успешно восстановлен');
    }

    /**
     * Удаляет пост блога из базы данных
     */
    public function destroy($id, ImageSaver $imageSaver, ImageUploader $imageUploader) {
        $id = (int)$id;
        $post = Post::withTrashed()->findOrFail($id);
        // удаляем основное изображение поста
        $imageSaver->remove($post);
        // удаляем изображения из контента поста
        $imageUploader->destroy($post->content);
        // удаляем сам пост блога из базы данных
        $post->forceDelete();
        return redirect()
            ->route('admin.trash.index')
            ->with('success', 'Пост блога удален навсегда');
    }
}
