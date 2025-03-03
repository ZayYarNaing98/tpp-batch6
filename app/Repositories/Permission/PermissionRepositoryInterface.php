<?php

namespace App\Repositories\Permission;

interface PermissionRepositoryInterface
{
    public function index();

    public function store($validatedData);

    public function show($id);

    public function update($validatedData, $id);

    public function destroy($id);
}
