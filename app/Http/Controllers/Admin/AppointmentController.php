<?php

namespace App\Http\Controllers\Admin;

use App\Events\AppointmentCancelled;
use App\Exports\AppointmentExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Appointment\DestroyAppointment;
use App\Http\Requests\Admin\Appointment\IndexAppointment;
use App\Http\Requests\Admin\Appointment\StoreAppointment;
use App\Http\Requests\Admin\Appointment\UpdateAppointment;
use App\Models\AdminUser;
use App\Models\Appointment;
use App\Models\Service;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\View\View;

class AppointmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAppointment $request
     * @return array|Factory|View
     */
    public function index(IndexAppointment $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Appointment::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['date', 'dentist_id', 'end', 'id', 'service_id', 'start', 'status', 'patient_id'],

            // set columns to searchIn
            ['id', 'remarks', 'status'],
            function ($query) {
                $query->with(['dentist', 'service', 'patient']);
                if (auth()->user()->hasRole('Dentist')) {
                    $query->where('dentist_id', auth()->user()->id);
                }

                if (auth()->user()->hasRole('Client')) {
                    $query->where('patient_id', auth()->user()->id);
                }
            }
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.appointment.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.appointment.create');

        $dentists = collect(\Brackets\AdminAuth\Models\AdminUser::whereHas('roles', function ($query) {
            $query->where('name', 'Dentist');
        })->get())->map(function ($dentist) {
            return ['id' => $dentist->id, 'name' => $dentist->full_name];
        })->toArray();

        $services = Service::select('id', 'name')->get();
        return view('admin.appointment.create', compact('dentists', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAppointment $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAppointment $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $user  = AdminUser::find(auth()->user()->id);

        // Store the Appointment
        $user->appointments()->create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/appointments'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/appointments');
    }

    /**
     * Display the specified resource.
     *
     * @param Appointment $appointment
     * @throws AuthorizationException
     * @return void
     */
    public function show(Appointment $appointment)
    {
        $this->authorize('admin.appointment.show', $appointment);

        return view('admin.appointment.show', ['appointment' => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Appointment $appointment
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Appointment $appointment)
    {
        $this->authorize('admin.appointment.edit', $appointment);

        $owner = auth()->user()->id === $appointment->patient_id;

        return view('admin.appointment.edit', [
            'appointment' => $appointment,
            'owner' => $owner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAppointment $request
     * @param Appointment $appointment
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAppointment $request, Appointment $appointment)
    {
        abort_if(!in_array($appointment->status, ['pending', 'accepted']), 400, "Unable to update appointment");
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Appointment
        $appointment->update($sanitized);
        $appointment->refresh();

        // load relationships
        $appointment->load('patient', 'dentist', 'service');


        // send notifications : only send notifications when appointment is updated by client
        if (!auth()->user()->hasRole('Client')) {
            // Send notifications when an appointment is cancelled by personnel
            if ($appointment->status === 'cancelled') {
                AppointmentCancelled::dispatch($appointment);
            } else if ($appointment->status === 'accepted') {
                // AppointmentAccepted::dispatch($appointment);
            }
        }

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/appointments'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/appointments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAppointment $request
     * @param Appointment $appointment
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAppointment $request, Appointment $appointment)
    {
        $appointment->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }


    /**
     * Export entities
     *
     * @return BinaryFileResponse|null
     */
    public function export(): ?BinaryFileResponse
    {
        return Excel::download(app(AppointmentExport::class), 'appointments.xlsx');
    }
}
