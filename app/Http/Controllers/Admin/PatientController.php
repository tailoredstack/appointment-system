<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Patient\DestroyPatient;
use App\Http\Requests\Admin\Patient\IndexPatient;
use App\Http\Requests\Admin\Patient\StorePatient;
use App\Http\Requests\Admin\Patient\UpdatePatient;
use App\Models\Patient;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class PatientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPatient $request
     * @return array|Factory|View
     */
    public function index(IndexPatient $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Patient::class)->processRequestAndGet(
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

        return view('admin.patient.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.patient.create');

        return view('admin.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePatient $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePatient $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Patient
        $patient = Patient::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/patients'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/patients');
    }

    /**
     * Display the specified resource.
     *
     * @param Patient $patient
     * @throws AuthorizationException
     * @return void
     */
    public function show(Patient $patient)
    {
        $this->authorize('admin.patient.show', $patient);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Patient $patient
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Patient $patient)
    {
        $this->authorize('admin.patient.edit', $patient);


        return view('admin.patient.edit', [
            'patient' => $patient,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePatient $request
     * @param Patient $patient
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePatient $request, Patient $patient)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Patient
        $patient->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/patients'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/patients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPatient $request
     * @param Patient $patient
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPatient $request, Patient $patient)
    {
        $patient->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
