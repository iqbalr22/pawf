<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PostAdmin extends BaseController
{
    public function index()
    {
        $post = new PostModel();
        $data['posts'] = $post->findAll();
        echo view('admin/admin_post_list', $data);
    }

    //--------------------------------------------------------------

    public function preview($id)
    {
        $post = new PostModel();
        $data['post'] = $post->where('id', $id)->first();

        if (!$data['post']) {
            throw PageNotFoundException::forPageNotFound();
        }
        echo view('post_detail', $data);
    }

    //--------------------------------------------------------------

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {

            // ambil file gambar
            $image = $this->request->getFile('image');
            $imageName = null;

            if ($image && $image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                $image->move('uploads/', $imageName);
            }

            $post = new PostModel();
            $post->insert([
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status'),
                "slug" => url_title($this->request->getPost('title'), '-', TRUE),
                "image" => $imageName
            ]);

            return redirect('admin/post');
        }

        echo view('admin/admin_post_create');
    }

    //--------------------------------------------------------------

    public function edit($id)
    {
        $post = new PostModel();
        $data['post'] = $post->where('id', $id)->first();

        if (!$data['post']) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {

            $image = $this->request->getFile('image');
            $imageName = $data['post']['image']; // default pakai gambar lama

            if ($image && $image->isValid() && !$image->hasMoved()) {

                // hapus gambar lama
                if ($data['post']['image'] && file_exists('uploads/' . $data['post']['image'])) {
                    unlink('uploads/' . $data['post']['image']);
                }

                // upload gambar baru
                $imageName = $image->getRandomName();
                $image->move('uploads/', $imageName);
            }

            $post->update($id, [
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status'),
                "image" => $imageName
            ]);

            return redirect('admin/post');
        }

        echo view('admin/admin_post_update', $data);
    }

    //--------------------------------------------------------------

    public function delete($id)
    {
        $post = new PostModel();
        $data = $post->find($id);

        // hapus gambar dari folder
        if ($data && $data['image'] && file_exists('uploads/' . $data['image'])) {
            unlink('uploads/' . $data['image']);
        }

        $post->delete($id);
        return redirect('admin/post');
    }
}