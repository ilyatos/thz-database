<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Experiment\CreateExperimentRequest;
use App\Http\Requests\Experiment\StoreExperimentRequest;
use App\Repositories\SystemRepository;
use App\Services\Experiment\CreateExperimentCommand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExperimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CreateExperimentRequest $request
     * @param SystemRepository        $systemRepository
     *
     * @return Response
     */
    public function create(CreateExperimentRequest $request, SystemRepository $systemRepository): Response
    {
        return $this->response->view(
            'web.experiment.create',
            [
                'systems' => $systemRepository->getUserSystemsWithType($this->getUser()),
                'predefinedSystemId' => (int) $request->input('system_id'),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreExperimentRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreExperimentRequest $request, CreateExperimentCommand $createExperimentCommand): RedirectResponse
    {
        $createExperimentCommand->create($this->getUser(), $request->getDto());

        return $this->response->redirectToRoute('index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
