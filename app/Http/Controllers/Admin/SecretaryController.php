<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Secretary\DestroySecretary;
use App\Http\Requests\Admin\Secretary\IndexSecretary;
use App\Http\Requests\Admin\Secretary\StoreSecretary;
use App\Http\Requests\Admin\Secretary\UpdateSecretary;
use App\Models\Secretary;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class SecretaryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSecretary $request
     * @return array|Factory|View
     */
    public function index(IndexSecretary $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Secretary::class)->processRequestAndGet(
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

        return view('admin.secretary.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.secretary.create');

        return view('admin.secretary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSecretary $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSecretary $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Secretary
        $secretary = Secretary::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/secretaries'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/secretaries');
    }

    /**
     * Display the specified resource.
     *
     * @param Secretary $secretary
     * @throws AuthorizationException
     * @return void
     */
    public function show(Secretary $secretary)
    {
        $this->authorize('admin.secretary.show', $secretary);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Secretary $secretary
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Secretary $secretary)
    {
        $this->authorize('admin.secretary.edit', $secretary);


        return view('admin.secretary.edit', [
            'secretary' => $secretary,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSecretary $request
     * @param Secretary $secretary
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSecretary $request, Secretary $secretary)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Secretary
        $secretary->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/secretaries'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/secretaries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySecretary $request
     * @param Secretary $secretary
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySecretary $request, Secretary $secretary)
    {
        $secretary->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
