<?php

namespace App\Controllers;

use App\Models\Pocitac;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class PocitacController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    public function index(Request $request): Response
    {
        return $this->html(['pocitace' => Pocitac::getAll(orderBy: '`nazov` ASC')]);
    }

    public function add(Request $request): Response
    {
        return $this->html(['pocitac' => new Pocitac()]);
    }

    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $pocitac = (int)$request->value('id') > 0 ? $this->najdiPocitac($request) : new Pocitac();
        $pocitac->setFromRequest($request);
        $pocitac->save();

        return $this->redirect($this->url('pocitac.index'));
    }
    public function edit(Request $request): Response
    {
        return $this->html(['pocitac' => $this->najdiPocitac($request)]);
    }

    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $this->najdiPocitac($request)->delete();

        return $this->redirect($this->url('pocitac.index'));
    }

    private function najdiPocitac(Request $request): Pocitac
    {
        $pocitac = Pocitac::getOne((int)$request->value('id'));
        if ($pocitac === null) {
            throw new HttpException(404);
        }
        return $pocitac;
    }
}