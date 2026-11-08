<?php

namespace App\Controllers;

use App\Models\Pocitac;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Katalóg počítačov.
 * URL: ?c=katalog (akcia index sa použije automaticky)
 */
class KatalogController extends BaseController
{
    /**
     * Katalóg si môže pozrieť každý (aj neprihlásený návštevník).
     */
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    /**
     * Zoznam počítačov s filtrami – zobrazí pohľad App/Views/Katalog/index.view.php.
     */
    public function index(Request $request): Response
    {
        return $this->html(['pocitace' => Pocitac::getAll(orderBy: '`nazov` ASC')]);
    }
}