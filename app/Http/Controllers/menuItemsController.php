<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemenuItemsRequest;
use App\Http\Requests\UpdatemenuItemsRequest;
use App\Repositories\menuItemsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Menu;

class menuItemsController extends AppBaseController {

    /** @var  menuItemsRepository */
    private $menuItemsRepository;

    public function __construct(menuItemsRepository $menuItemsRepo) {
        $this->menuItemsRepository = $menuItemsRepo;
        $this->middleware('CheckRoute');
    }

    /**
     * Display a listing of the menuItems.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->menuItemsRepository->pushCriteria(new RequestCriteria($request));
        $menuItems = $this->menuItemsRepository->all();
        return view('menu_items.index')->with('menuItems', $menuItems);
    }

    /**
     * Show the form for creating a new menuItems.
     *
     * @return Response
     */
    public function create() {
        $menu = Menu::latest()->pluck('display_name', 'id');

        return view('menu_items.create')->with('menu', $menu);
    }

    /**
     * Store a newly created menuItems in storage.
     *
     * @param CreatemenuItemsRequest $request
     *
     * @return Response
     */
    public function store(CreatemenuItemsRequest $request) {
        $input = $request->all();

        $menuItems = $this->menuItemsRepository->create($input);

        Flash::success('Menu Items saved successfully.');

        return redirect(route('menuItems.index'));
    }

    /**
     * Display the specified menuItems.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $menuItems = $this->menuItemsRepository->findWithoutFail($id);

        if (empty($menuItems)) {
            Flash::error('Menu Items not found');

            return redirect(route('menuItems.index'));
        }

        return view('menu_items.show')->with('menuItems', $menuItems);
    }

    /**
     * Show the form for editing the specified menuItems.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $menuItems = $this->menuItemsRepository->findWithoutFail($id);
        $menu = Menu::latest()->pluck('display_name', 'id');
        if (empty($menuItems)) {
            Flash::error('Menu Items not found');

            return redirect(route('menuItems.index'));
        }

        return view('menu_items.edit')->with('menuItems', $menuItems)->with('menu', $menu);
    }

    /**
     * Update the specified menuItems in storage.
     *
     * @param  int              $id
     * @param UpdatemenuItemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemenuItemsRequest $request) {
        $menuItems = $this->menuItemsRepository->findWithoutFail($id);

        if (empty($menuItems)) {
            Flash::error('Menu Items not found');

            return redirect(route('menuItems.index'));
        }

        $menuItems = $this->menuItemsRepository->update($request->all(), $id);

        Flash::success('Menu Items updated successfully.');

        return redirect(route('menuItems.index'));
    }

    /**
     * Remove the specified menuItems from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) 
    {
        $menuItems = $this->menuItemsRepository->findWithoutFail($id);

        if (empty($menuItems)) {
            Flash::error('Menu Items not found');

            return redirect(route('menuItems.index'));
        }

        $this->menuItemsRepository->delete($id);

        Flash::success('Menu Items deleted successfully.');

        return redirect(route('menuItems.index'));
    }

}
