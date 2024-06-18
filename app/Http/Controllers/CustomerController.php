<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerCollection;  //importar el coleccion
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Filters\CustomerFilter;
use App\Http\Resources\CustomerResource;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;//importante importar la request


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $filter = new CustomerFilter();
        $queryItems = $filter->transform($request);
        $includeInvoices = $request->query('includeInvoices');
        //ejemplo
        
        $customers = Customer::where($queryItems);//ya tenemostranformado con el metodo que esta en el apifilter
        if($includeInvoices){
            $customers = $customers->with('invoices');
        }
        return new CustomerCollection($customers->paginate()->appends($request->query()));//la query ,los filtros que estamos metindo se mantengan incluso en la pagination 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
        return  new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
        $includeInvoices = request()->query('includeInvoices');
        if($includeInvoices){
            return new CustomerResource($customer->loadMissing('invoices')); //esta haciendo que cargue el modelo con la relacion invoices despues que haya cargado la relacion del customer
        }
       
       
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
        $customer->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
