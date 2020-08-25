<?php


namespace App\Contracts;




interface CategoryControllerInterface
{
    public function store($request);
    public function show($category_id);
    public function edit($category_id);
    public function update($request, $category_id);
    public function destroy($category_id);


}
