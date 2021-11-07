<?php

namespace App\Repository;

interface MainRepositoryInterface {
    public function getAllItems();
    public function getAllGenders();
    public function storeItem($request);
    public function editItem($id);
    public function updateItem($request, $id);
    public function deleteItem($id);
}


