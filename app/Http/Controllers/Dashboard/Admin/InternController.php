<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Intern;
use App\Models\User;
use App\Services\MatriculeService;
use Illuminate\Http\Request;

use function Laravel\Prompts\confirm;

class InternController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.interns.index', [
            'interns' => Intern::with('user')->orderByDesc('id')->paginate(5)
        ]);
    }

    public function create()
    {   
        $users = User::role('intern')->whereDoesntHave('intern')->get();

        return view('dashboard.admin.interns.create', [
            'users' => $users
        ]);
    }

    public function store(Request $request) {
        
          $validated = $request->validate([
            'user_id' => ['required', 'integer'], 
            'salutation' => ['required', 'string', 'in:miss,mr,mrs,dr,prof,chief,engr'],
            'id_card_number' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'string', 'max:25'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'school' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string', 'max:255'],
            'diploma' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'integer', 'min:1'],
            'start_date' => ['required', 'date', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'language' => ['required', 'string', 'in:english,french'],
            'other_information' => ['nullable', 'string', 'max:1000'],
        ]);

        $validated['matricule'] = MatriculeService::generate();

        Intern::create($validated);

        alert()->success('Registration Complete', 'You have successfully submitted your information');

        return redirect()->route('intern.index');
    }

    public function show(int $id)
    {
        return view('dashboard.admin.interns.show', [
            'intern' => Intern::with('user')->where(['id' => $id])->first()
        ]);
    }

    public function edit(int $id)
    {   
        $intern = Intern::findOrFail($id);

        $users = User::role('intern')
                    ->where(function ($query) use ($intern) {
                        $query->whereKey($intern->user_id)
                            ->orWhereDoesntHave('intern');
                    })
                    ->get();

        return view('dashboard.admin.interns.edit', [
            'users' => $users,
            'intern' => $intern
        ]);
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer'], 
            'salutation' => ['required', 'string', 'in:miss,mr,mrs,dr,prof,chief,engr'],
            'id_card_number' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'string', 'max:25'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'school' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string', 'max:255'],
            'diploma' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'integer', 'min:1'],
            'start_date' => ['required', 'date', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'language' => ['required', 'string', 'in:english,french'],
            'other_information' => ['nullable', 'string', 'max:1000'],
        ]);

        $intern = Intern::findOrFail($id);

        $intern->update($validated);

        alert()->success('Update Successful', 'You have successfully updated interns information');
        return redirect()->route('intern.edit', $id);
    }

    public function approve(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'integer']
        ]);

        $intern = Intern::findOrFail($validated['id']);
        $intern->update(['status' => 'approved']);

         alert()->success('Submission Approved', 'You have successfully approved this interns submission');

        return redirect()->route('intern.index');

    }

    public function unapprove(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'integer']
        ]);

        $intern = Intern::findOrFail($validated['id']);
        $intern->update(['status' => 'pending']);

         alert()->success('Submission Unapproved', 'You have successfully set this interns submission to pending');

        return redirect()->route('intern.index');

    }

    public function rejectReason(int $id)
    {
        return view('dashboard.admin.interns.reject', [
            'intern' => Intern::findOrFail($id)
        ]);
    }

    public function reject(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'integer'],
            'rejection_reason' => ['string', 'nullable', 'max:255']
        ]);

        $intern = Intern::findOrFail($validated['id']);

        if($validated['rejection_reason']) {
            $intern->update(['status' => 'rejected', 'rejection_reason' => $validated['rejection_reason']]);
        }else {
            $intern->update(['status' => 'rejected']);
        }
        

        alert()->success('Submission Rejected', 'You have successfully reject this submission');

        return redirect()->route('intern.index');

    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'integer']
        ]);

        $intern = Intern::findOrFail($validated['id']);
        $intern->delete();

        alert()->success('Submission Deleted', 'You have successfully deleted the submission');

        return redirect()->route('intern.index');
    }

    public function bulkActions(Request $request)
    {
        $validated = $request->validate([
            'bulk_option' => ['required', 'string', 'in:approve,unapprove,delete'],
            'interns.*' => ['integer', 'exists:interns,id'],
        ]);

        if($validated['bulk_option'] === 'approve')
        {
            foreach($validated['interns'] as $id)  {
                $intern = Intern::findOrFail($id);
                $intern->update(['status' => 'approved', 'rejected_reason' => null]);
            }

            alert()->success('Submissions Approved', 'You have successfully approved the selected submissions');

            return redirect()->route('intern.index');
        }   

        if($validated['bulk_option'] === 'unapprove')
        {
            foreach($validated['interns'] as $id)  {
                $intern = Intern::findOrFail($id);
                $intern->update(['status' => 'pending', 'rejected_reason' => null]);
            }

            alert()->success('Submissions Unapproved', 'You have successfully unapproved the selected submissions');

            return redirect()->route('intern.index');
        }

        if($validated['bulk_option'] === 'delete') {

            foreach($validated['interns'] as $id)  {
                $intern = Intern::findOrFail($id);
                $intern->delete();
            }

            alert()->success('Submissions Deleted', 'You have successfully deleted the selected submissions'); 
            return redirect()->route('intern.index');
        }
    
        return redirect()->back();
         
    }
}
