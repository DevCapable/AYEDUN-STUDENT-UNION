<?php

namespace Cms\ServiceCompany\Repo;

use App\Modules\Vote\Models\Vote;

interface VoteRegistrationRepositoryInterface

{

   public function findAll($orderColumn = 'created_at', $orderDir = 'desc');

   public function findById($id);


    public function findDataForTables();

   //public function listAll();

   public function create(array $data);

   public function edit(Vote $model, array $data);

   public function delete($id);

}
