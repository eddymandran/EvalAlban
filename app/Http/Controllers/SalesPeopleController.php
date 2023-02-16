<?php

namespace App\Http\Controllers;

use App\Models\SalesPeople;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalesPeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        //get all sales people
      return SalesPeople::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SalesPeople $salesPeople): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesPeople $salesPeople): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalesPeople $salesPeople): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesPeople $salesPeople): RedirectResponse
    {
        //
    }
}
