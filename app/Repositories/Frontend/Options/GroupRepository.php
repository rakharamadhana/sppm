<?php


namespace App\Repositories\Frontend\Options;

use App\Exceptions\GeneralException;
use App\Models\Options\Group;
use App\Repositories\BaseRepository;

class GroupRepository extends BaseRepository
{
    /**
     * JournalRepository constructor.
     * @param Group $model
     */
    public function __construct(Group $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model::create([
            'gender' => $data['gender'],
            'code' => $data['code'],
            'name' => $data['name'],
        ]);
    }

    /**
     * @param $id
     * @param array $input
     * @param $receipt
     * @param $form
     * @return bool
     * @throws GeneralException
     */
    public function update($id, array $input)
    {
        $group = $this->getById($id);
        $group->gender = $input['gender'];
        $group->code = $input['code'];
        $group->name = $input['name'];

        return $group->save();
    }

    /**
     * @param array $request
     * @return array|\Illuminate\Database\Eloquent\Builder
     */
    public function filter(array $request)
    {
        $group = $request['group'];

        /** @var array $query */
        return $this->model::query()->where('group', $group)->get();
    }
}
