<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dentist\DestroyDentist;
use App\Http\Requests\Admin\Dentist\IndexDentist;
use App\Http\Requests\Admin\Dentist\StoreDentist;
use App\Http\Requests\Admin\Dentist\UpdateDentist;
use App\Models\Dentist;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class DentistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDentist $request
     * @return array|Factory|View
     */
    public function index(IndexDentist $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Dentist::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['admin_users_id', 'email', 'first_name', 'id', 'last_name', 'phone_no'],

            // set columns to searchIn
            ['email', 'first_name', 'id', 'last_name', 'phone_no']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.dentist.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.dentist.create');

        return view('admin.dentist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDentist $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDentist $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Dentist
        $dentist = Dentist::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/dentists'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/dentists');
    }

    /**
     * Display the specified resource.
     *
     * @param Dentist $dentist
     * @throws AuthorizationException
     * @return void
     */
    public function show(Dentist $dentist)
    {
        $this->authorize('admin.dentist.show', $dentist);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dentist $dentist
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Dentist $dentist)
    {
        $this->authorize('admin.dentist.edit', $dentist);


        return view('admin.dentist.edit', [
            'dentist' => $dentist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDentist $request
     * @param Dentist $dentist
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDentist $request, Dentist $dentist)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Dentist
        $dentist->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/dentists'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/dentists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDentist $request
     * @param Dentist $dentist
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDentist $request, Dentist $dentist)
    {
        $dentist->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
