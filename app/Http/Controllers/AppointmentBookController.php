<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\AppointmentBook;
use Illuminate\Http\Request;

class AppointmentBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = AppointmentBook::latest()->paginate(15);

        return view('appointmentbook.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointmentbook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $data = $request->all();
        AppointmentBook::create($data);

        return redirect()
        ->route('contacts.index')
        ->with('message', 'Post criado com sucesso');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$contact = AppointmentBook::find($id)) {
            return redirect()->back();
        }

        return view('appointmentbook.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        if (!$contact = AppointmentBook::find($id)) {
            return redirect()->back();
        }

        $data = $request->all();

        $contact->update($data);

        return redirect()
        ->route('contacts.index')
        ->with('message', 'Contato atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$contact = AppointmentBook::find($id))
            return redirect()->route('contacts.index');

        $contact->delete();

        return redirect()
                ->route('contacts.index')
                ->with('message', 'Contato Deletado com sucesso');
    }
}
