<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Domovská stránka aplikácie PCshop.
 */
class HomeController extends BaseController
{
    /**
     * Všetky akcie sú prístupné každému (aj neprihlásenému návštevníkovi).
     */
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    /**
     * Domovská stránka – zobrazí pohľad App/Views/Home/index.view.php.
     */
    public function index(Request $request): Response
    {
        return $this->html();
    }
}