<?php


namespace App\Repositories\Frontend\Options;

use App\Exceptions\GeneralException;
use App\Models\Options\Year;
use App\Repositories\BaseRepository;

class YearRepository extends BaseRepository
{
    /**
     * JournalRepository constructor.
     * @param Year $model
     */
    public function __construct(Year $model)
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
            'year' => $data['year'],
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
        $year = $this->getById($id);
        $year->year = $input['year'];

        return $year->save();
    }

    /**
     * @param array $request
     * @return array|\Illuminate\Database\Eloquent\Builder
     */
    public function filter(array $request)
    {
        $year = $request['year'];

        /** @var array $query */
        return $this->model::query()->where('year', $year)->get();
    }
}
