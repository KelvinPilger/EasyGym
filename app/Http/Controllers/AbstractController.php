<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractController
{
	abstract protected function service();
    abstract protected function resource();
    abstract protected function collection();

	protected function abstractIndex(FormRequest $request) {
        $data = $this->service()->index($request->validated());

        $resource = $this->resource();
        $collection = $this->collection();

        return new $collection(
            $resource::collection($data)
        );
    }

	protected function abstractStore(FormRequest $request) {
		$data = $this->service()->store($request->validated());

		$resource = $this->resource();

		return new $resource($data);
	}

	protected function abstractUpdate(FormRequest $request) {
		$data = $this->service()->update($request->validated());

		$resource = $this->resource();

		return new $resource($data);
	}
}
