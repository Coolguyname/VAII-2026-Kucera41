<?php

namespace App\Controllers;

use App\Models\Komponent;
use App\Models\Pocitac;
use App\Models\ZostavaPocitaca;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class KomponentController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    public function index(Request $request): Response
    {
        return $this->html(['komponenty' => Komponent::getAll(orderBy: '`nazov` ASC')]);
    }

    public function add(Request $request): Response
    {
        return $this->html([
            'komponent' => new Komponent(),
            'pocitace' => Pocitac::getAll(orderBy: '`nazov` ASC'),
            'mnozstva' => [],
        ]);
    }

    public function edit(Request $request): Response
    {
        $komponent = $this->najdiKomponent($request);

        $mnozstva = [];
        foreach ($komponent->getZostavy() as $zostava) {
            $mnozstva[$zostava->getPocitacId()] = $zostava->getMnozstvo();
        }

        return $this->html([
            'komponent' => $komponent,
            'pocitace' => Pocitac::getAll(orderBy: '`nazov` ASC'),
            'mnozstva' => $mnozstva,
        ]);
    }

    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        if ((int)$request->value('id') > 0) {
            $komponent = $this->najdiKomponent($request);
            foreach ($komponent->getZostavy() as $zostava) {
                $zostava->delete();
            }
        } else {
            $komponent = new Komponent();
        }

        $komponent->setFromRequest($request);
        $komponent->save();

        foreach ((array)$request->value('mnozstvo') as $pocitacId => $mnozstvo) {
            if ((int)$mnozstvo > 0) {
                $zostava = new ZostavaPocitaca();
                $zostava->setPocitacId((int)$pocitacId);
                $zostava->setKomponentId($komponent->getId());
                $zostava->setMnozstvo((int)$mnozstvo);
                $zostava->save();
            }
        }

        return $this->redirect($this->url('komponent.index'));
    }

    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $this->najdiKomponent($request)->delete();

        return $this->redirect($this->url('komponent.index'));
    }

    private function najdiKomponent(Request $request): Komponent
    {
        $komponent = Komponent::getOne((int)$request->value('id'));
        if ($komponent === null) {
            throw new HttpException(404);
        }
        return $komponent;
    }
}