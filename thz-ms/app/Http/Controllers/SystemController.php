<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\System\StoreSystemRequest;
use App\Repositories\SystemTypeRepository;
use App\Services\System\CreateSystemCommand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class SystemController extends Controller
{
    public function create(SystemTypeRepository $systemTypeRepository): Response
    {
        return $this->response->view('web.system.create', ['types' => $systemTypeRepository->getAll()]);
    }

    public function store(StoreSystemRequest $request, CreateSystemCommand $createSystemCommand): RedirectResponse
    {
        $system = $createSystemCommand->execute($this->getUser(), $request->getDto());

        return $this->response->redirectToRoute('experiments.create', ['system_id' => $system->id]);
    }
}
