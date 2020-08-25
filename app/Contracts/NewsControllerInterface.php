<?php


namespace App\Contracts;


use http\Env\Request;

interface NewsControllerInterface
{
    public function store($request);
    public function show($news_id);
    public function edit($news_id);
    public function update($request, $news_id);
    public function destroy($news_id);
    public function delete_img($request);


}
