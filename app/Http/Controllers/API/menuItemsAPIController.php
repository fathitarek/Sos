<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemenuItemsAPIRequest;
use App\Http\Requests\API\UpdatemenuItemsAPIRequest;
use App\Models\menuItems;
use App\Repositories\menuItemsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class menuItemsController
 * @package App\Http\Controllers\API
 */

class menuItemsAPIController extends AppBaseController
{
    /** @var  menuItemsRepository */
    private $menuItemsRepository;

    public function __construct(menuItemsRepository $menuItemsRepo)
    {
        $this->menuItemsRepository = $menuItemsRepo;
    }

    /**
     * Display a listing of the menuItems.
     * GET|HEAD /menuItems
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->menuItemsRepository->pushCriteria(new RequestCriteria($request));
        $this->menuItemsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $menuItems = $this->menuItemsRepository->all();

        return $this->sendResponse($menuItems->toArray(), 'Menu Items retrieved successfully');
    }

    /**
     * Store a newly created menuItems in storage.
     * POST /menuItems
     *
     * @param CreatemenuItemsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemenuItemsAPIRequest $request)
    {
        $input = $request->all();

        $menuItems = $this->menuItemsRepository->create($input);

        return $this->sendResponse($menuItems->toArray(), 'Menu Items saved successfully');
    }

    /**
     * Display the specified menuItems.
     * GET|HEAD /menuItems/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var menuItems $menuItems */
        $menuItems = $this->menuItemsRepository->findWithoutFail($id);

        if (empty($menuItems)) {
            return $this->sendError('Menu Items not found');
        }

        return $this->sendResponse($menuItems->toArray(), 'Menu Items retrieved successfully');
    }

    /**
     * Update the specified menuItems in storage.
     * PUT/PATCH /menuItems/{id}
     *
     * @param  int $id
     * @param UpdatemenuItemsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemenuItemsAPIRequest $request)
    {
        $input = $request->all();

        /** @var menuItems $menuItems */
        $menuItems = $this->menuItemsRepository->findWithoutFail($id);

        if (empty($menuItems)) {
            return $this->sendError('Menu Items not found');
        }

        $menuItems = $this->menuItemsRepository->update($input, $id);

        return $this->sendResponse($menuItems->toArray(), 'menuItems updated successfully');
    }

    /**
     * Remove the specified menuItems from storage.
     * DELETE /menuItems/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var menuItems $menuItems */
        $menuItems = $this->menuItemsRepository->findWithoutFail($id);

        if (empty($menuItems)) {
            return $this->sendError('Menu Items not found');
        }

        $menuItems->delete();

        return $this->sendResponse($id, 'Menu Items deleted successfully');
    }
}
