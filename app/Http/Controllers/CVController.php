<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CvService;
use App\Services\CvValidationRules;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class CVController extends Controller
{
    public function index(): Factory|View|Application
    {
        $users = (new CvService)->showAll();
        return view('cv-list', [
            'users' => $users,
        ]);
    }

    public function showForm(): Factory|View|Application
    {
        return view('add-new-cv');
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = (new CvValidationRules())->validateCV($request);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        return (new CvService())->save($request);
    }

    public function showOneCV(int $id): Factory|View|Application
    {
        $user = (new CvService())->showOne($id);
        return view('one-cv', [
            'user' => $user,
        ]);
    }

    public function edit($id, Request $request)
    {
        $user = User::find($id);

        return view('edit-cv', [
            'user' => $user
        ]);
    }

    public function update(Request $request, int $id)
    {

        $validator = (new CvValidationRules())->validateCV($request);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        return (new CvService())->updateData($request, $id);
    }

    public function destroy(Request $request)
    {
        return (new CvService())->deleteCV($request);
    }

    public function generatePdf($id)
    {
        $user = User::find($id);

        $pdf = PDF::loadView('pdfs.cv', [
            'user' => $user,
        ]);
        return $pdf->stream();
    }
}
